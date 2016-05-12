/**
 * Created by Oyvind on 11.05.2016.
 */

jQuery(function($){
    $(".search-toggle").click(function(){
        $("#search-container").slideToggle("fast", function(){
            $(".search-toggle").toggleClass("active");
        });
        //console.log("toggle virker"); //Bugger seg med cssen min :(
    });
});//ready