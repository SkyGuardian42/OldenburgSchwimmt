$(document).ready(function(){
  $('.scroll').on('click', function(e){
      var id = $(this).attr('href');
      $('html, body').animate({
          scrollTop:$(id).offset().top - 52
      },'slow');
      e.preventDefault();
  });

  $(".hider").click(function(e){
        $(".impressum-hide").toggleClass("hide");
    });
});
