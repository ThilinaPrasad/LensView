@extends('layouts.app') 
@section('title') Dashboard 
@stop 
@section('content') 
@if(Auth::check() && Auth::user()->role_id== '1')
    @include('dashboards.voterdashboard') 
    @elseif(Auth::check() && Auth::user()->role_id== '2')
    @include('dashboards.photographerdashboard') 
    @elseif(Auth::check() && Auth::user()->role_id== '3')
    @include('dashboards.orgernizerdashboard') 
    @endif 
@stop 
@section('scripts')
<!-- scripts for voters dashboard -->
@if(Auth::check() && Auth::user()->role_id== '1')
<script>
   function voteImg(btn){
      var voteCount = $(btn).attr("data-lcl-txt").trim();
      var inner = $(btn).html().trim();
      var id = $(btn).attr("data-id").trim();
       var xhttp = new XMLHttpRequest();
       if(inner=='<i class="far fa-heart"></i>&nbsp;'+voteCount){
           
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        $(btn).attr("data-lcl-txt",(parseInt(voteCount)+1).toString());
        $(btn).html('<i class="fas fa-heart"></i>&nbsp;'+(parseInt(voteCount)+1).toString());
    }

  };
  xhttp.open("get", "/addvote/"+id, true);
  xhttp.send();
  }else{
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        $(btn).attr("data-lcl-txt",(parseInt(voteCount)-1).toString());
        $(btn).html('<i class="far fa-heart"></i>&nbsp;'+(parseInt(voteCount)-1).toString());
    }

  };
  xhttp.open("get", "/removevote/"+id, true);
  xhttp.send();
  }}
</script>
<!-- scripts for voters dashboard -->
@elseif(Auth::check() && Auth::user()->role_id== '2')
<!-- scripts for photographers dashboard -->
<!-- voting graph -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>

//voting analyze function
function voteAnalyze(image){
    //chage graph analyze title
    var title = $(image).attr("data-image-title").trim();
    var id = $(image).attr("data-image-id").trim();
    $('#graph_title').text($('#graph_title').text()+" "+title);

    //*****************************
    //add analyze function here
    //*****************************

}

//graph drawing function
  var ctx = document.getElementById("votingChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Saturday", "Saturday"],
      datasets: [{
        data: [10, 3, 15, 4, 2, 8, 12],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false,
      }
    }
  });
</script>
<!-- voting graph -->

<!-- Delete Image section -->
<script>
    $('#deleteButton').click(function(){
        $.confirm({
                        theme: 'modern',
                        icon: 'far fa-trash-alt',
                        title: 'Delete Photograph!',
                        content: 'Do you want to delete this Photograph ?',
                        autoClose: 'cancel|10000',
                        closeIcon: true,
                        draggable: true,
                        animationBounce: 2.5,
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            Delete: {
                            text: 'Delete',
                            btnClass: 'btn-red',
                            action : function () {
                                event.preventDefault();
                                $('#delete-image').submit();
                            }
                        },
                            cancel: function () {
                                
                            }
                            
                        }
                    });
    });
</script>

<!-- scripts for photographers dashboard -->
<!-- scripts for organizers dashboard -->
@elseif(Auth::check() && Auth::user()->role_id== '3')
<script src="{{ asset('js/vote_img/lc_lightbox.lite.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/vote_img/alloy_finger.min.js') }}" type="text/javascript"></script>.
<script>
    //Image view light box
     $(document).ready(function(e) {
           
           // live handler
           lc_lightbox('.elem', {
               wrap_class: 'lcl_fade_oc',
               gallery : true,	
               thumb_attr: 'data-lcl-thumb', 
               skin: 'minimal',
               radius: 0,
               padding	: 0,
               border_w: 0,
           });	
       });
</script>
<script>
     //Delete contests
        function deleteContest(contest){
            var id = $(contest).attr('data-id');
            var title = $(contest).attr('data-title');
            //console.log(id);
            $.confirm({
                            theme: 'modern',
                            icon: 'far fa-trash-alt',
                            title: 'Delete Contest!',
                            content: 'Do you want to delete '+title+' contest ?',
                            autoClose: 'cancel|10000',
                            closeIcon: true,
                            draggable: true,
                            animationBounce: 2.5,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                Delete: {
                                text: 'Delete',
                                btnClass: 'btn-red',
                                action : function () {
                                    event.preventDefault();
                                    $('#delete-contest-'+id).submit();
                                }
                            },
                                cancel: function () {
                                    
                                }
                                
                            }
                        });

                        
}
//Delete Category
function deleteCategory(cat){
            var id = $(cat).attr('data-id');
            $('#delete-cat-'+id).submit();
            $('#row-'+id).css('display','none');
}
    </script>

<!-- scrolling control with winner image modal -->
    <script>
    $('.modal-content').mouseenter(function(){
    $('body').scrollLock('enable');
    $('.modal-content').scrollLock('disable');
    $('.modal-content').on( 'mousewheel', function (e) { 
            var e0 = e.originalEvent;
            var delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
            $('body').scrollLock('enable');
          });
  });
          $('.modal-content').mouseleave(function(){
            $('body').scrollLock('disable');
          });


//select the contest winner function
    function selectWinner(image){
        var title = $(image).attr('data-title');
        var img = $(image).attr('data-img');
        var contest = $(image).attr('data-contest');
        var user = $(image).attr('data-user');
        $.confirm({
                            theme: 'modern',
                            icon: 'fas fa-trophy',
                            title: 'Confirm Winner Select',
                            content: 'Do you want to select <b>'+title+'</b> image as the winner ?',
                            autoClose: 'cancel|10000',
                            closeIcon: true,
                            draggable: true,
                            animationBounce: 2.5,
                            type: 'green',
                            typeAnimated: true,
                            buttons: {
                                Confirm: {
                                text: 'Confirm',
                                btnClass: 'btn-green',
                                action : function () {
                                    
                                    $.get("/winnerselect/"+contest+"/"+img+"/"+user, function(data, status){
                                       if(status=='success' && data==''){
                                        $.alert({
                                                theme: 'modern',
                                                icon: 'fas fa-trophy',
                                                title: 'Success !',
                                                content: title+" image selected as the winner successfully!",
                                                autoClose: 'ok|3000',
                                                type: 'green',
                                                        typeAnimated: true,
                                            });
                                            //change the winner select images btn css
                                            $(image).fadeOut();
                                            $('.winner-btn-'+contest).fadeOut();
                                            $('.winner-btn-'+contest).attr('src',"{{ asset('img/static/participated-icon.png') }}");
                                            $('.winner-btn-'+contest).attr('src',"{{ asset('img/static/participated-icon.png') }}");
                                            $('.winner-btn-'+contest).attr('data-original-title',"Participated to the contest");
                                            $('.winner-btn-'+contest).attr('onClick',"");
                                            $(image).attr('src',"{{ asset('img/static/winner-throphy.png') }}");
                                            $(image).fadeIn();
                                            $('.winner-btn-'+contest).fadeIn();
                                            //contest winner select btn css
                                            $('#winner-contest-btn-'+contest).html('<i class="fas fa-trophy"></i>&nbsp;&nbsp;View Winner');
                                            $('#winner-contest-btn-'+contest).removeClass('winner-btn');
                                            //delete button Enable
                                            $("#winner-select-delete-"+contest).html('<button class="btn btn-danger btn-sm" data-id="'+contest+'" data-title="'+title+'" onclick="deleteContest(this);"  data-toggle="tooltip" data-placement="top" title="Delete this contest">Delete Contest</button>');
                                       $(image).attr('data-original-title',"Winner of the contest");
                                       }else if(status =="success" && data == "selected"){
                                        $.alert({
                                                theme: 'modern',
                                                icon: 'fas fa-trophy',
                                                title: 'Warning !',
                                                content: "This contest already selected a winner!",
                                                autoClose: 'ok|3000',
                                                type: 'red',
                                                        typeAnimated: true,
                                            });
                                            
                                       }
                                       

                                    });
                                    
                                }
                            },
                                cancel:{
                                    text:"Cancel"
                                }
                                
                            }
                        });
    }

    </script>
    <!-- scripts for organizers dashboard -->
@endif 
@stop 
@section('styles') 
<style>
    .img-description{
        max-height: 125px;
        overflow-y: scroll;
    }
    .social-icons{
        font-size: 20px;
    }

    a {
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
        opacity: 0.7;
    }
</style>
@if(Auth::check() && Auth::user()->role_id == '1')
<!-- styles for voters dashboard -->
<style>
    .feed {
        padding: 80px;
        width: 80%;
        min-height: 100vh;
        background-color: white;
    }
    .profile-img {
        width: 50px;
        height: 50px;
        float: left;
        margin-right: 10px;
    }
    .img-cont {
        margin: 0;
    }
    .user-data {
        vertical-align: middle;
        padding-top: 3px;
    }
    .vote-btn-2:hover {
        cursor: pointer;
    }
    .post-img {
        width: 90%;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }
    .post-desc {
        padding-left: 5%;
        padding-right: 5%;
        font-size: 11px;
    }
    .below-section {
        background-color: white;
        margin: auto 35px auto 34px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
        border: 1px solid rgba(102, 102, 102, 0.2);
    }
    .share-btn {
        color: gray;
    }
    .post-title {
        padding-left: 5%;
        padding-right: 5%;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 0;
    }
    .post-contest {
        padding-left: 5%;
        padding-right: 5%;
        font-size: 13px;
    }
    .container {
        padding: 0;
    }
    
    .head {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .jumbotron {
        background-color: white;
        border: 1px solid rgba(102, 102, 102, 0.2);
        border-radius: 10px;
        padding-bottom: 10px;
        padding-top: 30px;
        margin-bottom: 15px;
    }
    
    @media (max-width: 768px) {
        .feed {
            padding-left: 30px;
            padding-right: 30px;
            width: 100vw;
        }
        .below-section {
            margin: auto 12px auto 12px;
        }
        .m-text-center {
            text-align: center!important;
        }
    }
</style>
<!-- styles for voters dashboard -->
@elseif(Auth::check() && Auth::user()->role_id == '2')
<!-- styles for photographers dashboard -->
<style>
    .jumbotron {
        background-color: white;
        border: 1px solid rgba(102, 102, 102, 0.2);
        border-radius: 10px;
        padding-bottom: 10px;
        padding-top: 30px;
        margin-top: 55px;
        width:95vw;
    }

.tab-item{
    margin: 0;
    padding: 0;
    border-radius: 0;
    background-color: rgba(181,181,181,0.5);
}

    .tab-link{
        margin: 0;
        color: white;
    }

.a{
    color: black;
    font-weight: 600;
    opacity: 0.8;
}

.a:hover{
    text-decoration: none;
    color:black;
    opacity: 0.5;
}

    .image-data{
        overflow-y: scroll;
    }

    .vote-tot{
        background-color: rgba(118, 255, 3,0.2);
        padding:15px;
        border-radius:5px;
        border:3px solid rgba(118, 255, 3,0.7);

    }

    .contest{
        height:500px;
        overflow: hidden;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .contest-data{
        padding-top:200px;
    }



.contest-data:hover{
    background: rgba(0,0,0,0.3);
    opacity: 1;
}

.contest-description{
    max-height:250px;
    overflow-y: scroll;
}

    .contest-status{
        font-size: 20px;
    }

    @media (max-width: 768px) {
        .contest{
            height: auto;
        }

    .contest-data{
        padding-top: 0;
        
    }
    .contest-inner{
        transform: scale(0.6);
    }
.contest-description{
    max-height:75px;
    overflow-y: scroll;
}

    }
</style>
<!-- styles for photographers dashboard -->
<!-- styles for Organizers dashboard -->
@elseif(Auth::check() && Auth::user()->role_id == '3')
<link rel="stylesheet" href="{{ asset('css/vote_img/lc_lightbox.css') }}" />
<link rel="stylesheet" href="{{ asset('css/vote_img/minimal.css') }}" /> 
<style>
        .jumbotron {
            background-color: white;
            border: 1px solid rgba(102, 102, 102, 0.2);
            border-radius: 10px;
            padding-bottom: 10px;
            padding-top: 30px;
            margin-top: 55px;
            width:95vw;
        }
    
    .tab-item{
        margin: 0;
        padding: 0;
        border-radius: 0;
        background-color: rgba(181,181,181,0.5);
    }
    
        .tab-link{
            margin: 0;
            color: white;
        }
    
    .a{
        color: black;
        font-weight: 600;
        opacity: 0.8;
    }
    
    .a:hover{
        text-decoration: none;
        color:black;
        opacity: 0.5;
    }

       .contest{
        height:500px;
        overflow: hidden;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .contest-data{
        padding-top:200px;
    }



.contest-data:hover{
    background: rgba(0,0,0,0.3);
    opacity: 1;
}

.contest-description{
    max-height:250px;
    overflow-y: scroll;
}

    .contest-status{
        font-size: 20px;
    }


    .winner-btn{
        background-color: rgba(255,215,0,0.4);
        border-color: rgba(255,215,0,0.4);
    }

    .winner-btn:hover{
        background-color: rgba(255,215,0,0.6);
        border-color: rgba(255,215,0,0.6);
    }

    .add-category{
        border:1px solid rgba(0,0,0,0.2);
        border-radius: 20px;
        margin:25px 0;
        padding:65px 50px 75px 50px;
    }

.available{
          margin-top:20px;
        padding:5px;
        min-height:80vh;
}

    .head{
        margin-bottom: 20px;
    }

    .modal-header{
        color:black;
        margin:-10px 30px 30px 30px;
        
    }

.modal-content{
min-height: 80vh;
}

.modal{
    overflow-y: scroll;
}

    .modal-container{
        margin:15px; 
        border: 6px double rgba(0,0,0,0.2);
        border-radius: 20px;
        padding:20px;
        min-height: 80vh;
    }

    .image-container{

    }

    .below-section{
        width: 100%;
        border:1px solid rgba(0,0,0,0.2);
    background-color: white;
    margin-top:-8px;
    margin-left:0.5px;
    border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
}


.figure-img{
     border-top-right-radius: 10px;
border-top-left-radius: 10px;
}



.winner-select-btn{
    transition: transform 0.5s ease;
}

.winner-select-btn:hover{
    opacity: 1;
    cursor: pointer;
    transform: scale(1.15);
}

    @media (max-width: 768px) {
        .contest{
            height: auto;
        }

    .contest-data{
        padding-top: 0;
        
    }
    .contest-inner{
        transform: scale(0.6);
    }
.contest-description{
    max-height:75px;
    overflow-y: scroll;
}

.available{
        min-height:auto;
        padding:0;
}

.add-category{
        padding:20px 5px 20px 5px;
    }
.cat-submit{
    margin-top: 10px;
}
    }
</style>    
<!-- styles for Organizers dashboard -->
@endif 
@stop