<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FooterMenu;
use Database;
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
}
