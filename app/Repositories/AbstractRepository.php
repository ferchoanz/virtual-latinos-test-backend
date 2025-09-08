<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbstractRepository
{

    /**
     * @var Model $model
     */
    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function all()
    {
        return $this->model->all();
    }

    /**
     * @return static
     */
    function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * @param $id
     *
     * @return Model
     */
    function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param Model $model
     *
     * @return bool
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    public function update(Model $model, array $attributes)
    {
        return $model->update($attributes);
    }

    /**
     * Delete an Eloquent Model from database
     *
     * @param Model $model
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

}
