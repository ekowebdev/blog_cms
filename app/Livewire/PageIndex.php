<?php

namespace App\Livewire;

use App\Models\Page;
use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\Forms\PageForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class PageIndex extends Component
{
    use WithPagination, Toast;

    public PageForm $form;

    public int $perPage = 10;
    public bool $pageModal = false;
    public bool $isEditMode = false;
    public string $search = '';

    public function mount()
    {
        view()->share('title', __('layout.pages_title_plural'));
    }

    public function save()
    {
        try {
            if ($this->isEditMode) {
                $this->form->update();
                $this->success(__('layout.success_updated_page'));
            } else {
                $this->form->store();
                $this->success(__('layout.success_created_page'));
            }

            $this->form->clear();
            $this->reset(['pageModal', 'isEditMode']);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error('Page Save Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to save page: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function edit($id)
    {
        try {
            $page = Page::findOrFail($id);
            $this->form->setPage($page);
            $this->resetValidation();
            $this->isEditMode = true;
            $this->pageModal = true;
        } catch (\Throwable $e) {
            Log::error('Page Edit Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to load page for edit: ' . $e->getMessage(), timeout: 8000);
            } else {
                $this->error(__('layout.error_generic'));
            }
        }
    }

    public function delete($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->delete();
            $this->success(__('layout.success_deleted_page'));
        } catch (\Throwable $e) {
            Log::error('Page Delete Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            if (env('APP_ENV') == 'local') {
                $this->error('Failed to delete page: ' . $e->getMessage(), timeout: 8000);
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
        $this->pageModal = true;
    }

    public function closeModal()
    {
        $this->form->clear();
        $this->reset(['isEditMode', 'pageModal']);
        $this->resetValidation();
    }

    public function render()
    {
        $pages = Page::where('title', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate($this->perPage);

        $headers = [
            ['key' => 'no', 'label' => '#', 'class' => 'bg-error/20 w-1'],
            ['key' => 'title', 'label' => __('layout.title_form')],
            ['key' => 'body', 'label' => __('layout.body_form')],
            ['key' => 'status', 'label' => __('layout.status_form')],
        ];
        
        $status = [
            ['id' => 'active', 'name' => 'Active'],
            ['id' => 'inactive', 'name' => 'Inactive'],
        ];

        return view('livewire.page-index', [
            'pages' => $pages,
            'headers' => $headers,
            'status' => $status,
        ]);
    }
}
