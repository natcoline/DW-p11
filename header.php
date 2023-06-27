<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo("charset"); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?> >  <!-- Permet d'obetnir le nom des class CSS par défaut de WorddPress -->

    <?php wp_body_open(); ?>  <!-- Permet à des extensions d'écrire du code au début du body, (ex: yoast, vient placer ici les google tag manager) -->
    

    <header>

        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() .'/assets/images/logo-NathalieMota.png';?>" alt="Logo en lettre nom de l'entreprise : Nathalie Mota"></a>
        </div>
        <nav>
            <ul>
                <?php 
                    wp_nav_menu ([
                        'theme_location' => 'header',
                        'container' => false,
                        'container_aria_label' => 'menu de navigation',
                    ])
                ?>  
            </ul>
        </nav>
        <div class="burger">
            <div class="burger-line"></div>
            <div class="burger-line"></div>
            <div class="burger-line"></div>
        </div>

    </header>

    <main>
    

   
