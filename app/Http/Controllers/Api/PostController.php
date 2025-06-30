<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Resources\PostResource;
use App\Http\Controllers\BaseController;

class PostController extends BaseController
{
    private $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index($locale)
    {
        $data = $this->service->index($locale);
        return PostResource::collection($data);
    }
}
