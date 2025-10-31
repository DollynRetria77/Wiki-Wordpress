<?php


function capitaine_rewrite_url() {
    
    add_rewrite_tag( '%form_style%','([^&]+)');
    add_rewrite_tag( '%form_couleur%','([^&]+)');
    add_rewrite_tag( '%form_religion%' ,'([^&]+)');
    add_rewrite_tag( '%form_type%','([^&]+)');
    add_rewrite_tag( '%form_granit%','([^&]+)');
    add_rewrite_tag( '%form_prix%' ,'([^&]+)');

    add_rewrite_tag('%famille%', '([^&]+)');
    add_rewrite_tag('%choisir%', '([^&]+)');

    add_rewrite_tag('%provenance%', '([^&]+)');
    add_rewrite_tag('%couleur%', '([^&]+)');
    add_rewrite_tag('%qualite%', '([^&]+)');

    // page granit
    add_rewrite_rule('nos-granits/([^/]*)/?([^/]*)/?([^/]*)/?([^/]*)/?([^/]*)/?([^/]*)/?page/([0-9]{1,})/?', 
    'index.php?pagename=nos-granits&$matches[1]=$matches[2]&$matches[3]=$matches[4]&$matches[5]=$matches[6]&paged=$matches[7]', 
    'top' );

    add_rewrite_rule('nos-granits/([^/]*)/?([^/]*)/?([^/]*)/?([^/]*)/?([^/]*)/?([^/]*)/?', 
    'index.php?pagename=nos-granits&$matches[1]=$matches[2]&$matches[3]=$matches[4]&$matches[5]=$matches[6]', 
    'top' );
    //--page granit

    
    add_rewrite_rule(
      'catalogue/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/page/([0-9]{1,})/?',
      'index.php?pagename=catalogue&form_style=$matches[1]&form_couleur=$matches[2]&form_religion=$matches[3]&form_type=$matches[4]&form_granit=$matches[5]&form_prix=$matches[6]&paged=$matches[7]',
      'top'
    );

    add_rewrite_rule(
      'catalogue/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)',
      'index.php?pagename=catalogue&form_style=$matches[1]&form_couleur=$matches[2]&form_religion=$matches[3]&form_type=$matches[4]&form_granit=$matches[5]&form_prix=$matches[6]',
      'top'
    );

    add_rewrite_rule(
      'configurateur-famille/([^/]+)/([^/]+)',
      'index.php?pagename=configurateur-famille&famille=$matches[1]&choisir=$matches[2]',
      'top'
    );
}
add_action( 'init', 'capitaine_rewrite_url',10, 0  );



