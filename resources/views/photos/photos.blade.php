@extends('layouts.app') 
@section('styles')
<link href="{{ asset('css/photos.blade.css') }}" rel="stylesheet"> 
@stop 
@section('title') Photos 
@stop 
@section('content')
<div class="container-fluid gal-container">
    <div class="row">
        <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#1">
          <img src="{{ asset('img/static/reg_back.png') }}">
        </a>
                <div class="modal fade bd-example-modal-lg" id="1" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="{{ asset('img/static/reg_back.png') }}" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#2">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/2.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="2" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/2.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#3">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/3.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="3" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/3.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#4">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/4.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="4" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/4.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#5">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="5" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#7">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/6.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="7" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/6.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#8">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/7.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="8" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/7.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#9">
              <img src="http://nabeel.co.in/files/bootsnipp/gallery/11.jpg">
            </a>
                <div class="modal fade bd-example-modal-lg" id="9" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/11.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#10">
              <img src="http://nabeel.co.in/files/bootsnipp/gallery/12.jpg">
            </a>
                <div class="modal fade bd-example-modal-lg" id="10" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/12.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#11">
              <img src="http://nabeel.co.in/files/bootsnipp/gallery/13.jpg">
            </a>
                <div class="modal fade bd-example-modal-lg" id="11" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/13.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#12">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/9.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="12" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/9.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#13">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/10.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="13" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/10.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#14">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/14.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="14" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/14.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#15">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/15.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="15" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/15.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
            <div class="box">
                <a href="#" data-toggle="modal" data-target="#16">
          <img src="http://nabeel.co.in/files/bootsnipp/gallery/16.jpg">
        </a>
                <div class="modal fade bd-example-modal-lg" id="16" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="modal-body">
                                <div class="card card-inverse">
                                    <img class="card-img" src="http://nabeel.co.in/files/bootsnipp/gallery/16.jpg" alt="Card image">
                                    <div class="card-img-overlay text-left">
                                        <div class="img-inner rounded">
                                            <!--h3 class="card-title">Card title</h3-->
                                            <p class="card-text badge badge-pill badge-dark">Uploaded by: Thilina Prasad for 123 Contest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop