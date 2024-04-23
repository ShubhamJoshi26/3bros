<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function EventList()
    {
        if(\request()->ajax()){
            $data = Events::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/event/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/event/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/event/list');
    }
    public function AddEvent()
    {
        return view('admin/event/add');
    }

    public function EditEvent(Request $request)
    {
        $event = Events::find($request->id)->toArray();
        return view('admin/event/add',['event'=>$event]);
    }

    public function CreateEvent(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ])->validate();
        $EventData = new Events;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $EventData = Events::find($request->id);
            $EventData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $EventData->created_at = date("Y-m-d H:i:s");
        }
        $EventData->title = $request->title;
        $EventData->date = $request->date;
        $EventData->price = $request->price;
        $EventData->description = $request->description;
        $EventData->metadescription = $request->metadescription;
        $EventData->metatitle = $request->metatitle;
        $EventData->time = $request->time;
        $EventData->location = $request->location;
        if($request->file('thumbnail')!=null)
        {
            $name = time().rand(1,50).'.'.$request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('uploads/events/thumbnail'), $name); 
            $path = 'uploads/events/thumbnail/'.$name; 
            $EventData->thumbnail = $path;
        }
        if($EventData->save())
        {
            return redirect('/admin/event/list')->with('success','Event Added Successfully');
        }
        else
        {
            return redirect('/admin/event/list')->with('error','Something went wrong! Event Not Added');
        }

    }

    public function DeleteEvent(Request $request)
    {
      $delete = Events::destroy($request->id);
      return redirect('/admin/event/list')->with('success','Event Deleted Successfully');
    }
}
