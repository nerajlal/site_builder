<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_footer_id',
        'site_customer_id',
        'total_amount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(SiteCustomer::class, 'site_customer_id');
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
