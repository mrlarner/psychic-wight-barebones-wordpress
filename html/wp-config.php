<?php
	
	//--------------------------------------------------------------------//
	// fail silently cli
	if( defined('STDIN') )
		return;
	
	define('WP_ENV',				isset($_SERVER['WP_ENV'])
										? $_SERVER['WP_ENV'] : 'default');
	define('WP_CONTENT_URL',		"http://{$_SERVER['SERVER_NAME']}" );
	define('WP_SITEURL',			"http://{$_SERVER['SERVER_NAME']}/wordpress" );
	define('WP_HOME',				"http://{$_SERVER['SERVER_NAME']}" );
	
	// sets wp-content to custom location
	define('WP_CONTENT_DIR',		__DIR__);
	
	// set plugin location based on wp_content_dir/url
	define('WP_PLUGIN_DIR',			WP_CONTENT_DIR.'/plugins');
	define('WP_PLUGIN_URL',			WP_CONTENT_URL.'/plugins');
	
	// this allows wordpress to move about and be nimble
	define('RELOCATE',				TRUE);
	define('WP_POST_REVISIONS', 	2);
	
	if ( !defined('ABSPATH') )
		define('ABSPATH', __DIR__);
	
	$configfile = __DIR__ . "/config/" . WP_ENV . ".php";
	if( file_exists($configfile) )
	{
		require_once($configfile);
	}
	else
	{
		include __DIR__.'/maintenance.php';
		exit;
	}
	require_once(ABSPATH . 'wp-settings.php');