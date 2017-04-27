# Shortcake Bakery #
**Contributors:** [fusionengineering](https://profiles.wordpress.org/fusionengineering), [davisshaver](https://profiles.wordpress.org/davisshaver), [danielbachhuber](https://profiles.wordpress.org/danielbachhuber)  
**Tags:** shortcodes, Facebook, Infogram, Playbuzz, Rap Genius, Scribd  
**Requires at least:** 4.2  
**Tested up to:** 4.7.4  
**Stable tag:** 0.2.0  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  

A fine selection of Shortcake-powered shortcodes.

## Description ##

Shortcake Bakery adds a fine selection of shortcodes to your WordPress site. Use with [Shortcake](https://wordpress.org/plugins/shortcode-ui/) for the optimal experience.

The following shortcodes are now available for your use within the content field:

- ABC_News `[abc-news]`
- Facebook `[facebook]`
- Flickr `[flickr]`
- Giphy `[giphy]`
- GoogleDocs `[googledocs]` (Includes several common formats: Documents, Spreadsheets, Presentations, Forms, Maps, and Fusion Tables.)
- Guardian `[guardian]`
- Infogram `[infogram]`
- Instagram `[instagram]`
- Livestream `[livestream]`
- Playbuzz `[playbuzz]`
- Rap_Genius `[rap-genius]`
- Scribd `[scribd]`
- Silk `[silk]`
- SoundCloud `[soundcloud]`
- Twitter `[twitter]`
- Videoo `[videoo]`
- Vimeo `[vimeo]`
- Vine `[vine]`
- YouTube `[youtube]`
- Image Comparison `[image-comparison]` (Uses the juxtapose.js script from Knight Labs.)
- PDF Viewer `[pdf]` (PDF documents can be uploaded attachments or remotely hosted documents. A code-based proxy pass can be made available for external documents with a filter.)
- iFrame `[iframe]` (Requires code-level configuration of accepted domains.)
- Script `[script]` (Requires code-level configuration of accepted domains.)

Shortcake Bakery also enables an "Add Embed Code" experience for Shortcake shortcodes. Clicking the "Add Embed Code" media button will display a form in the media modal where a user can paste an embed code as received from a provider (by copying the embed code from a YouTube video, for one example). If that embed code matches a shortcode registered with the Shortcake Bakery shortcode API, the matched shortcode will be sent to the editor.

See the [Installation](#Installation) section for code-level configuration details. Get involved with the project and [submit your own shortcodes](https://github.com/fusioneng/shortcake-bakery) on Github.

## Installation ##

It's a plugin! Install it like any other.

Most of the shortcodes work out of the box, but you'll need to whitelist any domains you want to be eligible for script and iFrame tag use.


	add_filter( 'shortcake_bakery_whitelisted_script_domains', function(){
		return array(
			'ajax.googleapis.com',
		);
	});



	add_filter( 'shortcake_bakery_whitelisted_iframe_domains', function(){
		return array(
			'buzzfeed.com',
		);
	});


If you don't want to enable all of the shortcodes which are bundled with this plugin, you can filter them by returning a smaller array from the filter 'shortcake_bakery_shortcode_classes':


	add_filter( 'shortcake_bakery_shortcode_classes', function() {
		return array(
			'Shortcake_Bakery\Shortcodes\Facebook',
			'Shortcake_Bakery\Shortcodes\Twitter',
			'Shortcake_Bakery\Shortcodes\YouTube',
		);
	});


## Screenshots ##

### 1. Shortcodes are accessible through the Insert Element screen, exposed in the media library. ###
![Shortcodes are accessible through the Insert Element screen, exposed in the media library.](https://s.w.org/plugins/shortcake-bakery/screenshot-1.png)

### 2. Shortcodes preview in the visual editor, with a quick edit button to provide easy access to attribute fields. ###
![Shortcodes preview in the visual editor, with a quick edit button to provide easy access to attribute fields.](https://s.w.org/plugins/shortcake-bakery/screenshot-2.png)

### 3. The image comparison shortcode is powered by JuxtaposeJS, a tool built by the Northwestern University Knight Lab. ###
![The image comparison shortcode is powered by JuxtaposeJS, a tool built by the Northwestern University Knight Lab.](https://s.w.org/plugins/shortcake-bakery/screenshot-3.png)

### 4. We've added an Infogram shortcode that accepts public Infogram URL's. ###
![We've added an Infogram shortcode that accepts public Infogram URL's.](https://s.w.org/plugins/shortcake-bakery/screenshot-4.png)

### 5. Scribd shortcodes let you embed documents easily in your WordPress content. ###
![Scribd shortcodes let you embed documents easily in your WordPress content.](https://s.w.org/plugins/shortcake-bakery/screenshot-5.png)

### 6. The script shortcode lets you embed whitelisted sources. ###
![The script shortcode lets you embed whitelisted sources.](https://s.w.org/plugins/shortcake-bakery/screenshot-6.png)

### 7. Same with the iFrame shortcode. ###
![Same with the iFrame shortcode.](https://s.w.org/plugins/shortcake-bakery/screenshot-7.png)

### 8. The RapGenius shortcode doesn't do anything in the admin – but on the frontend, it adds annotations to your post. ###
![The RapGenius shortcode doesn't do anything in the admin – but on the frontend, it adds annotations to your post.](https://s.w.org/plugins/shortcake-bakery/screenshot-8.png)

### 9. The PDF shortcode wraps your document in a nifty viewer tool. ###
![The PDF shortcode wraps your document in a nifty viewer tool.](https://s.w.org/plugins/shortcake-bakery/screenshot-9.png)

### 10. Most Facebook URL's can be embedded with ease. ###
![Most Facebook URL's can be embedded with ease.](https://s.w.org/plugins/shortcake-bakery/screenshot-10.png)

### 11. Playbuzz quizs can be embedded, with a few options supported. ###
![Playbuzz quizs can be embedded, with a few options supported.](https://s.w.org/plugins/shortcake-bakery/screenshot-11.png)


## Changelog ##

### 0.2.0 (April 17, 2017) ###

This release includes 14 new shortcodes, and some major new features for users.

* Add "Add embed" media button; allow users to enter an arbitrary code from a provider, and convert it to a shortcode if that shortcode is available (as defined by the shortcode's "reversal" method). Developers: note that this only works with shortcodes that extend \Shortcode_Bakery\Shortcode and implement the reversal()" method. You may also disable this button using the `shortcake_bakery_show_add_embed` filter.
* Updated the format of Instagram embeds.
* Added several new URL patterns for Facebook embeds. Groups, Pages, and videos are now supported in addition to Posts.
* New shortcode: `[soundcloud]` Shortcode for Soundcloud embeds.
* New shortcode: `[pdf]` Embed local or external PDF documents using pdf.js.
* New shortcode: `[silk]` Shortcode for Silk embeds
* New shortcode: `[flickr]` Shortcode for Flickr embeds.
* New shortcode: `[instagram]` Shortcode for Instagram embeds.
* New shortcode: `[livestream]` Shortcode for Livestream embeds.
* New shortcode: `[abc-news]` Shortcode for ABC News embeds.
* New shortcode: `[guardian]` Shortcode for embeds from The Guardian.
* New shortcode: `[giphy]` Shortcode for Giphy embeds.
* New shortcode: `[vine]` Shortcode for Vine embeds.
* New shortcode: `[vimeo]` Shortcode for Vimeo embeds.
* New shortcode: `[videoo]` Shortcode for Videoo embeds.
* New shortcode: `[google-docs]` Shortcode for Google Docs embeds.
* Improved UI for selecting post elements; consistant icons for all embeds.
* Bug fix: Allow Giphy embeds with hyp0hens in URLs.
* Added Japanese translation
* Allow the source of iframe and script embeds to be filtered, for SSL compatability.

### 0.1.0 (July 17, 2015) ###

* Initial release.
* [Full release notes](http://fusion.net/story/167993/introducing-shortcake-bakery-a-selection-of-fine-shortcodes/)
