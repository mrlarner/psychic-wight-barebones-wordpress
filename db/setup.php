<?php
	
	global $table_prefix;
	parse_str( $argv[1], $config);
	$config['dir'] = dirname(dirname(__FILE__)) . '/html/config/';
	$config['export_dir'] = dirname(__FILE__);
	
	@include dirname(dirname(__FILE__)) . '/html/config/init.php';
	@include $config['dir'] . "{$config['config']}.php";
	
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