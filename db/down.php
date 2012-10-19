<?php
	include 'setup.php';
	
	echo "\n\n\n=== Beta Db DUMP! ============\n\n";
	
	echo "\n* Getting table names\n\n";
	
	$tables = str_replace("\n", " ", `mysql -u {$user} --password='{$pass}' -N information_schema -e "select table_name from tables where table_name like '$prefix%'"`);
	
	echo "\n* Dumping tables\n";
	
	echo `mysqldump -u {$user} -h {$host} --password={$pass} {$name} {$tables} > {$config['export_dir']}/output.sql`;
	
	echo "\n\n=== DONE! ====================\n\n\n";
	exit;