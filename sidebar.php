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

	<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
