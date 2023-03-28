
<div id="bg-contact"> <!-- position fixe -->
    <div id="contact"> <!-- position fixe --> 
        <div id="popup-contact"> <!-- position relative par rapport #popup- -->
            <!-- titre -->
            <img src="<?php echo get_template_directory_uri() .'/assets/images/contact.svg';?>" alt="image titre contact">
           
            <!-- la croix -->
            <div id="popup-close">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/croix.png';?>" alt="croix fermeture popup contact">
            </div>
           
            <!-- Formulaire -->
            <?php echo do_shortcode('[contact-form-7 id="25" title="Contact-motaphoto"]'); ?>
        </div> <!-- fin div popup-contact -->
    </div>
</div>