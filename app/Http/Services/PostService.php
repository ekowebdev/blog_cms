<?php

namespace App\Http\Services;

use App\Models\Post;
use App\Http\Services\BaseService;
use App\Http\Repositories\PostRepository;

class PostService extends BaseService
{
    private $model, $repository;

    public function __construct(Post $model, PostRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function index($locale)
    {
        return $this->repository->getAllData($locale);
    }
}
