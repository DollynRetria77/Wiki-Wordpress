<?php

/**
 *
 * Template name: Page catalogue
 * 
 * 
 */
get_header();?>
<?php
$entete_liste_catalogue = get_field('entete_liste_catalogue');
$titre_liste_catalogue = $entete_liste_catalogue['titre_liste_catalogue'];
$phrase_introductive_catalogue = $entete_liste_catalogue['phrase_introductive_catalogue'];
$titre_footer = $entete_liste_catalogue['titre_footer'];
$lien_du_bouton = $entete_liste_catalogue['lien_du_bouton'];
$les_intervalles_de_prix = get_field('les_intervalles_de_prix');
$lien_personnaliser_ce_monument = get_field('lien_personnaliser_ce_monument');

global $wp_query;


$select_style       = isset($wp_query->query_vars['form_style']) ? $wp_query->query_vars['form_style']: 'Style' ;
$select_couleur     = isset($wp_query->query_vars['form_couleur']) ? $wp_query->query_vars['form_couleur'] : 'Couleur';
$select_religion    = isset($wp_query->query_vars['form_religion']) ? $wp_query->query_vars['form_religion'] : 'Religion';
$select_type        = isset($wp_query->query_vars['form_type']) ? $wp_query->query_vars['form_type'] : 'Type';
$select_granit      = isset($wp_query->query_vars['form_granit']) ? $wp_query->query_vars['form_granit'] : 'Nuance';
$select_prix        = isset($wp_query->query_vars['form_prix']) ? $wp_query->query_vars['form_prix'] : 'Prix';


?>

<div class="container_catalogue">
    <div class="container_catalogue__wrap">
        <div class="page-baniere">
            <div class="breadcrumbs-wrapper">
                <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
            </div>
            <div class="page-title-subtitle">
                <?php if(!empty($titre_liste_catalogue)){ ?>
                <h1 class="header_title"><?php echo $titre_liste_catalogue; ?> </h1>
                <?php } ?>
                <?php if(!empty($phrase_introductive_catalogue)){ ?>
                <p class="header_phrase"><?php echo $phrase_introductive_catalogue; ?> </p>
                <?php } ?>
            </div>
        </div>
        
        <div class="overlay"></div>
        <span class="filter-close"></span>
        
        <div class="catalogue-filters">
        <form method="get" action="" id="form_monument">
            <span class="catalogue-filters__text">Filtrer</span>
            <div class="filtre_catalogue">

                <div class="style">
                <?php if($select_style !== 'Style'): ?>
                    <a href="javascript:void()" data-filter="Style" class="reset-filter-catalogue" id="reset-filter-style">X</a>
                <?php endif; ?>
                <span class="filter"><?php _e('Filtrer par Style','gpg'); ?></span>
                <?php 
                                  $args_c = array(
                                    'taxonomy' => 'style',
                                    'orderby'  => 'name',
                                    'order'    => 'ASC', 
                                    'parent'   => 0,
                                    'hide_empty' => false,
                                );

                                $html_cat = '';
                                $categories = get_terms($args_c);
                ?>

                <select id="style_select" class="select_style selectpicker clic_cat" name="form_style">
                    <?php 
                                    $html_cat .= '<span class="select-wrapper">';
                                    $html_cat .= "<option>Style </option>";      
                                    foreach ($categories as $key => $categorie) {
                                        $selected = ( $categorie->slug == $select_style) ? 'selected' : '';
                                        $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                    }
                                    echo $html_cat;
                    ?> 

                    </select>
                </div>
                <div class="couleur">
                <?php if($select_couleur !== 'Couleur'): ?>
                    <a href="javascript:void()" data-filter="Couleur" class="reset-filter-catalogue" id="reset-filter-couleur">X</a>
                <?php endif; ?>
                <span class="filter"><?php _e('Filtrer par Couleur','gpg'); ?></span>
                    <select id="select_couleur" class="select_couleur selectpicker clic_cat" name="form_couleur">
                    <?php 

                                    $args_c = array(
                                        'taxonomy' => 'couleur',
                                        'orderby'  => 'name',
                                        'order'    => 'ASC', 
                                        'parent'   => 0,
                                        'hide_empty' => false,
                                    );

                                    $html_cat = '';
                                    $categories = get_terms($args_c);
                                    $html_cat .= '<span class="select-wrapper">';
                                    $html_cat .= "<option>Couleur </option>";
                                    foreach ($categories as $key => $categorie) {
                                        $selected = ( $categorie->slug == $select_couleur) ? 'selected' : '';
                                        $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                    }
                                    echo $html_cat;
                    ?> 
                    </select>
                </div>
                <div class="religion">
                <?php if($select_religion !== 'Religion'): ?>
                    <a href="javascript:void()" data-filter="Religion" class="reset-filter-catalogue" id="reset-filter-religion">X</a>
                <?php endif; ?>
                <span class="filter"><?php _e('Filtrer par Religion','gpg'); ?></span>
                    <select id="select_religion" class="select_religion selectpicker clic_cat" name="form_religion">
                    <?php 

                                    $args_c = array(
                                        'taxonomy' => 'religion',
                                        'orderby'  => 'name',
                                        'order'    => 'ASC', 
                                        'parent'   => 0,
                                        'hide_empty' => false,
                                    );

                                    $html_cat = '';
                                    $categories = get_terms($args_c);
                                    $html_cat .= '<span class="select-wrapper">';
                                    $html_cat .= "<option>Religion </option>";
                                    foreach ($categories as $key => $categorie) {
                                        $selected = ( $categorie->slug == $select_religion) ? 'selected' : '';
                                        $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                    }
                                    echo $html_cat;
                    ?> 
                    </select>
                </div>
                <div class="type">
                <?php if($select_type !== 'Type'): ?>
                    <a href="javascript:void()" data-filter="Type" class="reset-filter-catalogue" id="reset-filter-type">X</a>
                <?php endif; ?>
                <span class="filter"><?php _e('Filtrer par Type','gpg'); ?></span>
                    <select id="select_type" class="select_type selectpicker clic_cat" name="form_type">
                    <?php 

                                    $args_c = array(
                                        'taxonomy' => 'type',
                                        'orderby'  => 'name',
                                        'order'    => 'ASC', 
                                        'parent'   => 0,
                                        'hide_empty' => false,
                                    );

                                    $html_cat = '';
                                    $categories = get_terms($args_c);
                                    $html_cat .= '<span class="select-wrapper">';
                                    $html_cat .= "<option>Type </option>";
                                    foreach ($categories as $key => $categorie) {
                                        $selected = ( $categorie->slug == $select_type) ? 'selected' : '';
                                        $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                    }
                                    echo $html_cat;
                    ?> 
                    </select>
                </div>
                <div class="granit">
                <?php if($select_granit !== 'Nuance'): ?>
                    <a href="javascript:void()" data-filter="Nuance" class="reset-filter-catalogue" id="reset-filter-nuance">X</a>
                <?php endif; ?>
                <span class="filter"><?php _e('Filtrer par Granit','gpg'); ?></span>
                    <select id="select_granit" class="select_granit selectpicker clic_cat" name="form_granit">
                    <?php 

                                    $args_c = array(
                                        'taxonomy' => 'project_category',
                                        'orderby'  => 'name',
                                        'order'    => 'ASC', 
                                        'hide_empty' => false,
                                    );

                                    $html_cat = '';
                                    $categories = get_terms($args_c);
                                    $html_cat .= '<span class="select-wrapper">';
                                    $html_cat .= "<option>Nuance </option>";
                                    foreach ($categories as $key => $categorie) {
                                        $selected = ( $categorie->slug == $select_granit) ? 'selected' : '';
                                        $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                    }
                                    echo $html_cat;
                    ?> 
                    </select>
                </div>
                <div class="prix">
                <?php if($select_prix !== 'Prix'): ?>
                    <a href="javascript:void()" data-filter="Prix" class="reset-filter-catalogue" id="reset-filter-prix">X</a>
                <?php endif; ?>
                <span class="filter"><?php _e('Filtrer par Prix','gpg'); ?></span> 
                    <select id="select_prix" class="select_prix selectpicker clic_cat" name="form_prix">

                    <?php           $html_cat = '';
                                    $html_cat .= "<option>Prix </option>";
                                    foreach ($les_intervalles_de_prix as $key => $intervalles_de_prix) {
                                        $array_content = $intervalles_de_prix['entrer_le_montant_a'].'-'.$intervalles_de_prix['entrer_le_montant_b'];
                                        $selected = ( $array_content == $select_prix) ? 'selected' : '';
                                        $html_cat .="<option value='{$array_content}' slug-cat='prix' {$selected}>{$intervalles_de_prix['entrer_le_montant_a']} € à {$intervalles_de_prix['entrer_le_montant_b']} €</option>";
                                    }
                                    echo $html_cat;
                    ?> 



                    </select>  
                </div>
                <div class="reinitialiser">
                    <?php if($select_style !== 'Style' || 
                             $select_couleur !== 'Couleur' ||
                             $select_religion !== 'Religion' || 
                             $select_type !== 'Type' || 
                             $select_granit !== 'Nuance' || 
                             $select_prix !== 'Prix'): ?>
                    <a href="javascript:void()" class="reset-filters" id="reset-filter-global">Réinitialiser</a>
                    <?php else: ?>
                    <a href="javascript:void()" onclick="return false" class="reset-filters disabled">Réinitialiser</a>
                    <?php endif; ?>
                </div>
            </form>
            </div>
        </div>


        <div class="content__catalogue">
            <div class="content__catalogue__wrap ajax_content">

            <?php
            $tax_query = array('relation' => 'AND');

                    if(isset($select_style) AND $select_style != 'Style'){
                    $tax_query[] = array(
                                                        'taxonomy' => 'style',
                                                        'field'    => 'slug',                      
                                                        'terms'    =>  $select_style,               
                                            );

                    }

                    if(isset($select_couleur)AND $select_couleur != 'Couleur'){
                    $tax_query[] = array(
                                                        'taxonomy' => 'couleur',
                                                        'field'    => 'slug',                      
                                                        'terms'    =>  $select_couleur,               
                                                        );

                    } 

                    if(isset($select_religion) AND $select_religion != 'Religion'){
                    $tax_query[] = array(
                                                        'taxonomy' => 'religion',
                                                        'field'    => 'slug',                      
                                                        'terms'    =>  $select_religion,  
                                                        );             

                    }

                    if(isset($select_type) AND $select_type != 'Type' ){
                    $tax_query[] = array(
                                                        'taxonomy' => 'type',
                                                        'field'    => 'slug',                      
                                                        'terms'    =>  $select_type,  
                                                        );            

                    }

                    if(isset($select_granit) AND $select_granit != 'Nuance'){
                    $tax_query[] =array(
                                                        'taxonomy' => 'project_category',
                                                        'field'    => 'slug',                      
                                                        'terms'    =>  $select_granit, 
                                                        );              


                    }

                    if(isset($select_prix) AND $select_prix != 'Prix' ){
                        $explod_s = str_replace('-',' ', $select_prix);
                        $convert_tables = explode(' ', $explod_s);
                        $interv_a = $convert_tables[0];
                        $interv_b = $convert_tables[1];
                        $meta_query[] = array(
                                                    'key'      => 'produit_nuances_$_prix',
                                                    'value'    => array($interv_a, $interv_b),
                                                    'type'     => 'NUMERIC', 
                                                    'compare'  => 'BETWEEN'
                                                );

                    }

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                $args = array('post_type'      => 'project',
                            'status'         => 'publish',
                            'posts_per_page' => 12,
                            'paged'          => $paged,
                            'order'          => 'DESC',
                            'tax_query'      => $tax_query
                            );


                if(isset($select_prix) AND $select_prix != 'Prix'){
                    $args['meta_query'] =  $meta_query;
                }

                $tax_query_filter = array_filter($tax_query, function($tax_query_item){
                    return $tax_query_item !== 'relation';
                }, ARRAY_FILTER_USE_KEY);


                $tax_query_extract = array_map(function($tax_query_item){
                    return $tax_query_item['taxonomy'];
                }, $tax_query_filter);
                
                $error_message = '<p>' . __( 'Il n\'y a pas de modèle de présentation correspondant à votre sélection sur notre site.', 'gpg') . '</p>';
                $the_query = new WP_Query($args);


                if(in_array("couleur", $tax_query_extract) || in_array("project_category", $tax_query_extract)){
                    if($the_query->found_posts === 0){
                        $error_message = '';
                        $error_message .= '<p>' .  __( 'Nous n\'avons pas de modèle de présentation correspondant à votre sélection sur notre site.', 'gpg') . '</p>';
                        $error_message .= '<p>' .  __( 'Néanmoins, tous nos modèles sont disponibles dans toutes les couleurs de granit sur notre configurateur.', 'gpg') . '</p>';
                        $error_message .= '<a href="' . esc_url(home_url('/')) . 'configurateur-famille/" class="btn_error_msg">' . __( 'Personnalisez votre monument', 'gpg') . '</a>' ;
                    }
                }

                if ( $the_query->have_posts() ):
                    while ( $the_query->have_posts() ): $the_query->the_post();
                    ?>
                    <div class="monument__slider__content">
                        <div class="monument__slider__content__item">
                            <?php
                                //$size_m = "bloc_monuments"; 
                                $size_m = array(
                                    'size_desktop_large'   => 'catalogue_desktop_large',
                                    'size_desktop'         => 'catalogue_desktop',
                                    'size_tablette'        => 'catalogue_tablette',
                                    'size_mobile'          => 'catalogue_mobile'
                                );



                                $image_id = get_post_meta(get_the_ID(), 'produit_image',true);
                                //$image_slide_m = wp_get_attachment_image_url( $image_id, $size_m );
                                //$image_slide_m_desktopLarge = wp_get_attachment_image_src( $image_id, $size_m['size_desktop_large'] );
                                $image_slide_m_desktopLarge = wp_get_attachment_image_src( $image_id, 'full' );
                                $image_slide_m_desktop = wp_get_attachment_image_src( $image_id, $size_m['size_desktop'] );
                                $image_slide_m_tablette = wp_get_attachment_image_src( $image_id, $size_m['size_tablette'] );
                                $image_slide_m_mobile = wp_get_attachment_image_src( $image_id, $size_m['size_mobile'] );

                                $apercu_link = get_permalink(get_the_ID());
                                $ajouter_le_lien_personalise = get_post_meta(get_the_ID(), '_custom_link_en_value_key', true );
                                $produit_nuances = get_field('produit_nuances');
                                foreach($produit_nuances as $produit_nuance){
                                        $prix = $produit_nuance['prix'];
                                }
                                                        $nuance_objs = get_the_terms(get_the_ID(), 'project_category' );

                                                            if($nuance_objs){
                                                                                $nuance_texture = [];
                                                                                foreach($nuance_objs as $nuance_obj){
                                                                                        $nuance_texture[] = $nuance_obj->name;
                                                                                }

                                                                                if(!empty($nuance_texture)){

                                                                                    $nuance = implode(", ",$nuance_texture);

                                                                                }else{
                                                                                    $nuance = __('non disponible', 'gpg');
                                                                                } 
                                                            }else{

                                                            $nuance = __('non disponible', 'gpg');
                                                            
                                                            }

                                ?>
                                <div class="image_slide_mn">
                                    <a href="<?php echo $apercu_link; ?>">
                                        <!-- <img src="<?php //echo $image_slide_m; ?>" class="image_fond_mn" alt="<?php echo get_the_title(); ?>"> -->
                                        <img srcset="<?php echo $image_slide_m_desktopLarge[0]; ?>" alt="<?php echo get_the_title(); ?>" />
                                    </a>
                                </div>

                                                    
                                <div class="wrap_footer_mn">
                                    <div class="footer__mn">

                                        <div class="titremn"><?php the_title(); ?></div>
                                        <div class="footer__mn__text">
                                            <span class="text_intro_a"><?php _e('À partir de ', 'gpg'); ?></span>
                                            <span class="prix_a"><?php echo number_format($prix, 0, '.', ' '); ?> €</span>
                                            <span class="lieu_a">en <?php echo $nuance ?></span>
                                        </div>

                                    </div>
                                <span class="footer_mn_link">
                                    <?php 													
                                        if(!empty($ajouter_le_lien_personalise)):
                                            $link_rel = configurateur_link_gpg($ajouter_le_lien_personalise);
                                        endif;                                                 
                                    ?>
                                    <a href="<?php echo $link_rel; ?>" class="link_custom">
                                            <span class="link_custom_sp">
                                                <?php echo _e('Personnaliser ce monument','gpg'); ?>
                                    </span>
                                    </a>
                                    </span>
                                </div>

                    </div>
                    </div>
                        <?php endwhile; 
                            wp_reset_query();
                    ?>
                            <div class="pagination-wrapper">
                                <?php 
                                $total_pages = $the_query->max_num_pages;

                                if ($total_pages > 1){

                                    $link_unescaped = get_pagenum_link( 1, false ); // esc=false so parse_url works.
                                    $url_components = wp_parse_url( $link_unescaped );
                                    $add_args       = array();
                                    
                                    if ( isset( $url_components['query'] ) ) {
                                        wp_parse_str( $url_components['query'], $add_args ); // $add_args is updated.
                                    }
                                    $current_page = max(1, get_query_var('paged'));
                                    
                                    echo paginate_links(array(
                                        'base' => strtok( $link_unescaped, '?' ) . '%_%',
                                        'format' => 'page/%#%',
                                        'current' => $current_page,
                                        'total' => $total_pages,
                                        'add_args'  => $add_args,
                                        'prev_text'    => __('Précédent'),
                                        'next_text'    => __('Suivant'),
                                    ));
                                }
                                ?>
                            </div>
                
                <?php else: ?>
            
                <div class="no-monument">
                    <?php //echo _e('Il n\'y a pas de monument correspondant à la sélection' ,'gpg'); ?>
                    <?php echo $error_message; ?>
                </div>
                <?php endif; ?>                

            </div> 
        </div>

        <div class="page__foot">
                <div class="page__foot__wrap">
                    <?php if(!empty($titre_footer)){ ?>
                    <h4 class="h4-title"><?php echo $titre_footer; ?> </h4>
                    <?php } ?>
                    <?php if(!empty($lien_du_bouton)){ ?>
                    <a href="<?php echo $lien_du_bouton; ?>" class="link"><?php _e('NOS GRANITS','gpg'); ?> </a>
                    <?php } ?>
                </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
