<?php

	$facilius_n_comments = get_option('facilius_ncomments') ? get_option('facilius_ncomments') : 30; 

	$facilius_tipo_comentarios = get_option('facilius_tipo_comentarios') ? get_option('facilius_tipo_comentarios') : 'Wordpress';

	$facilius_ocultar_avatares = get_option('facilius_ocultar_avatares') ? ' wo-avatares' : '';

	if ($facilius_tipo_comentarios == 'Facebook' && get_option('facilius_facebook_app_id')) : ?>



<div class="comentarios">

	<div class="fb-comments" data-href="<?php echo get_the_permalink(); ?>" data-numposts="<?php echo $facilius_n_comments; ?>"></div>

</div>

	

<?php else: ?>



<div class="wp-comentarios<?php echo $facilius_ocultar_avatares;?>">

	<?php if (post_password_required()) : ?>

		<p><?php _e( 'Publicación protegida con contraseña. Ingrese la contraseña para ver los comentarios.', 'facilius' ); ?></p>

	</div>

	<?php return; endif; ?>



		<?php if (have_comments()) : ?>



			<h2><?php comments_number(); ?></h2>



			<ul>

				<?php wp_list_comments('type=comment&callback=facilius_comments&per_page='.$facilius_n_comments); ?>

			</ul>



		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>



			<p><?php _e( 'Comentarios cerrados.', 'facilius' ); ?></p>



		<?php endif; ?>



	<?php comment_form(); ?>



</div>



<?php endif ?>

