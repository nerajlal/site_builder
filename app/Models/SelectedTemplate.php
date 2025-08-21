<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedTemplate extends Model
{
    use HasFactory;

    protected $table = 'selected_templates'; // Adjust this to your actual table name

    protected $fillable = [
        'template_name',
        'header_footer_id',
        'created_at',
        'updated_at',
    ];
}
