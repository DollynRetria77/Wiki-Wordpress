<?php
/* Function custom_logo */
add_post_type_support( 'page', 'excerpt' );
function gpg_custom_logo_setup() {
    $defaults = array(
        // 'height'      => 100,
        // 'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
	add_theme_support( 'custom-logo', $defaults );
    add_theme_support( 'post-thumbnails' );
    
    //add_image_size('nos_actualite_img', 415, 270);
    add_image_size('nos_actualite_desktop_large', 411, 270, true);
    add_image_size('nos_actualite_desktop', 335, 270, true);
    add_image_size('nos_actualite_tablette', 307, 232, true);
    add_image_size('nos_actualite_mobile', 394, 200, true);

    //add_image_size('hp_slider_slider', 936, 660,true);
    add_image_size('hp_slider_desktop_large', 936, 660, true);
    add_image_size('hp_slider_desktop', 688, 480, true);
    add_image_size('hp_slider_tablette', 900, 621, true);
    add_image_size('hp_slider_mobile', 575, 401, true);

    //add_image_size('bloc_monuments', 411, 290,true);
    add_image_size('bloc_monuments_desktop_large', 396, 288, true);
    add_image_size('bloc_monuments_desktop', 340, 240, true);
    add_image_size('bloc_monuments_tablette', 228, 166, true);
    add_image_size('bloc_monuments_mobile', 372, 270, true);

    //add_image_size('projet_personalise', 396, 300,true);
    add_image_size('projet_personalise_desktop_lage', 368, 279,true);
    add_image_size('projet_personalise_desktop', 288, 218,true);
    add_image_size('projet_personalise_tablette', 375, 208,true);
    add_image_size('projet_personalise_mobile', 342, 260,true);

    add_image_size('pre_footer_logo', 32, 32,true);
    add_image_size('img_article', 1440, 570,true);
    add_image_size('search_actualite', 420, 270);
    add_image_size('monument_image', 420, 270,true);

    //image size qui_somme_nous
    add_image_size('notre_savoir_faire_desktop_large', 847, 481,true);
    add_image_size('notre_savoir_faire_desktop', 407, 203,true);
    add_image_size('notre_savoir_faire_tablette', 847, 481,true);
    add_image_size('notre_savoir_faire_mobile', 374, 212,true);

    add_image_size('notre_equipe_desktop_large', 847, 460,true);
    add_image_size('notre_equipe_desktop', 615, 335,true);
    add_image_size('notre_equipe_tablette', 407, 221,true);
    add_image_size('notre_equipe_mobile', 374, 204,true);

    add_image_size('qsn_nos_partenaires', 268, 271,true);


    add_image_size('nos_engagements_desktop_large', 847, 612,true);
    add_image_size('nos_engagements_desktop', 615, 445,true);
    add_image_size('nos_engagements_tablette', 407, 294,true);
    add_image_size('nos_engagements_mobile', 374, 270,true);
    //--image size qui_somme_nous
    
    //page catalogue
    add_image_size('catalogue_desktop_large', 408, 296,true);
    add_image_size('catalogue_desktop', 328, 238,true);
    add_image_size('catalogue_tablette', 308, 224,true);
    add_image_size('catalogue_mobile', 374, 272,true);

    //fiche produit
    add_image_size('monument_image_desktop_large', 1034, 752, true);
    add_image_size('monument_image_desktop', 840, 612, true);
    add_image_size('monument_image_tablette', 492, 358, true);
    add_image_size('monument_image_mobile', 374, 272, true);

    //page conseil (actu)
    add_image_size('conseil_desktop_large', 395, 270,true);
    add_image_size('conseil_desktop', 280, 305,true);
    add_image_size('conseil_tablette', 372, 248,true);
    add_image_size('conseil_mobile', 374, 250,true);
}
add_action( 'after_setup_theme', 'gpg_custom_logo_setup' );


/* Activate Nav menu Option */
function gpg_register_nav_menu() {
	register_nav_menus(array(
        'gpg_granit' => 'Footer menu (GPG Granit)',
        'notre_catalogue' => 'Footer menu (Notre catalogue)',
        'a_propos' => 'Footer menu (A propos)'
    ));
}
add_action( 'after_setup_theme','gpg_register_nav_menu');


/* Function custom_logo */
function gpg_posted(){
    $posted_on = ucwords(get_the_date("F Y"));
    $texte_publish = __('Publié en ', 'gpg');
    $output = '';
    if(!empty($posted_on)){
        $output .="<p class='date_aricle'>".$texte_publish.$posted_on."</p>";
        echo $output;
    }
}



function gpg_share_this($content)
{
    global $post;

    if (is_single() && $post->post_type != "project") {
        $content .= '<div class="sunset-sharethis">'.__('Partager cet article','gpg').'</div>';

        $title = get_the_title();
        $permalink = get_permalink();
        $site = get_bloginfo( 'name' );
        $facebook_svg = get_stylesheet_directory().'assets/src/image/sprites/svg/Path.svg';

        $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink;

        
        $content .= '<ul class ="share_social">';
        $content .= '<li class="s_facebook"><a href="'.$facebook.'" target="_blank" rel="nofollow">facebook</a></li>';
        $content .='<li class="s_linkedin"><a href="https://www.linkedin.com/cws/share?url='.$permalink.'" target="_blank" rel="nofollow">linkedin</a></li>';
        //$content .='<li class="s_mail"><a href="mailto:adresse%20email?subject=Objet%20du%20mail%20'.$site.'&body=Titre : '.$title.' %0D%0A Lien : '.$permalink.'" title="Email to a friend/colleague" target="_blank">Email</a></li>';
        $content .='<li class="s_mail"><a href="mailto:adresse%20email?subject=GPG%20Granit%20-%20'.$title.'&body='.$title.'%0D%0A'.$permalink.'" title="Email to a friend/colleague" target="_blank">Email</a></li>';
        $content .= '<li class="s_link"><input type="hidden" value='.$permalink.' id="boutonclick"><span class="clickboard" title="copie">link</span></li>';

        $content .= '</ul></div><!-- .gpg share -->';

        return $content;
    } else {
        return $content;
    }
}
add_filter('the_content', 'gpg_share_this');


//search form page article
function get_form_search_post(){

                   $output  = '<form role="search" method="get" action="'.home_url( '/' ).'">';
                   $output .= '<div class="search_button">';
                   $output .= '<input autocomplete="off" type="search" class="form-control" placeholder="Rechercher" value="'. get_search_query().'" name="s" title="Search" />';
                   $output .= '<input type="hidden" name="post_type" value="post" id="post_type" />';
                   $output .= '<button type="submit" class="button_search btn btn-outline icon-awesome-search" id="searchsubmit" />';
                   //$output .= esc_attr__( 'Rechercher' );
                   $output .= '</button>';
                   $output .= '</div>';
                   $output .= '</form>';
                   return $output;
}

//search global
function get_form_search_global(){
    $output  = '<form role="search" method="get" action="'.home_url( '/' ).'">';
    $output .= '<div class="search_button">';
    $output .= '<input autocomplete="off" type="search" class="form-control" placeholder="Rechercher" value="'. get_search_query().'" name="s" title="Search" />';
    $output .= '<button type="submit" class="button_search btn btn-outline icon-awesome-search" id="searchsubmit" />';
    //$output .= esc_attr__( 'Rechercher' );
    $output .= '</button>';
    $output .= '</div>';
    $output .= '</form>';
    return $output;
}

function get_form_search_project(){

                   $output  = '<form role="search" method="get" action="'.home_url( '/' ).'">';
                   $output .= '<div class="search_button">';
                   $output .= '<input type="search" class="form-control" placeholder="Rechercher" value="'. get_search_query().'" name="s" title="Search" />';
                   $output .= '<input type="hidden" name="post_type" value="project" id="post_type" />';
                   $output .= '<button type="submit" class="button_search btn btn-outline icon-awesome-search" id="searchsubmit" />';
                   //$output .= esc_attr__( 'Rechercher' );
                   $output .= '</button>';
                   $output .= '</div>';
                   $output .= '</form>';
                   return $output;
}


add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title('TOUS LES ARTICLES DE LA CATÉGORIE : ', false );

    }

    return $title;

});

/**
 * Modify the main query on the posts index or category 
 * page. Set posts per page to 2.
 *
 * @param object $query
 */
function wpse_modify_home_category_query( $query ) {

    // Only apply to the main loop on the frontend.
    if ( is_admin() || ! $query->is_main_query()) {
        return false;
    } 

    // Check we're on a posts or category page.
    if ( $query->is_home() || $query->is_category() ) {
        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'wpse_modify_home_category_query' );



add_filter( 'post_link', 'remove_parent_cats_from_link', 10, 3 );
function remove_parent_cats_from_link( $permalink, $post, $leavename ){

    if($post->post_type == 'post' && $post->post_type != 'project'){

    $cats = get_the_category( $post->ID );
    if ( $cats ) {
        // Make sure we use the same start cat as the permalink generator
        // what happens now actually is the opposite,
        // we end up using the latest category that has a parent
        usort( $cats, '_usort_terms_by_ID' ); // order by ID

        foreach( $cats as $cat ) {

          if ( $cat->parent ) {
              // If there are parent categories, collect them and pick the top most
              $parentcats = explode(" ",get_category_parents( $cat, false, ' ', true ));
              $topcat = $parentcats[0];

          } else {
              $topcat = $cat->slug;
          }
        }
    }
    $page_for_posts = get_option( 'page_for_posts' );
    $page_object = get_post(intval($page_for_posts ));
    $page_slug = $page_object->post_name;

    //$permalink = home_url()."/".$page_slug."_sur/".$topcat."/".$post->post_name;
    $permalink = home_url()."/".$page_slug."/".$topcat."/".$post->post_name;
    return $permalink;
   }
}

/*stop update plugin arial file flexy*/

function disable_plugin_updates_flexy( $value ) {
  if ( isset($value) && is_object($value) ) {
    if ( isset( $value->response['flexy-breadcrumb/flexy-breadcrumb.php'] ) ) {
      unset( $value->response['flexy-breadcrumb/flexy-breadcrumb.php'] );
    }
  }
  return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates_flexy' );



//filtre searche faq
function searchfilter_faq($query) {
    if ($query->is_search && !is_admin() ) {
        if(isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
                if($type == 'project') {
                    $query->set('post_type',array('project'));
                }
        }       
    }
return $query;
}

function project_include_templates( $template_path ) {
    if ( 'project' === get_post_type() || 'project' === get_query_var('post_type') ) {
       
        if ( is_search() ) {

            if( !have_posts() ) {
                   $template_path = locate_template('no-results-project.php'); 
                }else{
                   $template_path = locate_template('search-project.php');
                } 
        }
    }

    return $template_path;
}
add_filter( 'template_include', 'project_include_templates', 999, 1 );

function my_posts_where( $where ) {
    $where = str_replace("meta_key = 'produit_nuances_$", "meta_key LIKE 'produit_nuances_%", $where);
    return $where;
}
add_filter('posts_where', 'my_posts_where');


add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);

 function prefix_disable_gutenberg($gutenberg_filter, $post_type)
  {
   if ($post_type === 'project' || $post_type === 'page') return false;
   return $gutenberg_filter;
  }


  add_action('wp_print_scripts', function () {
    if(!is_page_template('tpl-page-contact.php')){
		wp_dequeue_script( 'google-recaptcha' );
		wp_dequeue_script( 'wpcf7-recaptcha' );
    }
});

function gpg_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'gpg_mime_types' );

//extraction du lien du bouton personnaliser ce monument
function configurateur_link_gpg($link){
    $famille = '';
    $choisir = '';
    $links = explode('/', $link);
    if($links[count($links) - 1] == 'customize'){
        $famille = $links[count($links) - 3];
        $choisir = $links[count($links) - 2];
    }else{
        $famille = $links[count($links) - 3];
        $choisir = $links[count($links) - 1];
    }
    $link_rel = site_url('/configurateur-famille/' . $famille . '/' . $choisir. '/');
    return $link_rel;
}
