<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'buy_quantity',
        'offer_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
