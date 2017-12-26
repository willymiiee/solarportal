<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * Model that should be implemented in Repository
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Get latest created resources as paginated
     *
     * @param  integer $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function basePaginate($limit = 10)
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    /**
     * Get single resource by id or given model
     *
     * @param  integer|\Illuminate\Database\Eloquent\Model $identifier
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function baseIdentifier($identifier)
    {
        return ($identifier instanceof Model) ? $identifier : $this->model->find($identifier);
    }

    /**
     * Create a Resource
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function baseCreate(array $data)
    {
        return $this->_baseProcess($this->model->newInstance(), $data);
    }

    /**
     * Update an existing resource
     *
     * @param  integer|\Illuminate\Database\Eloquent\Model $id
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function baseUpdate($id, array $data)
    {
        $row = $this->baseIdentifier($id);
        if (!$row) {
            return false;
        }

        return $this->_baseProcess($row, $data, true);
    }

    /**
     * Delete a resource
     *
     * @param  integer $id
     * @return bool
     */
    public function baseDelete($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }

    protected function _baseProcess($model, array $data, $isEdit = false)
    {
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * Get model as dropdown
     *
     * @param  string $display_field
     * @return array
     */
    public function getAsDropdown($display_field = 'name')
    {
        return $this->model->orderBy($display_field, 'asc')->pluck($display_field, 'id');
    }
}
