<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $fillable=['product_name','product_description','price','image','category_id'];

      public function category()
      {
          return $this->belongsTo(Category::class);
      }
}
