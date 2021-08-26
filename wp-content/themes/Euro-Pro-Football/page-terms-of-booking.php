<?php
/**
 * The template for displaying Terms of Booking Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Euro
 * @since Euro 1.0
 */
get_header(); ?>

<section class="covid-guidlines">
    <div class="container">
        <div class="guidlines">
            <div class="page-title">
                <h1> <?php echo get_field('page_title');?></h1>
            </div>
           <div class="pt-50">
           <?php if( have_rows('page_content') ): ?>
                <?php while( have_rows('page_content') ): the_row();?>
            <div class="covid-data">
                <h4><?php the_sub_field('main_text'); ?></h4>
                <div class="page-content">
                <?php the_sub_field('content'); ?>
                </div>
            </div>
            <?php endwhile; ?>
         <?php endif; ?>
           </div>
            
            
        </div>
    </div>
</section>

<?php get_footer()?>