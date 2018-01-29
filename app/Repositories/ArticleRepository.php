<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends BaseRepository
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Latest Article by type
     *
     * @param  string $type [post, page, mixed]
     * @param integer $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatest($type = 'mixed', $limit = 10)
    {
        $model = $this->model->orderBy('created_at', 'desc');

        if (in_array($type, ['post', 'page'])) {
            $model = $model->where('type', $type);
        }

        return $model->paginate($limit);
    }
}
