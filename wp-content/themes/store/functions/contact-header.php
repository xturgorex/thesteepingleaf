<?php
$show_contact = get_option("ocmx_header_contact_show");
$phone = get_option("ocmx_header_contact_phone");
$email = get_option("ocmx_header_contact_email");
$facebook = get_option("ocmx_header_contact_facebook");
$twitter = get_option("ocmx_header_contact_twitter");
$linkedin = get_option("ocmx_header_contact_linkedin");
$googleplus = get_option("ocmx_header_contact_gplus");
$vimeo = get_option("ocmx_header_contact_vimeo");
$youtube = get_option("ocmx_header_contact_youtube");
$tumblr = get_option("ocmx_header_contact_tumblr");
$pinterest = get_option("ocmx_header_contact_pinterest");
$instagram = get_option("ocmx_header_contact_instagram");
$search = get_option("ocmx_header_search");
if($show_contact !="false" ) : ?>
	<div id="header-contact-container" class="clearfix">
		<div id="header-contacts" class="clearfix">
			<?php if(isset($search) && $search !="no") : ?>
				<div class="header-search">
					<form action="<?php echo esc_url( home_url()); ?>" method="get" class="header-form">
						<input type="text" name="s" id="s" class="search-form" maxlength="50" value="" placeholder="Search" />
						<input type="submit" class="search_button" value="" />
						<span class="icon-search"><i class="fa fa-search fa-2x"></i></span>
					</form>
				</div>
			<?php endif; ?>
			<?php if ( $phone != '' || $email != '' ) { ?>
				<ul class="header-contact">
					<?php if( $phone !="" ) : ?><li class="header-number"><i class="fa fa-phone fa-2x"></i><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li><?php endif; ?>
					<?php if( $email !="" ) : ?><li class="header-email"><i class="fa fa-envelope fa-2x"></i><a href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a></li><?php endif; ?>
				</ul>
			<?php } // If contact details

			// begin header social links
					if( $facebook !="" || $twitter !="" || $linkedin !="" || $pinterest !="") { ?>
						<div class="header-social">
							<?php if(isset($facebook) && $facebook !="") : ?><span class="header-facebook"><a href="<?php echo $facebook; ?>" target="_blank" alt="<?php _e("Facebook"); ?>"><i class="fa fa-facebook-square fa-lg"></i></a></span><?php endif; ?>
							<?php if(isset($twitter) && $twitter !="") : ?><span class="header-twitter"><a href="<?php echo $twitter; ?>" target="_blank" alt="<?php _e("Twitter"); ?>"><i class="fa fa-twitter fa-lg"></i></a></span><?php endif; ?>
							<?php if(isset($googleplus) && $googleplus !="") : ?><span class="header-gplus"><a href="<?php echo $googleplus; ?>" target="_blank" alt="<?php _e("Google Plus"); ?>"><i class="fa fa-google-plus fa-lg"></i></a></span><?php endif; ?>
							<?php if(isset($linkedin) && $linkedin !="") : ?><span class="header-linkedin"><a href="<?php echo $linkedin; ?>" target="_blank" alt="<?php _e("LinkedIn"); ?>"><i class="fa fa-linkedin fa-lg"></i></a></span><?php endif; ?>
							<?php if(isset($pinterest) && $pinterest !="") : ?><span class="header-pinterest"><a href="<?php echo $pinterest; ?>" target="_blank" alt="<?php _e("Pinterest"); ?>"><i class="fa fa-pinterest fa-lg"></i></a></span><?php endif; ?>
                            <?php if(isset($instagram) && $instagram !="") : ?><span class="header-instagram"><a href="<?php echo $instagram; ?>" target="_blank" alt="<?php _e("Instagram"); ?>"><i class="fa fa-instagram fa-lg"></i></a></span><?php endif; ?>
                            <?php if(isset($tumblr) && $tumblr !="") : ?><span class="header-tumblr"><a href="<?php echo $tumblr; ?>" target="_blank" alt="<?php _e("tumblr"); ?>"><i class="fa fa-tumblr fa-lg"></i></a></span><?php endif; ?>
                           <?php if(isset($vimeo) && $vimeo !="") : ?><a href="<?php echo $vimeo; ?>" target="_blank" alt="<?php _e("vimeo"); ?>"><i class="fa fa-vimeo-square fa-lg"></i></a><?php endif; ?>
                            <?php if(isset($youtube) && $youtube !="") : ?><span class="header-youtube"><a href="<?php echo $youtube; ?>" target="_blank" alt="<?php _e("youtube"); ?>"><i class="fa fa-youtube fa-lg"></i></a></span><?php endif; ?>
						</div>
			<?php }
			
			// Begin Cart
			$headercart = get_option("ocmx_headercart");

			if ( class_exists( "WooCommerce" ) && $headercart =="yes") {
				get_template_part( 'functions/header-cart' );
			} // If WooCommerce is Active ?>

			<div id="top-navigation-container">
				<?php wp_nav_menu(array(
						'menu' => 'Top Obox Nav',
						'menu_id' => 'top-nav',
						'menu_class' => 'clearfix',
						'sort_column' 	=> 'menu_order',
						'theme_location' => 'top',
						'container' => 'ul',
						'fallback_cb' => false)
					); ?>
			</div>
			<?php do_action('icl_language_selector'); //WPML Support ?>
		</div>
	</div>
<?php endif; ?>