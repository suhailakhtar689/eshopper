<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_id'
      ];

      function product(){
        return $this->belongsTo(Product::class,"id");
      }

      function pic(){
        return Storage::url($this->name);
      }
}

