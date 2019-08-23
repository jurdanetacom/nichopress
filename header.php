<!DOCTYPE html>
<html class="no-js" lang="es"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php facilius_head(); 
	wp_head();  ?>






</head>
<body <?php body_class(); ?> id="<?php echo get_stylesheet(); ?>">
	<?php facilius_facebook_appid(); ?>	
	<header class="headernav">
		<?php facilius_header(); facilius_ad_header(); ?>
	</header>
	<?php facilius_ad_under_header();
	if(get_option('facilius_mostrar_carrusel')){ facilius_carrusel_navegacion();} 
		?>
