<?php
	
	global $table_prefix;
	parse_str( $argv[1], $config);
	
	$config['dir'] = dirname(__DIR__) . '/html/config/';
	$config['export_dir'] = __DIR__;
	
	@include $config['dir'] . "{$config['config']}.php";
	include dirname(__DIR__) . "/html/wp-config.php";
	
	if( ! defined('DB_USER') )
	{
		echo "No config found!\n";
		exit;
	}
	
	$user = DB_USER;
	$host = DB_HOST;
	$pass = DB_PASSWORD;
	$name = DB_NAME;
	$prefix = $table_prefix;