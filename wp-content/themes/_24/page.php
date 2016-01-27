<?php
/**
 * Page
 *
 * @version      1.0 | 13th August 2014
 * @package      WordPress
 * @subpackage   _24
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-8 tablet-col-8 phone-col-12">
			
			<?php 

				// load content blocks
				get_blocks();

			?>

        </div>
    </div>

    <div class="col-4 tablet-col-4 phone-col-12">

      <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>