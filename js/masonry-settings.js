/**
 * Created by Oyvind on 13.05.2016.
 */
// Masonry settings for å organisere footer widgets
/*
jQuery(document).ready(function($){
    $('#footer-widgets').masonry({
        columnWidth: 400,
        itemSelector: '.widget',
        isFitWidth: true,
        isAnimated: true
    });
    //console.log("vikrer");
});
*/

// Forbedret versjon som tracker dokumentets bredde, før den evt kjører masonry. Minde enn 879px -> masonry av... Separat styling for dette
jQuery(document).ready(function($){
    var $container = $('#footer-widgets');
    var $masonryOn;
    var $columnWidth = 400;

    if ($(document).width() > 879) {;
        $masonryOn = true;
        runMasonry();
    };

    $(window).resize( function() {
        if ($(document).width() < 879) {
            if ($masonryOn){
                $container.masonry('destroy');
                $masonryOn = false;
            }

        } else {
            $masonryOn = true;
            runMasonry();
        }
    });

    function runMasonry() {
        // initialize
        $container.masonry({
            columnWidth: $columnWidth,
            itemSelector: '.widget',
            isFitWidth: true,
            isAnimated: true
        });
    };

});
