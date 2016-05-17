<?php
/**
 * Huset functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Huset
 */

if ( ! function_exists( 'huset_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function huset_setup() {


	// Styler backend visuell editor til å matche resten av themet
	$font_url = 'https://fonts.googleapis.com/css?family=Lato:400,100,400italic,700,900italic,900|PT+Serif:400,700,400italic,700italic';
	add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );





	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Huset, use a find and replace
	 * to change 'huset' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'huset', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	/*Hver gang det blir uploadet et bilde, lag disse ^, og legg til 2 størresler som definert under. */
	add_image_size('large-thumb', 1060,650, true); //fra media.php. width, height, true = WP scaler til å matche bredde, og cropper til å matche høyde. hvis false = viser bildet slik det er
	add_image_size('index-thumb', 780, 250, true);//featured bilde som vises øverst i post. bred og smal. for smal? spør mia

	// This theme uses wp_nav_menu() in one location. Registrerer alle menyer.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'huset' ),
		'social' => esc_html__('Social Menu', 'huset'), /*Sosial meny, ved siden av hovedmeny. NB theme location i WP backend er viktig å samsvare i forhold til plasering av meny */
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );/*mange flere. aside,gallery,link,image,quote,status.video,audio,chat
		skjekk ut senere
*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'huset_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'huset_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function huset_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'huset_content_width', 640 );
}
add_action( 'after_setup_theme', 'huset_content_width', 0 );

/**
 * Register widget area. Alle widgets er registrert her..
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function huset_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'huset' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'huset' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">', //muligens aside, widgetnavn er den format-stringen. eks: widget_recent_comments.. styler fra css
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
/*La til Footer widgets area til WP , slik at den oppsåtr i backenden */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets', 'huset' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__('Footer widgets area appears in the footer of the site', 'huset'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">', //Tidl. section
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'huset_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function huset_scripts() {
	//get_template_directory_uri = THEME ROOT folder
	//Laster inn  stylesheets & scripts
	wp_enqueue_style( 'huset-style', get_stylesheet_uri() );
/*CUSTOM*/
	//wp_enqueue_style( 'huset-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' );
	//la til css hvis ingen sidebar

	if (is_page_template('page-templates/page-nosidebar.php')) {
		wp_enqueue_style( 'huset-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
	} else {
		wp_enqueue_style( 'huset-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}

	wp_enqueue_style('my_google_fonts', 'https://fonts.googleapis.com/css?family=Lato:400,100,400italic,700,900italic,900|PT+Serif:400,700,400italic,700italic');



	//wp_enqueue_style('Font_awesome', 'https://use.fontawesome.com/a0b1640525.js'); virker ikke pga js

	wp_enqueue_script( 'huset-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20140404', true ); //ah array er dependencies. Altså den er avhengig av jquery. true = last inn i footer, false = header

	wp_enqueue_script( 'huset-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('huset-superfish'), '20140328', true );

	/*superfish lagt til pga meny-itemsene bevegde seg for kjapt */

	wp_enqueue_script('Font_awesome', 'https://use.fontawesome.com/a0b1640525.js');
	/*Font awesome. gir 403. lagre lokalt istedet. TODO */

	wp_enqueue_script('huset_masonry_settings', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20140401', true);
	/* END CUSTOM */

	wp_enqueue_script( 'huset-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20140404', true );

	wp_enqueue_script( 'huset-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'huset-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
/*ser forferdelig ut. Fiks senere TODO */
/*
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);//må visst ha med 2.
function add_search_box_to_menu( $items, $args ) {
	if( $args->theme_location == 'primary' )
		return $items.get_search_form();

	return $items;
}
*/
/*
function add_search_to_wp_menu ( $items, $args ) {
	if( 'primary' === $args -> theme_location ) {
		$items .= '<li class="menu-item menu-item-search">';
		$items .= '<form method="get" class="menu-search-form" action="' . get_bloginfo('home') . '/"><input class="text_input" type="text" placeholder="Search" name="s" id="s"  /><input type="submit" class="my-wp-search" id="searchsubmit" value="search" /></form>';
		//opprinnelig <p> før input. så stygt ut
		$items .= '</li>';
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_search_to_wp_menu',10,2);
*/


add_action( 'wp_enqueue_scripts', 'huset_scripts' );


/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 *
 * lagt klart i tilfelle vi vil redigere excerpt default tekst

function wpdocs_excerpt_more( $more ) {
	return '[...]';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
 */


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
