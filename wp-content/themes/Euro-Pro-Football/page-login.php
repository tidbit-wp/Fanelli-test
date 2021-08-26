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

<section class="trials-section login-padding success-page-section club-page-section" style="padding-top:0">
    
    <section class="trials-hero login-under success-page login-page-section" style="background-image:url('/wp-content/uploads/2021/06/Pf9DOS3.png')">
        <div class="container">
            

                <div class="row">
					<div class="col-md-6">
						<div class="login-profile-text">
							<h2 class="text-uppercase "> <span><img class="img-fluid star" src="/wp-content/uploads/2021/06/cropped-Euro-Pro-Star.png" alt="star"></span>LOG INTO YOUR PROFILE</h2>
						</div>
					</div>
					<div class="col-md-6">
						<div class="b-complete rm-padidng">
							<h1 class="text-uppercase">LOG IN </h1>
						</div>
					</div>
				</div>
				
                <div class="thank-you-text rem-anch-tag">
                    <?php echo do_shortcode('[wp_login_form redirect="https://wordpress-426808-1993275.cloudwaysapps.com/book-a-trial/"]');?>
                </div>
				<?php
				if(isset($_REQUEST['login-msg']))
				{
					$message =$_REQUEST['login-msg'];
					if($message == 'failed')
					{						
						?>
				<script>
				jQuery(document).ready(function($) 
				{					
					$( ".login-username" ).before('<div id="message_login_failed" class="updated below-h2 ">Plese enter the valid username and password</div>');
				});
				</script>
				<?php
					}
				}
				?>
        </div>
    </section>
    <style>
	#message_login_failed
	{
		color: red;
		text-align: center;
		font-size: 18px;
	}
    </style>
 
</section>
<?php get_footer(); ?>