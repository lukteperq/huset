<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Huset
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses huset_header_style()
 */
function huset_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'huset_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000', /* standardverdi 000000 - hvit */
		'width'                  => 1280, /* standardverdi 1000*/
		'height'                 => 300, /* standardverdi 250 */
		'flex-height'            => true, /* Tillater å uploade et bilde, for å deretter resize den. Standard true */
		'wp-head-callback'       => 'huset_header_style',
	) ) );

	/* Virker heller ikke. Faenskapet!
	$header_args = array(
		'flex-height' => true,
		'height' => 300,
		'flex-width' => true,
		'width' => 1280,
		'default-image' => '%s/images/headers/path.jpg',
		'admin-head-callback' => 'huset_admin_header_style',
	);
*/
	add_theme_support( 'custom-header', $header_args );

}
add_action( 'after_setup_theme', 'huset_custom_header_setup' );

if ( ! function_exists( 'huset_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see huset_custom_header_setup().
 */
function huset_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) { /*Ved å aktivere "remove header text" så kjører koden under. */
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-branding { /* Custom styles som blir injected på header elementene. Altså H1, H2 og ramme. Fjerner i css */
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
