<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $fillable = [
       'name',
       'description',
       'code',
       'min_amount',
       'price_sale',
       'price_site',
       'image',
       'position',
       'list_id'
   ];

    public function list()
    {
         return $this->belongsTo(Group::class);
    }
}
