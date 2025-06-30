<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class CategoryForm extends Form
{
    public ?Category $category = null;

    public string $name = '';

    public function setCategory(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('categories', 'name')->ignore($this->category?->id),
            ],
        ];

        return $rules;
    }

    public function store()
    {
        $this->validate();

        $category = Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
    }

    public function clear()
    {
        $this->reset([
            'name'
        ]);
        $this->category = null;
    }
}
