<?php
$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="content-monument">
        
        <?php 
        //$size_m_s = "monument_image"; 
        $size_m_s = array(
            'size_desktop_large'   => 'monument_image_desktop_large',
            'size_desktop'         => 'monument_image_desktop',
            'size_tablette'        => 'monument_image_tablette',
            'size_mobile'          => 'monument_image_mobile'
        );



        $image_id_s = get_post_meta(get_the_ID(), 'produit_image',true);


       // $image_slide_m_s = wp_get_attachment_image_url( $image_id_s, $size_m_s );
        $image_slide_m_s = wp_get_attachment_image_url( $image_id_s);

        //$image_slide_desktop_large = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop_large']);
        $image_slide_desktop_large = wp_get_attachment_image_src( $image_id_s, 'full');
        $image_slide_desktop = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop']);
        $image_slide_tablette = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_tablette']);
        $image_slide_mobile = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_mobile']);


        $ajouter_le_lien_personalise_s = get_post_meta(get_the_ID(), '_custom_link_en_value_key', true );

        $lien_personnaliser_ce_monument = get_field('lien_personnaliser_ce_monument');

        if(!empty($ajouter_le_lien_personalise_s)):
            $link_rel = configurateur_link_gpg($ajouter_le_lien_personalise_s);
        endif; 

        if(!empty($image_slide_m_s)) : ?>
        <div class="image_featured_monument">
           <!-- <div id="panzoom-element" class="panzoom"> -->
            <img src="<?php echo $image_slide_desktop_large[0]; ?>" alt="<?php echo get_the_title(); ?>" />
           <!-- </div> -->
           <div class="zoom">
                <span class="zoom__out" id="zoom-out"></span>
                <span class="zoom__in" id="zoom-in"></span>
                <!-- <span class="zoom__print"></span> -->
                <a class="zoom__print" href="<?php echo $link_rel; ?>"><?php echo _e('Personnaliser ce monument','gpg'); ?></a>
           </div>
        </div>
        <?php endif; ?>

        <div class = "info_monument"> 
        <?php

                $produit_nuances = get_field('produit_nuances');
                foreach($produit_nuances as $produit_nuance){
                        $prix = $produit_nuance['prix'];
                }

               $nuance_objs = get_the_terms(get_the_ID(), 'project_category' );

                if($nuance_objs){
                                
                                    foreach($nuance_objs as $nuance_obj){
                                            $nuance_texture[] = $nuance_obj->name;
                                    }

                                    if(!empty($nuance_texture)){

                                        $nuance = implode(", ",$nuance_texture);

                                    }else{
                                        $nuance = __('non disponible', 'gpg');
                                    } 
                }else{

                $nuance = __('non disponible', 'gpg');
                
                }

        ?>  
        <div class="post_header">
             <h1 class="title_monument_s"><?php the_title(); ?></h1>

             <p class="sub-title">
                <span class="text_intro_s"><?php _e('À partir de ', 'gpg'); ?></span>
                <span class="prix_s"><?php echo number_format($prix, 0, '.', ' '); ?> €</span>
                <span class="lieu_s">en <?php echo $nuance ?></span>
            </p>
        </div>
        <!-- <p class="subtitle"> -->
            <?php
            /*$m_tags = get_the_terms( get_the_ID(), 'project_tag' );
                        if ( $m_tags ) {
                            foreach ( $m_tags as $tag ) {
                                $tag_names[] = $tag->name;
                            }
                            echo implode( ', ', $tag_names );
                        }*/
            ?>
        <!-- </p> -->

        <span class="footer_mn_link_s">
            <a href="<?php echo $link_rel; ?>" class="links_custom_s">
                <span class="link_custom_s"><?php echo _e('Personnaliser ce monument','gpg'); ?></span>
            </a>
        </span>

        <div class="post_summary">
            <?php the_content(); ?>
        </div>

      <!--   <p class="nb_references"><?php _e('Ce monument est disponible en 40 références de granit','gpg'); ?></p> -->

        </div>                                  
    </div>

          <div class="monument__similaires">

            <h4 class="title_similaires"><?php _e('NOS MONUMENTS SIMILAIRES','gpg'); ?></h4>

            <?php $monuments_similaires = get_field( 'monuments_similaires' ); 
            ?>
            <div class="monument__similaires__wrap monument__slider <?php echo (count($monuments_similaires['selectionner_des_monuments']) <= 3)? 'monument__similaires__min' : ''; ?>">

                    <?php 
                       //$monuments_similaires = get_field( 'monuments_similaires' );
                    //    echo count($monuments_similaires) . '<br>';
                    //    echo count($monuments_similaires['selectionner_des_monuments']);
                         if(!empty($monuments_similaires)) :
                         foreach($monuments_similaires['selectionner_des_monuments'] as $monuments_similaire) :
                         $ID_post = $monuments_similaire->ID;
                       ?>

                <div class="monument__content">
                    <div class="monument__content__item">
                            <?php
                            
                            $args_p = array(
                                          'post_type' => 'project',
                                          'p'         => $ID_post
                            );

                            $query_project = new WP_Query($args_p);
                            if($query_project->have_posts()) :
                                   while($query_project->have_posts()): $query_project->the_post();

                            $articles_title = get_the_title();
                            $permalink_article = get_permalink();
                            //$size_m_s = "monument_image"; 
                            $size_m_s = array(
                                'size_desktop_large'   => 'catalogue_desktop_large',
                                'size_desktop'         => 'catalogue_desktop',
                                'size_tablette'        => 'catalogue_tablette',
                                'size_mobile'          => 'catalogue_mobile'
                            );

                            $image_id_s = get_post_meta(get_the_ID(), 'produit_image',true);

                            //$image_slide_m_s = wp_get_attachment_image_url( $image_id_s, $size_m_s );
                            $image_slide_m_s = wp_get_attachment_image_url( $image_id_s);

                            //$image_slide_m_s_desktop_large = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop_large']);
                            $image_slide_m_s_desktop_large = wp_get_attachment_image_src( $image_id_s, 'full' );
                            $image_slide_m_s_desktop = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop']);
                            $image_slide_m_s_tablette = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_tablette']);
                            $image_slide_m_s_mobile = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_mobile']);


                            $ajouter_le_lien_personalise_m = get_post_meta(get_the_ID(), '_custom_link_en_value_key', true );
                             
                            if(!empty($ajouter_le_lien_personalise_m)):
                                $link_rel_m = configurateur_link_gpg($ajouter_le_lien_personalise_m);
                            endif; 
                        

                            $produit_nuances = get_field('produit_nuances');
                            foreach($produit_nuances as $produit_nuance){
                                    $prix = $produit_nuance['prix'];

                            }
                            $nuance_objs = get_the_terms(get_the_ID(), 'project_category' );
                            
                            if($nuance_objs){
                                    $nuance_texture = [];
                                    foreach($nuance_objs as $nuance_obj){
                                            $nuance_texture[] = $nuance_obj->name;
                                    }

                                    if(!empty($nuance_texture)){

                                        $nuance = implode(" , ",$nuance_texture);

                                    }else{
                                        $nuance = __('non disponible', 'gpg');
                                    } 
                            }else{
                                     $nuance = __('non disponible', 'gpg');
                            }

                            ?>

                             <div class="image_slide_mn">
                                    <a href="<?php echo $permalink_article; ?>">
                                        <!-- <img src="<?php //echo $image_slide_m_s; ?>" class="image_fond_mn" alt='<?php //echo $articles_title; ?>'> -->
                                        <img src="<?php echo $image_slide_m_s_desktop_large[0]; ?>" alt="<?php echo $articles_title; ?>" />
                                    </a>
                            </div>

                               <div class="wrap_footer_mn">
                                        <div class="footer_mn">

                                            <div class="titremn"><?php echo $articles_title; ?></div>
                                                <div class="footer_mn_text">
                                                        <span class="text_intro_a"><?php _e('À partir de ', 'gpg'); ?></span>
                                                        <span class="prix_a"><?php echo number_format($prix, 0, '.', ' '); ?> €</span>
                                                        <span class="lieu_a">en <?php echo $nuance ?></span>
                                                </div>

                                        </div>
                                        <span class="footer_mn_link">
                                                <a href="<?php echo $link_rel_m; ?>" class="link_custom">
                                                        <span class="link_custom_sp">
                                                            <?php echo _e('Personnaliser ce monument','gpg'); ?>
                                                        </span>
                                                </a>
                                        </span>
                                </div>
                         <?php endwhile; ?>
                         <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>   
               <?php endif; ?>  
            </div>
        </div>


</article>
<?php unset($Bsb4Design); ?>