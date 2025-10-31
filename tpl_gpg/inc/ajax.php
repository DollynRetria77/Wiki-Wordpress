<?php

//filter post by cat
add_action('wp_ajax_nopriv_filter_blog_gpg','filter_blog_gpg');
add_action('wp_ajax_filter_blog_gpg','filter_blog_gpg');

function filter_blog_gpg(){

$categorie_single = $_POST["categorie_single"];

if($categorie_single == 'tous'){
$link_rel_cat = get_permalink(get_option('page_for_posts'));
}else{
$link_rel_cat = get_category_link( intval( $categorie_single ) );
}

echo $link_rel_cat;
die;
}

//configurateur
/*add_action('wp_ajax_nopriv_configurateur_gpg','configurateur_gpg');
add_action('wp_ajax_configurateur_gpg','configurateur_gpg');
function configurateur_gpg(){
    $configurateur_link = $_POST["configurateur_link"];

    $links = explode('/', $configurateur_link);
    $famille = $links[count($links) - 3];
    $choisir = $links[count($links) - 2];
    
    //$link_rel = site_url('/configurateur-famille/?famille=' . $famille . '&choisir=' . $choisir);
    $link_rel = site_url('/configurateur-famille/' . $famille . '/' . $choisir);
    echo $link_rel;
    die;
}*/


//nuancier
//filtre par nom
add_action('wp_ajax_nopriv_load_nuancier_pername','load_nuancier_pername');
add_action('wp_ajax_load_nuancier_pername','load_nuancier_pername');
function load_nuancier_pername(){
    $textsearch = $_GET['textsearch'];
    $args = array(
        'taxonomy' 		=> 'project_category',
        'child_of' 		=> 7,
        'hide_empty' 	=> false, 
        'name__like'    => $textsearch
    ); 
    
    $terms = get_terms( $args );
    $html = '';
    foreach($terms as $term){
        $term_id = $term->term_id;
        $acf_term_id = 'project_category_' . $term_id;
        $img_id = get_field('nuance_thumb', $acf_term_id);
        $teinte_name = get_field('nuance_teinte', $acf_term_id);
        $couleur_name = get_field('couleur_granit', $acf_term_id);
        $provenance_name = get_field('provenance_du_granit', $acf_term_id);
        $teinte_page = get_field('nuance_link', $acf_term_id);
        

        $html .= '<div class="cat_bloc" data-name="' . $term->name . '" data-filter="'.$teinte_name.'" data-couleur="'.$couleur_name.'" data-provenance="'.$provenance_name.'">';
        $html .= '<span class="forTheSearch" style="display:none">'. $term->name .'</span>';
        $html .= '<div class="cat_image">';
        $html .= '<img src="'. wp_get_attachment_image_url($img_id, 'resize-image-nuancier') .'" alt="'.$term->name.'" width="300" height="280" />';
        $html .= '</div>';  
        $html .= '<div class="cat_titre">';
        $html .= '<p>'.$term->name.'</p>';
        $html .= '<span></span>';
        $html .= '</div>'; 
        if(get_field('nuance_link', $acf_term_id)):
        $html .= '<a class="fulldiv" style="z-index: 5;" href="'. $teinte_page .'">Granit '. $term->name .'</a>';
        endif;      
        $html .= '</div>';
    }

    echo $html;
    die;
}


function load_nuancier($filtre, $all = ''){
    $args = array(
        'taxonomy' 		=> 'project_category',
        'child_of' 		=> 7,
        'hide_empty' 	=> false
    ); 
    
    $terms = get_terms( $args );
    $html = '';
    $dataFilter = '';
    foreach($terms as $term){
        $term_id = $term->term_id;
        $acf_term_id = 'project_category_' . $term_id;
        $img_id = get_field('nuance_thumb', $acf_term_id);
        $teinte_name = get_field('nuance_teinte', $acf_term_id);
        $couleur_name = get_field('couleur_granit', $acf_term_id);
        $provenance_name = get_field('provenance_du_granit', $acf_term_id);
        $teinte_page = get_field('nuance_link', $acf_term_id);

        if($all === 'data-all'){
            $dataFilter = $couleur_name;
        }
        if($all === 'all'){
            $dataFilter = $provenance_name;
        }
         

        if($filtre === $all):
            $html .= '<div class="cat_bloc" data-name="' . $term->name . '" data-filter="'.$teinte_name.'" data-couleur="'.$couleur_name.'" data-provenance="'.$provenance_name.'">';
            $html .= '<span class="forTheSearch" style="display:none">'. $term->name .'</span>';
            $html .= '<div class="cat_image">';
            $html .= '<img src="'. wp_get_attachment_image_url($img_id, 'resize-image-nuancier') .'" alt="'.$term->name.'" width="300" height="280" />';
            $html .= '</div>';  
            $html .= '<div class="cat_titre">';
            $html .= '<p>'.$term->name.'</p>';
            $html .= '<span></span>';
            $html .= '</div>'; 
            if(get_field('nuance_link', $acf_term_id)):
            $html .= '<a class="fulldiv" style="z-index: 5;" href="'. $teinte_page .'">Granit '. $term->name .'</a>';
            endif;      
            $html .= '</div>';
        endif;
        
        if($dataFilter === $filtre ):
            $html .= '<div class="cat_bloc" data-name="' . $term->name . '" data-filter="'.$teinte_name.'" data-couleur="'.$couleur_name.'" data-provenance="'.$provenance_name.'">';
            $html .= '<span class="forTheSearch" style="display:none">'. $term->name .'</span>';
            $html .= '<div class="cat_image">';
            $html .= '<img src="'. wp_get_attachment_image_url($img_id, 'resize-image-nuancier') .'" alt="'.$term->name.'" width="300" height="280" />';
            $html .= '</div>';  
            $html .= '<div class="cat_titre">';
            $html .= '<p>'.$term->name.'</p>';
            $html .= '<span></span>';
            $html .= '</div>'; 
            if(get_field('nuance_link', $acf_term_id)):
            $html .= '<a class="fulldiv" style="z-index: 5;" href="'. $teinte_page .'">Granit '. $term->name .'</a>';
            endif;      
            $html .= '</div>';
        endif; 
    }

    echo $html;
    die; 
}

//filtre par color
add_action('wp_ajax_nopriv_load_nuancier_percolor','load_nuancier_percolor');
add_action('wp_ajax_load_nuancier_percolor','load_nuancier_percolor');
function load_nuancier_percolor(){
    $color = $_GET['color'];
    load_nuancier($color, 'data-all');
}


//filtre par provenance
add_action('wp_ajax_nopriv_load_nuancier_perprovenance','load_nuancier_perprovenance');
add_action('wp_ajax_load_nuancier_perprovenance','load_nuancier_perprovenance');
function load_nuancier_perprovenance(){
    $provenance = $_GET['provenance'];
    load_nuancier($provenance, 'all');
}