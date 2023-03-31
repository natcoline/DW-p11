$(document).ready(function() {

    /* fermeture menu */
    $('.burger').click(function() {
        $('nav').toggleClass('show');
        $(this).toggleClass('open');
    });
  
    /* Modal rattaché au footer, pour qu'il soit disponible partout sur le site
    Par conséquent, il faut le cacher pour qu'il soit disponible uniquement pour le bouton contact */ 
    $('#bg-contact').hide(); 

    /* Ouverture modal sur le bouton contact*/
     $('.lien-contact').click(function(){
        $('#bg-contact').show();
    });

    /* Fermeture modal */
    $('#popup-close').click(function(){
         $('#bg-contact').hide();
         // nettoyer le formulaire
         // tous les inputs = '';
    });

    


});

  
  
  
  
  
  