<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterMenu;
use Yajra\DataTables\DataTables;
class FooterMenuController extends Controller
{
    public function allMenu()
    {
        if(\request()->ajax()){
            $data = FooterMenu::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/footermenu/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/admin/footermenu/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/footermenu/list');
    }
    public function AddMenu()
    {
        return view('admin/footermenu/add');
    }
    public function CreateMenu(Request $req)
    {
        if(isset($req->id) && $req->id!='')
        {
            $FooterMenu = FooterMenu::find($req->id);
            $FooterMenu->updated_at = date('Y-m-d H:i:s',time());
            $FooterMenu->location = $req->location;
            $FooterMenu->title = $req->title;
            $FooterMenu->status = $req->status;
            $FooterMenu->position = $req->position;
        }
        else
        {
            $FooterMenu = new FooterMenu;
            $FooterMenu->created_at = date('Y-m-d H:i:s',time());
            $FooterMenu->location = $req->location;
            $FooterMenu->title = $req->title;
            $FooterMenu->status = $req->status;
            $FooterMenu->position = $req->position;
        }
        if($FooterMenu->save())
        {
            return redirect(route('allfootermenu'))->with('success','Menu Add Successfull');
        }
        else{
            return redirect(route('allfootermenu'))->with('error','Something went wrong');
        }
    }
    public function EditMenu(Request $req)
    {
        $menu = FooterMenu::find($req->id);
        if(!empty($menu))
        {
            return view('admin/footermenu/add',['menu'=>$menu->toArray()]);
        }
        else
        {
            return view('admin/footermenu/add');
        }
    }
    public function DeleteMenu(Request $req)
    {
        $delete = FooterMenu::destroy($req->id);
        return redirect(route('allfootermenu'))->with('success','Menu Deleted Successfull');
    }
}
