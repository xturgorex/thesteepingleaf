<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
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