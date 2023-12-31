<?php

namespace App\Http\Controllers\RainbowControllers;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()// $page là page muốn hiển thị , $data là data muốn truyền thêm vào 
    {
       
       $page='home';
       $ListUpcomingMovie=Movie::with(['photos','movieCategory'])
       ->where('Deleted',0)
       ->whereBetween('dateshow', [now(), now()->addDays(7)])
       ->orderBy("dateshow",'desc')
       ->get();
       $ListTopMovie=Movie::with('photos','movieCategory')->get();
       $ListReleasedMovie=Movie::with('photos')->get();
       $ListBestOfLibrary=Movie::with('photos')->get();
       $slide=[];
       for($i=1;$i<=7;$i++){
        $slideHome=HomeSlide::with(['categorySlide'])->where('SlideCategory_Id',$i)->orderBy('Created_At','desc')->first();
        array_push($slide,$slideHome);
       }
        // return response()->json($slide);
        return  view('rainbowViews.index', [
            'page' => $page,
            'JsPage'=>'home',
            'listTopMovie'=>$ListTopMovie,
            'listUpcomingMovie'=>$ListUpcomingMovie,
            'listReleaseMovie'=>$ListReleasedMovie,
            'listBestOfLibrary'=>$ListBestOfLibrary,
            'slide'=>$slide
        ]);
        //  return response()->json(['data'=>$ListUpcomingMovie]);
    }
  

}
