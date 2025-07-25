<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section1 extends Model
{
    protected $table = 'section1';
    protected $fillable = [
        'header_footer_id',
        'main_heading',
        'sub_heading',
        'feature1_heading',
        'feature1_detail',
        'feature2_heading',
        'feature2_detail',
        'feature3_heading',
        'feature3_detail'
    ];

    public function headerFooter()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }
}
