<?php
/**
 * Filtered HTML for Editors
 *
 * @package Filtered_HTML_Editors
 * @author Andrew Nacin <nacin@wordpress.org>
 */

/*
 * Plugin Name: Filtered HTML for Editors
 * Plugin URI: http://wordpress.org/extend/plugins/filtered-html-for-editors/
 * Description: Prevents editors from publishing content with unfiltered HTML. By default, editors and administrators are given this ability. See <a href="http://codex.wordpress.org/FAQ_Security#Why_are_some_users_allowed_to_post_unfiltered_HTML.3F">this page on the Codex</a> for reasons why. This plugin has no effect on multisite as unfiltered HTML is only given to super administrators.
 * Author: Andrew Nacin
 * Author URI: http://andrewnacin.com/
 * Version: 1.0
 * License: GPL
 */

/**
 * Denies unfiltered HTML for Editors.
 *
 * Works by also requiring the user to possess the delete_users capability whenever
 * the unfiltered_html capability is requested. Only administrators have the
 * delete_users capability, and it is how we establish whether you are a 'super admin'
 * when not running multisite.
 *
 * This function is attached to the map_meta_cap filter.
 *
 * @param $caps An array of mapped capabilities.
 * @param $cap The requested capability passed to map_meta_cap.
 * @return array The new array of mapped capabilities.
 */
function nacin_filtered_html_for_editors( $caps, $cap ) {
	if ( 'unfiltered_html' == $cap )
		$caps[] = 'delete_users';
	return $caps;
}
add_filter( 'map_meta_cap', 'nacin_filtered_html_for_editors', 10, 2 );