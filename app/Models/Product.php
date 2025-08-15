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
        'key_features',
        'product_details_features',
        'styling_tips',
        'model_info',
        'garment_details',
        'size_chart',
        'fabric_details',
        'care_instructions',
        'care_tips',
    ];

    protected $casts = [
        'images' => 'array',
        'colors' => 'array',
        'sizes' => 'array',
        'key_features' => 'array',
        'product_details_features' => 'array',
        'styling_tips' => 'array',
        'model_info' => 'array',
        'garment_details' => 'array',
        'size_chart' => 'array',
        'fabric_details' => 'array',
        'care_instructions' => 'array',
        'care_tips' => 'array',
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
