<?php
/**
 * Default Navigation
 *
 * Requires: ??
 *
 * @version      1.0 | 13th August 2014
 * @package      WordPress
 * @subpackage   _24
 */
?>

<?php

$nav_args = array(
    'theme_location'  => '',
    'menu'            => 'primary-menu',
    'container'       => 'div',
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
);

wp_nav_menu( $nav_args );

?>