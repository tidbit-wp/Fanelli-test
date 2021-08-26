<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php if ( 'yes' == get_field('activate_or_deactivate',  'option') ): ?>	
<section class="top-header">
	<div class="top-bar">
		<div class="row">
		<?php if(get_field('button_link' , 'option')){ ?>
			<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="book-trial-button">
					<a href="<?php echo get_field('button_link' , 'option')?>" class="btn btn-trail-button font-weight-bold"><?php echo get_field('button_text' , 'option')?></a>
				</div>
			</div>
			<?php } ?>
			<?php if(get_field('launch_text_here' , 'option')){ ?>
				<div class="col-lg-4 col-md-12 col-sm-12 col-12 padding-remove">
					<div class="launching-month">
						<p class="text-uppercase"><?php echo get_field('launch_text_here' , 'option'); ?></p>
					</div>
				</div>
			<?php } ?>
			<?php if(get_field('offer_text_here' , 'option')){ ?>
				<div class="col-lg-6 col-md-12 col-sm-12 col-12 padding-remove">
					<div class="pre-launch-text">
						<span> <img src="<?php echo get_field('star_image', 'option'); ?>" alt=""></span> <span> <?php echo get_field('offer_text_here' , 'option')?></span>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php endif; ?>
	<div class="navigation-wrap start-header start-style">
		<div class="container-fluid pl-5 pr-5 pad-right pad-left">
			<div class="row rem-margin">
				<div class="col-12 rem-padding">
					<nav class="navbar navbar-expand-md navbar-light">
					
					<?php 
                if (function_exists('the_custom_logo')){
                    the_custom_logo();
               }else{
                    bloginfo('name');
               }
            ?>
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav ml-auto py-4 py-md-0">%3$s</ul>',
								'add_li_class'   => 'nav-item pl-4 pl-md-0 ml-0 ml-md-4'
									
							) );
						?>
						</div>
						
					</nav>	
					
				</div>
			</div>
		</div>
	</div>
	
	<div id="main-content">