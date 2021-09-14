<?php get_header(); ?>

<?php 

	  $facilius_layout = get_option('index_post_layout') ? get_option('index_post_layout') : 'vertical' ; 
	  $mostrar_sidebar = get_option('facilius_mostrar_sidebar'); ?>

	<div class="row">

		<div class="archive secciondos index <?php if($mostrar_sidebar){echo $facilius_layout.' medium-4 ';} else{ echo $facilius_layout."small-6 "; }  ?>  columns mobilenpnm">

			

			<div id="titulo" class="large-6 columns mobilenpnm">

				<h1><?php single_tag_title(); ?></h1>

			</div>			

			<div id="descripcion-categoria" class="large-6 columns mobilenpnm">

				<?php echo tag_description(); ?>

			</div>



			<div class="articulos small-6 columns mobilenpnm <?php echo $facilius_layout; ?>">

				<?php get_template_part('loop-'.$facilius_layout); ?>	

				<?php numeric_posts_nav(); ?>

			</div>


		</div>
		<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>

	</div>

<?php get_footer(); ?>

