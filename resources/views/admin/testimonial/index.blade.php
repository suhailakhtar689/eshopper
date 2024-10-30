@extends('layouts.app')

@section('title')
    <title>Eshoper | Admin Home - Testimonial</title>
@endsection


@section('content')

<!-- Header Start -->
 <div class="container-fluid bg-breadcrumb">
  <div class="container text-center py-5" style="max-width: 900px;">
      <h3 class="text-white display-3 mb-4">Testimonial</h1>
      <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item text-white"><a href="{{route('index')}}">Home</a></li>
          <li class="breadcrumb-item text-white"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active text-white">Testimonial</li>
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
          <h5 class="bg-primary p-2 text-center text-light">Testimonial <a href="{{route('admin-testimonial-create')}}"><i class="fa fa-plus text-light float-end"></i></a></h5>
         <table data-order='[[0, "desc"]]' class="table table-bordered display nowrap" id="dataTable" style="width:100%;">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Mesage</th>
                <th>Pic</th>
                <th>Active</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             @foreach ($data as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->message}}</td>
                <td>
                  {{-- <a href="{{$item->pic() }}" target="_blank">
                    <img src="{{$item->pic() }}" height="50px" width="50px" class="rounded" alt="">
                  </a> --}}

                  <div style="width:200px">
                     
                           <a href="/storage/{{$item->pic}}" target="_blank">
                            <img src="/storage/{{$item->pic}}" class="rounded" height="35px" width="35px" alt="">
                           </a>

                  </div>
                </td>
                <td class="{{$item->active?"text-success":"text-danger"}}">{{$item->active?"Yes":"No"}}</td>
                <td><a href="{{route('admin.testimonial.edit',$item->id)}}"><i class="fa fa-edit"></i></a></td>
                <td><a href="{{route('admin.testimonial.destroy',$item->id)}}"><i class="fa fa-trash text-danger"></i></a></td>
              </tr>
              @endforeach
            </tbody>  
         </table>
        </div>
      </div>
    </div>

@endsection