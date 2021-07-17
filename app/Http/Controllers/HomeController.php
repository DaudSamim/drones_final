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
use Illuminate\Support\Facades\Session;
use DateTime;
use DatePeriod;
use DateInterval;
use ProtoneMedia\LaravelFFMpeg;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use FFMpeg\Filters\Video\VideoFilters;
use ProtoneMedia\LaravelFFMpeg\FFMpeg\CopyFormat;
use Illuminate\Support\Facades\Input;



class HomeController extends Controller
{
    public function getStats()

    {     
        $check_role = DB::table('users')->where('id',Auth::user()->id)->first();
        if($check_role->role == 1){
        $videos = DB::table('videos')->get();
                        $categories = DB::table('categories')->get();
                        $purchases = DB::table('orders')->get();
                        $plans = DB::table('plans')->get();
                        $vendors = DB::table('vendors')->get();
                        $subs = DB::table('subscriptions')->get();

                        $count_videos = count($videos);
                        $count_categories = count($categories);
                        $count_purchases = count($purchases);
                        $count_plans = count($plans);
                        $count_vendors = count($vendors);
                        $count_subs = count($subs);
                        $count_users = DB::table('users')->where('email','!=','admin@admin.com')->count();


      return view('home.view-stats',compact('count_videos','count_subs','count_vendors','count_categories','count_purchases','count_plans','count_users'));
    }
    if ($check_role->role == 2){
        $purchases = DB::table('orders')->where('user_id',Auth::user()->id)->get();
        $count_purchases = count($purchases);
        $plans = DB::table('plan_purchases')->where('user_id',Auth::user()->id)->get();
        $count_plans = count($plans);
        $videos = DB::table('videos')->where('user_id',Auth::user()->id)->get();
        $count_videos = count($videos);

        return view('home.view-stats',compact('count_purchases','count_plans','count_videos'));
    }
    if ($check_role->role == 3){
        $purchases = DB::table('orders')->where('user_id',Auth::user()->id)->get();
        $count_purchases = count($purchases);
        $plans = DB::table('plan_purchases')->where('user_id',Auth::user()->id)->get();
        $count_plans = count($plans);
        return view('home.view-stats',compact('count_purchases','count_plans'));
    }
    }

    public function search(Request $request){
       $keyword = $request->keyword;
       $videos = DB::Table('videos')->where('title', 'like', '%' . $keyword . '%')->orWhere('keywords', 'like', '%' . $keyword . '%')->get();
      
      foreach ($videos as $key => $value) {
          if($value->status != 1){
            unset($videos[$key]);
          }
      }

       return view('search_results',compact('videos','keyword'));

    }

    public function approveVideo($id){
        DB::table('videos')->where('id',$id)->update([
            'status' => 1
        ]);

        return redirect()->back()->with('success','Successfully Updated');
    }

    public function rejectVideo(Request $request){

        if($request->extra_message != null && $request->extra_message != ''){
          $request->message = $request->extra_message;
        }

        DB::Table('videos')->where('id',$request->id)->update([
            'status' => 2,
            'rejection_message' => $request->message,

        ]);

         return redirect()->back()->with('success','Successfully Updated');

    }   

    public function getPurchases(){
        
        $purchases = DB::table('orders')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        if(auth()->user()->role == 1){
             $purchases = DB::table('orders')->orderBy('id','desc')->get();
        }
        if(Session::has('message')){
            return view('home.purchases',compact('purchases'))->with('message','Order Placed');
        }
        return view('home.purchases',compact('purchases'));

    }

    public function showOrder($id){
        $products = DB::table('orders')->where('id',$id)->pluck('order_data')->first();
        $products = unserialize($products);
        return view('home.show_products',compact('products','id'));
    }

    public function getorders(){
        $allOrders = DB::table('vendor_orders')->where('vendor_id',auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('home.show_vendor_orders',compact('allOrders'));
        
        
        }

    public function downloadProduct($id){
        $link = DB::table('videos')->where('id',$id)->pluck('file')->first();
        if(isset($link)){
            return response()->download(public_path('storage/'.$link));
        }
        else{
            return redirect()->back()->with('alert','Video already DELETED');


        }
    }

    public function downloadClientProduct($link){
        return response()->download(public_path('storage/'.$link));
    }

    public function getQualities(){
        $qualities = DB::table('qualities')->get();
        return view('home.view_qualities',compact('qualities'));
    }

     public function postQualities(Request $request){

        $validated = $request->validate([
            'price' => 'required|integer',
            
            
        ]);

        DB::table('qualities')->where('id',$request->id)->update([
            'price' => $request->price,
        ]);
       
       return redirect()->back()->with('message','Price Updated Successfully');
    }

    public function getUserStats(Request $request)
    {
            //dd($request->segment(1) == '');
            $users = DB::table('users')->where('email','!=','admin@admin.com')->orderBy('id','desc')->get();

            return view('home.view_user',compact('users'));
      
    }

    public function getCategory()
    {
        
            
            $categories = DB::table('categories')->orderBy('id','desc')->get();

            return view('home.view-category',compact('categories'));
       
    }

    public function postCategory(Request $request){
        
        $validated = $request->validate([
            'title' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            
        ]);


        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/images/';
            $file->move($path, $filename);

        };

             DB::Table('categories')->insert([
            'title' => $request->title,
            'image' => $filename
            ]);

             return redirect()->back()->with('success','Successfully Added');
    }


    

    public function getViewUser()
    {
        if (Auth::user()->username == 'admin')
        {
            
            return view('home.view_user');
        }
        else
        {
            return redirect()->back();
        }
    }

     public function getVendors()
    {
        
            
            $vendors = DB::table('vendors')->get();


            return view('home.vendor',compact('vendors'));
       
    }

    public function all_vendor_videos()
    {
            return view('all_vendor_videos');
       
    }

    public function postUser(Request $request){
        
       $validated = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ]);

        
      

             DB::Table('users')->insert([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
            ]);

             return redirect()->back()->with('success','Successfully Added');
       
    }


    public function getContactQueries()
    {
           
            $queries = DB::table('contact_queries')->orderBy('id','desc')->get();
            return view('home.view_contact_us',compact('queries'));
        
    }

     public function getSubscriptions()
    {
            $queries = DB::table('subscriptions')->orderBy('id','desc')->get();
            return view('home.view_subscriptions',compact('queries'));
        
    }

    public function getViewVideos()
    {
          
            $videos = DB::table('videos')->where('user_id', auth()->user()->id)->orderBy('id','desc')->get();
            $categories = DB::table('categories')->orderBy('title','asc')->get();
            return view('home.view_videos',compact('videos','categories'));
        
    }
    public function postVideos(Request $request){
        
       $validated = $request->validate([
            'title' => 'required',
            'video' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'model_released' => 'required',
            'property_released' =>'required',
            'location' => 'required',
            'device_model' =>'required',
        ]);


       $size_eightK = null;
       $size_sixK = null;
       $size_fourK = null;
       $size_fhd = null;
       $size_hd = null;

        // if($request->file('video')){
        //     $file = $request->file('video');
        //     $filename = $file->getClientOriginalName();
        //     $filena = pathinfo($filename, PATHINFO_FILENAME);
        //     $path = storage_path().'/app/public/';
        //     $size = $file->getSize();
        //     $size = number_format($size / 1048576, 2);
        //     $file->move($path, $filename);
    
        // if($request->file('pdf_file')){
        //     $file_1 = $request->file('pdf_file');
        //     $filename_1 = $file_1->getClientOriginalName();
        //     $path_1 = public_path();
        //     $file_1->move($path_1, $filename_1);
        // } 
        // if($request->file('pdf_file2')){
        //     $file_2 = $request->file('pdf_file2');
        //     $filename_2 = $file_2->getClientOriginalName();
        //     $path_2 = public_path();
        //     $file_2->move($path_2, $filename_2);
        // } 

            // Resolutions
            // $processOutput = \FFMpeg::fromDisk('public')->open($filename)
            //     ->export()
            //     ->addFilter(['-filter:a', 'volumedetect', '-f', 'null'])
            //     ->getProcessOutput();


            // foreach ($processOutput->all() as $key => $value){ 
            //           if(str_contains($value, 'Stream')){
            //              $processOutput = explode(',',$processOutput->all()[$key]); 
            //              break;
            //           }
            //   }


            // // For watermark
            // \FFMpeg::fromDisk('public')->open($filename)
            // ->addWatermark(function(WatermarkFactory $watermark) {
            //     $watermark->open('watermark.png')
            //         ->left(25)
            //         ->bottom(25) 
            //         ->width(300)
            //         ->height(300);
            // })->export()->inFormat(new \FFMpeg\Format\Video\X264)
            //  ->save("drone{$filena}.mp4");  



            // // Video resolution
            // $video_resolution = explode(' ',$processOutput[3]);
            // $video_resolution =  explode('x',$video_resolution[1]);
            // $video_resolution = $video_resolution[1];



            // if($video_resolution >=  '4320'){
            //     $video_resolution = '8k';
            // }elseif ($video_resolution >= '3160') {
            //    $video_resolution = '6k';
            // }elseif ($video_resolution >= '2160') {
                 

            //     \FFMpeg::fromDisk('public')->open('drone'.$filena.'.mp4')
            //       ->export()
            //       ->resize(1920, 1080)
            //       ->inFormat(new \FFMpeg\Format\Video\X264)
            //       ->save("1080drone{$filena}.mp4");



            //     \FFMpeg::fromDisk('public')->open('drone'.$filena.'.mp4')
            //       ->export()
            //       ->resize(1280, 720)
            //       ->inFormat(new \FFMpeg\Format\Video\X264)
            //       ->save("720drone{$filena}.mp4");

            //       $size_fourK = \File::size(public_path('/storage/drone'.$filena.'.mp4'));
            //       $size_fourK = number_format($size_fourK / 1048576, 2);
            //       $size_fhd = \File::size(public_path('/storage/1080drone'.$filena.'.mp4'));
            //       $size_fhd = number_format($size_fhd / 1048576, 2);
            //       $size_hd = \File::size(public_path('/storage/720drone'.$filena.'.mp4'));
            //       $size_hd = number_format($size_hd / 1048576, 2);

            //    $video_resolution = '4k';
            // }elseif ($video_resolution >= '1080') {

            //     \FFMpeg::fromDisk('public')->open('drone'.$filena.'.mp4')
            //       ->export()
            //       ->resize(1280, 720)
            //       ->inFormat(new \FFMpeg\Format\Video\X264)
            //       ->save("720drone{$filena}.mp4");

            //       $size_fhd = \File::size(public_path('/storage/drone'.$filena.'.mp4'));
            //       $size_fhd = number_format($size_fhd / 1048576, 2);
            //       $size_hd = \File::size(public_path('/storage/720drone'.$filena.'.mp4'));
            //       $size_hd = number_format($size_hd / 1048576, 2);

            //       $video_resolution = 'FHD';
            // }else{
            //     return redirect()->back()->with('alert','Uploading failed. Video Resolutions accepted: 4k, 6k or 8K');
            // }    

            // // Frame per second
            // $fps = $processOutput[5];

            // // Bitrate
            // $bitrate = $processOutput[4];


            //  // For thumbnail
            //  \FFMpeg::fromDisk('public')
            //     ->open("drone{$filena}.mp4")
            //     ->getFrameFromSeconds(1)
            //     ->export()
            //     ->toDisk('public')
            //     ->save("drone{$filena}.png");

            // // For length 
            // $media = \FFMpeg::fromDisk('public')->open("drone{$filena}.mp4");
            // $durationInSeconds = $media->getDurationInSeconds(); // returns an int
            // $length = gmdate("i:s", $durationInSeconds); 

            $eightK = DB::table('qualities')->where('title','8K')->pluck('price')->first();
            $sixtK = DB::table('qualities')->where('title','6K')->pluck('price')->first();
            $fourK = DB::table('qualities')->where('title','4K')->pluck('price')->first();
            $fhd = DB::table('qualities')->where('title','FHD')->pluck('price')->first();
            $hd = DB::table('qualities')->where('title','HD')->pluck('price')->first();



            // $filename = 'drone'.$filena.'.mp4';

            $video = $request->title;
            if($request->file('video')){
            foreach ($video as $key => $value){


                   
                        $file = $request->video[$key];
                        $filename = $file->getClientOriginalName();
                        $filena = pathinfo($filename, PATHINFO_FILENAME);
                        $path = storage_path().'/app/public/';
                        $size = $file->getSize();
                        $size = number_format($size / 1048576, 2);
                        $file->move($path, $filename);

                        
                    if(isset($request->pdf_file[$key])){
                        $file_1 = $request->pdf_file[$key];
                        $filename_1 = $file_1->getClientOriginalName();
                        $path_1 = public_path();
                        $file_1->move($path_1, $filename_1);
                    } 
                    if(isset($request->pdf_file2[$key])){
                        $file_2 = $request->pdf_file2[$key];
                        $filename_2 = $file_2->getClientOriginalName();
                        $path_2 = public_path();
                        $file_2->move($path_2, $filename_2);
                    } 
                    $filename = 'drone'.$filena.'.mp4';
                    
                DB::Table('videos')->insert([
                'user_id' => auth()->user()->id,
                'title' => $value,
                'file' => $filename,
                'category_id' => $request->category_id[$key],
                'poster' => 'drone'.$filena.'.png'??null,
                'price' => 1,
                'description' => $request->description[$key],
                'length' => $length??null,
                'size' => $size??null,
                'model_released' => $request->model_released[$key],
                'property_released' => $request->property_released[$key],
                'location' => $request->location[$key],
                'device_model' => $request->device_model[$key],
                'fps' => $fps??null,
                'bitrate' => $bitrate??null,
                'resolution' => $video_resolution??null,
                'eightK' => $eightK,
                'sixK' =>  $sixtK,
                'fourK' => $fourK,
                'fhd' =>  $fhd,
                'hd' => $hd,
                'keywords' => $request->keywords[$key]?json_encode($request->keywords[$key]):null,
                'size_eightK' => $size_eightK,
                'size_sixK' => $size_sixK,
                'size_fourK' => $size_fourK,
                'size_fhd' => $size_fhd,
                'size_hd' => $size_hd,
                'pdf_file' =>  $filename_1??null,
                'pdf_file2' =>  $filename_2??null,

        

                ]);
            }

                return redirect()->back()->with('success','Successfully Added');

             }

        return redirect()->back()->with('error','Something Wrong');
    }
    public function postMultipleVideos(Request $request){
        $validated = $request->validate([
            'video' => 'required',
            
        ]);

        $videos= $request->video;
        
        foreach ($videos as $key=>$value){
            
            $file = $request->video[$key];
            $filename = $file->getClientOriginalName();
            $filena = pathinfo($filename, PATHINFO_FILENAME);
            $path = storage_path().'/app/public/';
            $size = $file->getSize();
            $size = number_format($size / 1048576, 2);
            $file->move($path, $filename);

            DB::table('videos')->insert([
                'file'=>$filename,
                'user_id' => auth()->user()->id,

                
            ]);

        }

       
         return redirect()->back()->with('success','Successfully Added');



    }

    public function update_video_price(Request $request){

        DB::table('videos')->where('id',$request->id)->update([
            'eightK' => $request->eightK,
            'sixK' => $request->sixK,
            'fourK' => $request->fourK,
            'fhd' => $request->fhd,
            'hd' => $request->hd,
        ]);

        return redirect()->back()->with('success','Successfully Updated');
    }

    public function Purchase($id){
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
        
        return redirect()->back();

    }


    public function posteditVideos(Request $request){
 
        $validated = $request->validate([
             'title' => 'required', 
         ]);
          
          $status = 0;
          if(auth()->user()->role == 1){
            $status = DB::table('videos')->where('id',$request->id)->pluck('status')->first();
          }

                 DB::Table('videos')->where('id',$request->id)->update([
                 
                     'title' => $request->title,
                     'category_id' => $request->category_id,
                     'price' => 1,
                     'status' => $status,
                     'description' => $request->description, 
                     'model_released' => $request->model_released,
                     'property_released' => $request->property_released,
                     'location' => $request->location,
                     'device_model' => $request->device_model,
                     'keywords' => $request->keywords?json_encode($request->keywords):null,

 
                 ]);
 
                 return redirect('/view-videos')->with('success','Successfully Updated');
 
         
     }

    public function editVideo($id){
        $video = DB::table('videos')->where('id',$id)->first();
        if(!$video){
            return redirect()->back();
        }
        return view('home.edit_videos',compact('video'));
    }

 

    public function getViewCashin()
    {
        if (Auth::user()->username == 'admin')
        {
            $opt['opt'] = 'view-cashin';
            $job['job'] = DB::table('jobs')->get();
            return view('home.view_cashin')->with($opt)->with($job);
        }
        else
        {
            return redirect()->back();
        }
    }

    public function getViewallVideos()
    {
          
            $videos = DB::table('videos')->orderBy('id','desc')->get();
            $categories = DB::table('categories')->orderBy('title','asc')->get();
            return view('home.view_videos',compact('videos','categories'));
        
    }

    public function getCommission($id)
    {           $vendor = DB::table('vendors')->where('id', $id)->first();
            return view('home.commission', compact('vendor'));
       
    }


     public function postCommission(Request $request)
    {
        $this->validate($request, [
            'commissions'=> 'required|integer|min:1|max:100',
            ]);    

        DB::table('vendors')->where('id', $request->id)->update([
            'commissions' => $request->commissions
        ]);
        return redirect('view-vendors')->with('message','Successfully updated');
    }

    public function getConfirm($id)
    {
        
            
        DB::Table('users')->where('id',$id)->update([
            'status' => 1,
            ]);
       

            return redirect('view-vendors');
       
    }

 


    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    
    public function view_plans()
    {
        $plans = DB::table('plans')->orderby('id','desc')->get();
        $qualities = DB::table('qualities')->get();
        return  view('home.view_plans',compact('plans', 'qualities'));

        

    }


    public function postAddPlan(Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'features' => 'required',
            'download_limit' => 'required',
            'maximum_quality' => 'required',



            
        ]);

             DB::Table('plans')->insert([
            'title' => $request->name,
            'price' => $request->price,
            'features' => $request->features?json_encode($request->features):null,
            'popular' => $request->popular,
            'download_limit' => $request->download_limit,
            'maximum_quality' => $request->maximum_quality,

        ]);

             return redirect()->back()->with('success','Successfully Added');
    }

    public function update_plans(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'features' => 'required',
            'download_limit' => 'required',
            'maximum_quality' => 'required',

        ]);


        DB::table('plans')->where('id',$request->id)->update([
            'title' => $request->name,
            'price' => $request->price,
            'features' => $request->features?json_encode($request->features):null,
            'popular' => $request->popular,
            'download_limit' => $request->download_limit,
            'maximum_quality' => $request->maximum_quality,

        ]);

        return redirect('/view-plans')->with('success','Successfully Updated');
    }

    public function edit_plan($id){
        $plan = DB::table('plans')->where('id',$id)->first();
        if(!$plan){
            return redirect()->back();
        }
        $qualities = DB::table('qualities')->get();

        return view('home.edit_plans',compact('plan', 'qualities'));
    }

    public function postAddCoupons(Request $request){
        
        
        $validated = $request->validate([
            'title' => 'required',
            'discount' => 'required',
            'description' => 'required',

            
        ]);
        
        $date = date('Y-m-d', time());
        $request->today_date = $date;
        if($request->today_date > $request->date){
            return redirect()->back()->with('alert','The Expiry Date Should Be Greater Than Todays Date');

        }
        

        $alph = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $code='';

        for($i=0;$i<7;$i++){
           $code .= $alph[rand(0, 55)];
        }
        
        

             DB::Table('coupons')->insert([
            'title' => $request->title,
            'discount' => $request->discount,
            'description' => $request->description,
            'expire_date' => $request->date,
            'code' => $code,
            ]);

             return redirect()->back()->with('success','Successfully Added');
    }



    public function postCheckout(Request $request){
        
        
        $validated = $request->validate([
            'code' => 'required|min:6',    
        ]);

                $variable = DB::table('coupons')->where('code', $request->code)->first();
                
                if(isset($variable)){
                    $used = DB::table('used_coupons')->where('coupon_id', $variable->id)->first();
                    if(isset($used)){
                    if($used->user_id == auth()->user()->id){
                        return redirect()->back()->with('alert','Coupon Already Used');
                    }
                    }
                    $date = date('Y-m-d', time());
                    if($variable->expire_date > $date){
                    $order_data = DB::table('carts')->where('user_id',auth()->user()->id)->get();
                    foreach($order_data as $order){
                        $discount = ((100 - $variable->discount) * $order->price)/100;
                        
                        DB::Table('carts')->where('id',$order->id)->update([
                            'discounted_price' => $discount,
                            ]);
                        
                    }
                    DB::Table('temp_coupon')->insert([
                        'user_id' => auth()->user()->id,
                        'coupon_id' => $variable->id,
                        ]);

                } 
                else
                {

                    return redirect()->back()->with('alert','Coupon Expired');

                }

                }
                else
                {
                    return redirect()->back()->with('alert','Coupon Not found');

                }
            


             return redirect()->back()->with('success','Successfully Added');
    }

    public function sellFootage(){
        return view('sell_footage');
    }

    public function plan_purchases($id){
         
        $purchases= DB::table('plan_purchases')->get();
        $user= DB::table('users')->get();
        $plan= DB::table('plans')->get();
        return  view('home.plan_purchase',compact('plan', 'purchases', 'user'));

      
        DB::table('plan_purchases')->insert([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'plan_price' => $request->plan_price,
            'created_at' => $request->created_at,

        ]);
        }

        public function purchased(){
            return view('purchased');
            
        }
        public function plans_purchased(){

            $plans = DB::table('plan_purchases')->where('user_id',auth()->user()->id)->get();
            return view('home.plans_purchased',compact('plans'));   
        }


        public function free_payment(){
            $amount = 0;

            $order_data = DB::table('carts')->where('user_id',auth()->user()->id)->get();
			
            DB::table('orders')->insert([
            	'user_id' => auth()->user()->id,
            	'order_data' => serialize($order_data),
            	'price' => $amount,
             ]);
            
			 $orders = DB::table('carts')->get();
			 
			 foreach($orders as $order)
			 {
				$find_id = DB::table('videos')->where('id',$order->product_id)->first();
				
				DB::table('vendor_orders')->insert([
                         'price' => 0,
						 'profit' => 0,
						 'quality' => $order->quality,
						 'product_id' => $find_id->id,
						 'title' => $find_id->title,
						 'vendor_id' => $find_id ->user_id,
                         'user_id' => auth()->user()->id,

					]);
					
					
					

					$total_amount = null;
			 }

			 $carts = DB::table('carts')->where('user_id',auth()->user()->id)->get();
             $count = count($carts);
             $downloads = DB::table('users')->where('id',auth()->user()->id)->first();

             DB::table('users')->update([
                'downloads_limit' => $downloads->downloads_limit - $count,
                
           ]);

             DB::table('carts')->where('user_id',auth()->user()->id)->delete();

             return redirect('/view-purchases')->with('message','Order Placed');
        }

        public function delete($filename){
            $file_path = public_path($filename);
            return response()->download($file_path);
        }

        public function list_categories(){
            return view ('list_categories');

        }

        public function list_blogs(){
            return view ('list_blogs');

        }
       

        public function view_blogs(){
            $blogs= DB::table('blogs')->orderby('id', 'desc')->get();
            return view ('home.view_blogs', compact('blogs'));

        }

        public function post_blogs(Request $request){
           
            $validated = $request->validate([
                'title' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);

            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/images/';
                $file->move($path, $filename);
    
            };
            DB::Table('blogs')->insert([
                'title' => $request->title,
                'data' => $request->data,
                'image' => $filename,
                
    
            ]);
            return redirect()->back()->with('success','Successfully Added');


        }

        public function update_blogs(Request $request){
            $validated = $request->validate([
                'title' => 'required',
                'data' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
    
            ]);

            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/images/';
                $file->move($path, $filename);
            };
    
            DB::table('blogs')->where('id',$request->id)->update([
                'title' => $request->title,
                'data' => $request->data,
                'image' => $filename,
    
            ]);
    
            return redirect('/view-blogs')->with('success','Successfully Updated');
        }
    
        public function edit_blog($id){


            $blog = DB::table('blogs')->where('id',$id)->first();
            if(!$blog){
                return redirect()->back();
            }
    
            return view('home.edit_blogs',compact('blog'));
        }
      

       
    
}