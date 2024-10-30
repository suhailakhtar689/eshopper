@extends('layouts.app')


@section('title')
     <title>Eshoper | Cart</title>
@endsection

@section('content')
    <!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Cart </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Cart </li>
        </ol>    
    </div>
</div>
<!-- Header End -->


  <div class="container-fluid my-3">
    <div class="row">
        <div class="col-md-6">
            <h5 class="bg-primary text-light text-center p-2">Billing Address Section</h5>
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
        <div class="col-md-6">
            <h5 class="bg-primary text-light text-center p-2">Cart Section</h5>
            @if (count($cart))
            <div class="table-responsive">
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
                        @foreach ($cart as $item)
                            <tr>
                                <td>
                                    <a href="{{ $item->product->productImages[0]->pic() }}" target="_blank">
                                        <img src="{{ $item->product->productImages[0]->pic() }}" height="50" width="50" alt="Image of {{ $item->product->name }}" class="rounded">
                                    </a>
                                </td>
        
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->brand->name }}</td>
                                <td>{{ $item->product->color }}</td>
                                <td>{{ $item->product->size }}</td>
                                <td>&#8377;{{ number_format($item->product->finalPrice, 2) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>&#8377;{{$item->total}}</td>
                                
                            </tr>
        
                        @endforeach
                    </tbody>
                </table>
            </div>
    
                    <table class="table table-bordered"> 
                  <thead>
                    <tr>
                        <th>Subtotal</th>
                        <td>&#8377;{{$subtotal}}</td>
                    </tr>
                    <tr>
                        <th>Shipping</th>
                        <td>&#8377;{{$shipping}}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>&#8377;{{$total}}</td>
                    </tr>
               <form action="{{route('place-order')}}" method="POST">
                @csrf
                <tr>
                    <th>Payment Mode</th>
                    <td>
                     <select name="mode" class="form-control">
                        <option value="COD">COD</option>
                        <option value="Net Banking">Net Banking/Card/UPI etc</option>
                     </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button class="btn btn-primary w-100" type="submit">Place Order</button>
    
                    </th>
                </tr>
               </form>
                  </thead>
           </table>
        @else
        
         <div class="text-center">
            <h3>No Cart Items</h3>
            <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now</a>
        </div>   
        @endif
        </div>
    </div>

  </div>

@endsection