<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\BaseController;

class CategoryController extends BaseController
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index($locale)
    {
        $data = $this->service->index($locale);
        return CategoryResource::collection($data);
    }
}
