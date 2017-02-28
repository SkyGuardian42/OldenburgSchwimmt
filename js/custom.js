$(document).ready(function(){
  $('.scroll').on('click', function(e){
      var id = $(this).attr('href');
      $('html, body').animate({
          scrollTop:$(id).offset().top
      },'slow');
      e.preventDefault();
  });

  $("nav").sticky({topSpacing:0});

  $(".hider").click(function(e){
        $(".impressum-hide").toggleClass("hide");
    });
});
