<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Http\Services\BaseService;
use App\Http\Repositories\CategoryRepository;

class CategoryService extends BaseService
{
    private $model, $repository;

    public function __construct(Category $model, CategoryRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function index($locale)
    {
        return $this->repository->getAllData($locale);
    }
}
