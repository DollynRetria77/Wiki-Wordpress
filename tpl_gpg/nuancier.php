<?php /* Template Name: Nuancier */ ?>

<?php get_header();
$teintes_array = array();
$couleurs_array = array();
$provenances_array = array();
$terms = get_terms( array(
	'taxonomy' => 'project_category',
	'child_of' => 7,
	'hide_empty' => false,  ) );
foreach($terms as $term){
	$term_id = $term->term_id;
	$acf_term_id = 'project_category_' . $term_id;
	$teinte_name = get_field('nuance_teinte', $acf_term_id);
    array_push($teintes_array, $teinte_name);
    $couleur_name = get_field('couleur_granit', $acf_term_id);
    array_push($couleurs_array, $couleur_name);
    $provenance_name = get_field('provenance_du_granit', $acf_term_id);
    array_push($provenances_array, $provenance_name);
}
$teintes = array_unique($teintes_array);
$teintes_ok = array_filter($teintes);
$couleurs = array_unique($couleurs_array);
$couleurs_ok = array_filter($couleurs);
$provenances = array_unique($provenances_array);
$provenances_ok = array_filter($provenances);
?>


<?php 
	$entete_dela_page 	= get_field('entete_page');   
	$titre_entete 		= $entete_dela_page['titre'];
	$texte_intro_entete = $entete_dela_page['texte_introduction'];
	$description 	 	= get_field('description');
?>
<div class="page-baniere">
	<div class="breadcrumbs-wrapper">
		<?php echo do_shortcode( '[flexy_breadcrumb]'); ?> 
	</div>

	<div class="page-title-subtitle">
		<?php if(!empty($titre_entete)): ?>
		<h1><?php echo $titre_entete; ?></h1>
		<?php endif; ?>
		<?php if(!empty($texte_intro_entete)): ?>
		<?php echo $texte_intro_entete; ?>
		<?php endif; ?>
	</div>

</div>


<div class="container-fluid page-container page-nuancier">

		<?php if(!empty($description)): ?>
		<div class="content_description">
			<?php echo $description; ?>
		</div>
		<?php endif; ?>

		<!-- block form search -->
		<div class="content_search_nuancier">
				<!-- filtre par nom -->
				<div class="content_search_item search-per-name">
					<div class="form-group">
						<label for="filterName">Filtrer par nom</label>
						<div class="search_field">
							<input type="search" class="form-control" id="filterName" placeholder="Ex : Bararp">
							<button type="submit" class="button_search btn btn-outline icon-awesome-search" id="button_search_pername"></button>
						</div>
					</div>
				</div>

				<!-- filtre par couleur -->
				<div class="content_search_item search-per-color">
					<div class="form-group">
						<label for="filterColor">Couleur du granit</label>
						<select class="selectpicker" id="filterColor">
							<option value="data-all" selected>Toutes</option>
							<option value="Blanc">Blanc</option>
							<option value="Gris">Gris</option>
							<option value="Vert">Vert</option>
							<option value="Bleu">Bleu</option>
							<option value="Violet">Violet</option>
							<option value="Rose">Rose</option>
							<option value="Rouge">Rouge</option>
							<option value="Orange">Orange</option>
							<option value="Noir">Noir</option>
						</select>
					</div>
				</div>

				<!-- filtre par provenances -->
				<div class="content_search_item search-per-provenances">
					<div class="form-group">
						<label for="selectProvenance">Provenances</label>
						<select class="selectpicker" id="selectProvenance">
							<option value="all" selected>Toutes</option>
							<option value="France">France</option>
							<option value="Inde">Inde</option>
							<option value="Brésil">Brésil</option>
							<option value="Afrique du Sud">Afrique du Sud</option>
							<option value="Chine">Chine</option>
							<option value="Norvège">Norvège</option>
							<option value="Suède">Suède</option>
							<option value="Finlande">Finlande</option>
						</select>
					</div>
				</div>
		</div>
		<!--/ block form search -->

		<div class="lesNuances" id="lesNuances">
			<?php
			$terms = get_terms(array(
				'taxonomy' 		=> 'project_category',
				'child_of' 		=> 7,
				'hide_empty' 	=> false,  
			));

			foreach($terms as $term){
				$term_id = $term->term_id;
				$acf_term_id = 'project_category_' . $term_id;
				$img_id = get_field('nuance_thumb', $acf_term_id);
				$teinte_name = get_field('nuance_teinte', $acf_term_id);
                $couleur_name = get_field('couleur_granit', $acf_term_id);
                $provenance_name = get_field('provenance_du_granit', $acf_term_id);
				$teinte_page = get_field('nuance_link', $acf_term_id);
				?>
	            <div class="cat_bloc" data-name="<?php echo $term->name; ?>" data-filter="<?php echo $teinte_name; ?>" data-couleur="<?php echo $couleur_name; ?>" data-provenance="<?php echo $provenance_name; ?>">
	            	<span class="forTheSearch" style="display: none;"><?php echo $term->name; ?></span>
	              <div class="cat_image">
	              	<img src="<?php echo wp_get_attachment_image_url($img_id, 'resize-image-nuancier'); ?>" alt="<?php echo $term->name; ?>" width="300" height="280">
	              </div><!-- .cat_image -->

	              <div class="cat_titre">
	                <p><?php echo $term->name; ?></p>
	                <span></span>
	              </div><!-- .cat_titre -->
				<?php if(get_field('nuance_link', $acf_term_id)) { ?><a class="fulldiv" style="z-index: 5;" href="<?php echo $teinte_page; ?>">Granit <?php echo $term->name; ?></a><?php } ?>
	            </div><!-- .cat_bloc -->
			<?php } ?>
		</div><!-- .lesGranits -->
</div>
<?php get_footer();

