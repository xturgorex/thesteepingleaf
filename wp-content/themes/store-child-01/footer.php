	<?php global $obox_themeid; ?>

	</div> <!--end Footer Container -->

	<div id="footer-base-container">
		<div class="footer-text">
			<div id="footer-navigation-container">
				<?php wp_nav_menu(array(
					'menu' => 'Footer Nav',
					'menu_id' => 'footer-nav',
					'menu_class' => 'clearfix',
					'sort_column' 	=> 'menu_order',
					'theme_location' => 'secondary',
					'container' => 'ul',
					'fallback_cb' => 'ocmx_fallback_secondary')
				); ?>
			</div>

			<p><?php echo get_option("ocmx_custom_footer"); ?></p>
			<?php if(get_option("ocmx_logo_hide") != "true") : ?>
				<div class="obox-credit">
				   <p><a href="http://oboxthemes.com/ecommerce">WordPress eCommerce Theme</a> by <a href="http://oboxthemes.com"><img src="<?php echo get_template_directory_uri(); ?>/images/obox-logo.png" alt="Theme created by Obox" /></a></p>
				</div>
			<?php endif; ?>
		</div>
	</div> <!--end Footer Base Container -->

</div><!--end Wrapper -->


<?php if(get_option("ocmx_backtop") != "true") : ?>
	<div id="back-top">
		<a href="#top"></a>
	</div>
<?php endif; ?>

<!--Get Google Analytics -->
<?php
	if(get_option("ocmx_googleAnalytics")) :
		echo stripslashes(get_option("ocmx_googleAnalytics"));
	endif;
?>

<?php wp_footer(); ?>
</body>
</html>

