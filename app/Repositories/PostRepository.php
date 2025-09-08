<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends AbstractRepository
{
    function __construct(Post $model)
    {
      $this->model = $model;
    }
}
