<div class="jumbotron mx-auto d-block">
    <h2 class="font_01 head" align="center">Organizer Dashboard</h2>
    <hr>
    <ul class="nav nav-pills text-center font_02">
        <li class="nav-item tab-item col-md-3">
            <a class="nav-link  tab-link {{ ($tab=='upcoming')? 'active':''}}" data-toggle="pill" href="#upcoming">Upcoming Contests <span class="badge badge-pill badge-light">{{count($up_contests)}}</span></a>
        </li>
        <li class="nav-item tab-item col-md-2">
            <a class="nav-link  tab-link {{ ($tab=='submit')? 'active':''}}" data-toggle="pill" href="#submission">Submission Contests <span class="badge badge-pill badge-light">{{count($sub_contests)}}</span></a>
        </li>
        <li class="nav-item tab-item col-md-2">
            <a class="nav-link tab-link {{ ($tab=='vote' || $tab=='')? 'active':''}}" data-toggle="pill" href="#voting">Voting Contests <span class="badge badge-pill badge-light">{{count($vot_contests)}}</span></a>
        </li>
        <li class="nav-item tab-item col-md-2">
            <a class="nav-link tab-link {{ ($tab=='winner')? 'active':''}}" data-toggle="pill" href="#closed">Winner Contests <span class="badge badge-pill badge-light">{{count($closed_contests)}}</span></a>
        </li>
        <li class="nav-item tab-item col-md-3">
            <a class="nav-link tab-link {{ ($tab=='category')? 'active':''}}" data-toggle="pill" href="#category">Manage Categories</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Upcoming contest section -->
        <div class="tab-pane container {{ ($tab=='upcoming')? 'active':''}}" id="upcoming">

            @if(count($up_contests)!= 0) @foreach($up_contests as $contest)
            <div class="card bg-light text-center contest">
                <img class="card-img" src="/storage/contests_covers/{{ $contest->cover_img }}" alt="Card image">
                <div class="card-img-overlay text-white contest-data">
                    <div class="contest-inner">
                        <h2 class="card-title font_02">{{ $contest->title }}</h2>
                        <p class="card-text contest-description">{{ $contest->description }}</p>
                        <button href="#" class="btn btn-info btn-lg" onclick="window.location.href='/contests/{{ $contest->id }}'"><i class="far fa-images"></i>&nbsp;&nbsp;View</button>
                        <button href="#" class="btn btn-success btn-lg" onclick="window.location.href='/contests/{{ $contest->id }}/edit'"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</button>
                        <button href="#" class="btn btn-danger btn-lg" data-id="{{ $contest->id }}" data-title="{{ $contest->title }}" onclick="deleteContest(this);"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                        <form method="post" action="{{ route('contests.destroy',[$contest->id]) }}" id="{{ "delete-contest-".$contest->id }}" style="display:none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete ">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach @else
            <div class="py-3">
                <div class="card mx-auto d-block">
                    <div style="padding-bottom:25vh;padding-top:25vh;">
                        <img src="{{ asset('img/static/animation_7.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Upcoming Contests</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Upcoming Contest section -->
        <!-- Submission contest section -->
        <div class="tab-pane {{ ($tab=='submit')? 'active':''}} container" id="submission">

            @if(count($sub_contests)!= 0) @foreach($sub_contests as $contest)
            <div class="card bg-light text-center contest">
                <img class="card-img" src="/storage/contests_covers/{{ $contest->cover_img}}" alt="Card image">
                <div class="card-img-overlay text-white contest-data">
                    <div class="contest-inner">
                        <h2 class="card-title font_02">{{ $contest->title }}</h2>
                        <p class="card-text contest-description">{{ $contest->description }}</p>
                        <button href="#" class="btn btn-info btn-lg" onclick="window.location.href='/contests/{{ $contest->id }}'"><i class="far fa-images"></i>&nbsp;&nbsp;View</button>
                        <button href="#" class="btn btn-success btn-lg" onclick="window.location.href='/contests/{{ $contest->id }}/edit'"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</button>
                        <button href="#" class="btn btn-danger btn-lg" data-id="{{ $contest->id }}" data-title="{{ $contest->title }}" onclick="deleteContest(this);"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete</button>
                        <form method="post" action="{{ route('contests.destroy',$contest->id) }}" id="{{ "delete-contest-".$contest->id }}" style="display:none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete ">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach @else
            <div class="py-3">
                <div class="card mx-auto d-block">
                    <div style="padding-bottom:25vh;padding-top:25vh;">
                        <img src="{{ asset('img/static/animation_10.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Submission Contests</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Submission Contest section -->
        <!-- Voting Contest section -->
        <div class="tab-pane container {{ ($tab=='vote')? 'active':''}}" id="voting">
            @if(count($vot_contests)!= 0) @foreach($vot_contests as $contest)
            <div class="card bg-light text-center contest">
                <img class="card-img" src="/storage/contests_covers/{{ $contest->cover_img }}" alt="Card image">
                <div class="card-img-overlay text-white contest-data">
                    <div class="contest-inner">
                        <h2 class="card-title font_02">{{ $contest->title }}</h2>
                        <p class="card-text contest-description">{{ $contest->description }}</p>
                        <button href="#" class="btn btn-info btn-lg" onclick="window.location.href='/votes/photographs/{{ $contest->id }}'"><i class="far fa-images"></i>&nbsp;&nbsp;View Contest</button>
                    </div>

                </div>
            </div>
            @endforeach @else
            <div class="py-3">
                <div class="card mx-auto d-block">
                    <div style="padding-bottom:25vh;padding-top:25vh;">
                        <img src="{{ asset('img/static/animation_11.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Voting Contests</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Voting Contest section -->
        <!-- Closed section -->
        <div class="tab-pane container {{ ($tab=='winner')? 'active':''}}" id="closed">
            @if(count($closed_contests)!= 0) @foreach($closed_contests as $contest)
            <div class="card bg-light text-center contest">
                <img class="card-img" src="/storage/contests_covers/{{ $contest->cover_img }}" alt="Card image">
                <div class="card-img-overlay text-white contest-data">
                    <div class="contest-inner">
                        <h2 class="card-title font_02">{{ $contest->title }}</h2>
                        <p class="card-text contest-description">{{ $contest->description }}</p>
                        <button class="btn btn-info btn-lg {{ ($contest->winner_id != null) ? '' :'winner-btn'}}" data-toggle="modal" data-target="{{ '#winner-select-model-'.$contest->contest_id }}"
                        title="{{ ($contest->winner_id != null) ? 'View Winner of the contest' :'Select the Winner of the Contest' }}" id="{{ 'winner-contest-btn-'.$contest->contest_id }}"><i class="fas fa-trophy"></i>&nbsp;&nbsp;{{ ($contest->winner_id != null) ? 'View Winner' :'Select Winner' }}</button>

                    </div>
                </div>
            </div>
            
            <?php 
            //winning Images loding section
            $contest_imgs = [];
                for($i =0;$i<count($winner_imgs);$i++){
                    $image = $winner_imgs[$i];
                    if($image->contest_id == $contest->contest_id){
                        array_push($contest_imgs,$image);
                    }
                }
                //most voted image order
                usort($contest_imgs, function($a, $b) {
                    return $a->vote_count <=> $b->vote_count;
                });
                $contest_imgs = array_reverse($contest_imgs); 
            
            ?>
           
            <!--Winner images section-->
            <div class="modal fade winner-select-model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
                id="{{ 'winner-select-model-'.$contest->contest_id  }}">
                <div class="modal-dialog modal-lg mx-auto d-block">
                    <div class="modal-content">
                        <div class="modal-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                            <h3 align="center" class="font_01 modal-header mx-auto d-block">{{ $contest->title }} Contest Uploaded Images</h3>
                            <!--Image Section-->
                            <div class="image-container">
                                @if(count($contest_imgs)!=0)
                                <h5 align="center" class="font_02"><i class="fas fa-heart"></i>&nbsp;&nbsp;Most Voted Image&nbsp;&nbsp;<i class="fas fa-heart"></i></h5>
                                <div class="mx-auto d-block">
                                    <div class="row" style="margin-left: 0;margin-right: 0;">
                                        <figure class="figure col-md-6 offset-md-3 row mb-4">
                                            <a class="elem" href="/storage/contest_images/{{ $contest_imgs[0]->image  }}" title="{{ $contest_imgs[0]->img_title }}" data-lcl-txt="
                                                    <div class='row badge badge-pill badge-info'><i class='fas fa-heart'></i>&nbsp;&nbsp<strong id='vote_count{{ $contest_imgs[0]->img_id }}'>{{ ($contest_imgs[0]->vote_count == null)? 0:$contest_imgs[0]->vote_count  }}</strong></div><div class='row'><a href='/storage/contest_images/{{ $contest_imgs[0]->image }}' class='btn btn-success' download='' {{ $contest_imgs[0]->downloadable!='on'? 'hidden' : ''}}><i class='fas fa-download'></i>&nbsp;&nbsp;Download</a></div>
                                                " data-lcl-author='<a href="/users/{{ $contest_imgs[0]->img_user }}" title="View profile">{{ Laravel\User::find($contest_imgs[0]->img_user)->name }}</a>'
                                                data-lcl-thumb="/storage/contest_images/{{ $contest_imgs[0]->image }}">
                                            <img src="/storage/contest_images/{{ $contest_imgs[0]->image }}" class="figure-img img-fluid">
                                            </a>
                                            <figcaption class="figure-caption below-section text-left pt-2 pl-2" style="font-size:12px;">

                                                <p style="display:inline;"><i class="fas fa-certificate"></i>&nbsp;&nbsp;Image Tilte : {{ $contest_imgs[0]->img_title
                                                    }}</p><br>
                                                <p style="display:inline;"><i class="fas fa-certificate"></i>&nbsp;&nbsp;Photographer :<a style="color:black;"
                                                        href="/users/{{ $contest_imgs[0]->img_user }}" title="View profile">{{ Laravel\User::find($contest_imgs[0]->img_user)->name }}</a></p><br>
                                                <p style="display:inline;"><i class="fas fa-certificate"></i>&nbsp;&nbsp;Total Vote Count : {{ ($contest_imgs[0]->vote_count
                                                    == null)? 0:$contest_imgs[0]->vote_count }}</p><br>
                                                <img src="{{ ($contest->winner_id != null) ? (($contest->img_id == $contest_imgs[0]->img_id) ? asset('img/static/winner-throphy.png') : asset('img/static/participated-icon.png') ) : asset('img/static/winner-select-btn.png')}}" class="mx-auto d-block winner-select-btn {{ 'winner-btn-'.$contest_imgs[0]->contest_id }}"
                                                    style="margin:10px;opacity:0.8;width:90px;height:90px;" data-toggle="tooltip"
                                                    data-placement="top" data-title="{{ $contest_imgs[0]->img_title }}" data-img="{{ $contest_imgs[0]->img_id }}"
                                                    data-contest="{{ $contest_imgs[0]->contest_id }}" data-user="{{ $contest_imgs[0]->img_user }}"
                                                    onClick="{{ ($contest->winner_id != null) ? '' : 'selectWinner(this);' }}" title="{{ ($contest->winner_id != null) ? (($contest->img_id == $contest_imgs[0]->img_id) ? 'Winner of the contest' : 'Participated to the contest' ) : 'Select as winner'}}">
                                            </figcaption>
                                        </figure>

                                        @for ($i = 1; $i<count($contest_imgs); $i++) 
                                        
                                        <figure class="figure col-md-4">
                                            <a class="elem" href="/storage/contest_images/{{ $contest_imgs[$i]->image }}" title="{{ $contest_imgs[$i]->img_title }}" data-lcl-txt="
                                                <div class='row badge badge-pill badge-info'><i class='fas fa-heart'></i>&nbsp;&nbsp<strong id='vote_count{{ $contest_imgs[$i]->img_id }}'>{{ ($contest_imgs[$i]->vote_count == null)? 0:$contest_imgs[$i]->vote_count  }}</strong></div><div class='row'><a href='/storage/contest_images/{{ $contest_imgs[$i]->image }}' class='btn btn-success' download='' {{ $contest_imgs[$i]->downloadable!='on'? 'hidden' : ''}}><i class='fas fa-download'></i>&nbsp;&nbsp;Download</a></div>
                                            " data-lcl-author='<a href="/users/{{ $contest_imgs[$i]->img_user }}" title="View profile">{{ Laravel\User::find($contest_imgs[$i]->img_user)->name }}</a>'
                                                data-lcl-thumb="/storage/contest_images/{{ $contest_imgs[$i]->image }}">
                                            <img src="/storage/contest_images/{{ $contest_imgs[$i]->image }}" class="figure-img img-fluid">
                                            </a>
                                            <figcaption class="figure-caption below-section text-left pt-2 pl-2" style="font-size:12px;">

                                                <p style="display:inline;"><i class="fas fa-certificate"></i>&nbsp;&nbsp;Image Tilte : {{ $contest_imgs[$i]->img_title
                                                    }}</p><br>
                                                <p style="display:inline;"><i class="fas fa-certificate"></i>&nbsp;&nbsp;Photographer :<a style="color:black;"
                                                        href="/users/{{ $contest_imgs[$i]->img_user }}" title="View profile">{{ Laravel\User::find($contest_imgs[$i]->img_user)->name }}</a></p><br>
                                                <p style="display:inline;"><i class="fas fa-certificate"></i>&nbsp;&nbsp;Total Vote Count : {{ ($contest_imgs[$i]->vote_count
                                                    == null)? 0:$contest_imgs[$i]->vote_count }}</p><br>
                                                <img src="{{ ($contest->winner_id != null) ? (($contest->img_id == $contest_imgs[$i]->img_id) ? asset('img/static/winner-throphy.png') : asset('img/static/participated-icon.png') ) : asset('img/static/winner-select-btn.png')}}" class="mx-auto d-block winner-select-btn {{ 'winner-btn-'.$contest_imgs[$i]->contest_id }}"
                                                    style="margin:10px;opacity:0.8;width:90px;height:90px;" data-toggle="tooltip"
                                                    data-placement="top" data-title="{{ $contest_imgs[$i]->img_title }}" data-img="{{ $contest_imgs[$i]->img_id }}"
                                                    data-contest="{{ $contest_imgs[$i]->contest_id }}" data-user="{{ $contest_imgs[$i]->img_user }}"
                                                    onClick="{{ ($contest->winner_id != null) ? '' : 'selectWinner(this);' }}" title="{{ ($contest->winner_id != null) ? (($contest->img_id == $contest_imgs[$i]->img_id) ? 'Winner of the contest' : 'Participated to the contest' ) : 'Select as winner'}}">
                                            </figcaption>
                                            </figure>
                                            @endfor
                                    </div>
                                </div>
                                @else
                                <div style="height:100vh;padding-top:25vh;">
                                    <img src="{{ asset('img/static/animation_4.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                                    <h6 align="center" class="font_01">No Uploaded photographs</h6>
                                </div>
                                @endif

                                <!--Image section-->
                            </div>
                            
                            <div class="mx-auto d-block text-center">
                                    <div class="btn-group text-center" role="group">
                                        
                                            <form method="post" action="{{ route('contests.destroy',$contest->contest_id) }}" id="{{ "delete-contest-".$contest->contest_id }}" style="display:none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete ">
                                                </form>
                                            <div id="{{ 'winner-select-delete-'.$contest->contest_id }}">
                                        @if($contest->winner_id != null)
                                    <button class="btn btn-danger btn-sm" data-id="{{ $contest->contest_id }}" data-title="{{ $contest->title }}" onclick="deleteContest(this);"  data-toggle="tooltip" data-placement="top" title="Delete this contest">Delete Contest</button>
                            @endif    
                                                </div>    
                            <a href="/votes/photographs/{{ $contest->contest_id }}" class="btn btn-success btn-sm"  data-toggle="tooltip" data-placement="top" title="Goto contest page">Goto Voting Page</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Winner images section-->

            @endforeach
            
            @else
            <div class="py-3">
                <div class="card mx-auto d-block">
                    <div style="padding-bottom:25vh;padding-top:25vh;">
                        <img src="{{ asset('img/static/animation_9.gif') }}" class="rounded-circle mx-auto d-block" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                        <h6 align="center" class="font_01">No Winner Selecting Contests</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Closed section -->
        <!-- Category section -->
        <div class="tab-pane container {{ ($tab=='category')? 'active':''}}" id="category">
            <div class="row">
                <div class="col-md-4">
                    <div class="available">
                        @if(count($categories)!=0)
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action active font_01 list-group-item-secondary text-center h5">Available Categories</li>
                            @foreach($categories as $category)
                            <li class="list-group-item list-group-item-action" id='{{ ' row- '.$category->id }}'>
                                <div class="row">
                                    <div class="col-md-10">{{ $category->name }}</div>
                                    <div class="col-md-2"><span class="btn badge badge-danger badge-pill" data-toggle="tooltip" data-placement="top"
                                            title="Delete" data-id="{{ $category->id }}" {{ ($category->creater_id == Auth::user()->id)?'':'hidden' }} onclick="deleteCategory(this)">&times;</span></div>
                                </div>
                            </li>
                            <form method="post" action="{{ route('categories.destroy',$category->id) }}" id="{{ "delete-cat-".$category->id }}" style="display:none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete ">
                            </form>
                            @endforeach
                            <li class="list-group-item">{{ $categories->links() }}</li>
                        </ul>

                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="add-category">
                        <h4 class="font_01 head" align="center">Add New Category</h4>
                        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Category name Field -->
                            <div class="form-group row">
                                <div class="col-md-6 mx-auto d-block">
                                    <input type="text" class="text-center form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                        autofocus placeholder="Enter category name here">                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback text-center">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                            <!-- Category name Field -->
                            <div class="form-group row">
                                <div class="col-md-6 mx-auto d-block">
                                    <button type="submit" class="btn btn-success mx-auto d-block cat-submit">
                                    Add Category
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <img src="{{ asset('img/static/animation_13.gif') }}" class="mx-auto d-block mt-6" style="margin:10px;opacity:0.8;width:100px;height:100px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- Category section -->
    </div>
</div>