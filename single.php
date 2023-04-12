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
    $titre = get_field('nom');
    $reference = get_field('reference'); 
    $categorie = get_field('categorie');
    $format = get_field('format');
    $type = get_field('type');
    $annee = get_field('annee');
    $photo = get_field('upload');

    $id = get_the_ID();
    $url = get_permalink();

        $nextPost = get_next_post();
    $previousPost = get_previous_post();

        $nextImg = [$nextPost->post_content]; /* récupération de l'image du post suivant */
    $previousImg = $previousPost->post_content; /* récupération de l'image du post précédent */
        $nextPageURL = [$nextPost->guid]; /* récupération de l'url du post suivant */
    $previousPageURL = [$previousPost->guid]; /* récupération de l'url du post précédent */
       
        $nextPostID = $nextPost->ID; /* récupération de l'id du post suivant */
    $previousPostID = $previousPost->ID; /* récupération de l'ID du post précédent */

    $counter=0;
    
    /* var_dump($nextPostID); */

   /*  var_dump($previousPost); */
   /*  var_dump($nextPost); */
    /* var_dump($format); */
    /* var_dump($type); */
    /* var_dump($categorie) */
    /* var_dump($reference); */
    /* console.log($reference); */

    echo '<pre>';
    /* var_dump($nextPost); */ 
    echo '</pre>';

    ?>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>



    <div id="container_fiche_photo">

        <!-- partie haut -->
        <div class="d-flex-row" id="description_photo">
            <!-- partie gauche -->
            <div id="description"> 
                <h1> <?php  echo $titre ?> </h1>

                <p class="valeurRef"> RÉFÉRENCE :  <?php  echo $reference ?> </p>
                <p> CATÉGORIE :  <?php  echo $categorie ?> </p>
                <p> FORMAT :     <?php  echo $format[0] ?> </p>
                <p> TYPE :       <?php  echo $type[0] ?>   </p>
                <p> ANNÉE :      <?php  echo $annee ?>     </p>
            </div>

            <!-- Partie de droite -->
            <div id="visuel">
            <?php ?> <!-- the_post_thumbnail();  -->
            <?php the_post_thumbnail('medium', ['class' =>'img-single-photo']); ?>

            </div>
        </div> <!-- fin d-flex-row -->

        <!-- partie milieu -->
        <div class="d-flex-row" id="contact_navigation">

            <!-- contact -->
            <div class="d-flex-row" id="button_contact_photo">
                <p> Cette photo vous intéresse ? </p>
                <button class='button_single' type="button" class="lien-contact" id="contactRef"> Contact </button>
            </div>

            <!-- navigation -->
            <div id="container_navigation_column"> 


            <?php 
                $args = array( 
                    'post_type' => 'photo',
                    'posts_per_page' => 1,
                );

                $mesPhotos = new WP_Query($args);

                if ($mesPhotos->have_posts()) : while ($mesPhotos->have_posts()) : $mesPhotos->the_post(); ?>
                     <!-- image -->
                     <div id="container_image_navigation"> 
                        <?php echo get_the_post_thumbnail ($previousPostID , 'medium', ['class'=>"image_navigation"])?>
                    </div>
                    <!-- flèche -->
                    <div class="d-flex-row" id="arrows">
                        
                    <a href="<?php echo get_permalink($nextPost->ID)  ?>">  <img src="<?php echo get_template_directory_uri() .'/assets/images/arrow_left.svg';?>" alt="flèche direction gauche"> </a>
                    <a href="<?php echo get_permalink($previousPost->ID) ?>"> <img src="<?php echo get_template_directory_uri() .'/assets/images/arrow_right.svg';?>" alt="flèche direction droite"> </a>    
                   
                    </div>
                <?php endwhile; endif; ?>

                <?php $mesPhotos->rewind_posts(); ?>
            </div>
        </div> <!-- fin partie milieu -->
        

        <!-- partie bas -->
        <h2> VOUS AIMEREZ AUSSI</h2>
    
        <div class="d-flex-row" id="container_similar">

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
            if( $query -> have_posts() ) : while( $query -> have_posts() ) : $query -> the_post();
        
                /* the_post_thumbnail() ; */
                the_post_thumbnail('medium', ['class' =>'img-similaire']); 
            
            endwhile;
            endif;
            
            // Réinitialisation de la requête 
            wp_reset_postdata();

        ?> 
           
        
        </div>
        
        <div id="container_button_all_photo">
            <button class='button_single' type="button" onclick="window.location.href='#"> Toutes les photos </button> 
        </div>



    </div> <!-- fin div container_fiche_photo -->

    <?php endwhile; endif ?> 




<?php get_footer() ?>

