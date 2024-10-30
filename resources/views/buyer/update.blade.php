@extends('layouts.app')


@section('title')
     <title>Eshoper | Update Profile</title>
@endsection
@section('content')
    <!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Update Profile </h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Update Profile </li>
        </ol>    
    </div>
</div>
<!-- Header End -->


  <div class="container-fluid my-3">
     <div class="row">
        <div class="col-xl-8 col-md-9 col-sm-10 col-11 m-auto">
          <h5 class="bg-primary text-light text-center p-2">Update Profile</h5>
          <form action="{{route('profile-update-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-6 mb-3">
                  <label>Name</label>
                  <input type="text" name="name" placeholder="Full Name" value="{{old('name',Auth::user()->name)}}" class="form-control border-primary border-2">

                  @error('name')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
               </div>

               <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" placeholder="Phone Number" value="{{old('phone',Auth::user()->phone)}}" class="form-control border-primary border-2">

                @error('phone')
                    <p class="text-danger">{{$message}}</p>
                @enderror
             </div>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" rows="3" class="form-control border-primary border-2" placeholder="Address..." value="{{old('address',Auth::user()->address)}}"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>City</label>
                    <input type="text" name="city" placeholder="City Name" value="{{old('city',Auth::user()->city)}}" class="form-control border-primary border-2">
                 </div>
  
                 <div class="col-md-6 mb-3">
                  <label>State</label>
                  <input type="text" name="state" placeholder="State" value="{{old('state',Auth::user()->state)}}" class="form-control border-primary border-2">
               </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Pin</label>
                    <input type="text" name="pin" placeholder="Pin" value="{{old('pin',Auth::user()->pin)}}" class="form-control border-primary border-2">
                 </div>
  
                 <div class="col-md-6 mb-3">
                  <label>Pic</label>
                  <input type="file" name="pic" class="form-control border-primary border-2">
               </div>
            </div>

            <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
          </form>
        </div>
     </div>

  </div>

@endsection