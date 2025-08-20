<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'header_footer_id',
        'name',
        'whatsapp',
        'password',
        'phone',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    public function site()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }
}


