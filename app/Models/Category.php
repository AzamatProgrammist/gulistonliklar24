<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_uz', 'name_ru', 'slug', 'mete_title', 'mete_description', 'mete_keywords'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
