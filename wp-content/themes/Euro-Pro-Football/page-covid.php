<?php
/**
 * The template for displaying Covid Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider
 * @since Rider 1.0
 */
get_header(); ?>

<section class="covid-guidlines">
    <div class="container">
        <div class="guidlines">
            <div class="page-title">
                <h1><?php echo get_field('page_title_');?></h1>
            </div>
            <div class="covid-data">
                <div class="page-content">
                <?php echo get_field('page_data_');?>
                </div>
            </div>
            <?php if( have_rows('page_content') ): ?>
                <?php while( have_rows('page_content') ): the_row();?>
                    <div class="covid-data pt-50">
                        <h4><?php the_sub_field('heading'); ?> </h4>
                        <div class="page-content">
                        <?php the_sub_field('data'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            
            <div class="contact-info">
                <h4><?php echo get_field('contact_info_heading');?> </h4>
                <a href="mailto:<?php echo get_field('contact_email');?>">E: <?php echo get_field('contact_email');?> </a><br>
                <a href="tel:<?php echo get_field('contact_number');?>">T: <?php echo get_field('contact_number');?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer()?>