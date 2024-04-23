<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageSectionM;
use Illuminate\Support\Facades\DB;
use DataTables;
use Image;
use encore\Admin\Form;



class PageController extends Controller
{
     public function listpage(Request $request)
     {
        $data = Page::select('id', 'pageTitle', 'pageURL', 'pageMetaTitle')->get();
        if ($request->ajax()) { 
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '
                        <div class="buttons right nowrap">
                            <button class="button btn btn-success small green --jb-modal"  data-target="sample-modal-2" type="button">
                                <a href="'.url('/').'/admin/page/edit/'.$row->id.'" title="edit" style="color:white;">Edit
                                </a>
                            </button>
            
                            <button class="button btn btn-danger small red --jb-modal" data-target="sample-modal" type="button">
                                <a onclick="return ConfirmDelete()" href="'.url('/').'/admin/page/delete/'.$row->id.'" title="delete" style="color:white;">Delete
                                </a>
                            </button>
                        </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.page.page');
    }

     public function add(Request $request)
     {

        $page = Page::select('id','pageTitle')->get();

        $pageparentdata = $this->getPage();
        
        return view('admin.page.pageform', compact('page','pageparentdata'));

     }

     public function getPage($id=NULL)
	{
        try {
            $row = Page::select('page.id', 'page.pageParent', 'page.pageTitle')
                ->where('page.status', '1')
                ->orderBy('page.id', 'desc')
                ->get();
        
            if (isset($id)) {
                $product_category = $this->get_parent_page($id);
                if (!empty($product_category)) {
                    foreach ($product_category as $category) {
                        $cat_product['category'][$category->id] = $category;
                    }
                } else {
                    $cat_product = array();
                }
            } else {
                $cat_product = array();
            }
        
            $cat = array(
                'items' => array(),
                'parents' => array()
            );
        
            foreach ($row as $cats) {
                $cat['items'][$cats->id] = $cats;
                $cat['parents'][$cats->pageParent]['id'] = $cats->id;
                $cat['parents'][$cats->pageParent]['pageTitle'] = $cats->pageTitle;
            }
        
            if ($cat) {
                $result = $this->build_page_menu(0, $cat, $cat_product);
                return $result;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Handle the exception here
        }
        

	}

	public function get_parent_page($id)
	{
      
        $row = Page::select('page.id','page.pageParent','page.pageTitle')->where('page.id',$id)->get();
        return $row;
        
    }

	public function build_page_menu($parent, $menu, $cat_product) {
        
        $html = "";
        try {
            if (isset($menu['parents'][$parent])) {
                $html .= "<select name='pageParent' class='form-control select2'>";
                $html .= "<option value='0' selected='selected'>none</option>";
                foreach ($menu['items'] as $key => $val) {
                    if (!isset($menu['parents'][$key])) {
                        if ($menu['items'][$key]->pageParent == '0') {
                            $select = (isset($cat_product['category'][$key]->id) && $cat_product['category'][$key]->id == $menu['items'][$key]->id) ? "selected" : '';
                            $html .= "<option value='".$menu['items'][$key]->id."'".$select.">".$menu['items'][$key]->pageTitle."</option>";
                        } else {
                            $select = (isset($cat_product['category'][$key]->id) && $cat_product['category'][$key]->id == $menu['items'][$key]->id) ? "selected" : '';
                            $parnt_name = $this->get_name($menu['items'][$key]->id);
                            $html .= "<option value='".$menu['items'][$key]->id."'".$select.">".$parnt_name."->".$menu['items'][$key]->pageTitle."</option>";
                        }
                    }
                    if (isset($menu['parents'][$key])) {
                        if ($menu['items'][$key]->pageParent == '0') {
                            $select = (isset($cat_product['category'][$key]->id) && $cat_product['category'][$key]->id == $menu['items'][$key]->id) ? "selected" : '';
                            $html .= "<option value='".$menu['items'][$key]->id."' class='parent' ".$select.">".$menu['items'][$key]->pageTitle."</option>";
                        } else {
                            $select = (isset($cat_product['category'][$key]->id) && $cat_product['category'][$key]->id == $menu['items'][$key]->id) ? "selected" : '';
                            $parnt_name = $this->get_name($menu['items'][$key]->id);
                            $html .= "<option value='".$menu['items'][$key]->id."' class='parent' ".$select.">".$parnt_name."->".$menu['items'][$key]->pageTitle."</option>";
                        }
                    }
                }
                $html .= "</select>";
            }
        } catch (Exception $e) {
            // Handle the exception here
        }
        
        return $html;
        
    }

    public function get_name($id)
	{
        try {
            $result = DB::table('page AS p')
            ->select('pp.id', 'pp.pageTitle')
            ->join('page AS pp', 'p.pageParent', '=', 'pp.id')
            ->where('p.id', $id)
            ->where('p.status', '1')
            ->first();

            if(!empty($result))
            {
            return $result->pageTitle;
            }
            else
            {
            return "";
            }
        }
        catch (Exception $e) {
            // Handle the exception here
        }
       
	}
	

     public function edit($id,Request $request)
     {
   
        $pageparentdata = $this->getPage($id);
        $pageData = Page::where('id',$id)->first();
        $pagesectionData =  DB::table("pageSection")->where('pageId',$id)->get();

        

        return view('admin.page.pageedit', compact('pageparentdata','pageData','pagesectionData'));

     }

     public function update($id,Request $request)
     {
        try {
            $page = Page::find($id);
        
            if ($request->file('picture') != "") {
                $image = $request->file('picture');
                $input['imagename'] = time().'.'.$image->extension();
        
                $filePath = 'images/page';
        
                $image_path = $filePath.'/'.$input['imagename'];
                Image::make($request->file('picture'))
                    ->fit(120, 180)
                    ->save($image_path, 80);
            } else {
                $image_path = $request->imagename;
            }

            $page->pageTitle = $request->pageTitle;
            $page->pageContent = $request->pageContent;

            $page->pageContent1 = $request->pageContent2;
            $page->pageContent2 = $request->pageContent3;
            $page->registration = $request->registration;
            $page->pageParent = $request->pageParent;
            $page->pageCategory = "0";
            $page->pageMetaTitle = $request->pageMetaTitle;
            $page->pageMetaKeywords = $request->pageMetaKeywords;
            $page->pageMetaDescription = $request->pageMetaDescription;
            $page->pageURL = strtolower($this->create_slug($request->pageURL));
            $page->pageType = $request->pageType;
            $page->pageBanner = $image_path;
            $page->status = $request->status;
        
            $page->update();
            
            
            if ($request->pageSectionTitle['0'] != "" && $request->pageContentSection['0'] != "") {
                    $data_content = [];
                    
                    foreach ($request->pageSectionTitle as $key => $val) {
                        if($val != "") {
                            $data_content[$key]["pageSectionTitle"] = $val;
                            $data_content[$key]["pageSectionContent"] = $request->pageContentSection[$key];
                        }
                    }
              

                    $data_section = [];
                    if(!empty($data_content))
                    {
    
                        foreach ($data_content as $key => $value) {
                            $data_section[$key]["pageId"] = $id;
                            $data_section[$key]["pageSectionTitle"] = $value["pageSectionTitle"];
                            $data_section[$key]["pageSectionContent"] = $value["pageSectionContent"];
                        }
                        
                        DB::table("pageSection")->where("pageId", $id)->delete();

        
                        DB::table("pageSection")->insert($data_section);
                    
                    }
                
            }
        
            return redirect('admin/page/listpage')->with('success', 'Data has been successfully Updated.');
        } catch (Exception $e) {
            // Handle the exception here
        }
    }
        
        public function delete($id, Request $request)
        {
            try {
                $page = Page::find($id);
                $page->delete();
        
                return redirect('admin/page/listpage')->with('success', 'Data has been successfully deleted.');
            } catch (Exception $e) {
                // Handle the exception here
            }
        }
        
        public function create_slug($string)
        {
            try {
                $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
                return $slug;
            } catch (Exception $e) {
                // Handle the exception here
            }
        }
        
        public function submit(Request $request)
        {
            try {
                $validated = $request->validate([
                    'pageTitle' => 'required|unique:page|max:255',
                    'pageURL' => 'required',
                    'pageContent' => 'required',
                    'pageMetaTitle' => 'required',
                    'pageMetaDescription' => 'required',
                ]);
        
                if ($request->file('picture') != "") {
                    $image = $request->file('picture');
                    $input['imagename'] = time().'.'.$image->extension();
        
                    $filePath = 'images/page';
        
                    $image_path = $filePath.'/'.$input['imagename'];
                    Image::make($request->file('images'))
                        ->fit(120, 180)
                        ->save($image_path, 80);
                } else {
                    $image_path = "";
                }
                
                
        
                $page = Page::create([
                    'pageTitle' => $request->pageTitle,
                    'pageContent' => $request->pageContent,
                    'pageContent1' => $request->pageContent2,
                    'pageContent2' => $request->pageContent3,
                    'registration' => $request->registration,
                    'pageParent' => $request->pageParent,
                    'pageCategory' => "0",
                    'pageMetaTitle' => $request->pageMetaTitle,
                    'pageMetaKeywords' => $request->pageMetaKeywords,
                    'pageMetaDescription' => $request->pageMetaDescription,
                    'pageURL' => strtolower($this->create_slug($request->pageURL)),
                    'pageType' => $request->pageType,
                    'pageBanner' => $image_path,
                    'status' => $request->status
                ]);
                
                
                $pageid = $page->id;
 
                if ($request->pageSectionTitle['0'] != "" && $request->pageContentSection['0'] != "") {
                    $data_content = [];
                    
                    foreach ($request->pageSectionTitle as $key => $val) {
                        if($val != "") {
                            $data_content[$key]["pageSectionTitle"] = $val;
                            $data_content[$key]["pageSectionContent"] = $request->pageContentSection[$key];
                        }
                    }
              

                    $data_section = [];
                    if(!empty($data_content))
                    {
    
                        foreach ($data_content as $key => $value) {
                            $data_section[$key]["pageId"] = $pageid;
                            $data_section[$key]["pageSectionTitle"] = $value["pageSectionTitle"];
                            $data_section[$key]["pageSectionContent"] = $value["pageSectionContent"];
                        }
        
                        DB::table("pageSection")->insert($data_section);
                    
                    }
                
                }

        
                return redirect('admin/page/listpage')->with('success', 'Data has been successfully Inserted.');
            }  catch (Exception $e) {
                // Handle the exception here
            }
        }
       
}
