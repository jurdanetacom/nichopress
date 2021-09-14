<?php 
	$facilius_counter = 0; 
	$cat_id = get_query_var('cat');

if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="row horizontal card">
		<div class="entry-image small-2 columns">
			<a href="<?php echo get_the_permalink(); ?>">
		<?php if(has_post_thumbnail()) :
			the_post_thumbnail('featured-thumbnail-vertical');				
			  endif; ?>		
			  </a>	
		</div>	
		<section class="small-4 columns">	
			<?php facilius_loop_title($post->ID, $cat_id); ?>
			<?php //the_excerpt('texto_resumen'); 			
			?>
		<footer>
			<?php facilius_footer_loop();
			facilius_boton_ver_mas($post->ID);  ?>	
		</footer>	

		</section>

	</article><?php 
	$facilius_counter++;
	facilius_insertar_loop_ad($facilius_counter);

endwhile; endif; ?>	