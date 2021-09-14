<?php 
	$facilius_counter = 0; 
	$cat_id = get_query_var('cat');

if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" class="card vertical articuloblogfeed">
			<header>
				
				<div class="entry-image">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php if(has_post_thumbnail()){ ?> 
						<?php $attachment_id = get_post_thumbnail_id( $post->ID);?>
							<img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'featured-thumbnail-x-large' ); ?>"
								srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'featured-thumbnail-x-large' ); ?>"
								sizes="<?php echo wp_get_attachment_image_sizes( $attachment_id, 'featured-thumbnail-x-large' ); ?>" />
							<?php }
							else{
								echo '<img src="'.get_template_directory_uri().'/img/facilius-img-placeholder.jpg" >';
							} ?>	
					</a>
				</div>

	
			</header>
			<section class="entry-title">
								<?php facilius_loop_title($post->ID, $cat_id); ?>
			</section>
			<footer class="entry-footer">
				<?php facilius_footer_loop(); ?>			
				<?php facilius_boton_ver_mas($post->ID); ?>
			</footer>	
		
	</article><?php 
	$facilius_counter++;
	facilius_insertar_loop_ad($facilius_counter);
endwhile; endif; ?>	

