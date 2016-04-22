<?php
/*
Template Name: Shop
*/
/**
	!!!! This part added by ME to trick the woocommerce override system
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		Obox themes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
get_header(); ?>

<?php get_template_part('/functions/page-title'); ?>

<div id="content" class="products-single clearfix">
	<div id="left-column">
		<?php if (have_posts()) :
			while (have_posts()) :	the_post(); setup_postdata($post);
				get_template_part("/functions/product-view");
			endwhile;
		else :
			get_template_part("/functions/post-empty");
		endif; ?>
	</div>
	<!-- Begin Sidebar -->
	<?php get_sidebar(); ?>
</div>

<!-- Begin Footer -->
<?php get_footer(); ?>