<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'page';

    protected $fillable = [
        'pageTitle',
        'pageContent',
        'pageContent1',
        'pageContent2',
        'registration',
        'pageParent',
        'pageCategory',
        'pageMetaTitle',
        'pageMetaKeywords',
        'pageMetaDescription',
        'pageURL',
        'pageType',
        'pagePublished',
        'pageBanner',
        'status',
    ];

    public $timestamps = true; 
}
