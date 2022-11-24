<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'image_id',
        'title',
        'content',
        'status',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
