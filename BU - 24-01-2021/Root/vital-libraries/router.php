<?php

class router {
	
	/* array key mean url first segment and value array means first key is file name and other all key is a $_GET array key */
	public static $allPath = array(
		''                             => array('index'),		
		'foundation'                             => array('foundations'),		
	);

	public static function init() {
		
		 // Parse URL and Path data
		$url = parse_url((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		$url = (object) $url;
		$url->path = ltrim($url->path, '/');
		
		$url->path = implode( '/', config::get_paths());
		
		
		// Handle feed.rss, sitemap.xml, robots.txt and known file exceptions.
		$known_files = array ('feed.rss', 'sitemap','site-map','sitemap.xml', 'robots.txt', 'ajax.js');
		if (in_array($url->path, $known_files)){
			require 'themes/bespoke/' . $url->path . '.php';
			exit();
		}
		
		
		// Set Headers
		header('X-XSS-Protection: 1; mode=block'); // Set Security Headers
		header('X-Frame-Options: SAMEORIGIN'); // Sets X-Frame-Options
		header('X-Frame-Options: DENY'); // Sets X-Frame-Options
		header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload'); // HSTS Enabled
		header('Content-language: en-au'); // Sets Language
		header('Cache-Control: must-revalidate');
		header('Pragma: public'); 
		date_default_timezone_set('Australia/Melbourne'); // Sets Timezone
		

		$cache = new cache();
		/*$cache->check($url->path);*/
		
		
		/*echo $render = 'Hello World1111!!!! - ' . date('d/m/Y H:i:s') ;*/
		if(!isset($arrHeader)) {
			/*$arrHeader = header_settings::get_data();*/
		}
		if(!isset($arrFooter)) {
			/*$arrFooter = footer_settings::get_data();*/
		}
		/*echo "I am getting content from db";*/
		/*
		echo '<pre> - '.time();
		print_r($url);
		echo '</pre>';
		exit;
		*/
		ob_start();
		if(isset($url->path)){
			/* get include file name */
			$fileName = self::_includeFile($url->path);
			require 'themes/bespoke/'.$fileName.'.php';
		}
		$render = ob_get_contents();
		ob_end_clean();
		/*echo $render;*/
		$minify = new minify();
		echo $render = $minify->html($render);
		$cache->create($render);
	}
	
	public static function _includeFile($path = ''){
		/* default file 404 other wise find in all path array */
		$tmpPath = explode('/',$path);
		$fileName = '404';
		$tmpUrl = array();
		foreach($tmpPath as $key => $val){
			if(in_array($val,array_keys(self::$allPath)) && $key == 0){
				$tmpUrl = self::$allPath[$val];
				$fileName = $tmpUrl[$key];
			}else if(!isset($tmpUrl[$key]) && !empty($val)){
				$fileName = '404';
			}else if(!empty($val) && count($tmpUrl) && isset($tmpUrl[$key]) && !empty($tmpUrl[$key])){
				$_GET[$tmpUrl[$key]] = $val;
			}else{
				continue;
			}
		}
		return $fileName;
	}
}