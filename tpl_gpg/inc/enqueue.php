<?php

/*
==========================
  FRONT-END ENQUEUE FUNCTIONS
==========================
*/

function gpg_load_scripts(){
    //css
    wp_enqueue_style('googleapis_css', 'https://fonts.googleapis.com');
    wp_enqueue_style('gstatic_css', 'https://fonts.gstatic.com');
    wp_enqueue_style('fontOpenSans_css', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    wp_enqueue_style('fontRaleway_css', 'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap');
    // wp_enqueue_style('bootstrap_custom_css', get_stylesheet_directory_uri().'/assets/dist/css/bootstrap-custom-grid-reboot-min.css');
    wp_enqueue_style('bootstrap_grid_css', get_stylesheet_directory_uri().'/assets/dist/css/bootstrap-grid.min.css');
    wp_enqueue_style('bootstrap_reboot_css', get_stylesheet_directory_uri().'/assets/dist/css/bootstrap-reboot.min.css');
    wp_enqueue_style('slick_theme', get_stylesheet_directory_uri().'/assets/dist/css/slick-theme.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri().'/assets/dist/css/slick.css');
    wp_enqueue_style('tooltype_css', get_stylesheet_directory_uri().'/assets/dist/css/jquery-ui.min.css');
    wp_enqueue_style('bootstrap_select_css', get_stylesheet_directory_uri().'/assets/dist/css/bootstrap-select.min.css');
    wp_enqueue_style('main_style_css', get_stylesheet_directory_uri().'/assets/dist/css/styles.css');
    
    //js panzoom.min
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_stylesheet_directory_uri(). '/assets/dist/js/jquery.min.js', '1.0.0', true);
    wp_register_script('slick_js', get_stylesheet_directory_uri(). '/assets/dist/js/slick.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('bootstrap_select_js', get_stylesheet_directory_uri(). '/assets/dist/js/bootstrap-select.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('jquery_ui', get_stylesheet_directory_uri(). '/assets/dist/js/jquery-ui.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('panzoom_js', get_stylesheet_directory_uri(). '/assets/dist/js/panzoom.min.js', '1.0.0', true);
    //wp_register_script('gpg_main_js', get_stylesheet_directory_uri(). '/assets/src/js/main.js', array('jquery'), '1.0.0', true);
    wp_register_script('gpg_main_js', get_stylesheet_directory_uri(). '/assets/dist/js/main.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('gpg_main_specific_js', get_stylesheet_directory_uri(). '/assets/dist/js/main-specific.js', array('jquery'), '1.0.0', true);
  
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick_js');
    wp_enqueue_script('bootstrap_select_js');
    wp_enqueue_script('jquery_ui');
    //wp_enqueue_script('panzoom_js');
    wp_enqueue_script('gpg_main_specific_js');
    wp_enqueue_script('gpg_main_js');
    wp_localize_script('gpg_main_js', 'ajaxurl', array(admin_url( 'admin-ajax.php' )) );
}

add_action('wp_enqueue_scripts','gpg_load_scripts', 20);

function gpg_dequeue_scripts(){
    global $post;
    if (is_single() && $post->post_type == "project") {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_style('flexy-breadcrumb-font-awesome');
        wp_dequeue_style('bootstrap-basic4-font-awesome5');
        //wp_dequeue_style('bootstrap-basic4-main');
        //wp_dequeue_style('bootstrap4');
        wp_dequeue_style('tooltype_css');

        wp_dequeue_script('contact-form-7');
        wp_dequeue_script('gtm4wp-form-move-tracker');
        wp_dequeue_script('bootstrap-basic4-main');
        wp_dequeue_script('bootstrap4-bundle');
        wp_dequeue_script('gpg_main_specific_js');
        wp_dequeue_script('jquery_ui');
    }

    if (is_single() && $post->post_type == "post") {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_style('flexy-breadcrumb-font-awesome');
        wp_dequeue_style('bootstrap-basic4-font-awesome5');
        //wp_dequeue_style('bootstrap-basic4-main');
        //wp_dequeue_style('bootstrap4');
        //wp_dequeue_style('tooltype_css');
        wp_dequeue_style('slick');
        wp_dequeue_style('bootstrap_select_css');

        wp_dequeue_script('contact-form-7');
         wp_dequeue_script('bootstrap-basic4-main');
         wp_dequeue_script('bootstrap4-bundle');
        wp_dequeue_script('gpg_main_specific_js');
        //wp_dequeue_script('jquery_ui');
        wp_dequeue_script('bootstrap_select_js');
        // wp_dequeue_script('slick_js');
        wp_dequeue_script('slick_theme');
    }
}
add_action('wp_enqueue_scripts', 'gpg_dequeue_scripts', 999);
 
//filtre
function add_googleapis_css( $html, $handle) {
    if ( 'googleapis_css' === $handle ) {
        return str_replace(
            array("rel='stylesheet'","type='text/css' media='all'"),
            array("","rel='preconnect' crossorigin"),
            $html
         );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'add_googleapis_css', 10, 2 );

function add_gstatic_css( $html, $handle) {
    if ( 'gstatic_css' === $handle ) {
        return str_replace(
            array("rel='stylesheet'","type='text/css' media='all'"),
            array("","rel='preconnect' crossorigin"),
            $html
         );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'add_gstatic_css', 10, 2 );

/*
==========================
  ADMIN ENQUEUE FUNCTIONS
==========================
*/

function site_block_editor_styles() {
    if(is_admin()){
    add_theme_support( 'editor-styles' );
    wp_enqueue_style( 'site-block-editor-styles', get_stylesheet_directory_uri().'/assets/dist/css/admin-style.css' , false, '1.0', 'all' );
}

}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_styles' );

/*
===========================
External cookie mannagement
===========================
*/
function custom_gdpr(){
    if (!is_user_logged_in()){
        echo '<script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/f012fe0cee56242a3700aaf063504e2e.js"></script>';
    }
}
add_action('wp_head', 'custom_gdpr');
