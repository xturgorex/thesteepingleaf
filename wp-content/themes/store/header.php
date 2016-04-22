<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#">
	<head prefix="og: http://ogp.me/ns# object: http://ogp.me/ns/object#">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title(); ?></title>
		<!-- Setup OpenGraph support-->
		<?php if(get_option("ocmx_open_graph") !="yes") {
			$default_thumb = get_option('ocmx_site_thumbnail');
			$fb_image = get_fbimage();
			if(is_home()) : ?>
			<meta property="og:title" content="<?php bloginfo('name'); ?>"/>
			<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
			<meta property="og:url" content="<?php echo home_url(); ?>"/>
			<meta property="og:image" content="<?php if(isset($default_thumb) && $default_thumb !==""){echo $default_thumb; } else {echo $fb_image;}?>"/>
			<meta property="og:type" content="<?php echo "website";?>"/>
			<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<?php else : ?>
			<meta property="og:title" content="<?php the_title(); ?>"/>
			<meta property="og:description" content="<?php echo strip_tags($post->post_excerpt); ?>"/>
			<meta property="og:url" content="<?php the_permalink(); ?>"/>
			<meta property="og:image" content="<?php if($fb_image ==""){echo $default_thumb;} else {echo $fb_image;} ?>"/>
			<meta property="og:type" content="<?php echo "article"; ?>"/>
			<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<?php endif;
		}

		// Custom favicon
		if(get_option("ocmx_custom_favicon") != "") : ?>
			<link href="<?php echo get_option("ocmx_custom_favicon"); ?>" rel="icon" type="image/png" />
		<?php endif; ?>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		

<?php  // Load custom header image for spectific pages
$parentpage = get_template_link(get_post_type().".php");
if(!empty($parentpage) && !is_page())
	$headerid = $parentpage->ID;
elseif(is_page())
	$headerid = $post->ID;

if(isset($headerid)) :
$header_bg_image = get_post_meta($headerid, "header_image", true);
$header_bg_attributes = get_post_meta($headerid, "header_image_attributes", true);

if($header_bg_image  != '' || !empty($header_bg_attributes["colour"])) : ?>
	<style>#title-container{
			background-image: <?php if($header_bg_image != '') echo "url($header_bg_image);"; ?>;
			background-repeat: <?php echo $header_bg_attributes['repeat']; ?>;
			background-position: <?php echo $header_bg_attributes['position']; ?>;
			background-color: <?php echo $header_bg_attributes['colour']; ?>;
		}
	</style>
<?php endif;
endif; ?>
<!--Get Google Analytics -->
<?php
	if(get_option("ocmx_googleAnalytics")) :
		echo stripslashes(get_option("ocmx_googleAnalytics"));
	endif;
?>
<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>

<div id="wrapper" class="wrapper-content <?php echo get_option("ocmx_site_layout"); ?> <?php if( !is_active_sidebar( 'slider' ) && get_option('ocmx_home_page_layout') !="preset") echo "no-slider"; ?>">

	<div id="header-container">

		<?php get_template_part( 'functions/contact-header' ); ?>

		<div id="header" class="clearfix">
			<div class="logo">
				<h1 <?php if(get_option("ocmx_custom_logo") =="") echo 'class="default-logo"'; ?>>
					<a href="<?php echo home_url(); ?>">
						<?php if(get_option("ocmx_custom_logo")) : ?>
							<img src="<?php echo get_option("ocmx_custom_logo"); ?>" alt="<?php bloginfo('name'); ?>" />
						<?php else : ?>
							<?php bloginfo('name'); ?>
						<?php endif; ?>
					</a>
				</h1>
			</div>

			<a id="menu-drop-button" href="#">
                	<span class="menu-label">
					<?php if( '' != get_option( 'ocmx_menu_button_label' ) ) {
						echo get_option( 'ocmx_menu_button_label' );
					} else {
						_e( 'Menu' , 'ocmx' );
					} ?>
                    </span>
                    <i class="fa fa-bars fa-2x"></i>
			</a>
			<div id="navigation-container" class="clearfix">
				<?php if (function_exists("wp_nav_menu")) :
						wp_nav_menu(array(
							'menu' => 'Obox Nav',
							'menu_id' => 'nav',
							'menu_class' => 'clearfix',
							'sort_column' 	=> 'menu_order',
							'theme_location' => 'primary',
							'container' => 'ul',
							'fallback_cb' => 'ocmx_fallback')

					);
				endif; ?>
			</div>
		</div>
	</div>

	<div id="content-container" class="<?php if(is_tax('product_cat') || is_post_type_archive('product') || is_singular('product') || is_page() && wp_basename( get_page_template() ) == 'shop-sidebar-page.php') : echo get_option("ocmx_shop_sidebar_layout"); else : if(!is_singular('portfolio')) echo get_option("ocmx_sidebar_layout"); endif;?> clearfix">