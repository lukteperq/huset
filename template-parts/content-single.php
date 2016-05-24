<?php
/**
 * @package huset
 */
?>

<article id="post-<?= get_the_ID(); ?>" <?= get_post_class(); ?>>
    <?php $meta = get_post_meta(get_the_ID()); ?>
	<header class="entry-header">
    <?php if (has_post_thumbnail()) { ?>
        <div class="single-post-thumbnail clear">
          <div class="index-box>
              <?= the_post_thumbnail('large-thumb') ?>
          </div>
        </div>
    <?php }
        /* translators: used between list items, there is a space after the comma */
        $category_list = get_the_category_list( __( ', ', 'huset' ) );

        if ( huset_categorized_blog() ) {
            echo '<div class="category-list">' . $category_list . '</div>';
        }
    ?>

		<h1 class="entry-title"><?= the_title(); ?></h1>

		<div class="entry-meta">
        <?php huset_posted_on(); ?>
        <?= !empty($meta['facebook_event_url'][0]) ? " <span><a href='{$meta['facebook_event_url'][0]}' target='_blank'>Gå til Facebook</a></span>" : '' ?>
        <?= !empty($meta['facebook_event_ticket_uri'][0]) ? " <span><a href='{$meta['facebook_event_ticket_uri'][0]}' target='_blank'>Kjøp billetter</a></span>" : '' ?>

      <?php
          if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
              echo '<span class="comments-link">';
              comments_popup_link( __( 'Leave a comment', 'huset' ), __( '1 Comment', 'huset' ), __( '% Comments', 'huset' ) );
              echo '</span>';
          }
      ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
				  'before' => '<div class="page-links">' . __( 'Pages:', 'huset' ),
				  'after'  => '</div>',
			  ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?= get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' ) ?>
		<?= edit_post_link( __( 'Edit', 'huset' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
