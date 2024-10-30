@extends('layouts.app')

@section('title')
    <title>{{env('WEBSITE_NAME')}} | Confirmation</title>
@endsection

@section('content')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Confirmation</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Confirmation</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

 <div class="container-fluid my-3 text-center">
 <h3>Thank You!!!</h3>
 <h4>Your Email Address is registered with us</h4>
 <a href="{{route('shop')}}" class="btn btn-primary">Shop Now</a>
 </div>
      
@endsection