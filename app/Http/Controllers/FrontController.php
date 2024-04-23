<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Events;
use App\Models\PlaceType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $event = Events::take(5)->get()->toArray();
        $blog = Blog::take(3)->get()->toArray();
        $venue = PlaceType::where('category','like','%wedding%')->orderBy('position','asc')->get()->take(3)->toArray();
        return view('index',compact('venue','event','blog'));
    }
}
