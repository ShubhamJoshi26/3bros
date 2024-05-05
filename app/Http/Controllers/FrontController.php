<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Events;
use App\Models\Images;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $event = Events::take(5)->get()->toArray();
        $blog = Blog::take(3)->get()->toArray();
        $venue = PlaceType::where('category','like','%wedding%')->orderBy('position','asc')->get()->take(3)->toArray();
        return view('index',compact('venue','event','blog'));
    }
    public function allVenues()
    {
        $venue = PlaceType::all()->toArray();
        $title = 'Banquets-In-Delhi';
        if(!empty($venue))
        {
            return view('venue_list',compact('venue','title'));
        }
        else
        {
            return redirect(url()->previous());
        }
    }
    public function submitenquiry(Request $request)
    {
        $name = $request->name;
        $email = $request->email??'';
        $venue = $request->venue;
        $mobile = $request->mobile;
        $message = $request->message;
        $nop = $request->nop??0;
        $type = $request->type??''; 
        $data = array('name'=>$name,'email'=>$email,'venue'=>$venue,'mobile'=>$mobile,'message'=>$message,'nop'=>$nop,'type'=>$type);
        if(DB::table('booking_enquiry')->insert($data))
        {
            $sendmail = $this->sendClientMails($data);
            return view('thankyou');
        }
        
    }
    function allBlogs()
    {
        $bloglist = Blog::all()->toArray();
        $blogs = $this->paginate($bloglist,10);
        return view('blogs',compact('blogs'));
    }
    function blogDetails($id)
    {
        $blogs = Blog::all()->toArray();
        $blog = Blog::find($id)->toArray();
        return view('blog-details',compact('blog','blogs'));
    }
    function vanueDetails($id)
    {
        $table = 'place_type';
        $images = ImageController::getAllUploadedFiles($id,$table);
        $venue = PlaceType::find($id)->toArray();
        $allvenue = PlaceType::all()->toArray();
        return view('venue_details',compact('images','venue','allvenue'));
    }
    function banquetlist($title)
    {
        $venuein = explode('-',$title);
        $location = end($venuein);
        $venue = PlaceType::where('address','like',"$location")->get();
        return view('venue_list',compact('venue','title'));
    }
}
