<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'message',
        'pic', 
        'active'
      ];

      function pic(){
        return Storage::url($this->pic);
      }

      

}
