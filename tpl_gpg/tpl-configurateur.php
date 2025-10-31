<?php

/**
 *
 * Template name: Page configuraueur
 * 
 * 
 */
get_header();
global $wp_query;
//print_r($wp_query->query_vars);
//$link= isset($wp_query->query_vars['link']) ? $wp_query->query_vars['link']: 'https://config3d.extranet.gpggranit.com/famille/CA102194' ;
//print_r($link);
$links = '';
$famille = $wp_query->query_vars['famille'];
$choisir = $wp_query->query_vars['choisir'];

if((isset($famille) && !empty($famille)) && (isset($choisir) && !empty($choisir))){
    if(preg_match("/^[0-9]+$/", $choisir)){
        $links = "https://config3d.extranet.gpggranit.com/famille/" . $famille . "/" . $choisir . "/customize";
    }else{
        $links = "https://config3d.extranet.gpggranit.com/famille/" . $famille . "/choisir/" . $choisir;
    }
}else{
    $links = "https://config3d.extranet.gpggranit.com/famille/CA102194";
}

// $famille = $link= isset($wp_query->query_vars['famille']) ? $wp_query->query_vars['famille']: '' ;
// $choisir = $link= isset($wp_query->query_vars['choisir']) ? $wp_query->query_vars['choisir']: '' ;
?>
<div class="page-configurateur">
    <iframe id="configurateur" src="<?php echo $links; ?>" width="100%" height="100%"></iframe>
</div>
<?php get_footer(); ?>