<html>
  <head>
      <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  </head>
  <body style="border:4px double gray;border-radius:20px;">
    <center>
    <table class="mui-body" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td  style="padding:50px;" class="mui-panel">
          <center>
            

            <div style="text-align:center;" class="mui-container">
<div class="mui-divider-bottom">
<img style="width:300px" src="http://www.uomleos.org/wp-content/uploads/2018/04/mainLogo.png">
<h5 style="margin-top:-80px;">Sri Lankan Best Online Photography Contest</h5>
<hr>
<div class="mui-divider-bottom"></div>
           <br>
           <center>
             @if($type=='winner')
           <img style="width:200px;border-radius:50%;" src="{{ asset('img/static/animation_9.gif') }}">
          @elseif($type=='contest') 
          <img style="width:200px;border-radius:50%;" src="{{ asset('img/static/animation_4.gif') }}">
          @elseif($type=='image') 
          <img style="width:200px;border-radius:50%;" src="{{ asset('img/static/animation_3.gif') }}">
          @elseif($type=='user') 
          <img style="width:200px;border-radius:50%;" src="{{ asset('img/static/animation_5.gif') }}">
          @else
          <img style="width:200px;border-radius:50%;" src="{{ asset('img/static/animation_2.gif') }}">
            @endif
          </center>
           <br>
                <!--Notification message goes here-->
                <p style="text-align:left;">
                Dear {{ $name }},<br>
                </p>
                <p style="text-align:justify;">
                {{ $msg }}
                </p>
                <br>
                <br>
              </div>
              <hr>
              <footer style="text-decoration:none;color:#6d6d6d;">
                  <center>
                        <a href="#" style="text-decoration:none;color:#6d6d6d;">LensView &copy;</a></lable> 2018 All Rights Reserved!</lable>
                  </center>
              </footer>
            </div>
          </center>
        </td>
    </tr>
    </table>
                  </center>
  </body>
</html>