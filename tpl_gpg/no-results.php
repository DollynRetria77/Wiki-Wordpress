<?php
/**
 * Template no_result
 * 
 * 
 */
?>
<article id="post-0" class="post no-results not-found">
    <div class="page-no-results">
            <div class="page-baniere">
                <div class="breadcrumbs-wrapper">
                    <?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
                </div>
                <div class="page-title-subtitle">
                    <h1 class="header_title"><?php _e( 'Aucun résultat'); ?></h1>
                    <p class="header_phrase"><?php echo _e( 'Désolé, mais aucun résultat ne convient à vos critères de recherche. Veuillez réessayer avec d\'autres mots-clés.'); ?> </p>
                </div>
            </div>
         <div class="content_search_wrapper">
            <div class="form_search form-search-item">
                <span class="title_search title_label"><?php _e('Rechercher dans les actualités', 'gpg'); ?></span>
                            <?php echo get_form_search_post(); ?>
            </div>
        </div>
    </div>
</article><!-- #post-0 -->