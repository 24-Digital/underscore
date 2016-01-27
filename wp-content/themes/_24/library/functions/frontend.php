<?php
/**
 * Frontend
 *
 * @version      1.1 | 27th Januart 2016
 * @package      WordPress
 * @subpackage   _24
 *
 * WP specific frontend helpers
 *
 */

class functions_frontend {

    /*
    *  Constructor
    *
    *  Add actions and filters
    *
    *  @type    function
    *  @date    1st August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function __construct()
    {
        // Call Googles HTML5 Shim, but only for users on old versions of IE
        add_action('wp_head', array($this, 'ie8_shim'));

        // Add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        // Add custom image sizes
        add_action('init', array($this, 'add_image_sizes'));

        // Register WP Menus
        add_action('init', array($this, 'register_menus'));

    }

    /*
    *  ie8_shim
    *
    *
    *  @type    action
    *  @date    1st August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */
    function ie8_shim()
    {
        global $is_IE;
        if ($is_IE)
        echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
    }

    /*
    *  add_image_sizes
    *
    *
    *  @type    action
    *  @date    22nd August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */
    function add_image_sizes()
    {
        /* Add custom sizes here */
        // add_image_size('handle', $width, $height, $crop);
    }

    /*
    *  register_nav_menus
    *
    *
    *  @type    action
    *  @date    22nd August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */
    function register_menus()
    {

        register_nav_menus( array(
            'primary_nav'   => 'Primary Nav',
            'mobile_nav'    => 'Mobile Nav',
            'footer_nav'    => 'Footer Nav'
        ));

    }




}

new functions_frontend();