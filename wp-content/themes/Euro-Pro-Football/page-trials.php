<?php
/**
 * The template for displaying Trials Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider
 * @since Rider 1.0
 */
get_header(); ?>

<section class="trials-section">
    <div class="container">
        <div class="trials-title">
            <h1 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('title_icon');?>"
                        alt="star"></span><?php echo get_field('trials_title');?></h1>
        </div>
    </div>
    <section class="trials-hero"
        style="background-image:url('<?php echo get_field('hero_section_background_image');?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12  col-sm-12 col-12">
                    <div class="carousel slide" id="main-carousel" data-ride="carousel">


                        <div class="carousel-inner">
                            <?php
                    if( have_rows('hero_image_repeater') ):
                        $count = 0;
                        // Loop through rows.
                        while( have_rows('hero_image_repeater') ) : the_row();
                ?>
                            <div class="carousel-item <?php if($count == 0) { echo 'active'; } else  {  echo ''; }?> ">
                                <div class="hero-section-image">
                                    <img src="<?php echo get_sub_field('hero_image');?>" class="img-fluid" alt="">
                                </div>

                            </div>


                            <?php 
            $count++;    
            endwhile;

// No value.
else :
    // Do something...
endif;?>
                        </div><!-- /.carousel-inner -->


                    </div><!-- /.carousel -->




                </div>
                <div class="col-lg-7 col-md-12  col-sm-12 col-12">
                    <div class="hero-text space-left">
                        <?php echo get_field('hero_text');?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="step-section">
        <div class="container">
            <div class="row d-flex h-100 align-items-center">
                <div class="col-md-7 col-sm-12 col-12">
                    <div class="step-discussion">
                        <p><?php echo get_field('discussion_text');?> </p>
                    </div>
                    <div class="carousel slide" id="main-carousel" data-ride="carousel">
                        <div class="carousel-inner">
                           
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="premier-league">
                                            <?php echo get_field('step_section_text');?>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="league-matches">
                                            <?php echo get_field('league_matches');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-text">
                                    <?php echo get_field('note_text');?>
                                </div>
                            </div>
                            <div class="carousel-item">
                               <div class="dis-img text-center">
                                    <img src="  <?php echo get_field('discussion_image');?>" class="img-fluid" alt="">
                               </div>
                            </div>


                          
                        </div>
                    </div>

                </div>
                <div class="col-md-5 col-sm-12 col-12">
                    <div class="step-image">
                        <img src="<?php echo get_field('step_image');?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="accordian-section">
        <div class="container">
            <div id="accordion" class="accordion">
                <?php if( have_rows('accordion_titles_and_text') ): 
             $count=0;
            ?>
                <div class="card mb-0">
                    <?php while( have_rows('accordion_titles_and_text') ): the_row()
                
               
                ?>

                    <div class="card-header collapsed" data-toggle="collapse" href="#collapse<?php echo $count; ?>">
                        <a class="card-title text-uppercase">
                            <?php the_sub_field('accordion_title'); ?>
                        </a>
                    </div>
                    <div id="collapse<?php echo $count; ?>" class="card-body collapse" data-parent="#accordion">
                        <?php the_sub_field('accordion_text'); ?>
                    </div>
                    <?php  $count++; endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="cost-btns">
        <div class="container">
            <h4 class="btn btn-cost text-uppercase"><?php echo get_field('trial_cost');?></h4> <br>
            <a href="<?php echo get_field('button_link_for_book_trial');?>"
                class="btn btn-submit text-uppercase"><?php echo get_field('trial_book');?></a>
                <div class="mt-4">
                    <a href="<?php echo get_field('book_off_link');?>"
                        class="btn btn-submit text-uppercase"><?php echo get_field('book_off');?></a>

                </div>
        </div>
    </section>
    <section class="professional-section">
        <div class="professional-container">
            <div class="recommended">
                <h2 class="text-uppercase">
                    <?php echo get_field('professional_heading');?>
                </h2>
                <?php echo get_field('professional_text');?>
            </div>
            <div class="can-do ml-0 m-auto text-center">
                <img src="<?php echo get_field('professional_image');?>" class="img-fluid" alt="">
            </div>
        </div>
    </section>
    <section class="trial-graph">
        <div class="graph-container">
            <div class="trial-graph-img">
                <img src="<?php echo get_field('trial_flow_image');?>" class="img-fluid" alt="">
            </div>
            <div class="graph-text">
                <?php echo get_field('flow_text');?>
            </div>
        </div>
    </section>
</section>
<?php get_footer(); ?>