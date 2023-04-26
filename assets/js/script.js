$(document).ready(function() {

    /* fermeture menu */
    $('.burger').click(function() {
        $('nav').toggleClass('show');
        $(this).toggleClass('open');
    });
 
    /* plein écran  */
   /*  $('#container_lightbox').hide(); */

    /* ouverture lightbox */
   /*  $('.icon_fullscreen').click(function(){
        $('#container_lightbox').css('opacity','1');
    }); */
    
    /* Modal rattaché au footer, pour qu'il soit disponible partout sur le site
    Par conséquent, il faut le cacher pour qu'il soit disponible uniquement pour le bouton contact */ 
    $('#bg-contact').hide(); 

    /* Ouverture modal sur le bouton contact*/
     $('.modal-lien-contact').click(function(){
        $('#bg-contact').show();
    });


    /* Fermeture modal */
    $('#popup-close').click(function(){
         $('#bg-contact').hide();
         // nettoyer le formulaire
         // tous les inputs = '';

         /* if ($('#wpcf7-f25-o1').is('form')) {
            $('#wpcf7-f25-o1')[0].reset();
            console.log($('#wpcf7-f25-o1'));
        }  */
            
            $form = $('#wpcf7-f25-o1');
            $form[0].reset();
            $form.find('.wpcf7-response-output').empty();
          
           /*  console.log($form); */

     });

    /* Précharger le formulaire avec la référence de la photo selectionnée */
    
    $('#button_contact_photo').click(function(){
        $ref = $('.valeurRef').text();
        /* console.log($ref);
        console.log('coucou'); */
        $('input[name="ref-photo"]').val($ref);   

    });


    /* AJAX load more */

    let currentPage = 1;

    $('#button_chargez_plus').on('click', function(){
        currentPage++;

        $.ajax({
            type: 'POST',
            url: '/motaphoto/wp-admin/admin-ajax.php',
            dataType:'html',
            data: {
                action: 'load_more',  /* récupérer format et catégorie */
                paged: currentPage,
            },
            success:function (resultat){
                $('#grillePhoto').append(resultat);
            }
        });

    });


    /*  AJAX filtre categorie  */

    $("#select_categorie").on("change", function (e) {
        /* console.log(e.target.value); */

      $.ajax({
        type: "POST",
        url: "/motaphoto/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
            action: "filter_by_categorie",
            categorie: e.target.value,
        },
        success: function (resultat) {
          $("#grillePhoto").html(resultat);
        },

      });
    });


    /* AJAX filtre format */

    $("#select_format").on("change", function (e) {
        /* console.log(e.target.value); */

      $.ajax({
        type: "POST",
        url: "/motaphoto/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
            action: "filter_by_format",
            format: e.target.value,
        },
        success: function (resultat) {
          $("#grillePhoto").html(resultat);
        },

      });
    });

    


    

}); /* fin jquery ready */

  
  
  
  
  
  