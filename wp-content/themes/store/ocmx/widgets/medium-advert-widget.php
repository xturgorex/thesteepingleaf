<?php
class obox_medium_ad_widget extends WP_Widget {
    /** constructor */
	function __construct() {
			$widget_ops = array( 'classname' => 'large-advert column clearfix', 'description' => 'Display 300px linked images added under Theme Options > Adverts.' );
			parent::__construct( 'obox_medium_ad_widget', '(Obox) Large Adverts', $widget_ops );
    }
    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args ); 
		echo $before_widget; 
		if(isset($instance["title"]))
			$title = esc_attr($instance["title"]); 
		 if(isset($title)) { echo $before_title; echo $title; echo $after_title; } ?>
            <div class="content">
            	<?php if(get_option("ocmx_medium_ads") !== "0") :
                    for ($i = 1; $i <= get_option("ocmx_medium_ads"); $i++)
                        {
                            $ad_title_id = "ocmx_medium_ad_title_".$i;
                            $ad_link_id = "ocmx_medium_ad_link_".$i;
                            $ad_img_id ="ocmx_medium_ad_img_".$i;
                        	$ad_script_id ="ocmx_medium_ad_script_".$i;
							if(get_option($ad_script_id) !== "") :
								echo stripslashes(get_option($ad_script_id));
                            elseif(get_option($ad_img_id) !== "") :
                ?>
                              <div class="large-ad">
                                <a href="<?php echo get_option($ad_link_id); ?>" class="sponsor-item" title="<?php echo get_option($ad_title_id); ?>" rel="nofollow">
                                    <img src="<?php echo get_option($ad_img_id); ?>" alt="<?php echo get_option($ad_title_id); ?>" />
                                </a>
                              </div>
                <?php
                                if(isset($alt) && $alt == "1") :
                                    $alt = 0;
                                else :
                                    $alt = 1;
                                endif;
                            endif;
                        }	
                endif; ?>
            </div>
<?php echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance["title"]); ?>
        	<p><label for="<?php echo $this->get_field_id('title'); ?>">Title<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        	<p><em>You can modify your sidebar ad's in the <a href="admin.php?page=ocmx-adverts">OCMX Options</a> panel</em></p>
        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("obox_medium_ad_widget");'));

?>