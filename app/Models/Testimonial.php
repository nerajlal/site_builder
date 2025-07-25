<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = [
        'header_footer_id',
        'testi_main',
        'testi_sub',
        'testi1',
        'testi_user1',
        'testi2',
        'testi_user2',
        'testi3',
        'testi_user3',
    ];

    public function headerFooter()
    {
        return $this->belongsTo(HeaderFooter::class);
    }

}
