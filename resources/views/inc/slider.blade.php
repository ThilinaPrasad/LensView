<div id="welcome-slider" class="carousel carousel-fade" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#welcome-slider" data-slide-to="0" class="active"></li>
    <li data-target="#welcome-slider" data-slide-to="1"></li>
    <li data-target="#welcome-slider" data-slide-to="2"></li>
    @if(count($images)!=0) 
    @for($i=0;$i<count($images);$i++) 
    <li data-target="#welcome-slider" data-slide-to="{{ $i+3 }}"></li>
      @endfor 
      @endif
  </ul>
  <div class="carousel-inner">
    @if(count($images)!=0) 
    @for($i=0;$i<count($images);$i++) 
    <div class="carousel-item {{ $i==0 ? 'active' : '' }}">
      <img src="/storage/contest_images/{{ $images[$i]->image }}">
      <div class="carousel-caption">
        <h1 class="font_01">{{ $images[$i]->img_title }}</h1>
        <p class="font_02"><i class="fas fa-trophy"></i>&nbsp;&nbsp;Winner image of {{ $images[$i]->title }} contest&nbsp;&nbsp;<i class="fas fa-trophy"></i></p>
        
      </div>
  </div>
  @endfor 
  @endif
<div class="carousel-item {{ count($images)==0 ? 'active':'' }}">
    <img src="{{ asset('img/1.jpg') }}">
    <div class="carousel-caption">
      <h1 class="font_01">Los Angeles</h1>
      <p class="font_02">We had such a great time in LA!</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="{{ asset('img/2.jpg') }}">
    <div class="carousel-caption">
      <h1 class="font_01">Chicago</h1>
      <p class="font_02">Thank you, Chicago!</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="{{ asset('img/3.jpg') }}">
    <div class="carousel-caption">
      <h1 class="font_01">New York</h1>
      <p class="font_02">We love the Big Apple!</p>
    </div>
  </div>
</div>
<a class="carousel-control-prev" href="#welcome-slider" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#welcome-slider" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
</div>