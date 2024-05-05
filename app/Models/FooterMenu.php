<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    use HasFactory;
    protected $table = 'footer_menu';
    public $timestamps = false;

    public static function MenuList()
    {
        $allMenu = FooterMenu::orderBy('position')->get();
        if(!empty($allMenu))
        {
            return self::menu($allMenu);
        }
    }
    public static function menu($data)
    {
        $headerarr = [];
        foreach($data as $k=>$v)
        {
            $headerarr[$v->location][] = $v;
        }
        return $headerarr;
    }
}
