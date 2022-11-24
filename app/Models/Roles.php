<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'display_name',
        'description',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
