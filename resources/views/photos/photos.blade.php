@extends('layouts.app') 
@section('styles')
<link href="{{ asset('css/photos.blade.css') }}" rel="stylesheet"> 
@stop 
@section('title') Photos 
@stop 
@section('photos') navbar-active 
@stop 
@section('content') @if(count($images)!=0)
<div class='wrapper'>
    <div class="category-bar">
        <h3 align="center" class="font_01 cat-head">Category</h3>
        <select class="form-control mx-auto d-block col-md-3 cat-drop font_02">
        <option class="option" value="all">All</option>
        @foreach($categories as $category)
    <option class="option" value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        <option class="option" value="other">Other</option>
      </select>
    </div>

    <div class="container-fluid gal-container">
        <div class="row">
            @foreach($images as $image)
            <!--Image section-->
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item {{ ($image->category_id!=null) ? 'category-'.$image->category_id : 'other' }}" data-toggle="tooltip" data-placement="bottom"
                title="{{ $image->title }}">
                <div class="box">
                <a href="#" data-toggle="modal" data-target="#{{ $image->img_id }}" class="overlay">
              <img src="/storage/contest_images/{{ $image->image }}">
            </a>
                    <div class="modal fade" id="{{ $image->img_id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg mx-auto d-block" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <div class="card card-inverse">
                                        <img class="card-img" src="/storage/contest_images/{{ $image->image }}" alt="Card image">
                                        <div class="card-img-overlay text-left">
                                            <div class="img-inner rounded">
                                                <!--h3 class="card-title">Card title</h3-->
                                                @if(Auth::check())
                                                @if($image->downloadable=='on')
                                                <a href='/storage/contest_images/{{ $image->image }}' class='btn btn-dark btn-sm' download='' data-toggle="tooltip" data-placement="bottom" title="Download"><i class='fas fa-download'></i></a>
                                                @endif
                                                @else
                                                <a href='/login' class='btn btn-dark btn-sm' data-toggle="tooltip" data-placement="bottom" title="Download"><i class='fas fa-download'></i></a>
                                                @endif
                                                <p class="card-text badge badge-pill badge-dark">Uploaded by : {{ $image->name }}</p>
                                                <p class="card-text badge badge-pill badge-dark">{{ date_format(date_create($image->img_uploaded),'d-M-Y G:i A') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Image section-->
            @endforeach
        </div>
        <div style="height:100vh;padding-top:30vh;display:none;" class="no-images">
            <img src="{{ asset('img/static/animation_4.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
            <h5 align="center" class="font_01">No images available in this Category</h5>
        </div>
    </div>
    @else

    <div style="height:100vh;padding-top:40vh;">
        <img src="{{ asset('img/static/animation_4.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
        <h5 align="center" class="font_01">No images available</h5>
    </div>
    @endif
</div>

@stop 
@section('scripts')
<script>
    $('.cat-drop').on('change', function() {
        var category = $('.cat-drop').val();
        $('.no-images').fadeOut();
        //alert(category);
        if(category == 'all'){
            $(".gal-item").show('3000');
        }else if(category == 'other'){
            $(".gal-item").not('.other').hide('3000');
            $('.gal-item').filter('.other').show('3000');
            if($('.other').length == 0){
                $('.no-images').fadeIn();
            }
        }
        else{
            $(".gal-item").not('.category-'+category).hide('3000');
            $('.gal-item').filter('.category-'+category).show('3000');
            if($('.category-'+category).length == 0){
                $('.no-images').fadeIn();
            }
        }
});

</script>


@stop