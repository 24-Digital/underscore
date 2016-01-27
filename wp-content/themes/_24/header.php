<?php
/**
 * Header
 *
 * @version      1.0 | 30th July 2014
 * @package      WordPress
 * @subpackage   _24
 */
?><!DOCTYPE html>
<!--[if lt IE 9]><html class="no-js ie-9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php bloginfo('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">

        <?php if ( WP_ENV == 'production' ) : ?>
            <!-- Google Analytics Code -->

        <?php elseif ( WP_ENV == 'staging' ) : ?>
            <!-- BugHerd Code - FOR DEVELOPER BUGHERD DELETE THIS -->
            <script type='text/javascript'>
            (function (d, t) {
              var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
              bh.type = 'text/javascript';
              bh.src = '//www.bugherd.com/sidebarv2.js?apikey=urazor9w1eql2s6cmukmww';
              s.parentNode.insertBefore(bh, s);
              })(document, 'script');
            </script>
        <?php endif; ?>

        <?php wp_head(); ?>

        <!--[if lt IE 10]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
        <![endif]-->

    </head>

    <body <?php body_class(); ?>>

        <?php include(locate_template('library/partials/patterns/mobile-nav/off-canvas.php')); ?>

        <header class="page-header" role="banner">

            <div class="container">

                <div class="row">
                    <div class="col-24 tablet-col-24 phone-col-24">
                        <div class="logo"></div>
                        <?php // Primary Nav
                        include(locate_template('library/partials/patterns/nav.php')); ?>
                    </div>
                </div>

            </div>

        </header>

        <main class="page-content" role="main">