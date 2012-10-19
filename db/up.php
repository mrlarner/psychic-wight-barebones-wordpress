<?php
	include 'setup.php';
	
	echo "\n\n\n=== Beta Db Up! ============\n\n";
	
	echo "\n* Importing tables\n";
	
	echo `mysql -u {$user} -h {$host} --password='{$pass}' {$name} < {$config['export_dir']}/output.sql`;
	
	echo "\n\n=== DONE! ====================\n\n\n";
	
	exit;