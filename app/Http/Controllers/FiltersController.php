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


class FiltersController extends Controller
{
	public function watermark(){
			\FFMpeg::open('input.mp4')
		    ->addWatermark(function(WatermarkFactory $watermark) {
		        $watermark->open('input.jpg')
		            ->left(25)
		            ->bottom(25) 
		            ->width(300)
		            ->height(300);
		    })->export()
			        ->inFormat(new \FFMpeg\Format\Video\X264)
		   			->save('water2.mkv');

		    dd('asd');
			// return view('welcome');
	}
}