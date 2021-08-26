<?php
/**
 * The template for displaying all posts
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider 
 * @since Rider 1.0
 */
get_header();?>

<div class="container-fluid cpt">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="main-heading">
                <h1 class="sidebar-heading"> heading <br> head <br> heading</h1>
                <h3 class="sidebar-sub-heading">subheading sub </h4>
                <?php
                    $taxonomy = 'os';
                    $args_terms = array( 
                        'taxonomy'   => 'os',
                        'hide_empty' => false,
                    );
                    $terms = get_terms($args_terms); 
                    // Get all terms of a taxonomy
                    if ( $terms && !is_wp_error( $terms ) ) :
                ?> 
                <ul class="nav pt-top flex-column" id="myTab">
                    <li class="nav-item clclhear" value="all">
                        <a class="nav-link active" href="#">All Apps</a>
                    </li>
                    <?php foreach ( $terms as $term ) { ?>
                        <li class="nav-item clclhear" id="<?php echo $term->term_id; ?>" value="<?php echo $term->slug; ?>">
                            <a class="nav-link" href="#" ><?php echo $term->name; ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <?php endif;?>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row cr hereadd">
                <?php $loop = new WP_Query( array(
                    'post_type' => 'phone-apps',
                    'paged' => $paged 
                ) );
                $i=0;
                if ( $loop->have_posts() ) :
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-md-6 col-sm-12">
                            <div class="img-text">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="img-1" class="img-with-text img-responsive">
                                <div class="triangle-up"></div>
                                <div class="text">
                                    <h3><?php the_title(); ?> <span class="thumb_class_<?php echo $i; ?>" ids="<?php echo $i; ?>"><i class="far fa-thumbs-up"></i></span></h3>
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                $i=$i+1;    
                endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

     