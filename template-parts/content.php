<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * gammel content-single
 * @package Huset
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">


		<!-- Vurder å fjern, eller legg til styling  -->
		<?php
			/* translators: Brukt mellom list items. NB mellomrom etter komma */
			$category_list = get_the_category_list( __( ', ', 'huset' ) );

			if ( huset_categorized_blog() ) {/*Tester om det er mer enn en kategori */
				echo '<div class="category-list">' . $category_list . '</div>';
			}
		?>




		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php  huset_posted_on(); ?><!-- ikke relevant å vise. vurder å fjern. Spør Mia, virker heller ikke. FIKSET fra template-tags.php -->



			<?php
			//Virker ikke TODO.. FIKSET :D
			/*Tester om kommentarer krever passord, og om passord har status ÅPEN i tillegg til om det i  det hele tatt er kommentarer */
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link( __( 'Leave a comment', 'huset' ), __( '1 Comment', 'huset' ), __( '% Comments', 'huset' ) ); /*Hvis ingen kommentarer, 'leave a comment', hvis 1 kommentar, vis kommentar, hvis flere, vis antall kommentarer */
				echo '</span>';
			}

			?>



		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'huset' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'huset' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<!-- La til styling på tags -->
		<?php
			echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' );
		?>


		<?php //huset_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
