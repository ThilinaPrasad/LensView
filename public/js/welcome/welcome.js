$(document).ready(function () {


  $(window).scroll(function () {
    var hT = $('#counter-viewport').offset().top,
      hH = $('#counter-viewport').outerHeight(),
      wH = $(window).height(),
      wS = $(this).scrollTop() + 2800;
    if (wS > (hT + hH - wH)) {

      $('.counter').each(function () {
        var $this = $(this),
          countTo = $this.attr('data-count');
        //alert(countTo);
        $({ countNum: $this.text() }).animate({
          countNum: countTo
        },

          {

            duration: 2000,
            easing: 'swing',
            step: function () {
              $this.text(Math.floor(this.countNum));
              $this.text(Math.floor(this.countNum));
              //$('.counter').text(Math.floor(this.countNum));
              //alert(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
            }
          });



      });

    }
  });


});
