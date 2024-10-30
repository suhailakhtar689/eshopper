<?php

namespace App\Http\Helpers;

class RoleHelper
{
    public static $buyer = [
    'buyer-index',
    'profile-update',
    'profile-update-store',
    'cart',
    'add-to-cart',
    'delete-cart',
    'update-cart',
    'add-to-wishlist',
    'delete-wishlist',
    'checkout',
    'place-order',
    'confirmation',
    'buyer.payment',
    'buyer.payment.store',
    'add-to-wishlist',
    'delete-wishlist',
    ];

    public static function check($route)
    {
     $currentUser = auth()->user();

     if($currentUser->role === 'Buyer'){
        if(in_array($route, self::$buyer)){
            return true;
        }
     }

     if($currentUser->role === 'admin'){
          return true;
     }
     return false;
     
    }
}










?>