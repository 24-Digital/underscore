<?php
/**
 * Scripts & Styles
 *
 * @version      1.0 | 30th July 2014
 * @package      WordPress
 * @subpackage   _24
 *
 * Enqueue scripts and styles for Wordpress as well as adding javascript
 * data to the footer.
 *
 */

class scripts_and_styles {

    /*
    *  Constructor
    *
    *  Add actions and filters
    *
    *  @type    function
    *  @date    30th July 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function __construct()
    {
        // register scripts/styles
        add_action('init', array($this, 'init'));

        // add scripts/styles
        add_action('wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts'));

        // add inline script tags to the footer
        add_action('wp_footer', array( $this, 'js_hook'), 100);
    }

    /*
    *  admin_init
    *
    *
    *  @type    action
    *  @date    30th July 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function init()
    {
        // vars
        $version = '1.0.0';

        // scripts
        //wp_register_script( 'bootstrap.min', _24_TEMPLATE_PATH . '/js/bootstrap.min.js', array('jquery',), $version, true );
        wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
        wp_register_script( 'vendor.min', _24_TEMPLATE_PATH . '/library/assets/js/vendor.min.js', array('jquery',), $version, true );
        wp_register_script( '_24.min', _24_TEMPLATE_PATH . '/library/assets/js/_24.min.js', array('jquery',), $version, true );

        // styles
        wp_register_style( 'style' , _24_TEMPLATE_PATH . '/library/assets/css/style.min.css', false, $version );
        wp_register_style( 'cowboy', _24_TEMPLATE_PATH . '/library/assets/css/cowboy.css', false, $version );
        //wp_register_style( 'print', _24_TEMPLATE_PATH . '/css/print.css', false, $version, 'print' );
    }

    /*
    *  wp_enqueue_scripts
    *
    *  This action is used to add the previously registered scripts/styles to the theme's <head>
    *
    *  @type    action
    *  @date    30th July 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function wp_enqueue_scripts()
    {

        // add scripts
        wp_enqueue_script(array(
            'jquery',
            'vendor.min',
            '_24.min'
        ));

        // add styles
        wp_enqueue_style(array(
            //'fancybox',
            'style',
            'cowboy'
        ));
    }

   /*
    *  js_hook
    *
    *  This action is used to add inline script tags before to the theme's closing body tag
    *
    *  @type    action
    *  @date    30th July 2014
    *
    *  @param   N/A
    *  @return  N/A
    */

    function js_hook()
    {

        // Pass PHP variables to JS for use in ajax calls
        // "o" stands for options, will be stored in window.options
        $o = array(
            'ajaxurl'   => admin_url('admin-ajax.php'),
            'url'       => get_bloginfo('url'),
            'nonce'     => wp_create_nonce( '{website_name}' ),
        );

        // the following assumes you have a JS object called "f"
        // the object at "f.o" will be populated withe PHP $o array
        ?>
        <script type="text/javascript">
        (function($) {

            window.siteOptions = <?php echo json_encode($o); ?>;

        })(jQuery);
        </script>
        <?php
    }

}

new scripts_and_styles();