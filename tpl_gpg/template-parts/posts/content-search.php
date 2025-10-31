
<?php 
    $project = get_post_type();
    $articles_title = get_the_title();
    $preambule = get_the_excerpt();
    $permalink_article = get_permalink();
?>


<?php if($project === "project"){ ?>
        <?php
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
        $image_slide_m_s_desktop_large = wp_get_attachment_image_src( $image_id_s, 'full');
        $image_slide_m_s_desktop = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop']);
        $image_slide_m_s_tablette = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_tablette']);
        $image_slide_m_s_mobile = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_mobile']);

        $produit_nuances = get_field('produit_nuances');
        // echo '<pre>';
        // print_r($produit_nuances);
        // echo '</pre>';
        foreach((array) $produit_nuances as $produit_nuance){
                $prix = $produit_nuance['prix'];
        }
                                            $nuance_objs = get_the_terms(get_the_ID(), 'project_category' );

                                            if($nuance_objs){
                                                                $nuance_texture = [];
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
        <div class="article-item">
        <?php 
                // echo '<pre>';
                // var_dump($project);
                // echo '</pre>';
            ?>
            <?php if(!empty($image_slide_m_s)) { ?>
            <div class="card">
            <?php }else{ ?>
            <div class="card no-image">
            <?php } ?>   
                <div class="card-img">
                    <!-- <div>Ato anaty sproject ve</div> -->
                    <a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title; ?>">
                    <?php //if(!empty($image_slide_m_s)){ ?>
                        <?php //echo '<img src="' . $image_slide_m_s. '" alt="' . $articles_title . '"/>'; ?>
                        <picture>
                            <img srcset="<?php echo $image_slide_m_s_desktop_large[0]; ?>" alt="<?php echo $articles_title; ?>" />
                        </picture>
                    <?php   //} ?>
                    
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-title"><a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title ?>"><?php echo $articles_title; ?></a></div>
                    <!-- <div class="card_content"><span><?php //echo $preambule;?></span></div> -->
                    <div class="post_header">
                            <p class="sub-title">
                            <span class="text_intro_s"><?php _e('À partir de ', 'gpg'); ?></span>
                            <span class="prix_s"><?php echo number_format($prix, 0, '.', ' '); ?> €</span>
                            <span class="lieu_s">en <?php echo $nuance ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php }else{ ?>
        <?php
            $large_image_url_a = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()));
            $size = array(
                'size_desktop_large'   => 'conseil_desktop_large',
                'size_desktop'         => 'conseil_desktop',
                'size_tablette'        => 'conseil_tablette',
                'size_mobile'          => 'conseil_mobile'
            );
        ?>
        <div class="article-item">
            <?php 
                // echo '<pre>';
                // var_dump($project);
                // echo '</pre>';
            ?>
            <?php if(!empty($large_image_url_a)) { ?>
            <div class="card">
            <?php }else{ ?>
            <div class="card no-image">
            <?php }?>   
                <div class="card-img">
                    <a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title; ?>">
                        <?php
                            // if(!empty($large_image_url_a)){
                            //     echo '<img src="' . $large_image_url_a[0] . '" alt="' . $articles_title . '"/>';
                            // }
                            //$desktop_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_desktop_large']);
                            $desktop_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                            $desktop_moyenne_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_desktop']);
                            $tablette_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_tablette']);
                            $mobile_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_mobile']);
                        ?>
                        <picture>
                            <img srcset="<?php echo $desktop_large_image[0]; ?>" alt="<?php echo $articles_title; ?>" />
                        </picture>
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-title"><a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title ?>"><?php echo $articles_title; ?></a></div>
                    <!-- <div class="card_content"><span><?php //echo $preambule;?></span></div> -->

                    <div class="card-terms"><?php the_terms(get_the_ID(), 'category'); ?></div>
                </div>
            </div>
        </div>
<?php } ?>


 
