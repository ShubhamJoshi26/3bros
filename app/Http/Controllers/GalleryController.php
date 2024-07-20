<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
class GalleryController extends Controller
{
    public function allImages(Request $req)
   {
        if(\request()->ajax()){
            $data = Gallery::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/gallery/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/gallery/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('image',function($row){
                    $src = URL::asset('public/'.$row['thumbnail']);
                    $imagetag = '<img src="'.$src.'" width="70px" height="70px">';
                    return $imagetag;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }
        $gallery = Gallery::all();
        return view('admin/gallery/list');
        
   }
   public function addImages(Request $req)
   {
        if(isset($req->id) && $req->id!='')
        {
            $gallery = Gallery::find($req->id);
            $galleryimages = ImageController::getAllUploadedFiles($req->id,'gallery');
            return view('admin/gallery/add',compact('gallery','galleryimages'));
        }
        else
        {
            return view('admin/gallery/add');
        }
   }

   public function createGallery(Request $req)
   {
        if(isset($req->id) && $req->id!='')
        {
            $Gallery = Gallery::find($req->id);
            $Gallery->updated_at = date('Y-m-d H:i:s',time());
        }
        else
        {
            $Gallery = new Gallery;
            $Gallery->created_at = date('Y-m-d H:i:s',time());
        }
        $Gallery->title = $req->title;
        $Gallery->description = $req->description;
        $Gallery->date = $req->date;
        $Gallery->type = $req->type;
        $Gallery->category = $req->category;
        if($req->hasFile('thumbnail'))
        {
            $title = str_replace(' ', '-', $req->title);
            $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title);
            $title = preg_replace('/-+/', '-', $title);
            $name = time().rand(1,50).'.'.$req->file('thumbnail')->extension();
            $req->file('thumbnail')->move(public_path('uploads/gallery/'.$title.'/thumbnail'), $name); 
            $path = 'uploads/gallery/'.$title.'/thumbnail/'.$name; 
            $Gallery->thumbnail = $path;
        }
        if($Gallery->save())
        {
            $item_id = $Gallery->id;
            $table_name = 'gallery';
            $folder = 'gallery';
            $images = ImageController::uploadMultipleFiles($req,$item_id,$table_name,$folder);
            if($images)
            {
                return redirect('/admin/gallery/list')->with('success','Place add successfully');
            }
            else
            {
                return redirect('/admin/gallery/list')->with('error','Something Went Wrong');
            }
        }
   }
   public function deleteGallery(Request $req)
   {
        $gallerydelete = Gallery::destroy($req->id);
        $galleryimages = ImageController::deleteAllImages($req->id);
        return redirect(url()->previous())->with('success','Gallery Deleted Successfully');
    }
   public function deleteImage(Request $req)
   {
        $deleteImage = ImageController::deleteimage($req->id);
        return redirect(url()->previous())->with('success','Image deleted Successfully');
   }

}
