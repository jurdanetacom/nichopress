<aside class="sidebar large-6 columns">
	<?php 
	if (get_option('facilius_slot_seis')) {
        $adseis  = get_option('facilius_slot_seis');
        echo '<div class="adfooter">'.stripcslashes($adseis).'</div>';
    }
 	dynamic_sidebar( 'nicho-sidebar' ); 
    
     if (get_option('facilius_slot_siete')) {
        $adsiete  = get_option('facilius_slot_siete');
        echo '<div class="adfooter">'.stripcslashes($adsiete).'</div>';
    }
	?>
</aside>