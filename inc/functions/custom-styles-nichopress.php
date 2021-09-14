<?php 
function facilius_colores(){
    
    $nichopress = get_theme_mod( 'nichopress');

    $body_background = get_option('body_background');

    if($nichopress['header_bg_style'] === 'degradado'){

        $primer_header_background = get_option('header_background') ? get_option('header_background') : '';

        $segundo_header_background = isset($nichopress['segundo_header_background']) ? $nichopress['segundo_header_background'] : '';

        $header_background = 'linear-gradient(to right, '.$primer_header_background.', '.$segundo_header_background.')';

    } else {

        $header_background = get_option('header_background') ? get_option('header_background') : '';        

    }


    $footer_background = get_option('footer_background');
    $footer_text_color = get_option('footer_text_color');

    $primary_color = get_option('primary_color');

    $secondary_color = get_option('secondary_color');

    $header_border = get_option('header_border') ? get_option('header_border') : '';

    $footer_border = get_option('footer_border') ? get_option('footer_border') : $primary_color;

   // $header_menu_background = get_option('header_menu_background');

    $menu_hover_background = get_option('menu_hover_background') ? get_option('menu_hover_background') : $primary_color;

    $menu_hover_border = get_option('menu_hover_border') ? get_option('menu_hover_border') : $secondary_color;

   

    $body_font_color = get_option('body_font_color');

    $body_title_color = get_option('body_title_color') ? get_option('body_title_color') : $primary_color;

    $menu_link_color = get_option('menu_link_color') ? get_option('menu_link_color') : '#000000';
    $footer_links_color =get_option('footer_links_color') ? get_option('footer_links_color') : '#ffffff';
    $footer_titulo_texto_color = get_option('footer_titulo_texto_color') ? get_option('footer_titulo_texto_color') : '#ffffff';

    $menu_hover_color = get_option('menu_hover_color') ? get_option('menu_hover_color') : $secondary_color;

    $footer_menu_color = get_option('footer_menu_color') ? get_option('footer_menu_color') : get_option('primary_color');

    $footer_menu_hover_color = get_option('footer_menu_hover_color') ? get_option('footer_menu_hover_color') : get_option('secondary_color');

    $csspersonalizado = get_option('facilius_customcss');

    $titulosmayuscula= get_option('facilius_uppertitles');

    ?>

<style>
    body {
        background: <?php echo $body_background; ?>;
        <?php echo stripcslashes(get_option('facilius_font_body')); ?>
    }
    body, .single p, .page p{
        color: <?php echo $body_font_color; ?>;
    }
    a, .single p a, .archive p a, .page p a{
        color:<?php echo $primary_color; ?>
    }
    a:hover, #related-posts article .entry-title a:hover {
        color:<?php echo $secondary_color; ?>
    }
    #nichopress .headernav .site-identity .columns .site-title a{
        color: <?php echo $primary_color; ?>;
    }
    #nichopress .headernav .site-identity .columns .site-title a:hover{
        color: <?php echo $secondary_color; ?>;
    }
    #nichopress .headernav .main-navigation ul li a, .headernav .main-navigation ul li a, .navfooter ul li a{
        <?php echo stripcslashes(get_option('facilius_font_body')); ?>
    }
    
    #nichopress .headernav{ 
        background: <?php echo $header_background; ?>;
        border-color: <?php echo $header_border; ?>;
    }



    #nichopress .headernav .main-navigation ul li a,.icon-search{
        color:  <?php echo $menu_link_color; ?>;
    }

    #nichopress .headernav .main-navigation ul li:hover a, #nichopress .headernav .main-navigation ul li.current-menu-item a:before,#nichopress .headernav .main-navigation ul li.current-menu-item:before,#nichopress .headernav .main-navigation ul li a:hover,#nichopress .headernav .main-navigation ul li a:hover::before{
        color:<?php echo $menu_hover_color; ?>;
    }
    #nichopress .headernav .main-navigation .redes li:hover a{
        color: <?php echo $secondary_color; ?>;
    }
    .navfooter ul li a {
        color: <?php echo $footer_menu_color; ?>;
    }
    .navfooter ul li:hover a{
        color: <?php echo $footer_menu_hover_color; ?>;
    }
    .footer{ 
        background:<?php echo $footer_background; ?>;
        border-color:<?php echo $footer_border; ?>;
    }
    footer aside.sidebar a, footer aside.sidebar ul li:before{
        color: <?php echo $footer_links_color; ?>;
    }
    footer aside.sidebar, aside.sidebar h3{
        color: <?php echo $footer_titulo_texto_color; ?>;
    }
    
    .footer p{
        color:<?php echo $footer_text_color; ?>;
    }
    .footer .redes li a, .footer .redes li a:hover{ 
        color:<?php echo $primary_color;?>; 
    }
    h1, h2, h3, h4, article h1, article h2, article h3, article h4{
        color: <?php echo $body_title_color; ?>;
        <?php echo stripcslashes(get_option('facilius_font_h')); ?>
    }
    article h1 a:hover, article h2 a:hover, article h3 a:hover, article h4 a:hover, .cards article h1, .cards article h2, .cards article h3, .cards article h4, .cards article h1 a:hover, .cards article h2 a:hover, .cards article h3 a:hover, .cards article h4 a:hover {
        color: <?php echo $body_title_color; ?>; 
    }
    .single p a,.page p a,.more-section-link a,  nav.breadcrumbs a{
        color: <?php echo $primary_color; ?>; 
    }
    .single p a:hover,.page p a:hover,.more-section-link a:hover,  nav.breadcrumbs a:hover, .site-identity .site-title a:hover,#related-posts .postrelacionados .entry-title a:hover {
        color: <?php echo $secondary_color; ?>;
    }
    article .entry-title {
        border-color: <?php echo $primary_color; ?> ;
    }
    article .entry-title a:hover{
        color: <?php echo $primary_color; ?> ;
    }
    article .read-more, .wp-comentarios form input[type=submit],.searchform input[type=submit],.facilius-carta{
        background: <?php echo $primary_color; ?>;
    }
    article .read-more:hover, .wp-comentarios form input[type=submit]:hover{
        background: <?php echo $secondary_color; ?>;
    }
    .boton, #related-posts {
        background: <?php echo $primary_color; ?>;
    }

    .cards article,.sidebar .widget_recent_entries ul li, .sidebar .widget_recent_entries ul li h3{
        border-color: <?php echo $primary_color; ?>;
    }
    .single .metadatos,.page .metadatos,.section-label,.section-label {
        border-color: <?php echo $secondary_color; ?>;
    }
    .navigation li a {
        background-color:<?php echo $primary_color; ?>;
    }
    .navigation li a:hover, .navigation li.active a, .navigation li.disabled {
        background-color:<?php echo $secondary_color; ?>;
    }
    .cards article h1 a, .cards article h2 a, .cards article h3 a, .cards article h4 a,
    article h1 a, article h2 a, article h3 a, article h4 a  {
        color:<?php echo $body_title_color; ?>; 
    }
    .main-navigation.slide-in .menuflotante:after{
        box-shadow: 0px 4px 0px <?php echo $primary_color; ?>;

    }

    @media only screen and (max-width: 64.063em){
        .main-navigation.normal .menuflotante:before {
            background: <?php echo $menu_link_color; ?> ;
            box-shadow: 0px 6px 0px <?php echo $menu_link_color; ?>,0px 12px 0px <?php echo $menu_link_color; ?>;
        }
    }

    .main-navigation.slide-in .menuflotante:before{
        background: <?php echo $primary_color; ?>;
        box-shadow: 0px -6px 0px <?php echo $primary_color; ?>;
    }
    .wp-comentarios h2:first-letter{
        color: <?php echo $primary_color; ?>;
    }


    <?php
    if (get_option('facilius_uppertitles')){
        echo 'h1,h2,h3,h4{
                text-transform: uppercase;
            }';
    } 
    if($header_background){
     echo"
     .main-navigation.normal label:after {
        background: ".$body_background.";
        margin: 12px 7.5px;
        box-shadow: 0px 6px 0px ".$body_background.", 0px 12px 0px ".$body_background.";
    ";   
    }
    else{
        echo"
        .main-navigation.normal label:after {
           background: ".$primary_color.";
           margin: 12px 7.5px;
           box-shadow: 0px 6px 0px ".$primary_color.", 0px 12px 0px ".$primary_color.";
       ";  
    }
    echo $csspersonalizado; ?>

</style><?php

}
add_action('wp_head','facilius_colores');