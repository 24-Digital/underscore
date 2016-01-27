<?php
/**
 * Wordpress Admin
 *
 * @version      1.0 | 1st August 2014
 * @package      WordPress
 * @subpackage   _24
 *
 * Wordpress Admin specific functions
 *
 */

class wp_admin {

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

        // Disable the theme / plugin text editor in Admin
        if (!defined('DISALLOW_FILE_EDIT')){
            define('DISALLOW_FILE_EDIT', true);
        }

        // Register scripts/styles
        add_action('admin_init', array($this, 'admin_init'));

        // Add scripts/styles
        add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts'));

        // Add custom css to the login screen
        add_action('login_enqueue_scripts', array($this, 'login_scripts_styles'));

        // Obscure the login failure message
        add_filter( 'login_errors', array( $this, 'login_obscure'));

        // Lower the SEO metabox below ACF
        add_filter( 'wpseo_metabox_prio' , array($this, 'wpseo_metabox_prio') );

        // Removed menus from admin
        add_action( 'admin_menu', array($this, 'remove_menus'));
    }


    // uncomment the stuff you want to hide in the admin area
    function remove_menus(){
      //remove_menu_page( 'index.php' );                  //Dashboard
      //remove_menu_page( 'edit.php' );                   //Posts
      //remove_menu_page( 'upload.php' );                 //Media
      //remove_menu_page( 'edit.php?post_type=page' );    //Pages
      //remove_menu_page( 'edit-comments.php' );          //Comments
      //remove_menu_page( 'themes.php' );                 //Appearance
      //remove_menu_page( 'plugins.php' );                //Plugins
      //remove_menu_page( 'users.php' );                  //Users
      //remove_menu_page( 'tools.php' );                  //Tools
      //remove_menu_page( 'options-general.php' );        //Settings

    }

    /*
    *  login_scripts_styles
    *
    *  Custom Login scripts and styles
    *
    *  @type    action
    *  @date    1st August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function login_scripts_styles()
    {
        wp_register_script('login.js', _24_TEMPLATE_PATH . '/library/assets/admin/login.js', array('jquery'));
        wp_register_style('login.css', _24_TEMPLATE_PATH . '/library/assets/admin/login.css');

        wp_enqueue_style('login.css');

        wp_enqueue_script(array(
            'jquery',
            'login.js'
        ));

    }

    /*
    *  admin_init
    *
    *  action is run during the 'init' for 'wp-admin'
    *
    *  @type    action
    *  @date    1st August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function admin_init()
    {
        // vars
        $version = '1.0.0';

        // scripts
        wp_register_script( 'admin',    _24_TEMPLATE_PATH . '/library/assets/admin/admin.js', array('jquery'), $version );

        // styles
        wp_register_style( 'admin',     _24_TEMPLATE_PATH . '/library/assets/admin/admin.css', false, $version );
    }


    /*
    *  admin_enqueue_scripts
    *
    *  This action is used to add the previously registered scripts/styles for 'wp-admin' <head>
    *
    *  @type    action
    *  @date    1st August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function admin_enqueue_scripts()
    {
        wp_enqueue_script(array(
            'admin'
        ));

        wp_enqueue_style(array(
            'admin'
        ));
    }

    /*
    *  login_obscure
    *
    *  This filter will obscure the login error message so hacks don't know they have the right username
    *
    *  @type    action
    *  @date    1st August 2014
    *
    *  @param   N/A
    *  @return  N/A
    */
    function login_obscure()
    {
        return '<strong>Whoops</strong>: Your username or password are incorrect, please try again.';
    }

    /*
    *  wpseo_metabox_prio
    *
    *  This filter will lower the WP seo priority and display after ACF metaboxes
    *
    *  @type    filter
    *  @date    1st August 2014
    *
    *  @param   $priority (string) Priority of the metabox
    *  @return  (string) New priority of the metabox
    */

    function wpseo_metabox_prio( $priority )
    {
        return 'low';
    }

}

new wp_admin();