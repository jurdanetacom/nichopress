<?php
/**
 * Pagina de opciones de Facilius
 */
$themename = "Nichopress";
$shortname = "facilius";
$icono = get_template_directory_uri().'/img/favicon-16x16.png';


function theme_settings_init() {
	register_setting( 'theme_settings', 'theme_settings' );
	wp_enqueue_style( "admin_style", get_template_directory_uri() . "/css/admin.css", false, "1.0", "all" );
	wp_enqueue_script('custom-script',get_template_directory_uri() . '/js/tabs.js',array('jquery'));
	wp_enqueue_script('jquery-ui-tabs');
}
add_action( 'admin_enqueue_scripts', 'theme_settings_init' );
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
   }
array_unshift($wp_cats, "Selecciona la categoria");
function add_settings_page() {
	add_menu_page( __( 'Personalizacion de theme - Facilius' ), __( 'Facilius' ), 'manage_options', 'facilius', 'pagina_configuracion_facilius',get_template_directory_uri().'/img/favicon-16x16.png','60.1');
	add_submenu_page( 'facilius', __( 'Configuración Nichopress' ), __( 'Configuración' ), 'manage_options', 'facilius', 'pagina_configuracion_facilius');
	add_submenu_page('facilius', __('Ideas'), __('Ideas'), 'manage_options', 'ideas', 'facilius_ideas');
	add_submenu_page('facilius', __('Documentacion'), __('Documentacion'), 'manage_options', 'documentacion', 'facilius_documentacion');
}
add_action( 'admin_menu', 'add_settings_page' );
$theme_options = array(

	array( 
		"name" => "Opciones de ". $themename,
		"type" => "title"
		),

	array( 
		"name" => "Anuncios",
		"type" => "section"
		),

	array( "type" => "open" ),
	array(
		"name" => "Slots de anuncios",
		"type" => "separador"
		),
	array( 
		"name" => "Slot 1 ",
		"desc" => "Anuncio debajo del header, si le das un color de fondo al header, este se quedará <b>dentro del color.</b> Recomendado un bloque de texto adaptable." ,
		"id" => $shortname."_slot_uno",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 2",
		"desc" => "Anuncio debajo del header, si le das un color de fondo al header, este se quedará <b>debajo del color</b>. Recomendado un bloque de texto adaptable. (Usar slot 1 o slot 2, no recomendable usar los dos)",
		"id" => $shortname."_slot_dos",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 3",
		"desc" => "<strong>Principio</strong> de los artículos",
		"id" => $shortname."_slot_tres",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 4",
		"desc" => "<strong>Mitad</strong> de los artículos.",
		"id" => $shortname."_slot_cuatro",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 5",
		"desc" => "<strong>Final</strong> del artículo. Ideal relacionados de AdSense",
		"id" => $shortname."_slot_cinco",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 6",
		"desc" => "<strong>Principio del sidebar del footer</strong>, en la parte superior de los widgets.",
		"id" => $shortname."_slot_seis",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 7",
		"desc" => "<strong>Final del sidebar del footer,</strong> si quieres mostrar algo debajo de los widgets del footer, puedes colocarlo aquí.",
		"id" => $shortname."_slot_siete",
		"type" => "textarea",
		"std" => ""
	),
	array( 
		"name" => "Slot 8",
		"desc" => "<strong>Personalizado</strong> [slotocho], puedes usar este shortcode en posts.",
		"id" => $shortname."_slot_ocho",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 9",
		"desc" => "<strong>Personalizado</strong> [slotnueve], puedes usar este shortcode en posts.",
		"id" => $shortname."_slot_nueve",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Slot 10",
		"desc" => "<strong>Personalizado</strong> [slotdiez], puedes usar este shortcode en posts.",
		"id" => $shortname."_slot_diez",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Código del Ad 1 dentro del loop",
		"desc" => "Introduce el código del Ad 1 que se mostrará dentro del loop.",
		"id" => $shortname."_codigo_loop_uno",		
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Posición del Ad 1 dentro de Loop",
		"desc" => "Despues de cuantos posts desea mostrar",
		"id" => $shortname."_loop_uno",
		"type" => "select",
		"options" => array('1','2','3','4','5'),
		"std" => ""
		),
	array( 
		"name" => "Código del Ad 2 dentro del loop",
		"desc" => "Introduce el código del Ad 2 que se mostrará dentro del loop.",
		"id" => $shortname."_codigo_loop_dos",		
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Posición de Ad 2 dentro de Loop",
		"desc" => "Despues de cuantos posts desea mostrar",
		"id" => $shortname."_loop_dos",
		"type" => "select",
		"options" => array('6','7','8','9','10'),
		"std" => ""
		),
	array( 
		"name" => "Código del Ad 3 dentro del loop",
		"desc" => "Introduce el código del Ad 3 que se mostrará dentro del loop.",
		"id" => $shortname."_codigo_loop_tres",		
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Posición de Ad 3 dentro de Loop",
		"desc" => "Despues de cuantos posts desea mostrar",
		"id" => $shortname."_loop_tres",
		"type" => "select",
		"options" => array('11','12','13','14','15'),
		"std" => ""
		),

	array( "type" => "close"),

	array( 
		"name" => "SEO",
		"type" => "section"
		),

	array( "type" => "open" ),

	array( 
		"name" => "Mostrar migas en las paginas",
		"desc" => "Activar si deseas mostrar los breadcrumbs links en las paginas, las migas funcionan con el plugin Yoast SEO / Rank Math y puedes configurarlas en el personalizador.",
		"id" => $shortname."_breadcrumbpage",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Mostrar migas en los articulos",
		"desc" => "Activar si deseas mostrar los breadcrumbs links en los posts, las migas funcionan con el plugin Yoast SEO / Rank Math y puedes configurarlas en el personalizador.",
		"id" => $shortname."_breadcrumbsingle",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Ocultar botón ver más",
		"desc" => "Ocultar el botón ver más en el loop.", 
		"id" => $shortname."_ocultar_leer_mas",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Prefijo de Categorías",
		"desc" => 'Prefijo para el título de la pagina de categorías. <br/>Ej: <strong>Plantas para</strong> *Categoría*',
		"id" => $shortname."_prefijo_categoria",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Etiqueta de título de categoría",
		"desc" => "¿Qué etiqueta envuelve al título de la categoría?", 
		"id" => $shortname."_etiqueta_titulo",
		"type" => "select",
		"options" => array('h1','h2','h3','h4','h5','h6'),
		"std" => "h1"
		),
	array( 
		"name" => "Etiqueta de título de loop de categoria",
		"desc" => "¿Qué etiqueta envuelve a los títulos en el loop de la categoría?", 
		"id" => $shortname."_etiqueta_titulo_loop_cat",
		"type" => "select",
		"options" => array('h1','h2','h3','h4','h5','h6'),
		"std" => "h2"
		),
	array( 
		"name" => "Etiqueta de título de loop en index",
		"desc" => "¿Qué etiqueta envuelve a los títulos en el loop de la página principal?", 
		"id" => $shortname."_etiqueta_titulo_loop_index",
		"type" => "select",
		"options" => array('h1','h2','h3','h4','h5','h6'),
		"std" => "h2"
		),
	array( 
		"name" => "Etiqueta de título de post",
		"desc" => "¿Qué etiqueta envuelve al título del post?(single.php)", 
		"id" => $shortname."_etiqueta_titulo_post",
		"type" => "select",
		"options" => array('h1','h2','h3','h4','h5','h6'),
		"std" => "h1"
		),
	array( 
		"name" => "Etiqueta de título de página",
		"desc" => "¿Qué etiqueta envuelve al título de la página?(page.php)", 
		"id" => $shortname."_etiqueta_titulo_pagina",
		"type" => "select",
		"options" => array('h1','h2','h3','h4','h5','h6'),
		"std" => "h1"
		),
	array( 
		"name" => "Posición de descripción de categoría",
		"desc" => "Posición de descripción en página de categorías. Antes o despues de los artículos.", 
		"id" => $shortname."_posicion_descripcion",
		"type" => "select",
		"options" => array('Antes','Despues'),
		"std" => "Antes"
		),
	array( 
		"name" => "Descripción solo en primera página",
		"desc" => "Evitar que se muestre la descripción en la paginación (page/2).", 
		"id" => $shortname."_solo_primera_pagina",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Títulos en mayúsculas",
		"desc" => "Activar si deseas que los títulos de las páginas y blogs esten en mayúsculas",
		"id" => $shortname."_uppertitles",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Texto de Inicio del blog",
		"desc" => "Introduce el texto introductorio que desea mostrar en la pagina del blog.<br/> Ideal si deseas agregar contenido en el inicio.",
		"id" => $shortname."_home_text",		
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Posición de texto de inicio",
		"desc" => "Posición de texto de inicio. Antes o despues de los artículos.", 
		"id" => $shortname."_posicion_texto_inicio",
		"type" => "select",
		"options" => array('Antes','Despues'),
		"std" => "Antes"
		),
	array( 
		"name" => "Cantidad de posts relacionados",
		"desc" => "Cantidad de posts relacionados que deben mostrarse al final de un post.", 
		"id" => $shortname."_cantidad_posts_relacionados",
		"type" => "number",
		"std" => "4",
		"min" => "0",
		"max" => "12"
		),

	array( "type" => "close"),
	array( 
		"name" => "AMP",
		"type" => "section"
		),

	array( "type" => "open" ),
	array(
		"name" => "<strong>REQUIERE EL <a href='https://es.wordpress.org/plugins/amp/'>PLUGIN DE AMP</a></strong>",
		"type" => "mensaje"
		),
	array( 
		"name" => "Ad-client",
		"desc" => 'Colocar el Publisher ID (data-ad-client), tipo "ca-pub-XXXXXXXXXXXXXXXX"',
		"id" => $shortname."_ad_client",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Ad-slot",
		"desc" => 'Coloca el ad-slot de tu anuncio, tipo "1234567890"',
		"id" => $shortname."_ad_slot",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Mostrar despues de parrafos",
		"desc" => 'Después de cuantos parrafos quieres colocar el anuncio en tus posts de AMP',
		"id" => $shortname."_ad_nafter",
		"type" => "select",
		"options" => array('1','2','3','4','5'),
		"std" => ""
		),
	array( 
		"name" => "Ad-slot 2",
		"desc" => 'Coloca el ad-slot de tu anuncio, tipo "1234567890"',
		"id" => $shortname."_ad_slot_dos",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Mostrar despues de parrafos",
		"desc" => 'Después de cuantos parrafos quieres colocar el segundo anuncio en tus posts de AMP',
		"id" => $shortname."_ad_dos_nafter",
		"type" => "select",
		"options" => array('6','7','8','9','10'),
		"std" => ""
		),
	array( "type" => "close"),
	array( 
		"name" => "Otros",
		"type" => "section"
		),

	array( "type" => "open" ),
	array( 
		"name" => "Activar carrusel",
		"desc" => "Activar si deseas <b>mostrar el carrusel.</b> Luego de activar y guardar cambios, actualiza de nuevo ( F5 ). <br><a href='http://docs.facilius.net/#carusel' target='_blank'><b>Mira aquí como usar el carrusel (documentación)</b></a>",
		"id" => $shortname."_mostrar_carrusel",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Carrusel predeterminado",
		"desc" => 'Coloca el slug del carrusel predeterminado.',
		"id" => $shortname."_carrusel_predeterminado",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Activar sidebar",
		"desc" => "Activar si deseas <b>mostrar un sidebar.</b> Luego de activar y guardar cambios, actualiza de nuevo ( F5 )",
		"id" => $shortname."_mostrar_sidebar",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Cargar fuentes personalizadas",
		"desc" => "Coloca aquí el nombre de las fuentes de Google Fonts a cargar, separadas por barras verticales ( | ) <a href='http://docs.facilius.net/#configurarfuentes' target='_blank'><b>mira aquí cómo</b></a>. <br> <b>Importante:</b> si deseas una sola fuente para el sitio, carga únicamente la fuente del título, mira más información en la <a href='http://docs.facilius.net/' target='_blank' >documentación.</a> ",
		"id" => $shortname."_cargar_fuentes",
		"type" => "text",
		"std" => ""
		),
	array(
		"name" => "Font-family de título",
		"desc" => "Coloca la familia de fuentes que deseas mostrar en los <b>títulos</b>, incluído el font family. Predeterminada Baloo Bhai.",
		"id" => $shortname."_font_h",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Font-family de body",
		"desc" => "Coloca la familia de fuentes que deseas mostrar en el <b>body</b>, incluído el font family.. Predeterminada Montserrat",
		"id" => $shortname."_font_body",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Texto del footer del sitio",
		"desc" => "Coloca aqui el texto que deseas que se muestre en el footer del sitio, como el aviso legal o informacion de Creative Commons.",
		"id" => $shortname."_textofooter",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Mostrar metadatos",
		"desc" => "Activar si deseas que el autor y fecha se muestren en los artículos y en las páginas",
		"id" => $shortname."_ocultar_fecha_y_autor",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Mostrar barra compartir al principio del post",
		"desc" => "Activar si deseas que la barra para compartir en redes sociales también aparezca al principio del post",
		"id" => $shortname."_start_sharebar",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "ID de Google Analytics",
		"desc" => "Introduce la ID de tu cuenta de Google Analitycs, solo el código, ejemplo: UA-11111111-1. ",
		"id" => $shortname."_gaid",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Metadata",
		"desc" => "Introduce aquí tus meta tags (Google Tag Maneger, Webmaster Tools).",
		"id" => $shortname."_metadata",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "CSS personalizado",
		"desc" => "<b>OBSOLETO</b> Si tienes algún CSS aquí, por favor pegalo en Apariencia > Personalizar > CSS Adicional.",
		"id" => $shortname."_customcss",
		"type" => "textarea",
		"std" => ""
		),
	array( 
		"name" => "Deshabilitar Comentarios",
		"desc" => "Deshabilitar comentarios en todo el sitio web.",
		"id" => $shortname."_deshabilitar_comentarios",
		"type" => "checkbox",
		"std" => ""
		),
	array( 
		"name" => "Tipo de comentarios",
		"desc" => "Que sistema de comentarios desea utilizar.",
		"id" => $shortname."_tipo_comentarios",
		"type" => "select",
		"options" => array('Wordpress','Facebook'),
		"std" => "Wordpress"
		),
	array( 
		"name" => "ID de aplicación de facebook",
		"desc" => "Coloca aquí el ID de la app de facebook.(Obligatorio en caso de utilizar comentarios de facebook.",
		"id" => $shortname."_facebook_app_id",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Cantidad de comentarios",
		"desc" => "Cantidad de comentarios que desea mostrar",
		"id" => $shortname."_ncomments",
		"type" => "number",
		"std" => ""
		),
	array( 
		"name" => "Ocultar avatares",
		"desc" => "Ocultar avatares de comentarios de Wordpress.",
		"id" => $shortname."_ocultar_avatares",
		"type" => "checkbox",
		"std" => ""
		),
	array( "type" => "close"),
	array( 
		"name" => "Social",
		"type" => "section"
		),

	array( "type" => "open" ),
	array( 
		"name" => "Facebook",
		"desc" => "Coloca aqui la dirección URL de su cuenta de Facebook. Ej: http://www.facebook.com/nombre_de_usuario.",
		"id" => $shortname."_facebook",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Instagram",
		"desc" => "Coloca aqui la dirección URL de su cuenta de Instagram. Ej: http://www.instagram.com/nombre_de_usuario.",
		"id" => $shortname."_instagram",
		"type" => "text",
		"std" => ""
		),
	array( 
		"name" => "Twitter",
		"desc" => "Coloca únicamente el nombre de usuario, sin arroba. Importante para que funcione el botón de compartir en Twitter. Ej: 'faciliusnet'",
		"id" => $shortname."_twitter",
		"type" => "text",
		"std" => ""
		),
	array( "type" => "close"),

	array( 
		"name" => "Incrustor",
		"type" => "section"
		),

	array( "type" => "open" ),
	array(
		"name" => "Incrustor de Posts",
		"type" => "separador"
		),
	array(
		"name" => 'Usar el incrustor de posts es muy fácil. solo tienes que colorcar el shortcode [facilius_incrustor categoria="slug-de-categoria" mostrar="n"]. Puedes incrustarlo en cualquier página o posts',
		"type" => "mensaje"
		),
	array( 
		"name" => "Mostrar",
		"desc" => "Elige entre mostrar imágenes con su título (a 3 columnas) o mostrar solo titulos (ancho completo).",
		"id" => $shortname."_incrustor_mostrar",
		"type" => "select",
		"options" => array('Imagen y título','Solo título'),
		"std" => "Solo título"
		),
	array( 
		"name" => "Etiqueta de título",
		"desc" => "Elige entre mostrar imágenes con su título (a 3 columnas) o mostrar solo titulos (ancho completo).",
		"id" => $shortname."_incrustor_etiqueta_titulo",
		"type" => "select",
		"options" => array('h1','h2','h3','h4','h5','h6'),
		"std" => "h3"
		),
	array( "type" => "close"),

);
function pagina_configuracion_facilius() {
	global $themename, $theme_options, $shortname;
    $i=0;
    $message=''; 
    if (isset($_REQUEST['action'])) {
	    if ( 'save' == $_REQUEST['action'] ) {

	        foreach ($theme_options as $value) {
				if(!isset($value['id'])){
					continue;
				}
				else{
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 	
				}
			}


	        $message='saved';
	    } 
	    else if ( 'reset' == $_REQUEST['action'] ) { 
	        foreach ($theme_options as $value) {
	            delete_option( $value['id'] ); 
	        }
	        $message='reset'; 
	    }     
	}
	$ads_ideas = array(

	array( 
		"name" => "Ideas de Anuncios",
		"type" => "title"
		),

	array( 
		"name" => "Anuncios",
		"type" => "section"
		),

	array( "type" => "open" ),
	array(
		"name" => "Slots de anuncios",
		"type" => "separador"
		),
	array( 
		"name" => "Anuncios",
		"desc" => 	'Ideas para los colores de anuncios: <div style="background:'.get_option('header_background').';text-align:center;"><h2 style="color:'.get_option('menu_link_color').'; margin-bottom:0;">(Para el slot 1) Color de titulo:'.get_option('menu_link_color').'<p style="font-size:.6em;margin-top:0; color:'.get_option('secondary_color').'">Color de enlace: '.get_option('secondary_color').'</p><p>Color de Texto</p><p>color de fondo:'.get_option('header_background').'</p></div>',
		"id" => $shortname."_demo_anuncios",
		"type" => "code",
		"std" => ""
		),
	array( 
		"name" => "Anuncios dos",
		"desc" => 	'<div style="background:'.get_option('body_background').';text-align:center;"><h2 style="color:'.get_option('header_background').'; margin-bottom:0;">Color de titulo:'.get_option('header_background').'<p style="font-size:.6em;margin-top:0; color:'.get_option('secondary_color').'">Color de enlace: '.get_option('secondary_color').'</p><p style="color:'.get_option('header_border').'">Color de Texto: '.get_option('header_border').'</p><p>color de fondo:'.get_option('body_background').'</p></div>',
		"id" => $shortname."_demo_anuncios_dos",
		"type" => "code",
		"std" => ""
		),

	array( "type" => "close"),
	);
    ?>
    <script type="text/javascript">
    $(function(){
        $('#tabs').tabs();
    });
</script>

<h1>Configuración <?php echo $themename; ?></h1>
        <?php  if ( $message=='saved' ){
				 echo "<p class='updated'> Ajustes guardados en ".$themename.'.</p>';
			}
	        if ( $message=='reset' ) echo '<p class="updated">  
			Ajustes reseteados en '.$themename.'</p>';
			
        ?>

    <div class="wrap wrapfacilius">

		<div class="content_options">
			<form method="post">
				<div id="tabs">
					<ul>	
						<?php foreach ($theme_options as $value) {
							if ($value['type'] == 'section') {
							echo '<li><a href="#tabs-'.$value['name'].'">';
							switch($value['name']){
								case 'SEO':
								echo 'SEO';
								break;
								case 'Anuncios':
								echo 'Anuncios';
								break;
								case 'Social':
								echo 'Social';
								break;
								case 'AMP':
								echo 'AMP';
								break;
								case 'Otros':
								echo 'Otros';
								break;
								case 'Incrustor':
								echo 'Incrustor';
								break;
								default:
									echo $value['name'];
								break;

							}
							echo '</a></li>';
							}

					    } ?>					    
					</ul>
			<?php foreach ($theme_options as $value) {
				switch ( $value['type'] ) {
					case "open": ?>
				</h2>
					<?php break;
					case "separador": ?>
						<h3 class="separador"><?php echo $value['name']; ?></h3>
					<?php 	break;
					case "mensaje": ?>
						<p class="separador"><?php echo $value['name']; ?></p>
					<?php 	break;
					case "close":
					$i++; ?>
							</div>
							<div class="guardarcambios"><input name="save<?php echo $i; ?>" type="submit" class="buttonsubmit" value="Guardar cambios" /></div>
							<div class="guardarcambiosflotante"><input name="save<?php echo $i; ?>" type="submit" class="buttonsubmit" value="Guardar cambios" /></div>
							<div class="clearfix"></div>

						</div>

					<?php break;
					case "docs": ?>

					<?php break;
					case "title": ?>

					<?php break;
					case "code": 
					echo $value['desc'];
					break;
					case 'text': ?>
						<div class="option_input option_text">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "" ) { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case 'number': ?>
						<div class="option_input option_number">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "" ) { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" min="<?php echo $value['min']; ?>" max="<?php echo $value['max']; ?>" />
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case 'color': ?>
						<div class="option_input option_text">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<input id="" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "" ) { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" class="my-color-field" data-default-color="<?php echo $value['std']; ?>" />
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case 'textarea': ?>
						<div class="option_input option_textarea">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<small><?php echo $value['desc']; ?></small>
							<textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
							
							<div class="clearfix"></div>
						</div>
					<?php break;
					case 'select': ?>
						<div class="option_input option_select">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
							<?php foreach ($value['options'] as $option) { ?>
							    <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
							<?php } ?>
							</select>
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case 'select_ads': ?>
						<div class="option_input option_select">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
							<?php foreach ($value['options'] as $option) { ?>
							    <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
							<?php } ?>
							</select>
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case "checkbox": ?>
						<div class="option_input option_checkbox">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
							<input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case 'select_categorias': ?>
						<div class="option_input option_select">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<?php wp_dropdown_categories(array('hide_empty' => 0, 'name' => 'category_parent', 'orderby' => 'name', 'selected' => $category->parent, 'hierarchical' => true, 'show_option_none' => __('None'))); ?>
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;
					case "section": 
					 ?>
						<div id="<?php  echo 'tabs-'.$value['name'];?>" class="input_section">

							<div class="all_options">
					<?php break;
				}
			}
			?>
			<input type="hidden" name="action" value="save" />
			</form>
			<form method="post">
			<span class="submit">
			<input name="reset" type="submit" class="button" value="Reset" />
			<input type="hidden" name="action" value="reset" />
			</span>
	
			</form>

		</div> <!-- tabs -->

		</div>
		
			<div class="adminsidebar">
				<div class="facilius-soporte">
					<h2>¿Tienes algun problema o duda?</h2>
					<a href="http://docs.facilius.net/" target="_blank" class="facilius-boton-admin">📃 Documentación</a>
					
					<a href="https://facilius.net/soporte" target="_blank" class="facilius-boton-admin">👨‍💻 Soporte</a>

				</div>
				<div class="hosting-raiola">
					<h2>¿Tu hosting va lento?</h2>
					<img src="<?php echo get_template_directory_uri(); ?>/img/raiola-logotipo.png">
					<p><b>Facilius</b> recomienda los servicios de Raiola Networks.</p>
					<ul>
						<li>Desde 5,95€ al mes</li>
						<li>Soporte telefónico</li>
						<li>Migración gratis</li>
					</ul>
					<div class="raiola-cta">
						<a href="https://gestiondecuenta.eu/aff.php?aff=2424" target="_blank" class="facilius-boton-raiola">CONTRATAR HOSTING</a>
					</div>
					
				</div>
			</div>
	</div>
		<div class="footer-credit">
			<p class="enlace"><a href="http://facilius.net"><img width="200" src="<?php echo get_template_directory_uri(); ?>/img/facilius-logo-dark.png"/></a></p>
		</div>
    <?php
}
function slot_ocho(){
	$slot_ocho  = get_option('facilius_slot_ocho');
	$slot_ocho_align = get_option('facilius_slot_ocho_align');
	return '<div class="slotocho '.$slot_ocho_align.'" >'.stripcslashes($slot_ocho)."</div>";
}
add_shortcode( 'slotocho', 'slot_ocho' );
function slot_nueve(){
	$slot_nueve  = get_option('facilius_slot_nueve');
	$slot_nueve_align = get_option('facilius_slot_nueve_align');
	return '<div class="slotnueve '.$slot_nueve_align.'" >'.stripcslashes($slot_nueve)."</div>";
}
add_shortcode( 'slotnueve', 'slot_nueve' );
function slot_diez(){
	$slot_diez  = get_option('facilius_slot_diez');
	$slot_diez_align = get_option('facilius_slot_diez_align');
	return '<div class="slotdiez '.$slot_diez_align.'" >'.stripcslashes($slot_diez)."</div>";
}
add_shortcode( 'slotdiez', 'slot_diez' );
function facilius_documentacion(){ ?>
	<h2 class="separadores">Información:</h2>
	<p>Nichopresss v1.7</p>
	<p>Para soporte visita <a href="https://facilius.net/soporte">Facilius</a> o contacta por skype a ch3.es</p>
	<br />
	<h2>Changelog:</h2>
	<ul>
		<li>Primera versión liberada 15/10/2014</li>
		<li><b>Versión 0.0.1 - 26/10/2014</b></li>
		<li>Reduccion del tamaño del sidebar</li>
		<li>Se añade el generador de ideas para colores de anuncios</li>
		<li><b>Version 1.5.1</b></li>
		<li>Corregido bug menor de incompatibilidad con versiones viejas de PHP</li>
        <li>Corregido error al seleccionar menus</li>
        <li>Paginacion movida a debajo de los posts en moviles</li>
		<li><b>Version 1.5.2</b></li>
		<li>Añadida opción para personalizar texto de botón "leer más" por post.</li>
        <li>Corregido posicionamiento de sidebar en responsive.</li>
        <li>Opción para desactivar el botón "leer más".</li>
        <li>Añadida la pestaña "Incrustor" al panel facilius.</li>
		<li><b>Version 1.5.3</b></li>
		<li>Agregados botones para agregar shortcode de incrustor en posts y páginas.</li>
        <li>Corregidos bugs.</li>
		<li><b>Version 1.5.4</b></li>
		<li>Nueva opción de estilo para menú responsive.</li>
		<li><b>Version 1.5.5</b></li>
		<li>Nueva opción en la pestaña SEO para seleccionar tag para título de páginas y posts.</li>
		<li><b>Version 1.6.0</b></li>
		<li>Eliminación del sidebar.</li>
		<li>Nuevo diseño.</li>
		<li>Actualizaciones automaticas 🎉</li>
		<li><b>Version 1.6.6 versión de mantenimiento</b></li>
		<li>Arreglado borde del footer.</li>
		<li>Arreglado suiche de barra de compartir al inicio.</li>
		<li>Solucionado problema de boton de búsqueda en el footer.</li>
		<li>Solucionado color de borde del footer</li>
		<li>Fondo predeterminado de cabecera cambiado a blanco.</li>
		<li>Arreglado suiche de migas de pan.</li>
		<li>Reajustado el padding en moviles</li>
		<li><b>Version 1.6.7 - NOVEDADES 📢</b></li>
		<li><strong>Creado footer sidebar</strong> para añadir Widgets</li>
		<li>Attachment.php creado en el tema</li>
		<li>Posibilidad de ocultar el buscador</li>
		<li>Eliminadas las mayúsculas forzadas del menú del header</li>
		<li>CSS personalizado obsoleto, <strong>por favor mover al personalizador</strong> de WordPress</li>
		<li><b>Version 1.6.8 - NOVEDADES 📢</b></li>
		<li>Lanzada primera versión de navegación por carrusel</li>
		<li>Reparación de bugs en botones de compartir</li>
		<li>Importante: cambia la configuración del usuario de twitter en la pestaña "Social".</li>
		<li>Compatibilidad de breadcrumbs con Rank Math.</li>
		<li>Dismunición de 0.1em en tamaño de fuente del texto.</li>
		<li><b>Version 1.7 - NOVEDADES 📢</b></li>
		<li>Navegación por carrusel completa - Individuales y por shortcode</li>
		<li>Fuentes personalizadas</li>
		<li>Sidebar opcional</li>
		




	</ul><?php 
}
function facilius_ideas(){ 	?>

		<h1>Ideas de anuncios:</h1>
		<section class="wrap ideas">
		<h2 class="separador">Ideas para los colores de anuncios:</h2>
			<div class="ad-idea" style="background:<?php echo get_option('header_background')?>;">
				<h2><a href="#" style="color:<?php echo get_option('primary_color'); ?>;">Book A Hotel Tonight</a></h2>
				<p>Special Rates Until The End Of The Month. No Booking Fees.</p>
				<p><a href="#" class="btn" style="background:<?php echo get_option('secondary_color'); ?>;"> > </a></p>
			</div>
			<div class="ad-idea" style="background:<?php echo get_option('body_background'); ?>;">
				<h2 ><a href="#" style="color:<?php echo get_option('secondary_color'); ?>;">Book A Hotel Tonight</a></h2>
				<p style="color:<?php echo get_option('header_border');?>">Special Rates Until The End Of The Month. No Booking Fees.</p>
				<p><a href="#" class="btn" style="background: <?php echo get_option('primary_color'); ?>"> > </a></p>
			</div>
		</section>
		<section class="wrap ideas">

			<div class="ad-idea-info">
				<h2>Color de título: <span style="background:<?php echo get_option('primary_color'); ?>;"></span><?php echo get_option('primary_color'); ?></h2>
				<p>Color de fondo: <span style="background:<?php echo get_option('header_background')?>"></span><?php echo get_option('header_background')?></p>
				<p>Color de texto: <span style="background:#000"></span>#000000</p>
				<p>Color de botón: <span style="background:<?php echo get_option('secondary_color'); ?>"></span><?php echo get_option('secondary_color'); ?></p>
			</div>
			<div class="ad-idea-info">
				<h2>Color de título: <span style="background:<?php echo get_option('secondary_color'); ?>;"></span><?php echo get_option('secondary_color'); ?></h2>
				<p>Color de fondo: <span style="background:<?php echo get_option('body_background'); ?>"></span><?php echo get_option('body_background'); ?></p>
				<p>Color de texto: <span style="background:<?php echo get_option('header_border');?>"></span><?php echo get_option('header_border');?></p>
				<p>Color de botón: <span class="btn" style="background:<?php echo get_option('primary_color'); ?>"></span><?php echo get_option('primary_color'); ?></p>
			</div>
		</section>
		<?php } ?>