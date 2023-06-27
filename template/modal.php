
<div id="bg-contact"> <!-- position fixe -->
    <div id="popup-contact"> <!-- position fixe --> 
            <!-- titre -->
            <img id="img-contact"src="<?php echo get_template_directory_uri() .'/assets/images/contact.svg';?>" alt="image titre contact">
                  
            <!-- Formulaire -->
            <?php echo do_shortcode('[contact-form-7 id="25" title="Contact-motaphoto"]'); ?>
    </div> <!-- fin  popup-contact -->

    <img id="popup-close" class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/close_fullscreen.svg" alt="Closing Cross">

</div> <!-- fin bg -->

