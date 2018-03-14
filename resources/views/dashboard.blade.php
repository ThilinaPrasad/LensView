@extends('layouts.app') 
@section('title')
Dashboard
@stop
@section('content')
<div class="container">
    <div class="feed mx-auto d-block">
        <h1 class="font_01 head" align="center">LensView Timeline</h1>
        <hr>
        <div class="post jumbotron">
            <!--user data section -->
        <p class="pull-right img-cont">
            <a href="#"><img src="/storage/profile_pics/9314538b5ee4f824873ffa1395906fefbffb6b1f_1520489853.jpg" class="rounded-circle img-fluid profile-img"></a>
        </p>
            <p class="pull-left user-data">
            <strong><a href="#" title="View user profile">Thilina Prasad</a></strong>
            <br>
            <small>Published : 2018/2/25</small>
        </p>
         <!--user data section -->
          <!--post content section -->
        <div class="post-cont">
            <p class="post-title">Test test tets<br></p>
            <p class="post-contest"><a href="#" title="View contest">contest name</a></p>
            <p class="post-desc">The problem with this approach is that some browsers do not understand the rgba format and will not display any border at all if this is the entire declaration. The solution is to provide two border declarations. The first with a fake opacity, and the second with the actual. If a browser is capable, it will use the second, if not, it will use the first.</p>
            <figure class="figure">      
            <img src="/storage/contest_images/2bba60d026d20e87d70cee756601d89fde1012d7_1520502064.jpg" class="post-img mx-auto d-block">
            <figcaption class="figure-caption below-section row" style="font-size:20px;">      
                    <strong id="vote-btn-2" class="vote-btn-2 text-left col-md-6 m-text-center" title="Add vote" data-id="" data-lcl-txt="" onClick="">
                            <i class="far fa-heart"></i>&nbsp;55
                                               </strong>
                           <div class="col-md-6 text-right m-text-center">
                           <a href="/storage/contest_images/image path here" title="Download this Image" download="" class="share-btn"><i class="fas fa-download"></i></a>
                           <a href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank" class="share-btn" title="Share on Facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/intent/tweet?text=&amp;url=" target="_blank" class="share-btn" title="Share on Twitter"><i class="fab fa-twitter-square"></i></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=" target="_blank" class="share-btn" title="Share on LinkedIn"><i class="fab fa-linkedin"></i></a>  
                <a href="https://plus.google.com/share?url=" target="_blank" class="share-btn" title="Share on Google+"><i class="fab fa-google-plus-square"></i></a>               
            </div> 
            
        </figcaption>   
        </figure>
        </div>
        <!--post content section -->
    </div>
    </div>
</div>
@stop
@section('styles')
<style>
.feed{
    padding:80px;
    width:80%;
    min-height: 100vh;
    background-color: white;
}
.profile-img{
    width:50px;
    height:50px;
    float: left;
    margin-right:10px;
}

.img-cont{
    margin:0;
}

.user-data{
vertical-align: middle;
padding-top: 3px;
}

.vote-btn-2:hover{
    cursor: pointer;
}

.post-img{
    width:90%;
    border-top-right-radius: 10px;
border-top-left-radius: 10px;
}

.post-desc{
    padding-left:5%;
    padding-right:5%;
    font-size:11px;
}

.below-section{
    background-color: white;
    margin:auto 35px auto 34px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    padding-top: 5px;
    padding-bottom: 5px;
    border:1px solid rgba(102,102,102,0.2);
}

.share-btn{
    color: gray;
}

.post-title{
    padding-left:5%;
    padding-right:5%;
    font-size:20px;
    font-weight: 800;
    margin-bottom: 0;
}

.post-contest{
    padding-left:5%;
    padding-right:5%;
    font-size: 13px;
}

.container{
    padding:0;
}

a{
    color:black;
}

.head{
    margin-top: 10px;
    margin-bottom: 10px;
}

.jumbotron{
    background-color: white;
    border:1px solid rgba(102,102,102,0.2);
    border-radius: 10px;
    padding-bottom: 10px;
    padding-top:30px;
}

a:hover{
    text-decoration: none;
    color: black;
    opacity: 0.7;
}

@media (max-width: 768px) {
    .feed {
        padding-left:30px;
        padding-right:30px;
      width: 100vw;
    }

.below-section{
    margin:auto 12px auto 12px;
        
}

.m-text-center{
    text-align: center!important;
}

  }
</style>
@stop