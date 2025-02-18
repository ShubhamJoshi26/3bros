<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use DataTables;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function GenerateTocken()
    {
    return csrf_token(); 
    }
    public function BlogList()
    {
        if(\request()->ajax()){
            $data = Blog::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/blog/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/blog/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/blog/list');
    }
    public function AddBlog()
    {
        $session = session()->all();
        $category = Category::all()->toArray();
        $option ='<option></option>';
        if(!empty($category))
        {
           if(isset($session['siteid']) && $session['siteid']!='')
           {
            foreach($category as $cat)
            {
                if($cat['siteid']==$session['siteid'])
                {
                    $option .= '<option value="'.$cat['category'].'">'.$cat['category'].'</option>';
                }
            }
           }
           else
           {
                foreach($category as $cat)
                {
                    $option .= '<option value="'.$cat['category'].'">'.$cat['category'].'</option>';
                }
           }
        }
        return view('admin/blog/add',['option'=>$option]);
    }

    public function EditBlog(Request $request)
    {
        $blogs = Blog::find($request->id)->toArray();
        $category = Category::all()->toArray();
        $option ='<option></option>';
        if(!empty($category))
        {
            
            foreach($category as $cat)
            {
                $select = '';
                if($cat['category']==$blogs['category']){$select = "selected";}
                $option .= '<option value="'.$cat['category'].'" '.$select.'>'.$cat['category'].'</option>';
            }
        }
        if(!empty($blogs))
        {
            return view('admin/blog/add',['blogs'=>$blogs,'option'=>$option]);
        }
        else
        {
            return redirect('/admin/blog/list')->with('error','Blog Not Found');
        }
    }

    public function CreateBlog(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ])->validate();
        $BlogData = new Blog;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $BlogData = Blog::find($request->id);
            $BlogData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $BlogData->created_at = date("Y-m-d H:i:s");
        }
        $add_by ='';
        if(Auth::user()->name)
        {
            $add_by = Auth::user()->name; 
        }
        else
        {
            return 'Not authorized';
        }
        $BlogData->title = $request->title;
        $BlogData->add_by = $add_by;
        $BlogData->description = $request->description;
        $BlogData->metatitle = $request->metatitle;
        $BlogData->metadescription = $request->metadescription;
        $BlogData->category = $request->category;
        if($request->file('blog_image')!=null)
        {
            $name = time().rand(1,50).'.'.$request->file('blog_image')->extension();
            $request->file('blog_image')->move(public_path('uploads/blogimages'), $name); 
            $path = 'uploads/blogimages/'.$name; 
            $BlogData->image_path = $path;
        }
        if($BlogData->save())
        {
            return redirect('/admin/blog/list')->with('success','Blog Added Successfully');
        }
        else
        {
            return redirect('/admin/blog/list')->with('error','Something went wrong! Blog Not Added');
        }

    }
    public function DeleteBlog(Request $request)
    {
      $delete = Blog::destroy($request->id);
      return redirect('/admin/blog/list')->with('success','Blog Deleted Successfully');
    }

    public function getAllBlog(Request $request)
    {
        if($request->id)
        {
            $Blog = Blog::find($request->id)->toArray();
            if(!empty($Blog))
            {
                $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20001'));
            }
            else
            {
                $Blogs = json_encode(array('success'=>'true','data'=>'Data Not Found','error_code'=>'20002'));
            }
        }
        else
        {
            $Blog = Blog::all()->toArray();
            if(!empty($Blog))
            {
                $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20003'));
            }
            else
            {
                $Blogs = json_encode(array('success'=>'true','data'=>'No Records Found','error_code'=>'20004'));
            }
        }
        return $Blogs;
    }
}


