<?php get_header() ?>

    <?php 
                   
        $random_photo = array(
            'post-type' => 'photo',
            'orderby' => 'rand',
            'posts_per_page' => 1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' =>'paysage',
                ),
            ),
        );

        // On éxécute la WP query 
            $wp_query_ramdom_photo = new WP_query($random_photo);

            // On lance la boucle 
            if( $wp_query_ramdom_photo -> have_posts() ) : while( $wp_query_ramdom_photo -> have_posts() ) : $wp_query_ramdom_photo -> the_post(); ?>

                <div id="hero">
                     <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                    <h1> PHOTOGRAPHE EVENT</h1>
                </div> 
            
        <?php endwhile;
        endif;

        // Réinitialisation de la requête 
        wp_reset_postdata();
    ?>


    <div id="container_filter_photo">

        <!-- section filter -->
        <section id="filter">

                    <div id="left_filter">
                        <!-- Catégorie -->
                        <div id="category_filter"> 
                            <p>CATÉGORIES</p>
                            
                            <select name="categorie" id="select_categorie">
                                <?php 
                                    /* récupération de la taxonomie */
                                    $categorie_taxonomie = get_terms( array(
                                        'taxonomy' => 'categorie',
                                        'hide_empty' => false,  /* pour afficher tous les termes, même s'ils n'ont pas de post associé. */
                                    ) );
                            
                                    /* condition, vérifie si ce n'est pas vide, si il y a des taxonomie et qu'il n'y ait pas d'erreur */
                                    if ( ! empty($categorie_taxonomie) && ! is_wp_error ($categorie_taxonomie) ) {
                                        echo '<option value=""> Choisissez une catégorie </option>';
                                        foreach ($categorie_taxonomie as $iteration_categorie) {
                                            echo '<option value="'.$iteration_categorie->name.'"> ' .  $iteration_categorie->name  . '</option>';
                                        }
                                    } /* var dunp bas de page */
                                ?>
                            </select>
                        </div>    

                        <!-- Format -->
                        <div> 
                            <p>FORMATS</p>
                            <select name="format" id="select_format">
                                 <?php 
                                    /* récupération de la taxonomie */
                                    $format_taxonomie = get_terms( array(
                                        'taxonomy' => 'format',
                                        'hide_empty' => false,
                                    ) );
                            
                                    /* condition, vérification */
                                    if ( ! empty ($format_taxonomie) && ! is_wp_error($format_taxonomie) ) {
                                        echo '<option value=""> Choisissez un format </option>';
                                        foreach ($format_taxonomie as $iteration_format) {
                                            echo '<option value="'.$iteration_format->name.'"> ' . $iteration_format->name . '</option>';
                                        }
                                        /* var dunp bas de page */
                                    }
                                ?>
                            </select>
                        </div>
                    </div> <!-- end left_filter -->

            <div id="right_filter"> 
                <!-- trier par  -->
                <div> 
                    <p>TRIER PAR</p>
                    <select name="" id="">
                        <option value=""> Toutes les dates </option>
                        <option value=""> Date la plus proche </option>
                        <option value=""> Date la moins proche </option>
                        <option value="">  </option>
                    </select>
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
                    <div class ="container_photo_accueil" >
                        <img class ="photo_accueil" src="<?php $photo = the_post_thumbnail_url("large"); /* var_dump($photo) */;?>" alt="<?php the_title_attribute(); ?>">
                        <div class="hover_elements">
                            <img class="icon_fullscreen hover_icon_fullscreen" src="<?php echo get_template_directory_uri() .'/assets/images/icon_fullscreen.svg';?>" alt="icône plein écran"> 
                            <a href="<?php echo get_permalink() ?>"><img class="hover_icon_eye"  src="<?php echo get_template_directory_uri() .'/assets/images/icon_eye.svg';?>" alt="icône oeil"> </a>
                            <h2> <?php echo get_field('nom') ?> </h2>
                            <h3><?php echo get_field('categorie') ?></h3>
                        </div> <!-- fin hover_elements -->  
                    </div> <!-- fin container_photo_accueil -->
                <?php endwhile;
                endif;

                // Réinitialisation de la requête 
                wp_reset_postdata();
            ?> 
           
        </section>

        <div id="container_button_chargez_plus">
                 <button id='button_chargez_plus' type="button"> Chargez plus </button> 
        </div>

    </div>
   

<?php get_footer() ?>