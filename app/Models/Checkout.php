<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'orderStatus',
      'paymentStatus',
      'paymentMode',
      'subtotal',
      'shipping',
      'total',
    ];

    function user(){
      return $this->belongsTo(User::class, "user_id");
    }

    function checkoutProducts(){
      return $this->hasMany(CheckoutProduct::class);
    }
}
