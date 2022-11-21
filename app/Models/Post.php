<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'title_uz', 'title_ru', 'body_uz', 'body_ru', 'image', 'slug', 'view', 'mete_title', 'mete_description', 'mete_keywords', 'is_special'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($post){
            $post->slug = \Str::slug($post->title_uz);
        });
    }
}
