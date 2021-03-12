<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title, image_path, image_alt_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
