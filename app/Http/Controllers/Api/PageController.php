<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Services\PageService;
use App\Http\Resources\PageResource;
use App\Http\Controllers\BaseController;

class PageController extends BaseController
{
    private $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function index($locale)
    {
        $data = $this->service->index($locale);
        return PageResource::collection($data);
    }
}
