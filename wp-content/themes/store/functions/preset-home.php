<?php			
if (get_option("ocmx_slider_cat") != '1') :
					
	//SLIDER
	the_widget("obox_feature_posts_widget", array(
		"posttype" => "slider",
		"post_category" => get_option("ocmx_slider_cat"),
		"post_count" => get_option("ocmx_feature_post_count"),
		"auto_interval" => get_option("ocmx_feature_post_interval")
	));
	
endif; ?>


<div id="widget-block" class="clearfix <?php if (get_option("ocmx_slider_cat") != '1') : ?>home-page <?php else : ?>no-slider <?php endif;?>">
	<ul id="home_page_downs" class="widget-list">
		<?php
		
		if ( class_exists( "WooCommerce" ) && get_option("ocmx_products_four_col_two_cat") != 1) :
			
			// PRODUCTS FOUR COL
			the_widget("obox_category_widget", array(
				"title" => get_option("ocmx_products_three_col_cat_title"),
				"columns" => '3',
				'cat1' => get_option("ocmx_products_three_col_cat_one"),
				'cat2' => get_option("ocmx_products_three_col_cat_two"),
				'cat3' => get_option("ocmx_products_three_col_cat_three"),
				'show_images' => 'on'
			
			));
			
		endif; 

		if ( class_exists( "WooCommerce" ) && get_option("ocmx_products_four_col_two_cat") != 1) :
			
			// PRODUCTS FOUR COL
			the_widget("obox_hero_widget", array(
				'left_title_1' => get_option("ocmx_products_hero_left_one_title"),
				'left_post_category_1' => get_option("ocmx_products_hero_left_one_cat"),
				'left_post_count_1' => get_option("ocmx_products_hero_left_one_post_count"),

				'left_title_2' => get_option("ocmx_products_hero_left_two_title"),
				'left_post_category_2' => get_option("ocmx_products_hero_left_two_cat"),
				'left_post_count_2' => get_option("ocmx_products_hero_left_two_post_count"),

				'middle_title' => get_option("ocmx_products_hero_middle_title"),
				'middle_post_category' => get_option("ocmx_products_hero_middle_cat"),
				'middle_post_count' => get_option("ocmx_products_hero_middle_post_count"),
				'middle_add_cart' => 'on',

				'right_title_1' => get_option("ocmx_products_hero_right_one_title"),
				'right_post_category_1' => get_option("ocmx_products_hero_right_one_cat"),
				'right_post_count_1' => get_option("ocmx_products_hero_right_one_post_count"),

				'right_title_2' => get_option("ocmx_products_hero_right_two_title"),
				'right_post_category_2' => get_option("ocmx_products_hero_right_two_cat"),
				'right_post_count_2' => get_option("ocmx_products_hero_right_two_post_count"),
			));
			
		endif; 

		if ( class_exists( "WooCommerce" ) && get_option("ocmx_products_four_col_cat") != 1) :
			
			// PRODUCTS FOUR COL
			the_widget("obox_product_content_widget", array(
				"title" => get_option("ocmx_products_four_col_title"),
				"post_count" => get_option("ocmx_products_four_col_post_count"),
				"product_content" => "recent-products",
				"layout_columns" => 'four',
				"post_category" => get_option("ocmx_products_four_col_cat"),
				"post_thumb" => '1'
			));
			
		endif; 

		if ( class_exists( "WooCommerce" ) && get_option("ocmx_products_four_col_two_cat") != 1) :
			
			// PRODUCTS FOUR COL
			the_widget("obox_product_content_widget", array(
				"title" => get_option("ocmx_products_four_col_two_title"),
				"post_count" => get_option("ocmx_products_four_col_two_post_count"),
				"product_content" => "recent-products",
				"layout_columns" => 'four',
				"post_category" => get_option("ocmx_products_four_col_two_cat"),
				"post_thumb" => '1'
			));
			
		endif; 
		

		if (get_option("ocmx_partners_four_col_cat") != 1) :
			
			// PARTNERS FOUR COL
			the_widget("obox_content_widget", array(
				"title" => get_option("ocmx_partners_four_col_title"),
				"posttype" => "partners",
				"post_count" => get_option("ocmx_partners_four_col_post_count"),
				"layout_columns" => 'four',
				"postfilter" => "partners-category",
				"filterval" => get_option("ocmx_partners_four_col_cat"),
				"post_thumb" => "",
			));
			
		endif;

		// TEXT WIDGET
		the_widget("WP_Widget_Text", array(
			"title" => get_option("ocmx_text_widget_title"), 
			"text" => get_option("ocmx_text_widget_text"), 
			
		));

		?>
	</ul>
</div>