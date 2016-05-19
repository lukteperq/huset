<?php
/**
 * @package huset
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // her finner jeg første post på siden vi lander på og om den er førsteside, og den er ikke paget. Altså ingen GET request eller mappeinndelinger videre
        if (has_post_thumbnail()) {
            echo '<div class="front-index-thumbnail clear">';
            echo '<div class="image-shifter">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'huset') . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail('large-thumb');
            echo '</a>';
            echo '</div>';
            echo '</div>';
        }/*Vurderingssak over. hør med mia */
        echo '<div class="index-box';
        if (has_post_thumbnail()) { echo ' has-thumbnail'; }; /* så egentlig ikke så bra ut. spør mia */
        echo '">';
    } else {
        echo '<div class="index-box">';
        if (has_post_thumbnail()) {
            echo '<div class="small-index-thumbnail clear">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'huset') . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail('index-thumb');
            echo '</a>';
            echo '</div>';
        }
    }
    ?>
	<header class="entry-header">

            <?php
            if (is_sticky()) {
                echo '<i class="fa fa-thumb-tack sticky-post"></i>';
            }
            ?>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $category_list = get_the_category_list( __( ', ', 'huset' ) );

                if ( huset_categorized_blog() && ! is_front_page() ) { /*Fjernet fra framside */
                    echo '<div class="category-list">' . $category_list . '</div>';
                }
            ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php huset_posted_on(); ?>
                        <?php
                            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                                echo '<span class="comments-link">';
                                comments_popup_link( __( 'Leave a comment', 'huset' ), __( '1 Comment', 'huset' ), __( '% Comments', 'huset' ) );
                                echo '</span>';
                            }
                        ?>
                        <?php edit_post_link( __( 'Edit', 'huset' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
        if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) {
            echo '<div class="entry-content">';
            the_content( __( '', 'huset' ) );
            echo '</div>';
            echo '<footer class="entry-footer continue-reading">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'huset') . get_the_title() . '" rel="bookmark">bugittybug<i class="fa fa-arrow-circle-o-right"></i></a>';
            echo '</footer><!-- .entry-footer -->';
        } else { ?>
            <div class="entry-content">
            <?php the_content( __( '', 'huset' ) ); //the_excerpt();?> <!-- Gjort om slik for simpelthetens skyld TODO-->
            </div><!-- .entry-content -->
            <footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'huset') . get_the_title() . '" rel="bookmark">Les mer<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
            <?php echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li><i class="fa fa-tag"></i>', '</li></ul>' ); ?>
            </footer><!-- .entry-footer -->
        <?php } ?>
    </div><!-- .index-box -->
</article><!-- #post-## -->
