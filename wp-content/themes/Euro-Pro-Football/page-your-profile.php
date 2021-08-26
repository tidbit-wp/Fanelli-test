<?php
/**
 * The template for displaying Profile Page
 *
 * 
 *
 * @package WordPress
 * @subpackage EURO
 * @since EURO 1.0
 */
get_header(); ?>

<section class="trials-section profile-page-section">
    <div class="container">
        <div class="profile-page-title">
            <h1 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('star_image');?>" alt="star"></span><?php echo get_field('page_title');?></h1>
        </div>
    </div>
    <section class="trials-hero" style="background-image:url('<?php echo get_field('hero_text_background_image');?>')">
        <div class="container">
            <div class="profile-hero-text">
                <?php echo get_field('hero_section_text');?>
            </div>
        </div>
    </section>
    <section class="step-section">
        <div class="container">
            <div class="row d-flex h-100 align-items-center">
                <div class="col-md-7 col-sm-12 col-12">
                    <div class="step-discussion">
                        <p><?php echo get_field('steps_text');?> </p>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-12">
                    <div  class="step-image">
                        <img src="<?php echo get_field('step_image');?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="accordian-section">
    <div class="container">
    <div id="accordion" class="accordion">
        <?php if( have_rows('accordion') ): 
             $count=0;
             $i=0;
            ?>
            <div class="card mb-0">
                <?php while( have_rows('accordion') ): the_row()
                
               
                ?>
                
                    <div id='collapse<?php echo $i; ?>' class="card-header collapsed" data-toggle="collapse" href="#faq<?php echo $count; ?>">
                        <a class="card-title text-uppercase">
                            <?php the_sub_field('accordion_heading'); ?>
                        </a>
                    </div>
                    <div id="faq<?php echo $count; ?>" class="card-body collapse" data-parent="#accordion" >
                       <div class="accordion-main-content">
                            <?php the_sub_field('accordion_content'); ?>
                       </div>
                        <div class="accordion-img-1 text-center">
                            <img src="<?php the_sub_field('accordion_image'); ?>" class="img-fluid" alt="">
                        </div>
                        <div class="after-img-content">
                            <?php the_sub_field('after_image_content'); ?>
                        </div>
                        <div class="book-cost-btn">
                            <h5 class="btn btn-cost text-uppercase"><?php the_sub_field('cost_button');?></h5>
                            <a href="<?php the_sub_field('book_here_link');?>" class="btn btn-submit text-uppercase"><?php the_sub_field('book_here');?></a>
                        </div>
                        <div class="after-btn-content">
                            <?php the_sub_field('after_button_content'); ?>
                            <div class="text-center">
                                <img src=" <?php the_sub_field('after_button_image'); ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                <?php  $count++; $i++; endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
    </section>
    <section class="cost-btns">
        <div class="container">
            <h5  class="btn btn-cost text-uppercase"><?php echo get_field('trial_cost');?></h5> <br><br>
            <a href="<?php echo get_field('booking_trial_link');?>" class="btn btn-submit text-uppercase"><?php echo get_field('book_a_trial');?></a>
            <div class="mt-4">
                <a href="<?php echo get_field('book_of_link');?>" class="btn btn-submit text-uppercase"><?php echo get_field('book_off');?></a>
            </div>
        </div>
    </section>
    
</section>
<?php get_footer(); ?>