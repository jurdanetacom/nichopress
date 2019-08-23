<?php 

function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}



if ( ! function_exists('facilius_links_carrusel') ) {

// Register Custom Post Type
function facilius_links_carrusel() {

	$labels = array(
		'name'                  => _x( 'Cartas', 'Post Type General Name', 'nichopress' ),
		'singular_name'         => _x( 'Cartas', 'Post Type Singular Name', 'nichopress' ),
		'menu_name'             => __( 'Cartas Facilius', 'nichopress' ),
		'name_admin_bar'        => __( 'Carta de Facilius', 'nichopress' ),
		'archives'              => __( 'Item Archives', 'nichopress' ),
		'attributes'            => __( 'Item Attributes', 'nichopress' ),
		'parent_item_colon'     => __( 'Parent Item:', 'nichopress' ),
		'all_items'             => __( 'Todas las cartas', 'nichopress' ),
		'add_new_item'          => __( 'Agregar nueva carta', 'nichopress' ),
		'add_new'               => __( 'Agregar carta', 'nichopress' ),
		'new_item'              => __( 'Nuevo carta', 'nichopress' ),
		'edit_item'             => __( 'Editar carta', 'nichopress' ),
		'update_item'           => __( 'Actualizar carta', 'nichopress' ),
		'view_item'             => __( 'Ver cartas', 'nichopress' ),
		'view_items'            => __( 'View Items', 'nichopress' ),
		'search_items'          => __( 'Search Item', 'nichopress' ),
		'not_found'             => __( 'No encontrado', 'nichopress' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nichopress' ),
		'featured_image'        => __( 'Imagen Destacada', 'nichopress' ),
		'set_featured_image'    => __( 'Colocar imagen destacada', 'nichopress' ),
		'remove_featured_image' => __( 'Quitar imagen destacada', 'nichopress' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'nichopress' ),
		'insert_into_item'      => __( 'Insert into item', 'nichopress' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'nichopress' ),
		'items_list'            => __( 'Items list', 'nichopress' ),
		'items_list_navigation' => __( 'Items list navigation', 'nichopress' ),
		'filter_items_list'     => __( 'Filter items list', 'nichopress' ),
	);
	$args = array(
		'label'                 => __( 'Enlace', 'nichopress' ),
		'description'           => __( 'Crea cartas con enlaces individuales', 'nichopress' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'Carrusel' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'http://d.co/wp-content/themes/nichopress/img/favicon-16x16.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'facilius_links', $args );

}
add_action( 'init', 'facilius_links_carrusel', 0 );

// REMOVER YOAST DEL POST TYPE
function facilius_wp_seo_meta_box() {
    remove_meta_box('wpseo_meta', 'facilius_links', 'normal');
    remove_meta_box('rank_math_metabox', 'facilius_links', 'normal');
    remove_meta_box('rank_math_metabox_link_suggestions', 'facilius_links', 'side');
    
    
}
add_action('add_meta_boxes', 'facilius_wp_seo_meta_box', 100);


/* TAXONOMIA DE CARRUSEL */
function facilius_carrusel_init() {
	// create a new taxonomy
	register_taxonomy(
		'carrusel',
		'facilius_links',
		array(
            'label' => __( 'Carruseles' ),
            'show_admin_column' => true,
            'name' => __('Carruseles'),
            'add_new_item' => __( 'Agregar Carrusell' ),
            'popular_items' => __('Carruseles populares')
			/*'rewrite' => array( 'slug' => 'person' ),
			'capabilities' => array(
				'assign_terms' => 'edit_guides',
				'edit_terms' => 'publish_guides'
			)*/
		)
	);
}
add_action( 'init', 'facilius_carrusel_init' );






}



add_action( 'load-post.php', 'facilius_cartas_meta_boxes_setup' );
add_action( 'load-post-new.php', 'facilius_cartas_meta_boxes_setup' );


function facilius_cartas_meta_boxes_setup() {
    add_action( 'add_meta_boxes', 'facilius_add_cartas_meta_boxes' );
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'facilius_save_cartas_meta', 10, 2 );
}
  function facilius_add_cartas_meta_boxes() {
    add_meta_box(
      'facilius_cartas_metabox',
      esc_html__( 'Configuracion Carta Facilius', 'nichopress' ),
      'facilius_cartas_meta_boxes',
      'facilius_links',         
      'normal', 
      'default'
    );
  }
  function facilius_cartas_meta_boxes( $post ) { 
      $text = esc_attr( get_post_meta( $post->ID, 'facilius_cartas_url', true ) );
     // $check = esc_attr( get_post_meta( $post->ID, 'facilius_hide_leer_mas', true ) );
      //$ads = esc_attr( get_post_meta( $post->ID, 'facilius-ocultar-anuncios', true ) );
      wp_nonce_field( basename( __FILE__ ), 'facilius_cartas_url_nonce' ); ?>
      <table>
          <tr>
              <!--<td><label for="facilius-hide-leer-mas"><?php _e( "Desactivar el botón leer más", 'nichopress' ); ?></label></td>
              <td><input type="checkbox" name="facilius-hide-leer-mas" id="facilius-hide-leer-mas" <?php checked( $check, 'on' ); ?> /></td>-->
          </tr>
          <tr>
              <td><label for="facilius-leer-mas"><?php _e( "Escribe la URL a enlazar", 'nichopress' ); ?></label></td>
              <td><input class="widefat" type="text" name="facilius-cartas-url" id="facilius-cartas-url" value="<?php echo $text; ?>" /></td>
          </tr>
          <!--<tr>
              <td><label for="facilius-ocultar-anuncios"><?php _e( "Ocultar Anuncios", 'facilius' ); ?></label></td>
              <td><input type="checkbox" name="facilius-ocultar-anuncios" id="facilius-ocultar-anuncios" <?php checked( $ads, 'on' ); ?> /></td>
          </tr>-->
      </table>
    <?php 
  } 
  function facilius_save_cartas_meta( $post_id, $post ) {
    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['facilius_cartas_url_nonce'] ) || !wp_verify_nonce( $_POST['facilius_cartas_url_nonce'], basename( __FILE__ ) ) )
      return $post_id;
      /* Get the post type object. */
      $post_type = get_post_type_object( $post->post_type );
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;
      /* Get the meta key. */
      //$meta_key = array('facilius_hide_leer_mas', 'facilius_cartas_url', 'facilius-ocultar-anuncios');
      $meta_key = array('facilius_cartas_url');
      
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
  
  

/**CONSTRUCTOR DE CARRUSELL */

function facilius_mostrar_carrusel($carruselslug){
    if($carruselslug == 'todo'){
        $args = array (
            'post_type'              => 'facilius_links',
            'post_status'            => array( 'publish' ),
            'nopaging'               => true,

        );          
    }
    else{
        $args = array (
            'post_type'              => 'facilius_links',
            'post_status'            => array( 'publish' ),
            'nopaging'               => true,
            'tax_query' => array(
                array (
                    'taxonomy' => 'carrusel',
                    'field' => 'slug',
                    'terms' => $carruselslug,
                )
            )
        );       
    }

        // The Query
        $facilius_cartas = new WP_Query( $args );

        // The Loop
        $color_primario = hex2RGB(get_option('primary_color'),true) ; 
        $carrusel_output= "<script type='module'>
            var slider = tns({
            container: '.facilius-slider-".$carruselslug."',
            items: 3,
            swipeAngle: 40,
            controls: false,
            center: true,
            slideBy: 'page',
            autoplay: false,
            fixedWidth: 170,
            mouseDrag: true,
            loop: false,
            nav:false
            });
        </script>";

    

        $carrusel_output.= '<nav>
        <ul class="facilius-carrusel facilius-slider-'.$carruselslug.'">';
        if ( $facilius_cartas->have_posts() ) {
            while ( $facilius_cartas->have_posts() ) {
                $facilius_cartas->the_post();

                if(has_post_thumbnail(get_the_ID())){

                    $styles='style="background:radial-gradient(
                        rgba('.$color_primario.',0.5),  
                        rgba('.$color_primario.',0.5)
                    ),url('.get_the_post_thumbnail_url(get_the_ID(),'thumbnail').');background-size: cover;"';
                }
                else{
                    $styles=null;
                }
                $carrusel_output.= '<li> <a href="'.get_post_meta(get_the_ID(),'facilius_cartas_url',true).'" class="card facilius-carta" '.$styles.' ><span class="textointerior">';

                $carrusel_output.= get_the_title();
                $carrusel_output.= '</span></a> </li>';
            }
        } else {
            // no posts found
        }
        $carrusel_output.= '</ul></nav>';

        // Restore original Post Data
        wp_reset_postdata();  
        return $carrusel_output;
}


/**
 * META BOX PERSONALIZADOS
 */

 
function nichopress_create_carrusel_metabox() {

	// Can only be used on a single post type (ie. page or post or a custom post type).
	// Must be repeated for each post type you want the metabox to appear on.
	add_meta_box(
		'nichopress_carrusel_metabox', // Metabox ID
		'Facilius carrusel', // Title to display
		'nichopress_render_carrusel_metabox', // Function to call that contains the metabox content
		'post', // Post type to display metabox on
		'normal', // Where to put it (normal = main colum, side = sidebar, etc.)
		'default' // Priority relative to other metaboxes
	);

	// To add the metabox to a page, too, you'd repeat it, changing the location
	add_meta_box( 
        'nichopress_carrusel_metabox', // Metabox ID
		'Facilius carrusel', // Title to display
		'nichopress_render_carrusel_metabox', // Function to call that contains the metabox content
		'page', // Post type to display metabox on
		'normal', // Where to put it (normal = main colum, side = sidebar, etc.)
		'default' // Priority relative to other metaboxes       
    );

}
add_action( 'add_meta_boxes', 'nichopress_create_carrusel_metabox' );

function nichopress_render_carrusel_metabox(){
    global $post;
    $nichopress_carrusel = get_post_meta( $post->ID, 'nichopress_carrusel', true );
     ?>
    		<fieldset>
			<div>
				<label for="nichopress_create_carrusel_metabox">
					<?php
						// This runs the text through a translation and echoes it (for internationalization)
						_e( 'Selecciona el carrusel a mostrar', 'nichopress' );
					?>
				</label>

            <select name="nichopress_create_carrusel_metabox" id="nichopress_create_carrusel_metabox">
                
                <option value="predeterminado" style="font-weight:bold" <?php if($nichopress_carrusel == 'predeterminada'){ echo 'selected'; } ?>>Predeterminado</option>
                <option value="ocultar" style="color:red;" <?php if($nichopress_carrusel == 'ocultar'){ echo 'selected'; } ?>>Ninguno</option>

                <?php   $tax_terms = get_terms('carrusel', array('hide_empty' => '0'));      
                foreach ( $tax_terms as $tax_term ):  
                    echo '<option value="'.$tax_term->name.'"'; if($tax_term->name == $nichopress_carrusel){ echo "selected";} echo' >'.$tax_term->name.'</option>';   
                endforeach;
                ?>
            </select> 
            <p>📢 Configura el carrusel predeterminado en el panel de facilius, en la pestaña "otros."</p>
            <p>👀 Si no quieres mostrar ningún carrusel, selecciona "Ninguno".</p>
            <p>⚠ Si usas gutenberg, debes refrescar la página para mostrar cambios en el carrusel.  </p>
			</div>
		</fieldset>

	<?php
	wp_nonce_field( 'nichopress_metabox_process_nonce', 'nichopress_metabox_process' ); 

}



function nichopress_save_metabox( $post_id, $post ) {

	// Verify that our security field exists. If not, bail.
	if ( !isset( $_POST['nichopress_metabox_process'] ) ) return;

	// Verify data came from edit/dashboard screen
	if ( !wp_verify_nonce( $_POST['nichopress_metabox_process'], 'nichopress_metabox_process_nonce' ) ) {
		return $post->ID;
	}

	// Verify user has permission to edit post
	if ( !current_user_can( 'edit_post', $post->ID )) {
		return $post->ID;
	}

	// Check that our custom fields are being passed along
	// This is the `name` value array. We can grab all
	// of the fields and their values at once.
	if ( !isset( $_POST['nichopress_create_carrusel_metabox'] ) ) {
		return $post->ID;
	}
	/**
	 * Sanitize the submitted data
	 * This keeps malicious code out of our database.
	 * `wp_filter_post_kses` strips our dangerous server values
	 * and allows through anything you can include a post.
	 */
	$sanitized = wp_filter_post_kses( $_POST['nichopress_create_carrusel_metabox'] );
	// Save our submissions to the database
	update_post_meta( $post->ID, 'nichopress_carrusel', $sanitized );

}
add_action( 'save_post', 'nichopress_save_metabox', 1, 2 );


function facilius_carrusel_shortcode($atts){   
    $carrusel_default= 'home';
    $a = shortcode_atts( array(
        'slug' => '',
    ), $atts );
    

   return facilius_mostrar_carrusel($a['slug']);

}
add_shortcode( 'carrusel', 'facilius_carrusel_shortcode');


function facilius_carrusel_navegacion(){
    $carruselquery = get_post_meta(get_queried_object_id(),'nichopress_carrusel');
    if(! isset($carruselquery[0])){
        $carruselquery[0] = null;
    }
    switch($carruselquery[0]){
        case 'predeterminado':
        
            $predeterminado = get_option('facilius_carrusel_predeterminado');
            if($predeterminado){
                echo facilius_mostrar_carrusel($predeterminado);
            }
            else{
                echo facilius_mostrar_carrusel('todo');
            }
        break;
        case 'predeterminada':
            $predeterminado = get_option('facilius_carrusel_predeterminado');
            if($predeterminado){
                echo facilius_mostrar_carrusel($predeterminado);
            }
            else{
                echo facilius_mostrar_carrusel('todo');
            }
        break;
        case 'ocultar':
            echo ' ';
        break;
        case '':
        
            $predeterminado = get_option('facilius_carrusel_predeterminado');
            if($predeterminado){
                echo facilius_mostrar_carrusel($predeterminado);
            }
            else{
                echo facilius_mostrar_carrusel('todo');
            }
        break;
        case null:
            $predeterminado = get_option('facilius_carrusel_predeterminado');
            if($predeterminado){
                echo facilius_mostrar_carrusel($predeterminado);
            }
            else{
                echo facilius_mostrar_carrusel('todo');
            }
        break;
        default:
            echo facilius_mostrar_carrusel($carruselquery[0]);
        break;
    }

	
 

}