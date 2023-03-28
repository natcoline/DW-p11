$(document).ready(function() {

    /* fermeture menu */
        console.log('test jQuery')
  
    $('.burger').click(function() {
        $('nav').toggleClass('show');
        $(this).toggleClass('open');
    });
  
    
    /* Fermeture modal */
    $('#popup-close').click(function(){
         $('#bg-contact').hide();
    });




});

  
  
  
  
  
  