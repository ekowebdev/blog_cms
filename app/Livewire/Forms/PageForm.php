<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class PageForm extends Form
{
    public ?Page $page = null;

    public string $title = '';
    public string $body = '';
    public string $status = 'active';

    public function setPage(Page $page)
    {
        $this->page = $page;
        $this->title = $page->title;
        $this->body = $page->body;
        $this->status = $page->status;
    }

    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'max:50',
                Rule::unique('pages', 'title')->ignore($this->page?->id),
            ],
            'body' => 'required|string',
            'status' => 'required|in:active,inactive',
        ];

        return $rules;
    }

    public function store()
    {
        $this->validate();

        $page = Page::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'body' => $this->body,
            'status' => $this->status,
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->page->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'body' => $this->body,
            'status' => $this->status,
        ]);
    }

    public function clear()
    {
        $this->reset([
            'title', 'body', 'status'
        ]);
        $this->page = null;
    }
}
