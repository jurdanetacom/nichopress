<?php 
	$facilius_counter = 0; 
	$cat_id = get_query_var('cat');

if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="small-6">
		<header>
			<?php if(has_post_thumbnail()) : ?> 
			<div class="entry-image"><?php the_post_thumbnail('featured-thumbnail-x-large'); ?></div>					
			<?php endif; ?>	
			<?php facilius_loop_title($post->ID, $cat_id); ?>
		</header>
		<section>
			<?php the_excerpt('texto_resumen'); ?>
		</section>
		<footer><?php facilius_boton_ver_mas($post->ID); ?></footer>	
	</article><?php 
	$facilius_counter++;
	facilius_insertar_loop_ad($facilius_counter);
endwhile; endif; ?>	