<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Delete a company (with their service images) by given Id
     *
     * @param  integer $id
     * @return bool
     */
    public function delete($id)
    {
        $model = $this->model->find($id);

        // delete any services image
        if (count($model->services) > 0) {
            foreach ($model->services as $key => $serv) {
                Storage::delete('public/' . $serv['image']);

                // delete on s3 driver
                // Storage::disk('s3')->delete('folder_path/file_name.jpg');
            }
        }

        return $model->delete();
    }

    protected function _baseProcess($model, array $data, $isEdit = false)
    {
        return \DB::transaction(function () use ($model, $data, $isEdit) {
            $model->fill($data);
            $model->save();

            // when is Edit, we can delete any deleted services
            if ($isEdit) {
                $ids = collect(request()->get('services'))->pluck('id')->toArray();
                $model->services()->whereNotIn('id', $ids)->delete();
            }

            // handle services attributes
            if (!empty($data['services'])) {
                foreach ($data['services'] as $key => $serv) {
                    $service_attr = [
                        'name' => $serv['name'],
                        'content' => $serv['content'],
                    ];

                    // handle image
                    if (!empty($serv['image'])) {
                        $service_attr['image'] = $this->_uploadServiceImage($serv['image']);
                    } else {
                        $service_attr['image'] = array_get($serv, 'current_image') ?: null;
                        // do we need delete removed image in our storage?
                    }

                    // store to database
                    $model->services()->updateOrCreate([
                        'id' => array_get($serv, 'id', 0),
                    ], $service_attr);
                }
            }

            return $model;
        });
    }

    protected function _uploadServiceImage(UploadedFile $file)
    {
        if (!$file->isValid()) {
            return false;
        }

        $file->store('public');
        return $file->hashName();
    }
}
