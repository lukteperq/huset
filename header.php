<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Huset
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) : ?>
			<div class="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div>
		<?php endif; // End header image check. ?>

        <?php
        if ( get_header_image() && !('blank' == get_header_textcolor()) ) {
            echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">';
        } else {
            echo '<div class="site-branding">';
        }
        ?>
            <div class="title-box">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><?= the_custom_logo() ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>

<nav id="site-navigation" class="main-navigation" role="navigation">
	<h1 class="menu-toggle"><?php _e( 'Menu', 'huset' ); ?></h1><!-- Meny tekst. Spør evt Mia hva som er best -->
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'huset' ); ?></a>


	<!-- HELVETE!!  fiks den jævla ul classen senere !! TODO -->


	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?><!--  ,'menu_class' => 'nav-menu'  Virket, men ingen resultat -->

	<!-- forstørrelsesglasset -->
	<div class="search-toggle">
		<i class="fa fa-search"></i>
		<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'huset' ); ?></a>
	</div>

	<?php huset_social_menu(); ?> <!-- Henter msosial menyen fra template-tags.php -->


	<?php /*wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul id="huset">%3$s</ul>' )); */?>


</nav><!-- #site-navigation -->
<?php //get_search_form(); ?> <!-- henter inn søkefelt, searchfield, search, søke. standard metode -->
<div id="search-container" class="search-box-wrapper clear">
	<div class="search-box clear">
		<?php get_search_form(); ?>
	</div>
</div>

</header><!-- #masthead -->

<div id="content" class="site-content">