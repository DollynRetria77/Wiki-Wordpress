<?php

function add_acf_menu_pages(){
    acf_add_options_page(array(
    	'page_title' 	=> 'Footer options',
		'menu_title'	=> 'Footer options',
		'menu_slug' 	=> 'option',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'capability' => 'manage_options',
        'position' => 61.1,
        'redirect' => true,
        'icon_url' => 'dashicons-admin-customizer',
        'update_button' => 'Save options',
        'updated_message' => 'Options saved',
    ));

}

add_action('acf/init', 'add_acf_menu_pages');

function gpg_custom_theme_option($wp_customize){
    $wp_customize->add_section(
        'gpg_child_gtm', array(
            'title'         => __('Google Tag Manager', 'gpg'),
            'description'   => __('Config general pour Google Tag Manager'),
            'priority'      => 120
        )
    );

    $wp_customize->add_setting(
        'gpg_child_gtm_head_script', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        )
    );

    $wp_customize->add_control( 'gpg_child_gtm_head', array(
        'type'          => 'textarea',
        'section'       => 'gpg_child_gtm', // // Add a default or your own section
        'label'         => __( 'GTM Head script' ),
        'description'   => __( 'Script a placer à la fin tu tag BODY' ),
        'settings'      => 'gpg_child_gtm_head_script'
      ) 
    );

    $wp_customize->add_setting(
        'gpg_child_gtm_body_script', array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'type'          => 'option'
        )
    );

    $wp_customize->add_control( 'gpg_child_gtm_body', array(
        'type'          => 'textarea',
        'section'       => 'gpg_child_gtm', // // Add a default or your own section
        'label'         => __( 'GTM Head script' ),
        'description'   => __( "Script a placer au debut de tu tag BODY" ),
        'settings'      => 'gpg_child_gtm_body_script'
      ) 
    );
}

add_action('customize_register', 'gpg_custom_theme_option');