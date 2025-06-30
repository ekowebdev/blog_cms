<?php

namespace App\Livewire;

use App\Models\Post;
use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Livewire\Forms\PostForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PostIndex extends Component
{
    use WithPagination, WithFileUploads, Toast;

    public PostForm $form;

    public int $perPage = 10;
    public bool $postModal = false;
    public bool $isEditMode = false;
    public string $search = '';

    public function mount()
    {
        view()->share('title', __('layout.posts_title_plural'));
    }

    public function save()
    {
        try {
            if ($this->isEditMode) {
                $this->form->update();
                $this->success(__('layout.success_updated_post'));
            } else {
                $this->form->store();
                $this->success(__('layout.success_created_post'));
            }

            $this->form->clear();
            $this->reset(['postModal', 'isEditMode']);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error('Post Save Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to save post: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);
            $this->form->setPost($post);
            $this->resetValidation();
            $this->isEditMode = true;
            $this->postModal = true;
        } catch (\Throwable $e) {
            Log::error('Post Edit Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to load post for edit: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function delete($id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $post->categories()->detach();
            $post->delete();

            $this->success(__('layout.success_deleted_post'));
        } catch (\Throwable $e) {
            Log::error('Post Delete Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to delete post: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function showModal()
    {
        $this->form->clear();
        $this->reset(['isEditMode']);
        $this->resetValidation();
        $this->postModal = true;
    }

    public function closeModal()
    {
        $this->form->clear();
        $this->reset(['isEditMode', 'postModal']);
        $this->resetValidation();
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->perPage);

        $headers = [
            ['key' => 'no', 'label' => '#'],
            ['key' => 'title', 'label' => __('layout.title_form')],
            ['key' => 'short_description', 'label' => __('layout.short_description_form')],
            ['key' => 'categories', 'label' => __('layout.categories_form')],
            ['key' => 'status', 'label' => __('layout.status_form')],
        ];

        $categories = \App\Models\Category::all()
                ->map(fn($c) => ['id' => $c->id, 'name' => $c->name])
                ->toArray();
        
        $status = [
            ['id' => 'draft', 'name' => 'Draft'],
            ['id' => 'published', 'name' => 'Published'],
        ];

        return view('livewire.post-index', [
            'posts' => $posts,
            'headers' => $headers,
            'categories' => $categories,
            'status' => $status,
        ]);
    }
}