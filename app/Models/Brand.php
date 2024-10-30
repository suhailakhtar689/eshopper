<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
        'pic'
      ];

      function pic(){
        return Storage::url($this->pic);
      }
}
