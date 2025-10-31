 <?php

/**
 *
 * Template name: Page contact
 * 
 * 
 */
get_header();?>

<?php if(have_posts()): ?>
    <?php while (have_posts()) : the_post(); ?> 
        <div class="contact-page">
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
            <div class="container-fluid page-container page-contact">
                <div class="row">
                    <div class="col-xl-6 col-12 pcontact-txt">
                        <div class="pcontact-txt-content">
                            <?php the_content(); ?>
                        </div>
                        <?php 
                            //$formulaire = get_field('formulaire_de_contact', get_the_ID());  
                            $formulaire = do_shortcode(get_field('formulaire_de_contact', get_the_ID(), false, false));
                            if($formulaire):
                        ?>
                        <div class="contact-form-wrapper" id="contact-form-wrapper"><?php echo $formulaire; ?></div>
                        <?php endif; ?> 
                        <div class="coordonnees-title"><?php echo _e('Nos coordonnées', 'gpg'); ?></div>
                        <div class="coordonnees-wrapper">
                            <?php if(get_field('adresses', 'option')): ?>
                            <div class="coordonnees-item adresses">
                                <span class="icon-pin-map icon"></span>
                                <span class="coordonnees-txt adresses-txt"><?php echo nl2br(get_field('adresses', 'options')) ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if(get_field('telephone', 'option')): ?>
                            <div class="coordonnees-item telephone">
                                <span class="icon-call icon"></span>
                                <span class="coordonnees-txt telephone-txt"><?php the_field('telephone', 'options') ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if(get_field('e-mail', 'option')): ?>
                            <div class="coordonnees-item mail">
                                <span class="icon-mail icon"></span>
                                <a href="mailto:<?php the_field('e-mail', 'options') ?>" target="_blank">
                                    <?php the_field('e-mail', 'options') ?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="social-wrapper">
                            <div class="social-title"><?php echo _e('Suivez-nous', 'gpg'); ?></div>
                            <div class="rs-wrapper">
                                <ul>
                                    <?php if(get_field('facebook', 'option')): ?>
                                    <li><a href="<?php the_field('facebook', 'option') ?>" target="_blank" class="icon-fb"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('instagram', 'option')): ?>
                                    <li><a href="<?php the_field('instagram', 'option') ?>" target="_blank" class="icon-insta"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('linkedin', 'option')): ?>
                                    <li><a href="<?php the_field('linkedin', 'option') ?>" target="_blank" class="icon-in"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('pinterest', 'option')): ?>
                                    <li><a href="<?php the_field('pinterest', 'option') ?>" target="_blank" class="icon-pinterest"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('youtube', 'option')): ?>
                                    <li><a href="<?php the_field('youtube', 'option') ?>" target="_blank" class="icon-youtube"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('twitter', 'option')): ?>
                                    <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank" class="icon-twitter"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('whatsapp', 'option')): ?>
                                    <li><a href="<?php the_field('whatsapp', 'option') ?>" target="_blank" class="icon-watsapp"></a></li>
                                    <?php endif; ?>
                                    <?php if(get_field('skype', 'option')): ?>
                                    <li><a href="<?php the_field('skype', 'option') ?>" target="_blank" class="icon-skype"></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12 pcontact-form">
                        <?php 
                            //$formulaire = get_field('formulaire_de_contact', get_the_ID());  
                            $formulaire = do_shortcode(get_field('formulaire_de_contact', get_the_ID(), false, false));
                            if($formulaire):
                        ?>
                        <div class="contact-form-wrapper" id="contact-form-wrapper"><?php echo $formulaire; ?></div>
                        <?php endif; ?>   
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>