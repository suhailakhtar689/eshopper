@extends('layouts.app')


@section('title')
     <title>Eshoper | Buyer Profile</title>
@endsection
@section('content')
    <!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Buyer Profile </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Buyer Profile </li>
        </ol>    
    </div>
</div>
<!-- Header End -->
  <div class="container-fluid my-3">
  <div class="row">
    <div class="col-md-6">
        @if (Auth::user()->pic)
        <img src="{{Auth::user()->pic()}}" height="400px" width="100%" alt="">
        @else
        <img src="/img/noimage.png" height="300px" width="100%" alt="">
        @endif

    </div>
    <div class="col-md-6">
     <h5 class="bg-primary text-center p-2 text-light">Buyer Profile</h5>
     <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <th>{{Auth::user()->name}}</th>
            </tr>
            <tr>
                <th>Email</th>
                <th>{{Auth::user()->email}}</th>
            </tr>
            <tr>
                <th>Phone</th>
                <th>{{Auth::user()->phone}}</th>
            </tr>
            <tr>
                <th>Address</th>
                <th>{{Auth::user()->address}}</th>
            </tr>
            <tr>
                <th>Pin</th>
                <th>{{Auth::user()->pin}}</th>
            </tr>
            <tr>
                <th>City</th>
                <th>{{Auth::user()->city}}</th>
            </tr>
            <tr>
                <th>State</th>
                <th>{{Auth::user()->state}}</th>
            </tr>
            <tr>
                <th colspan="2"><a href="{{route('profile-update')}}" class="btn btn-primary w-100">Update Profile</a></th>
            </tr>
        </tbody>
     </table>
    </div>
  </div>

  <div class="mb-3">
    <h5 class="bg-primary text-center text-light p-2">Wishlist Section</h5>
     @if (count($wishlist))
         <div class="table responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($wishlist as $item)
                 <tr>
                    <td>
                        <a href="{{$item->product->productImages[0]->pic()}}" target="_blank">
                            <img src="{{$item->product->productImages[0]->pic()}}" height="80px" width="80px" alt="">
                        </a>
                    </td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->product->brand->name}}</td>
                    <td>{{$item->product->color}}</td>
                    <td>{{$item->product->size}}</td>
                    <td>&#8377;{{$item->product->finalPrice}}</td>
                    <td></td>
                    <td></td>
                </tr>
                 @endforeach
            </tbody>
        </table>
         </div>
     @else
         <div class="text-center">
            <p>No Items in Wishlist</p>
            <a href="/shop" class="btn btn-primary">Shop Now</a>
         </div>
     @endif
  </div>

  <div class="mb-3">
    <h5 class="bg-primary text-center text-light p-2">Order History Section</h5>
    @if (count($checkout))
      @foreach ($checkout as $item)
      <div class="row border-bottom border-primary border-5">
        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table table-bordered">
               <tbody>
                <tr>
                    <th>Order Id</th>
                    <td>{{$item->id}}</td>
                </tr>
                <tr>
                    <th>Order Status</th>
                    <td>{{$item->orderStatus}}</td>
                </tr>
                <tr>
                    <th>Payment Mode</th>
                    <td>{{$item->paymentMode}}</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>{{$item->paymentStatus}}</td>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <td>&#8377;{{$item->subtotal}}</td>
                </tr>
                <tr>
                    <th>Shipping</th>
                    <td>{{$item->shipping==0?"Free":"&#8377;$item->shipping"}}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>&#8377;{{$item->total}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{$item->created_at}}</td>
                </tr>
               </tbody>
         </table>
      </div>
  </div>

        <div class="col-md-8">
            <div class="table responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($item->checkoutProducts as $cp)
                         <tr>
                            <td>
                                <a href="{{$cp->product->productImages[0]->pic()}}" target="_blank">
                                    <img src="{{$cp->product->productImages[0]->pic()}}" height="80px" width="80px" alt="">
                                </a>
                            </td>
                            <td>{{$cp->product->name}}</td>
                            <td>{{$cp->product->brand->name}}</td>
                            <td>{{$cp->product->color}}</td>
                            <td>{{$cp->product->size}}</td>
                            <td>&#8377;{{$cp->product->finalPrice}}</td>
                            <td>&#8377;{{$cp->qty}}</td>
                            <td>&#8377;{{$cp->total}}</td>

                            {{-- <td><a href="{{route('product',$cp->product->id)}}" class="fa fa-shopping-cart"></a></td> --}}
                            {{-- <td><a href="{{route('delete-wishlist',$cp->id)}}" class="fa fa-trash text-danger"></a></td> --}}
                        </tr>
                         @endforeach
                    </tbody>
                </table>
          </div>
        </div>
       </div>
      @endforeach
    @else
        <div class="text-center">
           <p>No Order History Found</p>
           <a href="/shop" class="btn btn-primary">Shop Now</a>
        </div>
    @endif
 </div>
  </div>

@endsection