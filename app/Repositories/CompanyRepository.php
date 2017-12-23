<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    /**
     * Get single company by ID or Slug
     *
     * @param  integer|string $identifier
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getDetail($identifier)
    {
        $model = $this->model->with('services')->find($identifier);
        if (!$model) {
            $model = $this->model
                ->with('services')
                ->where('slug', $identifier)
                ->first();
        }
        return $model;
    }

    protected function _baseProcess($model, array $data, $isEdit = false)
    {
        return \DB::transaction(function () use ($model, $data, $isEdit) {
            $model->fill($data);
            $model->save();

            if (!empty($data['services'])) {
                // when is Edit, we can delete any deleted services
                if ($isEdit) {
                    $ids = collect(request()->get('services'))->pluck('id')->toArray();
                    $model->services()->whereNotIn('id', $ids)->delete();
                }

                foreach ($data['services'] as $key => $serv) {
                    $model->services()->updateOrCreate([
                        'id' => array_get($serv, 'id', 0),
                    ],
                        [
                            'name' => $serv['name'],
                            // 'image' => $serv['image'],
                            'content' => $serv['content'],
                        ]);
                }
            }

            return $model;
        });
    }
}
