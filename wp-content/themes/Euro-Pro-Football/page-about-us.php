<?php
/**
 * The template for displaying About Us Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Euro Pro
 * @since Euro Pro 1.0
 */
get_header(); ?>

<section class="contact-section pt-8 pb-8">
   <div class="container">
        <div class="">
            <div class="contact-title about-title">
                <h1 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('star_image');?>" alt="star"></span><?php echo get_field('page_title');?></h1>
            </div>
            <div class="contact-content about-page-content">
                <?php echo get_field('about_hero_content');?>
            </div>
        </div>
    </div>
</section>
<div class="about-page-img pb-8">
    <img class="img-fluid img-width" src="<?php echo get_field('about_image');?>" alt="">
</div>
<section class="profiles">
    <div class="container">
        <div class="contact-title director-title">
            <h1 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('director_title_image');?>" alt="star"></span><?php echo get_field('directors_title');?></h1>
        </div>
        <div class="director-profile ">
        <?php 
                            if( have_rows('director_profiles') ):
                                while( have_rows('director_profiles') ) : the_row();?>
            <div class="pt-80">
                <div class="row "> 
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="director-profile-img">
                                <img class="img-fluid" src="<?php echo get_sub_field('director_image');?>" alt="">
                                <p class="director-name"><?php echo get_sub_field('name');?></p>
                                <p class="director-position"><?php echo get_sub_field('position');?> </p>
                        </div>
                            
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                            <div class="pl-custom font-size-30">
                                <?php echo get_sub_field('about_the_director');?>
                            </div>
                        </div>
                       
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
<?php get_footer();?>