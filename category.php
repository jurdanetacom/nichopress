<?php get_header(); 


	$facilius_layout = get_option('category_post_layout') ? get_option('category_post_layout') : 'vertical'; 

	$facilius_description_position = get_option('facilius_posicion_descripcion') ? get_option('facilius_posicion_descripcion') : 'Antes';	

	$facilius_prefijo_categoria = get_option('facilius_prefijo_categoria') ? get_option('facilius_prefijo_categoria').' ' : ''; 

	$facilius_etiqueta_apertura_titulo = get_option('facilius_etiqueta_titulo') ? '<'.get_option('facilius_etiqueta_titulo').'>' : '<h1>'; 	

	$facilius_etiqueta_cierre_titulo = get_option('facilius_etiqueta_titulo') ? '</'.get_option('facilius_etiqueta_titulo').'>' : '</h1>';

	$mostrar_sidebar = get_option('facilius_mostrar_sidebar');

?>

	<div class="row">		

		<div class="archive infotitulocat index ">	
			<?php breadcrumb_links();?>
			<div id="titulo" class="small-6 columns mobilenpnm">

				<?php echo $facilius_etiqueta_apertura_titulo; echo $facilius_prefijo_categoria; single_cat_title(); echo $facilius_etiqueta_cierre_titulo; ?>

			</div>

			<?php 

			if(get_option('facilius_solo_primera_pagina')){

				if(!is_paged()){

					if ($facilius_description_position === 'Antes'){ ?>	

						<div id="descripcion-categoria" class="large-6 columns mobilenpnm">

							<?php echo stripcslashes(category_description()); ?>

						</div><?php 	

					} 

				} 

			} else {

				if ($facilius_description_position === 'Antes'){ ?>	

					<div id="descripcion-categoria" class="small-6 columns mobilenpnm">

						<?php echo stripcslashes(category_description()); ?>

					</div><?php  

				}

			} ?>			

			<div class="article-feed  <?php echo $facilius_content_align.$facilius_content_position.' '.$facilius_layout; ?>">			

				<div class="articulos <?php if($mostrar_sidebar){echo ' medium-4 ';} else{ echo"large-6 ";} ?> columns mobilenpnm <?php echo $facilius_ver_mas; ?>">

					<?php get_template_part('loop-'.$facilius_layout); ?>	

				</div>
				<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>

				<?php numeric_posts_nav(); ?>

			</div>

	

		</div><?php 

		if(get_option('facilius_solo_primera_pagina')){

			if(!is_paged()){

				if ($facilius_description_position === 'Despues'){ ?>	

					<div id="descripcion-categoria" class="large-6 columns mobilenpnm">

						<?php echo stripcslashes(category_description()); ?>

					</div><?php 	

				} 

			} 

		} else {

			if ($facilius_description_position === 'Despues'){ ?>	

				<div id="descripcion-categoria" class="large-6 columns mobilenpnm">

					<?php echo stripcslashes(category_description()); ?>

				</div><?php  

			}

		} ?>	
		
	</div>

<?php get_footer(); ?>

