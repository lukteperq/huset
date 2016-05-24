<?php
/**
 * @package huset
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="front-index-thumbnail clear">
            <div class="image-shifter">
                <a href="<?= get_permalink() ?>" title="<?= __('Read ', 'huset') . get_the_title() ?>" rel="bookmark">
                    <?= the_post_thumbnail('large-thumb'); ?>
                </a>
            </div>
        </div>
        <?= is_sticky() ? '<i class="fa fa-thumb-tack sticky-post"></i>' : '' ?>

        <?php $category_list = get_the_category_list( __( ', ', 'huset' ) );
            if ( huset_categorized_blog() && is_front_page() ) {
                echo '<div class="category-list">' . $category_list . '</div>';
            } ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if (get_post_type() == 'post') : ?>
		<div class="entry-meta">

			<?php huset_posted_on(); ?>

            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                    echo '<span class="comments-link">';
                    comments_popup_link( __( 'Leave a comment', 'huset' ), __( '1 Comment', 'huset' ), __( '% Comments', 'huset' ) );
                    echo '</span>';
                } ?>

            <?php edit_post_link( __( 'Edit', 'huset' ), '<span class="edit-link">', '</span>' ); ?>

		</div><!-- .entry-meta -->

		<?php endif; ?>
	</header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content( __( '', 'huset' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'huset') . get_the_title() . '" rel="bookmark">Les mer <i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
            <?php echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' ); ?>
    </footer><!-- .entry-footer -->


</article><!-- #post-## -->
