<?php 
/**
 * Template Name: Shop
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

get_header();
global $product;
global $post;
$_product = $product;?>

<?php get_template_part('/functions/page-title'); ?>

<div id="content" class="clearfix">
	<div id="left-column" class="three-column">
		<?php do_action('woocommerce_before_single_product', $post, $_product); ?>
			<?php if ( have_posts() ) : ?>
				<div class="shop-block">
					<?php  do_action('woocommerce_before_shop_loop'); ?>
				</div>
				<ul class="products">

				<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>



		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : 
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