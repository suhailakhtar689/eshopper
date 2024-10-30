@extends('layouts.app')

@section('title')
    <title>{{env('WEBSITE_NAME')}} | Contact Us</title>
@endsection

@section('content')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Contact Us</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact Us</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Contact Us</h5>
                    <h1 class="mb-0">Contact For Any Query</h1>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4">
                        <div class="bg-white rounded p-4">
                            <div class="text-center mb-4">
                                <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                                <h4 class="text-primary"><Address></Address></h4>
                                <p class="mb-0">A-43, <br>Noida Sector 16</p>
                            </div>
                            <div class="text-center mb-4">
                                <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Mobile</h4>
                                <p class="mb-0"><a href="tel:+91 8750083134">+91 8750083134</a></p>
                                {{-- <p class="mb-0">+91 8750083134</p> --}}
                            </div>
                           
                            <div class="text-center">
                                <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                                <h4 class="text-primary">Email</h4>
                                <p class="mb-0"><a href="mailto: eshoper@gmail.com">eshoper@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        @if ($show)
                            <p class="text-success">Thanks to Share Your Query With Us. Team Will Contact You Soon</p>
                        @endif
                        <form action="{{route('contact-store')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                            <div class="col-mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" name="name" value="{{old('name')}}" placeholder="Your Name">
                                    <label for="name">Your Name</label>

                                    @error('name')
                                         <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email"  name="email" value="{{old('email')}}" placeholder="Your Email">
                                        <label for="email">Your Email</label>

                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                   @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control border-0" id="phone" name="phone" value="{{old('phone')}}" placeholder="Your Phone Number">
                                        <label for="phone">Your Phone Number</label>

                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                   @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="subject"  name="subject" value="{{old('subject')}}" placeholder="Subject">
                                        <label for="subject">Subject</label>

                                        @error('subject')
                                        <p class="text-danger">{{$message}}</p>
                                   @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 160px" name="message">{{old('message')}}</textarea>
                                        <label for="message">Message</label>

                                        @error('message')
                                        <p class="text-danger">{{$message}}</p>
                                   @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="rounded">
                          <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=a-43%20noida%20sector-16&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        @include('layouts.newsletter')
@endsection