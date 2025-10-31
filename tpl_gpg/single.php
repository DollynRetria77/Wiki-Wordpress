<?php
/** 
 * The single post.<br>
 * This file works as display full post content page and its comments.
 * 
 * @package bootstrap-basic4
 */


// begins template. -------------------------------------------------------------------------
get_header();?>
<div class="page-no-baniere">
    <div class="container">
        <div class="breadcrumbs-wrapper">
            <?php echo do_shortcode( '[flexy_breadcrumb]'); ?>  
        </div>
    </div>
</div>

                <main id="main" class="" role="main">
                    <?php
                    if(have_posts()) {
                        $Bsb4Design = new \BootstrapBasic4\Bsb4Design();
                        while (have_posts()) {
                            the_post();
                            global $post;
                            if($post->post_type == "project"){
                                   get_template_part('template-parts/posts/content', 'monument');
                            }else if($post->post_type == "granits"){
                                   get_template_part('template-parts/posts/content', 'granits');
                            }else{
                                   get_template_part('template-parts/posts/content', get_post_format());
                            }
                            echo "\n\n";

                            $Bsb4Design->pagination();
                            echo "\n\n";

                            // display next/previous post. un-comment the code below to display post navigation.
                            // @since 1.2.6
                            //get_template_part('template-parts/nextprevious-post');

                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' != get_comments_number()) {
                                comments_template();
                            }
                            echo "\n\n";
                        }// endwhile;

                        
                        unset($Bsb4Design);
                    } else {
                        get_template_part('no-results');
                    }// endif;
                    ?> 
                </main>
<?php
get_footer();?> 