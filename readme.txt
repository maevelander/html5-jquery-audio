=== HTML5 jQuery Audio Player ===
Contributors: EnigmaWeb
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CEJ9HFWJ94BG4
Tags: mp3 player, audio player, music player, ogg player, HTML5 audio player, mp3, podcast, jquery player
Requires at least: 3.1
Tested up to: 4.3.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Finally, a trendy looking audio player plugin. Works on all modern browsers including iPhone/iPad.

== Description ==

This trendy looking music player lets you add a single audio track or a full playlist to your WordPress site using shortcode. You can customise the colours of the player, and also display ratings, album cover art, and buy/download link if needed. This audio player is different from others on offer because it works on all major browsers, both PC and Mac, and on mobile devices including iPhone/iPad. Plus it looks really cool!

= Key Features =

*	Uses mp3 and ogg file formats
*	Attractive and customisable design
*	Works in all major browsers - IE9+, Safari, Opera, Firefox, Chrome
*	Works on mobile devices including iPhone/iPad
*	Sell your music easily by integrating with Easy Digital Downloads - [tutorial here](http://enigmaplugins.com/selling-your-music/)
*	Autoplay on/off option
*	User star ratings
*	Add the player to any post/page using shortcode `[hmp_player]`

= Demo =

[Click here for demo](http://www.bluecatcombo.com.au/wedding-band-perth/)
This demo shows the player with tracklist enabled, ratings on, and autoplay off. Duration and buy/download button is also switched off in this example.

= Pro vs Lite Version =

This is Lite (free) version of the plugin. [Get Pro Version](http://enigmaplugins.com/plugins/html5-jquery-audio-pro/) if you need the following advanced features:

*	Mulitple Playlists � create as many playlists as you like and embed any number of players on different pages of your site
*	Drag n Drop playlist manager so you can reorder tracks
*	Fully Responsive � resizes and adjust layout/design for responsive websites
*	On/off option for ratings, artwork, artist field, auto-repeat, and cover art
*	Widget support
*	Embed full playlist or individual tracks with shortcodes
*	Works in all modern browsers - IE9+, Safari, Opera, Firefox, Chrome
*	Works on mobile devices including iPhone/iPad
*	Can enable Buy or Download tracks buttons (x3)
*	Integrates with Easy Digital Downloads plugin for selling your music

Please note that Pro version will not work on Windows Server environment.

= Credits =

This is a WordPress version of the player created by Saleem over at [Codebase Hero](http://www.codebasehero.com/2011/06/html-music-player/) with thanks also to [Orman Clark](http://www.premiumpixels.com/freebies/compact-music-player-psd/) for the original PSD.

== Installation ==

1. Upload the `html5-jquery-audio` folder to the `/wp-content/plugins/` directory
1. Activate the HTML5 jQuery Audio Player plugin through the 'Plugins' menu in WordPress
1. Configure the plugin by going to the `HTML5 Audio Player` menu that appears in your admin menu
1. Add the player to any post/page using shortcode `[hmp_player]`



== Frequently Asked Questions ==

= It doesn't work for me, this plugin sucks! =

Actually it does work... and tens of thousands of people use it successfully. If you're having a problem it is highly likely that it is one of the common issues below. Please take the time to read these FAQs and try the steps suggested. If you're still having problems you can get support in the forum. Be nice, and explain your issue properly so I can try to help you. Thank you.

= How can I sell my music using this plugin? =

[Easy Digital Downloads integration tutorial] (http://enigmaplugins.com/selling-your-music/)

[FetchApp integration tutorial](http://www.enigmaweb.com.au/fetchapp-integration-tutorial/)

= jQuery Conflict (It's breaking my site) =

The most common problem is a jQuery conflict. In short, if your theme loads jQuery library, then other plugin/s (like this one) also load jQuery then it can cause serious grief on the site and things start breaking. The solution is for all plugin developers and WordPress theme creators to use the copy of jQuery which is included in the WordPress core or load it from Google AJAX libraries, and to consider also using the noConflict jQuery mode (this plugin does all that). If you're having jQuery conflict problems on your site then the most likely culprit it your theme. [Read this article](http://digwp.com/2009/06/including-jquery-in-wordpress-the-right-way/) by Chris Coyier which explains the issue in more detail and outlines how you can fix it. You might also like to check out suggestions from [Eric Martin](http://www.ericmmartin.com/5-tips-for-using-jquery-with-wordpress/) on the topic.

= I'm having problems adding mp3 files - they won't play. =

The plugin supports mp3 and ogg files. You need to upload both an mp3 and ogg version of each track in the playlist. Please also check your files are encoded correctly, and confirm that your file paths are correct. jPlayer sometimes has problems with relative urls so make sure you're using the absolute paths.

= How can I convert my files to mp3 and ogg? =

There are heaps of free conversion tools available - run a search. Personally, I use [Goldwave.](http://www.goldwave.com/)

= I need ogg? Waaaa! =

Yeah you really do. Having both the ogg and mp3 is what enables this plugin to work on all the different browsers and devices. You can use a converter to make an ogg copy of your files fast and free and you can batch process with most tools so please don't complain about needing ogg. [More information here in the documentation.](http://enigmaplugins.com/mp3-and-ogg/)

= The songs won't play =

Are you in firefox? If the play button flashes then goes back to pause then this is likely a Mime type issue. Particularly affects Firefox. It can be solved by adding the following lines to your htaccess file:
`AddType audio/ogg ogg
AddType audio/ogg oga
AddType video/ogg ogv
AddType video/mp4 m4v`

= It's not working in browser xyz - can you help? =

The plugin works on IE9+, Safari, Opera, Firefox and Chrome, on both PC & Mac, and on mobile devices including iPhone/iPad and Android phones. If it's not working for you, try adding the Mime types above to your htaccess file. If it's still not working, the most common problem is jQuery conflict with your theme or another plugin - see above. Note that it has limited functionality in earlier version of IE where the html5 <audio> tag is not supported. [More information here in the documentation.](http://enigmaplugins.com/mp3-and-ogg/)

= How do I use it in a widget? =
Pro Version has a nice widget function - go to Appearance > Widgets and if the plugin is activated you will see a custom widget which you can drag into your sidebar. Be aware that you can't run two instances of the player on the same page, so if you're using it in the sidebar make sure you don't also add a different player to a page where the sidebar shows.

= What happened to the description field? =
Description field has been deprecated as of version 2.2  This is because it was causing too many support problems (it broke whenever unusual characters/symbols were used) and I could find no viable workaround.

= Is there a way to easliy replace the 'Buy' button with 'Download' button? =

Yes! Set the buy text option to Download, leave currency field & song price field blank, and set the buy link option on each song to the url of the mp3 or the script that initiates the download.

= Can I use this on a non-WordPress site? =

Yep, sure can. This plugin is just a WordPress version of HTML5 Music Player by Saleem over at [Codebase Hero](http://www.codebasehero.com/2011/06/html-music-player/)

= Where can I get support for this plugin? =

If you've tried all the obvious stuff and it's still not working please request support via the forum. Remember to include a link to your site where the player is embedded, and a full description of the issue plus the steps you've already taken to try to solve it.


== Screenshots ==

1. An example of the inserted player
2. The display settings screen in WP-Admin
3. The add songs screen in WP-Admin

== Changelog ==

= 2.6.2 =
* Updated text domain for plugin directory's new translations

= 2.6.1 =
* DB prefix issue fixed

= 2.6 =
* Internationalisation	[New]
* Updating and Deleting song issue fixed [Bug]
* Unknown column 'secure' in 'field list'fixed [Bug]

= 2.5 =
* Bug fix - SQL warning message on Manage Songs
* Miscellaneous UI enhancements

= 2.4 =
* Security patches

= 2.3 =
* Fix for album cover artwork in WordPress 3.6
* Removed drop shadow on text

= 2.2 =
* Major code clean up
* Fixed conflict with NextGen Gallery
* Fixed conflict with Easy Slider Lite
* Fixed conflict with JetPack
* Fixed limit track issue
* Fixed track order bug
* Playlist description field removed 

= 2.1 =
* Added upload button for add/manage songs screen 

= 2.0 =
* Added auto-play on/off option in display settings
* Integrated a more advanced user rating system - rating is now based on accumulated average user rating rather than it being something the site owner sets in backend

= 1.9.1 =
* Minor fix in index.php to prevent jQuery conflict

= 1.9 =
* More fixes for WordPress Core 3.5. Fixed issue with 'add media' button disappearing. Fixed problem where player was preventing some widgets opening.

= 1.8 =
* Implemented fixes so the plugin is now compatible with WordPress Core 3.5

= 1.7 =
* Fixed URL truncating plus some other small enhancements

= 1.6 =
* Fixed several small issues. You can now use apostrophe in description field without it breaking the player, and removed character limits on various input fields. Display issue for long playlists also corrected.

= 1.5 =
* Made a bunch of small improvements and fixes for minor issues. Also adjusted the settings menu structure slightly to correlate better with PRO version of the plugin.

= 1.4 =
* Fixed a problem with the shortcode function - some users were having problems placing the player in a page, this update fixes the issue.

= 1.3 =
* Added jQuery noConflict wrapper and fixed a typo - the playlist was not displaying for some users due to a jQuery conflict, this update fixes the problem.

= 1.2 =
* Fixed a filepath bug - some users were unable to update/delete tracks from playlist, this is now fixed.

= 1.1 =
* Added sidebar with support forum, donate and wordpress.org links

= 1.0 =
* Initial release

== Upgrade Notice ==

= 2.6.2 =
* Updated text domain for plugin directory's new translations

= 2.6.1 =
* DB prefix issue fixed

= 2.6 =
* Internationalisation	[New]
* Updating and Deleting song issue fixed [Bug]
* Unknown column 'secure' in 'field list'fixed [Bug]

= 2.5 =
* Bug fix - SQL warning message on Manage Songs
* Miscellaneous UI enhancements

= 2.4 =
* Security patches - important to update

= 2.3 =
* Fix for album cover artwork in WordPress 3.6
* Removed drop shadow on text

= 2.2 =
* Major code clean up
* Fixed conflict with NextGen Gallery
* Fixed conflict with Easy Slider Lite
* Fixed conflict with JetPack
* Fixed limit track issue
* Fixed track order bug
* Playlist description field removed > Special characters in this field were breaking the plugin and various work-arounds were unsuccessful. It was causing too many support issues so have decided to remove the field entirely. Apologies to anyone who was using it - you'll just have to work around it by putting description text directly into the editor above or below the player.

= 2.1 =
* Added upload button for add/manage songs screen 

= 2.0 =
* Added auto-play on/off option in display settings
* Integrated a more advanced user rating system - rating is now based on accumulated average user rating rather than it being something the site owner sets in backend

= 1.9.1 =
* Minor fix in index.php to prevent jQuery conflict

= 1.9 =
* More fixes for WordPress Core 3.5. Fixed issue with 'add media' button disappearing. Fixed problem where player was preventing some widgets opening.

= 1.8 =
* Implemented fixes so the plugin is now compatible with WordPress Core 3.5

= 1.7 =
* Fixed URL truncating plus some other small enhancements

= 1.6 =
* Fixed several small issues. You can now use apostrophe in description field without it breaking the player, and removed character limits on various input fields. Display issue for long playlists also corrected.

= 1.5 =
* Made a bunch of small improvements and fixes for minor issues. Also adjusted the settings menu structure slightly to correlate better with PRO version of the plugin.

= 1.4 =
* Fixed a problem with the shortcode function - some users were having problems placing the player in a page, this update fixes the issue.

= 1.3 =
* Added jQuery noConflict wrapper and fixed a typo - the playlist was not displaying for some users due to a jQuery conflict, this update fixes the problem.

= 1.2 =
* Fixed a filepath bug - some users were unable to update/delete tracks from playlist, this is now fixed.

= 1.1 =
* Added sidebar with support forum, donate and wordpress.org links

= 1.0 =
* Initial release
