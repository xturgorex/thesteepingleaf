<?php get_header();
global $product;
global $post;
$_product = $product;?>

<?php get_template_part('/functions/page-title'); ?>

<div id="content" class="clearfix">
<div id="selectors">

	<img id="top-selector-img" class="selector-img" src="/wp-content/themes/store-child-01/images/varietyselector.png">	
	<div id="variety-selector" class="selector frame">
		<ul id="variety-selector-inner" class="selector-inner slidee">
			<?php wp_list_categories('taxonomy=product_cat&child_of=75&depth=-1&hide_empty=0&title_li=' ); ?> 
		</ul>
	</div>
	<img id="left-variety" class="left arrow variety-arrow" src="/wp-content/themes/store-child-01/images/left-arrow.png">
	<img id="right-variety" class="right arrow variety-arrow" src="/wp-content/themes/store-child-01/images/right-arrow.png">
	<img id="middle-selector-img" class="selector-img" src="/wp-content/themes/store-child-01/images/moodselector.png">
	<div id="mood-selector" class="selector frame">
		<ul id="mood-selector-inner" class="selector-inner slidee">
			<?php wp_list_categories('taxonomy=product_cat&child_of=79&depth=-1&hide_empty=0&title_li=' ); ?> 
		</ul>
	</div>
	<img id="left-mood" class="left arrow mood-arrow" src="/wp-content/themes/store-child-01/images/left-arrow.png">
	<img id="right-mood" class="right arrow mood-arrow" src="/wp-content/themes/store-child-01/images/right-arrow.png">
	<img id="bottom-selector-img" class="selector-img" src="/wp-content/themes/store-child-01/images/bottomselector.png">
</div>

	<div id="left-column" class="three-column">

		<?php do_action('woocommerce_before_single_product', $post, $_product); ?>
		
		<?php 
		$cat = $wp_query->get_queried_object();
	    	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_image_src($thumbnail_id, '4-3-large');
		$product_cat_image = get_option("ocmx_product_cat_image");
		?>

		<?php if(isset($product_cat_image) && $product_cat_image == "yes" && $image[0] !="") : ?>
			<div class="product-category-image">
				<img src="<?php echo $image[0]; ?>" alt="" />
			</div>
		<?php endif; ?>

		<ul class="products">
			<?php if (have_posts()) :
				woocommerce_product_subcategories();
				while (have_posts()) :	the_post(); setup_postdata($post);
					woocommerce_get_template_part( 'content', 'product' );
				endwhile;
				woocommerce_product_loop_end();
			else :
				get_template_part("/functions/post-empty");
			endif; ?>
		</ul>
		<?php motionpic_pagination("clearfix", "pagination clearfix"); ?>
	</div>
	<?php if(get_option("ocmx_shop_sidebar_layout") != "sidebarnone"): ?>
		<?php get_sidebar(); ?>
	<?php endif;?>
</div>

<?php get_footer(); ?>