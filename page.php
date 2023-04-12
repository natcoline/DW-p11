<?php get_header() ?>

    <div id="hero">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/danse_de_quartier.webp';?>" alt="image d'accueil du site Nathalie Mota"></a>
        <h1> PHOTOGRAPHE EVENT</h1>
    </div>

    <div id="container">

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
        <section id="photo">

            <!-- Row 1 -->
            <div class="d-flex-row">
                    <div class="container_photo">

                    </div>

                    <div class="container_photo">

                    </div>
            </div> <!-- end d-flex-row 1 -->

            <!-- Row 2 -->
            <div class="d-flex-row">
                    <div class="container_photo">

                    </div>

                    <div class="container_photo">

                    </div>
            </div> <!-- end d-flex-row 2 -->

            <!-- Row 3-->
            <div class="d-flex-row">
                    <div class="container_photo">

                    </div>

                    <div class="container_photo">

                    </div>
            </div> <!-- end d-flex-row 3 -->
            
            <div id="button_page_accueil">
                 <button id='button_chargez_plus'type="button" onclick="window.location.href='#"> Chargez plus </button> 
            </div>
        </section>
    </div>
   


<?php get_footer() ?>