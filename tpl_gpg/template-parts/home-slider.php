<?php $slider_images = get_field('slider_images'); ?>
<div class="home-slider">
    <div class="home-slider__container">
        <div class="hp-slider">
            <?php if (!empty($slider_images)) : ?>

            <?php $slider_count = 0; foreach ($slider_images as $slider_image) : ?>

                <?php if(!empty($slider_image['image'])) : 

                    $image_slide_id = $slider_image['image'];

                    $titre_slider = $slider_image['titre_slider'];
                    $phrase_slider = $slider_image['phrase_slider'];
                    //$size = "hp_slider_slider"; // (thumbnail, medium, large, full or custom size)

                    $size = array(
                        /*'size_desktop_large'   => 'hp_slider_desktop_large',
                        'size_desktop_moyenne' => 'hp_slider_desktop_moyenne',*/
                        'size_desktop_large'   => 'hp_slider_desktop_large',
                        'size_desktop'         => 'hp_slider_desktop',
                        'size_tablette'        => 'hp_slider_tablette',
                        'size_mobile'          => 'hp_slider_mobile'
                    );

                    //$image_slide = wp_get_attachment_image_src( $image_slide_id, $size );
                    /*$image_slide_desktopLarge = wp_get_attachment_image_src( $image_slide_id, $size['size_desktop_large'] );
                    $image_slide_desktopMoyenne = wp_get_attachment_image_src( $image_slide_id, $size['size_desktop_moyenne'] );*/
                    //$image_slide_desktopLarge = wp_get_attachment_image_src( $image_slide_id, $size['size_desktop_large'] );
                    $image_slide_desktopLarge = wp_get_attachment_image_src( $image_slide_id, 'full' );
                    $image_slide_desktop = wp_get_attachment_image_src( $image_slide_id, $size['size_desktop'] );
                    $image_slide_tablette = wp_get_attachment_image_src( $image_slide_id, $size['size_tablette'] );
                    $image_slide_mobile = wp_get_attachment_image_src( $image_slide_id, $size['size_mobile'] );

                    ?>

                    <div class="hp-slider__wrap">
                        <div class="hp-slider__bloc">
                            <div class="desc">
                                <?php if(!empty($titre_slider)) : ?>
                                <?php echo ($slider_count == 0) ? '<h1 class="titre_slider">' . $titre_slider . '</h1>' :  '<h2 class="titre_slider">'  . $titre_slider . '</h2>';  ?>    
                                <?php endif; ?>

                                <?php if(!empty($phrase_slider)) :

                                    echo '<div class="phrase_slider">';
                                    echo $phrase_slider;
                                    echo '</div>';
                                endif; ?>


                                <?php if(!empty($slider_image['lien'])) : 

                                $lien_button = $slider_image['lien'];
                                $titre_du_bouton = $slider_image['titre_du_bouton'];

                                ?>

                                <div class="hp-slider-link">
                                    <a href="<?php echo $lien_button; ?>" class="link_button"><span class="title_bouton"><?php echo $titre_du_bouton; ?></span>
                                    </a>
                                </div>
                                <?php endif; ?> 
                            </div>

                            <div class="image_slide">
                                <!-- <picture>
                                    <source media="(min-width: 1599px)" srcset="<?php //echo $image_slide_desktopLarge[0]; ?>">
                                    <source media="(min-width: 1200px)" srcset="<?php //echo $image_slide_desktop[0]; ?>">
                                    <source media="(min-width: 768px)" srcset="<?php //echo $image_slide_tablette[0]; ?>">
                                    <source media="(max-width: 575px)" srcset="<?php //echo $image_slide_mobile[0]; ?>">
                                    <img src="<?php //echo $image_slide_mobile[0]; ?>" alt="<?php //echo !empty($titre_slider)? $titre_slider : '';  ?>" />
                                </picture> -->

                                <img src="<?php echo $image_slide_desktopLarge[0]; ?>" alt="<?php echo !empty($titre_slider)? $titre_slider : '';  ?>" />

                                <?php if(!empty($slider_image['lien'])) : 
                                    $lien_button = $slider_image['lien'];
                                ?>
                                    <a href="<?php echo $lien_button; ?>" class="link_img"><?php echo $titre_slider; ?></a>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php $slider_count++; endforeach; ?>
            <?php endif; ?>
        </div>
        <button id="pause-slider-hp" class="play-pause-slider">Pause</button>
        <button id="play-slider-hp" class="play-pause-slider">play</button>
    </div>
</div>
