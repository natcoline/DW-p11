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





<?php wp_footer() ?>

</body>
</html>