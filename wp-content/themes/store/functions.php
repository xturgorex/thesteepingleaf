<?php  global $obox_themename, $input_prefix;

/*****************/
/* Theme Details */

$obox_themename = "Store";
$obox_themeid = "store";
$obox_productid = "1770";
$obox_presstrendsid = "";

/**********************/
/* Include OCMX files */
$include_folders = array("/ocmx/includes/", "/ocmx/theme-setup/", "/ocmx/widgets/", "/ocmx/front-end/", "/ajax/", "/ocmx/interface/");
include_once (get_template_directory()."/ocmx/folder-class.php");
include_once (get_template_directory()."/ocmx/load-includes.php");

/***********************/
/* Add OCMX Menu Items */

add_action('admin_menu', 'ocmx_add_admin');
function ocmx_add_admin() {
	global $wpdb;

	add_object_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), '', get_template_directory_uri(). '/ocmx/images/ocmx.png');
	add_submenu_page(basename(__FILE__), "General Options", "General", "edit_theme_options", basename(__FILE__), 'ocmx_general_options');
	add_submenu_page(basename(__FILE__), "Adverts", "Adverts", "administrator",  "ocmx-adverts", 'ocmx_advert_options');
	add_submenu_page(basename(__FILE__), "Typography", "Typography", "edit_theme_options", "ocmx-fonts", 'ocmx_font_options');
	add_submenu_page(basename(__FILE__), "Customize", "Customize", "edit_theme_options", "customize.php");
	add_submenu_page(basename(__FILE__), "Help", "Help", "edit_theme_options", "obox-help", 'ocmx_welcome_page');
};

/*******************/
/* Widgetized Page */
function add_widgetized_pages(){
	global $wpdb;
	$get_widget_pages = $wpdb->get_results("SELECT * FROM ".$wpdb->postmeta." WHERE `meta_key` = '_wp_page_template' AND  `meta_value` = 'widget-page.php'");
	foreach($get_widget_pages as $pages) :
		$post = get_post($pages->post_id);
		register_sidebar(array("name" => $post->post_title." Slider", "id" => $post->post_name . "-slider", "description" => "Place the Slider Widget here, or leave blank."));
		register_sidebar(array("name" => $post->post_title." Body", "id" => $post->post_name . "-body", "description" => "Place all Orange or full-width widgets here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4><div class="content">', 'before_widget' => '<li id="%1$s" class="widget %2$s">', 'after_widget' => '</div></li>'));
	 	register_sidebar(array("name" => $post->post_title." - Side by side", "id" => $post->post_name . "-secondary", "description" => "Place any two widgets here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4>', 'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="content">', 'after_widget' => '</div></li>'));
	 	register_sidebar(array("name" => $post->post_title." - Three Column", "id" => $post->post_name . "-threecol", "description" => "Place the Blue (Obox) widgets and / or (WordPress) default widgets here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4>', 'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="content">', 'after_widget' => '</div></li>'));
	endforeach;
}
add_action("init", "add_widgetized_pages");
/******************************************************************************/
/* Each theme has their own "No Posts" styling, so it's kept in functions.php */

function ocmx_no_posts(){ ?>
	<li class="post">
		<h2 class="post-title"><?php _e("No Posts Found", 'ocmx'); ?></h2>
		<div class="copy clearfix">
			<?php _e("There are no posts which match your search criterea.", "ocmx"); ?>
		</div>
	</li>
<?php
}


/**************************/
/* Set Up Thumbnails */
function ocmx_setup_image_sizes() {
	//image info: (name, width, height, force-crop)
	add_image_size('4-3-large', 1000, 750, true);
	add_image_size('4-3-medium', 660, 495, true);
	add_image_size('4-3-medium-nocrop', 660, 495, false);
	add_image_size('1-1-medium', 660, 660, true);
	add_image_size('1000auto', 1000);
	add_image_size('660auto', 660);
}

add_action( 'after_setup_theme', 'ocmx_setup_image_sizes' );

/**************************/
/* Facebook Support      */
function get_fbimage() {
	global $post;
	if( is_single() ) {
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );
	} else {
		$src = '';
	}
	$fbimage = null;
	if ( is_single() && has_post_thumbnail($post->ID) ) {
		$fbimage = $src[0];
	} elseif( is_single() ) {
		global $post, $posts;
		$fbimage = '';
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
		$post->post_content, $matches);
		if(!empty($matches[1]))
			$fbimage = $matches [1] [0];
	}

	return $fbimage;
}

/**********************/
/* CUSTOM LOGIN LOGO  */
function my_custom_login_logo() {
	echo '<style type="text/css">
		h1 a { background-image:url('.get_option("ocmx_custom_login", true).') !important; }
	</style>';
}

add_action('login_head', 'my_custom_login_logo');