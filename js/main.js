jQuery(document).ready(function($){
    var tooltips = [
        'Vil du mikse drinker og ha det sosialt på jobb? Da kan du begynne å jobbe i baren. Drinkene er lette å lære og vi har enkle oppskrifter. Barsjefen er Stian Fenstad. ',
        'Passer på at artistene har det bra. Lager kaffe, ordner mat og sørger for at artistene får en god opplevelse på «HUSET». Bookingansvarlig er Sara Løvf. ',
        'Jobben i cover innebærer å ta i mot alle som kommer til «HUSET» med et smil, passe på jakkene deres og ta imot billetter og inngangspenger. Coversjefen heter Moa og er også sekretær i styret.',
        'Dette er en gruppe som består av DJ-er, quizmastere og de som pynter «HUSET» til fest. Høres dette ut som noe for deg? Eventansvarlig er  Anette Brenden.',
        'Ønsker du å bidra til å holde orden, bli kjent med masse nye folk og få gratis ordensvaktkurs bør du bli vakt på «HUSET». Vaktsjefen heter Robin Lein.',
        'Liker du å lage plakater og andre grafiske ting, eller er du god til å ta bilder så bør du bli med i PR. PR/Info-ansvarlig er Mia Tollaksvik. ',
        'Har ansvaret for at man hører og ser artistene. Dette er gruppa for deg som er glad i ledninger og rigging av utstyr!  Teknisk ansvarlig heter  Øyvind Aasen. ',
        'Usikker på hva du har lyst til å jobbe med? Leder Jakob Fonstad eller nestleder Stian Brustad svarer på det du måtte lure på. '
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
});//onready
