<?php 
global $product;
$_product = $product; 
$link = get_permalink($post->ID); 
$attachmentargs = array("post_type" => "attachment", "post_parent" => $post->ID,  "offset" => 1, "orderby" => "menu_order", "order" => "DESC");
$attachments = get_posts($attachmentargs);
$attachment_ids = $product->get_gallery_attachment_ids(); ?>
<?php do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>	

	
	<div class="product-top clearfix">
				<div class="product-images">
			<?php if(get_option('ocmx_product_gallery') =="gallery" && $attachment_ids) :  // Show the Featured Image
				do_action( 'woocommerce_product_thumbnails', $post, isset($product) );
			elseif(get_option('ocmx_product_gallery') =="slider" && $attachment_ids) : ?>
				<div class="gallery-slider clearfix">
					<?php if(obox_has_video($post->ID)):
						$args  = array('postid' => $post->ID, 'width' => 660, 'height' => '495', 'hide_href' => true, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid');
						$image = get_obox_media($args);
						echo $image;
					else : ?>
						<ul class="gallery-container">
							<?php $attach_args = array("post_type" => "attachment", "post_parent" => $post->ID, "numberposts" => "-1", "orderby" => "menu_order", "order" => "DESC");
							$attachments = get_posts($attach_args);
							foreach($attachments as $attachement => $this_attachment) :  
								$image = wp_get_attachment_image_src($this_attachment->ID, "660auto");
								$full = wp_get_attachment_image_src($this_attachment->ID,  "full"); ?>
								<li>
									<a href="<?php echo $full[0]; ?>" rel="lightbox">
										<img src="<?php echo $image[0]; ?>" alt="<?php echo $this_attachment->post_title; ?>" />
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php if(count($attachments) > 1) : ?>
							<div class="controls"> 
								<a href="#" class="previous"><i class="fa fa-angle-double-left fa-2x"></i></a>
								<a href="#" class="next"><i class="fa fa-angle-double-right fa-2x"></i></a>
							</div> 
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php else : 
					if(obox_has_video($post->ID)){
							$args  = array('postid' => $post->ID, 'width' => 660, 'height' => '495', 'hide_href' => true, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid');
							$image = get_obox_media($args);
							echo $image;
					}else{
						do_action( 'woocommerce_before_single_product_summary', $post, $_product ); 
					} 
				endif; ?>
		</div>			
		
		<!-- Show the Product Summary -->  
		<div class="purchase-options-container">
			<div class="product-price">
				<?php do_action( 'woocommerce_single_product_summary', $post, $_product ); ?>
			</div>
			<?php if( get_option("ocmx_social_tag") !="" ) : ?>
                <div class="social"><?php echo get_option("ocmx_social_tag"); ?></div> 
            <?php endif; ?>
		</div>
	</div>  
	  
	<?php do_action( 'woocommerce_after_single_product_summary', $post, isset($_product) ); ?>
    <meta itemprop="url" content="<?php the_permalink(); ?>" />
</div>                   