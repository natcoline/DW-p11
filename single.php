<?php 

/**
 * Template Name: fiche photo
 * Description: Modèle pour la page description d'une photo du site motaphoto.
 *
 * @package WordPress
 * @subpackage motaphoto
 */

get_header() ?>

    <!-- On récupère les champs ACF -->
    <?php 

    /* champs ACF */
    $titre = get_field('nom'); 
    $type = get_field('type');
    $annee = get_field('annee');
    $photo = get_field('upload');
    $reference = get_field('reference'); /* 
    /* Taxonomie */
    $categorie = get_field('categorie'); 
    $format = get_field('format');
   

    $id = get_the_ID();
    $url = get_permalink();

    $nextPost = get_next_post();
    $previousPost = get_previous_post();

    echo '<pre>';
    /* var_dump($nextPostID); */
    /* var_dump($previousPost); */
    /* var_dump($nextPost); */
    /* var_dump($format); */
    /* var_dump($type);*/
    /* var_dump($categorie); */
    /* var_dump($reference); */
    /* console.log($reference); */
    echo '</pre>';

    ?>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>



    <div id="container_fiche_photo">

        <!-- partie haut -->
        <div  id="description_photo">
            <!-- partie gauche -->
            <div id="description"> 
                <h1> <?php  echo $titre ?> </h1>

                <p> RÉFÉRENCE :  <span class="valeurRef"> <?php  echo $reference ?>  </span></p>
                <p> CATÉGORIE :  <?php  echo $categorie ?> </p>
                <p> FORMAT :     <?php  echo $format[0] ?> </p>
                <p> TYPE :       <?php  echo $type[0] ?>   </p>
                <p> ANNÉE :      <?php  echo $annee ?>     </p>
            </div>

            <!-- Partie de droite -->
            <div id="visuel" class="hover_icon_fullscreen">
                <img id ="photo_single_visuel"  src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>">
            </div>
        </div> <!-- fin description_photo -->

        <!-- partie milieu -->
        <div id="contact_navigation">

            <!-- contact -->
            <div  id="container_button_contact_photo">
                <p> Cette photo vous intéresse ? </p>
                <button id='button_contact_photo' type="button" class="button_style_page_single modal-lien-contact buttonContactRef" > Contact </button>
            </div>

            <!-- navigation -->
            <div id="container_navigation_column"> 

                <?php 
                    $args = array( 
                        'post_type' => 'photo',
                        'posts_per_page' => 2,
                    );

                ?>
                     <!-- image -->
                     <div id="container_image_navigation"> 
                        <?php echo get_the_post_thumbnail ($previousPost->ID, 'thumbnail', ['class'=>"image_navigation"])?>
                    </div>
                    <!-- flèche -->
                    <div id="arrows">

                        <?php if (!empty($previousPost)){ ?>
                        <a href="<?php echo get_permalink($previousPost->ID) ?>"><img src="<?php echo get_template_directory_uri() .'/assets/images/arrow_left.svg';?>" alt="flèche direction gauche"></a>
                        <?php } ?>

                        <?php if (!empty($nextPost)){ ?>
                            <a href="<?php echo get_permalink($nextPost->ID) ?>"><img src="<?php echo get_template_directory_uri() .'/assets/images/arrow_right.svg';?>" alt="flèche direction droite"></a>   
                        <?php } ?>
                    </div>
               

            
            </div>
        </div> <!-- fin partie milieu -->
        

        <!-- partie bas -->
        <h2> VOUS AIMEREZ AUSSI</h2>
    
        <div id="container_part_similar">

            <?php  
                    // on définit les arguments que l'on souhaite récupérer
                    $imageSimilaire = array(
                        'post_type' => 'photo',
                        'posts_per_page' => 2,
                        'meta_key' => 'categorie',
                        'meta_value' => $categorie,
                        'post__not_in' => array($id),
                    );
                
                    // On éxécute la WP query
                    $query = new WP_query($imageSimilaire); 
                    
                    // On lance la boucle 
                    if( $query -> have_posts() ) : while( $query -> have_posts() ) : $query -> the_post(); ?>
            

                        <a class="" href="<?php echo get_permalink() ?>">
                            <div id ="container_photo_similar" class="hover_icon_fullscreen">
                                <img id ="photo_similar" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                        </a>
                        
                    
                   <?php endwhile;
                    endif;
                    
                    // Réinitialisation de la requête 
                    wp_reset_postdata();
            ?> 
           
        </div>
        
        <div id="container_button_all_photo">
            <button id='button_all_photo' class="button_style_page_single" type="button" onclick="window.location.href='#"> Toutes les photos </button> 
        </div>



    </div> <!-- fin div container_fiche_photo -->

    <?php endwhile; endif ?> 




<?php get_footer() ?>

