<?php if (!defined('ABSPATH')) exit;
/**
 * Functions
 *
 * @version      1.0 | 30th July 2014
 * @package      WordPress
 * @subpackage   _24
 *
 * For each theme: custom code, snippets and functions should be placed in
 * library/project and included from this functions.php file.
 *
 */

/* ======================================================
   Constants
   ====================================================== */
define('_24_PATH', get_template_directory());
define('_24_URI', get_template_directory_uri());
define('_24_EXTENSIONS_PATH', get_template_directory_uri() . '/functions');
define('_24_TEMPLATE_PATH', get_bloginfo('template_directory'));

/* ======================================================
   Template debugger
   ====================================================== */
define('_24_TEMPLATE_DEBUG', false);

/* ======================================================
   Extensions
   ====================================================== */

/* Updates
  ====================================================== */
//include_once('library/functions/update-theme.php');

/* Add scripts & styles (as well as JS hook)
  ====================================================== */
include_once('library/functions/scripts-and-styles.php');

/* Wordpress admin specific functions
   ====================================================== */
include_once('library/functions/wp-admin.php');

/* Wordpress helper functions
   ====================================================== */
include_once('library/functions/wp-helpers.php');

/* Filters
   ====================================================== */
include_once('library/functions/filters.php');

/* WP API - Add images /
   ====================================================== */
include_once('library/functions/frontend.php');

/* Add Post Types /
   ====================================================== */
include_once('library/functions/post-types.php');

/* Content Blocks /
   ====================================================== */
include_once('library/functions/content-blocks.php');