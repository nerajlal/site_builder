<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section2 extends Model
{
    protected $table = 'section2';
    protected $fillable = [
        'header_footer_id',
        'main_text1',
        'sub_text1',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6'
    ];

    public function headerFooter()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }
}