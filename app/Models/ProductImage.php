<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_url',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute($value)
    {
        if (str_starts_with($value, 'http')) {
            return $value;
        }
        if (str_starts_with($value, '/storage/')) {
            return asset(ltrim($value, '/'));
        }
        return asset('storage/' . $value);
    }
}
