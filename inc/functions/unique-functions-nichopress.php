<?php 
function get_facilius_posts_layout(){
	if(is_front_page()){
    	$facilius_layout = get_option('index_post_layout') ? get_option('index_post_layout') : 'vertical';
	} else {
		$facilius_layout = get_option('category_post_layout') ? get_option('category_post_layout') : 'vertical'; 		
	}
    return $facilius_layout;
}
function facilius_content_classes(){
    $facilius_layout_columns = get_facilius_posts_layout();
    $facilius_content_classes = '';
    if($facilius_layout_columns == 'horizontal' || $facilius_layout_columns == 'sin-imagen'){
        $facilius_content_classes .= 'medium-5 medium-centered';
    }
    $facilius_content_classes .= !is_single() && !is_page() ? ' '.get_facilius_posts_layout() : '';
    
    return $facilius_content_classes;
}
function facilius_insertar_loop_ad($iteracion){    
    $facilius_loop_ad_uno = get_option('facilius_loop_uno');
    $facilius_loop_ad_dos = get_option('facilius_loop_dos');
    $facilius_loop_ad_tres = get_option('facilius_loop_tres');
    
    if(($iteracion == $facilius_loop_ad_uno) && (get_option('facilius_codigo_loop_uno'))) { 
        echo '<div class="ad-inner-loop">'.stripcslashes(get_option('facilius_codigo_loop_uno')).'</div>'; 
    } 
    if(($iteracion == $facilius_loop_ad_dos) && (get_option('facilius_codigo_loop_dos'))) {
        echo '<div class="ad-inner-loop">'.stripcslashes(get_option('facilius_codigo_loop_dos')).'</div>'; 
    }
    if(($iteracion == $facilius_loop_ad_tres) && (get_option('facilius_codigo_loop_tres'))) {
        echo '<div class="ad-inner-loop">'.stripcslashes(get_option('facilius_codigo_loop_tres')).'</div>'; 
    }
}
?>