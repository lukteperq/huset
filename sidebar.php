<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *asd
 * @package Huset
 */


?>

<div id="secondary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?> <!-- Hvis ikke sidebar-1 er satt. Lag følgende default widgets kan evt fjerne -->

		<!-- Kan evt bare fjerne html under -->
		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>

		<aside id="archives" class="widget">
			<h1 class="widget-title"><?php _e( 'Archives', 'huset' ); ?></h1>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="meta" class="widget">
			<h1 class="widget-title"><?php _e( 'Meta', 'huset' ); ?></h1>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>

	<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
