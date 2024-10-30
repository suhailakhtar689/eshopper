@extends('layouts.app')

@section('title')
    <title>Eshoper | Admin Home</title>
@endsection


@section('content')

 <!-- Header Start -->
 <div class="container-fluid bg-breadcrumb">
  <div class="container text-center py-5" style="max-width: 900px;">
      <h3 class="text-white display-3 mb-4">Admin</h1>
      <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item text-white"><a href="{{route('index')}}">Home</a></li>
          <li class="breadcrumb-item text-white"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active text-white">Admin</li>
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
          <h5 class="bg-primary p-2 text-center text-light">Admin Home Section</h5>
          <div class="row">
            <div class="col-md-6">
              @if (Auth::check() && Auth::user()->pic)
              <img src="{{Auth::user()->pic}}" height="400px" width="100%" alt="">
              @else
              <img src="/img/guide-1.jpg" height="350px" width="100%" alt="">
              @endif
            </div>
            <div class="col-md-6">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{ Auth::check() ? Auth::user()->name : 'Suhail Akhtar' }}</td>
                  </tr>

                  <tr>
                    <th>Email</th>
                    <td>{{ Auth::check() ? Auth::user()->email : 'suhailakhtar689@gmail.com' }}</td>
                  </tr>

                  <tr>
                    <th>Phone</th>
                    <td>{{ Auth::check() ? Auth::user()->phone : '8750083134' }}</td>
                  </tr>

                  <tr>
                    <td colspan="2"><a href="" class="btn btn-primary w-100">Update</a></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection