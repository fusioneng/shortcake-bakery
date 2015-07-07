<?php

namespace Shortcake_Bakery\Shortcodes;

class Image_Comparision extends Shortcode {

	public static function get_shortcode_ui_args() {
		return array(
			'label'          => 'Image Comparison',
			'listItemImage'  => 'dashicons-format-gallery',
			'attrs'          => array(
				array(
					'label'  => 'Left Image',
					'attr'   => 'left',
					'type'   => 'attachment',
					'libraryType' => array( 'image' ),
					'addButton'   => 'Select Image',
					'frameTitle'  => 'Select Image',
					),
				array(
					'label'  => 'Right Image',
					'attr'   => 'right',
					'type'   => 'attachment',
					'libraryType' => array( 'image' ),
					'addButton'   => 'Select Image',
					'frameTitle'  => 'Select Image',
					),
				array(
					'label'  => 'Slider Start Position',
					'attr'   => 'position',
					'type'   => 'select',
					'options' => array(
						'center' => 'Center',
						'mostlyleft' => 'Mostly Left',
						'mostlyright' => 'Mostly Right'
						)
					),
				),
		);
	}

	public static function setup_actions() {
		add_action( 'wp_enqueue_scripts', 'Shortcake_Bakery\Shortcodes\Image_Comparision::action_init_register_scripts' );
	}

	public static function action_init_register_scripts() {
		wp_register_script( 'juxtapose-js', SHORTCAKE_BAKERY_URL_ROOT . 'assets/js/juxtapose.js', array( 'jquery' ) );
		wp_register_style( 'juxtapose-css', SHORTCAKE_BAKERY_URL_ROOT . 'assets/css/juxtapose.css' );
	}

	public static function callback( $attrs, $content = '' ) {
		if ( empty( $attrs['left'] ) || empty( $attrs['right'] ) ) {
			if ( current_user_can( 'edit_posts' ) ) {
				return '<div class="shortcake-bakery-error"><p>' . esc_html__( 'Two images required for image comparision.', 'shortcake-bakery' ) . '</p></div>';
			} else {
				return '';
			}
		}

		if ( !isset( $attrs['position'] ) ) {
			 $attrs['position'] = 'center';
		}

		switch ( $attrs['position'] ) {

			case 'center' :
				$attrs['position'] = 50;
				break;

			case 'mostlyleft' :
				$attrs['position'] = 10;
				break;

			case 'mostlyright' :
				$attrs['position'] = 90;
				break;

		}

		$left_image = wp_get_attachment_image_src( $attrs['left'], 'large', false );
		$right_image = wp_get_attachment_image_src( $attrs['right'], 'large', false );

		$left_caption = get_post_field( 'post_excerpt', $attrs['left'] );
		$right_caption = get_post_field( 'post_excerpt', $attrs['right'] );

		if ( ! $left_image || ! $right_image ) {
			return;
		}

		wp_enqueue_script( 'juxtapose-js' );
		wp_enqueue_style( 'juxtapose-css' );
 
		/* Begin container */
		$out = '<section class="image-comparison">';
		$out .= '<div class="juxtapose" data-startingposition="';
		$out .= esc_attr( $attrs['position'] );
		$out .= '" data-showlabels="true" data-showcredits="true" data-animate="true">';

		/* Left Image */
		$out .= '<img src="';
		$out .= esc_url( $left_image[0] );
		$out .= '" data-label="';
		$out .= esc_attr( $left_caption );
		$out .= '">';

		/* Right Image */
		$out .= '<img src="';
		$out .= esc_url( $right_image[0] );
		$out .= '" data-label="';
		$out .= esc_attr( $right_caption );
		$out .= '">';

		/* Close container */
		$out .= '</div>';
		$out .= '</section>';

		return $out;

	}

}