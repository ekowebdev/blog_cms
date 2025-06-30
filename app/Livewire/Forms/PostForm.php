<?php 

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PostForm extends Form
{
    use WithFileUploads;
    
    public ?Post $post = null;

    public string $title = '';
    public string $short_description = '';
    public string $content = '';
    public $image = null;
    public array $selectedCategories = [];
    public string $status = 'draft';

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->short_description = $post->short_description;
        $this->content = $post->content;
        $this->image = $post->image;
        $this->status = $post->status;
        $this->selectedCategories = $post->categories()->pluck('id')->toArray();
    }

    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'max:50',
                Rule::unique('posts', 'title')->ignore($this->post?->id),
            ],
            'short_description' => 'required|string|max:100',
            'content' => 'required|string|min:20',
            'selectedCategories' => 'required|array',
            'status' => 'required|in:draft,published',
        ];

        if ($this->image && is_object($this->image)) {
            $rules['image'] = 'image|max:2048';
        }

        return $rules;
    }

    public function store()
    {
        $this->validate();

        $imagePath = $this->image && is_object($this->image)
            ? $this->image->store('images/posts', 'public')
            : null;

        $post = Post::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'short_description' => Str::limit($this->short_description, 100),
            'content' => $this->content,
            'image' => $imagePath,
            'status' => $this->status,
            'published_at' => $this->status === 'published' ? now() : null,
        ]);

        $post->categories()->sync($this->selectedCategories);
    }

    public function update()
    {
        $this->validate();

        if ($this->image || is_object($this->image)) {
            if ($this->post->image && Storage::disk('public')->exists($this->post->image)) {
                Storage::disk('public')->delete($this->post->image);
            }
            $this->post->image = $this->image->store('images/posts', 'public');
        }

        $originalStatus = $this->post->status;
        $newStatus = $this->status;
        $publishedAt = $this->post->published_at;

        if ($originalStatus === 'published' && $newStatus === 'draft') {
            $publishedAt = null;
        } elseif ($originalStatus === 'draft' && $newStatus === 'published') {
            $publishedAt = now();
        }

        $this->post->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'short_description' => Str::limit($this->short_description, 100),
            'content' => $this->content,
            'image' => $this->post->image ?? null,
            'status' => $this->status,
            'published_at' => $publishedAt,
        ]);

        $this->post->categories()->sync($this->selectedCategories);
    }

    public function clear()
    {
        $this->reset([
            'title', 'short_description', 'content',
            'image', 'selectedCategories', 'status'
        ]);
        $this->post = null;
    }
}
