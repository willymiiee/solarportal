<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\CompanyMessage;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompanyRepository extends BaseRepository
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    /**
     * Get companies by given user_id
     *
     * @param  integer  $user_id
     * @param  integer $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginateByUser($user_id, $limit = 10)
    {
        $user = User::find($user_id);
        return $user->companies()->orderBy('created_at', 'desc')->paginate($limit);
    }

    /**
     * Get companies as dropdown by given user_id
     *
     * @param  integer $user_id
     * @param  string $display_field
     * @return array
     */
    public function getDropdownByUser($user_id, $display_field = 'name')
    {
        $user = User::find($user_id);

        if (empty($user->companies)) {
            return [];
        }

        return $user->companies()
            ->orderBy($display_field, 'asc')
            ->pluck($display_field, 'companies.id');
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
        return \DB::transaction(function () use ($id) {
            $model = $this->model->find($id);

            // delete any services image
            // we not delete services here, because it will
            // automatically deleted by mysql foreign cascade
            if (count($model->services) > 0) {
                foreach ($model->services as $key => $serv) {
                    if (!empty($serv['image'])) {
                        Storage::delete('public/' . $serv['image']);
                    }

                    // delete on s3 driver
                    // Storage::disk('s3')->delete('folder_path/file_name.jpg');
                }
            }

            // delete relation from user
            auth()->user()->companies()->detach($model->id);

            return $model->delete();
        });
    }

    public function sendMessage($slug, $input)
    {
        return \DB::transaction(function () use ($slug, $input) {
            $company = $this->model->where('slug', $slug)->firstOrFail();

            // 1. check if the given email exists or not
            $user = User::where('email', $input['email'])->first();
            if (!$user) {
                $user = User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'password' => bcrypt('secret'),
                    'type' => 'C',
                ]);
            }

            // 2. add message
            $company->messages()->create(['user_id' => $user->id, 'message' => $input['message']]);

            // 3. send message to company email
            $this->_sendEmailToCompany($company, $user, $input['message']);
        });
    }

    /**
     * Get latest company message by given user_id
     * 
     * @param  integer $user_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMessages($user_id, $limit = 10)
    {
        $user = User::find($user_id);
        $company_ids = $user->companies->pluck('id');

        return CompanyMessage::with('user')
            ->orderBy('created_at', 'desc')
            ->whereIn('company_id', $company_ids)
            ->limit($limit)
            ->get();
    }

    protected function _baseProcess($model, array $data, $isEdit = false)
    {
        return \DB::transaction(function () use ($model, $data, $isEdit) {
            $model->fill($data);

            if (!empty($data['avatar'])) {
                $avatar = $this->_uploadAvatar($data['avatar'], array_get($data, 'previous_avatar'));
                $model->avatar = $avatar;
            }

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
                        $service_attr['image'] = $this->_uploadServiceImage($serv['image'], $serv['previous_image']);
                    } else {
                        $service_attr['image'] = array_get($serv, 'previous_image') ?: null;
                        // do we need delete removed image in our storage?
                    }

                    // store to database
                    $model->services()->updateOrCreate([
                        'id' => array_get($serv, 'id', 0),
                    ], $service_attr);
                }
            }

            // Insert related user
            if (!$isEdit) {
                auth()->user()->companies()->attach($model->id);
            }

            return $model;
        });
    }

    protected function _uploadServiceImage(UploadedFile $file, $previousFile)
    {
        if (!$file->isValid()) {
            return false;
        }

        $ext = $file->getClientOriginalExtension();
        $image = Image::make($file);
        $path = $file->hashName('public');

        Storage::put($path, (string) $image->encode($ext, 30));

        // if new file uploaded successfully, delete previous file
        if (Storage::exists($path) && $previousFile) {
            Storage::delete('public/' . $previousFile);
        }

        return basename($path);
    }

    /**
     * Handle upload image for Avatar
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @param  string       $previousFile
     * @return string       [filename]
     */
    protected function _uploadAvatar($file, $previousFile)
    {
        if (!$file->isValid()) {
            return false;
        }

        $ext = $file->getClientOriginalExtension();
        $image = Image::make($file);
        $path = $file->hashName('public/avatars');

        Storage::put($path, (string) $image->encode($ext, 30));

        // if new file uploaded successfully, delete previous file
        if (Storage::exists($path) && $previousFile) {
            Storage::delete('public/avatars/' . $previousFile);
        }

        return basename($path);
    }

    protected function _sendEmailToCompany(Company $company, User $user, $message)
    {
        $emailData = json_encode(
            [
                '-targetName-' => $company->name,
                '-targetCompany-' => 'targetCompany?',
                '-targetCompanyUrl-' => route('company.show', $company->slug),
                '-senderName-' => $user->name,
                '-senderPhone-' => $user->phone,
                '-senderEmail-' => $user->email,
                '-senderMessage-' => $message,
            ]
        );

        sendMail(
            'noreply@sejutasuryaatap.com',
            $user->name,
            $company->email,
            $company->name,
            'subject',
            null,
            $emailData,
            null,
            'd4c7b21f-d36b-4605-980b-645c6abe108a'
        );
    }
}
