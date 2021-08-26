<footer>
 
    <?php
    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    ?>
        <section class="footer">
            <footer>
                <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                            <?php 
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav ml-auto py-4 py-md-0">%3$s</ul>',
								'add_li_class'   => 'nav-item pl-4 pl-md-0 ml-0 '
									
							) );
						?>
                            </div>
                        </div>
                        <div class="copyright-text">
                            <div class="row d-flex aign-items-center">
                                <div class="col-md-3">
                                    <div class="design-text">
                                        <p><?php the_field('designed_text', 'option'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12">
                                    <div class="copy-text">
                                        <p><?php the_field('copyright_text', 'option'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12 col-12">
                                    <div class="social-links">
                                        <span class="facebook">
                                            <a href="<?php the_field('facebook_link', 'option'); ?>" target="_black"><img src="<?php the_field('facebook_icon', 'option'); ?>" class="img-fluid social-icons" alt=""></a>
                                        </span>
                                        <span class="instagram">
                                            <a href="<?php the_field('instagram_link', 'option'); ?>" target="_black"><img src="<?php the_field('instagram_icon', 'option'); ?>" class="img-fluid social-icons" alt=""></a>
                                        </span>
                                        <span class="twitter">
                                            <a href="<?php the_field('twitter_link', 'option'); ?>" target="_black"><img src="<?php the_field('twitter_icon', 'option'); ?>" class="img-fluid social-icons" alt=""></a>
                                        </span>
                                       
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-12 col-12">
                                   <div class='m-logo'>
                                        <span class="footer-logo">
                                            <a href="/"><img src="<?php the_field('logo_image', 'option'); ?>" class="img-fluid" alt=""></a>
                                        </span>
                                   </div>
                                </div>
                            </div>
                        </div>
                </div>

            </footer>
        </section>
 <?php
    //end of all sidebar checks.
    wp_footer();
	if(is_user_logged_in())
	{
		?>
		<style>
		#menu-item-492
		{
			display:none!important;
		}
		</style>
		<?php
	}
	else
	{
		?>
		<style>
		#menu-item-589
		{
			display:none!important;
		}
		</style>
		<?php
	}
?>
       
</footer>
</body>
</html>