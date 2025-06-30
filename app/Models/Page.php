<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'body',
        'status',
    ];

    public function scopeGetAll($query)
    {
        return $query->select([
                    'id',
                    'title',
                    'slug',
                    'body',
					'status',
                ]);
    }
}
