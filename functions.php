<?php 
// Ajoute automatiquement le titre dans l'en-tête du site 
add_theme_support('title-tag');

// Ajoute la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Déclaration du fichier style.css  et script.js 
function motaphoto_style_script(){
    
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0');

    wp_enqueue_style('header-footer', get_template_directory_uri() . '/assets/css/header-footer.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('modal', get_template_directory_uri() . '/assets/css/modal.css');
    wp_enqueue_style('single', get_template_directory_uri() . '/assets/css/single.css');
    wp_enqueue_style('front-page', get_template_directory_uri() . '/assets/css/front-page.css');
    wp_enqueue_style('page', get_template_directory_uri() . '/assets/css/page.css');
    wp_enqueue_style('fullscreen', get_template_directory_uri() . '/assets/css/fullscreen.css');

    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'motaphoto_style_script');


/* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ Déclaration menu //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */

register_nav_menus( array(
    'header' => 'Menu du header',
    'footer' => 'Menu du footer',
));



/* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ button_chargez_plus : load more //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\  */

function load_more() {
    $query_requete_Ajax = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page'=> 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $_POST['paged'], 
    ]);

    $response = ''; 

    if( $query_requete_Ajax->have_posts() ) :
        while( $query_requete_Ajax->have_posts() ) : $query_requete_Ajax->the_post();
        $response .= '<div class="container_photo_accueil" class="">
            <img class="photo_accueil" src="'.get_the_post_thumbnail_url(get_the_ID(),"full").'" alt="'.get_the_title().'">
            <div class="hover_elements">
                <a href=" "><img class="icon_fullscreen hover_icon_fullscreen" src="'.get_template_directory_uri().'/assets/images/icon_fullscreen.svg" alt="icône plein écran"> </a>
                <a href="'.get_permalink().'"><img class="hover_icon_eye" src="'.get_template_directory_uri().'/assets/images/icon_eye.svg" alt="icône oeil"> </a>
                <h2>'.get_field('nom').'</h2>
                <h3>'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</h3>
            </div> <!-- fin hover_elements -->
        </div> <!-- fin container_photo_accueil -->';
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



/* //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\  filtre catégorie //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\ */
function function_filter() {
    
    $args = [
        'post-type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',

        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $_POST['cat'],
            ),
           
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $_POST['for'],
            ),
           
            array(
                'taxonomy' => 'annee',
                'field' => 'slug',
                'terms' => $_POST['an'],
            ), 
        ) /* Fin tax query */
    ];

    $agrsCategorieEtFormat = array(
        'post-type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $_POST['cat'],
            ),
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $_POST['for'],
            ),
        ),
    );
    
    $agrsCategorieEtAn = array(
        'post-type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' =>$_POST['cat'],
            ),
            array(
                'taxonomy' => 'annee',
                'field' => 'slug',
                'terms' => $_POST['an'],
            ),
        ),
    );
    $agrsFormatEtAn = array(
        'post-type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' =>$_POST['for'],
            ),
            array(
                'taxonomy' => 'annee',
                'field' => 'slug',
                'terms' => $_POST['an'],
            ),
        ),
    );

    $argsOnlyCategorie = array(
            'post-type' => 'photo',
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $_POST['cat'],
                ),
            ),
    );

    $argsOnlyFormat = array(
        'post-type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' =>$_POST['for'],
            ),
        ),
    );

    $argsOnlyAn = array(
        'post-type' => 'photo',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'annee',
                'field' => 'slug',
                'terms' =>$_POST['an'],
            ),
        ),
    );



    if ($_POST['cat'] != 'all' && $_POST['for'] == 'all' && $_POST['an'] == 'all') {
        $query_requete_Ajax = new WP_Query($argsOnlyCategorie);
    }
    else if ($_POST['cat'] == 'all' && $_POST['for'] != 'all' && $_POST['an'] == 'all') {
        $query_requete_Ajax = new WP_Query($argsOnlyFormat);
    }  
    else if ($_POST['cat'] != 'all' && $_POST['for'] != 'all' && $_POST['an'] == 'all') {
        $query_requete_Ajax = new WP_Query($agrsCategorieEtFormat);
    }  
    else if ($_POST['cat'] == 'all' && $_POST['for'] == 'all' && $_POST['an'] !== 'all') {
        $query_requete_Ajax = new WP_Query($argsOnlyAn);
    }  
    else if ($_POST['cat'] != 'all' && $_POST['for'] == 'all' && $_POST['an'] != 'all') {
        $query_requete_Ajax = new WP_Query($agrsCategorieEtAn);
    }  
    else if ($_POST['cat'] == 'all' && $_POST['for'] != 'all' && $_POST['an'] != 'all') {
        $query_requete_Ajax = new WP_Query($agrsFormatEtAn);
    }  

    else {
        $query_requete_Ajax = new WP_Query($args); /* fin requete ajax */
    }   

    //error_log( print_r( $query_requete_Ajax, true ) );

    $response = '';

  if( $query_requete_Ajax->have_posts() ) :
        while( $query_requete_Ajax->have_posts() ) : $query_requete_Ajax->the_post();
        $response .= '<div class="container_photo_accueil">
            <img class="photo_accueil" src="'.get_the_post_thumbnail_url(get_the_ID(),"full").'" alt="'.get_the_title().'">
            <div class="hover_elements">
                <a href=" "><img class="icon_fullscreen hover_icon_fullscreen" src="'.get_template_directory_uri().'/assets/images/icon_fullscreen.svg" alt="icône plein écran"> </a>
                <a href="'.get_permalink().'"><img class="hover_icon_eye" src="'.get_template_directory_uri().'/assets/images/icon_eye.svg" alt="icône oeil"> </a>
                <h2>'.get_field('nom').'</h2>
                <h3>'.get_the_terms(get_the_ID(), 'categorie')[0]->name.'</h3>
            </div> <!-- fin hover_elements -->
        </div> <!-- fin container_photo_accueil -->';
        endwhile;
        wp_reset_postdata();
        else :
        $response = 'Aucune photo correspondante à vos critères de recherche.';
        endif;
        
        echo $response;

        exit;
};

add_action('wp_ajax_function_filter', 'function_filter');
add_action('wp_ajax_nopriv_function_filter', 'function_filter');



?>