<?php

/**
 *
 * Template name: Page faq
 * 
 * 
 */
get_header();?>
 <?php //echo do_shortcode( '[flexy_breadcrumb]'); ?> 
<?php if(have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?> 
    <div class="page-faq">
        <div class="page-baniere">
            <div class="breadcrumbs-wrapper">
                <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
            </div>
            <div class="page-title-subtitle">
                <h1><?php the_title(); ?></h1>
                <?php if(has_excerpt(get_the_ID())): ?>
                <p><?php echo strip_tags(get_the_excerpt()); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="container-fluid page-container page-faq">
            <div class="row">
                <div class="col-12 page-faq-content">
                    <?php 
                        $titre = get_field('titre', get_the_ID());  
                        if($titre):
                    ?>
                    <h2 class="title-h2"><?php echo $titre; ?></h2>
                    <?php endif; ?>
                            
                    <?php $faq =  get_field('foire_aux_questions', get_the_ID()); ?>
                    <!-- <pre>
                        <?php //var_dump($faq); exit; ?>
                    </pre> -->

                    <?php if(!empty($faq)): ?>
                    <div class="faq-wrapper">
                        <?php foreach($faq as $faq_item): ?>
                        <div class="faq-item">
                            <?php if(!empty($faq_item['question'])): ?>
                            <div class="faq-item-question">
                                <?php echo $faq_item['question']; ?>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($faq_item['reponse'])): ?>
                            <div class="faq-item-reponse" style="display:none">
                                <?php echo $faq_item['reponse']; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>