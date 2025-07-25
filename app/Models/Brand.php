<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable = [
        'name',
        'header_footer_id',  // site_id
    ];

    public function site()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
