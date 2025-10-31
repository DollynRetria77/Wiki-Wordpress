<?php
/** 
 * The archive-project template.
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
                    <div class="">
                        <div class="page-baniere">
                            <div class="breadcrumbs-wrapper">
                                <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
                            </div>
                            <div class="page-title-subtitle">
                                <?php the_archive_title('<h1 class="header_title">', '</h1>'); ?>
                            </div>
                        </div>
                    <?php 
                    ?>
                    <div class="content_search_wrapper">
                        <div class="form_search form-search-item">
                            <span class="title_search title_label"><?php _e('Rechercher dans les monuments', 'gpg'); ?></span>
                            <?php echo get_form_search_project(); ?>
                        </div>

                    </div>
                    <div class="content_liste_article">
                    <?php
                        while (have_posts()) {
                               the_post();
                                get_template_part('template-parts/posts/content','project');
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