<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Huset
 */

if ( ! function_exists( 'huset_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
	function huset_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf( __( '<span class="byline">Written by %2$s</span><span class="posted-on">%1$s</span>', 'huset' ), /*Denne metoden kontrollerer også metoden under pga %2$s og %1$s. les mer under. fjern "space on" her hvis det skaper problemer med css */
			sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_permalink() ),
				$time_string
			),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)/*Hele denne sprintf`en er altså representert med %2$s som over. Ettersom det formatet erstattes med neste KOMMA separerte element/metode */
		);
	}

endif;
//echo "ute av if statement";
if ( ! function_exists( 'huset_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */

	/*Fjernet alt unødvendig skjiit. backup av entry_footer ligger i huset_posted_OLD */

function huset_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */


		/* translators: used between list items, there is a space after the comma */

	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'huset' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'huset' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function huset_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'huset_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'huset_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so huset_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so huset_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in huset_categorized_blog.
 */
function huset_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'huset_categories' );
}
add_action( 'edit_category', 'huset_category_transient_flusher' );
add_action( 'save_post',     'huset_category_transient_flusher' );

/*
 * Social media fra  http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */

function huset_social_menu() { /* Oppretter sosial menyen */
	if ( has_nav_menu( 'social' ) ) {
		wp_nav_menu(
			array( /*Tillegger alle følgende egenskaper til menyen */
				'theme_location'  => 'social',
				'container'       => 'div',
				'container_id'    => 'menu-social',
				'container_class' => 'menu-social',
				'menu_id'         => 'menu-social-items',
				'menu_class'      => 'menu-items',
				'depth'           => 1,
				'link_before' 	  => '<span class="screen-reader-text">', /* legger til følgende class slik at teksten forsvinner fra sosialmenyen */
				'link_after'      => '</link>',
				'fallback_cb'     => '',
			)
		);
	}
}

if ( ! function_exists( 'huset_paging_nav' ) ) :

function huset_paging_nav() { /*Overkjører den fra template-link. hentet fra 2014 themet */
	// skriver ikke tiom html hvis det ikke er mer enn en side
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up pagina links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '← Forrige', 'huset' ),
		'next_text' => __( 'Neste →', 'huset' ),
		'type'      => 'list', /*endret til list fra 2014theme */
	) );/* endret mid_size til 2. altså 2 tall før og etter current side deretter .....  */

	if ( $links ) :

		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'huset' ); ?></h1>
			<?php echo $links; ?>
		</nav><!-- .navigation -->
		<?php
	endif;
}

endif;
