<?php
/**
 * Created by PhpStorm.
 * User: Oyvind
 * Date: 11.05.2016
 * Time: 13:35
 */

/* Widgets i footer */

if ( ! is_active_sidebar( 'sidebar-2' ) ) { /*er det aktive widgets i sibebar?.. print html under. ellers ikke gjør noe  */
    return;
}
?>
<!-- Leger jeg til widgets i footer, så vises koden under -->
<div id="supplementary">
    <div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div><!-- #footer-sidebar -->
</div><!-- #supplementary -->