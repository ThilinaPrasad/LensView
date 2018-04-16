<div class="jumbotron mx-auto d-block">
    <h2 class="font_01 head" align="center">Photographer's Dashboard</h2>
    <hr>
    <ul class="nav nav-pills text-center font_02 lead">
        <li class="nav-item tab-item col-md-4">
            <a class="nav-link  tab-link {{ ($tab=='submit')? 'active':''}}" data-toggle="pill" href="#submissionimages">My Submitted Images <span class="badge badge-pill badge-light">{{count($submission_images)}}</span></a>
        </li>
        <li class="nav-item tab-item col-md-4">
            <a class="nav-link tab-link {{ ($tab=='vote')? 'active':''}}" data-toggle="pill" href="#voteimages">My Voting Images  <span class="badge badge-pill badge-light">{{count($voting_images)}}</span></a>
        </li>
        <li class="nav-item tab-item col-md-4">
            <a class="nav-link tab-link {{ ($tab=='contest')? 'active':''}}" data-toggle="pill" href="#contests">Joined Contests <span class="badge badge-pill badge-light">{{count($sub_contests)+count($vot_contests)}}</span></a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Submission Images section -->
        <div class="tab-pane {{ ($tab=='submit')? 'active':''}} container" id="submissionimages">
                @if(count($submission_images)!=0)
                @foreach($submission_images as $image)
            <div class="py-3">
                <div class="card mx-auto d-block">
                    <div class="row">
                        <div class="col-md-8">
                        <img src="/storage/contest_images/{{ $image->image }}" class="w-100">
                        </div>
                        <div class="col-md-4 px-3">
                            <div class="card-block px-3">
                                <h4 class="mt-5 card-title text-center">{{ $image->img_title }}</h4>
                                <p class="card-text text-center img-description">{{ $image->img_description }}</p>
                                <div class="text-center h5">
                                <span class="badge badge-pill badge-secondary">&nbsp;{{ $image->category }}&nbsp;</span>
                                </div>
                                <div class="text-center">
                                    <label name="contest">Contest : </label><a href="/contests/{{ $image->contest_id }}" class="card-text a" title="Goto contest">{{ $image->title }}</a><br>
                                    <label name="submitted">Submitted date : </label>
                                    <label class="card-text" name="submitted">{{ date_format(date_create($image->img_submittedDate),'d-M-Y') }}</label><br>
                                    <label name="availabel">Voting available in : </label>
                                    <label class="card-text" name="available">{{ date_format(date_create($image->sub_end_at),'d-M-Y') }}</label>
                                </div>
                                <div align="center" class="mt-2 mb-3">
                                    <a href="/photographs/{{ $image->img_id }}/edit" class="btn btn-success btn-sm mx-1"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</a>
                                    <button class="btn btn-danger btn-sm mx-1" id="deleteButton"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                                </div>
                                <!--Photograph delete form-->
                                <form method="post" action="{{ route('photographs.destroy',[$image->img_id]) }}" id="delete-image" style="display:none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete ">
                                    </form>
                                    <!--Photograph delete form-->
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach
            @else
            <div class="py-3">
                    <div class="card mx-auto d-block">
            <div style="padding-bottom:25vh;padding-top:25vh;">
                    <img src="{{ asset('img/static/animation_10.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Submitted Images</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Submission Images section -->
        <!-- Voting Images section -->
        <div class="tab-pane {{ ($tab=='vote')? 'active':''}} container" id="voteimages">
                @if(count($voting_images)!=0)
                @foreach($voting_images as $image)
            <div class="py-3">
                <div class="card mx-auto d-block">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="/storage/contest_images/{{ $image->image }}" class="w-100">
                        </div>
                        <div class="col-md-4 px-3">
                            <div class="card-block px-3">
                                <h4 class="mt-5 card-title text-center">{{ $image->img_title }}</h4>
                                <p class="card-text text-center img-description">{{ $image->img_description }}</p>
                                <div class="text-center h5">
                                        <span class="badge badge-pill badge-secondary">&nbsp;{{ $image->category }}&nbsp;</span>
                                        </div>
                                <div class="text-center">
                                    <label name="contest">Contest : </label><a href="/votes/photographs/{{ $image->contest_id }}" class="card-text a" title="Goto contest">{{ $image->title }}</a><br>
                                    <label name="submitted">Submitted date : </label>
                                    <label class="card-text" name="submitted">{{ date_format(date_create($image->img_submittedDate),'d-M-Y') }}</label><br>
                                    <label name="closed">Voting closed date : </label>
                                    <label class="card-text" name="closed">{{ date_format(date_create($image->closed_at),'d-M-Y') }}</label>
                                </div>
                                <div align="center" class="mt-2 mb-3">
                                <button class="btn btn-info btn-sm mx-1" data-toggle="modal" data-target="#graph" data-image-id="{{ $image->img_id }}" data-image-title="{{ $image->img_title }}" onclick="voteAnalyze(this);"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;View voting analytycs</button>
                                </div>
                                
                                <div class="text-center">
                                        <h6 class="font_01">Share On Social Media<h6>
                                                <div class="col-md-6 offset-md-3 social-icons">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::asset('/storage/contest_images/'.$image->image) }}" target="_blank" class="share-btn" title="Share on Facebook"><i class="fab fa-facebook-square"></i></a>
                                             <a href="https://twitter.com/intent/tweet?text={{ $image->title.'image from www.lensview.com' }}&amp;url={{ URL::asset("/storage/contest_images/".$image->image) }}" target="_blank" class="share-btn" title="Share on Twitter"><i class="fab fa-twitter-square"></i></a>
                                             <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::asset("/storage/contest_images/".$image->image) }}" target="_blank" class="share-btn" title="Share on LinkedIn"><i class="fab fa-linkedin"></i></a>  
                                             <a href="https://plus.google.com/share?url={{ URL::asset("/storage/contest_images/".$image->image) }}" target="_blank" class="share-btn" title="Share on Google+"><i class="fab fa-google-plus-square"></i></a>            
                                         </div> 
                                </div>
                                
                                <!--Graph Section-->
                                <div class="modal fade" id="graph" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="graph_title">Voting Analytics on</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--Vote Analysis Graph-->
                                                <canvas class="my-4" id="votingChart" width="900" height="380"></canvas>
                                                <h5 align="center" class="font_02 vote-tot">Total vote count : 1520<h5>
                                            </div>
                                   
                                        </div>
                                    </div>
                                </div>
                                <!--Graph Section-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="py-3">
                    <div class="card mx-auto d-block">
            <div style="padding-bottom:25vh;padding-top:25vh;">
                    <img src="{{ asset('img/static/animation_11.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Voting Images</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
         <!-- Voting Images section -->
         <!-- Contest section -->
        <div class="tab-pane container {{ ($tab=='contest')? 'active':''}}" id="contests">
            @if(count($sub_contests)!= 0 || count($vot_contests)!= 0)
            @foreach($sub_contests as $contest)
            <div class="card bg-light text-center contest">
                <img class="card-img" src="/storage/contest_images/854695a9fd5f47b88a0400f7d38af46bd3623b6c_1522407146.jpg" alt="Card image">
                <a href="/contests/{{ $contest->id }}" class="card-img-overlay text-white contest-data">
                    <div class="contest-inner">
                    <h2 class="card-title font_02">{{ $contest->title }}</h2>
                    <p class="card-text contest-description">{{ $contest->description }}</p>
                  <span class="card-text badge badge-pill badge-success contest-status">Submission Available</span>
                    </div>
                </a>
              </div>
              @endforeach
              @foreach($vot_contests as $contest)
              <div class="card bg-light text-center contest">
                    <img class="card-img" src="/storage/contest_images/854695a9fd5f47b88a0400f7d38af46bd3623b6c_1522407146.jpg" alt="Card image">
              <a href="/votes/photographs/{{ $contest->id }}" class="card-img-overlay text-white contest-data">
                        <div class="contest-inner">
                        <h2 class="card-title font_02">{{ $contest->title }}</h2>
                        <p class="card-text contest-description">{{ $contest->description }}</p>
                      <span class="card-text badge badge-pill badge-warning contest-status">Voting Available</span>
                        </div>
                    </a>
                  </div>
              @endforeach
              @else
              <div class="py-3">
                    <div class="card mx-auto d-block">
            <div style="padding-bottom:25vh;padding-top:25vh;">
                    <img src="{{ asset('img/static/animation_12.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Joined Contests</h6>
                    </div>
                </div>
            </div>
              @endif
        </div>
    </div>
</div>
