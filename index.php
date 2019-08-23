<?php get_header(); 
    $facilius_layout = get_facilius_posts_layout();
	$mostrar_sidebar = get_option('facilius_mostrar_sidebar');
?>	


<div class="row">
	<div class="content <?php echo facilius_content_classes(); if($mostrar_sidebar){echo ' medium-4 ';} ?> columns "><?php 		
		facilius_descripcion_inicio_antes(); ?>
		<div class="articulos">	
			<?php get_template_part('loop-'.$facilius_layout); ?>
		</div><?php 
		facilius_descripcion_inicio_despues();
		?>
	</div>
	<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>
</div>
<?php numeric_posts_nav(); ?> 	
<?php get_footer(); ?>