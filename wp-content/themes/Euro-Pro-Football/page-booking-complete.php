<?php
/**
 * The template for displaying What Clubs Say Page
 *
 * 
 *
 * @package WordPress
 * @subpackage EURO
 * @since EURO 1.0
 */
get_header(); ?>

<section class="trials-section success-page-section club-page-section">
    
    <section class="trials-hero success-page" style="background-image:url('<?php echo get_field('background_image_');?>')">
        <div class="container">
            

                <div class="b-complete">
                    <h1 class="text-uppercase"><?php echo get_field('complete_text');?></h1>
                </div>
                <div class="thank-you-text">
                    <?php echo get_field('thank_you_text');?>
                </div>
            
        </div>
    </section>
    
 
</section>
<?php get_footer(); ?>