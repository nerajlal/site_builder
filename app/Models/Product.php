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
        'video_url',
        'description',
        'sizes',
        'key_features',
        'product_details_features',
        'care_tips',
    ];

    protected $casts = [
        'sizes' => 'array',
        'key_features' => 'array',
        'product_details_features' => 'array',
        'care_tips' => 'array',
    ];

    public function getKeyFeaturesAttribute($value)
    {
        $data = json_decode($value, true);
        if (is_string($data)) {
            return json_decode($data, true) ?? [];
        }
        return $data ?? [];
    }

    public function getCareTipsAttribute($value)
    {
        $data = json_decode($value, true);
        if (is_string($data)) {
            return json_decode($data, true) ?? [];
        }
        return $data ?? [];
    }

    public function getProductDetailsFeaturesAttribute($value)
    {
        $data = json_decode($value, true);
        if (is_string($data)) {
            return json_decode($data, true) ?? [];
        }
        return $data ?? [];
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function site()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function stylingTips()
    {
        return $this->hasMany(ProductStylingTip::class);
    }

    public function modelInfo()
    {
        return $this->hasMany(ProductModelInfo::class);
    }

    public function garmentDetails()
    {
        return $this->hasMany(ProductGarmentDetail::class);
    }

    public function sizeChart()
    {
        return $this->hasMany(ProductSizeChart::class);
    }

    public function fabricDetails()
    {
        return $this->hasMany(ProductFabricDetail::class);
    }

    public function careInstructions()
    {
        return $this->hasMany(ProductCareInstruction::class);
    }

    public function faqs()
    {
        return $this->hasMany(ProductFaq::class);
    }
}
