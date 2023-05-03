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
    wp_enqueue_style('modal', get_template_directory_uri() . '/assets/css/modal.css');
    wp_enqueue_style('single', get_template_directory_uri() . '/assets/css/single.css');
    wp_enqueue_style('page', get_template_directory_uri() . '/assets/css/page.css');
    wp_enqueue_style('lightbox', get_template_directory_uri() . '/assets/css/fullscreen.css');

    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'motaphoto_style_script');


/* Déclaration menu */

register_nav_menus( array(
    'header' => 'Menu du header',
    'footer' => 'Menu du footer',
));


/* button_chargez_plus : load more */

function load_more() {
    $query_requete_Ajax = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page'=> 12,
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $_POST['paged'], 
    ]);

    $response = ''; 

    if( $query_requete_Ajax->have_posts() ) : 
        while( $query_requete_Ajax->have_posts() ) : $query_requete_Ajax->the_post(); 
            $response .= '<a href="'. get_permalink() .'">'. get_the_post_thumbnail(null, 'medium', array('class' =>'photo_taille_accueil')) .'</a>'; 
        endwhile;
        wp_reset_postdata(); 
    else :
        $response = '';
    endif;

    echo $response;
    exit;
};

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');


/* filtre catégorie */
function filter_by_categorie() {
    $query_requete_Ajax = new WP_Query([
        'post_type' => 'photo',
        'orderby' => 'date',
        'tax_query' => array(
            'relation' => 'or',
            array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $_POST['categorie'],
            ),
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $_POST['format'],
            ),
        ),
    ]);
    
    $response = ''; 

    if( $query_requete_Ajax->have_posts() ) : 
        while( $query_requete_Ajax->have_posts() ) : $query_requete_Ajax->the_post(); 
            $response .= '<a href="'. get_permalink() .'">'. get_the_post_thumbnail(null, 'medium', array('class' =>'photo_taille_accueil')) .'</a>'; 
        endwhile;
        wp_reset_postdata(); 
    else :
        $response = '';
    endif;
   
    echo $response;
    exit;
};

add_action('wp_ajax_filter_by_categorie', 'filter_by_categorie');
add_action('wp_ajax_nopriv_filter_by_categorie', 'filter_by_categorie');


/* filtre format */
function filter_by_format() {
    $query_requete_Ajax = new WP_Query([
        'post_type' => 'photo',
        'orderby' => 'date',
        'tax_query' => array(
            'relation' => 'or',
            array(
                'taxonomy' => 'format',
                'field'    => 'slug',
                'terms'    => $_POST['format'],
            ),
            array(
                'taxonomy' => 'categorie',
                'field'    => 'slug',
                'terms'    => $_POST['categorie'],
            ),
        ),
    ]);
    
    $response = ''; 

    if( $query_requete_Ajax->have_posts() ) : 
        while( $query_requete_Ajax->have_posts() ) : $query_requete_Ajax->the_post(); 
        $response .= '<a href="'. get_permalink() .'">'. get_the_post_thumbnail(null, 'medium', array('class' =>'photo_taille_accueil')) .'</a>'; 
        
        endwhile;
        wp_reset_postdata(); 
    
    else :
        $response = '';
    
    endif;
    
    echo $response;
    exit;
   
};

add_action('wp_ajax_filter_by_format', 'filter_by_format');
add_action('wp_ajax_nopriv_filter_by_format', 'filter_by_format');

?>