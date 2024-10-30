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
                    <th></th>
                    <th>Qty</th>
                    <th></th>
                    <th>Total</th>
                    <th></th>
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
                        <td class="text-center"><a href="/user/update-cart/Dec/{{ $item->id }}"><i class="fa fa-minus"></i></a></td>
                        <td>{{ $item->qty }}</td>
                        <td class="text-center"><a href="/user/update-cart/Inc/{{ $item->id }}"><i class="fa fa-plus"></i></a></td>
                        <td>&#8377;{{ number_format($item->total, 2) }}</td>
                        <td class="text-center"><a href="{{ route('delete-cart', $item->id) }}"><i class="fa fa-trash text-danger"></i></a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
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
            <tr>
                <th colspan="2"> 
                    <a href="{{route('checkout')}}" class="btn btn-primary w-100">Proceed to Checkout</a>
                </th>
            </tr>
          </thead>
            </table>
        </div>
    </div>
@else

 <div class="text-center">
    <h3>No Cart Items</h3>
    <a href="{{ route('shop') }}" class="btn btn-primary">Shop Now</a>
</div>   
@endif

  </div>

@endsection