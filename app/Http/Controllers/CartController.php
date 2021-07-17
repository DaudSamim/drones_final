<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe;
use DateTime;
use DatePeriod;
use DateInterval;


class CartController extends Controller
{
	public function add_to_cart(Request $request){
		if(!auth()->check()){
			return redirect()->back()->with('message','Login to Add Product in Cart');
		}

		$price = null;
         $vid=$request->quality;
         if(!$vid){
         	$vid = DB::table('videos')->where('id',$request->product_id)->pluck('resolution')->first();
         	$request->quality = $vid;
         }
         if($vid=='HD'){
            $price = DB::table('videos')->where('id', $request->product_id)->pluck('hd')->first(); 
         }
         if($vid=='FHD'){
            $price = DB::table('videos')->where('id', $request->product_id)->pluck('fhd')->first();
         }
         if($vid=='4K'){
            $price = DB::table('videos')->where('id', $request->product_id)->pluck('fourK')->first();
         }
         if($vid=='6K'){
            $price = DB::table('videos')->where('id', $request->product_id)->pluck('sixK')->first();
         }
         if($vid=='8K'){
            $price = DB::table('videos')->where('id', $request->product_id)->pluck('eightK')->first();
         }

		DB::table('carts')->insert([
			'user_id' => auth()->user()->id,
			'product_id' => $request->product_id,
			'price' => $price,
			'quality' => $request->quality,

		]);

		return redirect()->back()->with('message','Successfully Added to Cart');
	}

	public function removeItem($id){
		DB::Table('carts')->where('user_id',auth()->user()->id)->where('id',$id)->delete();

		return redirect()->back()->with('success','Successfully Removed');
	}

	public function getCheckout(){
		$cart_products = DB::Table('carts')->where('user_id',auth()->user()->id)->get();
		
		
		return view('cart',compact('cart_products'));
	}

	public function getPaypal(){
		$amount = DB::table('carts')->where('user_id',auth()->user()->id)->get()->sum('price');
		return view('paypal',compact('amount'));
	}

	public function postPaypal($amount){
		dd($amount);
		$amount = DB::table('carts')->where('user_id',auth()->user()->id)->get()->sum('price');
		return view('paypal',compact('amount'));
	}

	public function getStripe(){
		$amount = 0;
		$c = 0;
		$free = 0;
		$check_limit = DB::Table('users')->where('id',auth()->user()->id)->first();
		$variables = DB::table('carts')->where('user_id',auth()->user()->id)->get();
		$plan_id = DB::Table('plan_purchases')->where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
			foreach($variables as $variable){
				if($check_limit->downloads_limit < 1){
					$amount = $amount + $variable->price;	
				} 
				else{
					if($plan_id){
						$quality_check = DB::Table('plans')->where('id',$plan_id->plan_id)->first();
						if($quality_check->maximum_quality == "8K"){
							$variable->price = 0;
                            $amount = $amount + $variable->price;
						}
						if($quality_check->maximum_quality == '6k'){
							if(($variable->quality == '6K') || ($variable->quality == '4K')){			
								$variable->price = 0;
								$amount = $amount + $variable->price;
							} 
							else{
								$amount = $amount + $variable->price;
							}
						}
						if($quality_check->maximum_quality == '4k'){
							if($variable->quality == '4K'){						
								$variable->price = 0;
								$amount = $amount + $variable->price;
							}
							else{
								$amount = $amount + $variable->price;
							}
						}

					}
				}
			}
			
		return view('stripe',compact('amount'));
	}

	public function getStripePlan($id){
		
		$amount = DB::table('plans')->where('id',$id)->pluck('price')->first();
		if($amount < 1){
			return redirect()->back();
		}
		$plan_id = $id;
		return view('stripe',compact('amount','plan_id'));
	}

	public function postStripe(Request $request){
		$total_amount = null;
		
		
		\Stripe\Stripe::setApiKey ( 'sk_test_51H2omrEBrijIcOQ0FrcrRTJ0oFUOuaBvrr8r54VHpukmRzwHQ8HVDxGgMzp2ktmGY9SPzT9Bf0mp4SkuHCW1o9ZP00DHfHaVxj' );

            $amount = $request->amount * 100;
            try {
                \Stripe\Charge::create ( array (
                        "amount" => $amount,
                        "currency" => "usd",
                        "source" => $request->input( 'stripeToken' ), // obtained with Stripe.js
                        "description" => "Test payment." 
                ) );

                
            } catch ( \Exception $e ) {
                
                return redirect()->back();
            }

            $order_data = DB::table('carts')->where('user_id',auth()->user()->id)->get();
			
            DB::table('orders')->insert([
            	'user_id' => auth()->user()->id,
            	'order_data' => serialize($order_data),
            	'price' => $request->amount,
             ]);
            
			 $orders = DB::table('carts')->get();
			 
			 foreach($orders as $order)
			 {
				$find_id = DB::table('videos')->where('id',$order->product_id)->first();
				$find_amount = DB::table('vendors')->where('user_id',$find_id->user_id)->first();
                    $total_amount = ( ( 100 - $find_amount->commissions ) * $order->price ) / 100 ;
				DB::table('vendor_orders')->insert([
                         'price' => $order->price,
						 'profit' => $total_amount,
						 'quality' => $order->quality,
						 'product_id' => $find_id->id,
						 'title' => $find_id->title,
						 'vendor_id' => $find_id ->user_id,
					]);
					
					DB::table('vendors')->where('user_id',$find_id->user_id)->update([
						'amount' => $find_amount->amount + $total_amount,
						
						]);
					

					$total_amount = null;
			 }
			 $variable = DB::table('temp_coupon')->where('user_id', auth()->user()->id)->first();
             if(isset($variable)){
			 DB::Table('used_coupons')->insert([
				'user_id' => auth()->user()->id,
				'coupon_id' => $variable->coupon_id,
				]);
			 DB::table('temp_coupon')->where('user_id',auth()->user()->id)->delete();
			}
			 $downloads = DB::table('users')->where('id',auth()->user()->id)->first();

             DB::table('users')->update([
                'downloads_limit' => $downloads->downloads_limit - $request->download,
                
           ]);

            DB::table('carts')->where('user_id',auth()->user()->id)->delete();

           
            return redirect('/view-purchases')->with('message','Order Placed');
	}

	public function postStripePlan(Request $request){
		$total_amount = null;
		
		
		\Stripe\Stripe::setApiKey ( 'sk_test_51H2omrEBrijIcOQ0FrcrRTJ0oFUOuaBvrr8r54VHpukmRzwHQ8HVDxGgMzp2ktmGY9SPzT9Bf0mp4SkuHCW1o9ZP00DHfHaVxj' );

            $amount = $request->amount * 100;
            try {
                \Stripe\Charge::create ( array (
                        "amount" => $amount,
                        "currency" => "usd",
                        "source" => $request->input( 'stripeToken' ), // obtained with Stripe.js
                        "description" => "Test payment." 
                ) );

               
            } catch ( \Exception $e ) {
                
                return redirect()->back();
            }
            
            $id = $request->plan_id;
          	$plan = DB:: table('plans')->where('id', $id)->first();
        
	        DB::table('plan_purchases')->insert([
	            'user_id' => auth()->user()->id,
	            'plan_id' => $id,
	            'plan_price' => $plan->price, 
	        
	        ]);
	        
	        $limit = DB:: table('plans')->where('id', $id)->first();
	        $current_limit = DB:: table('users')->where('id', auth()->user()->id)->first();
	        
	        $date = new DateTime('today');
	        $interval = new DateInterval('P30D');
	        $date->add($interval);
	        echo $date->format("Y-m-d");
	        
	        DB::table('users')->where('id', auth()->user()->id)->update([
	            'recent_plan' => $limit->title,
	            'downloads_limit' => $current_limit->downloads_limit + $limit->download_limit,
	            'expiry_date' => $date,
	        ]);

           
            return redirect('/view-purchases')->with('message','Order Placed');
	}

}