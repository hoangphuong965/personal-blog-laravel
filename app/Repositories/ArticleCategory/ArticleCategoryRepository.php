<?php

namespace App\Repositories\ArticleCategory;

use App\Models\ArticleCategory;
use App\Repositories\BaseRepository;

class ArticleCategoryRepository extends BaseRepository implements ArticleCategoryRepositoryInterface
{
    public function getModel()
    {
        return ArticleCategory::class;
    }
}
