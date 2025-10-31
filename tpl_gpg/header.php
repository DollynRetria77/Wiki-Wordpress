<?php
/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */

$container_class = apply_filters('bootstrap_basic4_container_class', 'container');
if (!is_scalar($container_class) || empty($container_class)) {
    $container_class = 'container';
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if(is_search()){
            $search = get_search_query();
            echo "<title>Recherche : ".$search."</title>";
        } ?>
        <?php wp_head(); ?> 
        <!--end WordPress head-->
        <?php echo get_theme_mod('gpg_child_gtm_head'); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php
        if (function_exists('wp_body_open')) {
            wp_body_open();
        }
        ?> 
        <?php echo get_theme_mod('gpg_child_gtm_body'); ?>
            <header class="header">
                <div class="container">
                    <div class="header__regions">
                        <!-- header logo -->
                        <div class="header-logo">
                        <?php if(function_exists('the_custom_logo')): ?> 
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php
                                        $custom_logo_id = get_theme_mod('custom_logo');
                                        
                                        $image = wp_get_attachment_image_src($custom_logo_id , 'full');
                                        if(!empty($image)): 
                                    ?>

                                    <img src="<?php echo $image[0]; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" width="122" height="72">

                                        <?php endif; ?>
                                </a>
                            <?php else: ?>
                                <div class="site-title">
                                    <h1 class="site-title-heading">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                    </h1>
                                    <div class="site-description">
                                        <small>
                                            <?php bloginfo('description'); ?> 
                                        </small>
                                    </div>
                                </div><!--.site-branding-->
                            <?php endif; ?>
                        </div>
                        <!--/ header logo -->

                        <!-- Burger Menu -->
                        <div class="menu-burger">
                            <div class="hamburger"> 
                                <span class="line"></span> 
                                <span class="line"></span> 
                                <span class="line"></span>
                            </div>
                        </div>
                        <!-- wrap menu -->
                        <div class="wrap-menu">
                            <!-- header menu -->
                            <div class="header-menu">
                                <?php if (has_nav_menu('primary')) { ?> 
                                    <div class="row main-navigation">
                                        <div class="col-md-12">
                                            <nav class="navbar navbar-expand-lg navbar-light">
                                                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bootstrap-basic4-topnavbar" aria-controls="bootstrap-basic4-topnavbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'bootstrap-basic4'); ?>">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button> -->
                                                <div id="bootstrap-basic4-topnavbar" class="navbar-collapse">
                                                                            <?php
                                                    wp_nav_menu(
                                                        array(
                                                            'depth' => '4',
                                                            'theme_location' => 'primary',
                                                            'container' => false,
                                                            'walker' => new BootstrapBasic4WalkerNavMenu_custom()
                                                        )
                                                    );

                                                    ?>
                                                </div><!--.navbar-collapse-->
                                            </nav>
                                        </div>
                                    </div><!--.main-navigation-->
                                <?php } else { ?> 
                                    <!-- the navigation is skipped due to there is no menu or active widgets on navbar-right. -->
                                <?php }// endif; ?> 
                            </div>
                            <!--/ header menu -->

                            <!-- header formsearch -->
                            <div class="header-search">
                                <a href="#" class="icon-loupe"><span class="icon-awesome-search"></span></a>
                                <form class="form-inline" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input autofocus autocomplete="off" id="input_search" class="form-control" name="s" type="text" aria-label="Search" value="<?php echo get_search_query() ?>">
                                    <!-- <input type="hidden" name="post_type" value="post" id="post_type" /> -->
                                    <!-- <button class="btn btn-outline icon-awesome-search" type="submit"></button> -->
                                    <button class="btn btn-outline" type="submit"></button>
                                </form>
                            </div>
                            <!--/ header formsearch -->

                            <div class="header-btn">
                                <?php if(get_field('mon_espace_famille', 'option')): ?>
                                <a href="<?php the_field('mon_espace_famille', 'options') ?>" class="header-btn-item header-btn-grey btn-espace-famille" title="Espace famille"><?php echo _e('Espace famille', 'gpg'); ?></a>
                                <?php endif; ?>
                                <?php if(get_field('ou_acheter', 'option')): ?>
                                <a href="<?php the_field('ou_acheter', 'options') ?>" target="_blank" class="header-btn-item header-btn-orange btn-ou-acheter" title="Où acheter"><?php echo _e('Où acheter', 'gpg'); ?></a>
                                <?php endif; ?>
                                <?php if(get_field('espace_pro', 'option')): ?>
                                <a href="<?php the_field('espace_pro', 'options') ?>" class="header-btn-item header-btn-transparent btn-ou-espace-pro" title="Espace pro" target="_blank"><?php echo _e('Espace pro', 'gpg'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </header>


