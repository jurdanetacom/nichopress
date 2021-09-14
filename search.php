<?php get_header(); 	  

	$facilius_layout = get_option('category_post_layout') ? get_option('category_post_layout') : 'vertical'; 
	$mostrar_sidebar = get_option('facilius_mostrar_sidebar'); 

?>



	<div class="row">

		<div class="secciondos <?php if($mostrar_sidebar){echo $facilius_layout.' medium-4 ';} else{ echo $facilius_layout."small-6 "; }  ?> columns mobilenpnm">	



			<?php if (get_option('facilius_breadcrumbpage')){ breadcrumb_links(); } ?>

			

			<h1><?php echo sprintf( __( '%s Resultado(s) de busqueda para ', 'nichopress' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>	

			<div class="articulos columns mobilenpn medium-8<?php echo $facilius_content_align.$facilius_content_position.' '; ?>">

				<?php get_template_part('loop-'.$facilius_layout); ?>	

			</div>			

			
		</div>			
		<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>
	</div>

<?php get_footer(); ?>