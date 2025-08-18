<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_footer_id',
        'site_customer_id',
        'session_id',
        'product_id',
        'quantity',
        'options',
    ];

    protected $casts = [
        'options' => 'json',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(SiteCustomer::class, 'site_customer_id');
    }
}
