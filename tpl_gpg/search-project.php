<?php
/** 
 * The search template.
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

                    <?php 
                    if (have_posts()) { ?> 

                        <div class="page-baniere">
                            <div class="breadcrumbs-wrapper">
                                <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
                            </div>
                            <div class="page-title-subtitle">
                                <h1 class="header_title">Résultats de la recherche sur : <?php the_search_query(); ?></h1>
                            </div>
                        </div>
                         <div class="content_search_wrapper">
                              <div class="form_search form-search-item">
                                    <?php echo get_form_search_project(); ?>
                              </div>

                         </div>
                    <?php 
                    ?>
                    <div class="content_liste_article">
                    <?php
                        while (have_posts()) {
                               the_post();
                                    get_template_part('template-parts/posts/content','sproject');
                        } 
                        wp_reset_query();
                    ?>
                    <div class="pagination-wrapper">
                        <?php the_posts_pagination(); ?>
                    </div>
                    </div>
                    <?php
                    }
                    ?> 
</article>
<?php get_footer();?>