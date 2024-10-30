@extends('layouts.app')

@section('title')
    <title>{{env('WEBSITE_NAME')}} | About Us</title>
@endsection

@section('content')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">About Us</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">About Us</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

     
@include('layouts.aboutus')
@include('layouts.highlights')
@include('layouts.testimonials')
      
@endsection