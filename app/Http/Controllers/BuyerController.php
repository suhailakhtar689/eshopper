<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BuyerController extends Controller
{
   public function __construct(private User $user,private Cart $cart,private Wishlist $wishlist,private Checkout $checkout,private CheckoutProduct $checkoutProduct,private Product $product)
   {

   }

   public function index()
   {
    $wishlist = $this->wishlist->where("user_id",Auth::user()->id)->get();
    $checkout = $this->checkout->where("user_id",Auth::user()->id)->get();
     return view('buyer.index',compact('wishlist','checkout'));
   }

   public function updateProfile()
   {
     return view('buyer.update');
   }

   public function updateProfileStore(Request $request)
   {
      $request->validate([
      'name' =>'required|min:3|max:50',
      'phone' =>'min:10|max:10'
      ]);

      $data = $this->user->find(Auth::user()->id);
        
      if($request->pic){
        Storage::disk("public")->delete("users", $data->pic);
        $pic = Storage::disk('public')->put('users', $request->pic);
    }
    else
    $pic = $data->pic;

      $data->update([
     'name'=>$request->name,
     'phone'=>$request->phone,
     'address'=>$request->address,
     'pin'=>$request->pin,
     'city'=>$request->city,
     'state'=>$request->state,
     'pic'=>$pic
      ]);
      if(Auth::user()->role==="Buyer")
     return redirect()->route('buyer-index');
      else
     return redirect()->route('admin-index');
   }

   

  //   public function addToCart(Request $request,$id){
  //    $item = $this->cart->where("user_id",Auth::user()->id)->where("product_id",$id)->first();
  //    if(!$item){
  //     $p = $this->product->find($request->$id);
  //     if ($p && isset($p->finalPrice)){
        
  //     }
  //     $this->cart->create([
  //       'user_id' => Auth::user()->id,
  //       'product_id' => $id,
  //       'qty' => $request->qty,
  //       'total' => $request->qty * $p->finalPrice
  //   ]);
  // } 
  //   return redirect()->route("cart");
  //   }

  
  public function addToCart(Request $request){
    // dd($request->all());
    $id = $request->pid;
    $item = $this->cart->where("user_id", Auth::user()->id)->where("product_id", $id)->first();

    if(!$item){
      $p = $this->product->find($id);
        
        if ($p && isset($p->finalPrice)) {
            $this->cart->create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'qty' => $request->qty,
                'total' => $request->qty * $p->finalPrice
            ]);
        } 
    }
    return redirect()->route("cart");
}

 
public function addToWishlist($id){
  // $id = $request->pid;
  
  $item = $this->wishlist->where("user_id", Auth::user()->id)->where("product_id", $id)->first();
  
  if(!$item){
    $p = $this->product->find($id);
          $this->wishlist->create([
              'user_id' => Auth::user()->id,
              'product_id' => $id
          ]);
  }

  return redirect()->route("buyer-index");
}

public function deleteWishlist($id)
{
  $wishlist = $this->wishlist->find($id)->delete();
  return redirect()->route("wishlist");
}


    public function cart()
    {
      $cart = $this->cart->where("user_id", Auth::user()->id)->get();
      $subtotal = 0;
      $shipping = 0;
      $total = 0;
      foreach($cart as $item){
      $subtotal = $subtotal+$item->total;      
      }

      if($subtotal>0  && $subtotal<1000)
      $shipping = 150;
      $total = $subtotal+$shipping;

      return view("buyer.cart",compact('cart','subtotal','total','shipping'));
    }
    
       


    public function updateCart($option, $id)
    {
      $item = $this->cart->find($id);
      if($option=="Dec" && $item->qty==1)
        return;
        else if($option=="Dec"){
          $item->qty = $item->qty-1; 
          $item->total = $item->total-$item->product->finalPrice; 
      }
        else{
        $item->qty = $item->qty+1; 
        $item->total = $item->total+$item->product->finalPrice; 
    }
    $item->update([
            'qty' => $item->qty,
            'total' => $item->total,
    ]);
    return redirect()->route("cart");
    }


    public function deleteCart($id)
    {
      $cart = $this->cart->find($id)->delete();
      return redirect()->route("cart");
    }

    public function checkout(){
      $cart = $this->cart->where("user_id",Auth::user()->id)->get();
      $subtotal = 0;
      $shipping = 0;
      $total = 0;
      foreach($cart as $item){
      $subtotal = $subtotal+$item->total;
      };
      if($subtotal>0  && $subtotal<1000)
      $shipping = 150;

      $total = $subtotal+$shipping;
      return view("buyer.checkout",compact('cart','subtotal','total','shipping'));
    }

    public function placeOrder(Request $request){
      $cart = $this->cart->where("user_id",Auth::user()->id)->get();
      $subtotal = 0;
      $shipping = 0;
      $total = 0;
      // foreach($cart as $item){
      // $subtotal = $subtotal+$item->total;
      // };
      // if($subtotal>0  && $subtotal<1000)
      // $shipping = 150;

      // $total = $subtotal+$shipping;
      // return view("buyer.checkout",compact('cart','subtotal','total','shipping'));

      // $data = $this->getCart();
      // $cart = $data['cart'];
      // $subtotal = $data['subtotal'];
      // $total = $data['total'];
      // $shipping = $data['shipping'];

      $checkout = $this->checkout->create([
       'user_id' =>Auth::user()->id,
          'paymentMode'=>$request->mode,
          'subtotal' =>$subtotal,
          'shipping' =>$shipping,
          'total' =>$total,
      ]);

      foreach ($cart as $item) {
        $this->checkoutProduct->create([
            'product_id'=>$item->product->id,
            'checkout_id'=>$checkout->id,
            'qty' =>$item->qty,
            'total' =>$item->total,
        ]);
        $p = $this->product->find($item->product->id);
        $p->update([
        'StockQuantity'=>$p->StockQuantity-$item->qty,
        'stock'=>$p->StockQuantity-$item->qty==0?false:true
        ]);
        $item->delete();
      }
      return redirect()->route("confirmation");
    }

    function confirmation()
    {
        return view("buyer.confirmation"); 
    }
}
