	<footer class="footer">

		<div class="row">

			<div class="footermenu large-6 columns">
				<?php  get_sidebar();  ?>

				<nav class="navfooter">

					<?php facilius_nav('footer-menu'); ?>

				</nav>

				<?php if ( get_option( 'footer-logo' ) ){ ?>

					<div class="small-6 small-centered columns logo">

						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img src='<?php echo get_option('footer-logo'); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

					</div>

				<?php } 

				if (!get_option('facilius_ocultar_redes_footer')){ ?>

				<ul class="redes">

				<?php if (get_option('facilius_facebook')) { ?>

					<li><a href="<?php echo get_option('facilius_facebook'); ?>" target="_blank" class="icon-facebook"></a></li>

				<?php } ?>

				<?php if (get_option('facilius_instagram')) { ?>

					<li><a href="<?php echo get_option('facilius_instagram'); ?>" target="_blank" class="icon-instagram"></a></li>

				<?php } ?>

				<?php if (get_option('facilius_twitter')) { ?>

					<li><a href="<?php echo get_option('facilius_twitter'); ?>" target="_blank" class="icon-twitter"></a></li>

				<?php } ?>

				</ul>

				<?php }?>

				<?php if (get_option('facilius_textofooter')) {

					$facilius_texto_footer  = get_option('facilius_textofooter'); ?>			  

					<p><?php echo stripcslashes($facilius_texto_footer); ?></p>

				<?php }?>

			</div>

		</div>

	</footer> 

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" ></script>

	<script>
	  WebFont.load({

	    google: {
			<?php 
			
	$fuentes = get_option('facilius_cargar_fuentes');
	$cargarfuentes = explode('|',$fuentes);
			if($fuentes){

				echo "families: ["; foreach($cargarfuentes as $fuente){ echo  "'".str_replace('+',' ',$fuente)."',"; } echo "]";
				//echo "families: ['".str_replace('+',' ',$cargarfuentes[0])."','".str_replace('+',' ',$cargarfuentes[1])."']";
			}else{
				echo "families: ['Baloo Bhai', 'Montserrat']";
			}
			 ?>
	      

	    }

	  });

	</script>

  <?php wp_footer(); ?>

</body>

</html>

</html>