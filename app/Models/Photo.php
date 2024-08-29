<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function homes()
    {
        return $this->belongsToMany(Home::class, 'home_photo', 'photo_id', 'home_id');
    }
}
