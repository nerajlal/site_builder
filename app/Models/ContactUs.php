<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = [
        'header_footer_id',
        'contact_name',
        'contact_sub',
        'contact_phone',
        'contact_hours',
        'contact_email',
        'contact_building',
        'contact_line1',
        'contact_line2',
    ];

    public function headerFooter()
    {
        return $this->belongsTo(HeaderFooter::class);
    }
}
