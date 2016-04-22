<?php
/* 
Template Name: Full Width 
*/
get_header();
$fullwidth = 1;
?>

<?php get_template_part('/functions/page-title'); ?>

<div id="content" class="clearfix">
	<ul id="full-width" class="clearfix full-width">
		<?php if (have_posts()) :
			global $post;
			while (have_posts()) : the_post(); setup_postdata($post);
				$resizer = '1000auto';
				$width = '1000';

				$args  = array('postid' => $post->ID, 'width' => $width, 'hide_href' => true, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => $resizer);
				$image = get_obox_media($args);

				$social = get_option("ocmx_meta_social_post");
				$social_code = get_option("ocmx_social_tag");
				?>

				<li id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

					<div class="post-content clearfix">
						<?php if(!is_page()) : ?>
							<div class="post-title-block">
								<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
						<?php endif; ?>

						<?php echo $image; ?>

						<div class="copy">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>

						<?php
						if ( show_meta() ) {
							if(isset($social_code) && $social_code !="") : ?>
								<span class="social"><?php echo get_option("ocmx_social_tag"); ?></span>
							<?php elseif( isset($social) && $social != "false" ) : // Show sharing if enabled in Theme Options ?>
								<!-- AddThis Button BEGIN : Customize at http://www.addthis.com -->
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_button_facebook_like"></a>
									<a class="addthis_button_tweet"></a>
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-507462e4620a0fff"></script>
								<!-- AddThis Button END -->
							<?php endif;
						} // if can_show_meta ?>  

						<?php if(comments_open()) { comments_template(); }?>
					</div>
				</li>

			<?php endwhile;
		else :
			get_template_part("/functions/post-empty");
		endif; ?>
	</ul>
</div>
<?php get_footer(); ?>