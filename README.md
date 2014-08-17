wordpressMeetupPlugin
=====================
Prezi Link: http://prezi.com/5ejnqe7ye_sb/how-to-write-a-wordpress-plugin/

1. What is a plugin
“Plugins are ways to extend and add to the functionality that already exists in WordPress.
The core of WordPress is designed to be lean and lightweight, to maximize flexibility and minimize code bloat. Plugins then offer custom functions and features so that each user can tailor their site to their specific needs.” - http://codex.wordpress.org/Plugins
- Anyone can make a plugin and upload it to the Wordpress Plugin Directory. Once uploaded, it can be used by anyone on any Wordpress site. Some Plugins are free, others cost money.
http://wordpress.org/plugins/
2. Why use a plugin?
Why not just change your theme’s functions.php file?
- changing the functions.php file is great if you are adding funcitonality to your custom theme. 
- a plugin offers modular functionality that you can use across different sites.
(define modularity - http://www.techopedia.com/definition/24772/modularity)
3. How does a plugin fit into the Wordpress page load?
Plugins (and other wordpress PHP files) use the Wordpress Plugin Application Programming Interface (https://codex.wordpress.org/Plugin_API) to HOOK into the Wordpress core, and then run functions. These functions are defined either in the Wordpress Codex or written by you, the programmer!
A HOOK can be either an ACTION (https://codex.wordpress.org/Plugin_API/Action_Reference) or  a FILTER (https://codex.wordpress.org/Plugin_API/Filter_Reference) 
An ACTION allows you to add or remove an action from the core (http://codex.wordpress.org/Glossary#Action)
A FILTER allows you to replace specific data (such as a variable) in the core (http://codex.wordpress.org/Glossary#Filter)
4. Anatomy of a Plugin
http://codex.wordpress.org/Writing_a_Plugin
	1. Name for plugin
	2. Gather any files that will be used by the plugin (images, CSS, JS)
	3. Create a text file and save it as PLUGIN_NAME.php
		3.A in this file you must have a header that includes:
<?php
/**
 * Plugin Name: Name Of The Plugin
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: A brief description of the Plugin.
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Name Of The Plugin Author
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */
		In the header I also like to include links to references that I use and a content list for the different sections of code

3.B after this, call your files gathered in step 2

		3.C call functions with your HOOKS

		3.D write your functions

5. Description of our plugin

	- hopefully useful
	- will add a GA code to the top of all pages in your site
	- will allow end user to dynamically change the GA code through an options page in the Wordpress Dashboard
	- is only 1 file - the .php file
