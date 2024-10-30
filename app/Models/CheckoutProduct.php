<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkout_id',
        'product_id',
        'qty',
        'total'
      ];

      function checkout()
      {
        return $this->belongsTo(Checkout::class, "checkout_id");
      }
      
      function product()
      {
        return $this->belongsTo(Product::class, "product_id");
      }
      
}
