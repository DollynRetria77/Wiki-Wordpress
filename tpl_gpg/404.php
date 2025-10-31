<?php
/** 
 * File not found or web page not found template file.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();

/* @var $wp_widget_factory \WP_Widget_Factory */
global $wp_widget_factory;
?> 
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="error-container">
            <div class="page-baniere">
                <div class="breadcrumbs-wrapper">
                    <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
                </div>
                <div class="page-title-subtitle">
                    <h1 class="header_title"><?php echo _e('404','gpg'); ?></h1>
                    <p class="header_phrase"><?php echo _e('La page que vous demandez n\'existe pas','gpg'); ?> </p>
                </div>
            </div>
        </div>
    </article>
<?php
get_footer();