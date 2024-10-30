@extends('layouts.app')


@section('title')
    <title>Eshoper | Product</title>
@endsection



@section('content')

  <!-- Header Start -->
  <div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Product</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Product</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
  <div class="container-fluid my-3">
   <div class="row">
    <div class="col-md-6">
      <div id="carouselExampleIndicators" class="carousel slide">
         <div class="carousel-indicators">
           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          @foreach ($data->productImages as $index => $item)
             @if ($index !=0)
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" aria-label="Slide {{$index+1}}"></button>
             @endif
          @endforeach
         </div>
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img src="{{$data->productImages[0]->pic()}}" style="height: 500px;width:100%" class="d-block w-100" alt="...">
           </div>
          @foreach ($data->productImages as $index => $item)
           @if ($index !==0)
           <div class="carousel-item">
            <img src="{{$item->pic()}}" style="height: 500px;width:100%" class="d-block w-100" alt="...">
          </div>
           @endif
          @endforeach
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
         </button>
       </div>
    </div>

    <div class="col-md-6">
        <h5 class="bg-primary text-light text-center p-2 text-center">{{$data->name}}</h5>
        <table class="table table-bordered">
             <tr>
                <th>Maincategory/Subcategory/Brand</th>
                <td>{{$data->maincategory->name}}/{{$data->subcategory->name}}/{{$data->brand->name}}</td>
             </tr>
             <tr>
                <th>Color/Size</th>
                <td>{{$data->color}}/{{$data->size}}</td>
             </tr>
             <tr>
                <th>Price</th>
                <td><del class="text-danger">&#8377;{{$data->basePrice}}</del> &#8377;{{$data->finalPrice}} <sup>{{$data->discount}}% off</sup></td>
             </tr>
             <tr>
                <th>Stock</th>
                <td>{{$data->stock?"Yes":"No"}}/{{$data->stock?$data->StockQuantity." Left in Stock": ""}}</td>
             </tr>
             <tr>
               <td colspan="2">
                  <form action="{{ route('add-to-cart') }}" method="POST">
                    @csrf
                   <div class="d-flex">
                   @if ($data->stock)
                   <button class="btn btn-primary" type="button" onclick="fun('dec')"><i class="fa fa-minus"></i></button>
                   <p id="para" class="mx-3"></p>
                   <input type="hidden" name="qty" id="qty" value="1">
                   <input type="hidden" name="pid" id="pid" value="{{$data->id}}">
                  <button class="btn btn-primary" type="button" onclick="fun('inc',{{$data->StockQuantity}})"><i class="fa fa-plus"></i></button> 
                   @endif

                 <div class="btn-group">
                @if ($data->stock)
                <button type="submit" class="btn btn-primary ms-3"><i class="fa fa-shopping-cart"></i> Add to Cart</button> 
                    
                @endif                  
                  {{-- <a href="{{route('add-to-cart',[$data->id])}}" class="btn btn-primary ms-3"><i class="fa fa-heart">Add to Cart</i></a> --}}
                  <a href="{{route('buyer-index')}}" class="btn btn-success"><i class="fa fa-heart">Add to Wishlist</i></a>
                 </div>
                  </div>
                  </form>
               </td>
             </tr>
             <tr>
                <th>Description</th>
                <td>{!! $data->description !!}</td>
             </tr>
        </table>
    </div>  
   </div>
  </div>

   <!-- Packages Start -->
   <div class="container-fluid packages py-3">
      <div class="container py-5">
          <div class="mx-auto text-center mb-5" style="max-width: 900px;">
              <h5 class="section-title px-3">Products</h5>
              <h1 class="mb-0">Related Products</h1>
          </div>
          <div class="packages-carousel owl-carousel">
              @foreach ($relatedProducts as $item)
              <div class="packages-item">
                  <div class="packages-img">
                      <img src="{{$item->productImages[0]->pic()}}" style="height: 350px;" class="img-fluid w-100 rounded-top" alt="Image">
                      <div class="packages-info d-flex border border-start-0 border-end-0 position-absolute" style="width: 100%; bottom: 0; left: 0; z-index: 5;">
                          <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt me-2"></i> {{$item->StockQuantity . ' Left in Stock'}} </small>                                                         
                          <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-alt me-2"></i>{{$item->brand->name .' Original Product'}}</small>
                      </div>
                      <div class="packages-price py-2 px-4 text-center" style="width: 200px;"><del>&#8377;{{$item->basePrice}}</del> &#8377;{{$item->finalPrice}}</div>
                  </div>
                  <div class="packages-content bg-light">
                      <div class="p-4 pb-0">
                          <h5 class="mb-0">{{$item->name}}</h5>
                          <small class="text-uppercase">{{$item->maincategory->name}}/{{$item->subcategory->name}}/{{$item->brand->name}}</small>
                          <div class="mb-3">
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                              <small class="fa fa-star text-primary"></small>
                          </div>
                      </div>
                      <div class="row bg-primary rounded-bottom mx-0">
                           <div class="px-0 text-center">
                              <a href="{{route('product',$item->id)}}" class="btn-hover btn text-white py-2 px-4">Add to Cart</a>
                          </div>
                      </div>
                  </div>
              </div>
           
              @endforeach
          </div>
      </div>
  </div>
  <!-- Packages End -->

  <script>
    var para = document.getElementById("para")
    var qty = document.getElementById("qty")

    function fun(option,quantity=0){
      let num = Number(para.innerHTML)
      if(option==="dec" && para.innerHTML == 1)
      return 
    if(option==='dec')
    para.innerHTML = num - 1;
    else if(num < quantity)
   var finalnum = para.innerHTML = num + 1; 
    qty.value = finalnum;
    }
  </script>
@endsection