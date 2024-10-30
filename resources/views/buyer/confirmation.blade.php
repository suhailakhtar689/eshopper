@extends('layouts.app')

@section('title')
    <title>{{env('WEBSITE_NAME')}} | Order Confirmation</title>
@endsection

@section('content')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Order Confirmation</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Order Confirmation</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

   <div class="container-fluid my-3 text-center">
   <h2>Thank You!!!</h2>
   <h4>Your Order Has Been Placed</h4>
   <h5>No You Can Track Your Order in Profile Section</h5>
   <a href="{{route('shop')}}" class="btn btn-primary">Shop More</a>
   </div>
      
@endsection