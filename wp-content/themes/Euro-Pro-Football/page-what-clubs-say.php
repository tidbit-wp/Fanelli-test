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

<section class="trials-section club-page-section">
    <div class="container">
        <div class="club-page-title">
            <h1 class="text-uppercase "> <span><img class="img-fluid star" src="<?php echo get_field('star_icon');?>" alt="star"></span><?php echo get_field('page_title');?></h1>
        </div>
    </div>
    <section class="trials-hero" style="background-image:url('<?php echo get_field('hero_background_image');?>')">
        <div class="container">
            <div class="profile-hero-text">
                <?php echo get_field('hero_text');?>
            </div>
        </div>
    </section>
    <section class="oppertunity">
    <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <?php if( have_rows('league_carousel') ): $i = 0; ?>

                <ol class="bullets carousel-indicators">
                    <?php while ( have_rows('league_carousel') ): the_row(); ?>
                    <li data-target="#carouselExampleControls" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
                    <?php $i++; endwhile; ?>  
                </ol>
                <?php endif; ?> 
            <div class="carousel-inner">
                <?php
                    if( have_rows('league_carousel') ):
                        $count = 0;
                        // Loop through rows.
                        while( have_rows('league_carousel') ) : the_row();
                ?>
                <div class="carousel-item 
                <?php if($count == 0) {
                        echo 'active';
                    }
                    else
                    {
                        echo '';
                }?>
               ">
                <div class="">
                    <div class="what-clubs-title">
                        <h1 class="text-capitalize "> <span><img class="img-fluid star" src="<?php echo get_sub_field('league_text_star');?>" alt="star"></span><?php echo get_sub_field('league');?></h1>
                    </div>
                    <div class="clubs-says-what">
                        <h2><?php echo get_sub_field('thank_you_text');?></h2>
                    </div>
                    </div>
                </div>
                <?php 
            $count++;    
            endwhile;

// No value.
else :
    // Do something...
endif;?>
            </div>
            
        </div>
    </div>
</section>
    
   <section class="why-created-section">
       <div class="container">
           <div class="created-text">
                <?php echo get_field('why_created_euro_text');?>
           </div>
       </div>
   </section>
</section>
<?php get_footer(); ?>