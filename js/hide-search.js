/**
 * Created by Oyvind on 11.05.2016.
 */

jQuery(function($){
    $(".search-toggle").click(function(){
        $("#search-container").toggleClass("active");
        //console.log("toggle virker"); //Bugger seg med cssen min :(
    });
});//ready