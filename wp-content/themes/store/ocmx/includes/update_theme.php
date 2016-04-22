<?php
// Updater removed in 1.4.0

/********************************/
/* Add it to the OCMX Interface */
function ocmx_theme_update_options(){
	$ocmx_tabs = array(
					array(
						  "option_header" => "Update Your Theme",
						  "use_function" => "ocmx_theme_update",
						  "function_args" => "",
						  "ul_class" => "content clearfix",
					  )
				);
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("Update Your Theme ", $ocmx_tabs, "");
};

/********************************************************************/
/* Add the Update Option to the admin menu, after the other options */
function add_update_page(){
	add_submenu_page("functions.php", "Update", "Update", "administrator", "ocmx-update", 'ocmx_theme_update_options');
}
add_filter("admin_menu", "add_update_page", 11);

/*******************************/
/* The Auto Update Starts here */
function ocmx_theme_update(){
	global $obox_productid, $ocmx_version;
	$themes = wp_get_themes();
	$current_theme = wp_get_theme();
	$theme_version = $current_theme->Version;
	$i = 2;
	$theme_updates = 0;

 ?>
<div class="rss-widget">
	<div class="table table_content">
        <h3> Updating Your Theme </h3>
        <p>Your Installed Version: <?php echo $theme_version; ?></p>
        <p>
            <ol>
                <li>Login to your <em><a href="http://oboxthemes.com/dashboard/themes" target="_blank">Obox Dashboard</a></em></li>
                <li>Click Download Theme on your theme package and save the zip file to your desktop.</li>
                <li>Go to Appearance > Themes and activate the default theme.</li>
                <li>Click this theme's thumbnail and Delete.</li>
                <li>Cick Add New and upload your new zip file to install and activate.</li>
            </ol>
        </p>
        <p>If you had previously modified theme files that are overwritten by an update, you must move the changes into the new file. Do not overwrite or restore updated theme files with older versions, or the theme may break!</p>
        <p> <em> View the <a href="http://kb.oboxthemes.com/articles/how-to-update-your-theme/" target="_blank">Theme Update Guide</a> for detailed steps with screenshots.</em></p>
	</div>
</div>
<?php }
add_action("ocmx_theme_update", "ocmx_theme_update"); ?>