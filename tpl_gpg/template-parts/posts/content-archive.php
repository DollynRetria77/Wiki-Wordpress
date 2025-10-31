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

                $articles_title = get_the_title();
                $permalink_article = get_permalink();

                ?>
                <div class="article-item">
                    <div class="card">
                        <div class="card-img">
                            <a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title; ?>">
                            <?php
                                $large_image_url_a = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                                if(!empty($large_image_url_a)){
                                    echo '<img src="' . $large_image_url_a[0] . '" alt="' . $articles_title . '"/>';
                                }
                            ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title"><a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title ?>"><?php echo $articles_title; ?></a></div>
                            <div class="card-date-terms">
                                <span class="card-date"><?php echo $months[(string)get_the_date('m',get_the_ID())].' '.get_the_date('Y',get_the_ID()) ?></span> - <span class="card-terms"><?php the_terms(get_the_ID(), 'category'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
