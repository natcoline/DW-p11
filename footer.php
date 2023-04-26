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

<?php 
    get_template_part('template/modal');

    get_template_part('template/lightbox');
 ?> 



<?php wp_footer() ?>

</body>
</html>