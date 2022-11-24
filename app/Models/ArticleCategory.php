<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table = 'article_category';

    protected $fillable = [
        'category_id',
        'article_id',
    ];
    public $timestamps = false;
}
