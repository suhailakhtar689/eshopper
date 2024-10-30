  <!-- Testimonial Start -->
  <div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Testimonial</h5>
            <h1 class="mb-0">Our Clients Say!!!</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
         @foreach ($testimonial as $item)
         <div class="testimonial-item text-center rounded pb-4">
            <div class="testimonial-comment bg-light rounded p-4">
                <p class="mb-5 text-justify testimonial-message">{{$item->message}}
                </p>
            </div>
            <div class="testimonial-img p-1">
                <img src="{{$item->pic()}}" class="img-fluid rounded-circle" alt="Image">
            </div>
            <div style="margin-top: -35px;">
                <h5 class="mb-0">{{$item->name}}</h5>
                <div class="d-flex justify-content-center">
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                </div>
            </div>
        </div>
  
         @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->