<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSectionM extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pageSection';

    protected $fillable = [
        'pageId',
        'pageSectionTitle',
        'pageSectionContent',
    
      
    ];
  
   
}
