<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'posts' => $this->posts->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'short_description' => $post->short_description,
                    'content' => $post->content,
                    'image' => $post->image,
                    'status' => $post->status,
                    'published_at' => $post->published_at,
                    'fpublished_at' => \Carbon\Carbon::parse($post->published_at)->format('d M Y H:i:s'),
                ];
            }),
        ];
    }
}
