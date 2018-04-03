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
</style>    
<!-- styles for Organizers dashboard -->
@endif 
@stop