<?php

namespace App\Http\Services;

use App\Models\Page;
use App\Http\Services\BaseService;
use App\Http\Repositories\PageRepository;

class PageService extends BaseService
{
    private $model, $repository;

    public function __construct(Page $model, PageRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function index($locale)
    {
        return $this->repository->getAllData($locale);
    }
}
