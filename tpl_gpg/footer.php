<?php
/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */
?>
        <?php get_template_part( 'template-parts/footer', 'avantages' ); ?>
        <footer class="footer footerbis">
            <div class="container">
                <div class="footer_wrap">
                    <div class="footer_wrap_content">
                        <div class="footer-col-item footer-1">
                            <div class="footer-title"> <?php echo _e('GPG Granit', 'gpg'); ?></div>
                            <?php if ( is_active_sidebar( 'footer-gpg-granit' ) ) { ?>
                                    <?php dynamic_sidebar('footer-gpg-granit'); ?>
                            <?php } ?>
                            <?php //if(get_field('ou_acheter', 'option')): ?>
                            <!-- <div class="footer-1-btn"> -->
                                <!-- <a href="<?php //the_field('ou_acheter', 'options') ?>" target="_blank" class="btn-ou-acheter" title="Où acheter"><?php //echo _e('Où acheter', 'gpg'); ?></a> -->
                            <!-- </div> -->
                            <?php //endif; ?>
                        </div>
                        <div class="footer-col-item footer-2">
                            <div class="footer-title"><?php echo _e('Notre Catalogue', 'gpg'); ?></div>
                            <?php if ( is_active_sidebar( 'footer-notre-catalogue' ) ) { ?>
                                    <?php dynamic_sidebar('footer-notre-catalogue'); ?>
                            <?php } ?>
                        </div>
                        <div class="footer-col-item footer-3">
                            <div class="footer-title"><?php echo _e('À propos', 'gpg'); ?></div>
                            <?php if ( is_active_sidebar( 'footer-a-propos' ) ) { ?>
                                    <?php dynamic_sidebar('footer-a-propos'); ?>
                            <?php } ?>
                        </div>
                        <!-- <div class="footer-col-item footer-4">
                            <div class="footer-title"><?php //echo _e('Newsletter', 'gpg'); ?></div>
                            <div class="newsletter-footer">
                                <p><?php //echo _e('Recevez en avant première les dernières nouveautés & exclusivités', 'gpg'); ?></p>
                                <?php //echo do_shortcode('[sibwp_form id=1]');?>
                            </div>
                        </div> -->
                        <div class="footer-col-item footer-5">
                            <div class="footer-title"><?php echo _e('Contactez-nous', 'gpg'); ?></div>
                            <div class="footer-contact">
                                <?php if(get_field('telephone', 'option')): ?>
                                <div class="telephone">
                                    <span class="icon-call"></span>
                                    <?php the_field('telephone', 'options') ?>
                                </div>
                                <?php endif; ?>

                                <?php if(get_field('e-mail', 'option')): ?>
                                <div class="mail">
                                    <span class="icon-mail"></span>
                                    <a href="mailto:<?php the_field('e-mail', 'options') ?>" target="_blank">
                                        <?php the_field('e-mail', 'options') ?>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="suivez-nous-wrapper">
                                <div class="footer-title"><?php echo _e('Suivez-nous', 'gpg'); ?></div>
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
                    </div>
                </div>
                <div class="copy-right">
                    <p class="copy">
                        <?php echo _e('Copyright GPG Granit', 'gpg'); ?> <?php echo date('Y') ?>  ©
                    </p>
                </div>
            </div>
        </footer>

        <!--WordPress footer-->
        <?php wp_footer(); ?> 
        <!--end WordPress footer-->
    </body>
</html>
