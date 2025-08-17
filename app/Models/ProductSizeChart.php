<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeChart extends Model
{
    use HasFactory;

    protected $table = 'product_size_chart';

    protected $fillable = [
        'product_id',
        'size',
        'measurements',
    ];

    protected $casts = [
        'measurements' => 'array',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
