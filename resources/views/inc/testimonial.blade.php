<div id="testimonial-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @for($i = 0;$i<count($reviews);$i++)
    <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
            <div class="mx-auto view overlay hm-black-light testimonial-img">
            <img src="/storage/profile_pics/{{ $reviews[$i]->profile_pic }}" class="testimonial-img rounded-circle mx-auto ">
            <a href="/users/{{ $reviews[$i]->reviewer_id }}">
                    <div class="mask flex-center rounded-circle testimonial-img mx-auto">
                    <p class="white-text">{{ $reviews[$i]->name }}</p>
                    </div>
                </a>
            </div>
            <i class="fas fa-quote-left"></i>
        <div class="col-md-6 offset-md-3">{{ $reviews[$i]->comment }}</div>
            <i class="fas fa-quote-right"></i>
        </div>
        @endfor
    </div>
    <a class="carousel-control-prev" href="#testimonial-slider" data-slide="prev" style="color:black;">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#testimonial-slider" data-slide="next" style="color:black;">
      <span class="carousel-control-next-icon"></span>
    </a>
</div>