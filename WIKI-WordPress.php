<?php
/*====================================================================================*/
/*======= CHARGEMENT ARTICLES PAR DEFAUT WordPress : Post Types : "post" ============*/
/*===================================================================================*/
/*=============================*/
@template utilisé : home.php
/*============================*/
//recuperation de tous les termes [exp: dans taxonomy category  (taxonomy par defaut du post type 'post'), il y a (gestion, informatique, tourisme)]

 /*$uncategorized_name = get_term_by( 'slug', 'non-classe', 'category' );
 $arguments = array('exclude' => array($uncategorized_name->term_id));
$category = get_terms( array('taxonomy' => 'category', 'hide_empty' => false, 'exclude' => $arguments) ); 
echo '<pre>';
print_r($category);
echo '</pre>';
foreach($category as $category_item):
	echo $category_item->name;
endforeach; */

$uncategorized_name = get_term_by( 'slug', 'uncategorized', 'category' );
$args = array('exclude' => array($uncategorized_name->term_id));
$category = get_terms( array( 'category', 'sport'), $args ); 

//listing term avec liens
<ul class="nav nav-pills">
<?php foreach($category as $category_item): ?>
	<li class="nav-item">
		<a href="<?php echo get_term_link($category_item) ?>" class="nav-link <?php echo  is_tax('sport', $category_item->term_id) ? 'active' : '' ?>"><?php echo $category_item->name ?></a>
	</li>
<?php endforeach; ?>
</ul>

//listing de tout les articles
if( have_posts() ):				
	while( have_posts() ): the_post(); 
	<div class="entry-content">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php the_terms(get_the_ID(), 'category'); ?>
	</div>
	endwhile;			
endif;   

//Afficher (lister) tous les articles associé à un term (exp: gestion) de la taxonomie (taxonomie par defaut articles) 'category'
/*=============================*/
@templates utilisé : category.php
/*============================*/
<?php $term =  get_queried_object()?; >
<h2><?php echo $term->name; //nom du term ?></h2>
if( have_posts() ):				
	while( have_posts() ): the_post(); 
	<div class="entry-content">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</div>
	endwhile;			
endif;  

//Afficher (lister) tous les articles associé à un term (exp: foot-ball) de la taxonomie AUTRE QUE 'category' (taxonomie par defaut articles)
//NB: pour rajouter une autre taxonomie dans le post type 'post' : 
/*function montheme_init(){
    register_taxonomy('sport', 'post', array(
        'labels' => array(
            'name'          => 'Sport',
            'singular_name' => 'Sport',
            'plural_name'   => 'Sports',
            'search_items'  => 'Rechercher des sports',
            'all_items'     => 'Tous les sports',
            'edit_item'     => 'Editer le sport',
            'update_item'   => 'Mettre à jour le sport',
            'add_new_item'  => 'Ajouter un nouveau sport',
            'new_item_name' => 'Ajouter un nouveau sport',
            'menu_item'     => 'Sport'

        ),
        'show_in_rest' => true, 
        'hierarchical' => true,
        'show_admin_column' => true
    ));
}
add_action('init', 'montheme_init');*/

/*
@templates utilisé : taxonomy.php
*/
<?php $term =  get_queried_object()?; >
<h2><?php echo $term->name; //nom du term ?></h2>
if( have_posts() ):				
	while( have_posts() ): the_post(); 
	<div class="entry-content">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</div>
	endwhile;			
endif;

//Pour afficher la page detail d'un article par defaut
/*============================*/
@template utilisé : single-post.php
/*============================*/
if (have_posts()) :
	while (have_posts()) : the_post();
	    <h1><?php the_title(); ?></h1>
        <p>
            <img src="<?php the_post_thumbnail_url() ?>" alt="" style="max-width: 100%"/>
        </p>
        <?php the_content(); ?>
		
		
		        <h2>Articles relatifs :</h2>

        <div class="row">
        <?php 
            //$sports = get_the_terms(get_post(), 'sport');
            //$sports = get_the_terms(get_the_ID(), 'sport');
			//mitovy ian na par id na par get_post()
			//echo $sports[0]->slug; die();
            $sports = array_map(function($term){
                return $term->term_id;
            }, get_the_terms(get_post(), 'sport'));
            //echo "<pre>";
			//var_dump($sports); 
			//echo "</pre>";
			//die();
                
            $query = new WP_Query([
                'post__not_in' => array(get_the_ID()),
                'post_type' => 'post',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'sport',
                        //'field' => 'slug',
                        'terms' => $sports //foot iany
                    )
                )
            ]);
            //var_dump($query->get_posts());

            while($query->have_posts()) : $query->the_post();
            ?>
            <div class="col-sm-4 test">
                <?php get_template_part('parts/card', 'post'); ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>

        </div>
		
    endwhile; 
else :
    <h1>Pas darticles</h1>
endif;

/*====================================================================================*/
/*=================== TAXONOMIE (CATEGORIE) =====================*/
/*===================================================================================*/
//Maka ny term(item) rehetra anaty categorie
$tax_terms = get_terms('categorie', array('hide_empty' => 0, 'orderby' => 'name', 'order' => 'ASC',  'parent' =>0));

//Maka item anah categorie
<?php foreach($tax_terms as $tax_term): ?>
	echo $tax_term->name
<?php endforeach; ?>

//Maka term (item) iray anaty categorie
$termItem = get_term('id', 'nom de la taxonomie')
exp : $vente = get_term(7, 'categorie');
<a href="<?php echo get_term_link($vente->term_id); ?>">VOIR +</a>

//--------------------------------------------------------------------
categorie.php
$args = array(
    'category' => single_cat_title( '', false ),
    'is_paged' => true,
    'paged' => $paged,
    'post_type' => 'produit',
    'posts_per_page' => 4
);
$loop = new WP_Query($args);

<h2><?php echo single_cat_title( '', false ); ?></h2>

<?php if ($loop->have_posts()) : ?>
     <?php while($loop->have_posts()) : $loop->the_post();?>
	 
	    <?php 
            if ( has_post_thumbnail() ) {
				//the_post_thumbnail();
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large');
				echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '"/>';
			}
		?>
	 
	 <?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>
//-------------------------------------------------------------
archive.php

$term = $wp_query->queried_object;
$args = array(
	'tax_query' => array(
		array(
			'taxonomy' => 'categorie',
			'field' => 'slug',
			'terms' => array($term->slug)
		),
	),
	'is_paged' => true,
	'paged' => $paged,
	'post_type' => 'produit',
	'posts_per_page' => 4
);
$loop = new WP_Query($args);
?>
<?php if ( $loop->have_posts() ) : ?>
<?php while ( $loop->have_posts() ) : $loop->the_post();?>
//--------------------------------------------------------------------
//---------------------------------------------------------------------------
//Miparcours post par categorie ou item anah categorie
$args = array(
	'tax_query' => array(
		array(
			'taxonomy' => 'categorie',
			'field' => 'slug',
			'terms' => $etablissement /*une term ou array de term 'slug'*/
		),
	),
	'is_paged' => true,
	'paged' => $paged,
	'post_type' => 'etablissement',
	'posts_per_page' => 10
);
$loop = new WP_Query($args);

if ( $loop->have_posts() ) : ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	

			<a href="<?php the_permalink() ?>">
				<?php 
					if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail');
					}
					if($large_image_url){
						echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '"/>';
					}
				?>
			</a>
<?php wp_reset_postdata(); ?>
<?php endwhile; ?>
<?php endif; ?>	



/*====================================================================================*/
/*=================== LA BOUCLE WORDPRESS ET LES TEMPLATES TAGS =====================*/
/*===================================================================================*/
/*=======================================*/
@template utilisé : page.php ou single.php
/*=======================================*/
$tplUri = get_template_directory_uri();
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<h2 class="title-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-content">
			<?php the_content(); ?>
		</div>			
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-img text-center mt-4 mb-4">
				<?php
					//the_post_thumbnail();
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
					echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '"/>';
				?>
			</div>
		<?php endif; ?>
		
		<div>
		<?php the_excerpt(); ?>
		</div
    <?php endwhile; ?>
<?php endif; ?>

/*
*@Other boucle :
*/
$args = array('post_type' => 'xxx', 'posts_per_page' => 10, 'post_status' => 'publish');
$loop = new WP_Query( $args );
if ($loop->have_posts()) :
while($loop->have_posts()) : $loop->the_post();
	<h4 class="title-h4"><?php the_title(); ?></h4>
	<?php the_content(); ?>
endwhile; 
endif; 
//--------------------------------------------------------------------------------
$args = array('posts_per_page'   => 10, 'post_type' => 'volaille', 'post_status' => 'publish', 'order' => 'ASC', 'suppress_filters' => true);
$post = query_posts( $args ); 
if (have_posts()) : 
while (have_posts()) : the_post();
	if ( has_post_thumbnail() ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large');
	}
	if($large_image_url){
		echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '"/>';
	}
endwhile; wp_reset_query();
endif;
//--------------------------------------------------------------------------------
query_posts( "page_id=149" );
if (have_posts()) :
while (have_posts()) : the_post(); 
the_title(); 
the_content();
endwhile; wp_reset_query();
endif; 
//--------------------------------------------------------------------------------
/*Si c'est dans une page*/
$args = array('posts_per_page' => 3, 'post_type' => 'page', 'post__not_in' => array(156),'post_parent' => 154,'post_status' => 'publish','suppress_filters' => true );
$post = query_posts( $args ); 
//-------------
$args = array('posts_per_page' => 4, 'post_type'  => 'page',/*'post__in' => array(7, 9, 11),*/'post_parent'=> 88,'post_status' => 'publish','order' => 'ASC','suppress_filters' => true);
$post = query_posts( $args );
//----------------- 
/*Si c'est dans une categorie*/
$args = array('posts_per_page'=> 3,'post_type'=> 'product','category'=> 'les-modeles','post_status' => 'publish','suppress_filters' => true );
$post = query_posts( $args ); 
/*avoir une page par objet*/
$post = get_post(156);
echo $post->post_title;
//-------------------------------
/*Dans une archive - Dans une archive */
$term = $wp_query->queried_object;
$args = array(
	'is_paged' => true,
	'post_type' => 'volaille',
	'posts_per_page' => 4,
	'paged' => $paged
);
$loop = new WP_Query($args);
while($loop->have_posts()) : $loop->the_post();
	if ( has_post_thumbnail() ) {
		//the_post_thumbnail();
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large');
		echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '"/>';
	}
endwhile; wp_reset_postdata();
/*Liste des templates tags les plus utilisés*/
<?php 
the_title();
the_content();
the_post_thumbnail();
the_excerpt();
the_category();
the_tags();
the_author();
the_author_link();
the_date();
the_time();
the_permalink();
comment_number();
get_avatar();
?>

/*
* RECUPERATION SIMPLE DES CONTENUS DUNE PAGE || n'importe où dans le template:
*/
<?php
	$post = get_post(get_the_ID());
	setup_postdata($post);
	the_title(); //titre
	the_content(); //contenu
	wp_reset_postdata();
?>

<?php 
	$post = get_post(13); 
	setup_postdata($post);
?>
<div class="row">
	<div class="col-12 services-txt">
		<h3 class="title-h3"><?php the_title(); ?></h3>
		<?php the_content();  ?>
	</div
	
	<div class="the-best-img-mobile">
		<?php 
			if ( has_post_thumbnail() ) :
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large');
			endif;
			if($large_image_url):
				echo '<img src="' . $large_image_url[0] . '" alt="' . get_the_title() . '"/>';
			endif;
		?>
	</div>
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink(); ?>" class="read-more">Read more <i class="fas fa-arrow-alt-left"></i></a>
</div>
<?php wp_reset_postdata(); ?>

/*====================================================================================*/
/*======================= AUTRES FONCTIONNALITE A ARRANGER ==========================*/
/*===================================================================================*/
<?php 
	$post = get_post( $post_id );
	$slug = $post->post_name;
?>
<form action="<?php echo esc_url( home_url( '/' . $slug ) ); ?>">

/*pagination*/
<div class="row">
	<div class="large-12 columns">
		<div class="pagination">
			<?php 
				$big = 999999999; // need an unlikely integer
				
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $loop->max_num_pages
				) );
			?>
		</div>
	</div>
</div>
G:\DisqueD\KANDRA_SAUVEGARDE\KandraBackup\DOCUMENT WORDPRESS\PROJET VITA\WP_nde-immo\wp-content\themes\nde-immo

//function ilaina
if ( ! function_exists( 'the_excerpt_max_charlength' ) ) {
	function the_excerpt_max_charlength($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '...';
		} else {
			echo $excerpt;
		}
	}
}
if ( ! function_exists( 'truncate_txt' ) ) {
	function truncate_txt($excerpt = '', $charlength = 250) {
		$charlength++;
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '...';
		} else {
			echo $excerpt;
		}
	}
}

if ( ! function_exists( 'truncate_simple_txt' ) ) {
	function truncate_simple_txt($text, $chars = 25) {
		$text = $text." ";
		$text = substr($text,0,$chars);
		$text = substr($text,0,strrpos($text,' '));
		$text = $text."...";
		return $text;
	}
}

/*===================================================================*/
/*======================= Functions utiles ==========================*/
/*===================================================================*/
function montheme_menu_class($classes){
    // echo '<pre>';
    // var_dump(func_get_args());
    // echo '</pre>';
    // die();
    $classes[] = 'nav-item';
    return $classes;

}
add_filter('nav_menu_css_class', 'montheme_menu_class');