<?php

namespace App\Services;

use App\Repositories\PostRepository;


class PostService
{
    function __construct(protected PostRepository $postRepository) {}

    public function getAll()
    {
        return $this->postRepository->all();
    }

    public function create(array $attributes)
    {
        return $this->postRepository->create($attributes);
    }

    public function getById(int $id)
    {
        return $this->postRepository->getById($id);
    }

    public function update(int $id, array $attributes)
    {
        $updated = $this->getById($id);
        $this->postRepository->update($updated, $attributes);
        return $updated->refresh();
    }

    public function delete(int $id)
    {
        $deleted = $this->getById($id);
        $this->postRepository->delete($deleted);
        return $deleted;
    }
}
