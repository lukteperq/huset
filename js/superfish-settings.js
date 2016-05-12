/* 
 * Custom Superfish settings
 * superfish lagt til pga dropdownsi hovedmeny bevegde seg for kjapt, i tillegg til å gi tilgang til dem ved bruk av tastatur
 * Får ikke denne til å virke.. TODO.
 * LOL din knød!! CHECK
 */

jQuery(document).ready(function($){
    //console.log("før");
    var breakpoint = 600; // meediaquery på 600px
    var sf = $('ul.nav-menu');//DJ-eesuz typo!!!

    if($(document).width() >= breakpoint){ //laster SF, hvis skjerm >= 600px
        sf.superfish({
            delay: 200,
            speed: 'fast'
        });
       // console.log("etter");
    }


    $(window).resize(function(){//forminsker skjerm, stopp SF. re-kjør SF hvis over 600px,
        if($(document).width() >= breakpoint & !sf.hasClass('sf-js-enabled')){
            sf.superfish({
                delay: 200,
                speed: 'fast'
            });
        } else if($(document).width() < breakpoint) {
            sf.superfish('destroy');
        }
    });
});
