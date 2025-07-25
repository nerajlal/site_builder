<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
