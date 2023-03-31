<?php 

/**
 * Template Name: single.php
 * Description: Modèle pour la page description d'une photo du site motaphoto.
 *
 * @package WordPress
 * @subpackage motaphoto
 */

get_header() ?>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <div>
    <!-- ICI mettre en place 2 colonnes (2 div...) en CSS pour afficher le nom de la photo et la photo -->
    <?php echo get_field('nom'); ?>
    <?php the_post_thumbnail(); ?>
    </div>

    <!-- ICI trouver la fonction qui permet de récuperer les champs personnalisés -->
    <p class="reference">Référence : <?php echo '??' ?></p>
    <p>Catégorie : Mariage</p>
    <p>Année : 2022</p>

    <?php endwhile; endif ?> 

<?php get_footer() ?>

