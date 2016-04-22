<?php //OCMX Custom logo and Favicon

function obox_logo_register($wp_customize){
	
	$wp_customize->add_section('obox_general', array(
		'title'    => __('General Theme Settings', 'obox'),
		'priority' => 21,
	));
	
   // Custom Colors
	
	$wp_customize->add_setting('obox_ignore_colours', array(
		'default'        => 'no',
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
	));

	$wp_customize->add_control('obox_header_menu', array(
		'label'      => __('Use Theme Default Color Scheme', 'obox'),
		'section'    => 'obox_general',
		'settings'   => 'obox_ignore_colours',
		'type'       => 'radio',
		'priority' => 0,
		'choices'    => array(
			'yes' => 'Yes',
			'no' => 'No'
		),
	));
 
	$wp_customize->add_setting('obox_custom_logo', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'obox_custom_logo', array(
		'label'    => __('Custom Logo', 'obox'),
		'section'  => 'obox_general',
		'settings' => 'obox_custom_logo',
	)));
	
	$wp_customize->add_setting('obox_custom_favicon', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',

	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'obox_custom_favicon', array(
		'label'    => __('Custom Favicon', 'obox'),
		'section'  => 'obox_general',
		'settings' => 'obox_custom_favicon',
	)));
	
}

add_action('customize_register', 'obox_logo_register');


// OCMX Color Options 

function obox_customize_register($wp_customize) {

	/* Header - Menu:
		- Background
		- Link
		- Link Hover 
		- Sub Menu Background
		- Sub Menu Link
		- Sub Menu Hover
	*/
	
	$wp_customize->add_section('obox_header_menu', array(
		'title' => __( 'Header - Menu', 'obox' ),
		'priority' => 22,
		)
	);
	// Contact Header - Background
	$wp_customize->add_setting( 'obox_contact_header_background', array(
		'default' => '#222',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_contact_header_background', array(
		'label' => __( 'Contact Header Background', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_contact_header_background',
		'priority' => 1,
	)));
	
	// Contact Header - Text
	$wp_customize->add_setting( 'obox_contact_header_text', array(
		'default' => '#ececec',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_contact_header_text', array(
		'label' => __( 'Contact Header Text', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_contact_header_text',
		'priority' => 2,
	)));
	
	// Contact Header - Link Hover
	$wp_customize->add_setting( 'obox_contact_header_text_hover', array(
		'default' => '#ccc',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_contact_header_text_hover', array(
		'label' => __( 'Contact Header Link Hover', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_contact_header_text_hover',
		'priority' => 2,
	)));
	
	// Header - Background
	$wp_customize->add_setting( 'obox_header_background', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_background', array(
		'label' => __( 'Logo & Menu Background', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_header_background',
		'priority' => 3,
	)));
	
	// Header - Link
	$wp_customize->add_setting( 'obox_navigation_font_color', array(
		'default' => '#3f3f3f',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_navigation_font_color', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_navigation_font_color',
		'priority' => 10,
	)));
	
	// Header - Link Hover
	$wp_customize->add_setting( 'obox_navigation_hover', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_navigation_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_navigation_hover',
		'priority' => 20,
	)));
	
	// Header - Sub Menu Background
	$wp_customize->add_setting( 'obox_subnav_background', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_subnav_background', array(
		'label' => __( 'Sub Menu Background', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_subnav_background',
		'priority' => 30,
	)));

	// Header - Sub Menu Link
	$wp_customize->add_setting( 'obox_subnav_link', array(
		'default' => '#3f3f3f',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_subnav_link', array(
		'label' => __( 'Sub Menu Link', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_subnav_link',
		'priority' => 40,
	)));
	
	// Header - Sub Menu Link Hover
	$wp_customize->add_setting( 'obox_subnav_link_hover', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_subnav_link_hover', array(
		'label' => __( 'Sub Menu Link Hover', 'obox' ),
		'section' => 'obox_header_menu',
		'settings' => 'obox_subnav_link_hover',
		'priority' => 50,
	)));
	
	
	/* Header - Page Title:
		- Background
		- Title 
		- Blurb
	*/
	
	$wp_customize->add_section('obox_header_pagetitle', array(
		'title' => __( 'Header - Page Title', 'obox' ),
		'priority' => 23,
		)
	);
	
	// Page Title - Background
	$wp_customize->add_setting( 'obox_header_pagetitle_background', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_pagetitle_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_header_pagetitle',
		'settings' => 'obox_header_pagetitle_background',
		'priority' => 1,
	)));
	
	// Page Title - Title
	$wp_customize->add_setting( 'obox_header_pagetitle_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_pagetitle_text', array(
		'label' => __( 'Title', 'obox' ),
		'section' => 'obox_header_pagetitle',
		'settings' => 'obox_header_pagetitle_text',
		'priority' => 10,
	)));
	
	// Page Title - Blurb
	$wp_customize->add_setting( 'obox_header_pagetitle_blurb', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_pagetitle_blurb', array(
		'label' => __( 'Blurb', 'obox' ),
		'section' => 'obox_header_pagetitle',
		'settings' => 'obox_header_pagetitle_blurb',
		'priority' => 20,
	)));
	
	
	/* Header - Breadcrumbs:
		- Background
		- Text
		- Link
		- Link Hover
	*/
	
	$wp_customize->add_section('obox_header_breadcrumbs', array(
		'title' => __( 'Header - Breadcrumbs', 'obox' ),
		'priority' => 24,
		)
	);
	
	// Breadcrumbs - Background
	$wp_customize->add_setting( 'obox_header_breadcrumbs_background', array(
		'default' => '#f2f2f2',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_breadcrumbs_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_header_breadcrumbs',
		'settings' => 'obox_header_breadcrumbs_background',
		'priority' => 1,
	)));
		
	// Breadcrumbs - Text
	$wp_customize->add_setting( 'obox_header_breadcrumbs_text', array(
		'default' => '#999',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_breadcrumbs_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_header_breadcrumbs',
		'settings' => 'obox_header_breadcrumbs_text',
		'priority' => 20,
	)));
	
	// Breadcrumbs - Link
	$wp_customize->add_setting( 'obox_header_breadcrumbs_link', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_breadcrumbs_link', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_header_breadcrumbs',
		'settings' => 'obox_header_breadcrumbs_link',
		'priority' => 30,
	)));
	
	// Breadcrumbs - Link Hover
	$wp_customize->add_setting( 'obox_header_breadcrumbs_link_hover', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_header_breadcrumbs_link_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_header_breadcrumbs',
		'settings' => 'obox_header_breadcrumbs_link_hover',
		'priority' => 40,
	)));
	
	
	/* Content:
		- Background
		- Post Title
		- Post Title Hover 
		- Text
		- Link
		- Link Hover
		- Meta
	*/
	
	$wp_customize->add_section('obox_content_contained', array(
		'title' => __( 'Content', 'obox' ),
		'priority' => 25,
		)
	);
	
	// Contained - Widget Background
	$wp_customize->add_setting( 'obox_content_contained_background', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_background', array(
		'label' => __( 'Container Background', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_background',
		'priority' => 5,
	)));
	
	// Contained - Post Title
	$wp_customize->add_setting( 'obox_content_contained_posttitle', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_posttitle', array(
		'label' => __( 'Post Title', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_posttitle',
		'priority' => 10,
	)));
	
	// Contained - Post Title Hover
	$wp_customize->add_setting( 'obox_content_contained_posttitle_hover', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_posttitle_hover', array(
		'label' => __( 'Post Title Hover', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_posttitle_hover',
		'priority' => 20,
	)));
	
	// Contained - Text
	$wp_customize->add_setting( 'obox_content_contained_text', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_text',
		'priority' => 30,
	)));
	
	// Contained - Link
	$wp_customize->add_setting( 'obox_content_contained_link', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_link', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_link',
		'priority' => 40,
	)));
	
	// Contained - Link Hover
	$wp_customize->add_setting( 'obox_content_contained_link_hover', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_link_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_link_hover',
		'priority' => 50,
	)));
	
	// Contained - Meta
	$wp_customize->add_setting( 'obox_content_contained_meta', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_meta', array(
		'label' => __( 'Meta', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_meta',
		'priority' => 60,
	)));
	
	// Contained - Border
	$wp_customize->add_setting( 'obox_content_contained_border', array(
		'default' => '#dddddd',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_contained_border', array(
		'label' => __( 'Border', 'obox' ),
		'section' => 'obox_content_contained',
		'settings' => 'obox_content_contained_border',
		'priority' => 70,
	)));
	
	
	/* Content - eCommerce:
		- Container Borders
		- Price
		- Sale
		- Tab Background
		- Tab Active
		- Tab Border
		- Tab Text
	*/
	
	$wp_customize->add_section('obox_content_ecommerce', array(
		'title' => __( 'Content - eCommerce', 'obox' ),
		'priority' => 27,
		)
	);
	
	// eCommerce - Container Borders
	$wp_customize->add_setting( 'obox_content_ecommerce_borders', array(
		'default' => '#dddddd',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_borders', array(
		'label' => __( 'Container Borders', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_borders',
		'priority' => 1,
	)));
	
	// eCommerce - Price
	$wp_customize->add_setting( 'obox_content_ecommerce_price', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_price', array(
		'label' => __( 'Price', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_price',
		'priority' => 10,
	)));
	
	// Buttons - Sale 
	$wp_customize->add_setting( 'obox_content_ecommerce_sale', array(
		'default' => '#bc6047',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_sale', array(
		'label' => __( 'Sale', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_sale',
		'priority' => 15,
	)));
	
	// eCommerce - Tab Border
	$wp_customize->add_setting( 'obox_content_ecommerce_tab_border', array(
		'default' => '#e4e4e4',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_tab_border', array(
		'label' => __( 'Border', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_tab_border',
		'priority' => 20,
	)));
	
	// eCommerce - Tab Background
	$wp_customize->add_setting( 'obox_content_ecommerce_tab_background', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_tab_background', array(
		'label' => __( 'Tab Background', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_tab_background',
		'priority' => 30,
	)));
	
	// eCommerce - Tab Active
	$wp_customize->add_setting( 'obox_content_ecommerce_tab_active', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_tab_active', array(
		'label' => __( 'Tab Active', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_tab_active',
		'priority' => 40,
	)));
	
	// eCommerce - Tab Text
	$wp_customize->add_setting( 'obox_content_ecommerce_tab_text', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_content_ecommerce_tab_text', array(
		'label' => __( 'Tab Text', 'obox' ),
		'section' => 'obox_content_ecommerce',
		'settings' => 'obox_content_ecommerce_tab_text',
		'priority' => 50,
	)));
	
	/* Comments - Thread:
		- Background  
		- Text 
		- Link
		- Link Hover
		- Border 
	*/
	
	$wp_customize->add_section('obox_comments_thread', array(
		'title' => __( 'Comments - Thread', 'obox' ),
		'priority' => 28,
		)
	);
	
	// Comments - Thread - Background
	$wp_customize->add_setting( 'obox_comments_thread_background', array(
		'default' => '#f2f2f2',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_thread_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_comments_thread',
		'settings' => 'obox_comments_thread_background',
		'priority' => 1,
	)));
	
	// Comments - Thread - Text
	$wp_customize->add_setting( 'obox_comments_thread_text', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_thread_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_comments_thread',
		'settings' => 'obox_comments_thread_text',
		'priority' => 10,
	)));
	
	// Comments - Thread - Link
	$wp_customize->add_setting( 'obox_comments_thread_link', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_thread_link', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_comments_thread',
		'settings' => 'obox_comments_thread_link',
		'priority' => 20,
	)));
	
	// Comments - Thread - Link Hover
	$wp_customize->add_setting( 'obox_comments_thread_link_hover', array(
		'default' => '#111',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_thread_link_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_comments_thread',
		'settings' => 'obox_comments_thread_link_hover',
		'priority' => 30,
	)));
	
	// Comments - Thread - Border
	$wp_customize->add_setting( 'obox_comments_thread_border', array(
		'default' => '#d3d3d3',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_thread_border', array(
		'label' => __( 'Border', 'obox' ),
		'section' => 'obox_comments_thread',
		'settings' => 'obox_comments_thread_border',
		'priority' => 40,
	)));
	
	
	
	/* Comments - Leave a Reply :
		- Background  
		- Text 
	*/
	
	$wp_customize->add_section('obox_comments_reply', array(
		'title' => __( 'Comments - Leave a Reply', 'obox' ),
		'priority' => 29,
		)
	);
	
	// Comments - Thread - Background
	$wp_customize->add_setting( 'obox_comments_reply_background', array(
		'default' => '#e6e6e6',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_reply_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_comments_reply',
		'settings' => 'obox_comments_reply_background',
		'priority' => 1,
	)));
	
	// Comments - Thread - Text
	$wp_customize->add_setting( 'obox_comments_reply_text', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_comments_reply_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_comments_reply',
		'settings' => 'obox_comments_reply_text',
		'priority' => 10,
	)));
	
	
	/* Buttons - Content:
		- Button Background
		- Button Text
		- Button Background Hover
		- Button Text Hover
		- Read More Text 
		- Read More Text Hover 
		- Comment Background 
		- Comment Text 
		- Comment Background Hover 
		- Comment Text Hover
		- Pagination Background 
		- Pagination Background Hover
	*/
	
	$wp_customize->add_section('obox_buttons_content', array(
		'title' => __( 'Buttons - Content', 'obox' ),
		'priority' => 30,
		)
	);
	
	// Button - Background
	$wp_customize->add_setting( 'obox_button_background', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_background',
		'priority' => 1,
	)));
	
	// Button - Text
	$wp_customize->add_setting( 'obox_button_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_text',
		'priority' => 10,
	)));
	
	// Button - Background Hover
	$wp_customize->add_setting( 'obox_button_background_hover', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_background_hover', array(
		'label' => __( 'Background Hover', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_background_hover',
		'priority' => 20,
	)));
	
	// Button - Text Hover
	$wp_customize->add_setting( 'obox_button_text_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_text_hover', array(
		'label' => __( 'Text Hover', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_text_hover',
		'priority' => 30,
	)));
	
	 // Button - Comment Background
	$wp_customize->add_setting( 'obox_button_comment_background', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_comment_background', array(
		'label' => __( 'Comment Background', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_comment_background',
		'priority' => 60,
	)));
	
	// Button - Comment Text
	$wp_customize->add_setting( 'obox_button_comment_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_comment_text', array(
		'label' => __( 'Comment Text', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_comment_text',
		'priority' => 70,
	)));
	
	// Button - Comment Background Hover
	$wp_customize->add_setting( 'obox_button_comment_background_hover', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_comment_background_hover', array(
		'label' => __( 'Comment Background Hover', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_comment_background_hover',
		'priority' => 80,
	)));
	
	// Button - Comment Text Hover
	$wp_customize->add_setting( 'obox_button_comment_text_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_comment_text_hover', array(
		'label' => __( 'Comment Text Hover', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_comment_text_hover',
		'priority' => 90,
	)));
	
	// Button - Pagination Background 
	$wp_customize->add_setting( 'obox_button_pagination_background', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_pagination_background', array(
		'label' => __( 'Pagination', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_pagination_background',
		'priority' => 100,
	)));
	
	// Button - Pagination Background Hover
	$wp_customize->add_setting( 'obox_button_pagination_background_hover', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_pagination_background_hover', array(
		'label' => __( 'Pagination Hover', 'obox' ),
		'section' => 'obox_buttons_content',
		'settings' => 'obox_button_pagination_background_hover',
		'priority' => 110,
	)));
	
	
	/* Buttons - eCommerce:
		- Button Background
		- Button Text 
		- Button Background Hover 
		- Button Text Hover 
		- Quantity 
		- Quantity Hover 
		- Coupon Background 
		- Coupon Text 
		- Coupon Background Hover 
		- Coupon Text Hover
	*/
	
	$wp_customize->add_section('obox_buttons_ecommerce', array(
		'title' => __( 'Buttons - eCommerce', 'obox' ),
		'priority' => 31,
		)
	);
	
	 // Button - Background
	$wp_customize->add_setting( 'obox_button_ecommerce_background', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_ecommerce_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_ecommerce_background',
		'priority' => 1,
	)));
	
	// Button - Text
	$wp_customize->add_setting( 'obox_button_ecommerce_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_ecommerce_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_ecommerce_text',
		'priority' => 10,
	)));
	
	// Button - Background Hover
	$wp_customize->add_setting( 'obox_button_ecommerce_background_hover', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_ecommerce_background_hover', array(
		'label' => __( 'Background Hover', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_ecommerce_background_hover',
		'priority' => 20,
	)));
	
	// Button - Text Hover
	$wp_customize->add_setting( 'obox_button_ecommerce_text_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_ecommerce_text_hover', array(
		'label' => __( 'Text Hover', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_ecommerce_text_hover',
		'priority' => 30,
	)));
	
	// Button - Quantity Background
	$wp_customize->add_setting( 'obox_button_quantity', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_quantity', array(
		'label' => __( 'Quantity Background', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_quantity',
		'priority' => 40,
	)));
	
	// Button - Quantity Background Hover
	$wp_customize->add_setting( 'obox_button_quantity_hover', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_quantity_hover', array(
		'label' => __( 'Quantity Background Hover', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_quantity_hover',
		'priority' => 50,
	)));
	
	// Button - Coupon
	$wp_customize->add_setting( 'obox_button_coupon', array(
		'default' => '#ddd',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_coupon', array(
		'label' => __( 'Coupon', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_coupon',
		'priority' => 60,
	)));
	
	// Button - Coupon Text
	$wp_customize->add_setting( 'obox_button_coupon_text', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_coupon_text', array(
		'label' => __( 'Coupon Text', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_coupon_text',
		'priority' => 70,
	)));
	
	// Button - Coupon Hover
	$wp_customize->add_setting( 'obox_button_coupon_hover', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_coupon_hover', array(
		'label' => __( 'Coupon Hover', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_coupon_hover',
		'priority' => 80,
	)));
	
	// Button - Coupon Text Hover
	$wp_customize->add_setting( 'obox_button_coupon_text_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_button_coupon_text_hover', array(
		'label' => __( 'Coupon Text Hover', 'obox' ),
		'section' => 'obox_buttons_ecommerce',
		'settings' => 'obox_button_coupon_text_hover',
		'priority' => 90,
	)));
		
	
	/* Sidebar:
		- Background 
		- Widget Title 
		- Text  
		- Link
		- Link Hover 
		- Border
	*/
	
	$wp_customize->add_section('obox_sidebar', array(
		'title' => __( 'Sidebar', 'obox' ),
		'priority' => 32,
		)
	);
	
	// Sidebar - Widget Title 
	$wp_customize->add_setting( 'obox_sidebar_widgettitle', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_widgettitle', array(
		'label' => __( 'Widget Title ', 'obox' ),
		'section' => 'obox_sidebar',
		'settings' => 'obox_sidebar_widgettitle',
		'priority' => 10,
	)));
	
	// Sidebar - Text
	$wp_customize->add_setting( 'obox_sidebar_text', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_text', array(
		'label' => __( 'Text ', 'obox' ),
		'section' => 'obox_sidebar',
		'settings' => 'obox_sidebar_text',
		'priority' => 20,
	)));
	
	// Sidebar - Link
	$wp_customize->add_setting( 'obox_sidebar_link', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_link', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_sidebar',
		'settings' => 'obox_sidebar_link',
		'priority' => 30,
	)));
	
	// Sidebar - Link Hover
	$wp_customize->add_setting( 'obox_sidebar_link_hover', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_link_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_sidebar',
		'settings' => 'obox_sidebar_link_hover',
		'priority' => 40,
	)));
	
	// Sidebar - Border
	$wp_customize->add_setting( 'obox_sidebar_border', array(
		'default' => '#dddddd',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_border', array(
		'label' => __( 'Border', 'obox' ),
		'section' => 'obox_sidebar',
		'settings' => 'obox_sidebar_border',
		'priority' => 50,
	)));
	
	
	/* Sidebar - Features:
		- Background 
		- Text
		- Borders
		- Active Background 
		- Active Text 
	*/
	
	$wp_customize->add_section('obox_sidebar_features', array(
		'title' => __( 'Sidebar - Features', 'obox' ),
		'priority' => 33,
		)
	);
	
	// Sidebar - Features - Background
	$wp_customize->add_setting( 'obox_sidebar_features_background', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_features_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_sidebar_features',
		'settings' => 'obox_sidebar_features_background',
		'priority' => 1,
	)));
	
	// Sidebar - Features - Text
	$wp_customize->add_setting( 'obox_sidebar_features_text', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_features_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_sidebar_features',
		'settings' => 'obox_sidebar_features_text',
		'priority' => 10,
	)));
	
	// Sidebar - Features - Border
	$wp_customize->add_setting( 'obox_sidebar_features_border', array(
		'default' => '#ddd',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_features_border', array(
		'label' => __( 'Border', 'obox' ),
		'section' => 'obox_sidebar_features',
		'settings' => 'obox_sidebar_features_border',
		'priority' => 20,
	)));
	
	// Sidebar - Features - Active Background 
	$wp_customize->add_setting( 'obox_sidebar_features_active_background', array(
		'default' => '#a5bc47',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_features_active_background', array(
		'label' => __( 'Active Background', 'obox' ),
		'section' => 'obox_sidebar_features',
		'settings' => 'obox_sidebar_features_active_background',
		'priority' => 20,
	)));
	
	// Sidebar - Features - Active Text 
	$wp_customize->add_setting( 'obox_sidebar_features_active_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sidebar_features_active_text', array(
		'label' => __( 'Active Text', 'obox' ),
		'section' => 'obox_sidebar_features',
		'settings' => 'obox_sidebar_features_active_text',
		'priority' => 30,
	)));
	
	
	/* Site Wide - Call to Action:
		- Background 
		- Text
		- Link Background
		- Link Text 
		- Link Border 
		- Link Background Hover
		- Link Text Hover  
		- Link Border Hover 
	*/
	
	$wp_customize->add_section('obox_sitewide_cta', array(
		'title' => __( 'Site Wide - Call to Action', 'obox' ),
		'priority' => 34,
		)
	);
	
	// Site Wide - Call to Action - Background
	$wp_customize->add_setting( 'obox_sitewide_cta_background', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_background',
		'priority' => 1,
	)));
	
	// Site Wide - Call to Action - Text
	$wp_customize->add_setting( 'obox_sitewide_cta_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_text',
		'priority' => 10,
	)));
	
	// Site Wide - Call to Action - Link Background
	$wp_customize->add_setting( 'obox_sitewide_cta_link_background', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_link_background', array(
		'label' => __( 'Link Background', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_link_background',
		'priority' => 20,
	)));
	
	// Site Wide - Call to Action - Link Text
	$wp_customize->add_setting( 'obox_sitewide_cta_link_text', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_link_text', array(
		'label' => __( 'Link Text', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_link_text',
		'priority' => 30,
	)));
	
	// Site Wide - Call to Action - Link Border
	$wp_customize->add_setting( 'obox_sitewide_cta_link_border', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_link_border', array(
		'label' => __( 'Link Border', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_link_border',
		'priority' => 40,
	)));

	// Site Wide - Call to Action - Link Background Hover
	$wp_customize->add_setting( 'obox_sitewide_cta_link_background_hover', array(
		'default' => '#c7d08f',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_link_background_hover', array(
		'label' => __( 'Link Background Hover', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_link_background_hover',
		'priority' => 50,
	)));
	
	// Site Wide - Call to Action - Link Text Hover
	$wp_customize->add_setting( 'obox_sitewide_cta_link_text_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_link_text_hover', array(
		'label' => __( 'Link Text Hover', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_link_text_hover',
		'priority' => 60,
	)));
	
	// Site Wide - Call to Action - Link Border Hover
	$wp_customize->add_setting( 'obox_sitewide_cta_link_border_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_sitewide_cta_link_border_hover', array(
		'label' => __( 'Link Border Hover', 'obox' ),
		'section' => 'obox_sitewide_cta',
		'settings' => 'obox_sitewide_cta_link_border_hover',
		'priority' => 70,
	)));
	
	
	/* Footer - Container:
		- Background 
	*/
	
	$wp_customize->add_section('obox_footer_container', array(
		'title' => __( 'Footer - Container', 'obox' ),
		'priority' => 35,
		)
	);
	
	// Footer - Container - Background
	$wp_customize->add_setting( 'obox_footer_container_background', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_container_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_footer_container',
		'settings' => 'obox_footer_container_background',
		'priority' => 1,
	)));
	
	
	/* Footer - Widgets:
		- Widget Title  
		- Text  
		- Link
		- Link Hover 
		- Separator
	*/
	
	$wp_customize->add_section('obox_footer_widgets', array(
		'title' => __( 'Footer - Widgets', 'obox' ),
		'priority' => 36,
		)
	);
	
	// Footer - Widgets - Widget Title 
	$wp_customize->add_setting( 'obox_footer_widgets_widgettitle', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_widgets_widgettitle', array(
		'label' => __( 'Widget Title', 'obox' ),
		'section' => 'obox_footer_widgets',
		'settings' => 'obox_footer_widgets_widgettitle',
		'priority' => 1,
	)));
	
	// Footer - Widgets - Text
	$wp_customize->add_setting( 'obox_footer_widgets_text', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_widgets_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_footer_widgets',
		'settings' => 'obox_footer_widgets_text',
		'priority' => 10,
	)));
	
	// Footer - Widgets - Link
	$wp_customize->add_setting( 'obox_footer_widgets_link', array(
		'default' => '#202529',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_widgets_link', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_footer_widgets',
		'settings' => 'obox_footer_widgets_link',
		'priority' => 20,
	)));
	
	// Footer - Widgets - Link Hover
	$wp_customize->add_setting( 'obox_footer_widgets_link_hover', array(
		'default' => '#a8b545',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_widgets_link_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_footer_widgets',
		'settings' => 'obox_footer_widgets_link_hover',
		'priority' => 30,
	)));
	
	// Footer - Widgets - Separator
	$wp_customize->add_setting( 'obox_footer_widgets_separator', array(
		'default' => '#e4e4e4',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_widgets_separator', array(
		'label' => __( 'Separator', 'obox' ),
		'section' => 'obox_footer_widgets',
		'settings' => 'obox_footer_widgets_separator',
		'priority' => 40,
	)));
	
	
	/* Footer - Base:
		- Background
		- Text  
		- Link
		- Link Hover 
	*/
	
	$wp_customize->add_section('obox_footer_base', array(
		'title' => __( 'Footer - Base', 'obox' ),
		'priority' => 37,
		)
	);
	
	// Footer - Base - Background 
	$wp_customize->add_setting( 'obox_footer_base_background', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_base_background', array(
		'label' => __( 'Background', 'obox' ),
		'section' => 'obox_footer_base',
		'settings' => 'obox_footer_base_background',
		'priority' => 1,
	)));
	
	// Footer - Base - Text  
	$wp_customize->add_setting( 'obox_footer_base_text', array(
		'default' => '#999',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_base_text', array(
		'label' => __( 'Text', 'obox' ),
		'section' => 'obox_footer_base',
		'settings' => 'obox_footer_base_text',
		'priority' => 10,
	)));
	
	// Footer - Base - Link  
	$wp_customize->add_setting( 'obox_footer_base_link', array(
		'default' => '#ccc',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_base_link', array(
		'label' => __( 'Link', 'obox' ),
		'section' => 'obox_footer_base',
		'settings' => 'obox_footer_base_link',
		'priority' => 20,
	)));
	
	// Footer - Base - Link Hover
	$wp_customize->add_setting( 'obox_footer_base_link_hover', array(
		'default' => '#fff',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'obox_footer_base_link_hover', array(
		'label' => __( 'Link Hover', 'obox' ),
		'section' => 'obox_footer_base',
		'settings' => 'obox_footer_base_link_hover',
		'priority' => 30,
	)));
	
	wp_reset_query();

//ADD JQUERY

if ( $wp_customize->is_preview() && ! is_admin() )
	add_action( 'wp_footer', 'obox_customize_preview', 21);
	
	function obox_customize_preview() {
	?>
	<script type="text/javascript">
	
	( function( $ ){
	
		// Header - Menu
		wp.customize('obox_contact_header_background',function( value ) {
			value.bind(function(to) {
				jQuery('#header-contact-container, .header-search .search_button, .header-search .search_button:hover').css({'backgroundColor': to});
			});
		});
		wp.customize('obox_contact_header_text',function( value ) {
			value.bind(function(to) {
				jQuery('#header-contacts, .header-search a, .header-contact a, .header-social a, #top-nav li a').css({'color': to});
			});
		});
		wp.customize('obox_contact_header_text_hover',function( value ) {
			value.bind(function(to) {
				jQuery('.header-search a:hover, .header-contact a:hover, .header-social a:hover, #top-nav li a:hover').css({'color': to});
			});
		});
		wp.customize('obox_header_background',function( value ) {
			value.bind(function(to) {
				jQuery('#header-container').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_navigation_font_color',function( value ) {
			value.bind(function(to) {
				jQuery('ul#nav li a').css({'color': to});
			});
		});
		
		wp.customize('obox_subnav_background',function( value ) {
			value.bind(function(to) {
				jQuery('ul#nav ul.sub-menu, ul#nav .children').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_subnav_link',function( value ) {
			value.bind(function(to) {
				jQuery('ul#nav ul.sub-menu li a, ul#nav .children li a').css({'color': to});
			});
		});
		
		wp.customize('obox_subnav_link_hover',function( value ) {
			value.bind(function(to) {
				jQuery('ul#nav ul.sub-menu li a:hover, ul#nav .children li a:hover').css({'backgroundColor': to});
			});
		});
		// Header - Page Title
		
		wp.customize('obox_header_pagetitle_background',function( value ) {
			value.bind(function(to) {
				jQuery('#title-container').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_header_pagetitle_text',function( value ) {
			value.bind(function(to) {
				jQuery('.title-block h2').css({'color': to});
			});
		});
		
		wp.customize('obox_header_pagetitle_blurb',function( value ) {
			value.bind(function(to) {
				jQuery('.title-block p').css({'color': to});
			});
		});
		
		
		// Header - Breadcrumbs
		
		wp.customize('obox_header_breadcrumbs_background',function( value ) {
			value.bind(function(to) {
				jQuery('#crumbs-container').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_header_breadcrumbs_border',function( value ) {
			value.bind(function(to) {
				jQuery('#crumbs-container').css({'borderColor': to});
			});
		});
		
		wp.customize('obox_header_breadcrumbs_text',function( value ) {
			value.bind(function(to) {
				jQuery('#crumbs li, #crumbs .current, #crumbs .current a').css({'color': to});
			});
		});
		
		wp.customize('obox_header_breadcrumbs_link',function( value ) {
			value.bind(function(to) {
				jQuery('#crumbs a').css({'color': to});
			});
		});
		
		
		// Content Contained		
		wp.customize('obox_content_contained_background',function( value ) {
			value.bind(function(to) {
				jQuery('#home_page_downs .widget, #home_page_downs .widget:nth-of-type(even), #content-container, #widget-block, .cart_totals table, .related, .upsells').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_content_contained_background',function( value ) {
			value.bind(function(to) {
				jQuery('#site-wide-container .arrow').css({'borderTopColor': to});
			});
		});
		
		
		wp.customize('obox_content_contained_posttitle',function( value ) {
			value.bind(function(to) {
				jQuery('.post-title a, .products .product h3, .product_title, .entry-content h2, .service-title a, .service-title, #comments h2, .content-widget .post-title a, .page-title, .page-title a, .copy h2, .copy h2 a, .copy h3 .copy h3 a, .copy h4, .copy h4 a, .related.products h2, .post-title-block .post-title, .team .post-title').css({'color': to});
			});
		});
		
		wp.customize('obox_content_contained_text',function( value ) {
			value.bind(function(to) {
				jQuery('.copy p, .entry-content p, .content, #comments, .tags').css({'color': to});
			});
		});
		
		wp.customize('obox_content_contained_link',function( value ) {
			value.bind(function(to) {
				jQuery('.copy a, .post-date a, .content a, .entry-content a, .product_meta a, .portfolio-meta a, .tags a').css({'color': to});
			});
		});
		
		wp.customize('obox_content_contained_meta',function( value ) {
			value.bind(function(to) {
				jQuery('.post-date, .content-widget .post-date, .comment .date').css({'color': to});
			});
		});
		
		wp.customize('obox_content_contained_border',function( value ) {
			value.bind(function(to) {
				jQuery('#home_page_downs .widgettitle, .portfolio-meta, .portfolio-meta li, .features-widget .column, .archives_list li, #home_page_downs .widget_text, #home_page_downs .widget_text .widgettitle, #right-column .widgettitle, .meta-title, .portfolio-content .post-title ').css({'borderColor': to});
			});
		});
		
		
		// Content - eCommerce
		
		wp.customize('obox_content_ecommerce_borders',function( value ) {
			value.bind(function(to) {
				jQuery('table td, table th, .cart_totals th, .cart_totals td, .cart_totals table, .shipping-calculator-form, .shipping-calculator-form p, .products .product, .cart_totals table, .shop-block').css({'borderColor': to});
			});
		});
		
		wp.customize('obox_content_ecommerce_price',function( value ) {
			value.bind(function(to) {
				jQuery('.price').css({'color': to});
			});
		});
		
		wp.customize('obox_content_ecommerce_sale',function( value ) {
			value.bind(function(to) {
				jQuery('.onsale').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_content_ecommerce_tab_background',function( value ) {
			value.bind(function(to) {
				jQuery('.tabs li a, .products .product').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_content_ecommerce_tab_active',function( value ) {
			value.bind(function(to) {
				jQuery('.tabs li.active a').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_content_ecommerce_tab_border',function( value ) {
			value.bind(function(to) {
				jQuery('.tabs li a, .tabs li.active a, .tabs, .upsells .products, .related, .related .products, .upsells .product, .related .product, .quantity .input-text, .products .product img, .product_list_widget img, #respond').css({'borderColor': to});
			});
		});
		
		wp.customize('obox_content_ecommerce_tab_text',function( value ) {
			value.bind(function(to) {
				jQuery('.tabs li a, .tabs li.active a').css({'color': to});
			});
		});
		
		
		
		// Comments - Thread
		
		wp.customize('obox_comments_thread_background',function( value ) {
			value.bind(function(to) {
				jQuery('#comments').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_comments_thread_text',function( value ) {
			value.bind(function(to) {
				jQuery('.comment p, .comment .date, .comment .fn').css({'color': to});
			});
		});
		
		wp.customize('obox_comments_thread_link',function( value ) {
			value.bind(function(to) {
				jQuery('#comments a').css({'color': to});
			});
		});
		
		wp.customize('obox_comments_thread_border',function( value ) {
			value.bind(function(to) {
				jQuery('.comment, .comment .children').css({'borderColor': to});
			});
		});
		
		
		// Comments - Leave a Reply
		
		wp.customize('obox_comments_reply_background',function( value ) {
			value.bind(function(to) {
				jQuery('#respond').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_comments_reply_text',function( value ) {
			value.bind(function(to) {
				jQuery('#respond a, #respond .form-allowed-tags, #respond label, #respond .logged-in-as, #respond #reply-title').css({'color': to});
			});
		});
		
		
		
		// Buttons - Content
		
		wp.customize('obox_button_background',function( value ) {
			value.bind(function(to) {
				jQuery('#searchform input[type=submit], .content-widget .read-more, .post-content .read-more, .portfolio-categories a, .slider .action-link, .button, #back-top a').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_button_text',function( value ) {
			value.bind(function(to) {
				jQuery('#searchform input[type=submit], .content-widget .read-more, .post-content .read-more, .portfolio-categories a, .slider .action-link, .button, a.read-more').css({'color': to});
			});
		});
		
		wp.customize('obox_button_comment_background',function( value ) {
			value.bind(function(to) {
				jQuery('#respond #submit').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_button_comment_text',function( value ) {
			value.bind(function(to) {
				jQuery('#respond #submit').css({'color': to});
			});
		});
		
		wp.customize('obox_button_pagination_background',function( value ) {
			value.bind(function(to) {
				jQuery('.pagination .next a, .pagination .previous a').css({'backgroundColor': to});
			});
		});
		
		
		
		// Buttons - eCommerce
		
		wp.customize('obox_button_ecommerce_background',function( value ) {
			value.bind(function(to) {
				jQuery('.add_to_cart_button, .added_to_cart, .single_add_to_cart_button, .button.product_type_variable, .widget_shopping_cart .button, .woocommerce-message .button, .products .product .added_to_cart, .widget_shopping_cart .button.checkout, .shop_table .checkout-button, .price_slider_wrapper .button, #payment .place-order input[type=submit], input[name=update_cart], .widget_shopping_cart .button.checkout, .shop_table .checkout-button, #payment .place-order input[type="submit"], .header-cart-button, .details-link, .header-cart').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_button_ecommerce_text',function( value ) {
			value.bind(function(to) {
				jQuery('.add_to_cart_button, .added_to_cart, .single_add_to_cart_button, .button.product_type_variable, .widget_shopping_cart .button, .woocommerce-message .button, .products .product .added_to_cart, .widget_shopping_cart .button.checkout, .shop_table .checkout-button, .price_slider_wrapper .button, #payment .place-order input[type=submit], input[name=update_cart], .widget_shopping_cart .button.checkout, .shop_table .checkout-button, #payment .place-order input[type="submit"], .header-cart-button, .details-link, .header-cart').css({'color': to});
			});
		});
		
		wp.customize('obox_button_quantity',function( value ) {
			value.bind(function(to) {
				jQuery('.quantity .plus, .quantity .minus').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_button_coupon',function( value ) {
			value.bind(function(to) {
				jQuery('td .coupon .button').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_button_coupon_text',function( value ) {
			value.bind(function(to) {
				jQuery('td .coupon .button').css({'color': to});
			});
		});
		
		
		
		// Sidebar
		wp.customize('obox_sidebar_widgettitle',function( value ) {
			value.bind(function(to) {
				jQuery('.sidebar .widgettitle, #home_page_three_column .widgettitle').css({'color': to});
			});
		});
		
		wp.customize('obox_sidebar_text',function( value ) {
			value.bind(function(to) {
				jQuery('.sidebar, .sidebar p, #home_page_three_column .widget .content, #home_page_three_column .widget .content p').css({'color': to});
			});
		});
		
		wp.customize('obox_sidebar_link',function( value ) {
			value.bind(function(to) {
				jQuery('.sidebar a, #home_page_three_column a').css({'color': to});
			});
		});
		
		wp.customize('obox_sidebar_border',function( value ) {
			value.bind(function(to) {
				jQuery('#home_page_three_column .widget .content, #right-column .widget, #right-column .widget li, .sidebar').css({'borderColor': to});
			});
		});
		
		
		// Sidebar - Features
		
		wp.customize('obox_sidebar_features_background',function( value ) {
			value.bind(function(to) {
				jQuery('.features-content .related-features-container li').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_sidebar_features_text',function( value ) {
			value.bind(function(to) {
				jQuery('.features-content .related-features-container a').css({'color': to});
			});
		});
		
		wp.customize('obox_sidebar_features_border',function( value ) {
			value.bind(function(to) {
				jQuery('.features-content .related-features-container, .features-content .related-features-container li').css({'borderColor': to});
			});
		});
		
		wp.customize('obox_sidebar_features_active_background',function( value ) {
			value.bind(function(to) {
				jQuery('.features-content .related-features-container .active').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_sidebar_features_active_text',function( value ) {
			value.bind(function(to) {
				jQuery('.features-content .related-features-container .active a').css({'color': to});
			});
		});
		
		
		// Site Wide - Call to Action
		
		wp.customize('obox_sitewide_cta_background',function( value ) {
			value.bind(function(to) {
				jQuery('#site-wide-container, .woocommerce_message, .woocommerce-message').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_sitewide_cta_text',function( value ) {
			value.bind(function(to) {
				jQuery('.site-wide-cta span').css({'color': to});
			});
		});
		
		wp.customize('obox_sitewide_cta_link_background',function( value ) {
			value.bind(function(to) {
				jQuery('.site-wide-cta .action-link').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_sitewide_cta_link_text',function( value ) {
			value.bind(function(to) {
				jQuery('.site-wide-cta .action-link').css({'color': to});
			});
		});
		
		wp.customize('obox_sitewide_cta_link_border',function( value ) {
			value.bind(function(to) {
				jQuery('.site-wide-cta .action-link').css({'borderColor': to});
			});
		});
		
		
		// Footer - Container
		
		wp.customize('obox_footer_container_background',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container').css({'backgroundColor': to});
			});
		});
		
		
		// Footer - Widgets
		
		wp.customize('obox_footer_widgets_widgettitle',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-widgets .widgettitle').css({'color': to});
			});
		});
		
		wp.customize('obox_footer_widgets_text',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-widgets, .footer-widgets .dater').css({'color': to});
			});
		});
		
		wp.customize('obox_footer_widgets_link',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-widgets a').css({'color': to});
			});
		});
		
		wp.customize('obox_footer_widgets_separator',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-widgets .widget li').css({'borderColor': to});
			});
		});
		
		
		// Footer - Base
		
		wp.customize('obox_footer_base_background',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-base-container').css({'backgroundColor': to});
			});
		});
		
		wp.customize('obox_footer_base_text',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-text').css({'color': to});
			});
		});
		
		wp.customize('obox_footer_base_link',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-text a').css({'color': to});
			});
		});

	
	} )( jQuery );
	</script>
	
<?php } 

// CHANGE ORDER
$wp_customize->get_section('title_tagline')->priority = 40;

// REMOVE SECTION
$wp_customize->remove_section( 'static_front_page');


// ADD POST MESSAGE (dunno if this is really needed?)
$wp_customize->get_setting('obox_header_background')->transport='postMessage';
}
add_action( 'customize_register', 'obox_customize_register' );


// CUSTOM CSS
function ocmx_add_query_vars($query_vars) {
	$query_vars[] = 'stylesheet';
	return $query_vars;
}
add_filter( 'query_vars', 'ocmx_add_query_vars' );
function ocmx_takeover_css() {
		$style = get_query_var('stylesheet');
		if($style == "custom") {
			get_template_part("/style");
			exit;
		}
	}
add_action( 'template_redirect', 'ocmx_takeover_css');