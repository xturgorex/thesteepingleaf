<?php // If we want to show the full content, ignore the more tag
if( get_option( "ocmx_content_length" ) == "no" ) :
	global $more;    // Declare global $more (before the loop).
	$more = 0;
endif;

// Declare the image sizes
$layout = get_option( "ocmx_sidebar_layout" );
if(isset($layout) && $layout == 'sidebarnone') :
	$resizer = '4-3-large';
	$width = '940';
	$height = '529';
else :
	$resizer = '4-3-medium';
	$width = '660';
	$height = '360';
endif;

// Feature Image
$args  = array( 'postid' => $post->ID, 'width' => $width, 'height' => $height, 'hide_href' => false, 'exclude_video' => true, 'wrap' => 'div', 'wrap_class' => 'post-image fitvid', 'resizer' => $resizer );

$image = get_obox_media( $args );

// Fetch Post Format & meta associated
$format = get_post_format();
$quote_link = get_post_meta($post->ID, "quote_link", true);
$link = get_permalink( $post->ID );

$social = get_option("ocmx_meta_social_post");
$social_code = get_option("ocmx_social_tag");

$date = get_option("ocmx_meta_date_post");
$author = get_option("ocmx_meta_author_post");
$category = get_option("ocmx_meta_category");
$tags = get_option("ocmx_meta_tags");
$social = get_option("ocmx_meta_social_post");

$share_url = wp_get_shortlink($post->ID);
$share_title = get_the_title($post->ID); 
?>
<li id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>

	<?php get_template_part("/functions/post-meta"); ?>

	<div class="post-content clearfix <?php if($date != "true" && $author != "true" && $category != "true" && $tags != "true") echo "full-width" ;?> <?php if($layout == 'sidebarnone') : ?>one-column<?php endif; ?>">

		<?php if( $format != 'quote' ) : // Render Normal content ?>

			<div class="post-title-block">
				<h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
			</div>

			<!--Show the Featured Image or Video -->
			<?php  if($image != "") { echo $image; } ?>

			<!--Begin Excerpt -->
			<div class="copy">
				<?php if( get_option( "ocmx_content_length" ) != "no" ) :
					if(strpos($post->post_content, '<!--more-->')) : // Obey the more tag
						the_content('');
						echo "<p><a class='read-more' href='".$link."'>Read more</a></p>";
					else : // Use the excerpt or the content shortened
						the_excerpt();
						echo "<p><a class='read-more' href='".$link."'>Read more</a></p>";
					endif;
				else :  // Use the full content
					echo the_content('');
				endif; ?>
			</div>
		<?php else : // Render Quote content ?>

			<div class="copy"><?php the_content(); ?></div>
			<cite>&mdash; <?php if($quote_link != '') : ?><a href="<?php echo $quote_link; ?>" target="_blank"><?php the_title(); ?></a> <?php else : the_title(); endif; ?></cite>

		<?php endif; ?>

	</div>
</li>