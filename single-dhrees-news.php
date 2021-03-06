<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

<div id="primary" class="content-area">
  <div class="single-page single-project"></div>
  <main id="main" class="site-main dhrees-team-member-page" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php $subtitle = "NEWS";
        $bottom_left_text = "";
        $bottom_left_class = "";
        include(locate_template( 'template-parts/split-hero.php') ); ?>

      <div class="featured-project-container">
        <div class="event-full-text-container">
          <?php echo the_content();
          endwhile; // End of the loop. ?>
        </div>
      </div>

    <?php $post_objects = get_field('related_links'); ?>
    <?php if( $post_objects ): ?>
      <div class="related-posts">
        <div class="related-posts-title">RELATED</div>
        <!-- variable must be called $post -->
        <?php foreach( $post_objects as $post): ?>
        <?php setup_postdata($post); ?>
        <a class="related-post" href="#<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>

    <?php $terms = get_field('tags'); ?>
    <?php if($terms): ?> 
      <div class="tag-links">
        <div class="tag-links-title">TAGS</div>
        <?php foreach( $terms as $term ): ?>
        <?php if( $term->name ): ?>
          <a class="tag-link" href="#<?php echo get_term_link( $term );?>">
            <span><?php echo $term->name; ?></span>
          </a>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- Parallelograms -->
    <div class="clear-both"></div>
    <div class="events-parallelograms">
      <?php get_template_part( 'template-parts/contact-parallelograms', 'none' ); ?>
    </div> 
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
