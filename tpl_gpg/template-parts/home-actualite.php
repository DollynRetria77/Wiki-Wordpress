<?php 
$nos_actualites = get_field('nos_actualites'); 
$bloc_actualite =get_field('bloc_actualite'); 
?>
<section class="nos-actualites_hp" id="nos-conseils">
    <div class="container">
    <div class="nos-actualites-title">
        <div class="title-h2"><?php echo $nos_actualites; ?></div>
    </div>
        <div class="nos-actualites_hp_wrap js-slick-md">
            <?php 
                $months = array(
                    "01" => "Janvier",
                    "02" => "Février",
                    "03" => "Mars",
                    "04" => "Avril",
                    "05" => "Mai",
                    "06" => "Juin",
                    "07" => "Juillet",
                    "08" => "Août",
                    "09" => "Septembre",
                    "10" => "Octobre",
                    "11" => "Novembre",
                    "12" => "Décembre"
                );

                $size = array(
                    'size_desktop_large'   => 'nos_actualite_desktop_large',
                    'size_desktop'         => 'nos_actualite_desktop',
                    'size_tablette'        => 'nos_actualite_tablette',
                    'size_mobile'          => 'nos_actualite_mobile'
                );

        if ( !empty( $bloc_actualite ) ) :
            foreach ( $bloc_actualite as $actualite ) : 
                $actualite_id = $actualite->ID;
                $actualite_title = $actualite->post_title;
                $actualite_content = $actualite->post_content; 
                $apercu_link_a = get_permalink($actualite_id); 

                //$image_desktopLarge_url = wp_get_attachment_image_src( get_post_thumbnail_id($actualite_id), $size['size_desktop_large']);
                $image_desktopLarge_url = wp_get_attachment_image_src( get_post_thumbnail_id($actualite_id), 'full');
                $image_desktop_url = wp_get_attachment_image_src( get_post_thumbnail_id($actualite_id), $size['size_desktop']);
                $image_tablette_url = wp_get_attachment_image_src( get_post_thumbnail_id($actualite_id), $size['size_tablette']);
                $image_mobile_url = wp_get_attachment_image_src( get_post_thumbnail_id($actualite_id), $size['size_mobile']);
            ?>
                    <div class="nos-actus">
                        <div class="card">
                            <div class="card-img">
                                <a href="<?php echo $apercu_link_a; ?>" title="<?php echo $actualite_title; ?>">
                                <?php
                                    //the_post_thumbnail();
                                    //$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($actualite_id), 'nos_actualite_img');
                                    //echo '<img src="' . $large_image_url[0] . '" alt="' . $actualite_title . '" width="415" height="270"/>';
                                ?>


                                    <img src="<?php echo $image_desktopLarge_url[0]; ?>" alt="<?php echo $actualite_title; ?>" />

                                
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="card-title"><a href="<?php echo $apercu_link_a; ?>" title="<?php echo $actualite_title ?>"><?php echo $actualite_title; ?></a></div>
                                <div class="card-date-terms">
                                    <span class="card-date"><?php echo $months[(string)get_the_date('m',$actualite_id)].' '.get_the_date('Y',$actualite_id) ?></span> - <span class="card-terms"><?php the_terms($actualite_id, 'category'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            $actualite_ids[] = $actualite->ID; 
            endforeach;
        endif; 

            if(!empty($actualite_ids)): 

            $count_actualit_show = count($actualite_ids);

            $post_count = $count_actualit_show >= 4 ? 0 :(4-$count_actualit_show);
            if($post_count == 0) :
              //pas d'action
            else :

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => $post_count,
                'post__not_in'   => $actualite_ids,
                'order'          => 'DESC',
                'is_paged'          => false,
                'post_status'       => 'publish',
                'suppress_filters'  => true
            );

            

            $loop = new WP_Query($args);
        ?>
        <?php 
            if($loop->have_posts()):
                while($loop->have_posts()): $loop->the_post();

                //$image_desktopLarge_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_desktop_large']);
                $image_desktopLarge_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                $image_desktop_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_desktop']);
                $image_tablette_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_tablette']);
                $image_mobile_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_mobile']);
        ?>

        

        <div class="nos-actus">
            <div class="card">
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="card-img">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php
                        //the_post_thumbnail();
                        //$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'nos_actualite_img');
                        //echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '" width="415" height="270"/>';
                    ?>
                        <img srcset="<?php echo $image_desktopLarge_url[0]; ?>" alt="<?php the_title(); ?>" />
                    </a>
                </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                    <div class="card-date-terms">
                        <span class="card-date"><?php echo $months[(string)get_the_date('m')].' '.get_the_date('Y') ?></span> - <span class="card-terms"><?php the_terms(get_the_ID(), 'category'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
                endwhile; wp_reset_postdata();
            endif; 
          endif;
        endif;
        ?>
        </div>
    </div>
</section>
