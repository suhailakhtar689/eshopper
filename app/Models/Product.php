<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'size',
        'basePrice',
        'discount',
        'finalPrice',
        'stock',
        'StockQuantity',
        'description',
        'maincategory_id',
        'subcategory_id',
        'brand_id',
        'active'
      ];

    

      function maincategory(){
        return $this->belongsTo(Maincategory::class, "maincategory_id");
      }

      function subcategory(){
        return $this->belongsTo(Subcategory::class, "subcategory_id");
      }
 
      function brand(){
        return $this->belongsTo(Brand::class, "brand_id");
      }
        
      function productImages(){
        return $this->hasMany(ProductImages::class);
      }

}





 