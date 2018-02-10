@extends('layouts.app') 
@section('slider')
  @include('inc.slider')
<!-- Section 2 -->
<div class="jumbotron text-center">
  <h1 class="font_01">LensView</h1>
  <p>Sri Lankan Best Online Photography Contest</p>
  <div class="container marketing" style="margin-top:50px;">
    <div class="row">
      <div class="col-lg-4">
        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
          width="140" height="140">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut
          id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
      </div>
      <div class="col-lg-4">
        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
          width="140" height="140">
        <h2>Heading</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur
          purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
      </div>
      <div class="col-lg-4">
        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image"
          width="140" height="140">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis
          euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
          sit amet risus.</p>
      </div>
    </div>
  </div>
</div>
<!-- Section 2 end -->
<!-- Section 3 -->
<div class="parallax container-fluid" style="background-image: url('{{ asset("img/1.jpg") }}'); ">
</div>
<!-- Section 3 end-->
<!-- Section 4-->
<div class="section_4">
  <div class="description-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="desc-image">
            <img src="{{ asset('img/static/sec_2_img.png') }}" class="image-fluid">
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="desc-title text-center">
            <h1 class="text-center font_01">Dive In Your Passion</h1>
            <p>Ignore the awesome prizes, this is about harnessing the spirit of collaboration to feed your passion and elevate
              your game! Get your creative juices flowing, learn from peers and thought leaders, and improve as a photographer.
            </p>
            <h4 class="text-center font_01">Why ?</h4>
            <p>Photography is a way of feeling, of touching, of loving. What you have caught on film is captured forever… It
              remembers little things, long after you have forgotten everything.</p>
            <h4 class="text-center font_01">How It feels </h4>
            <p>A way of feeling, of touching. What you have caught on film is captured forever...It remembers little things,
              long after you have forgotten every thing.</p>
            <h4 class="text-center font_01">Have Fun</h4>
            <p>The camera is not only an extension of the eye, but of the brain. It can see sharper, farther, nearer, slower,
              faster than the eye…Instead of using the camera only to reproduce objects, I want to use it to make what is
              invisible to the eye, visible</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Section 4 end-->
<!-- Section 5-->
<div class="parallax container-fluid" style="background-image: url('{{ asset("img/3.jpg") }}');" id="counter-viewport">
  <div class="counter_wrapper">
    <h2 class="font_01 counter_header text-center">LensView User Intraction</h2>
    <div class="row text-center count_up">
      <div class="col-sm-4  font_02">
        <i class="fas fa-users counter_icon"></i>
        <div class="counter" data-count="150">0</div>
        <h2 class="counter_name">Users</h2>
      </div>
      <div class="col-sm-4  font_02">
        <i class="fas fa-trophy counter_icon"></i>
        <div class="counter" data-count="1500">0</div>
        <h2 class="counter_name">Contests</h2>
      </div>
      <div class="col-sm-4 font_02">
        <i class="far fa-image counter_icon"></i>
        <div class="counter" data-count="3500">0</div>
        <h2 class="counter_name">Photographs</h2>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Section 5 end-->
<!-- Section 6-->
<div class="jumbotron section_6 text-center">
  <h1 class="font_01">Win Amazing Prizes</h1>
  <div class="row">
    <div class="col-md-4 win_text offset-md-1">
      <p>It's not about the prizes, but...the prizes do rock. From getting published to scoring Canon 5Ds, winning contests
        isn't just about bragging rights. Elevate your photography and get inspired!</p>
    </div>
    <div class="col-md-6 offset-md-1">
      <img src="{{ asset('img/static/Prizes_icons.png') }}" class="mx-auto d-block img-fluid win_icon">
    </div>
  </div>
  @include('inc.testimonial')
</div>
<!-- Section 6 end-->

@stop