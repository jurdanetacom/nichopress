<?php 
	$facilius_counter = 0; 
	$cat_id = get_query_var('cat');

if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="small-6 card">
		<header>
			<?php facilius_loop_title($post->ID, $cat_id); ?>
		</header>
		<section>
			<?php //the_excerpt('texto_resumen'); ?>
		</section>
		<footer><?php
		facilius_footer_loop();
		facilius_boton_ver_mas($post->ID); ?></footer>
	</article><?php 
	$facilius_counter++;
	facilius_insertar_loop_ad($facilius_counter);
endwhile; endif; ?>	