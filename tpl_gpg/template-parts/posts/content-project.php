<?php 
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
               // $image_slide_m_s = wp_get_attachment_image_url( $image_id_s, $size_m_s );
               $image_slide_m_s = wp_get_attachment_image_url( $image_id_s);

               //$image_slide_m_s_desktop_large = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop_large']);
               $image_slide_m_s_desktop_large = wp_get_attachment_image_src( $image_id_s, 'full');
               $image_slide_m_s_desktop = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_desktop']);
               $image_slide_m_s_tablette = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_tablette']);
               $image_slide_m_s_mobile = wp_get_attachment_image_src( $image_id_s, $size_m_s['size_mobile']);

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

                                                                            $nuance = implode(", ",$nuance_texture);

                                                                        }else{
                                                                            $nuance = __('non disponible', 'gpg');
                                                                        } 
                                                    }else{

                                                    $nuance = __('non disponible', 'gpg');
                                                    
                                                    }

                ?>
                <div class="article-item">
                    <div class="card monument">
                        <div class="card-img">
                            <a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title; ?>">
                            <?php
                                if(!empty($image_slide_m_s_desktop_large)) : ?>
                                    <?php //echo '<img src="' . $image_slide_m_s . '" alt="' . $articles_title . '"/>'; ?>
                                    <picture>
                                        <img srcset="<?php echo $image_slide_m_s_desktop_large[0]; ?>" alt="<?php echo $articles_title; ?>" />
                                    </picture>
                                <?php endif;
                            ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title"><a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title ?>"><?php echo $articles_title; ?></a></div>
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
