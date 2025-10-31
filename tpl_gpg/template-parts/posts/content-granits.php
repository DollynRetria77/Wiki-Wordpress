
<?php
$Bsb4Design = new \BootstrapBasic4\Bsb4Design();

$nom_granit     = get_the_title();
$description    = get_the_content();
$featured_image = get_the_post_thumbnail(get_the_ID());
$image_granit   = get_field('image_granit', get_the_ID());
$lien_granit    = get_field('lien', get_the_ID());
$get_provenance = wp_get_post_terms( $post->ID, 'provenance_granit' );
$provenance = array_map(function($provenance_item){
    return $provenance_item->name;
},  $get_provenance);

$get_couleur = wp_get_post_terms( $post->ID, 'couleur_granit' ); 
$couleur     = array_map(function($couleur_item){
    return $couleur_item->name;
}, $get_couleur);

$couleur_slug = array_map(function($couleur_item){
    return $couleur_item->slug;
}, $get_couleur);

$get_durabilite = wp_get_post_terms( $post->ID, 'qualite_funeraire' ); 
$durabilite     = $get_durabilite[0]->slug;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="content-granits">
<div class="popin-granit <?php echo 'popin-granit_'.get_the_ID() ?>">
    <!-- <span class="btn-close"></span> -->
    <div class="left">
        <div class="image">
            <?php if( !empty( $image_granit ) ): ?>
                <img src="<?php echo esc_url($image_granit['url']); ?>" alt="<?php echo esc_attr($image_granit['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
    <div class="right">
        <h3 class="title">
            <?php echo $nom_granit; ?>
        </h3>
        <p class="origin">
            Provenance : <?php echo implode(', ', $provenance); ?>
        </p>
        <div class="colors">
            <p class="colors__desc">
                Couleur : 

                <span>
                <?php for($i=0; $i < count($couleur_slug); $i++): ?>
                    <span class="pallette <?php echo $couleur_slug[$i]; ?>"></span>
                <?php endfor; ?>
                </span>

                <?php echo implode(' / ', $couleur); ?>
            </p>
        </div>
        <div class="durable">
            <p>
                Qualité Funéraire : 
            </p>
            <?php if(!empty($durabilite)): ?>
            <div class="durable__wrap">
            <?php if ($durabilite == '1') { ?>
                <span class="star__orange"></span>
                <span class="star__grey"></span>
                <span class="star__grey"></span>   
                <span class="star__grey"></span>
                <span class="star__grey"></span>    
            <?php }else if ($durabilite == '2') { ?>    
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__grey"></span>
                <span class="star__grey"></span>
                <span class="star__grey"></span> 
            <?php }else if ($durabilite == '3') { ?>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__grey"></span>
                <span class="star__grey"></span>
            <?php } else if ($durabilite == '4') { ?>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__grey"></span>
            <?php } else if ($durabilite == '5') { ?>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
                <span class="star__orange"></span>
            <?php } ?>
            </div>
            <?php endif; ?>
        </div>
        
        <?php if($description): ?>
        <div class="description popin_description">
            <?php echo nl2br($description); ?>
        </div>
        <?php endif; ?>

        <div class="popin-granit__link">
            <a href="<?php echo configurateur_link_gpg($lien_granit); ?>" class="btn-popin">Personnaliser un monument</a>
        </div>
    </div>
</div>
</div>
</article>
<?php unset($Bsb4Design); ?>