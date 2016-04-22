<?php
class obox_facebook_widget extends WP_Widget {
    /** constructor */
	function __construct() {
			$widget_ops = array( 'classname' => 'obox_facebook_widget column clearfix', 'description' => 'Display a Facebook Like Box.' );
			parent::__construct( 'obox_facebook_widget', '(Obox) Facebook Like Box', $widget_ops );
    	}
   /** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args);
		$height = $instance['height'];
		$title = $instance['title'];
		$stream = $instance['stream'];
		$facebookpage = $instance['facebookpage'];
		$faces = $instance['faces'];

         ?>
         <?php echo $before_widget; ?>
         	<div class="content">
			<h4 class="widgettitle">
            	<a href="https://www.facebook.com/<?php echo $facebookpage; ?>" target="_blank"><?php echo $title; ?></a>
            </h4>
		
            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F<?php echo $facebookpage; ?>&amp;width=300&amp;height=<?php echo $height; ?>&amp;show_faces=<?php echo $faces; ?>&amp;colorscheme=light&amp;stream=<?php echo $stream; ?>&amp;border_color&amp;header=false&amp;appId=289052711225982" scrolling="no" frameborder="0" style="width:100%; height:<?php echo $height; ?>px;" allowTransparency="true"></iframe>
           
       		</div>
       	<?php echo $after_widget; ?>
<?php    }

 /** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		// Turn $instance array into variables
		$instance_defaults = array ( 'title' => 'Follow Us on Facebook', 'facebookpage' => 'oboxthemes', 'height' => '300');
		$instance_args = wp_parse_args( $instance, $instance_defaults );
		extract( $instance_args, EXTR_SKIP );
		
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">Title<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            
            <p>
            	<label for="<?php echo $this->get_field_id('facebookpage'); ?>">
                	Facebook Page Name
                	<input class="widefat" id="<?php echo $this->get_field_id('facebookpage'); ?>" name="<?php echo $this->get_field_name('facebookpage'); ?>" type="text" value="<?php echo $facebookpage; ?>" />
	                <small class="obox-widget-tip">Example: oboxthemes</small>
				</label>
			</p>
            
            <p>
            	<label for="<?php echo $this->get_field_id('height'); ?>">
	                Height (in pixels)
            		<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
	                <small class="obox-widget-tip">Example: 300</small>
            	</label>
            </p>
			
			<p>
            	<label for="<?php echo $this->get_field_id('faces'); ?>">Show Faces
	                <select size="1" class="widefat" id="<?php echo $this->get_field_id('faces'); ?>" name="<?php echo $this->get_field_name('faces'); ?>">
	                    <option <?php if(isset($faces) && $faces == "true") : ?>selected="selected"<?php endif; ?> value="true">Yes</option>
	                    <option <?php if(isset($faces) && $faces == "false") : ?>selected="selected"<?php endif; ?> value="false">No</option>
	                </select>
                </label>
			</p>
			
			<p>
            	<label for="<?php echo $this->get_field_id('stream'); ?>">Show Stream
	                <select size="1" class="widefat" id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>">
	                    <option <?php if(isset($stream) && $stream == "true") : ?>selected="selected"<?php endif; ?> value="true">Yes</option>
	                    <option <?php if(isset($stream) && $stream == "false") : ?>selected="selected"<?php endif; ?> value="false">No</option>
	                </select>
                </label>
			</p>	

        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("obox_facebook_widget");'));
?>