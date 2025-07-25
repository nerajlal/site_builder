<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    
    protected $table = 'header_footer';

    protected $fillable = [
        'user_id',
        'site_name',
        'features',
        'brands',
        'collections',
        'contact',
        'footer_text'
    ];
}
