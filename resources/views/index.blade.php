@extends('layouts.app')

@section('title')
    <title>{{env('WEBSITE_NAME')}} | Home</title>
@endsection

@section('content')
    
            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="img/banner3.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World Of Fashion</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Top Brand and Latest Fashion</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/shop?mc=Male">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/banner1.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World Of Fashion</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Find Perfect Products of Latest Fashion</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/shop?mc=Female">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/banner3.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World Of Fashion</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">You Like To Go?</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/shop?mc=Kids">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <div class="container-fluid search-bar position-relative" style="top: -50%; transform: translateY(-50%);">
            <div class="container">
                <div class="position-relative rounded-pill w-100 mx-auto p-5" style="background: rgba(19, 53, 123, 0.8);">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Thailand">
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute me-2" style="top: 50%; right: 46px; transform: translateY(-50%);">Search</button>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

            <!-- Destination Start -->
            <div class="container-fluid destination py-1">
                <div class="container py-1">
                    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                        <h5 class="section-title px-3">Latest Product</h5>
                    </div>
                    <div class="tab-class text-center">
                        <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-All">
                                    <span class="text-dark" style="width: 150px;">All</span>
                                </a>
                            </li>
                        @foreach ($maincategory as $item)
                        <li class="nav-item">
                            <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{$item->id}}">
                                <span class="text-dark" style="width: 150px;">{{$item->name}}</span>
                            </a>
                        </li>
                        @endforeach
                        </ul>
                        <div class="tab-content">
                            <div id="tab-All" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                      @foreach ($products as $item)
                                      <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="destination-img">
                                            <img class="img-fluid rounded w-100" src="{{$item->productImages[0]->pic()}}" style="height: 300px;width:100%;" alt="">
                                            <div class="destination-overlay p-4">
                                                <h4 class="text-light mb-2 mt-3">{{$item->name}}</h4>
                                                <h6 class="text-light mb-2 mt-3"><del>&#8377;{{$item->basePrice}}</del> &#8377;{{$item->finalPrice}} <sup>{{$item->discount}}% off</sup></h6>
                                                <a href="{{route('product',$item->id)}}" class="btn-hover text-light">Add to Cart <i class="fa fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                      @endforeach
                                </div>
                            </div>
                            @foreach ($maincategory as $cat)
                            <div id="tab-{{$cat->id}}" class="tab-pane fade show p-0">
                                <div class="row g-4">
                                    @foreach ($allProducts as $item)
                                   @if ($item->maincategory_id===$cat->id)
                                   <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="destination-img">
                                        <img class="img-fluid rounded w-100" src="{{$item->productImages[0]->pic()}}" style="height: 300px;width:100%;" alt="">
                                        <div class="destination-overlay p-4 product-overlay">
                                            <h4 class="text-light mb-2 mt-3">{{$item->name}}</h4>
                                            <h6 class="text-light mb-2 mt-3"><del>&#8377;{{$item->basePrice}}</del> &#8377;{{$item->finalPrice}} <sup>{{$item->discount}}% off</sup></h6>
                                            <a href="{{route('product',$item->id)}}" class="btn-hover text-light">Add to Cart <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                   @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Destination End -->

    @include('layouts.aboutus')


        <!-- Explore Tour Start -->
        <div class="container-fluid ExploreTour py-1">
            <div class="container py-1">   
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Explore Product</h5>
                    <h2>Top Brands Products with upto 99% Off</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.</p>
                </div>
                <div class="tab-class text-center">
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#NationalTab-1">
                                <span class="text-dark" style="width: 250px;">All Products</span>
                            </a>
                        </li>
                    
                    <li class="nav-item">
                        <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#InternationalTab-2">
                            <span class="text-dark" style="width: 250px;">Slider</span>
                        </a>
                    </li>
                     
                    </ul>
                    <div class="tab-content">
                        <div id="NationalTab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                  @foreach ($products as $item)
                                  <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="national-item">
                                        <img class="img-fluid rounded w-100" src="{{$item->productImages[0]->pic()}}" style="height: 300px;width:100%;" alt="">
                                        <div class="national-content">
                                            <div class="national-info">
                                          <h5 class="text-white text-uppercase mb-2">{{$item->name}}</h5>
                                          <h5 class="text-white text-uppercase mb-2">
                                            <del>&#8377;{{$item->basePrice}}</del>
                                            &#8377;{{$item->finalPrice}}
                                          </h5>
                                            <a href="{{route('product',$item->id)}}" class="btn-hover text-light"><i class="fa fa-shopping-cart me-3" style="font-size: 30px;"></i>Add to Cart</a>
                                            <div class="tour-offer bg-info">{{$item->discount}}% Off</div>
                                            {{-- <div class="national-plus-icon">
                                            <a href="#" class="my-auto text-light fs-5"> <i class="fa fa-arrow-right ms-2">Add to Cart</i></a>
                                            </div> --}}
                                            {{-- <h4 class="text-light mb-2 mt-3">{{$item->name}}</h4>
                                            <h6 class="text-light mb-2 mt-3"><del>&#8377;{{$item->basePrice}}</del> &#8377;{{$item->finalPrice}} <sup>{{$item->discount}}% off</sup></h6> --}}
                                        </div>
                                        </div>

                                    </div>
                                </div>
                                  @endforeach
                            </div>
                        </div>
                        
                        <div id="InternationalTab-2" class="tab-pane fade show p-0">
                            <div class="InternationalTour-carousel owl carousel">
                                @foreach ($allProducts as $item)
                                <div class="international-item">
                                     <img class="img-fluid rounded w-100" src="{{$item->productImages[0]->pic()}}" style="height: 350px;" class="img-fluid w-100 rounded" alt="Images">
                                     <div class="international-content">
                                        <div class="tour-offer bg-warning">{{$item->discount}}</div>
                                        <div class="international-info">
                                            <h5 class="text-white text-upparcase mb-2">{{$item->name}}</h5>
                                         <h6 class="text-light mb-2 mt-3"><del>&#8377;{{$item->basePrice}}</del> &#8377;{{$item->finalPrice}} <sup>{{$item->discount}}% off</sup></h6>
                                        </div>
                                         <a href="{{route('product',$item->id)}}" class="btn-hover text-light">Add to Cart <i class="fa fa-arrow-right ms-2"></i></a>
                                   </div>    
                             </div>  
                                 @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Explore Tour Start -->

        @include('layouts.highlights')

        <!-- Packages Start -->
        <div class="container-fluid packages py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Products</h5>
                    <h1 class="mb-0">Top Products</h1>
                </div>
                <div class="packages-carousel owl-carousel">
                    @foreach ($allProducts as $item)
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


      @include('layouts.testimonials')

      @include('layouts.newsletter')
        
@endsection