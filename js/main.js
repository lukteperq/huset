jQuery(document).ready(function($){
  $(window).scroll(function(e){
        if($(this).scrollTop() > parseInt($('.site-branding').css('height'))){

            $('.site-branding').addClass('margin');
            $('.main-navigation').addClass('fixed');
        }else{
            $('.main-navigation').removeClass('fixed');
            $('.site-branding').removeClass('margin');
        }
  });

    
});//onready
