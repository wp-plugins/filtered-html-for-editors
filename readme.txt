=== Filtered HTML for Editors ===
Contributors: nacin
Donate link: http://andrewnacin.com/donate/
Tags: unfiltered html, security
Requires at least: 2.8
Tested up to: 3.1
Stable tag: trunk

Editors and Administrators can publish content with unfiltered HTML. Use this plugin to force filtering of HTML from Editors.

== Description ==

By default, users with Administrator or Editor privileges are allowed to publish unfiltered HTML in post titles and content. WordPress is, after all, a publishing tool, and people need to be able to include whatever markup they need to communicate. Users with lesser privileges are not allowed to post unfiltered content.

Unfiltered HTML is potentially dangerous. It allows users to include JavaScript, object embeds, and other code that has the potential to be malicious. The capability should only be given to trusted users. By default, WordPress provides the unfiltered HTML ability to Editors and Administrators.

Use this plugin to prevent Editors from publishing unfiltered HTML posts. Administrators will not be affected.

For more information, check out the [FAQ](http://wordpress.org/extend/plugins/filtered-html-for-editors/faq/).

== Installation ==

For an automatic installation through WordPress:

1. Go to the 'Add New' plugins screen in your WordPress admin area
1. Search for 'Unfiltered HTML for Editors'
1. Click 'Install Now' and activate the plugin

Or use a nifty tool by WordPress lead developer Mark Jaquith:

1. Visit [this link](http://coveredwebservices.com/wp-plugin-install/?plugin=filtered-html-for-editors) and follow the instructions.

For a manual installation via FTP:

1. Upload `unfiltered-html-for-editors/unfiltered-html-for-editors.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' screen in your WordPress admin area

To upload the plugin through WordPress, instead of FTP:

1. Upload the downloaded zip file on the 'Add New' plugins screen (see the 'Upload' tab) in your WordPress admin area and activate.

== Frequently Asked Questions ==

= What problem does this plugin solve? =

Unfiltered HTML is potentially dangerous. It allows users to include JavaScript, object embeds, and other code that has the potential to be malicious. The capability should only be given to trusted users. By default, WordPress provides the unfiltered HTML ability to Editors and Administrators.

Use this plugin to prevent Editors from publishing unfiltered HTML posts. Administrators will not be affected.

= Why are some users allowed to post unfiltered HTML? =

By default, users with Administrator or Editor privileges are allowed to publish unfiltered HTML in post titles and content. WordPress is, after all, a publishing tool, and people need to be able to include whatever markup they need to communicate. Users with lesser privileges are not allowed to post unfiltered content.

= What about Multisite? =

This plugin won't help you. If you're running a WordPress network, then only super administrators can publish unfiltered HTML. All other users are considered untrusted, since they can be administrators on sites they register.

There exists another plugin called [Unfiltered MU](http://wordpress.org/extend/plugins/unfiltered-mu/) that will provide the unfiltered HTML ability to editors and administrators in multisite. This can only be used in a closed network where these users are trusted.

= How do I deny unfiltered HTML to everyone? =

You can add `define( 'DISALLOW_UNFILTERED_HTML', true );` to your `wp-config.php` file. This will affect administrators as well. If you are running multisite, this will affect super administrators. If you do this, then this plugin will not have any affect.

= Why do my video embeds break? =

This is a perfect illustration of the careful balance required between security and functionality. WordPress is, after all, a publishing tool, as said above.

Video embeds, such as those with `<embed>` or `<object>` tags, are considered untrusted. Thus, on save they will be stripped out, unless the user has the ability to publish unfiltered HTML.

If you're embedding a video from YouTube (let's say), then you shouldn't mess with the embed code anyway. For YouTube and other sites, take a look at [automatic embedding of content through oEmbed](http://codex.wordpress.org/Embeds), which was added to WordPress in version 2.9. We have a handful of oEmbed providers supported in core (again, a balance between security and functionality).

== Changelog ==

= 1.0 =
* First release. Being such a simple plugin, there isn't going to be another release.