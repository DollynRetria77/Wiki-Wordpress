<?php

/**
 *
 * Template name: Page home
 * 
 * 
 */
get_header();?>

<?php get_template_part( 'template-parts/home', 'slider' ); ?>
<?php get_template_part( 'template-parts/home', 'monuments' ); ?>
<?php get_template_part( 'template-parts/home', 'projet' ); ?>
<?php get_template_part( 'template-parts/home', 'actualite' ); ?>



<?php get_footer(); ?>