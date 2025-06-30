<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'image',
        'status',
        'published_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function scopeGetAll($query)
    {
        return $query->select([
                    'id',
                    'title',
                    'slug',
                    'short_description',
                    'content',
					'image',
					'status',
					'published_at',
                ]);
    }
}
