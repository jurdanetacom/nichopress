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