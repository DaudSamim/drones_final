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

use ProtoneMedia\LaravelFFMpeg;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use Illuminate\Contracts\Filesystem\Filesystem;
use FFMpeg\Filters\Video\VideoFilters;
use ProtoneMedia\LaravelFFMpeg\FFMpeg\CopyFormat;


class HomeController extends Controller
{
    public function getStats()

    {      
      return view('home.view-stats');
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
        return response()->download(public_path('storage/'.$link));
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
            'category_id' => 'required|integer',
             'model_released' => 'required',
            'property_released' =>'required',
        ]);


       $size_eightK = null;
       $size_sixK = null;
       $size_fourK = null;
       $size_fhd = null;
       $size_hd = null;

        if($request->file('video')){
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $filena = pathinfo($filename, PATHINFO_FILENAME);
            $path = storage_path().'/app/public/';
            $size = $file->getSize();
            $size = number_format($size / 1048576, 2);
            $file->move($path, $filename);

            // Resolutions
            $processOutput = \FFMpeg::fromDisk('public')->open($filename)
                ->export()
                ->addFilter(['-filter:a', 'volumedetect', '-f', 'null'])
                ->getProcessOutput();


            foreach ($processOutput->all() as $key => $value){ 
                      if(str_contains($value, 'Stream')){
                         $processOutput = explode(',',$processOutput->all()[$key]); 
                         break;
                      }
              }


            // For watermark
            \FFMpeg::fromDisk('public')->open($filename)
            ->addWatermark(function(WatermarkFactory $watermark) {
                $watermark->open('watermark.png')
                    ->left(25)
                    ->bottom(25) 
                    ->width(300)
                    ->height(300);
            })->export()->inFormat(new \FFMpeg\Format\Video\X264)
             ->save("drone{$filena}.mp4");  



            // Video resolution
            $video_resolution = explode(' ',$processOutput[3]);
            $video_resolution =  explode('x',$video_resolution[1]);
            $video_resolution = $video_resolution[1];



            if($video_resolution >=  '4320'){
                $video_resolution = '8k';
            }elseif ($video_resolution >= '3160') {
               $video_resolution = '6k';
            }elseif ($video_resolution >= '2160') {
                 

                \FFMpeg::fromDisk('public')->open('drone'.$filena.'.mp4')
                  ->export()
                  ->resize(1920, 1080)
                  ->inFormat(new \FFMpeg\Format\Video\X264)
                  ->save("1080drone{$filena}.mp4");



                \FFMpeg::fromDisk('public')->open('drone'.$filena.'.mp4')
                  ->export()
                  ->resize(1280, 720)
                  ->inFormat(new \FFMpeg\Format\Video\X264)
                  ->save("720drone{$filena}.mp4");

                  $size_fourK = \File::size(public_path('/storage/drone'.$filena.'.mp4'));
                  $size_fourK = number_format($size_fourK / 1048576, 2);
                  $size_fhd = \File::size(public_path('/storage/1080drone'.$filena.'.mp4'));
                  $size_fhd = number_format($size_fhd / 1048576, 2);
                  $size_hd = \File::size(public_path('/storage/720drone'.$filena.'.mp4'));
                  $size_hd = number_format($size_hd / 1048576, 2);

               $video_resolution = '4k';
            }elseif ($video_resolution >= '1080') {

                \FFMpeg::fromDisk('public')->open('drone'.$filena.'.mp4')
                  ->export()
                  ->resize(1280, 720)
                  ->inFormat(new \FFMpeg\Format\Video\X264)
                  ->save("720drone{$filena}.mp4");

                  $size_fhd = \File::size(public_path('/storage/drone'.$filena.'.mp4'));
                  $size_fhd = number_format($size_fhd / 1048576, 2);
                  $size_hd = \File::size(public_path('/storage/720drone'.$filena.'.mp4'));
                  $size_hd = number_format($size_hd / 1048576, 2);

                  $video_resolution = 'FHD';
            }else{
                return redirect()->back()->with('alert','Uploading failed. Video Resolutions accepted: 4k, 6k or 8K');
            }    

            // Frame per second
            $fps = $processOutput[5];

            // Bitrate
            $bitrate = $processOutput[4];


             // For thumbnail
             \FFMpeg::fromDisk('public')
                ->open("drone{$filena}.mp4")
                ->getFrameFromSeconds(1)
                ->export()
                ->toDisk('public')
                ->save("drone{$filena}.png");

            // For length 
            $media = \FFMpeg::fromDisk('public')->open("drone{$filena}.mp4");
            $durationInSeconds = $media->getDurationInSeconds(); // returns an int
            $length = gmdate("i:s", $durationInSeconds); 

            $eightK = DB::table('qualities')->where('title','8K')->pluck('price')->first();
            $sixtK = DB::table('qualities')->where('title','6K')->pluck('price')->first();
            $fourK = DB::table('qualities')->where('title','4K')->pluck('price')->first();
            $fhd = DB::table('qualities')->where('title','FHD')->pluck('price')->first();
            $hd = DB::table('qualities')->where('title','HD')->pluck('price')->first();



            $filename = 'drone'.$filena.'.mp4';


              
                DB::Table('videos')->insert([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'file' => $filename,
                'category_id' => $request->category_id,
                'poster' => 'drone'.$filena.'.png',
                'price' => 1,
                'description' => $request->description,
                'length' => $length,
                'size' => $size,
                'model_released' => $request->model_released,
                'property_released' => $request->property_released,
                'fps' => $fps??null,
                'bitrate' => $bitrate??null,
                'resolution' => $video_resolution,
                'eightK' => $eightK,
                'sixK' =>  $sixtK,
                'fourK' => $fourK,
                'fhd' =>  $fhd,
                'hd' => $hd,
                'keywords' => $request->keywords?json_encode($request->keywords):null,
                'size_eightK' => $size_eightK,
                'size_sixK' => $size_sixK,
                'size_fourK' => $size_fourK,
                'size_fhd' => $size_fhd,
                'size_hd' => $size_hd,


                ]);

                return redirect()->back()->with('success','Successfully Added');

             };

        return redirect()->back()->with('error','Something Wrong');
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

}
