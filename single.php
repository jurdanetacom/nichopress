<?php get_header(); 
$mostrar_sidebar = get_option('facilius_mostrar_sidebar');  ?>
<div class="row">
	
	<main <?php if($mostrar_sidebar){ post_class('content medium-4 columns'); } else{ post_class('content columns');}  ?> >
		<?php  if (have_posts()) : while (have_posts()) : the_post();?>
		<article>
			<header><?php
				if(get_option('facilius_breadcrumbsingle')){ breadcrumb_links();};
				facilius_post_title(get_queried_object_id());	
				facilius_metadata_post();
				if(get_option('facilius_start_sharebar')){ facilius_compartir_post();  };
				facilius_ad_over_content();
				
			 	 ?>
			</header>
			<section>
				<?php the_content(); ?>

				<?php facilius_next_page(); ?>
			</section>
			<footer><?php
				
				facilius_ad_under_content();
				facilius_compartir_post(); ?>
			</footer>
		</article>
		<?php endwhile; endif; ?>	 
		<?php facilius_show_comments(); ?>
	</main>
	<?php if($mostrar_sidebar){ get_sidebar('nichopress');  }  ?>	
</div>
<?php
	if(!get_option('facilius_ocultar_post_relacionados')){ ?>
		<div id="related-posts">
			<?php facilius_related_posts($post->ID); ?>	
		</div>
	<?php }


 get_footer(); ?>