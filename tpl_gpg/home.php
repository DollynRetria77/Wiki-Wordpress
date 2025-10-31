<?php

/**
 *
 * Template name: Page articles
 * 
 * 
 */
get_header();?>
<?php
$page_for_posts = get_option( 'page_for_posts' );

$entete_page = get_field('entete_page', intval($page_for_posts));
$titre_liste_article = $entete_page['titre_liste_article'];
$phrase_introductive = $entete_page['phrase_introductive'];
?>

<div class="container_article">
    <div class="page-baniere">
        <div class="breadcrumbs-wrapper">
            <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
        </div>
        <div class="page-title-subtitle">
            <?php if(!empty($titre_liste_article)){ ?>
            <h1 class="header_title"><?php echo $titre_liste_article; ?> </h1>
            <?php } ?>
            <?php if(!empty($phrase_introductive)){ ?>
            <p class="header_phrase"><?php echo $phrase_introductive; ?> </p>
            <?php } ?>
        </div>
    </div>

        <div class="content_search_wrapper">
            <div class="form_search form-search-item">
                <span class="title_search title_label"><?php _e('Rechercher dans les conseils', 'gpg'); ?></span>
                <?php echo get_form_search_post(); ?>
            </div>
            <div class="select_cat select_cat_desktop form-search-item">
                        <span class="title_cat title_label"><?php _e('Filtrer par catégorie','gpg'); ?></span>
                        <?php 
                            $uncategorized_name = get_term_by( 'slug', 'uncategorized', 'category' );
                            $args_c = array(
                                'orderby'  => 'name',
                                'order'    => 'DESC', 
                                'parent'   => 0,
                                'exclude' => array($uncategorized_name->term_id),
                            );
                            $html_cat = '';
                            $categories = get_categories($args_c);
                            $categories_filtrer = array();
                            $term_list_id_name = array_map(function($cat){
                                return array(
                                    'id' => $cat->term_id,
                                    'name' => $cat->name
                                );
                            }, $categories);
                            foreach($term_list_id_name as  $id_name){
                                $categories_filtrer[$id_name['id']] = $id_name['name'];
                            }
                            asort($categories_filtrer);

                            $html_cat .= '<span class="select-wrapper">';
                            $html_cat .= '<select name="categories" class="select_cat_list form-control" id="select_cat_list_desktop">';
                            $html_cat .= "<option value ='tous'> Sélectionner une catégorie </option>";
                            // foreach ($categories as $key => $categorie) {

                            //     $html_cat .="<option value='{$categorie->term_id}'>{$categorie->name}</option>";
                            // }
                            foreach ($categories_filtrer as $key => $categorie) {
                                $html_cat .="<option value='{$key}'>{$categorie}</option>";
                            }
                            $html_cat .= '</select>';
                            $html_cat .= '</span>';
                            echo $html_cat;
                        ?> 
            </div>
            <div class="select_cat select_cat_mobile form-search-item">
                    <span class="title_cat title_label" id="filter-per-categorie"><?php _e('Filtrer par catégorie','gpg'); ?> <span class="icon-chevron-left icon"></span></span>
                    <?php 
                        $uncategorized_name = get_term_by( 'slug', 'uncategorized', 'category' );
                        $args_c = array(
                            'orderby'  => 'name',
                            'order'    => 'DESC', 
                            'parent'   => 0,
                            'exclude' => array($uncategorized_name->term_id),
                        );
                        $html_cat = '';
                        $categories = get_categories($args_c);
                        $html_cat .= '<div class="select_cat_list_mobile">';
                        $html_cat .= '<div class="select_cat_list_mobile_inner">';
                        $html_cat .= '<a href="#" class="close-filter" id="close-filter"><span class="icon-close icon"></span></a>';
                        $html_cat .= '<ul id="select_cat_list">';
                        foreach ($categories as $key => $categorie) {

                            $html_cat .="<li value='{$categorie->term_id}'><a href='#'>{$categorie->name}</a></li>";
                        }
                        $html_cat .= "<li class='reset-filter-btn-mobile'><div class='reset-filter-btn'><a href='javascript:void()' class='reset-filter-categorie'>Réinitialiser</a></div></li>";
                        $html_cat .= '</ul>';
                        $html_cat .= '</div>';
                        $html_cat .= '</div>';
        
                        echo $html_cat;
                    ?> 
            </div>
            <div class="reset-filter-btn reset-filter-btn-desktop">
                <a href="javascript:void()" class="reset-filter-categorie">Réinitialiser</a>
            </div>
        </div>

        <div class="content_liste_article">
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

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;

            // $sticky = get_option('sticky_posts');
            // rsort($sticky);
            // $posts_per_page = 12;
            // $sticky_count = count($sticky);
            // if ($sticky_count < $posts_per_page) {
            //     $posts_per_page = $posts_per_page - $sticky_count;
            // } else {
            //     $posts_per_page = 1;
            // }


            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'ignore_sticky_posts' => 1,
                'paged' => $paged 
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) : while ($the_query->have_posts()) : $the_query->the_post(); 
                $articles_title = get_the_title();
                $permalink_article = get_permalink();

                $size = array(
                    'size_desktop_large'   => 'conseil_desktop_large',
                    'size_desktop'         => 'conseil_desktop',
                    'size_tablette'        => 'conseil_tablette',
                    'size_mobile'          => 'conseil_mobile'
                );

                ?>
                <div class="article-item">
                    <div class="card">
                        <div class="card-img">
                            <a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title; ?>">
                            <?php



                                //$large_image_url_a = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'nos_actualite_img');
                                $desktop_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
                                $desktop_moyenne_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_desktop']);
                                $tablette_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_tablette']);
                                $mobile_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size['size_mobile']);
                                // if(!empty($large_image_url_a)){
                                //     echo '<img src="' . $large_image_url_a[0] . '" alt="' . $articles_title . '"/>';
                                // }
                            ?>

                                <img src="<?php echo $desktop_large_image[0]; ?>" alt="<?php echo $articles_title; ?>" />


          
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-title"><a href="<?php echo $permalink_article; ?>" title="<?php echo $articles_title ?>"><?php echo $articles_title; ?></a></div>
                            <div class="card-date-terms">
                                <span class="card-date"><?php echo /*get_the_date('d',get_the_ID()).' '.*/$months[(string)get_the_date('m',get_the_ID())].' '.get_the_date('Y',get_the_ID()) ?></span> - <span class="card-terms"><?php the_terms(get_the_ID(), 'category'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>

            <div class="pagination-wrapper">
                <?php the_posts_pagination(); ?>
            </div>
        <?php

            endif;

        ?>
        </div>

</div>

<?php get_footer(); ?>