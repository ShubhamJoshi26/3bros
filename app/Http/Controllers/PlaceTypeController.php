<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class PlaceTypeController extends Controller
{
    public function placeList()
    {
        if(\request()->ajax()){
            $data = PlaceType::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/place/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/place/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/place/list');
    }
    public function AddPlace()
    {
        $category = Category::all()->toArray();
        $option ='<option></option>';
        if(!empty($category))
        {
            foreach($category as $cat)
            {
                $option .= '<option value="'.$cat['category'].'">'.$cat['category'].'</option>';
            }
        }
        return view('admin/place/add',['option'=>$option]);
    }
    public function EditPlace(Request $request)
    {
        $place = PlaceType::find($request->id)->toArray();
        $category = Category::all()->toArray();
        $option ='<option></option>';
        if(!empty($category))
        {
            
            foreach($category as $cat)
            {
                $select = '';
                if($cat['category']==$place['category']){$select = "selected";}
                $option .= '<option value="'.$cat['category'].'" '.$select.'>'.$cat['category'].'</option>';
            }
        }
        if(!empty($place))
        {
            return view('admin/place/add',['place'=>$place,'option'=>$option]);
        }
        else
        {
            return redirect('/admin/place/list')->with('error','Blog Not Found');
        }
    }
    public function DeletePlace(Request $request)
    {
      $delete = PlaceType::destroy($request->id);
      return redirect('/admin/place/list')->with('success','Blog Deleted Successfully');
    }
    public function CreatePlace(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ])->validate();
        $PlaceData = new PlaceType;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $PlaceData = PlaceType::find($request->id);
            $PlaceData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $PlaceData->created_at = date("Y-m-d H:i:s");
        }
        if($request->category)
        {
            $category = implode(',',$request->category);
        }
        $PlaceData->title = $request->title;
        $PlaceData->description = $request->description;
        $PlaceData->metatitle = $request->metatitle;
        $PlaceData->metadescription = $request->metadescription;
        $PlaceData->category = $category;
        $PlaceData->address = $request->address;
        $PlaceData->capacity = $request->capacity;
        $PlaceData->price = $request->price;
        $PlaceData->position = $request->position;
        $PlaceData->on_home_page = $request->on_home_page;
        if($request->hasFile('thumbnail'))
        {
            $name = time().rand(1,50).'.'.$request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('uploads/place/'.str_replace(' ','-',$request->title).'/thumbnail'), $name); 
            $path = 'uploads/place/'.str_replace(' ','-',$request->title).'/thumbnail/'.$name; 
            $PlaceData->thumbnail = $path;
        }
        if($PlaceData->save())
        {
            $item_id = $PlaceData->id;
            $table_name = 'place_type';
            $folder = 'place';
            $images = ImageController::uploadMultipleFiles($request,$item_id,$table_name,$folder);
            if($images)
            {
                return redirect('/admin/place/list')->with('success','Place add successfully');
            }
            else
            {
                return redirect('/admin/place/list')->with('error','Something Went Wrong');
            }
        }
        else
        {
            redirect('/admin/place/list')->with('error','Place not added');
        }
    }
}
