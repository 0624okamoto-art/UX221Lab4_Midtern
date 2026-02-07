<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Clove
 * @since 0.1
 */

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* @since Yuna 1.0
*
* @return void
*/
function clove_support() {
	
	// Enqueue editor styles.
	add_editor_style( 'style.css' );
	
	}
add_action( 'after_setup_theme', 'clove_support' );

/**
 * Enqueue scripts and styles.
 *
 * @since 0.1
 *
 * @return void
 */
function clove_scripts() {
	wp_enqueue_style( 'clove-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'clove_scripts' );

/**
 * Get Google fonts and save locally with WPTT Webfont Loader.
 */
function clove_fonts_url() {
	$font_families = array(
		'Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Quicksand:wght@300;400;500;600;700',
		'Work+Sans:wght@300;400;500;600;700',
		'Roboto:wght@100;300;400;500;700;900',
		'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900',
		'Merriweather:wght@300;400;700;900'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/**
 * Enqueue block editor script.
 *
 * @since 0.1
 *
 * @return void
 */
function clove_block_editor_script() {
	wp_enqueue_script( 'clove-unregister-block-style', get_theme_file_uri( '/assets/js/unregister-block-style.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'clove_block_editor_script' );

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';