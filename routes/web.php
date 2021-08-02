<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Guest Routes
 *
 **/

// Route::get('/', '\App\Http\Controllers\UserController@getLogin')->name('/');
Route::get('/login', '\App\Http\Controllers\UserController@getLogin')->name('login');
Route::post('/login', '\App\Http\Controllers\UserController@postLogin');

Route::get('/register', '\App\Http\Controllers\UserController@getRegister');
Route::post('/register', '\App\Http\Controllers\UserController@postRegister');

Route::post('/add_to_cart', '\App\Http\Controllers\CartController@add_to_cart');
 Route::post('register_vendor','\App\Http\Controllers\VendorRegistrationController@vendor_register');


Route::get('/',function(){
    $categories = DB::table('categories')->limit(7)->get();
    $categories_search = DB::table('categories')->get();
    $videos = DB::table('videos')->where('status',1)->orderBy('id','desc')->limit(6)->get();
    $plans = DB::table('plans')->orderby('id','desc')->limit(3)->get();
    $keywords = DB::table('videos')->orderByRaw("RAND()")->where('keywords','!=',null)->limit(25)->get()->pluck('keywords');
    // dd($keywords);
    return view('home',compact('categories','categories_search','videos','plans','keywords'));
});

Route::get('product_{id}',function(Request $request,$id){

    $quality = $request->input('quality')??null;
    // dd($quality);

    $main_video = DB::table('videos')->where('id',$id)->first();
    if(!isset($main_video)){
        return redirect('/');
    }

    $categories = DB::table('categories')->limit(6)->get();
    $categories_search = DB::table('categories')->get();

    $related_videos = DB::table('videos')->where('id','!=',$id)->where('status',1)->orderBy('id','desc')->limit(8)->get();
    $entire_videos = DB::table('videos')->where('id','!=',$id)->where('status',1)->orderBy('id','desc')->skip(8)->take(12)->get();
    
    $user = $main_video->user_id;
    $vendor = DB::table('vendors')->where('user_id', $user)->first();

    
    

    return view('product',compact('categories','categories_search','entire_videos','related_videos','main_video','quality', 'user', 'vendor', 'main_video'));
});
Route::get('/all_videos_{id}', function($id){

    $vendor = DB::table('vendors')->where('user_id', $id)->first();
    $videos = DB::table('videos')->where('user_id',$id)->get();
   
    return view('all_vendor_videos',compact('videos','vendor'));

});



Route::get('/category_{name}',function($name){
    $main_category = DB::table('categories')->where('title',$name)->first();
    if(!isset($main_category)){
        return redirect()->back();
    }
    $categories = DB::table('categories')->limit(6)->get();
    $categories_search = DB::table('categories')->get();
    $videos = DB::table('videos')->where('category_id',$main_category->id)->where('status',1)->orderBy('id','desc')->limit(6)->get();

     $next_category = DB::table('categories')->where('id','>',$main_category->id)->first();
    if(!$next_category){
        $next_category = DB::table('categories')->where('id','<=',$main_category->id)->first();
    }

    $previous_category = DB::table('categories')->where('id','<',$main_category->id)->orderBy('id','desc')->first();
    if(!$previous_category){
         $previous_category = DB::table('categories')->orderBy('id','desc')->first();
    }

        return view('category',compact('categories','categories_search','main_category','videos','next_category','previous_category'));

});

Route::get('subscribe',function(){
    return redirect('/');
});

Route::post('subscribe',function(Request $request){
    $validated = $request->validate([
        'email' => 'required|unique:subscriptions'
    ]);

    DB::table('subscriptions')->insert([
        'email' => $request->email
    ]);

    return redirect()->back()->with('subscribe','yes');
});

Route::get('plan_details_{id}',function($id){
    $plan = DB::table('plans')->where('id',$id)->first();
    if(!$plan){
        return redirect()->back();
    }
    return view('plan_details',compact('plan'));
});

Route::get('contact_us',function(){
    return view('contactus');
});
Route::post('contact_us',function(Request $request){
    DB::table('contact_queries')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message
    ]);
    return redirect('contact_us')->with('success','Successfully Submitted');
});
Route::get('faqs',function(){
    return view('faqs');
});
Route::get('privacy_policy',function(){
    return view('privacy');
});
Route::get('refund_policy',function(){
    return view('refund');
});
Route::get('terms_and_conditions',function(){
    return view('terms');
});
Route::get('about_us',function(){
    return view('aboutus');
});
Route::get('customer',function(){
    return view('customer_dashboard');
});
Route::get('contributor',function(){
    return view('vendor_dashboard');
});

Route::get('sell_footage','\App\Http\Controllers\HomeController@sellFootage');

Route::post('/payment/add-funds/paypal','\App\Http\Controllers\PaymentController@payWithpaypal');


Route::get('/next_category_{id}',function($id){

    $next_category = DB::table('categories')->where('id','>',$id)->first();
    if($next_category){
        return redirect('category_'.$next_category->title);
    }else{
         $next_category = DB::table('categories')->where('id','<=',$id)->first();
         return redirect('category_'.$next_category->title);
    }
});

Route::get('/previous_category_{id}',function($id){

    $next_category = DB::table('categories')->where('id','<',$id)->orderBy('id','desc')->first();
    if($next_category){
        return redirect('category_'.$next_category->title);
    }else{
         $next_category = DB::table('categories')->orderBy('id','desc')->first();
         return redirect('category_'.$next_category->title);
    }
});

Route::get('approve_video/{id}','\App\Http\Controllers\HomeController@approveVideo');
Route::post('reject_video','\App\Http\Controllers\HomeController@rejectVideo');
Route::get('/search_{keyword}',function($keyword){

       $videos = DB::Table('videos')->where('title', 'like', '%' . $keyword . '%')->orWhere('keywords', 'like', '%' . $keyword . '%')->get();
      
      foreach ($videos as $key => $value) {
          if($value->status != 1){
            unset($videos[$key]);
          }
      }

       return view('search_results',compact('videos','keyword'));
});
Route::post('/search','\App\Http\Controllers\HomeController@search');
Route::get('/blogs', '\App\Http\Controllers\HomeController@list_blogs');
Route::get('/categories', '\App\Http\Controllers\HomeController@list_categories');
     



/**
 * Auth Routes
 *
 **/
Route::middleware('auth')->group(function ()
{

    Route::get('/logout', '\App\Http\Controllers\UserController@getLogout');
    Route::get('/user-logout', '\App\Http\Controllers\HomeController@getLogout');
    Route::get('/view-home', '\App\Http\Controllers\HomeController@getHome')->name('view-home');
    Route::get('/view-stats', '\App\Http\Controllers\HomeController@getStats');
    Route::post('/view-stats', '\App\Http\Controllers\HomeController@getStatsDate')->name('view-stats');

    Route::get('/view-user-stats', '\App\Http\Controllers\HomeController@getUserStats');
    Route::post('/view-user-stats', '\App\Http\Controllers\HomeController@getUserStatsDate')->name('view-user-stats');

    Route::get('/view-qualities', '\App\Http\Controllers\HomeController@getQualities');
    Route::post('/view-qualities', '\App\Http\Controllers\HomeController@postQualities');


    Route::get('/view-category', '\App\Http\Controllers\HomeController@getCategory');
    Route::post('/view-category', '\App\Http\Controllers\HomeController@postCategory')->name('view-category'); 
    Route::get('delete_category/{id}',function($id){
        DB::Table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    });

    Route::get('/view-videos', '\App\Http\Controllers\HomeController@getViewVideos')->name('view-videos');
    Route::post('/view_videos','\App\Http\Controllers\HomeController@postVideos');
    Route::post('/edit_video','\App\Http\Controllers\HomeController@posteditVideos');
    Route::post('update_video_price','\App\Http\Controllers\HomeController@update_video_price');
    Route::post('/view_vid','\App\Http\Controllers\HomeController@postMultipleVideos');
    Route::get('/show_orders','\App\Http\Controllers\HomeController@getorders');



    Route::get('/view_videos/{id}', '\App\Http\Controllers\HomeController@editVideo');
    Route::get('/delete_video/{id}',function($id){
         DB::Table('videos')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    });

    //purchases
    Route::get('/view-purchases','\App\Http\Controllers\HomeController@getPurchases');
    Route::get('show_order/{id}','\App\Http\Controllers\HomeController@showOrder');
    Route::get('download_product_{id}','\App\Http\Controllers\HomeController@downloadProduct');

    //checkout 
    Route::post('/checkout', '\App\Http\Controllers\HomeController@postCheckout')->name('/checkout');
    Route::get('checkout','\App\Http\Controllers\CartController@getCheckout');
    Route::get('paypal','\App\Http\Controllers\CartController@getPaypal');
    Route::get('paypal_{amount}','\App\Http\Controllers\CartController@postPaypal');
    Route::get('stripe','\App\Http\Controllers\CartController@getStripe');
    Route::post('stripe','\App\Http\Controllers\CartController@postStripe');
    Route::get('remove_cart_item/{id}','\App\Http\Controllers\CartController@removeItem');

    // Plan Purchase
    Route::get('stripe_plan_{id}','\App\Http\Controllers\CartController@getStripePlan');
    Route::post('stripe_plan','\App\Http\Controllers\CartController@postStripePlan');


    
    Route::get('/view-user', '\App\Http\Controllers\HomeController@getViewUser')->name('view-user');
    Route::post('/view-user', '\App\Http\Controllers\HomeController@postUser')->name('view-user');
    Route::get('/view_contact_us', '\App\Http\Controllers\HomeController@getContactQueries');
    Route::get('/view_subscriptions', '\App\Http\Controllers\HomeController@getSubscriptions');

    Route::get('/change-password', '\App\Http\Controllers\UserController@getChangePassword');
    Route::post('/change-password', '\App\Http\Controllers\UserController@postChangePassword');
    Route::get('/user-change-password', '\App\Http\Controllers\UserController@getUserChangePassword');
    Route::post('/user-change-password', '\App\Http\Controllers\UserController@postUserChangePassword');

    Route::get('/view-all-videos', '\App\Http\Controllers\HomeController@getViewallVideos')->name('view-all-videos');
    Route::get('/confirm/{id}', '\App\Http\Controllers\HomeController@getConfirm');
    Route::get('/commissions/{id}', '\App\Http\Controllers\HomeController@getCommission');
    Route::post('commissions', '\App\Http\Controllers\HomeController@postCommission')->name('commission');
    Route::get('/view-vendors', '\App\Http\Controllers\HomeController@getVendors');

    // Filters
    Route::get('watermark','\App\Http\Controllers\FiltersController@watermark');

    // Client Download Product
    Route::get('download_client_product/{link}','\App\Http\Controllers\HomeController@downloadClientProduct');
    Route::get('/view-plans', '\App\Http\Controllers\HomeController@view_plans');
    Route::post('/add_plan', '\App\Http\Controllers\HomeController@postAddPlan')->name('/add_plan');
    Route::post('/edit_plan','\App\Http\Controllers\HomeController@update_plans');
    Route::get('/add_plan/{id}', '\App\Http\Controllers\HomeController@edit_plan');
    Route::get('delete_plan/{id}',function($id){
        DB::Table('plans')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    });
    Route::get('/view-coupons',function(){
        
        $coupons =  DB::Table('coupons')->orderby('id','desc')->get();
  
      
          return view('home.view_coupons',compact('coupons'));
      });
  
      Route::post('/view-coupons', '\App\Http\Controllers\HomeController@postAddCoupons')->name('/view-coupons');

      Route::get('/view-purchase', '\App\Http\Controllers\HomeController@plan_purchases');
      Route::get('/purchase/{id}', '\App\Http\Controllers\HomeController@Purchase');
      Route::get('/purchased', '\App\Http\Controllers\HomeController@purchased');
      Route::get('/purchased-plans', '\App\Http\Controllers\HomeController@plans_purchased');
      Route::get('/free-payment', '\App\Http\Controllers\HomeController@free_payment');
      Route::get('/download/{filename}', '\App\Http\Controllers\HomeController@delete');
     
      Route::get('/view-blogs', '\App\Http\Controllers\HomeController@view_blogs');
      Route::post('/post_blog', '\App\Http\Controllers\HomeController@post_blogs');
      Route::post('/edit_blog','\App\Http\Controllers\HomeController@update_blogs');
      Route::get('/post_blog/{id}', '\App\Http\Controllers\HomeController@edit_blog');
      Route::post('/add_comment','\App\Http\Controllers\HomeController@add_comment');


      Route::get('/blog_{title}',function($title){
        $main_blog = DB::table('blogs')->where('title',$title)->first();
        $comment= DB::table('comments')->where('blog_id', $main_blog->id )->get();

        if(!isset($main_blog)){
            return redirect()->back();
        }
            return view('blogs',compact('main_blog', 'comment'));
        
    });
    Route::get('delete_blog/{id}',function($id){
        DB::Table('blogs')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    });
    Route::get('delete_vendor/{id}',function($id){
        DB::Table('vendors')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    });


    Route::post('/view-category', '\App\Http\Controllers\HomeController@edit_category');
    Route::get('/all-videos', '\App\Http\Controllers\HomeController@view_all');
    Route::post('/send_reply', '\App\Http\Controllers\HomeController@send_reply');
    Route::get('/page_replies', '\App\Http\Controllers\HomeController@admin_reply');
    Route::get('/free-stock', '\App\Http\Controllers\HomeController@free_stock');
    Route::get('/edit_profile', '\App\Http\Controllers\HomeController@edit_profile');
    Route::post('/update_profile', '\App\Http\Controllers\HomeController@update_profile');


});
