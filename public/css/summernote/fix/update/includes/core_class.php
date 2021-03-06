<?php

class Core {

	// Function to validate the post data
	function validate_post($data)
	{
		/* Validating the hostname, the database name and the username. The password is optional. */
		return !empty($data['hostname']) && !empty($data['username']) && !empty($data['database']);
	}

	// Function to show an error
	function show_message($type,$message) {
		return $message;
	}

	// Function to write the config file
	function write_config($data) {

		// Config path
		$template_path 	= 'config/database.php';
		$output_path 	= '../application/config/database.php';

		// Open the file
		$database_file = file_get_contents($template_path);

		$new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
		$new  = str_replace("%USERNAME%",$data['username'],$new);
		$new  = str_replace("%PASSWORD%",$data['password'],$new);
		$new  = str_replace("%DATABASE%",$data['database'],$new);

		// Write the new database.php file
		$handle = fopen($output_path,'w+');

		// Chmod the file, in case the user forgot
		chmod($output_path,0777);
		
		if(is_writable($output_path) && fwrite($handle,$new)) {}
		else return false;

		// Verify file permissions

		// Config path
		$template_path 	= 'config/config.php';
		$output_path 	= '../application/config/config.php';

		// Open the file
		$database_file = file_get_contents($template_path);

		$new  = str_replace("%siteurl%",$data['siteurl'],$database_file);

		// Write the new database.php file
		$handle = fopen($output_path,'w+');

		// Chmod the file, in case the user forgot
		chmod($output_path,0777);
		
		if(is_writable($output_path) && fwrite($handle,$new)) { return 1;}
		else return false;
	}
}