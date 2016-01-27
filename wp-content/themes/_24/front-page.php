<?php
/**
 * Front Page
 *
 * @version      1.0 | 30th July 2014
 * @package      WordPress
 * @subpackage   _24
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-24 tablet-col-24 phone-col-24">

            <?php include(locate_template('library/partials/patterns/slider.php')); ?>
            <?php include(locate_template('library/partials/patterns/map-finder.php')); ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>