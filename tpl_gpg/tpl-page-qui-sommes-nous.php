<?php

/**
 *
 * Template name: Page qui sommes-nous
 * 
 * 
 */
get_header();?>

<?php if(have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?> 
        <?php $entete_dela_page = get_field('entete_page', get_the_ID());   ?>
        <div class="qui-sommes-nous">
            <div class="page-baniere">
                <div class="breadcrumbs-wrapper">
                    <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
                </div>
                <?php if($entete_dela_page): ?>
                <div class="page-title-subtitle">
                    <h1><?php echo $entete_dela_page; ?></h1>
                </div>
                <?php endif; ?>
            </div>

            <div class="container-fluid page-container page-qui-sommes-nous">
                <!-- Notre savoir-faire -->
                <?php 
                    $notre_savoir_faire             = get_field('notre_savoir_faire');
                    $titre_notre_savoir_faire       = $notre_savoir_faire['titre'];
                    $description_notre_savoir_faire = $notre_savoir_faire['description'];
                    $slider_notre_savoir_faire      = $notre_savoir_faire['image_slider'];
                ?>
                <section class="qsn-item notre-savoir-faire" id="notre-savoir-faire">
                    <div class="row">
                        <?php if(!empty($titre_notre_savoir_faire)): ?>
                        <div class="col-12">
                            <h2 class="qsn-item--title"><?php echo $titre_notre_savoir_faire ?></h2>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($description_notre_savoir_faire)):  ?>
                        <div class="col-lg-6 qsn-item--description">
                            <?php echo $description_notre_savoir_faire; ?>
                        </div>
                        <?php endif;  ?>

                        <?php if(!empty($slider_notre_savoir_faire)):  ?>
                        <div class="col-lg-6 qsn-item__slider">
                            <div class="qsn-slider-wrapper">
                                <?php foreach($slider_notre_savoir_faire as $slider_item): ?>
                                    <?php if(!empty($slider_item['image'])): ?>
                                        <?php 
                                            $image = $slider_item['image'];
                                            //$size_image = 'qsn_notre_savoir_faire';
                                            $size_image = array(
                                                'size_desktop_large'   => 'notre_savoir_faire_desktop_large',
                                                'size_desktop'         => 'notre_savoir_faire_desktop',
                                                'size_tablette'        => 'notre_savoir_faire_tablette',
                                                'size_mobile'          => 'notre_savoir_faire_mobile'
                                            );

                                            //$slider_image = wp_get_attachment_image_src( $image, $size_image);
                                            //$slider_image_desktopLarge = wp_get_attachment_image_src( $image, $size_image['size_desktop_large'] );
                                            $slider_image_desktopLarge = wp_get_attachment_image_src( $image, 'full');
                                            $slider_image_desktop = wp_get_attachment_image_src( $image, $size_image['size_desktop'] );
                                            $slider_image_tablette = wp_get_attachment_image_src( $image, $size_image['size_tablette'] );
                                            $slider_image_mobile = wp_get_attachment_image_src( $image, $size_image['size_mobile'] );
                                            //print_r($slider_image);
                                        ?>
                                        <div class="qsn-slider-item">
                                            <!-- <img src="<?php //echo $slider_image[0]; ?>" alt="Notre savoir-faire" width="<?php //echo $slider_image[1]; ?>" height="<?php //echo $slider_image[2]; ?>" /> -->
                                            <img srcset="<?php echo $slider_image_desktopLarge[0]; ?>" alt="Notre savoir-faire" />
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif;  ?>
                    </div>
                </section>
                <!--/ Notre savoir-faire -->

                <!-- Citation --> 
                <?php 
                    $citation           = get_field('citation');
                    $citation_titre     = $citation['titre'];
                    $citation_video     = $citation['video'];
                    $citation_lien      = $citation['lien'];
                    $citation_texte     = $citation['texte'];
                    $citation_auteur    = $citation['auteur'];
                ?>           
                <section class="qsn-item citation" id="notre-entreprise-au-service-des-familles">
                    <div class="citation-wrapper">
                        <?php if(!empty($citation_titre)): ?>
                        <h2 class="qsn-item--title"><?php echo $citation_titre ?></h2>
                        <?php endif; ?>

                        <?php if(!empty($citation_video)): ?>
                        <div class="citation-wrapper--video">
                            <iframe frameborder="0" type="text/html" src="<?php echo $citation_video; ?>" width="100%" height="100%" allowfullscreen></iframe>                
                            <?php if(!empty($citation_lien)): ?>
                                <a href="<?php echo $citation_lien ?>" target="_blank" class="citation-wrapper--lien"><img src="<?php echo get_stylesheet_directory_uri().'/assets/dist/images/B_SMART_logo.png' ?>" alt="B SMART" /></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($citation_texte)): ?>
                        <div class="citation-wrapper--texte">
                            <span class="first-quote">“</span><?php echo strip_tags($citation_texte); ?><span class="second-quote">”</span>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($citation_auteur)): ?>
                        <div class="citation-wrapper--author">
                            <?php echo $citation_auteur; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
                <!--/ Citation -->  

                <!-- Notre equipe -->
                <?php 
                    $notre_equipe               = get_field('notre_equipe');
                    $notre_equipe_titre         = $notre_equipe['titre'];
                    $notre_equipe_description   = $notre_equipe['description'];
                    $notre_equipe_photo         = $notre_equipe['photo'];
                ?>
                <section class="qsn-item notre-equipe" id="notre-equipe">
                    <div class="row notre-equipe-wrap">
                        <?php if(!empty($notre_equipe_titre)): ?>
                        <div class="col-12">
                            <h2 class="qsn-item--title"><?php echo $notre_equipe_titre ?></h2>
                        </div>
                            <?php endif; ?>

                        <?php if(!empty($notre_equipe_description)):  ?>
                        <div class="col-lg-6 qsn-item--description">
                            <?php echo $notre_equipe_description; ?>
                        </div>
                        <?php endif;  ?>

                        <?php if(!empty($notre_equipe_photo)):  
                            //$size_photo = 'qsn_notre_equipe';
                            $size_photo = array(
                                'size_desktop_large'   => 'notre_equipe_desktop_large',
                                'size_desktop'         => 'notre_equipe_desktop',
                                'size_tablette'        => 'notre_equipe_tablette',
                                'size_mobile'          => 'notre_equipe_mobile'
                            );
                            //$photo = wp_get_attachment_image_src( $notre_equipe_photo, $size_image);
                            //$photo_desktopLarge = wp_get_attachment_image_src(  $notre_equipe_photo, $size_photo['size_desktop_large'] );
                            $photo_desktopLarge = wp_get_attachment_image_src(  $notre_equipe_photo, 'full' );
                            /*$photo_desktop = wp_get_attachment_image_src(  $notre_equipe_photo, $size_photo['size_desktop'] );
                            $photo_tablette = wp_get_attachment_image_src(  $notre_equipe_photo, $size_photo['size_tablette'] );
                            $photo_mobile = wp_get_attachment_image_src(  $notre_equipe_photo, $size_photo['size_mobile'] );*/
                        ?>
                        <div class="col-lg-6 qsn-item--image">
                            <div class="wrap-image"> 
                                <!-- <img src="<?php //echo $photo[0] ?>" alt="Notre équipe" width="<?php //echo $photo[1]; ?>" height="<?php //echo $photo[2]; ?>" /> -->
                                <img srcset="<?php echo $photo_desktopLarge[0]; ?>" alt="Notre équipe" />
                            </div>
                        </div>
                        <?php endif;  ?>
                    </div>
                </section>    
                <!--/ Notre equipe -->

                <!-- Nos partenaires -->
                <?php 
                    $nos_partenaires                = get_field('nos_partenaires');
                    $nos_partenaires_titre          = $nos_partenaires['titre'];
                    $nos_partenaires_presentation   = $nos_partenaires['presentation'];
                    $nos_partenaires_image          = $nos_partenaires['image'];
                    $nos_partenaires_titre_btn      = $nos_partenaires['titre_du_bouton'];
                    $nos_partenaires_lien_btn       = $nos_partenaires['lien'];
                ?>
                <section class="qsn-item notre-partenaires" id="nos-partenaires">
                    <div class="row">
                        <div class="col-12 col-notre-partenaires">
                            <div class="partenaire-card">
                                <?php if(!empty($nos_partenaires_titre)): ?>
                                <h2 class="qsn-item--title"><?php echo $nos_partenaires_titre?></h2>
                                <?php endif; ?>



                                <?php if(!empty($nos_partenaires_image)): 
                                    $size_partenaire = 'qsn_nos_partenaires';
                                    $image_partenaire = wp_get_attachment_image_src( $nos_partenaires_image, $size_partenaire);
                                ?>
                                <div class="partenaire-images">
                                    <img src="<?php echo $image_partenaire[0] ?>" alt="Nos partenaires" width="<?php echo $image_partenaire[1]; ?>" height="<?php echo $image_partenaire[2]; ?>"  />
                                </div>
                                <?php endif; ?>



                                <?php if(!empty($nos_partenaires_presentation)): ?>
                                <div class="qsn-item--description">
                                <?php echo $nos_partenaires_presentation; ?>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty($nos_partenaires_titre_btn)): ?>
                                <a class="partenaire-btn" href="<?php echo !empty($nos_partenaires_lien_btn) ? $nos_partenaires_lien_btn : '#' ?>"><?php echo $nos_partenaires_titre_btn; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>           
                </section>
                <!--/ Nos partenaires -->

                <!-- Nos engagements -->
                <?php 
                    $nos_engagements                = get_field('nos_engagements');
                    $nos_engagements_titre          = $nos_engagements['titre'];
                    $nos_engagements_description    = $nos_engagements['description'];
                    $nos_engagements_photo          = $nos_engagements['image'];
                ?>
                <section class="qsn-item nos-engagements" id="nos-engagements">
                    <div class="row">
                        <?php if(!empty($nos_engagements_titre)): ?>
                        <div class="col-12">
                            <h2 class="qsn-item--title"><?php echo $nos_engagements_titre ?></h2>
                        </div>
                            <?php endif; ?>

                        <?php if(!empty($nos_engagements_description)):  ?>
                        <div class="col-lg-6 qsn-item--description">
                            <?php echo $nos_engagements_description; ?>
                        </div>
                        <?php endif;  ?>

                        <?php if(!empty($nos_engagements_photo)):  
                            //$size_image_engagement = 'qsn_nos_engagements';
                            $size_image_engagement = array(
                                'size_desktop_large'   => 'nos_engagements_desktop_large',
                                'size_desktop'         => 'nos_engagements_desktop',
                                'size_tablette'        => 'nos_engagements_tablette',
                                'size_mobile'          => 'nos_engagements_mobile'
                            );

                            //$photo_engagement = wp_get_attachment_image_src( $nos_engagements_photo, $size_image_engagement);
                            $photo_engagement_desktopLarge = wp_get_attachment_image_src( $nos_engagements_photo , $size_image_engagement['size_desktop_large'] );
                            $photo_engagement_desktop = wp_get_attachment_image_src( $nos_engagements_photo , $size_image_engagement['size_desktop'] );
                            $photo_engagement_tablette = wp_get_attachment_image_src( $nos_engagements_photo , $size_image_engagement['size_tablette'] );
                            $photo_engagement_mobile = wp_get_attachment_image_src( $nos_engagements_photo , $size_image_engagement['size_mobile'] );
                        ?>
                        <div class="col-lg-6 qsn-item--image">
                            <div class="wrap-image"> 
                                <!-- <img src="<?php //echo $photo_engagement[0] ?>" alt="Nos engagements" width="<?php //echo $photo_engagement[1]; ?>" height="<?php //echo $photo_engagement[2]; ?>" /> -->
                                <picture>
                                    <source media="(min-width: 1599px)" srcset="<?php echo $photo_engagement_desktopLarge[0]; ?>">
                                    <source media="(min-width: 1200px)" srcset="<?php echo $photo_engagement_desktop[0]; ?>">
                                    <source media="(min-width: 992px)" srcset="<?php echo $photo_engagement_tablette[0]; ?>">
                                    <source media="(max-width: 575px)" srcset="<?php echo $photo_engagement_mobile[0]; ?>">
                                    <img srcset="<?php echo $photo_engagement_mobile[0]; ?>" alt="Nos engagements" />
                                </picture>
                            </div>
                        </div>
                        <?php endif;  ?>
                    </div>
                </section>    
                <!--/ Nos engagements -->
                
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>