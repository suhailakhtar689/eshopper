@extends('layouts.app')

@section('title')
    <title>Eshoper | Admin Home - Update Product</title>
@endsection


@section('content')

 <!-- Header Start -->
 <div class="container-fluid bg-breadcrumb">
  <div class="container text-center py-5" style="max-width: 900px;">
      <h3 class="text-white display-3 mb-4">Product</h1>
      <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item text-white"><a href="{{route('index')}}">Home</a></li>
          <li class="breadcrumb-item text-white"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active text-white">Product</li>
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
          <h5 class="bg-primary p-2 text-center text-light">Product<a href="{{route('admin.product')}}"><i class="fa fa-backward text-light float-end"></i></a></h5>
         <form action="{{route('admin.product.update',$data->id)}}" method="POST" enctype="multipart/form-data">
           @csrf
           {{-- <div class="row">
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
           </div> --}}
           <div class="mb-3">
            <label>Name*</label>
            <input type="text" name="name" placeholder="Name" 
            value="{{ old('name', $data->name) }}" 
            class="form-control border-primary border-2">
     
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
 
            <div class="row">
              <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label>Maincategory*</label>
                <select name="maincategory_id" class="form-select bordered-primary border-2">
                  @foreach ($maincategory as $item)
                      <option value="{{$item->id}}" {{old('maincategory_id') == $item->id ? 'selected': ''}}>{{$item->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label>Subcategory*</label>
                <select name="subcategory_id" class="form-select bordered-primary border-2">
                  @foreach ($subcategory as $item)
                      <option value="{{$item->id}}" {{old('subcategory_id') == $item->id ? 'selected': ''}}>{{$item->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label>Brand*</label>
                <select name="brand_id" class="form-select bordered-primary border-2">
                  @foreach ($brand as $item)
                      <option value="{{$item->id}}" {{old('brand_id') == $item->id ? 'selected': ''}}>{{$item->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label>Stock*</label>
                  <select name="stock" class="form-control border-primary border-2">
                    <option value="1" value="{{old('active')== "1" ?"selected":""}}">Yes</option>
                    <option value="0"  value="{{old('active')== "0" ?"selected":""}}">No</option> 
                  </select>
              </div>
            </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Color</label>
            <input type="text" name="color" placeholder="Color" class="form-control border-primary border-2" value="{{old('color')? old('color') : $data->color}}">
          </div>
          @error('color')
            <p class="text-danger">{{$message}}</p>
          @enderror  

          <div class="col-md-6 mb-3">
            <label>Size*</label>
            <input type="text" name="size" placeholder="Size" class="form-control border-primary border-2" value="{{old('size')? old('size') : $data->size}}">
          </div>
          @error('size')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Base Price</label>
            <input type="number" name="basePrice" placeholder="Base Price" class="form-control border-primary border-2" value="{{old('basePrice')? old('basePrice') : $data->basePrice}}">
          </div>
          @error('basePrice')
            <p class="text-danger">{{$message}}</p>
          @enderror

          <div class="col-md-6 mb-3">
            <label>Discount</label>
            <input type="number" name="discount" placeholder="discount" class="form-control border-primary border-2" value="{{old('discount')? old('discount') : $data->discount}}">
          </div>
          @error('discount')
            <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

               <div class="mb-3">
              <label>Description</label>
              <textarea name="description" id="description" rows="5" class="form-control border-primary border-2" 
              placeholder="Enter description">{{ old('description', $data->description) }}</textarea>
               </div>

               
           <div class="row">
            <div class="col-md-6 mb-3">
              <label>Stock Quantity*</label>
              <input type="number" name="Stock_Quantity" placeholder="Enter StockQuantity" value="{{ old('Stock_Quantity', $data->StockQuantity) }}" class="form-control border-primary border-2">
          
              @error('Stock_Quantity')
                  <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
              
            <div class="col-md-6 mb-3">
              <label>Pic</label>
              <input type="file" name="pic[]" multiple class="form-control border-primary border-2">

              @error('pic')
              <p class="text-danger">{{$message}}</p>
             @enderror
              @error('pic.*')
              <p class="text-danger">{{$message}}</p>
             @enderror

             
            </div>
          </div>

            {{-- <div class="row">
              <div class="col-md-6 mb-3">
                <label>Active*</label>
                <select name="active" class="form-control border-primary border-2">
                  <option value="1" value="{{old('active')== "1" ?"selected":""}}">Yes</option>
                  <option value="0"  value="{{old('active')== "0" ?"selected":""}}">No</option>
                </select>
              </div>
            </div>           --}}
            
               <div class="row">
                <div class="col-md-6 col-mb-3">
                  <label>Active*</label>
                  <select name="active" class="form-control control border-primary border-2">
                    <option value="1"
                      {{old('active') ? old('active') : ($data->active == '1' ? 'selected' : '')}}>Yes
                    </option>
                    <option value="0"
                      {{old('active') ? old('active') : ($data->active == '0' ? 'selected' : '')}}>No
                    </option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Old Uploaded Images</label>
                  @foreach ($ProductImages as $key=>$value)
                      <input type="checkbox" name="{{$key}}" checked>
                      <img src="{{$value->pic()}}" height="60px" width="60px" alt="">
                  @endforeach
                </div>
               </div>

              

            <div class="mb-3 mt-4">
                 <button type="submit" class="btn btn-primary w-100">Update</button>
              </div>
           </div>
         </form>
        </div>
      </div>
    </div>

@endsection