<?php

namespace App\Repositories\Article;

use App\Models\Articles;
use App\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    public function getModel()
    {
        return Articles::class;
    }

    public function getArticleWithCategory()
    {
        return $this->model
            ->with('category:id,title')
            ->with('user:id,name')
            ->get();
    }
}
