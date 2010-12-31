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
 * Description: Prevents editors from publishing content with unfiltered HTML. By default, editors and administrators are given this ability. See <a href="http://codex.wordpress.org/FAQ_Security#Why_are_some_users_allowed_to_post_unfiltered_HTML.3F">this page on the Codex</a> for reasons. This plugin does not work on multisite, as unfiltered HTML is by default only given to super administrators in that case.
 * Author: Andrew Nacin
 * Author URI: http://andrewnacin.com/
 * Version: 1.0
 * License: GPL
 */

/*
 * If we're running multisite, we don't want to do anything. By default, only
 * super admins will have unfiltered HTML, which is what this code does anyway.
 * The reason why we don't want to pile on top of that, is that it'll break
 * the Unfiltered MU plugin if it's in use. So it's safer to noop.
 */
if ( is_multisite() )
	return;

/**
 * Denies unfiltered HTML for Editors.
 *
 * Works by using the is_super_admin() function. On single site, this returns
 * true for users with the delete_users cap, which only administrators have.
 *
 * This function is attached to the map_meta_cap filter.
 *
 * @param $caps An array of mapped capabilities.
 * @param $cap The requested capability passed to map_meta_cap.
 * @return array The new array of mapped capabilities.
 */
function nacin_filtered_html_for_editors( $caps, $cap, $user_id ) {
	if ( 'unfiltered_html' == $cap && ! is_super_admin( $user_id ) )
		$caps[] = 'do_not_allow';
	return $caps;
}
add_filter( 'map_meta_cap', 'nacin_filtered_html_for_editors', 10, 3 );