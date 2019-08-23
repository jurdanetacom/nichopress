<?php
class customizer {

	public static function register ( $wp_customize ) {

		$theme = get_stylesheet();

		$wp_customize->add_panel( 'header_options', array(
			'priority'       => 30,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores y configuración Header', 'nichopress'),
			'description'    => __('Opciones del Header', 'nichopress'),

		) );
		$wp_customize->add_section( 'header_bg_colors', array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores de Fondo', 'nichopress'),
			'description'    =>  __('Header elements configuration', 'nichorpress'),
			'panel'  => 'header_options',
		) );
		$wp_customize->add_setting(
			'header_background', array(
			'default' => '#ffffff',
			'type' => 'option', 
			'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background', 
			array('label' => __('Fondo - Cabecera'), 
				'section' => 'header_bg_colors',
				'settings' => 'header_background',
				'priority' => 2)
			)
		);
		$header_bg_colors = array();
		/*$header_bg_colors[] = array(
			'slug'=>'header_menu_background', 
			'default' => '',
			'label' => __('Fondo - Menú principal')
		);*/
		$header_bg_colors[] = array(
			'slug'=>'header_border', 
			'default' => '',
			'label' => __('Color de Borde - Header')
		);

		foreach($header_bg_colors as $color) {
			$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
					'section' => 'header_bg_colors',
					'settings' => $color['slug'])
				)
			);
		}

		$wp_customize->add_section( 'header_text_colors', array(
			'priority'       => 2,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores de Texto', 'nichorpress'),
			'description'    =>  __('Header elements configuration', 'nichorpress'),
			'panel'  => 'header_options',
		) );
		$header_text_colors = array();

		$header_text_colors[] = array(
			'slug'=>'menu_link_color', 
			'default' => '#000000',
			'label' => __('Color del menu')
		);

		foreach( $header_text_colors as $color ) {
			$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
					'section' => 'header_text_colors',
					'settings' => $color['slug'])
				)
			);
		}

		$wp_customize->add_section( 'header_config' , array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Configuración', 'nichorpress'),
			'description'    =>  __('Elementos del header', 'nichopress'),
			'panel'  => 'header_options',			
		));		

		$header_options = array();
		$header_options[] = array(
			'slug'=>'facilius_ocultar_redes_header', 
			'label' => __('Ocultar Redes Sociales'),
			'type' => 'checkbox',
			'default' => false,
		);
		$header_options[] = array(
			'slug'=>'facilius_ocultar_buscador', 
			'label' => __('Ocultar buscador'),
			'type' => 'checkbox',
			'default' => false,
		);

		$header_options[] = array(
			'slug'=>'facilius_tipo_menu_responsive',
			'default' => 'slide-in', 
			'label' => __('Tipo Menú Responsive'),
			'type' => 'radio',
			'choices'  => array(
				'normal' => esc_html__( 'Normal', 'nichopress' ),
				'slide-in' => esc_html__( 'Slide in', 'nichopress' ),
			)
		);
		
		foreach ($header_options as $option) {
			$wp_customize->add_setting($option['slug'], array(
				'default' => $option['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$option['slug'], 
					array('label' => $option['label'], 
						'section' => 'header_config',
						'settings' => $option['slug'],
						'type' => $option['type'],
						'choices'  => $option['choices'],
					)
				)
			);
		}

		$wp_customize->add_panel( 'footer_options', array(
			'priority'       => 32,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores y configuración del footer', 'nichopress'),
			'description'    => __('Opciones del Footer', 'nichopress'),

		) );
		$wp_customize->add_section( 'footer_bg_colors', array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores de Fondo', 'nichorpress'),
			'description'    =>  __('Footer elements configuration', 'nichorpress'),
			'panel'  => 'footer_options',
		) );
		$footerbgcolors[] = array(
			'slug'=>'footer_background', 
			'default' => '#252525',
			'label' => __('Fondo - Footer')
		);
		$footerbgcolors[] = array(
			'slug'=>'footer_border', 
			'default' => '#3cb878',
			'label' => __('Color de Borde - Footer')
		);	

		foreach($footerbgcolors as $color){
			$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
					'section' => 'footer_bg_colors',
					'settings' => $color['slug'])
				)
			);
		}

		$wp_customize->add_section( 'footer_text_colors', array(
			'priority'       => 2,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores de Texto', 'nichorpress'),
			'description'    =>  __('Footer elements configuration', 'nichorpress'),
			'panel'  => 'footer_options',
		) );
		$footer_text_colors[] = array(
			'slug'=>'footer_menu_color', 
			'default' => '',
			'label' => __('Menú Pié de Página')
		);
		$footer_text_colors[] = array(
			'slug'=>'footer_links_color', 
			'default' => '#ffffff',
			'label' => __('Color links de Footer (Widgets)')
		);
		$footer_text_colors[] = array(
			'slug'=>'footer_titulo_texto_color', 
			'default' => '#ffffff',
			'label' => __('Color links de titulos y textos')
		);
		$footer_text_colors[] = array(
			'slug'=>'footer_menu_hover_color', 
			'default' => '',
			'label' => __('Menú Pié de Página (Seleccionado/Hover)')
		);
		$footer_text_colors[] = array(
			'slug'=>'footer_social_color', 
			'default' => '',
			'label' => __('Redes sociales')
		);
		$footer_text_colors[] = array(
			'slug'=>'footer_social_hover_color', 
			'default' => '',
			'label' => __('Redes sociales (Seleccionado/Hover)')
		);
		$footer_text_colors[] = array(
			'slug'=>'footer_text_color', 
			'default' => '',
			'label' => __('Texto Footer')
		);

		foreach($footer_text_colors as $color){
			$wp_customize->add_setting(
				$color['slug'], array(
					'default' => $color['default'],
					'type' => 'option', 
					'capability' => 'edit_theme_options'
					)
				);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
					'section' => 'footer_text_colors',
						'settings' => $color['slug'])
					)
			);
		}

		$wp_customize->add_section( 'footer_config' , array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Configuración', 'nichorpress'),
			'description'    =>  __('Footer elements configuration', 'nichorpress'),
			'panel'  => 'footer_options',			
		));		

		$wp_customize->add_setting(
			'footer-logo', array(
					'default' => '',
					'type' => 'option', 
					'capability' => 'edit_theme_options'
					)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
			$wp_customize,
			'footer_config', 
			array('label' => __('Logo Footer (150x40)'), 
				'section' => 'footer_config',
				'settings' => 'footer-logo')
			)
		);
		$footer_options = array();
		$footer_options[] = array(
			'slug'=>'facilius_ocultar_redes_footer', 
			'label' => __('Ocultar Redes Sociales'),
			'type' => 'checkbox',
			'default' => false,
		);

		foreach ($footer_options as $option) {
			$wp_customize->add_setting($option['slug'], array(
				'default' => $option['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$option['slug'], 
					array('label' => $option['label'], 
						'section' => 'footer_config',
							'settings' => $option['slug'],
							'type' => $option['type'],
						)
				)
			);

		}

		$wp_customize->add_panel( 'body_options', array(
			'priority'       => 31,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores y configuración del cuerpo', 'nichopress'),
			'description'    => __('Opciones del Body', 'nichopress'),
			) 
		);
		$wp_customize->add_section( 'body_bg_colors', array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores de Fondo', 'nichorpress'),
			'description'    =>  __('Body elements configuration', 'nichorpress'),
			'panel'  => 'body_options',
			) 
		);
		$body_bg_colors = array();
		$body_bg_colors[] = array(
			'slug'=>'body_background', 
			'default' => '#ffffff',
			'label' => __('Color de Fondo')
		);
		$body_bg_colors[] = array(
			'slug'=>'primary_color', 
			'default' => '#3cb878',
			'label' => __('Color Primario')
		);
		$body_bg_colors[] = array(
			'slug'=>'secondary_color', 
			'default' => '#2a965f',
			'label' => __('Color Secundario')
		);

		foreach($body_bg_colors as $color) {
			$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
					'section' => 'body_bg_colors',
					'settings' => $color['slug'])
				)
			);
		}

		$wp_customize->add_section( 'body_text_colors', array(
			'priority'       => 2,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Colores de Texto', 'nichorpress'),
			'description'    =>  __('Body elements configuration', 'nichorpress'),
			'panel'  => 'body_options',
			) 
		);
		$body_text_colors = array();
		$body_text_colors[] = array(
			'slug'=>'body_title_color', 
			'default' => '#4e4e4e',
			'label' => __('Título Publicación')
		);
		$body_text_colors[] = array(
			'slug'=>'body_font_color', 
			'default' => '#727171',
			'label' => __('Texto Publicación')
		);
		$body_text_colors[] = array(
			'slug'=>'label_color', 
			'default' => '#ffffff',
			'label' => __('Texto Etiqueta/Botón')
		);

		foreach($body_text_colors as $color) {
			$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
					'section' => 'body_text_colors',
					'settings' => $color['slug'])
				)
			);
		}

	if($theme == 'nichopress') {
		$wp_customize->add_section( 'post-layout' , array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Layout de Posts', 'nichorpress'),
			'description'    =>  __('Configura las opciones del los posts en el loop', 'nichorpress'),
			'panel'  => 'body_options',
			)
		);

		$layout_options = array();

		$layout_options[] = array(
			'slug'=>'index_post_layout', 
			'default' => 'vertical',
			'label' => __('Diseño de posts en blog'),
			'type' => 'radio',
			'choices'  => array(
				'vertical' => esc_html__( 'Vertical', 'nichopress' ),
				'horizontal' => esc_html__( 'Horizontal', 'nichopress' ),
				'sin-imagen' => esc_html__( 'Sin imagen', 'nichopress' ),
			)		
		);
		$layout_options[] = array(
			'slug'=>'category_post_layout', 
			'default' => 'vertical',
			'label' => __('Diseño de posts en categorías'),
			'type' => 'radio',
			'choices'  => array(
				'vertical' => esc_html__( 'Vertical', 'nichopress' ),
				'horizontal' => esc_html__( 'Horizontal', 'nichopress' ),
				'sin-imagen' => esc_html__( 'Sin imagen', 'nichopress' ),
			)
		);
		$layout_options[] = array(
			'slug'=>'facilius_ocultar_leer_mas', 
			'label' => __('Ocultar botón leer más en loop (global)'),
			'type' => 'checkbox',
		);
		$layout_options[] = array(
			'slug'=>'facilius_ocultar_categoria_loop', 
			'default'=> false,
			'label' => __('Ocultar link a categorias en loop'),
			'type' => 'checkbox',
		);
		$layout_options[] = array(
			'slug'=>'facilius_ocultar_comentarios', 
			'default'=> false,
			'label' => __('Ocultar número de comentarios en loop'),
			'type' => 'checkbox',
		);
		$layout_options[] = array(
			'slug'=>'facilius_ocultar_fecha_loop',
			'default'=> false,
			'label' => __('Ocultar fecha en loop'),
			'type' => 'checkbox',
		);
		$layout_options[] = array(
			'slug'=>'facilius_ocultar_post_relacionados',
			'default'=> false,
			'label' => __('Ocultar posts relacionados'),
			'type' => 'checkbox',
		);


		foreach( $layout_options as $option ) {

			$wp_customize->add_setting($option['slug'], array(
				'default' => $option['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$option['slug'], 
					array('label' => $option['label'], 
						'section' => 'post-layout',
						'settings' => $option['slug'],
						'type' => $option['type'],
						'choices'  => $option['choices'],
					)
				)
			);

		}
	}
	if($theme === 'viralpress') {
		$wp_customize->add_section( 'post-design' , array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Diseño de Posts', 'nichorpress'),
			'description'    =>  __('Configuración de sieño del post', 'nichorpress'),
			'panel'  => 'body_options',
			)
		);

		$design_options = array();
		$design_options[] = array(
			'slug'=>'category_post_design', 
			'default' => 'redondeado',
			'label' => __('Estilo bordes de Thumbnail'),
			'type' => 'radio',
			'choices'  => array(
				'rounded' => esc_html__('Redondeados', 'nichopress' ),
				'squared' => esc_html__('Cuadrados', 'nichopress' ),
			)
		);
		$design_options[] = array(
			'slug'=>'facilius_ocultar_leer_mas', 
			'label' => __('Ocultar botón leer más'),
			'type' => 'checkbox',
		);

		foreach( $design_options as $option ) {
			$wp_customize->add_setting($option['slug'], array(
				'default' => $option['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$option['slug'], 
					array('label' => $option['label'], 
						'section' => 'post-design',
						'settings' => $option['slug'],
						'type' => $option['type'],
						'choices'  => $option['choices'],
					)
				)
			);

		}
	}

		$wp_customize->add_section( 'comentarios' , array(
			'priority'       => 4,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Comentarios', 'nichorpress'),
			'description'    =>  __('Body elements configuration', 'nichorpress'),
			'panel'  => 'body_options',
			)
		);
		$comments_options = array();
		$comments_options[] = array(
			'slug'=>'facilius_deshabilitar_comentarios', 
			'label' => __('Deshabilitar Comentarios'),
			'type' => 'checkbox',
		);
		$comments_options[] = array(
			'slug'=>'facilius_ocultar_avatares', 
			'label' => __('Ocultar avatares'),
			'type' => 'checkbox',
		);

		foreach( $comments_options as $option ) {
			$wp_customize->add_setting($option['slug'], array(
				'default' => $option['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$option['slug'], 
					array('label' => $option['label'], 
						'section' => 'comentarios',
						'settings' => $option['slug'],
						'type' => $option['type'],
						'choices'  => $option['choices'],
					)
				)
			);

		}

	}

}

add_action( 'customize_register' , array( 'customizer' , 'register' ) );

function flag_is_background_gradient(){

    $nichopress = get_theme_mod( 'nichopress');

    if( $nichopress['header_bg_style'] !== 'degradado' ) {
        return false;
    }
    return true;

}

add_action( 'customize_register', 'cyb_customizer' );

function cyb_customizer( $wp_customize ) {

    $wp_customize->add_setting( 'nichopress[header_bg_style]',

        array(
            'default'    => 'solido',
            'capability' => 'edit_theme_options',
         )
      );

      $wp_customize->add_control(
      		new WP_Customize_Control($wp_customize,
	        'header_bg_style',
	            array(
					'label'       => 'Estilo Background',
					'default'     => 'solido',
					'section'     => 'header_bg_colors',
					'settings'    => 'nichopress[header_bg_style]',
					'type'        => 'radio',
					'choices'     => array(
						'solido' => 'Color Solido',
						'degradado' => 'Degradado'
					),
					'priority' => 1,
                )
	        )
       );     

	$wp_customize->add_setting( 'nichopress[segundo_header_background]',
		array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
		)
	);

    $wp_customize->add_control(				
      	new WP_Customize_Color_Control(
			$wp_customize,
			'segundo_header_background',
			array(
				'label'           => 'Segundo color - Degradado Cabecera',
				'section'         => 'header_bg_colors',
				'settings'        => 'nichopress[segundo_header_background]',
				'active_callback' => 'flag_is_background_gradient',
				'priority' => 3,	
			)
		)
    );

}
?>