<?php 
// Ajoute automatiquement le titre dans l'en-tête du site 
add_theme_support('title-tag');

// Ajoute la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Déclaration du fichier style.css  et script.js 
function motaphoto_style_script(){
    
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0');

    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main-style.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');

    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'motaphoto_style_script');


/* Déclaration menu */

register_nav_menus( array(
    'header' => 'Menu du header',
    'footer' => 'Menu du footer',
));






?>