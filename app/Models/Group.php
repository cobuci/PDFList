<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id', 'id')->orderBy('position', 'asc');
    }
}
