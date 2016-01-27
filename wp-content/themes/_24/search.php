<?php
/**
 * Search
 *
 * @version      1.0 | 13th August 2014
 * @package      WordPress
 * @subpackage   _24
 */
get_header(); ?>
<div class="container">

  <div class="row">

    <div class="col-20 tablet-col-20 phone-col-24">

      <div class="archive-title">
        <h1>Search Results</h1>
      </div>

      <div class="archive-content">

        <?php if( have_posts() ): ?>

          <?php while( have_posts() ): the_post(); ?>

            <?php include(locate_template('library/partials/patterns/loop-single')); ?>

          <?php endwhile; ?>

        <?php else: ?>

            <?php include(locate_template('library/partials/no-results.php')); ?>

        <?php endif; ?>

      </div>

    </div>

    <div class="col-4 tablet-col-4 phone-col-20">

      <?php get_sidebar(); ?>

    </div>

  </div>

</div>

<?php get_footer(); ?>