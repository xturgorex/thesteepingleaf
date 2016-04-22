<?php
function ocmx_add_scripts()
	{
		global $obox_themeid, $post;

		//Add support for 2.9 and 3.0 functions and setup jQuery for theme
		wp_enqueue_script("jquery");
		if(!is_admin() && !(in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ):
			// Include stylesheets
			wp_enqueue_style( $obox_themeid.'-style', get_template_directory_uri().'/style.css');
			wp_enqueue_style( $obox_themeid.'-responsive', get_template_directory_uri().'/responsive.css');
			wp_enqueue_style( $obox_themeid.'-jplayer', get_template_directory_uri().'/ocmx/jplayer.css');
			wp_enqueue_style( $obox_themeid.'-customizer', home_url().'/?stylesheet=custom');
			
			//Fonts
			wp_register_style( $obox_themeid.'-baskerville', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic');
	        		wp_enqueue_style( $obox_themeid.'-baskerville');
			wp_register_style( $obox_themeid.'-rufina', '//fonts.googleapis.com/css?family=Rufina:400,700');
	        		wp_enqueue_style( $obox_themeid.'-rufina');
	        		wp_register_style( $obox_themeid.'-montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	        		wp_enqueue_style( $obox_themeid.'-montserrat');
								
			wp_enqueue_style( $obox_themeid.'-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
			
			// Theme Scripts
			wp_enqueue_script( $obox_themeid."-menus", get_template_directory_uri()."/scripts/menus.js", array( "jquery" ) );
			wp_enqueue_script( $obox_themeid."-fitvid", get_template_directory_uri()."/scripts/fitvid.js", array( "jquery" ) );
			wp_enqueue_script( $obox_themeid."-scripts", get_template_directory_uri()."/scripts/theme.js", array( "jquery" ) );
			
			if ( is_singular() ) wp_enqueue_script( "comment-reply" );
			
			if(
				( is_home() && is_active_sidebar( 'slider' ) ) ||
				( is_home() && get_option( 'ocmx_home_page_layout' ) == 'preset' &&  get_option("ocmx_slider_cat") != '1' ) ||
				(!is_tax() && wp_basename( get_page_template() ) == 'widget-page.php' )
			) :
				wp_enqueue_script( $obox_themeid."-slider", get_template_directory_uri()."/scripts/slider.js", array( "jquery" ) );
			elseif( is_page() && wp_basename(get_page_template()) == 'contact.php') :
				wp_enqueue_script( $obox_themeid."-map-api","//maps.googleapis.com/maps/api/js?sensor=false");
				wp_enqueue_script( $obox_themeid."-map-trigger", get_template_directory_uri()."/scripts/maps.js", array( "jquery" ) );

				if( get_post_meta( $post->ID , 'zoom-level' , true ) != '' ) {
					$zoomlevel = get_post_meta( $post->ID , 'zoom-level' , true );
				} else {
					$zoomlevel = 15;
				}
				wp_localize_script( $obox_themeid."-map-trigger", "mapsettings", array( 'zoomlevel' => $zoomlevel ) );

			endif;
			
			wp_enqueue_script( $obox_themeid."-portfolio", get_template_directory_uri()."/scripts/portfolio.js", array( "jquery" ) );
			wp_enqueue_script( $obox_themeid."-classie", get_template_directory_uri()."/scripts/classie.js", array( "jquery" ), array(), true );
			wp_enqueue_script( $obox_themeid."-aniheader", get_template_directory_uri()."/scripts/aniheader.js", array( "jquery" ), array(), true );

			//Localization
			wp_localize_script( $obox_themeid."-jquery", "ThemeAjax", array( "ajaxurl" => admin_url( "admin-ajax.php" ) ) );

		else :
			/* Back-end */
			wp_enqueue_script( 'jquery-ui-draggable' );
			wp_enqueue_script( 'jquery-ui-droppable' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui-tabs' );

			wp_enqueue_script( "ajaxupload", get_template_directory_uri()."/scripts/ajaxupload.js", array( "jquery" ) );
			wp_enqueue_script( "ocmx-jquery", get_template_directory_uri()."/scripts/ocmx.js", array( "jquery" ) );
			wp_localize_script( "ocmx-jquery", "ThemeAjax", array( "ajaxurl" => admin_url( "admin-ajax.php" ) ) );

			wp_enqueue_style( 'welcome-page', get_template_directory_uri() . '/ocmx/welcome-page.css');
		endif;
	}
add_action('wp_enqueue_scripts', 'ocmx_add_scripts');
add_action('admin_enqueue_scripts', 'ocmx_add_scripts');

function ocmx_add_ajax_calls(){
	//AJAX Functions
	add_action( 'wp_ajax_nopriv_ocmx_cart_display', 'ocmx_cart_display'  );
	add_action( 'wp_ajax_ocmx_cart_display', 'ocmx_cart_display' );

	add_action( 'wp_ajax_nopriv_ocmx_cart_button_display', 'ocmx_cart_button_display'  );
	add_action( 'wp_ajax_ocmx_cart_button_display', 'ocmx_cart_button_display' );

	add_action( 'wp_ajax_ocmx_save-options', 'update_ocmx_options');
	add_action( 'wp_ajax_ocmx_reset-options', 'reset_ocmx_options');
	add_action( 'wp_ajax_ocmx_ads-refresh', 'ocmx_ads_refresh' );
	add_action( 'wp_ajax_ocmx_ads-remove', 'ocmx_ads_remove' );
	add_action( 'wp_ajax_ocmx_layout-refresh', 'ocmx_layout_refresh' );
	add_action( 'wp_ajax_ocmx_ajax-upload', 'ocmx_ajax_upload' );
	add_action( 'wp_ajax_ocmx_remove-image', 'ocmx_ajax_remove_image' );
}
add_action('init', 'ocmx_add_ajax_calls');