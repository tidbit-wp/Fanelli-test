<?php
/**
 * The template for displaying Data Protection Page Page
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
                <h1><?php echo get_field('page_title');?></h1>
            </div>
            <div class="covid-data">
                <div class="page-content">
                    <?php echo get_field('about_page_content');?>
                </div>
            </div>
            <?php 
                if( have_rows('page_data') ):
                    while( have_rows('page_data') ) : the_row();?>
                        <div class="covid-data pt-50">
                            <h4><?php echo get_sub_field('heading');?> </h4>
                            <div class="page-content">
                                <p><?php echo get_sub_field('content');?></p>
                            </div>
                        </div>                       
                <?php 
                    endwhile;
                
               
                else :
                   
                endif;
            ?>
            
        </div>
    </div>
</section>

<?php get_footer()?>