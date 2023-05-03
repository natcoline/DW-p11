</main>

<footer>

     <?php 
        wp_nav_menu ([
        'theme_location' => 'footer',
        'container' => false,
        'container_aria_label' => 'menu de navigation du pied de page',
        ])
    ?>

</footer>

<?php get_template_part('template/modal'); ?> 
<?php get_template_part('template/fullscreen'); ?> 


<?php

   /*  $photo_fullscreen = get_the_post_thumbnail_url(get_the_ID(), 'large'); */

   

    /* get_template_part(
        'template',
        'fullscreen',
            $args = array(
            'post_type'	=> 'photo',
            'photo_id'	=> $photo_id
         )
    );
 */
   /*  var_dump($photo_fullscreen);
    var_dump($args); */
    
?> 








<?php wp_footer() ?>

</body>
</html>