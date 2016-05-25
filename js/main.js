jQuery(document).ready(function($){
    /*NB: rekkefølgen MÅ stå i samvsar med rekkefølgen til checkboxene i "jobbe på huset", med nåværende kode  */
    var tooltips = [
    /*Vakt*/        'Vil du mikse drinker og ha det sosialt på jobb? Da kan du begynne å jobbe i baren. Drinkene er lette å lære og vi har enkle oppskrifter. Barsjefen er Stian Fenstad. ',
    /*Booking*/     'Passer på at artistene har det bra. Lager kaffe, ordner mat og sørger for at artistene får en god opplevelse på «HUSET». Bookingansvarlig er Sara Løvf. ',
    /*Cover*/       'Jobben i cover innebærer å ta i mot alle som kommer til «HUSET» med et smil, passe på jakkene deres og ta imot billetter og inngangspenger. Coversjefen heter Moa og er også sekretær i styret.',
    /*Event*/       'Dette er en gruppe som består av DJ-er, quizmastere og de som pynter «HUSET» til fest. Høres dette ut som noe for deg? Eventansvarlig er  Anette Brenden.',
    /*Vakt*/        'Ønsker du å bidra til å holde orden, bli kjent med masse nye folk og få gratis ordensvaktkurs bør du bli vakt på «HUSET». Vaktsjefen heter Robin Lein.',
    /*PR&Info*/     'Liker du å lage plakater og andre grafiske ting, eller er du god til å ta bilder så bør du bli med i PR. PR/Info-ansvarlig er Mia Tollaksvik. ',
    /*Teknisk*/     'Har ansvaret for at man hører og ser artistene. Dette er gruppa for deg som er glad i ledninger og rigging av utstyr!  Teknisk ansvarlig heter  Øyvind Aasen. ',
    /*Vet ikke*/    'Usikker på hva du har lyst til å jobbe med? Leder Jakob Fonstad eller nestleder Stian Brustad svarer på det du måtte lure på. '
    ];
  $(window).scroll(function(e){
        if($(this).scrollTop() > parseInt($('.site-branding').css('height'))){

            $('.site-branding').addClass('margin');
            $('.main-navigation').addClass('fixed');
        }else{
            $('.main-navigation').removeClass('fixed');
            $('.site-branding').removeClass('margin');
        }
  });

/* Edits attributes to checkboxes in contactform  */

    $('.wpcf7-checkbox').each(function(key){
        $(this).attr('title', tooltips[key]);
    });

/* Instagram follow knapp */
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src="//x.instagramfollowbutton.com/follow.js";s.parentNode.insertBefore(g,s);}(document,"script"));
});//onready
