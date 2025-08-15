<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'original_price',
        'quantity',
        'brand_id',
        'category_name',
        'header_footer_id',
        'image_url',
        'images',
        'video_url',
        'description',
        'colors',
        'sizes',
        'details',
    ];

    protected $casts = [
        'images' => 'array',
        'colors' => 'array',
        'sizes' => 'array',
        'details' => 'array',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function site()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }
}
