$(document).ready(function() {
    console.log('jQuery chargé');

    /* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\  menu burger //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */
    $('.burger').click(function() {
        $('nav').toggleClass('show');
        $(this).toggleClass('open');
    });
 
    /* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ Lightbox  //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */
    $('#container_fullscreen').hide();

    /* ouverture lightbox */
     $('.icon_fullscreen').click(function(e){
      /*   console.log(e); */
        $("#img-fullscreen").attr(
           "src", e.target.parentElement.parentElement.children[0].src);

           /* console.log('#img-fullscreen'); */
        $('#container_fullscreen').show();
        
    }); 
    
    $('#close_fullscreen').click(function(){
        $('#container_fullscreen').hide();
    })

   
     /* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ MODAL / CONTACT POPUP //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */


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
    
           $form = $('#wpcf7-f25-o1');
           $form[0].reset();
           $form.find('.wpcf7-response-output').empty();
         
          /*  console.log($form); */

    });


    /* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ Précharger le formulaire  //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */


    /* Précharger le formulaire avec la référence de la photo selectionnée */
    
    $('#button_contact_photo').click(function(){
        $ref = $('.valeurRef').text();
        /* console.log($ref);
        console.log('coucou'); */
        $('input[name="ref-photo"]').val($ref);   

    });



    /* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\  AJAX load more  //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */

    let currentPage = 1;

    $('#button_chargez_plus').on('click', function(){
        currentPage++;

        $.ajax({
            type: 'POST',
            url: '/motaphoto/wp-admin/admin-ajax.php',
            dataType:'html',
            data: {
                action: 'load_more', /* nom de ma function */
                paged: currentPage,
            },
            success:function (resultat){
                $('#grillePhoto').append(resultat);
            }
        });
    });


    /* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\  AJAX filtre  //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */

    $(".select-filter").on("change", function () {

      $.ajax({
        type: "POST",
        url: "/motaphoto/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
            action: "function_filter",
            cat: $("#select_categorie").val(),
            for: $("#select_format").val(),
            an: $("#select_date").val(),
        },
        success: function (resultat) {
          $("#grillePhoto").html(resultat);
        },
      });
      console.log($("#select_categorie").val())
      console.log($("#select_format").val())
      console.log($("#select_date").val())
    });
   


    

}); /* fin jquery ready */

  
  
  
  
  
  