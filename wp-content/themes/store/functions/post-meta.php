<?php
global $post;

// Meta Arguments
if(!is_page()) :
	$date = get_option("ocmx_meta_date_post");
	$author = get_option("ocmx_meta_author_post");
	$category = get_option("ocmx_meta_category");
	$tags = get_option("ocmx_meta_tags");
	$show = $date != "false" || $author != "false" || $category != "false" || $tags != "false";
else :
	$date = get_option("ocmx_meta_date_page");
	$author = get_option("ocmx_meta_author_page");
	$show = $date != "false" || $author != "false";
endif; ?>

<?php if(isset($show) && $show) : ?>
	<div class="post-meta">
		<h4 class="meta-title"><?php _e("Post Detail", "ocmx"); ?></h4>
		<ul class="meta-block">
			<?php //Hide the date
			if( isset($date) && $date != "false") { 
				echo '<li>';
					echo '<span>Posted On</span>'; 
					echo the_time(get_option('date_format'));
				echo '</li>';
			} ?>
			<?php // Hide the author
			if( isset($author) && $author != "false" ) {
				echo '<li>';
					echo '<span>Written By</span>';
					the_author_posts_link();
				echo '</li>';
			} ?>
			<?php 
			if( isset($category) && $category != "false" ) {
				echo '<li>';
					echo '<span>Filed In</span>';
					the_category(', ');
				echo '</li>';
			} ?>
			<?php // Hide the Tags
			if( isset($tags) && $tags != "false" ) {
				echo '<li>';
					the_tags('<span>Tags</span>',', '); 
				echo '</li>';
			} ?>
		</u>
	</div>
<?php endif; ?>