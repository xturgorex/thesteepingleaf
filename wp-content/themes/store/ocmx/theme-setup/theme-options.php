<?php function ocmx_theme_options(){
	global $obox_meta, $theme_options, $obox_themename, $features_cats;
	if(!isset($theme_options))
		$theme_options = array();
	$theme_options["general_site_options"] =
			array(
				array("label" => "Custom Logo", "description" => "Full URL or folder path to your custom logo.", "name" => "ocmx_custom_logo", "default" => "", "id" => "upload_button", "input_type" => "file", "args" => array("width" => 90, "height" => 75)),
				array("label" => "Favicon", "description" => "Select a favicon for your site", "name" => "ocmx_custom_favicon", "default" => "", "id" => "upload_button_favicon", "input_type" => "file", "sub_title" => "favicon", "args" => array("width" => 16, "height" => 16)),
				array("label" => "Custom Login Logo", "description" => "Select a custom login logo, dimensions should be 326px x 82px", "name" => "ocmx_custom_login", "default" => "", "id" => "upload_button_login", "input_type" => "file", "sub_title" => "login logo", "args" => array("width" => 326, "height" => 82)),
				array(
					"main_section" => "Facebook Sharing Options",
					"main_description" => "Set a default image URL to appear on Facebook shares if no featured image is found. Must be at least 200x200.",
					"sub_elements" =>
						array(
							array("label" => "Disable OpenGraph?", "description" => "Select No if you want to disable the theme's OpenGraph support(do this only if using a conflicting plugin)", "name" => "ocmx_open_graph", "default" => "no", "id" => "ocmx_open_graph", "input_type" => 'select', 'options' => array('Yes' => 'yes', 'No' => 'no')
							),

							array("label" => "Image URL", "description" => "", "name" => "ocmx_site_thumbnail", "sub_title" => "Open Graph image", "default" => "", "id" => "upload_button_ocmx_site_thumbnail", "input_type" => "file", "args" => array("width" => 80, "height" => 80)
							)
						)
				),
				array("label" => "Breadcrumbs", "description" => "Select whether or not to display breadcrumbs throughout the site.","name" => "ocmx_breadcrumbs", "default" => "yes", "id" => "ocmx_breadcrumbs", "input_type" => 'select', 'options' => array('Enabled' => 'yes', 'Disabled' => 'no')),

				array(
					"main_section" => "Post Meta &amp; Content Display",
					"main_description" => "These settings control which post meta is displayed in posts and lists.",
					"sub_elements" =>
						array(
							array("label" => "Show Date", "name" => "ocmx_meta_date_post", "", "default" => "true", "id" => "ocmx_meta_date_post", "input_type" => "checkbox"),
							array("label" => "Show Author", "name" => "ocmx_meta_author_post", "", "default" => "true", "id" => "ocmx_meta_author_post", "input_type" => "checkbox"),
							array("label" => "Show Category", "name" => "ocmx_meta_category", "", "default" => "true", "id" => "ocmx_meta_category", "input_type" => "checkbox"),
							array("label" => "Show Tags", "name" => "ocmx_meta_tags", "default" => "true", "id" => "ocmx_meta_tags", "input_type" => "checkbox"),
							array("label" => "Show Social Sharing", "name" => "ocmx_meta_social_post", "default" => "true", "id" => "ocmx_meta_social_post", "input_type" => "checkbox"),
							array("label" => "Show Next & Previous Posts", "description" => "Uncheck to hide Next and Previous post links in posts and gallery items", "name" => "ocmx_meta_post_links", "default" => "false", "id" => "ocmx_meta_post_links", "input_type" => "checkbox"),
							array("label" => "Content Length on List Pages", "description" => "Selecting excerpts will show the Read More link.","name" => "ocmx_content_length", "default" => "yes", "id" => "ocmx_content_length", "input_type" => 'select', 'options' => array('Show Excerpts' => 'yes', 'Show Full Post Content' => 'no')),
						)
					),
				array(
					"main_section" => "Page Meta",
					"main_description" => "These settings control which post meta is displayed in pages.",
					"sub_elements" =>
						array(
							array("label" => "Show Date", "name" => "ocmx_meta_date_page", "", "default" => "true", "id" => "ocmx_meta_date_page", "input_type" => "checkbox"),
							array("label" => "Show Author", "name" => "ocmx_meta_author_page", "", "default" => "true", "id" => "ocmx_meta_author_page", "input_type" => "checkbox"),
							array("label" => "Show Social Sharing", "name" => "ocmx_meta_social_page", "default" => "true", "id" => "ocmx_meta_social", "input_type" => "checkbox"),
						)
					),
				array("label" => "eCommerce Category Image", "description" => "Select whether or not to display the product category image.","name" => "ocmx_product_cat_image", "default" => "yes", "id" => "ocmx_product_cat_image", "input_type" => 'select', 'options' => array('Enabled' => 'yes', 'Disabled' => 'no')),
				array("label" => "Product Gallery or Slider?", "description" => "Choose how product images display on your product posts - Featured Image (default), Slider, or thumbnail grid (set your Product Thumbnail width in WooCommerce - Settings on the Product tab)","name" => "ocmx_product_gallery", "default" => "default", "id" => "ocmx_product_gallery", "input_type" => "select", "options" => array("Featured Image With Thumbnails" => "default", "Product Gallery Slider" => "slider", "Product Gallery Thumbnail Grid" => "gallery")),
				array(
					"main_section" => "Custom Styling",
					"main_description" => "Set your own custom social buttons and CSS for any element you wish to restyle.",
					"sub_elements" =>
						array(

							array("label" => "Custom CSS", "description" => "Enter changed classes from the theme stylesheet, or custom CSS here.", "name" => "ocmx_custom_css", "default" => "", "id" => "ocmx_custom_css", "input_type" => "memo"),
							array("label" => "Social Widget Code", "description" => "Paste the template tag or code for your social sharing plugin here.", "name" => "ocmx_social_tag", "default" => "", "id" => "", "input_type" => "memo"),
							 )
					),
				array("label" => "Custom RSS URL", "description" => "Paste the URL to your custom RSS feed, such as Feedburner.", "name" => "ocmx_rss_url", "default" => "", "id" => "", "input_type" => "text"),
				array(
					"main_section" => "Press Trends Analytics",
					"main_description" => "Select Yes Opt out. No personal data is collected.",
					"sub_elements" =>
					array(
						array("label" => "Disable Press Trends?", "description" => "PressTrends helps Obox build better themes and provide awesome support by retrieving aggregated stats. PressTrends also provides a <a href='http://wordpress.org/extend/plugins/presstrends/' title='PressTrends Plugin for WordPress' target='_blank'>plugin for you</a> that delivers stats on how your site is performing against similar sites like yours. <a href='http://www.presstrends.me' title='PressTrends' target='_blank'>Learn more&hellip;</a>","name" => "ocmx_disable_press_trends", "default" => "no", "id" => "ocmx_disable_press_trends", "input_type" => 'select', 'options' => array('Yes' => 'yes', 'No' => 'no'))
						 )
					 )
			);

	$theme_options["header_options"] = array(
				array(
					"main_section" => "Top Header Bar",
					"main_description" => "These settings control the header block at the top of the website.",
					"sub_elements" =>
						array(
							array("label" => "Top Header Bar", "name" => "ocmx_header_contact_show", "default" => "true", "id" => "ocmx_header_contact_show", "input_type" => 'select', 'options' => array('Enabled' => 'true', 'Disabled' => 'false')),
							array("label" => "Header Search", "description" => "Select whether or not to display a search field in the header.","name" => "ocmx_header_search", "default" => "yes", "id" => "ocmx_header_search", "input_type" => 'select', 'options' => array('Enabled' => 'yes', 'Disabled' => 'no')),
							array("label" => "Phone Number", "name" => "ocmx_header_contact_phone", "", "default" => "", "id" => "ocmx_header_contact_phone", "input_type" => "input"),
							array("label" => "Email", "name" => "ocmx_header_contact_email", "", "default" => "", "id" => "ocmx_header_contact_email", "input_type" => "input"),
							array("label" => "Facebook Link", "name" => "ocmx_header_contact_facebook", "", "default" => "", "id" => "ocmx_header_contact_facebook", "input_type" => "input"),
							array("label" => "Twitter Link", "name" => "ocmx_header_contact_twitter", "", "default" => "", "id" => "ocmx_header_contact_twitter", "input_type" => "input"),
							array("label" => "Google Plus Link", "name" => "ocmx_header_contact_gplus", "", "default" => "", "id" => "ocmx_header_contact_gplus", "input_type" => "input"),
							array("label" => "LinkedIn", "name" => "ocmx_header_contact_linkedin", "", "default" => "", "id" => "ocmx_header_contact_linkedin", "input_type" => "input"),
							array("label" => "Pinterest Link", "name" => "ocmx_header_contact_pinterest", "", "default" => "", "id" => "ocmx_header_contact_pinterest", "input_type" => "input"),
							array("label" => "Tumblr Link", "name" => "ocmx_header_contact_tumblr", "", "default" => "", "id" => "ocmx_header_contact_tumblr", "input_type" => "input"),
							array("label" => "Instagram Link", "name" => "ocmx_header_contact_instagram", "", "default" => "", "id" => "ocmx_header_contact_instagram", "input_type" => "input"),
							array("label" => "Vimeo Link", "name" => "ocmx_header_contact_vimeo", "", "default" => "", "id" => "ocmx_header_contact_vimeo", "input_type" => "input"),
							array("label" => "YouTube Link", "name" => "ocmx_header_contact_youtube", "", "default" => "", "id" => "ocmx_header_contact_youtube", "input_type" => "input"),
						)
				),
				array("label" => "Show Header Cart", "description" => "Select whether or not to display the header cart throughout the site.","name" => "ocmx_headercart", "default" => "yes", "id" => "ocmx_headercart", "input_type" => 'select', 'options' => array('Enabled' => 'yes', 'Disabled' => 'no')),
				array("label" => "Cart Label", "description" => "Enter some Custom Text for the header cart.","name" => "ocmx_cart_label", "default" => "Shopping Bag", "id" => "ocmx_cart_label", "input_type" => 'text'),
				array("label" => "Title Banner Display", "description" => "Select whether or not to display the title banner.","name" => "ocmx_hide_title", "default" => "yes", "id" => "ocmx_hide_title", "input_type" => 'select', 'options' => array('Show Title' => 'yes', 'Hide Title' => 'no')),
				array("label" => "Page Title Description", "description" => "Select whether or not to display a description below the page titles throughout the site.","name" => "ocmx_pagetitle_copy", "default" => "yes", "id" => "ocmx_pagetitle_copy", "input_type" => 'select', 'options' => array('Enabled' => 'yes', 'Disabled' => 'no')),
				array(
					"main_section" => "Navigation",
					"main_description" => "",
					"sub_elements" => array(
						array(
							"label" => "Responsive Menu Label",
							"description" => "(Leave blank to show only the icon)",
							"name" => "ocmx_menu_button_label",
							"default" => "Menu",
							"id" => "ocmx_menu_button_label",
							"input_type" => "text"
						)
					)
				)
						
	);

	$theme_options["footer_options"] = array(
				array(
						"main_section" => "Site Wide Call to Action",
						"main_description" => "These settings control the site wide call to action at the bottom of the website.",
						"sub_elements" =>
							array(
								array("label" => "Show Site Wide Call to Action", "name" => "ocmx_footer_cta_show", "", "default" => "true", "id" => "ocmx_footer_cta_show", "input_type" => "checkbox"),
								array("label" => "Text", "name" => "ocmx_footer_cta_text", "", "default" => "", "id" => "ocmx_footer_cta_text", "input_type" => "input"),
								array("label" => "Button Text", "name" => "ocmx_footer_cta_button_text", "", "default" => "", "id" => "ocmx_footer_cta_button_text", "input_type" => "input"),
								array("label" => "Button Link", "name" => "ocmx_footer_cta_button_link", "", "default" => "", "id" => "ocmx_footer_cta_button_link", "input_type" => "input"),
							)
						),

				array("label" => "Custom Footer Text", "description" => "", "name" => "ocmx_custom_footer", "default" => "Copyright ".date("Y")."&nbsp;". $obox_themename." was created in WordPress by Obox Themes."	, "id" => "ocmx_custom_footer", "input_type" => "memo"),
				
				array("label" => "Hide Back to Top", "description" => "Hide the Back to Top button.", "name" => "ocmx_backtop", "default" => "false", "id" => "ocmx_backtop", "input_type" => 'select', 'options' => array('Yes' => 'true', 'No' => 'false')),
				array("label" => "Hide Obox Logo", "description" => "Hide the Obox Logo from the footer.", "name" => "ocmx_logo_hide", "default" => "false", "id" => "ocmx_logo_hide", "input_type" => 'select', 'options' => array('Yes' => 'true', 'No' => 'false')),
				array("label" => "Site Analytics", "description" => "Enter in the Google Analytics Script here.","name" => "ocmx_googleAnalytics", "default" => "", "id" => "","input_type" => "memo")
	);

	$theme_options["layout_options"] = array(
		array(
				"label" => "Site Layout",
				"description" => "Would you like your site to be contained or span the full width of your web page?",
				"name" => "ocmx_site_layout", "default" => "fullwidth",
				"id" => "ocmx_site_layout",
				"input_type" => "hidden",
				"default" => "fullwidth",
				"options" =>
					array(
							"fullwidth" => array("label" => "Wide", "description" => ""),
							"boxed" => array("label" => "Boxed", "description" => "")
						)
				),
		array(
				"label" => "Home Page Layout",
				"description" => "Set your home page to either display as a blog, a pre-designed layout or take full control by using widgets.",
				"name" => "ocmx_home_page_layout", "default" => "blog",
				"id" => "ocmx_home_page_layout",
				"input_type" => "hidden",
				"default" => "blog",
				"options" =>
					array(
							"blog" => array("label" => "Blog", "description" => "Set your home page to display like a normal blog.", "load_options" => "widget_home_options"),
							"preset" => array("label" => "Preset", "description" => "Simple and fast way to setup a business homepage similar to our demo.", "load_options" => "preset_home_options"),
							"widget" => array("label" => "Widget Driven", "description" => "Take control by setting up your home page with widgets.")
						)
				),
		array(
				"label" => "Sidebar Layout",
				"description" => "Choose which side you would like your site sidebar to display on posts and pages. Alternatively hide it completely on all pages.",
				"name" => "ocmx_sidebar_layout", "default" => "sidebarright",
				"id" => "ocmx_sidebar_layout",
				"input_type" => "hidden",
				"default" => "sidebarright",
				"options" =>
					array(
							"sidebarright" => array("label" => "Sidebar Right", "description" => ""),
							"sidebarleft" => array("label" => "Sidebar Left", "description" => ""),
							"sidebarnone" => array("label" => "No Sidebar", "description" => "**Does not affect Features, Services or Contact Page")
						)
				),
		array(
			"label" => "Shop Sidebar Layout",
			"description" => "Choose which side you would like your shop sidebar to display on posts and pages. Alternatively hide it completely on all shoppages.",
			"name" => "ocmx_shop_sidebar_layout", "default" => "sidebarright",
			"id" => "ocmx_shop_sidebar_layout",
			"input_type" => "hidden",
			"default" => "sidebarright",
			"options" =>
				array(
					"sidebarright" => array("label" => "Sidebar Right", "description" => ""),
					"sidebarleft" => array("label" => "Sidebar Left", "description" => ""),
					"sidebarnone" => array("label" => "No Sidebar", "description" => "")
				)
		)
	);
	
$slider_cats = get_terms("slider-category", "orderby=count&hide_empty=0");
$slider_cat_list["Exclude This Widget"] = 1;
$slider_cat_list["All"] = 0;
foreach($slider_cats as $category) :
	if(isset($category->name))
		$slider_cat_list[$category->name] = $category->slug;
endforeach;

$products_cats = get_terms("product_cat", "orderby=count&hide_empty=0");
$products_cat_list["Exclude This Widget"] = 1;
$products_cat_list["All"] = 0;
foreach($products_cats as $category) :
	if(isset($category->name))
		$products_cat_list[$category->name] = $category->slug;
endforeach;


$partners_cats = get_terms("partners-category", "orderby=count&hide_empty=0");
$partners_cat_list["Exclude This Widget"] = 1;
$partners_cat_list["All"] = 0;
foreach($partners_cats as $category) :
	if(isset($category->name))
		$partners_cat_list[$category->name] = $category->slug;
endforeach;


$theme_options["preset_home_options"] =
	array(
		array(
			"main_section" => "Feature Slider",
			"main_description" => "Select which posts will be used for the Homepage Post Slider.",
			"sub_elements" =>
				array(
					array("label" => "Category", "description" => "", "name" => "ocmx_slider_cat", "default" => "0", "zero_wording" => "Exclude This Widget", "id" => "ocmx_slider_cat", "input_type" => "select", "options" => $slider_cat_list),
					array("label" => "Post Count", "description" => "", "name" => "ocmx_feature_post_count", "default" => "3", "id" => "ocmx_feature_post_count", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10")),
					array("label" => "Auto Slide Interval (seconds)", "description" => "(Set to 0 for no auto-sliding)", "name" => "ocmx_feature_post_interval", "id" => "", "input_type" => "input"),
			)
		),


		array(
			"main_section" => "Product Hero Widget (Requires the WooCommerce plugin.)",
			"main_description" => "",
			"sub_elements" =>
				array(
					array("label" => "Left Column 1 Title", "description" => "", "name" => "ocmx_products_hero_left_one_title", "id" => "", "input_type" => "input"),
					array("label" => "Left Column 1 Category", "description" => "", "name" => "ocmx_products_hero_left_one_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_hero_left_one_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Left Column 1 Post Count", "description" => "", "name" => "ocmx_products_hero_left_one_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8")),

					array("label" => "Left Column 2 Title", "description" => "", "name" => "ocmx_products_hero_left_two_title", "id" => "", "input_type" => "input"),
					array("label" => "Left Column 2 Category", "description" => "", "name" => "ocmx_products_hero_left_two_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_hero_left_two_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Left Column 2 Post Count", "description" => "", "name" => "ocmx_products_hero_left_two_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8")),

					array("label" => "Middle Column Title", "description" => "", "name" => "ocmx_products_hero_middle_title", "id" => "", "input_type" => "input"),
					array("label" => "Middle Column Category", "description" => "", "name" => "ocmx_products_hero_middle_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_hero_middle_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Middle Column Post Count", "description" => "", "name" => "ocmx_products_hero_middle_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8")),

					array("label" => "Right Column 1 Title", "description" => "", "name" => "ocmx_products_hero_right_one_title", "id" => "", "input_type" => "input"),
					array("label" => "Right Column 1 Category", "description" => "", "name" => "ocmx_products_hero_right_one_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_hero_right_one_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Right Column 1 Post Count", "description" => "", "name" => "ocmx_products_hero_right_one_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8")),

					array("label" => "Right Column 2 Title", "description" => "", "name" => "ocmx_products_hero_right_two_title", "id" => "", "input_type" => "input"),
					array("label" => "Right Column 2 Category", "description" => "", "name" => "ocmx_products_hero_right_two_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_hero_right_two_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Right Column 2 Post Count", "description" => "", "name" => "ocmx_products_hero_right_two_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8")),

				)
		),




		array(
			"main_section" => "Product Categories Three Column (Requires the WooCommerce plugin.)",
			"main_description" => "Select a category for the Four Column products on the home page.",
			"sub_elements" =>
				array(
					array("label" => "Title", "description" => "", "name" => "ocmx_products_three_col_cat_title", "id" => "", "input_type" => "input"),

					array("label" => "Column 1 Category", "description" => "", "name" => "ocmx_products_three_col_cat_one", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_three_col_cat_one", "input_type" => "select", "options" => $products_cat_list),

					array("label" => "Column 2 Category", "description" => "", "name" => "ocmx_products_three_col_cat_two", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_three_col_cat_two", "input_type" => "select", "options" => $products_cat_list),

					array("label" => "Column 3 Category", "description" => "", "name" => "ocmx_products_three_col_cat_three", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_three_col_cat_three", "input_type" => "select", "options" => $products_cat_list)
				)
		),



		array(
			"main_section" => "Product Four Column (Requires the WooCommerce plugin.)",
			"main_description" => "Select a category for the Four Column products on the home page.",
			"sub_elements" =>
				array(
					array("label" => "Title", "description" => "", "name" => "ocmx_products_four_col_title", "id" => "", "input_type" => "input"),
					array("label" => "Category", "description" => "", "name" => "ocmx_products_four_col_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_four_col_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Post Count", "description" => "", "name" => "ocmx_products_four_col_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("4" => "4", "8" => "8", "12" => "12"))
				)
		),

		array(
			"main_section" => "Product Four Column (Requires the WooCommerce plugin.)",
			"main_description" => "Select a category for the Four Column products on the home page.",
			"sub_elements" =>
				array(
					array("label" => "Title", "description" => "", "name" => "ocmx_products_four_col_two_title", "id" => "", "input_type" => "input"),
					array("label" => "Category", "description" => "", "name" => "ocmx_products_four_col_two_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_products_four_col_two_cat", "input_type" => "select", "options" => $products_cat_list),
					array("label" => "Post Count", "description" => "", "name" => "ocmx_products_four_col_two_post_count", "default" => "0", "id" => "", "input_type" => "select", "options" => array("4" => "4", "8" => "8", "12" => "12"))
				)
		),

		array(
			"main_section" => "Partners Four Column",
			"main_description" => "Select a category for the Two Column posts on the home page..",
			"sub_elements" =>
				array(
					array("label" => "Title", "description" => "", "name" => "ocmx_partners_four_col_title", "id" => "", "input_type" => "input"),
					array("label" => "Category", "description" => "", "name" => "ocmx_partners_four_col_cat", "default" => "0", "zero_wording" => "Exclude this Widget", "id" => "ocmx_feature_post_cat", "input_type" => "select", "options" => $partners_cat_list),
					array("label" => "Post Count", "description" => "", "name" => "ocmx_partners_four_col_post_count", "default" => "4", "id" => "", "input_type" => "select", "options" => array("4" => "4", "8" => "8", "12" => "12"))
				)
		),

		array(
			"main_section" => "Text Widget",
			"main_description" => "Select a category for the Two Column posts on the home page..",
			"sub_elements" =>
				array(
					array("label" => "Title", "description" => "", "name" => "ocmx_text_widget_title", "id" => "", "input_type" => "input"),

					array("label" => "Text", "description" => "", "name" => "ocmx_text_widget_text", "id" => "", "input_type" => "memo")
				)
		)
	);


	$theme_options["small_ad_options"] = array(
		array(
				"label" => "Number of Small Ads",
				"description" => "When using the select box, you must click \"Save Changes\" before the blocks are added or removed.",
				"name" => "ocmx_small_ads",
				"id" =>  "ocmx_small_ads",
				"prefix" => "ocmx_small_ad",
				"default" => "0",
				"input_type" => "select",
				"options" => array("None" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"),
				"args" => array("width" => 125, "height" => "125")
			)
	  );

	$theme_options["medium_ad_options"] = array(
		array(
				"label" => "Number of Medium Ads",
				"description" => "",
				"name" => "ocmx_medium_ads",
				"id" =>  "ocmx_medium_ads",
				"prefix" => "ocmx_medium_ad",
				"default" => "0",
				"input_type" => "select",
				"options" => array("None" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"),
				"args" => array("width" => 300, "height" => "250")
			)
		);

}
add_action("init", "ocmx_theme_options");

/***************************************************************************/
/* Setup Defaults for this theme for optiosn which aren't set in this page */
if(is_admin() && !get_option(isset($obox_themeid)."-defaults")) :
	update_option("ocmx_general_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_navigation_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_page_title_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_sub_navigation_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_post_font_titles_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_post_font_meta_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_post_font_copy_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_widget_font_titles_font_style_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");
	update_option("ocmx_widget_footer_titles_font_size_default", "'proxima-nova', 'Proxima Nova', 'Helvetica Neue'");

	update_option("ocmx_general_font_color_default", "");
	update_option("ocmx_navigation_font_color_default", "");
	update_option("ocmx_page_title_font_color_default", "");
	update_option("ocmx_sub_navigation_font_color_default", "");
	update_option("ocmx_post_titles_font_color_default", "");
	update_option("ocmx_post_meta_font_color_default", "");
	update_option("ocmx_post_copy_font_color_default", "");
	update_option("ocmx_widget_titles_font_color_default", "");
	update_option("ocmx_widget_footer_titles_font_color_default", "");

	update_option("ocmx_general_font_size_default", "17");
	update_option("ocmx_navigation_font_size_default", "12");
	update_option("ocmx_page_title_font_size_default", "72");
	update_option("ocmx_sub_navigation_font_size_default", "12");
	update_option("ocmx_post_titles_font_size_default", "10");
	update_option("ocmx_post_meta_font_size_default", "13");
	update_option("ocmx_post_copy_font_size_default", "17");
	update_option("ocmx_widget_titles_font_size_default", "15");
	update_option("ocmx_widget_footer_titles_font_size_default", "15");
	update_option($obox_themeid."-defaults", 1);
endif;
update_option("allow_gallery_effect", "1");

add_action("switch_theme", "remove_ocmx_gallery_effects");
function remove_ocmx_gallery_effects(){delete_option("allow_gallery_effect");}; ?>