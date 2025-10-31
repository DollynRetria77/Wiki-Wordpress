<?php

/**
 *
 * Template name: Page simple
 * 
 * 
 */
get_header();?>
<div class="page-no-baniere">
    <div class="container">
        <div class="breadcrumbs-wrapper">
            <?php echo do_shortcode( '[flexy_breadcrumb]'); ?>  
        </div>
    </div>
</div>
<?php if(have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?> 
    <div class="simple-pages">
        <div class="page-simple">
            <?php the_content(); ?>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>