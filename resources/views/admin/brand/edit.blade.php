@extends('layouts.app')

@section('title')
    <title>Eshoper | Admin Home - Update Brand</title>
@endsection


@section('content')

 <!-- Header Start -->
 <div class="container-fluid bg-breadcrumb">
  <div class="container text-center py-5" style="max-width: 900px;">
      <h3 class="text-white display-3 mb-4">Brand</h1>
      <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item text-white"><a href="{{route('index')}}">Home</a></li>
          <li class="breadcrumb-item text-white"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active text-white">Brand</li>
      </ol>    
  </div>
</div>
<!-- Header End -->

    <div class="container-fluid my-3">
      <div class="row">
        <div class="col-md-2 my-2">
            @include('layouts.sidebar')
        </div> 
        <div class="col-md-10 mt-3">
          <h5 class="bg-primary p-2 text-center text-light">Brand<a href="{{route('admin.brand')}}"><i class="fa fa-backward text-light float-end"></i></a></h5>
         <form action="{{route('admin.brand.update',$data->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row">
            <div class="col-md-6 mb-3">
              <label>Name*</label>
              <input type="text" name="name" placeholder="Name" value="{{old('name')?old('name'):$data->name}}" class="form-control border-primary border-2">

              @error('name')
                  <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label>Pic*</label>
              <input type="file" name="pic" class="form-control border-primary border-2">
            </div>
            @error('pic')
              <p class="text-danger">{{ $message}}</p>
            @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Active*</label>
                <select name="active" class="form-control border-primary border-2">
                  <option value="1" {{old('active')?old('active'):($data->active == "1" ? "selected": "")}}>Yes</option>
                  <option value="0" {{old('active')?old('active'):($data->active == "0" ? "selected": "")}}>No</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary w-100">Update</button>
           </div>
           </div>
         </form>
        </div>
      </div>
    </div>

@endsection