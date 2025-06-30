<?php

namespace App\Http\Repositories;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use App\Http\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
    private $repository = 'posts';
    private $model;

	public function __construct(Post $model)
	{
		$this->model = $model;
	}

    public function getAllData($locale)
    {
        $this->validate(Request::all(), [
            'per_page' => ['numeric']
        ]);

        $result = $this->model
                    ->getAll()
                    ->orderByDesc('id')
                    ->paginate(Arr::get(Request::all(), 'per_page', 15));

        return $result;
    }
}