<?php get_header(); ?>

	<div class="row">
		<div class="index small-6 columns">
			<div class="large-5 large-centered columns">
			<h1>Error 404!</h1>
			<h2>Loque buscas no está aqui. </h2>
			<p>Intenta buscando <a href="<?php bloginfo('home_url'); ?>">en el blog</a></p>
			<h2>También te puede interesar:</h2>
			<?php 
			$the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '10' ) );

			if ( $the_query->have_posts() ) {
				echo '<ul class="cuatrocerocuatro">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';
				}
				echo '</ul>';
			} 
			
			wp_reset_postdata(); ?>
			</div>
			

		</div>
	</div>
<?php get_footer(); ?>
