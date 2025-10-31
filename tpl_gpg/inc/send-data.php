<?php

function send_data_connection(){
    $term_list           = get_terms( array( 'category')); 
    // $term_list_name_slug = array_filter($term_list, function($cat){
    //     return array(
    //         'name' => $cat->name,
    //         'slug' => $cat->slug
    //     );
    // });

    $term_list_name_slug = array_map(function($cat){
        return array(
            'name' => $cat->name,
            'slug' => $cat->slug
        );
    }, $term_list);
    $data_to_pass = (object) $term_list_name_slug;
    //Localize the js, referencing the handle
    wp_localize_script('gpg_main_js', 'article_cat_data', $data_to_pass ); 
}

add_action( 'wp_enqueue_scripts', 'send_data_connection',21);

// function send_data_provenance_granit(){
//     $provenance  = isset($wp_query->query_vars['provenance']) ? explode("+", $wp_query->query_vars['provenance']): [] ;
//     print_r($provenance);
//     wp_localize_script('gpg_main_js', 'provenance_granit', $provenance ); 
// }
// add_action( 'wp_enqueue_scripts', 'send_data_provenance_granit',21);