<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Events;
use App\Models\Gallery;
use App\Models\Images;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $event = Events::take(5)->get()->toArray();
        $blog = Blog::orderBy('created_at','desc')->take(3)->get()->toArray();
        $venue = PlaceType::where('on_home_page','yes')->orderBy('position','asc')->get()->take(3)->toArray();
        $gallery = Gallery::take(6)->get();
        $metadata['metatitle']= '';
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        return view('index',compact('venue','event','blog','gallery','metadata'));
    }
    public function allVenues()
    {
        $venue = PlaceType::all();
        $title = 'Banquets-In-Delhi';
        if(!empty($venue))
        {
            $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
            $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
            $metadata['metatitle']= '';
            return view('venue_list',compact('venue','title','metadata'));
        }
        else
        {
            return redirect(url()->previous());
        }
    }
    public function submitenquiry(Request $request)
    {
        $data = $request->all();
        $res['success'] = false;
        if($data['g-recaptcha-response']!='' && $data['g-recaptcha-response']!=null)
        {
            $res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdCr9gpAAAAAMaoY96CnTPAZec9IcMBq0sbpM1h&response=".$data['g-recaptcha-response']."&remoteip=".$request->ip()),true);
        }
        if($res['success'] === false)
        {
            return redirect(url()->previous())->with('error','Please Fill The Captcha');
        }
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
    function allBlogs(Request $request)
    {
        if(isset($request->category) && $request->category!='')
        {
            $bloglist = Blog::where('category',$request->category)->orderBy('created_at','desc')->get();
            if(!empty($bloglist))
            {
                $bloglist = $bloglist->toArray();
            }
        }
        else
        {
            $bloglist = Blog::orderBy('created_at','desc')->all();
            if(!empty($bloglist))
            {
                $bloglist = $bloglist->toArray();
            }
        }
        $blogs = $this->paginate($bloglist,10);
        $blogcategory = DB::table('blog_category')->get();
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('blogs',compact('blogs','blogcategory','metadata'));
    }
    function blogDetails($title)
    {
        $blogs = Blog::orderBy('created_at','desc')->get()->toArray();
        $blog = Blog::where('customurl',$title)->get()->toArray();
        $blogcategory = DB::table('blog_category')->get();
        $metadata['metatitle']= $blog[0]['metatitle'];
        $metadata['metadescription']= $blog[0]['metadescription'];
        $metadata['metakeywords']= $blog[0]['metakeywords'];
        return view('blog-details',compact('blog','blogs','blogcategory','metadata'));
    }
    function vanueDetails($title)
    {
        $table = 'place_type';
        $venue = PlaceType::where('customurl',$title)->get()->toArray();
        $images = ImageController::getAllUploadedFiles($venue[0]['id'],$table);
        $allvenue = PlaceType::all()->toArray();
        $metadata['metatitle']= $venue[0]['metatitle'];;
        $metadata['metadescription']= $venue[0]['metadescription'];
        $metadata['metakeywords']= $venue[0]['metakeywords'];
        return view('venue_details',compact('images','venue','allvenue','metadata'));
    }
    function banquetDetails($location,$url)
    {
        $table = 'place_type';
        $venue = PlaceType::where('customurl',$url)->get()->toArray();
        $images = ImageController::getAllUploadedFiles($venue[0]['id'],$table);
        $allvenue = PlaceType::all()->toArray();
        $metadata['metatitle']= $venue[0]['metatitle'];;
        $metadata['metadescription']= $venue[0]['metadescription'];
        $metadata['metakeywords']= $venue[0]['metakeywords'];
        return view('venue_details',compact('images','venue','allvenue','metadata'));
    }
    function banquetlist($title)
    {
        $venuein = str_replace('banquets-in-','',strtolower($title));
        $location = str_replace('-',' ',$venuein);
        $venue = PlaceType::where('address','like',"%$location%")->get();
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('venue_list',compact('venue','title','metadata')); 
    }
    function allGallery()
    {
        $gallery = Gallery::all();
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('galley',compact('gallery','metadata'));
    }
    function aniversary()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('anniversary-celebration',compact('metadata'));
    }
    function birthday()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('wow-birthday-theme',compact('metadata'));
    }
    function whychoose()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('why-choose',compact('metadata'));
    }
    function bestparty()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('best-party',compact('metadata'));
    }
    function contactus()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('contact-us',compact('metadata'));
    }
    function privacy()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('privacy-policy',compact('metadata'));
    }
    function termandcondition()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('terms-and-condition',compact('metadata'));
    }
    function disclaimer()
    {
        $metadata['metakeywords']= "largest banquet company, largest restaurant company, banquets for wedding in Noida, catering service in Noida, best farm house for destination weddings";
        $metadata['metadescription']= "#3BROS is the top choice when it comes to fine dining, banquets, party halls, catering, restaurants, and farmhouses. Delhi NCR's largest banquet company has over 100 venue experiences in Sector 63, Noida.";
        $metadata['metatitle']= '';
        return view('disclaimer',compact('metadata'));
    }
}