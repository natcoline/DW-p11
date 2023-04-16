<?php get_header() ?>

    <div id="hero">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/danse_de_quartier.webp';?>" alt="image d'accueil du site Nathalie Mota"></a>
        <h1> PHOTOGRAPHE EVENT</h1>
    </div>

    <div id="container_filter_photo">

        <!-- section filter -->
        <section id="filter">
            <div id="left_filter">
                <!-- Catégorie -->
                <div id="category_filter"> 
                    <p>CATÉGORIES</p>
                    <select name="" id=""> </select>
                </div>    

                <!-- Format -->
                <div> 
                    <p>FORMATS</p>
                    <select name="" id=""> </select>
                </div>
            </div> <!-- end left_filter -->

            <div id="right_filter"> 
                <!-- trier par  -->
                <div> 
                    <p>TRIER PAR</p>
                    <select name="" id=""> </select>
                </div>
            </div> <!-- end right_filter -->
        </section>

        <!-- section photo -->
        <section  id="grillePhoto">
           
            <?php  

                // on définit les arguments que l'on souhaite récupérer
                $photoAccueil = array(
                    'post_type' => 'photo',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'posts_per_page' => 12,
                );

                // On éxécute la WP query
                $query_photoAccueil = new WP_query($photoAccueil); 

                // On lance la boucle 
                if( $query_photoAccueil -> have_posts() ) : while( $query_photoAccueil -> have_posts() ) : $query_photoAccueil -> the_post(); ?>
 
                    <a href="<?php echo get_permalink() ?>">
                         <?php the_post_thumbnail('medium', ['class' =>'photo_taille_accueil']); ?>
                    </a>
                    
               <?php endwhile;
                endif;

                // Réinitialisation de la requête 
                wp_reset_postdata();
            ?> 
           
        </section>

        <div id="container_button_chargez_plus">
                 <button id='button_chargez_plus'type="button" onclick="window.location.href='#"> Chargez plus </button> 
        </div>

    </div>
   


<?php get_footer() ?>