<?php
get_header();
$pagetitle_copy = get_option("ocmx_pagetitle_copy");
?>

<div id="title-container">
	<div class="title-block">
		<h2><?php _e('Search Results:', 'ocmx') ?> </h2>
        <p class="results">"<?php if(the_search_query !="") { printf(the_search_query()); }?>"</p>
	</div>
</div>

<div id="content" class="clearfix">
	<div id="left-column">
		<ul class="post-list">
			<?php if (have_posts()) :
				while (have_posts()) :	the_post(); setup_postdata($post);
					get_template_part("/functions/post-list");
				endwhile;
			else :
				get_template_part("/functions/post-empty");
			endif; ?>
		</ul>
		<?php motionpic_pagination("clearfix", "pagination clearfix"); ?>
	</div>

	<?php if(get_option("ocmx_sidebar_layout") != "sidebarnone"): ?>
		<?php get_sidebar(); ?>
	<?php endif;?>
</div>

<?php get_footer(); ?>