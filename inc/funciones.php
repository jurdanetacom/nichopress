<?php 
add_theme_support( 'custom-logo',array(
    'height'      => 100,
    'width'       => 240,
    'flex-height' => true,
) );
add_theme_support('title-tag');
add_theme_support( 'yoast-seo-breadcrumbs' );



function facilius_enqueue_estilos() {
    wp_register_style(
        'facilius-nichopress', // handle name
        get_template_directory_uri() . '/css/estilo.css', // the URL of the stylesheet
        array(), // an array of dependent styles
        '1.6', // version number
        'screen' // CSS media type
    );
    wp_register_style(
        'facilius-tinyslider', // handle name
        get_template_directory_uri() . '/css/tiny-slider.css', // the URL of the stylesheet
        array(), // an array of dependent styles
        '1.0', // version number
        'screen' // CSS media type
    );
wp_enqueue_style( 'facilius-nichopress' );   
wp_enqueue_style( 'facilius-tinyslider' );   
    
}
add_action( 'wp_enqueue_scripts', 'facilius_enqueue_estilos' );


add_action("wp_enqueue_scripts", "facilius_tinyslider_js");
function facilius_tinyslider_js() { 
    wp_register_script('facilius-tinysliderjs', 
                        get_template_directory_uri() .'/js/tiny-slider.js',   //
                        array (),                  //depends on these, however, they are registered by core already, so no need to enqueue them.
                        false, true);
    wp_enqueue_script('facilius-tinysliderjs');
      
}

add_action ('admin_menu', 'my_theme_customizer');
function my_theme_customizer() {
    add_theme_page(
        __( 'Customize Theme Options'  ),
        __( 'Personalizar theme' ),
        'edit_theme_options',
        'customize.php'
    );
}

function texto_resumen($length) {
	return 30;
}
add_filter('excerpt_length', 'texto_resumen');
add_theme_support( 'menus' );
function facilius_menufooter() {

  register_nav_menu('footer-menu',__( 'Menu footer' ));

}
add_action( 'init', 'facilius_menufooter' );
function facilius_menuheader() {

  register_nav_menu('header-menu',__( 'Menu header' ));

}
add_action( 'init', 'facilius_menuheader' );
function facilius_nav($location){

    wp_nav_menu(
        array(

            'theme_location'  => $location,
            'menu'            => '',
            'container'       => 'nav',
            'container_class' => 'menu-header-container',
            'container_id'    => '', 
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 2,
            'walker'          => ''
        )
    );

}
function facilius_analytics(){
  $propertyID = get_option('facilius_gaid'); 
  if ($propertyID != "") {
    ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $propertyID; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $propertyID; ?>');
</script>



    <?php
  }
}
add_action('wp_footer', 'facilius_analytics');
add_theme_support( 'post-thumbnails' );
add_image_size( 'featured-thumbnail-vertical', 250, 300, true );
add_image_size( 'featured-thumbnail-large', 340, 200, true );
add_image_size( 'featured-thumbnail-x-large', 520, 310, true );


function breadcrumb_links() {

    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
      }
      if (function_exists('rank_math_the_breadcrumbs')){
          rank_math_the_breadcrumbs();
      } 
}  

//Get functions by theme
get_template_part('inc/functions/custom-styles',get_stylesheet());
get_template_part('inc/functions/unique-functions',get_stylesheet());



/*Funciones de Facilius*/
function facilius_head(){
    if ( get_option( 'site_favicon' ) ) : 
        echo '<link rel="icon" href="'.esc_url(get_option('site_favicon')).'" type="image/png" />';
    else: 
        echo '<link rel="icon" href="'.get_template_directory_uri().'/img/favicon.ico" type="image/png" />';
    endif; 
    $facilius_theme_color = get_option('primary_color') ? get_option('primary_color') : '#ff3300';
    echo '
    <meta name="theme-color" content="'.$facilius_theme_color.'">
    ';
    if ( get_option( 'facilius_metadata' ) ) : 
        echo stripslashes(get_option('facilius_metadata'));
    endif; 
    if (get_option('facilius_facebook_app_id')){ 
        $appid= get_option('facilius_facebook_app_id');
        $facebook_meta = '<meta property="fb:app_id" content="'.$appid.'" />';
        echo $facebook_meta;
    } 
}
function facilius_facebook_appid(){
    if (get_option('facilius_facebook_app_id')){ 
        $appid= get_option('facilius_facebook_app_id');
        $facebook_app_code = '<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId='.$appid.'";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));</script>';

        echo $facebook_app_code;
    } 
}
function facilius_header(){
    echo get_template_part('inc/header/header',get_stylesheet());
}
function facilius_logo(){
    if(has_custom_logo()) { 
        echo get_custom_logo();
    } else {
        echo '<h1 class="site-title"><a href="'.esc_url(home_url( '/' )).'" title="'.esc_attr( get_bloginfo( 'name', 'display' )).'" rel="home">'.get_bloginfo('name').'</a></h1>';                        
    }
}
function facilius_ad_header(){
    $facilius_ocultar_ads =  get_post_meta( get_queried_object_id(), 'facilius-ocultar-anuncios', true ); 
    if ( get_option('facilius_slot_uno') ) {
        if($facilius_ocultar_ads !== 'on'){
            $facilius_adsense_header  = get_option('facilius_slot_uno');
            echo '<div class="row">
                <div class="small-12 columns">
                    <div class="adsheader">'.stripcslashes($facilius_adsense_header).'</div> 
                </div>              
            </div>';
        }
    }
}
function facilius_ad_under_header(){
    
	$facilius_ocultar_ads =  get_post_meta( get_queried_object_id(), 'facilius-ocultar-anuncios', true ); 
    if ( get_option('facilius_slot_dos') ) {
        if($facilius_ocultar_ads !== 'on'){
            $facilius_ad_dos  = get_option('facilius_slot_dos');
            $facilius_align_dos = get_option('facilius_slot_dos_align');
            echo '
                
                    <div class="adsheader slotdos">'.stripcslashes($facilius_ad_dos).'</div> 
                            
            ';
        }
    }
}
function facilius_ad_over_content(){
    $facilius_ocultar_ads =  get_post_meta( get_queried_object_id(), 'facilius-ocultar-anuncios', true ); 
    if ( get_option('facilius_slot_tres') ) {
        if($facilius_ocultar_ads !== 'on'){
            $facilius_ad_tres  = get_option('facilius_slot_tres');
            $facilius_align_tres = get_option('facilius_slot_tres_align');
            echo '<div class="row adsheader">
                <div class="small-12 columns">
                    <div class="slottres '.$facilius_align_tres.'">'.stripcslashes($facilius_ad_tres).'</div> 
                </div>              
            </div>';
        }
    }
}
add_filter( 'the_content', 'facilius_insertar_ads' );
function facilius_insertar_ads( $content ) {
    $facilius_ocultar_ads =  get_post_meta( get_queried_object_id(), 'facilius-ocultar-anuncios', true );
    $ad_code = null;
    if (get_option('facilius_slot_cuatro')) {
        if($facilius_ocultar_ads !== 'on'){
            $adpa  = get_option('facilius_slot_cuatro');
            $ad_code = '<div class="adsheader">'.stripcslashes($adpa).'</div>';
        }
    }
    else{
        $ad_code = null;
    }
    if ( is_single() && ! is_admin() ) {
        return facilius_insertar_despues_parrafo( $ad_code, $content );
    }
    return $content;
}
function facilius_ad_under_content(){
    $facilius_ocultar_ads =  get_post_meta( get_queried_object_id(), 'facilius-ocultar-anuncios', true ); 
    if ( get_option('facilius_slot_cinco') ) {
        if($facilius_ocultar_ads !== 'on'){
            $facilius_ad_cinco  = get_option('facilius_slot_cinco');
            $facilius_align_cinco = get_option('facilius_slot_cinco_align');
            echo '<div class="row">
                <div class="small-12 columns">
                    <div class="slotcinco '.$facilius_align_cinco.'">'.stripcslashes($facilius_ad_cinco).'</div> 
                </div>              
            </div>';
        }
    }
}
function facilius_descripcion_inicio_antes(){ 
    $position = get_option('facilius_posicion_texto_inicio'); 
    if (get_option('facilius_home_text') && ($position == 'Antes')){    
        echo '<div class="descripcion-inicio">';
        echo div_wrapper(stripcslashes(get_option('facilius_home_text')));
        echo '</div>'; 
    }
}
function facilius_descripcion_inicio_despues(){ 
    $position = get_option('facilius_posicion_texto_inicio'); 
    if (get_option('facilius_home_text') && ($position == 'Despues')){    
        echo '<div class="descripcion-inicio">';
        echo div_wrapper(stripcslashes(get_option('facilius_home_text')));
        echo '</div>'; 
    }
}
function facilius_sidebar(){
    $position = get_option('facilius_posicion_sidebar');
    if(($position === 'Sin Sidebar') || (get_stylesheet() === 'viralpress')){
        return false;
    } else {
        return true;
    }
}
function get_facilius_content_position(){
    $facilius_content_position = (get_option('facilius_posicion_sidebar') == 'Izquierda') ? ' medium-push-4' : '';
    $facilius_content_position = (get_option('facilius_posicion_sidebar') === 'Sin Sidebar') ? '' : $facilius_content_position;
    return $facilius_content_position;
}
function facilius_related_posts($id){
    $n = get_option('facilius_cantidad_posts_relacionados') ? get_option('facilius_cantidad_posts_relacionados') : 6;
    $related = get_posts( array( 
        'category__in' => wp_get_post_categories($id),
        'numberposts' => $n, 
        'post__not_in' => array($id) ) 
    );
    if($related) foreach($related as $post) {
        setup_postdata($post); ?>
        <article class="postrelacionados">
            <div class="entry-image">
                <?php if(has_post_thumbnail($post->ID)){ 
                    echo '<a href="'.get_the_permalink($post->ID).'" >';
                    echo get_the_post_thumbnail($post->ID,'featured-thumbnail-large'); 
                    echo '</a>';
                }
                else{
                    echo '<img src="'.get_template_directory_uri().'/img/facilius-img-placeholder-related.jpg" >';
                }
                ?>
            </div>
            <h3 class="entry-title mismaltura"><a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark"><?php echo get_the_title($post->ID); ?></a></h3>
        </article><?php 
    }
    wp_reset_postdata();   
}
function facilius_fecha_post() {
    return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
 
}

function facilius_footer_loop(){ ?>
    <div class="categoriasenloop">
<?php if(!get_option('facilius_ocultar_fecha_loop')){ echo 'Hace '.facilius_fecha_post().' • ';} ?> <?php if(!get_option('facilius_ocultar_categoria_loop')){ ?><span> <?php the_category( ' • ');?></span><?php } ?>	
       <?php if(!get_option('facilius_ocultar_comentarios')){ ?>
        <div class="totalcomentarios">
            <?php comments_number( 'Sin Comentarios', 'Un Comentario', '% Comentarios' ); ?>
       </div><?php } ?>
    </div>				

<?php 
}
 
function facilius_loop_title($id, $cat_id){    
    if($cat_id){
        $facilius_etiqueta_apertura_titulo_loop = get_option('facilius_etiqueta_titulo_loop_cat') ? '<'.get_option('facilius_etiqueta_titulo_loop_cat').' class="entry-title">' : '<h2 class="entry-title">';   
        $facilius_etiqueta_cierre_titulo_loop = get_option('facilius_etiqueta_titulo_loop_cat') ? '</'.get_option('facilius_etiqueta_titulo_loop_cat').'>' : '</h2>';
    } else if (is_front_page()){
        $facilius_etiqueta_apertura_titulo_loop = get_option('facilius_etiqueta_titulo_loop_index') ? '<'.get_option('facilius_etiqueta_titulo_loop_index').' class="entry-title">' : '<h2 class="entry-title">';   
        $facilius_etiqueta_cierre_titulo_loop = get_option('facilius_etiqueta_titulo_loop_index') ? '</'.get_option('facilius_etiqueta_titulo_loop_index').'>' : '</h2>';
    } else {
        $facilius_etiqueta_apertura_titulo_loop = '<h2 class="entry-title">'; 
        $facilius_etiqueta_cierre_titulo_loop = '</h2>';
    } 
    echo $facilius_etiqueta_apertura_titulo_loop.'<a href="'.get_permalink($id).'">'.get_the_title($id).'</a>'.$facilius_etiqueta_cierre_titulo_loop;
}
function facilius_next_page(){
    $defaults = array(
        'before'           => '<p class="boton">',
        'after'            => '</p>',
        'link_before'      => '',
        'link_after'       => '',
        'next_or_number'   => 'next',
        'separator'        => ' ',
        'nextpagelink'     => __( 'Página Siguiente', 'facilius'),
        'previouspagelink' => __( 'Página Anterior', 'facilius' ),
        'pagelink'         => '%',
        'echo'             => 1
    );
    wp_link_pages( $defaults );
}
function get_Next_page(){
    $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
    $pages = array();
    foreach ($pagelist as $page) {
       $pages[] += $page->ID;
    }

    $current = array_search(get_the_ID(), $pages);
    $prevID = $pages[$current-1];
    $nextID = $pages[$current+1];
    
    if (!empty($nextID)) {
        echo '<p class="next-post ">';
        echo '<a href="';
        echo get_permalink($nextID);
        echo '"';
        echo 'title="';
        echo get_the_title($nextID); 
        echo'" class="boton">Siguiente Página</a>';
        echo "</p>";      
    }
}   
function facilius_page_title($id){    
    $etiqueta_titulo = get_option('facilius_etiqueta_titulo_page') ? get_option('facilius_etiqueta_titulo_page') : 'h1';   
    echo '<'.$etiqueta_titulo.' class="entry-title-page">'.get_the_title($id).'</'.$etiqueta_titulo.'>';

}
function facilius_post_title($id){    
    $etiqueta_titulo = get_option('facilius_etiqueta_titulo_post') ? get_option('facilius_etiqueta_titulo_post') : 'h1';   
    echo '<'.$etiqueta_titulo.' class="entry-title-post" >'.get_the_title($id).'</'.$etiqueta_titulo.'>';

}
function facilius_boton_ver_mas($id){    
    $facilius_leer_mas = get_option('facilius_ocultar_leer_mas') ? false : true;    
    $hide_this = get_post_meta( $id, 'facilius_hide_leer_mas', true );
    if($facilius_leer_mas){ 
        if($hide_this !== 'on'){
            $texto_leer_mas = get_post_meta($id, 'facilius_leer_mas', true ) ? stripcslashes(get_post_meta($id, 'facilius_leer_mas', true )) : 'Leer más'; 
            $boton_ver_mas = '<a class="boton" href="'.get_permalink($id).'">'.$texto_leer_mas.'</a>';

            echo $boton_ver_mas;            
        }
    } 
}
function facilius_insertar_despues_parrafo( $insertion, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    $arraysize = count($paragraphs);
    $division = $arraysize / 2;
    if(is_float($division)) {
     $paragraph_id = round($division, 0);
    } else {
     $paragraph_id = $division;
    }
    foreach ($paragraphs as $index => $paragraph) {
        if(trim( $paragraph )) {
            $paragraphs[$index] .= $closing_p;
        }
        if($paragraph_id == $index + 2){
            $paragraphs[$index] .= $insertion;
        }
    }    
    return implode( '', $paragraphs );
}

function facilius_compartir_post(){ 
    
    
        $facilius_postpermalink = urlencode( get_permalink() );
           //getting the thumbnail
        $facilius_imageurl = urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) );
        $facilius_posttitle = urlencode(get_the_title());
        $facilius_twitteruser = get_option('facilius_twitter');
        ?>
    <div class="sharing">
        <div class="small-3 columns">
            
            <div class="small-3 columns">
                <a class="fb" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $facilius_postpermalink; ?>&t=<?php $facilius_posttitle ?>" title="Compartir en facebook"><span class="icon-facebook"></span></a>
            </div>
            <div class="small-3 columns">
                <a class="tw" target="_blank"  href="https://twitter.com/intent/tweet?text=<?php echo $facilius_posttitle; ?>&url=<?php echo $facilius_postpermalink;  if ($facilius_twitteruser){ echo '&via='.$facilius_twitteruser; }?>"><span class="icon-twitter"></span></a>
        
            </div>            
        </div>
        <div class="small-3 columns">
            <div class="small-3 columns">
                <a class="pn" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $facilius_postpermalink ?>&media=<?php echo $facilius_imageurl ?>&description=<?php echo $facilius_posttitle ?>" target="_blank" title="Compartir este artículo en Pinterest">
                <span class="icon-pinterest"></span>
            </a>
            </div>
            <div class="small-3 columns">
            <a class="wa" target="_blank" href="whatsapp://send?text=<?php echo $facilius_posttitle; ?> – <?php echo $facilius_postpermalink; ?>" data-action="share/whatsapp/share"><span class="icon-whatsapp"></span></a>
            </div>        
        </div>


    </div><?php 
    
}
//remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
//remove_action( 'wp_print_styles', 'print_emoji_styles' );
function facilius_metadata_post(){

    if (get_option('facilius_ocultar_fecha_y_autor') == true) {

            echo  '<div class ="metadatos"><span class="fecha">'.get_the_date().' • </span><span class="autor"> <a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a></span>

            <div class="avatar">'.get_avatar( get_the_author_meta('ID'), 88 ).'</div></div>';

        }

}
function facilius_load_amp_adsense_script( $data ) {

    $data['amp_component_scripts']['amp-ad'] = 'https://cdn.ampproject.org/v0/amp-ad-0.1.js';

    return $data;

}
add_filter( 'amp_post_template_data', 'facilius_load_amp_adsense_script' );
add_action( 'pre_amp_render_post', 'facilius_amp_add_content_filter_within' );


function facilius_amp_add_content_filter_within() {
    add_filter( 'the_content', 'facilius_amp_adsense_within_content' );
}

function facilius_amp_adsense_within_content( $content ) {
    $publisher_id = get_option('facilius_ad_client');
    $ad_slot = get_option('facilius_ad_slot');
    $after = get_option('facilius_ad_nafter'); 
    $ad_slot_dos = get_option('facilius_ad_slot_dos');
    $after_dos = get_option('facilius_ad_dos_nafter');
    $btf_ad_code = '<amp-ad layout="responsive" width="300" height="250" type="adsense" data-ad-client="' . $publisher_id . '" data-ad-slot="' . $ad_slot . '"></amp-ad>';
    $btf_ad_code_two = '<amp-ad layout="responsive" width="300" height="250" type="adsense" data-ad-client="' . $publisher_id . '" data-ad-slot="' . $ad_slot_dos . '"></amp-ad>';
    $new_content = facilius_insert_after_paragraph( $btf_ad_code, $after, $content );
    $new_content = facilius_insert_after_paragraph( $btf_ad_code_two, $after_dos, $new_content );
    return $new_content;
}
function facilius_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}
function facilius_show_comments(){
    if(get_option('facilius_deshabilitar_comentarios')){ } else { comments_template(); }
}
function facilius_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    } ?>
    <li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <?php if (!get_option('facilius_ocultar_avatares')){ ?>
            <div class="comment-author avatar">                
                <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
            </div>
            <?php } ?>
            <div class="comment-text">
                <div class="comment-author vcard">
                    <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                </div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>
                <div class="reply">
                    <?php comment_reply_link(array_merge( $args, array(
                        'add_below' => $add_below, 
                        'depth' => $depth, 
                        'max_depth' => $args['max_depth']))) 
                    ?>
                </div>
                <div class="comment-meta commentmetadata"><?php
                    printf( __('%1$s'), get_comment_date()) ?><?php edit_comment_link(__('(Edit)'),'  ','' ); ?>
                </div>
            </div>
            <?php if ( 'div' != $args['style'] ) : ?>
        </div>
        <?php endif; ?>
    </li><?php
} 

/* ocultar URL de comentarios *
function facilius_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'facilius_remove_comment_url');
*/
function div_wrapper($content) {
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        $wrappedframe = '<div class="iwrap">' . $match . '</div>';
        $content = str_replace($match, $wrappedframe, $content);
    }
    return $content; 
}

add_filter('the_content', 'div_wrapper');
add_action( 'load-post.php', 'facilius_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'facilius_post_meta_boxes_setup' );

function facilius_post_meta_boxes_setup() {
  add_action( 'add_meta_boxes', 'facilius_add_post_meta_boxes' );
  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'facilius_save_leer_mas_meta', 10, 2 );
}
function facilius_add_post_meta_boxes() {
  add_meta_box(
    'facilius_metabox',
    esc_html__( 'Configuracion Facilius', 'facilius' ),
    'facilius_leer_mas_meta_box',
    'post',         
    'normal', 
    'default'
  );
}
function facilius_leer_mas_meta_box( $post ) { 
    $text = esc_attr( get_post_meta( $post->ID, 'facilius_leer_mas', true ) );
    $check = esc_attr( get_post_meta( $post->ID, 'facilius_hide_leer_mas', true ) );
    $ads = esc_attr( get_post_meta( $post->ID, 'facilius-ocultar-anuncios', true ) );
    
    wp_nonce_field( basename( __FILE__ ), 'facilius_leer_mas_nonce' ); ?>
    <table>
        <tr>
            <td><label for="facilius-hide-leer-mas"><?php _e( "Desactivar el botón leer más", 'facilius' ); ?></label></td>
            <td><input type="checkbox" name="facilius-hide-leer-mas" id="facilius-hide-leer-mas" <?php checked( $check, 'on' ); ?> /></td>
        </tr>
        <tr>
            <td><label for="facilius-leer-mas"><?php _e( "Escribe el texto para sustituir en el botón leer más", 'facilius' ); ?></label></td>
            <td><input class="widefat" type="text" name="facilius-leer-mas" id="facilius-leer-mas" value="<?php echo $text; ?>" /></td>
        </tr>
        <tr>
            <td><label for="facilius-ocultar-anuncios"><?php _e( "Ocultar Anuncios", 'facilius' ); ?></label></td>
            <td><input type="checkbox" name="facilius-ocultar-anuncios" id="facilius-ocultar-anuncios" <?php checked( $ads, 'on' ); ?> /></td>
        </tr>

    </table>
  <?php 
} 
function facilius_save_leer_mas_meta( $post_id, $post ) {
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['facilius_leer_mas_nonce'] ) || !wp_verify_nonce( $_POST['facilius_leer_mas_nonce'], basename( __FILE__ ) ) )
    return $post_id;
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;
    /* Get the meta key. */
    $meta_key = array('facilius_hide_leer_mas', 'facilius_leer_mas', 'facilius-ocultar-anuncios');
    foreach ($meta_key as $key) {
        $key_name = str_replace('_', '-', $key);
        /* Get the posted data and sanitize it for use as an HTML class. */
        $new_meta_value = ( isset( $_POST[$key_name] ) ? $_POST[$key_name] : '' );
        /* Get the meta value of the custom field key. */
        $meta_value = get_post_meta( $post_id, $key, true );
        /* If a new meta value was added and there was no previous value, add it. */
        if ( $new_meta_value && '' == $meta_value )
            add_post_meta( $post_id, $key, $new_meta_value, true );
        /* If the new meta value does not match the old value, update it. */
        elseif ( $new_meta_value && $new_meta_value != $meta_value )
            update_post_meta( $post_id, $key, $new_meta_value );
        /* If there is no new meta value but an old value exists, delete it. */
        elseif ( '' == $new_meta_value && $meta_value )
            delete_post_meta( $post_id, $key, $meta_value );
    }
    
}
function facilius_incrustor($atts){   
    $a = shortcode_atts( array(
        'categoria' => '',
        'mostrar' => 3
    ), $atts );
    $tag = get_option('facilius_incrustor_etiqueta_titulo') ? get_option('facilius_incrustor_etiqueta_titulo') : 'h4';
    $posts_incrustor ='<section class="incrustados">';
    //acomodar link para imagen tambien con titulod
    $mostrar = get_option('facilius_incrustor_mostrar') === 'Imagen y título' ? true : false;
    
    $incrustor_query = new WP_Query();
    $incrustor_query->query('category_name='.esc_attr($a['categoria']).'&showposts='.esc_attr($a['mostrar'])); 
    if($incrustor_query->have_posts()): while($incrustor_query->have_posts()) : $incrustor_query->the_post(); 
        $posts_incrustor .= '<article class="card">';
        if ( $mostrar && has_post_thumbnail()) : 
            $posts_incrustor .=  '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail(isset($post->ID), 'featured-thumbnail-large').'</a>'; 
        
        endif; 
        $posts_incrustor .= '<summary>
            <'.$tag.' class="hlink"><a href="'.get_the_permalink().'" title="'.get_the_title().'" class="hlinka">'.get_the_title().'</a></'.$tag.'>
        </summary>
    </article>';          

     endwhile; endif;  wp_reset_query();
     $posts_incrustor .= '</section>';
     return $posts_incrustor;
}
add_shortcode( 'facilius_incrustor', 'facilius_incrustor');

add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)


register_sidebar(array(

    'name' => __( 'Footer sidebar' ),
  
    'id' => 'nicho-sidebar',
    'description' => __( 'Widgets en esta area se mostrarán en el footer a 3 columnas. ' ),
    'before_widget' => '<div id="%1$s" class="footerwidget  %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="section-label">',
    'after_title' => '</h3>'
  
  ));



function facilius_menu_type(){
    $class = get_option('facilius_tipo_menu_responsive') ? get_option('facilius_tipo_menu_responsive') : 'slide-in';

    return $class;
}
function shortcode_button_script(){
    if(wp_script_is("quicktags")){   ?>
    <script type="text/javascript">            
        //this function is used to retrieve the selected text from the text editor
        function getSel(){
            var txtarea = document.getElementById("content");
            var start = txtarea.selectionStart;
            var finish = txtarea.selectionEnd;
            return txtarea.value.substring(start, finish);
        }
        QTags.addButton( 
            "facilius_shortcode", 
            "Incrustor", 
            callback
        );
        function callback(){
            var selected_text = getSel();
            QTags.insertContent(selected_text + ' [facilius_incrustor categoria="slug-de-categoria" mostrar="n"]');
        }
    </script><?php
    }
}
add_action("admin_print_footer_scripts", "shortcode_button_script");
function enqueue_plugin_scripts($plugin_array){
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["incrustor_button_plugin"] =  get_template_directory_uri().'/js/tinymceplugin.js';
    return $plugin_array;
}
add_filter("mce_external_plugins", "enqueue_plugin_scripts");
function register_buttons_editor($buttons){
    //register buttons with their id.
    array_push($buttons, "incrustor");
    return $buttons;
}
add_filter("mce_buttons", "register_buttons_editor");

function numeric_posts_nav() {

    if( is_singular() )

            return;

    global $wp_query;

    if( $wp_query->max_num_pages <= 1 )

            return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    $max   = intval( $wp_query->max_num_pages );

    if ( $paged >= 1 )

            $links[] = $paged;

    if ( $paged >= 3 ) {

            $links[] = $paged - 1;

            $links[] = $paged - 2;

        }

    if ( ( $paged + 2 ) <= $max ) {

            $links[] = $paged + 2;

            $links[] = $paged + 1;

        }

    echo '<div class="navigation"><ul>' . "\n";

    if ( get_previous_posts_link() )

            printf( '<li>%s</li>' . "\n", get_previous_posts_link('Anterior') );

    if ( ! in_array( 1, $links ) ) {

            $class = 1 == $paged ? ' class="active"' : '';

            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

            if ( ! in_array( 2, $links ) )

                    echo '<li>…</li>';

        }

    sort( $links );

    foreach ( (array) $links as $link ) {

            $class = $paged == $link ? ' class="active"' : '';

            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );

        }

    if ( ! in_array( $max, $links ) ) {

            if ( ! in_array( $max - 1, $links ) )

                    echo '<li>…</li>' . "\n";

            $class = $paged == $max ? ' class="active"' : '';

            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );

        }

    if ( get_next_posts_link() )

            printf( '<li>%s</li>' . "\n", get_next_posts_link('Siguiente') );

    echo '</ul></div>' . "\n";

}

function facilius_agregar_busqueda($items) {
    $ocultar_buscador =  get_option('facilius_ocultar_buscador');

    if(!$ocultar_buscador){
        return $items .= '<li class="facilius-buscador">
        <input type="checkbox" name="one" id="buscador">
        
        <form method="get" class="searchform hideform" id="searchform" action="'.home_url().'" >

        <input id="s" type="text" name="s" placeholder="Escribe para buscar" >
        
        <input class="searchsubmit" type="submit" value="Ir">
        

    </form><label class="icon-search" for="buscador"></label>
        </li>';        
    }
    else{
        return $items .= ' ';
    }

  }
  add_filter('wp_nav_menu_items','facilius_agregar_busqueda');