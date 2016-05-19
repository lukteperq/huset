jQuery(document).ready(function($){
  var headerHeight = 200;
  $(window).scroll(function(e){

        if($(this).scrollTop() > 422){
          $('.main-navigation').addClass('fixed');
        }else{
          $('.main-navigation').removeClass('fixed');
        }
//console.log($(this).scrollTop());
  });


});//onready
