<?php get_header();
	$facilius_layout = get_option('category_post_layout') ? get_option('category_post_layout') : 'vertical';
	$mostrar_sidebar = get_option('facilius_mostrar_sidebar');
?>

	<div class="row">

		<div class="archive secciondos index mobilenpnm">			

			<div id="titulo" class="small-6 columns mobilenpnm">
				<?php breadcrumb_links();?>
				<h1><?php the_archive_title(); ?> </h1>

			</div>			

			<div id="descripcion-categoria" class="small-6 columns mobilenpnm">

				<?php echo stripcslashes(category_description()); ?>

			</div>			

			<div class="article-feed columns mobilenpnm <?php echo $facilius_layout; ?>">

				<div class="articulos <?php if($mostrar_sidebar){echo ' medium-4 columns';}else{ echo "small-6";} ?>  columns mobilenpnm <?php echo $facilius_ver_mas; ?>">

					<?php get_template_part('loop-'.$facilius_layout); ?>	

				</div>
				<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>				

				

			</div>

			
			<?php numeric_posts_nav(); ?>
		</div>

	</div>

<?php get_footer(); ?>

