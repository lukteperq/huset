<?php
/**
 * Created by PhpStorm.
 * User: Oyvind
 * Date: 13.05.2016
 * Time: 19:13
 * følgende metode virker tilsynelatende ikke. Erstatter denne med ny/gammel metode
 */

function huset_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    /*$1,$2, 3 og 4 fra  ^ representerer, metodene inni ¤time_String under. eks: $1 = get_the_date('c). Den bare grabber alle forskjellige tidsformat  */
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );
//echo "inne i if statement";
    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'huset' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );
    /*  WTF TODO
        echo "<pre>";
        printf($posted_on);
        echo "</pre>";
    */
    $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'huset' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class=""> ' . $byline . '</span>'; // WPCS: XSS OK.

    /*
        printf( __( '<span class="byline">Written by %1$s</span><span class="posted-on">%2$s</span>', 'huset' ),
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_html( get_the_author() )
            ),
            sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
                esc_url( get_permalink() ),
                $time_string
            )
        );

        */
    //echo "faenskapet";



}

?>