<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Events;
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
        if(!empty($venue))
        {
            return view('venue_list',compact('venue'));
        }
        else
        {
            return redirect(url()->previous());
        }
    }
    public function submitenquiry(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $venue = $request->venue;
        $mobile = $request->mobile;
        $message = $request->message;
        $data = array('name'=>$name,'email'=>$email,'venue'=>$venue,'mobile'=>$mobile,'message'=>$message);
        if(DB::table('booking_enquiry')->insert($data))
        {
            return redirect(url()->previous())->with('success','Enquiry Recieved');
        }
        
    }
}
