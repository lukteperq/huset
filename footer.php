<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Huset
 */

?>

	</div><!-- #content -->



	<footer id="colophon" class="site-footer" role="contentinfo"> <!-- Styler site-footer pga bug -->
		<?php get_sidebar('footer'); ?> <!-- Henter inn fra sidebar-footer -->
		<div class="site-info">

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
