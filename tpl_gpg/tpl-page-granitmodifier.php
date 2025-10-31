<?php
/**
 *
 * Template name: Page granitsss
 * 
 * 
 */
get_header();?>
    <body class="page-nos-granit">
        <div class="container__granit">
            <div class="page-baniere">
                <div class="breadcrumbs-wrapper">
                    <?php echo do_shortcode( '[flexy_breadcrumb]'); ?>    
                </div>
                <div class="page-title-subtitle">
                    <h1 class="header_title">NOS CONSEILS ET ACTUALITÉS </h1>
                    <p class="header_phrase"></p><p>Découvrez nos conseils pour vous guider dans le choix et l'entretien d'un monument funéraire ou cinéraire</p>
                </div>
            </div>

            <div class="overlay"></div>
            <span class="filter-close"></span>
            <span class="filter__granit">Filtrer</span>

            <div class="granit__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="granit__sidebar">
                            <div class="provenance">
                                <h3 class="filter__title">
                                    Provenance
                                </h3>
                                <?php
                                $args_c = array(
                                            'taxonomy' => 'provenance_granit',
                                            'parent'   => 0,
                                            'hide_empty' => false,
                                        );
                                        $html_cat = '';
                                        $categories = get_terms($args_c);
                                        // echo '<pre>';
                                        // print_r($categories);
                                        // echo '</pre>';
                                ?>
                                <p class="filter__subtitle">
                                    Selectionner la provenance du granit
                                </p>

                                <div class="provenance__filter">
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <!-- <input type="checkbox" name="provenance[]" value="toutes" /> -->
                                            <input type="checkbox" id="Toutes" checked>
                                            <label for="Toutes">Toutes</label>
                                        </div>
                                    </div>
                                    
                                    <?php foreach($categories as $key => $categorie): ?>
                                    <?php 
                                        $html_cat .= '<div class="provenance__list">';
                                        $html_cat .= '<div class="provenance-check">';
                                        $html_cat .= '<span class="flag">';
                                        $html_cat .= '<img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">';
                                        $html_cat .= '</span>';
                                        $html_cat .= '<input type="checkbox" name="provenance[]" value="'. $categorie->slug .'" id="'. $categorie->slug .'">';
                                        $html_cat .=  '<label for="'. $categorie->slug .'">'. $categorie->name .'</label>';
                                        $html_cat .= '</span>';
                                        $html_cat .= '</div>';
                                        $html_cat .= '</div>';
                                    ?>
                                    <?php endforeach; echo $html_cat; ?>

                                    <!-- <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="France">
                                            <label for="France">France</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Inde">
                                            <label for="Inde">Inde</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Brésil">
                                            <label for="Brésil">Brésil</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Afrique du Sud">
                                            <label for="Afrique du Sud">Afrique du Sud</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Chine">
                                            <label for="Chine">Chine</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Norvège">
                                            <label for="Norvège">Norvège</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Suède">
                                            <label for="Suède">Suède</label>
                                        </div>
                                    </div>
                                    <div class="provenance__list">
                                        <div class="provenance-check">
                                            <span class="flag">
                                                <img src="assets/src/images/sprites/svg/fr.svg" alt="" width="25" height="25">
                                            </span>
                                            <input type="checkbox" id="Finlande">
                                            <label for="Finlande">Finlande</label>
                                        </div>
                                    </div> -->
                                    
                                    <?php      
                                        /*$args_c = array(
                                            'taxonomy' => 'provenance_granit',
                                            'orderby'  => 'name',
                                            'order'    => 'ASC', 
                                            'parent'   => 0,
                                            'hide_empty' => false,
                                        );

                                        $html_provenance = '';
                                        $provenances = get_terms($args_c);
                                    
                                        foreach ($provenances as $key => $provenance) {
                                            $html_provenance .= '<li class="provenance__list">';
                                            $html_provenance .= '<a href="" class="provenance__item">';
                                            //$selected = ( $categorie->slug == $select_couleur) ? 'selected' : '';
                                            $html_provenance .=$provenance->name;
                                            $html_provenance .="</a>";
                                            $html_provenance .="</li>";
                                            
                                            // $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                        }
                                        echo $html_provenance;*/
                                    ?>
                              
                                </div>
                            </div>

                            <div class="couleur">
                                <h3 class="filter__title">
                                    Couleur du granit
                                </h3>
                                <p class="filter__subtitle">
                                    Selectionner une couleur
                                </p>

                                <div class="couleur__filter">
                                    <div class="couleur__list">
                                        <div class="color-check white">
                                            <input type="checkbox" id="white">
                                            <label for="white">Blanc</label>
                                        </div>
                                    </div>

                                    <div class="couleur__list">
                                        <div class="color-check gris">
                                            <input type="checkbox" id="gris">
                                            <label for="gris">Gris</label>
                                        </div>
                                    </div>

                                    <div class="couleur__list">
                                        <div class="color-check vert">
                                            <input type="checkbox" id="vert">
                                            <label for="vert">Vert</label>
                                        </div>
                                    </div>

                                    <div class="couleur__list">
                                        <div class="color-check bleu">
                                            <input type="checkbox" id="bleu">
                                            <label for="bleu">Bleu</label>
                                        </div>
                                    </div>

                                    <div class="couleur__list">
                                        <div class="color-check violet">
                                            <input type="checkbox" id="violet">
                                            <label for="violet">Violet</label>
                                        </div>
                                    </div>

                                    <div class="couleur__list">
                                        <div class="color-check rose">
                                            <input type="checkbox" id="rose">
                                            <label for="rose">Rose</label>
                                        </div>
                                    </div>
                                </div>
                                    
                                <?php      
                                    /*$args_c = array(
                                        'taxonomy' => 'couleur_granit',
                                        'orderby'  => 'name',
                                        'order'    => 'ASC', 
                                        'parent'   => 0,
                                        'hide_empty' => false,
                                    );

                                    $html_couleur = '';
                                    $couleurs = get_terms($args_c);
                                
                                    foreach ($couleurs as $key => $couleur) {
                                        $html_couleur .= '<li class="couleur__list">';
                                        $html_couleur .= '<a href="" class="couleur__item">';
                                        //$selected = ( $categorie->slug == $select_couleur) ? 'selected' : '';
                                        $html_couleur .="<span class='{$couleur->slug} pallete'></span>";
                                        $html_couleur .=$couleur->name;
                                        $html_couleur .="</a>";
                                        $html_couleur .="</li>";
                                        
                                        // $html_cat .="<option value='{$categorie->slug}' slug-cat='{$categorie->taxonomy}' {$selected}>{$categorie->name}</option>";
                                    }
                                    echo $html_couleur;
                                    */
                                ?> 
                                

                                <div id="loadMore">
                                    <button class="btn more">Afficher plus</button>
                                </div>
                                <div id="showLess">
                                    <button class="btn less">Afficher moins</button>
                                </div>
                            </div>

                            <div class="star">
                                <h3 class="filter__title">
                                    Durabilite
                                </h3>
                                <p class="filter__subtitle">
                                    Selectionner la durabilite du granit
                                </p>

                                <ul class="star__list">                                        
                                        <li class="star__item">
                                            <span class="star__orange"></span>
                                            <span class="star__orange"></span>
                                            <span class="star__orange"></span>
                                        </li>   
                                        <li class="star__item">
                                            <span class="star__orange"></span>
                                            <span class="star__orange"></span>
                                            <span class="star__grey"></span>
                                        </li>                       
                                        <li class="star__item">
                                            <span class="star__orange"></span>
                                            <span class="star__grey"></span>
                                            <span class="star__grey"></span>
                                        </li>                         
                                </ul>
                            </div>

                            <div class="refresh-links">
                                <a href="" class="view-link">Voir les Resultats</a>
                                <span class="refresh"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <h2 class="results__title">
                            Les résultats de votre sélection
                        </h2>
                        <ul class="granit__liste">
                        <?php 
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                            $args = array('post_type'      => 'granits',
                                        'status'         => 'publish',
                                        'posts_per_page' => 9,
                                        'paged'          => $paged,
                                        'order'          => 'DESC',
                                       // 'tax_query'      => $tax_query
                                        );
                                        $the_query = new WP_Query($args);

                        if ( $the_query->have_posts() ):
                            while ( $the_query->have_posts() ): $the_query->the_post();

                            
                            $nom_granit = get_post_meta(get_the_ID(), 'nom_du_granit', true);
                            $lien_granit = get_post_meta(get_the_ID(), 'lien', true);

                            $get_durabilite = wp_get_post_terms( $post->ID, 'durabilite_granit' ); 
                            $durabilite = $get_durabilite[0]->slug;

                            $get_provenance = wp_get_post_terms( $post->ID, 'provenance_granit' ); 
                            $provenance = $get_provenance[0]->name;

                            $get_couleur = wp_get_post_terms( $post->ID, 'couleur_granit' ); 
                            $couleur = $get_couleur[0]->name;

                            $image = get_field('image_granit');

                            $description = apply_filters('the_content', get_post_field('post_content', get_the_ID()));


                        ?>
                            <li class="granit__item">
                                <div class="granit__wrap">
                                    <div class="image">
                                    <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="desc">
                                        <p class="title"><?php the_title(); ?></p>
                                        <div class="granit__link">
                                            <button class="link <?php echo 'link_'.get_the_ID() ?>" id="post_id" value='<?php echo get_the_ID() ?>'>
                                                Decouvrir ce granit
                                            </button>     
                                        </div>
                                        <div class="durable">
                                            <p>
                                                Durabilite
                                            </p>
                                            <?php 
                                            if ($durabilite == '1') {
                                                ?>
                                            <div class="durable__wrap">
                                                <span class="star__orange"></span>
                                                <span class="star__grey"></span>
                                                <span class="star__grey"></span>
                                            </div><?php
                                            }
                                            else if ($durabilite == '2') {
                                                ?><div class="durable__wrap">
                                                <span class="star__orange"></span>
                                                <span class="star__orange"></span>
                                                <span class="star__grey"></span>
                                            </div><?php
                                            }
                                            else {
                                                ?><div class="durable__wrap">
                                                <span class="star__orange"></span>
                                                <span class="star__orange"></span>
                                                <span class="star__orange"></span>
                                            </div><?php 
                                            }
                                             ?>                  
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="popin-granit <?php echo 'popin-granit_'.get_the_ID() ?>" style='display:none;'>
                                    <span class="btn-close"></span>
                                    <div class="left">
                                        <div class="image">
                                            <?php if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <h3 class="title">
                                            <?php the_title(); ?>
                                        </h3>
                                        <div class="colors">
                                            <span class="pallette bleu"></span>
                                            <span class="pallette rose"></span>
                                            <p class="colors__desc"><?php echo $couleur; ?></p>
                                        </div>
                                        <p class="origin">
                                            Provenance - <?php echo $provenance ?>
                                        </p>

                                        <div class="durable">
                                            <p>
                                                Durabilite
                                            </p>
                                            <?php 
                                                if ($durabilite == '1') {
                                                    ?>
                                                    <div class="durable__wrap">
                                                        <span class="star__orange"></span>
                                                        <span class="star__grey"></span>
                                                        <span class="star__grey"></span>
                                                    </div><?php
                                                }
                                                else if ($durabilite == '2') {
                                                    ?><div class="durable__wrap">
                                                    <span class="star__orange"></span>
                                                    <span class="star__orange"></span>
                                                    <span class="star__grey"></span>
                                                    </div><?php
                                                }
                                                else {
                                                    ?><div class="durable__wrap">
                                                    <span class="star__orange"></span>
                                                    <span class="star__orange"></span>
                                                    <span class="star__orange"></span>
                                                </div><?php 
                                                }
                                            ?>
                                        </div>
                                        <p class="description">
                                            <?php echo $description; ?>
                                        </p>

                                        <div class="popin-granit__link">
                                            <a href="<?php echo $lien_granit; ?>" class="btn-popin"> Personnaliser ce monument</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php
                            endwhile; 
                        endif;
                        ?>
                        </ul>

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
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php  get_footer(); ?>
</html>
