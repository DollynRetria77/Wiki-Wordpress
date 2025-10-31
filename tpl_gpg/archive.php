<?php
/** 
 * The archive template.
 * Custome
 * Use for display author archive, category, custom post archive, custom taxonomy archive, tag, date archive.<br>
 * These archive can override by each archive file name such as category will be override by category.php.<br>
 * To learn more, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header(); ?> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container_article">
                    <?php 
                    if (have_posts()) { ?> 
                        <div class="page-baniere">
                            <div class="breadcrumbs-wrapper">
                                <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
                            </div>
                            <div class="page-title-subtitle">
                                <?php the_archive_title('<h1 class="header_title">', '</h1>'); ?>
                            </div>
                        </div>
                    <div class="content_search_wrapper">
                        <div class="form_search form-search-item">
                            <span class="title_search title_label"><?php _e('Rechercher dans les conseils', 'gpg'); ?></span>
                            <?php echo get_form_search_post(); ?>
                        </div>

                        <div class="select_cat select_cat_desktop form-search-item">
                            <form method="get" action="">
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

                                //asort($categories);
                                $html_cat .= '<span class="select-wrapper">';
                                $html_cat .= '<select name="categories" name="cat_select_get" class="select_cat_list form-control" id="select_cat_list_desktop">';
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
                            </form>
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
                                    $html_cat .= "<li class='reset-filter-btn-mobile'><div class='reset-filter-btn'><a href='javascript:void()' class='reset-filter-categorie' id='reset-filter-categorie-mobile'>Réinitialiser</a></div></li>";
                                    $html_cat .= '</ul>';
                                    $html_cat .= '</div>';
                                    $html_cat .= '</div>';
                    
                                    echo $html_cat;
                                ?> 
                        </div>
                        <div class="reset-filter-btn reset-filter-btn-desktop">
                            <a href="javascript:void()" class="reset-filter-categorie" id="reset-filter-categorie">Réinitialiser</a>
                        </div>
                    </div>
                    <div class="content_liste_article">
                    <?php
                        while (have_posts()) {
                               the_post();
                                get_template_part('template-parts/posts/content','archive');
                        } 
                        wp_reset_query();
                    ?>
                    <div class="pagination-wrapper">
                        <?php the_posts_pagination(); ?>
                    </div>
                    </div>
                    <?php

                    } else {
                        get_template_part('no-results');
                    } 
                  ?> 
</div>  
</article>
<?php get_footer();?>