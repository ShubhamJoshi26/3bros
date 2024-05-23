<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class CategoryController extends Controller
{
    public function CategoryList()
    {
        if(\request()->ajax()){
            $data = Category::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/category/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/category/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/category/list');
    }
    public function AddCategory()
    {
        return view('admin/category/add');
    }

    public function EditCategory(Request $request)
    {
        $category = Category::find($request->id)->toArray();
        if(!empty($category))
        {
            return view('admin/category/add',['category'=>$category]);
        }
        else
        {
            return redirect('/admin/category/list')->with('error','Blog Not Found');
        }
    }

    public function CreateCategory(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'category'=>'required',
            'status'=>'required',
        ])->validate();
        $CategoryData = new Category;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $CategoryData = Category::find($request->id);
            $CategoryData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $CategoryData->created_at = date("Y-m-d H:i:s");
        }
        $CategoryData->category = $request->category;
        $CategoryData->status = $request->status;
        if($CategoryData->save())
        {
            return redirect('/admin/category/list')->with('success','Category Added Successfully');
        }
        else
        {
            return redirect('/admin/category/list')->with('error','Something went wrong! Category Not Added');
        }

    }

    // public function UpdateBlog(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title'=>'requred|max:255',
    //         'description'=>'required',
    //     ]);
    //     $BlogData = Blog::find($request->id);
    //     $BlogData->title = $request->title;
    //     $BlogData->add_by = $request->add_by;
    //     $BlogData->description = $request->description;
    //     if($request->file('blog_image')!=null)
    //     {
    //         $name = time().rand(1,50).'.'.$request->file('blog_image')->extension();
    //         $request->file('blog_image')->move(public_path('uploads/blogimages'), $name); 
    //         $path = 'uploads/blogimages/'.$name; 
    //         $BlogData->image_path = $path;
    //     }
    //     if($BlogData->save())
    //     {
    //         return redirect('/blog/list')->with('success','Blog Updated Successfully');
    //     }
    //     else
    //     {
    //         return redirect('/blog/list')->with('error','Something went wrong! Blog Not Update');
    //     }

    // }

    public function DeleteCategory(Request $request)
    {
      $delete = Category::destroy($request->id);
      return redirect('/admin/category/list')->with('success','Category Deleted Successfully');
    }
    public function BlogCategoryList()
    {
        if(\request()->ajax()){
            $data = DB::table('blog_category')->get();
            return FacadesDataTables::of(json_decode($data,true))
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/blog/category/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/blog/category/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/blog/category/list');
    }
    public function AddBlogCategory()
    {
        return view('admin/blog/category/add');
    }

    public function EditBlogCategory(Request $request)
    {
        $category = DB::table('blog_category')->where('id',$request->id)->get();
        if(!empty($category))
        {
            $category = json_decode($category,true);
            return view('admin/blog/category/add',['category'=>$category[0]]);
        }
        else
        {
            return redirect('/admin/blog/category/list')->with('error','Blog Not Found');
        }
    }

    public function CreateBlogCategory(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'=>'required',
            'status'=>'required',
        ])->validate();
        $updatedata = $request->all();
        unset($updatedata['_token']);
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $updatedata['updated_at'] = date("Y-m-d H:i:s",time());
            $data = DB::table('blog_category')->where('id',$updatedata['id'])->update($updatedata);  
        }
        else
        {
            $updatedata['created_at'] = date("Y-m-d H:i:s",time());
            $data = DB::table('blog_category')->insert($updatedata);
        }
        if($data)
        {
            return redirect('/admin/blog/category/list')->with('success','Category Added Successfully');
        }
        else
        {
            return redirect('/admin/blog/category/list')->with('error','Something went wrong! Category Not Added');
        }

    }

    // public function UpdateBlog(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title'=>'requred|max:255',
    //         'description'=>'required',
    //     ]);
    //     $BlogData = Blog::find($request->id);
    //     $BlogData->title = $request->title;
    //     $BlogData->add_by = $request->add_by;
    //     $BlogData->description = $request->description;
    //     if($request->file('blog_image')!=null)
    //     {
    //         $name = time().rand(1,50).'.'.$request->file('blog_image')->extension();
    //         $request->file('blog_image')->move(public_path('uploads/blogimages'), $name); 
    //         $path = 'uploads/blogimages/'.$name; 
    //         $BlogData->image_path = $path;
    //     }
    //     if($BlogData->save())
    //     {
    //         return redirect('/blog/list')->with('success','Blog Updated Successfully');
    //     }
    //     else
    //     {
    //         return redirect('/blog/list')->with('error','Something went wrong! Blog Not Update');
    //     }

    // }

    public function DeleteBlogCategory(Request $request)
    {
      $delete = DB::table('blog_category')->where('id',$request->id)->delete();
      return redirect('/admin/blog/category/list')->with('success','Category Deleted Successfully');
    }

    // public function getAllBlog(Request $request)
    // {
    //     if($request->id)
    //     {
    //         $Blog = Blog::find($request->id)->toArray();
    //         if(!empty($Blog))
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20001'));
    //         }
    //         else
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>'Data Not Found','error_code'=>'20002'));
    //         }
    //     }
    //     else
    //     {
    //         $Blog = Blog::all()->toArray();
    //         if(!empty($Blog))
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20003'));
    //         }
    //         else
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>'No Records Found','error_code'=>'20004'));
    //         }
    //     }
    //     return $Blogs;
    // }
}
