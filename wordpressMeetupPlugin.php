<?php
/**
 * Plugin Name: Google Analytics Plugin
 * Plugin URI: 
 * Description: add google analytics code to the top of your website
 * Version: 1.1
 * Author: Leta
 * License: A "Slug" license name e.g. GPL2
 *
 * references : http://codex.wordpress.org/Plugin_API/
 *				http://codex.wordpress.org/Plugin_API/Action_Reference
 *				http://codex.wordpress.org/Creating_Options_Pages
 *				http://codex.wordpress.org/Function_Reference/settings_fields
 *				http://codex.wordpress.org/Function_Reference/do_settings_fields
 *
 ***************************************************************
 * 1. add code to header
 ***************************************************************
 * 2. add option to WP settings
 ***************************************************************
 * 3. create user interface to add GA code dynamically 
 ***************************************************************
 *
 **/




 
/***************************************************************
* 1. add code to header
***************************************************************/

//the call back
function add_my_google_analytics_code_to_header() {
	//$ga_code = "UA-46249838-1";
	$ga_code = get_option( 'ga_code_options_text' );
	if ( $ga_code && ( $ga_code != "") ){
		echo "<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '$ga_code', 'auto');
ga('send', 'pageview');

</script>";
		} else return;
}

//the hook
add_action( 'wp_head', 'add_my_google_analytics_code_to_header' );





/***************************************************************
* 2. add option to WP settings
***************************************************************/

//the functions
function add_my_google_analytics_code_settings(){
	add_options_page( 'GA Custom Code Options', 'Custom GA', 'manage_options', 'ga-plugin-options', 'ga_plugin_options_page' );
}

function register_ga_code_dynamic_settings() {
	register_setting( 'ga_code_dynamic_option_group', 'ga_code_options_text' );
}

//the hooks
add_action( 'admin_menu', 'add_my_google_analytics_code_settings' );
add_action( 'admin_init', 'register_ga_code_dynamic_settings' );





/***************************************************************
* 3. create user interface to add GA code dynamically 
***************************************************************/

//the funciton - called from 2 add_options_page
function ga_plugin_options_page() {
	?><div class="wrap">
		<?php screen_icon(); ?>
		<h2>GA Code Options</h2>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'ga_code_dynamic_option_group' );
			?>
			<p>Enter your GA code (found in your GA dashboard ADMIN > PROPERT > .js TRACKING CODE)</p>
			<input type="text" name="ga_code_options_text" value="<?php echo get_option( 'ga_code_options_text' ); ?>" >
			<?php submit_button(); ?>
		</form>
	  </div>
	<?php
}
?>
