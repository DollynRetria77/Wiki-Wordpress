<?php 
$titre_monument = get_field('titre_monument');
$bloc_monuments = get_field('bloc_monuments');
?>
<div class="monument__inc" id="nos-monuments-incontournables">

		<h2 class="title-h2"><?php echo $titre_monument; ?></h2> 
		<div class="monument__slider">

		<?php if ( !empty( $bloc_monuments ) ) : 
			foreach ( $bloc_monuments as $monument ) : ?> 
			<div class="monument__slider__content">
					<div class="monument__slider__content__item">
								<?php if (!empty($monument)) :

										$monument_id = $monument->ID;
										
										$args = array(
												'post_type' => 'project',
												'post_status' => 'publish',
												'p' => $monument_id,
											);

										$my_posts = new WP_Query($args);  
										if($my_posts->have_posts()) : 

												while ( $my_posts->have_posts() ) : $my_posts->the_post();
													//$size_m = "bloc_monuments"; 
													$size_m = array(
														'size_desktop_large'   => 'bloc_monuments_desktop_large',
														'size_desktop'         => 'bloc_monuments_desktop',
														'size_tablette'        => 'bloc_monuments_tablette',
														'size_mobile'          => 'bloc_monuments_mobile'
													);



													$image_id = get_post_meta(get_the_ID(), 'produit_image',true);
													
													//$image_slide_m = wp_get_attachment_image_url( $image_id, $size_m );

													//$image_slide_desktopLarge = wp_get_attachment_image_src( $image_id, $size_m['size_desktop_large'] );
													$image_slide_desktopLarge = wp_get_attachment_image_src( $image_id, 'full' );
													$image_slide_desktop = wp_get_attachment_image_src( $image_id, $size_m['size_desktop'] );
													$image_slide_tablette = wp_get_attachment_image_src( $image_id, $size_m['size_tablette'] );
													$image_slide_mobile = wp_get_attachment_image_src( $image_id, $size_m['size_mobile'] );
													
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
														<!-- <img src="<?php //echo $image_slide_m; ?>" alt="<?php //the_title(); ?>" class="image_fond_mn" width="411" height="290" /> -->
														<img src="<?php echo $image_slide_desktopLarge[0]; ?>" alt="<?php the_title(); ?>" class="image_fond_mn" />
													</a>
												</div>

											
												<div class="wrap_footer_mn">
													<div class="footer_mn">
															<div class="titremn"><?php the_title(); ?></div>
															<div class="footer_mn_text">
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
														<!-- <a href="<?php //echo $ajouter_le_lien_personalise; ?>" class="link_custom"> -->
															<span class="link_custom_sp">
																<?php echo _e('Personnaliser ce monument','gpg'); ?>
															</span>
														</a>
													</span>
												</div>
												<?php
												endwhile; //end the while loop
												wp_reset_query();
										endif; // end of the loop. 					        

								endif; ?>
					</div>
				</div>  
			<?php 
			endforeach; 

		endif;
	?>
		</div>

</div>
