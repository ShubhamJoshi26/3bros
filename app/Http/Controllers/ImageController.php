<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Images;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     *   This Method is only for save multiple files in folder
     *   This Method is return boolean value
     *
     * @param  object   $data       whole image data
     * @param  integer  $item_id    this is saved item id
     * @param  string   $table      table name reference for item id
     * @param  string   $folder     folder name where you want to save
     * @return bool
     */
   public static function uploadMultipleFiles(Request $data,$item_id,$table,$folder='misc')  
   {
       if($data->hasFile('images'))
       {
            foreach($data->file('images') as $file)
            {
                
                $name = time().rand(1,50).'.'.$file->extension();
                $file->move(public_path('/uploads/'.$folder.'/'.$data->title.'/images/'), $name); 
                $path = '/uploads/'.$folder.'/'.$data->title.'/images/'.$name; 
                $images = new Images;
                $images->path = $path;
                $images->item_id = $item_id;
                $images->table_name = $table;
                $images->save();
            }
            return true;
       } 
       else
       {
        return false;
       }
   }
      
}
