<?php global $post, $post_type, $fullwidth;
$layout = get_option( "ocmx_sidebar_layout" );
if($fullwidth =1 || isset($layout) && $layout == 'sidebarnone') :
	$resizer = '1000auto';
	$width = '1000';
else :
	$resizer = '660auto';
	$width = '660';
endif;


$args  = array('postid' => $post->ID, 'width' => $width, 'hide_href' => true, 'exclude_video' => false, 'imglink' => false, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => $resizer);
$image = get_obox_media($args);

$social = get_option("ocmx_meta_social_post");
$social_code = get_option("ocmx_social_tag");

// Meta Arguments
if(!is_page()) :
	$date = get_option("ocmx_meta_date_post");
	$author = get_option("ocmx_meta_author_post");
	$category = get_option("ocmx_meta_category");
	$tags = get_option("ocmx_meta_tags");
	$social = get_option("ocmx_meta_social_post");
else :
	$date = get_option("ocmx_meta_date_page");
	$author = get_option("ocmx_meta_author_page");
	$social = get_option("ocmx_meta_social_page");
endif;

?>
<li id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

	<?php
	if ( show_meta() ) {
		get_template_part("functions/post-meta");
	} // if can_show_meta
	?>

	<?php if(!is_page()): ?>
		<div class="post-content clearfix <?php if($date != "true" && $author != "true" && $category != "true" && $tags != "true") echo "full-width" ;?>">
	<?php else: ?>
		<div class="post-content clearfix <?php if($date != "true" && $author != "true") echo "full-width" ;?>">
	<?php endif; ?>
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

		<?php if( $social_code !="" ) : ?>
                <div class="social"><?php echo $social_code; ?></div>  
        <?php endif; ?>  

		<?php
		if( !is_page() && get_option( "ocmx_meta_post_links") != "false" ): ?>
			<ul class="next-prev-post-nav">
				<li>
					<?php if ( get_adjacent_post( false, '', true ) ): // if there are older posts ?>
						&larr;  <span><?php previous_post_link("%link", "%title"); ?></span>
					<?php else : ?>
						&nbsp;
					<?php endif; ?>
				</li>
				<li>
					<?php if ( get_adjacent_post( false, '', false ) ): // if there are newer posts ?>
						<span><?php next_post_link("%link", "%title"); ?></span> &rarr;
					<?php else : ?>
						&nbsp;
					<?php endif; ?>    
				</li>
			</ul>
		<?php endif; ?>

		<?php if(comments_open()) { comments_template(); }?>
	</div>
</li>