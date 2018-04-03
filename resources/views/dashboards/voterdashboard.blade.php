
<div class="container">
    <div class="feed mx-auto d-block">
        <h1 class="font_01 head" align="center">LensView Timeline</h1>
        <hr>
        @if(count($images)>0)
        @foreach($images as $image)
        <div class="post jumbotron">
            <!--user data section -->
        <p class="pull-right img-cont">
        <a href="/users/{{ $image->user_id }}"><img src="/storage/profile_pics/{{ $image->profile_pic }}" class="rounded-circle img-fluid profile-img"></a>
        </p>
            <p class="pull-left user-data">
            <strong><a href="/users/{{ $image->img_uploader }}" title="View user profile">{{ $image->name }}</a></strong>
            <br>
            <small>Published in : {{ date_format(date_create($image->published_at),'d-M-Y  G:i A') }}</small>
        </p>
         <!--user data section -->
          <!--post content section -->
        <div class="post-cont">
            <p class="post-title">{{ $image->img_title }}<br></p>
            <p class="post-contest"><a href="contests/{{ $image->contest_id }}" title="View contest">{{ $image->title }}</a></p>
            <p class="post-desc">{{ $image->img_description }}</p>
            <figure class="figure">      
            <img src="/storage/contest_images/{{ $image->image }}" class="post-img mx-auto d-block">
            <figcaption class="figure-caption below-section row" style="font-size:20px;">      
                    <strong id="vote-btn-2" class="vote-btn-2 text-left col-md-6 m-text-center" title="Add vote" data-id="{{ $image->img_id }}" data-lcl-txt="{{ ($image->vote_count == null)? 0:$image->vote_count  }}" onClick="voteImg(this);">
                            <i class="{{ (in_array($image->img_id,$votes))? 'fas fa-heart' : 'far fa-heart' }}"></i>&nbsp;{{ ($image->vote_count == null)? 0:$image->vote_count  }}
                                               </strong>
                           <div class="col-md-6 text-right m-text-center">
                           <a href="/storage/contest_images/{{ $image->image }}" title="Download this Image" download="" class="share-btn" {{ $image->downloadable!='on'? 'hidden' : ''}}><i class="fas fa-download"></i></a>
                           <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::asset('/storage/contest_images/'.$image->image) }}" target="_blank" class="share-btn" title="Share on Facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/intent/tweet?text={{ $image->title.'image from www.lensview.com' }}&amp;url={{ URL::asset("/storage/contest_images/".$image->image) }}" target="_blank" class="share-btn" title="Share on Twitter"><i class="fab fa-twitter-square"></i></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ URL::asset("/storage/contest_images/".$image->image) }}" target="_blank" class="share-btn" title="Share on LinkedIn"><i class="fab fa-linkedin"></i></a>  
                <a href="https://plus.google.com/share?url={{ URL::asset("/storage/contest_images/".$image->image) }}" target="_blank" class="share-btn" title="Share on Google+"><i class="fab fa-google-plus-square"></i></a>               
            </div> 
        </figcaption>   
        </figure>
        </div>
        <!--post content section -->
    </div>
    @endforeach
    @else
    <div class="jumbotron">
    <h3 class="font_01 text-muted" align="center" >No Images Available</h3>
    
    <div class="progress mt-4 mb-4" style="opacity:0.5;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 100%;opacity:0.5;"></div>
          </div>
              
    </div>
    @endif
    </div>
    
</div>
