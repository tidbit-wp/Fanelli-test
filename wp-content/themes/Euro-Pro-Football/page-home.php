<?php
/**
 * The template for displaying Home Page
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider
 * @since Rider 1.0
 */
get_header(); ?>

<?php if( have_rows('hero_slider_section') ):$count = 0; ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                
    <ol class="bullets carousel-indicators">
        <?php while( have_rows('hero_slider_section') ) : the_row();  ?>
            <li data-target="#carouselExampleControls" data-slide-to="<?php echo $count; ?>" class="<?php if($count == 0) echo 'active'; ?>"></li> 
            <?php endwhile;?>
    </ol>
    <div class="carousel-inner">
    <?php while( have_rows('hero_slider_section') ) : the_row();  ?>
        <div class="carousel-item <?php if($count == 0) { echo 'active'; } else { echo ''; }?>">
            <section class="hero-section" style="background-image:url('<?php echo get_sub_field('hero_background_image');?>');">
                    <div class="container h-100">
                        <div class="row d-flex align-items-center h-100">
                            <div class=" col-lg-8 col-md-12 col-sm-12 col-12 blur-background">
                                <div class="blur-backgrounds">
                                    <h1 class="blured-text"><?php echo get_sub_field('hero_blurry_background_text');?></h1>
                                </div>
                                <div class="hero-sub-text">
                                    <div class="hero-text">
                                        <?php echo get_sub_field('normal_hero_text');?>
                                    </div>
                                    <br>
                                    <p class="hero-text-normal">
                                        <?php echo get_sub_field('european_clubs');?>
                                    </p>
                                </div>               
                            </div>
                            <div class=" col-lg-4 col-md-12 display-none  col-sm-12 col-12"></div>
                        </div>
                        </div>
                     
                </section>
        </div>
        <?php $count++;  endwhile; ?>  
    </div>
</div>   
<?php  else : endif;?> 

<section class="free-section">
    <div class="container">
        <div class="free-btn-with-text text-center">
            <!-- <div class="off-btn-center">
                <a href="#" class="btn btn-submit">BOOK A 50% OFF <br> PRE-LAUNCH TRIAL</a>
            </div> -->
            <div class="off-text-white">
                <?php echo get_field('launch_text_here'); ?>
            </div>
            <div class="off-text-yellow">
                <?php echo get_field('offer_text_here'); ?>
            </div>
        </div>
    </div>
</section>

<section class="about-euro pt-7">
    <div class="about-text">
       <div class="about-text-para  pb-8">
            <?php echo get_field('about_content');?>
       </div>
        
    </div>
</section>
<section class="oppertunity">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <?php if( have_rows('endorsement') ): $i = 0; ?>

                <ol class="bullets carousel-indicators">
                    <?php while ( have_rows('endorsement') ): the_row(); ?>
                    <li data-target="#carouselExampleControls" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
                    <?php $i++; endwhile; ?>  
                </ol>
            <?php endif; ?> 
            <div class="carousel-inner">
                <?php if( have_rows('endorsement') ):$count = 0; while( have_rows('endorsement') ) : the_row(); ?>
                    <div class="carousel-item <?php if($count == 0) { echo 'active'; } else { echo ''; }?>">
                        <div class="">
                            <div class="oppertunity-title">
                                <h1 class="text-capitalize "> <span><img class="img-fluid star" src="<?php echo get_sub_field('star_image');?>" alt="star"></span><?php echo get_sub_field('opportunity_title');?></h1>
                            </div>
                            <div class="young-footballers">
                                <h2><?php echo get_sub_field('footballer_text');?></h2>
                            </div>
                        </div>
                    </div>
                <?php $count++;  endwhile; else : endif;?>
            </div>   
        </div>
        
    </div>
</section>
<section class="about-content-with-text">
    <div class="about-content ">
        <div class="about-img text-center">
            <img class="img-fluid " src="<?php echo get_field('darren_barnard_image');?>" alt="">
        </div>        
        <div class="img-text pt-50">
            <h2 class="font-weight-bold"><?php echo get_field('image_title');?></h2>
            <?php echo get_field('about_the_image');?>
        </div>
    </div>
</section>
<section class="dbs-section">
    <div class="bds-checked dbs-img m-auto">
        
        <img class="img-fluid " src="<?php echo get_field('dbs_image');?>" alt="">
    </div>
</section>
<section class="journey-section">
    <div class="container">
    <div id="carouselExampleControlsss" class="carousel slide" data-ride="carousel">
            <?php if( have_rows('journey_image_slider') ): $i = 0; ?>

                <ol class="bullets carousel-indicators cr-indicators">
                    <?php while ( have_rows('journey_image_slider') ): the_row(); ?>
                    <li data-target="#carouselExampleControlsss" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
                    <?php $i++; endwhile; ?>  
                </ol>
            <?php endif; ?> 
            <div class="carousel-inner">
                <?php if( have_rows('journey_image_slider') ):$count = 0; while( have_rows('journey_image_slider') ) : the_row(); ?>
                    <div class="carousel-item <?php if($count == 0) { echo 'active'; } else { echo ''; }?>">
                        <div class="journey-img">
                            <img class="img-fluid " src="<?php echo get_sub_field('journey_image');?>" alt="">
                        </div>
                        </div>
                <?php $count++;  endwhile; else : endif;?>
            </div>   
        </div>
    <div class="journey-text ">
        <h2 class="text-uppercase"><?php echo get_field('journey_title');?></h2>
        <p class="text-uppercase main-uppercase"><?php echo get_field('journey_sub_title');?></p>
        <?php echo get_field('journey_content');?>
    </div>
    </div>
</section>

<section class="aspire-section">
   <div class="container">
        <div class="aspire-title">
            <h2 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('star_icon_for_aspire');?>" alt="star"></span><?php echo get_field('aspire_title');?></h2>
        </div>
        <div class="row aspire-level">
           
                <div class="col-md-7  col-sm-12 col-12">
                    <div class="aspire-leve-para">
                       <?php echo get_field('aspire_level');?>
                        <div class="pt-5 btn-cntr">
                            <a href="<?php echo get_field('button_link');?>" class="btn btn-submit text-uppercase"><?php echo get_field('book_trial_button_text');?></a>
                        </div>
                        <div class="pt-5 add-br btn-cntr">
                            <a href="<?php echo get_field('book_off_link');?>" class="btn btn-submit text-uppercase"><?php echo get_field('book_off');?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5  col-sm-12 col-12">
                    <div class="level-image text-center">
                        <img src="<?php echo get_field('football_funnel_image');?>" class="img-fluid " alt="">
                    </div>
                </div>
            
        </div>
   </div>
</section>
<?php get_footer(); ?>