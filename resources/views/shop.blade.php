@extends('layouts.app')

@section('title')
    <title>{{env('WEBSITE_NAME')}} | Shop</title>
@endsection

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

   <div class="container-fluid my-3">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Maincategory
                </a>
                <a href="/shop?mc=All&sc{{$sc}}&br={{$br}}&sort={{$sort}}" class="list-group-item list-group-item-action">All</a>
                @foreach ($maincategory as $item)
                <a href="/shop?mc={{$item->name}}&sc{{$sc}}&br={{$br}}&sort={{$sort}}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                @endforeach
            </div>
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Subcategory
                </a>
                <a href="/shop?mc={{$mc}}&sc=All&br={{$br}}&sort={{$sort}}" class="list-group-item list-group-item-action">All</a>
                @foreach ($subcategory as $item)
                <a href="/shop?mc={{$mc}}&sc={{$item->name}}&br={{$br}}&sort={{$sort}}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                @endforeach
            </div>
            <div class="list-group mb-3">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Brand
                </a>
                <a href="/shop?mc={{$mc}}&sc{{$mc}}&br=All&sort={{$sort}}" class="list-group-item list-group-item-action">All</a>
                @foreach ($brand as $item)
                <a href="/shop?mc={{$mc}}&sc{{$sc}}&br={{$item->name}}&sort={{$sort}}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                 <div class="col-md-8 mb-3">
                     <form action="{{route('search')}}" method="get">
                        <div class="btn-group w-100">
                         <input type="text" name="search" placeholder="Search Products By Name, Maincategory, Subcategory, Brand, color etc" class="form-control shop-form border-primary border-2">
                         <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                     </form>
                 </div>
                 <div class="col-md-4 mb-3">
                      <form action="/shop" method="get">
                        <input type="hidden" name="mc" value="{{$mc}}">
                        <input type="hidden" name="sc" value="{{$sc}}">
                        <input type="hidden" name="br" value="{{$br}}">
                       <div class="btn-group w-100">
                        <select name="sort" class="form-control shop-form border-primary border-2 w-100">
                            <option value="1" {{$sort=="1"?"selected":""}}>Latest</option>
                            <option value="2" {{$sort=="2"?"selected":""}}>Price : L to H</option>
                            <option value="3" {{$sort=="3"?"selected":""}}>Price : H to L</option>
                         </select>
                           <button type="submit" class="btn btn-primary">Apply</button>
                       </div>
                      </form>
                 </div>
            </div>
                  <div class="row">
                    @foreach ($products as $item)
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="packages">
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
                        </div>
                       
                    </div>
                @endforeach   
            </div>           

        </div>
    </div>
   </div>
      
@endsection