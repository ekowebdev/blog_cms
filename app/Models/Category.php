<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_posts');
    }

    public function scopeGetAll($query)
    {
        return $query->select([
                    'id',
                    'name',
                    'slug',
                ]);
    }
}
