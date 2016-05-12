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
		<?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) : ?> <!-- hvis det er header_image, og textfarge er deaktivert.. sett link til home url og vis bilde -->
			<div class="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div>
		<?php endif; // end header_image utskjekk . ?>
		<!--<div class="site-branding header-background-image" style="background-image: url(<?php //header_image(); ?>)"> fucker opp dokumentstruktur -->
		<?php
		//Hvis headertekst ikke er lik blank. Vis header tekst, med bakgrunn, og bilde
			if ( get_header_image() && !('blank' == get_header_textcolor()) ) {
				echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">';
			} else {
				echo '<div class="site-branding">';
			}
		?>

					<!-- header-background-image.. svart bakgrunn sentrert med tittel/tag  -->
                    <div class="title-box">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'huset' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'huset' ); ?></a> <!-- skip to content er til text-to-speech -->

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> <!-- Henter inn Hovedmenyen -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
