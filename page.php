<?php get_header();
$mostrar_sidebar = get_option('facilius_mostrar_sidebar'); ?>

	<div class="row">
		<div class="<?php if($mostrar_sidebar){echo ' medium-4 ';} else{ echo "small-6 "; }  ?>  columns">

				<main class="columns mobilenpnm">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article>
						<header><?php
							if(get_option('facilius_breadcrumbpage')){breadcrumb_links();};
							facilius_page_title($post->ID);	
							facilius_metadata_post();			
							if(get_option('facilius_start_sharebar')) {facilius_compartir_post(); }
							facilius_ad_over_content();
							?>
						</header>
						<section>
							<?php the_content() ?>
							<?php facilius_next_page(); ?>
						</section>
						<footer>
							<?php facilius_compartir_post(); ?>
						</footer>
					</article>						
				<?php endwhile; else:?>
					<p>Al parecer no he agregado ningún post...</p>
				<?php endif; ?>	
					<?php comments_template(); ?>
				</main>
			</div>
			<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>
		
	</div>
<?php get_footer(); ?>