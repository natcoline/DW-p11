<?php 

/**
 * Template Name: page photo
 * Description: Modèle pour la page description d'une photo du site motaphoto.
 *
 * @package WordPress
 * @subpackage motaphoto
 */

get_header() ?>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <h1> <?php the_title(); ?> </h1>

    <?php the_content(); ?> 

    <?php endwhile; endif ?> 

<?php get_footer() ?>