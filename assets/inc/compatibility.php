<?php

// contains is_plugin_active() which is used below
if (!function_exists('is_plugin_active')) { load_template(ABSPATH . 'wp-admin/includes/plugin.php'); }

/***************************************************************
* Plugin - Advanced Custom Fields (http://www.advancedcustomfields.com/)
* Determine if to load the lite version of ACF
***************************************************************/

if ( of_get_option('disable_acf', '0') ) {

	define('ACF_LITE', true);

}

/***************************************************************
* Plugin - MinQueue
* Tell MinQueue to use a different cache store and prefix
***************************************************************/

if (is_plugin_active('minqueue/plugin.php')) {

	add_filter('minqueue_prefix', 'null_minqueue_prefix');

	function null_minqueue_prefix($prefix) {
		return 'null';
	}
}

/***************************************************************
* Plugin - Google Analyticator
* Remove framework options for Google Analytics tracking
***************************************************************/

if (is_plugin_active('google-analyticator/google-analyticator.php')) {

	add_filter('null_options', 'null_google_analyticator_remove_options');

	function null_google_analyticator_remove_options($options) {
		unset($options['gat']);
		unset($options['gat_external_download']);
		return $options;
	}
}

/***************************************************************
* Plugin - Google Analytics for WordPress
* Remove framework options for Google Analytics tracking
***************************************************************/

if (is_plugin_active('google-analytics-for-wordpress/googleanalytics.php')) {

	add_filter('null_options', 'null_google_analytics_remove_options');

	function null_google_analytics_remove_options($options) {
		unset($options['gat']);
		unset($options['gat_external_download']);
		return $options;
	}
}

// wordpress seo
// infinite scroll in jetpack - http://jetpack.me/support/infinite-scroll/ & https://github.com/Automattic/_s/blob/master/inc/jetpack.php
// html compression - options to toggle (need filters)

?>