<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <!-- Featured project carosel -->
      <?php $featured_item_type = 'featured-event';
        include(locate_template( 'template-parts/featured-item-carousel.php') ); ?>

      <!-- Upcoming Events column -->
      <div class="upcoming-events-column">
        <div class="upcoming-events-container">
          <div class="upcoming-events-control-row">
            <div class="subtitle-wrapper">
              <div class="subtitle">UPCOMING EVENTS</div>
            </div>
          </div>
          <?php $query = new WP_Query( array( 'post_type' => 'dhrees-event', 'posts_per_page' => -1 ) );
            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="upcoming-event">
              <a href="<?php the_permalink() ?>" rel="bookmark">
                <div class="event-image-container">
                  <?php
                    $event_date = get_field("event_date");
                    $event_time = get_field("event_time");
                    $event_location = get_field("event_location");
                    $event_blurb = get_field("blurb");

                    if ($event_date) {
                      // dates are stored in yymmdd format
                      $event_month = substr($event_date, 2, 2);
                      $event_day = substr($event_date, 4, 2);
                    
                      if ( strlen($event_month) == 3 && strlen($event_day) > 0) {
                        echo '<div class="image-stripe event-stripe"></div>';
                        echo '<div class="event-stripe-text">';
                          echo '<div class="event-stripe-month">'.$event_month.'</div>';
                          echo '<div class="event-stripe-day">'.$event_day.'</div>';
                        echo '</div>';
                      };
                      unset($event_month);
                      unset($event_day);
                    };
                  ?>
                  <div class="showcase-project-thumbnail">
                    <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                  </div>
                </div><!--.event-image-container-->
                <div class="event-text-container">
                  <div class="event-hover-strip"></div>
                  <div class="event-title"><?php the_title(); ?></div>
                  <div class="event-time-line">
                    <?php echo $event_time; ?>
                  </div>
                  <div class="event-text">
                    <?php echo $event_blurb ?>
                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>

      <!-- Parallelograms -->
      <div class="clear-both"></div>
      <div class="events-parallelograms">
        <?php get_template_part( 'template-parts/contact-parallelograms', 'none' ); ?>
      <div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
