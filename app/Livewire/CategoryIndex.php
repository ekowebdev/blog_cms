<?php

namespace App\Livewire;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use App\Livewire\Forms\CategoryForm;
use Illuminate\Validation\ValidationException;

class CategoryIndex extends Component
{
    use WithPagination, Toast;

    public CategoryForm $form;

    public int $perPage = 10;
    public bool $categoryModal = false;
    public bool $isEditMode = false;
    public string $search = '';

    public function mount()
    {
        view()->share('title', __('layout.categories_title_plural'));
    }

    public function save()
    {
        try {
            if ($this->isEditMode) {
                $this->form->update();
                $this->success(__('layout.success_updated_category'));
            } else {
                $this->form->store();
                $this->success(__('layout.success_created_category'));
            }

            $this->form->clear();
            $this->reset(['categoryModal', 'isEditMode']);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error('Category Save Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to save category: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            $this->form->setCategory($category);
            $this->resetValidation();
            $this->isEditMode = true;
            $this->categoryModal = true;
        } catch (\Throwable $e) {
            Log::error('Category Edit Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to load category for edit: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            $this->success(__('layout.success_deleted_category'));
        } catch (\Throwable $e) {
            Log::error('Category Delete Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to delete category: ' . $e->getMessage(), timeout: 8000);
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
        $this->categoryModal = true;
    }

    public function closeModal()
    {
        $this->form->clear();
        $this->reset(['isEditMode', 'categoryModal']);
        $this->resetValidation();
    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->perPage);

        $headers = [
            ['key' => 'no', 'label' => '#'],
            ['key' => 'name', 'label' => __('layout.name_form')],
            ['key' => 'slug', 'label' => __('layout.slug_form')],
        ];

        return view('livewire.category-index', [
            'categories' => $categories,
            'headers' => $headers,
        ]);
    }
}
