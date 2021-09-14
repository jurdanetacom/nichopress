<?php
require_once( trailingslashit( get_template_directory() ) . 'inc/facilius.php'); 
require_once( trailingslashit( get_template_directory() ) . 'inc/funciones.php'); 
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer-nichopress.php');
if(get_option('facilius_mostrar_carrusel')){
    require_once( trailingslashit( get_template_directory() ) . 'inc/facilius-carrusel.php'); 
}
if(get_option('facilius_mostrar_sidebar')){
    require_once( trailingslashit( get_template_directory() ) . 'inc/nichopress-sidebar.php'); 
}

function facilius_theme_updater() {
    require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'facilius_theme_updater' );


?>