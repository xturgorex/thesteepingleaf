<?php
class obox_content_testimonials_widget extends WP_Widget {
	/** constructor */
	function __construct() {
			$widget_ops = array( 'classname' => 'obox_testimonials', 'description' => 'Display Testimonials on your home page.' );
			parent::__construct( 'obox_content_testimonials_widget', '(Obox) Testimonials Widget', $widget_ops );
    }
	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		global $woocommerce;
		
		extract( $args );
		
		// Turn $instance array into variables
		$instance_defaults = array ('post_count' => 3);
		$instance_args = wp_parse_args( $instance );
		extract( $instance_args, EXTR_SKIP );
		
		if(isset($post_category) && $post_category != "0" && $post_category != "") :
			$args = array(
				"post_type" => 'testimonials',
				"posts_per_page" => $post_count,
				"tax_query" => array(
					array(
						"taxonomy" => 'testimonials-category',
						"field" => "slug",
						"terms" => $post_category
						
					)
				)		
			);
		else :
			$args = array(
				"post_type" => 'testimonials',
				"posts_per_page" => $post_count
			);
		endif;

		$loop = new WP_Query($args); ?>
		
		<li class="testimonials-content-widget widget clearfix">
			
			<?php if(isset($title) && $title != "") : ?>
				<h3 class="widgettitle"><?php echo $title; ?></h3>
			<?php endif; ?>
			
			<ul class="testimonials-container">            
				<?php 
					while ( $loop->have_posts() ) : $loop->the_post(); 
						global $post;
						$link = get_post_meta($post->ID, "link", true); ?>
				 
						<li class="testimonial-item column <?php if($loop->current_post != 0) : echo 'no_display'; else: echo 'active'; endif;?>">
							<?php if(has_post_thumbnail()) : ?>
                                <div class="testimonial-image">
									<?php the_post_thumbnail('thumbnail'); ?>     
                                </div>
							<?php endif; ?>
                            <div class="testimonial-body">
                                <blockquote><?php the_excerpt(); ?></blockquote>
                                <cite class="testimonial-name">
                                    <?php if(isset($link) && $link !='' ): ?>
                                        <a target="_blank" href="<?php echo $link; ?>"><?php the_title(); ?></a>
                                    <?php else : ?>
                                        <?php the_title(); ?>
                                    <?php endif;?>
                                </cite>
                            </div>
						</li>
				<?php endwhile; ?>
			</ul>
			<?php if(isset($auto_interval) && $auto_interval != '') : ?>
				<div class="auto-slide no_display"><?php echo $auto_interval; ?></div>
			<?php endif; ?>
		</li>
	
<?php
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		
		// Turn $instance array into variables
		$instance_defaults = array ('post_count' => 5, 'title' => __('Testimonials', 'ocmx'));
		$instance_args = wp_parse_args( $instance, $instance_defaults );
		extract( $instance_args, EXTR_SKIP ); ?>

		<p><em>Use the <a href="edit.php?post_type=testimonials">Testimonials</a> section to add all your favourite quotes. You may customize the font under Theme Options.</em></p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ocmx'); ?><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(isset($title)) { echo $title; } ?>" /></label>
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id('post_category'); ?>">Category</label>
        	<?php $cat_list = get_terms("testimonials-category", "orderby=slug&hide_empty=0");?>
        	<select size="1" class="widefat" id="<?php echo $this->get_field_id("post_category"); ?>" name="<?php echo $this->get_field_name("post_category"); ?>">
                <option value="0">All</option>
                <?php foreach($cat_list as $tax) :
                    $use_value =  $tax->name;
                    if($use_value == $post_category)
                        {$selected = " selected='selected' ";}
                    else
                        {$selected = " ";} ?>
                    <option <?php echo $selected; ?> value="<?php echo $use_value; ?>"><?php echo $tax->name; ?></option>
                <?php endforeach; ?>
			</select>
        </p>
		<p>
		<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e("Post Count", "ocmx"); ?></label>
        <select size="1" class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>">
			<?php $i = 1;
            	while($i < 13) :?>
                    <option <?php if($post_count == $i) : ?>selected="selected"<?php endif; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php if($i < 1) :
                            $i++;
                        else:
                            $i=($i+1);
                        endif;
            	endwhile; ?>
        </select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('auto_interval'); ?>"><?php _e("Auto Slide Interval (seconds)", "ocmx"); ?><input class="shortfat" id="<?php echo $this->get_field_id('auto_interval'); ?>" name="<?php echo $this->get_field_name('auto_interval'); ?>" type="text" value="<?php if(isset($auto_interval)) echo $auto_interval; ?>" /><br /><em><?php _e("(Set to 0 for no auto-sliding)", "ocmx"); ?></em></label>
		</p>	  
	
<?php 
	} // form

}// class

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("obox_content_testimonials_widget");'));

?>