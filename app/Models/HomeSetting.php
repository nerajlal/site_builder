<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $table = 'home_settings';

    protected $fillable = [
        'user_id',
        'header_footer_id',
        'main_text',
        'sub_text',
        'button1_text',
        'button2_text',
    ];

    public function headerFooter()
    {
        return $this->belongsTo(HeaderFooter::class, 'header_footer_id');
    }
}
