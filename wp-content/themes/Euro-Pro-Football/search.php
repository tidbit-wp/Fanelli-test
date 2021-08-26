<?php
/**
 * The template for displaying search results pages
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider
 * @since Rider 1.0
 */

get_header();?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php get_search_form(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
