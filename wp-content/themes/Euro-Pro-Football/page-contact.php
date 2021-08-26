<?php
/**
 * The template for displaying Contact Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Euro Pro
 * @since Euro Pro 1.0
 */
get_header(); ?>

<section class="contact-section">
   <div class="container">
        <div class="contact-text">
            <div class="contact-title">
                <h1 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('star_icon'); ?>" alt="star"></span><?php echo get_field('page_title'); ?></h1>
            </div>
            <div class="contact-content">
                <?php echo get_field('page_content'); ?>
            </div>
            <div class="contact-page-info">
                <a href="mailto:<?php echo get_field('email'); ?>">E: <?php echo get_field('email'); ?></a><br>
                <a href="tel:<?php echo get_field('contact_number'); ?>"> T: <?php echo get_field('contact_number'); ?></a>
            </div>
        </div>
   </div>
</section>
<section class="contact-form">
    <div class="container">
        <div class="cform">
           <?php echo get_field('add_shortcode'); ?>
        </div>
    </div>
</section>
<?php get_footer();?>