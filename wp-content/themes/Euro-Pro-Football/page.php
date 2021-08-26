<?php 

/**
 * The template for displaying all single posts
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider
 * @since Rider 1.0
 */

get_header(); ?>

<div id="box">
  <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
      <div class="post">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="entry">
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
