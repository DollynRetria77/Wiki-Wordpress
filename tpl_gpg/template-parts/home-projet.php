<?php 
$bloc_projets = get_field('bloc_projet'); 
$titre_projet_personnalise = get_field('titre_projet_personnalise');
?>
<div class="bloc_projet" id="votre-projet-personnalise">
	<div class="container">
		<h2 class="title-h2"><?php echo $titre_projet_personnalise; ?></h2>

		<?php if(!empty($bloc_projets)) :
			$i = 1;

		?>
			<div class="project-content js-slick-md-perso">
				<?php foreach ($bloc_projets as $bloc_projet) : 
					$image_projet  = $bloc_projet['image_projet'];
					$phrase_intro  = $bloc_projet['phrase_intro'];
					//$size_p = "projet_personalise"; // (thumbnail, medium, large, full or custom size)

					$size_p = array(
						'size_desktop_large'   => 'projet_personalise_desktop_lage',
						'size_desktop'         => 'projet_personalise_desktop',
						'size_tablette'        => 'projet_personalise_tablette',
						'size_mobile'          => 'projet_personalise_mobile'
					);

					//$image_slide_p = wp_get_attachment_image_src( $image_projet, $size_p );

					//$image_slide_desktopLarge = wp_get_attachment_image_src( $image_projet, $size_p['size_desktop_large'] );
					$image_slide_desktopLarge = wp_get_attachment_image_src( $image_projet, 'full' );
					$image_slide_desktop = wp_get_attachment_image_src( $image_projet, $size_p['size_desktop'] );
					$image_slide_tablette = wp_get_attachment_image_src( $image_projet, $size_p['size_tablette'] );
					$image_slide_mobile = wp_get_attachment_image_src( $image_projet, $size_p['size_mobile'] );

					if(!empty($image_projet)) : 
					?>
					<div class="project-content__wrap">
						<div class="image_pr">
							<!-- <img src="<?php //echo $image_slide_p[0]; ?>" class="image_fond_pr" alt="<?php //echo !empty($phrase_intro) ? $phrase_intro : ''; ?>" width="<?php //echo $image_slide_p[1];  ?>" height="<?php //echo $image_slide_p[2];  ?>"> -->
							<img src="<?php echo $image_slide_desktopLarge[0]; ?>" width="<?php echo $image_slide_mobile[1]; ?>" height="<?php echo $image_slide_mobile[2]; ?>" alt="<?php echo !empty($phrase_intro) ? $phrase_intro : ''; ?>" class="image_fond_mn" />
						</div>
						<?php endif; ?>

						<div class="count">
							<span class="count__bloc">
								<span class="counter"><?php echo $i; ?> </span>
							</span>

							<?php $i++; 

							if(!empty($phrase_intro)) : 
							?>

							<span class="count__desc"><?php echo $phrase_intro; ?></span>

							<?php endif; ?>
						</div>
					</div>

				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

