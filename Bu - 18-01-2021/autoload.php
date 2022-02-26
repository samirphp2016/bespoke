<?php require 'vital-config.php';
/**
 * Load classes dynamically
 */

spl_autoload_register(function($class_name) {
    
    $cls = strtolower($class_name) . '.php';
	$found = false;
	$classes = array(
		config::full_dir_path().'/vital-models/' . $cls,
		config::full_dir_path().'/vital-libraries/' . $cls,
	);

	/*
	echo "<pre>";
	print_r($classes);
	print_r($_SERVER);
	die;
	*/
	foreach ($classes as $class){
		if (file_exists($class)){
			$found = true;
			require $class;
			break;
		}else{
			$class . ' does not exist<br />';
		}
	}
	if ( !$found ){
		if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
			echo 'class: ' . $class_name . ' not found';
			exit;
		} else {
			// write mail code
			if($class_name != 'CURLFile') {
				echo 'class: ' . $class_name . ' not found';
			}
		}
	}    
});