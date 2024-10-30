<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_id'
      ];

      function testimonial(){
        return $this->belongsTo(testimonial::class,"id");
      }

}

