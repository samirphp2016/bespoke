<?php

    class minify {
        private function clean_escapes($str){
        	$str = " " . $str;
        	$parts = preg_split("/(< \s* dwcescape .* \/ \s* dwcescape \s* >)/Umsxu", $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        	$parts = str_replace(['<dwcescape>', '</dwcescape>'], '', $parts);
        	foreach ($parts as $idx => $part) {
        		if ($idx % 2) {
        			$parts[$idx] = base64_decode($part);
        		}
        	}
        	$str = implode('', $parts);
        	return substr($str, 1);
        }

        private function protect_escapes($str){
        	$str = " " . $str;
        	$parts = preg_split("/(< \s* dwcescape .* \/ \s* dwcescape \s* >)/Umsxu", $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        	$parts = str_replace(['<dwcescape>', '</dwcescape>'], '', $parts);
        	foreach ($parts as $idx => $part) {
        		if ($idx % 2) {
        			$parts[$idx] = '<dwcescape>' . base64_encode($part) . '</dwcescape>';
        		}
        	}
        	$str = implode('', $parts);
        	return substr($str, 1);
        }
        
        private function protect_textarea($str){
        	$str = " " . $str;
        	$parts = preg_split("/(< \s* textarea .* \/ \s* textarea \s* >)/Umsxu", $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        	foreach ($parts as $idx => $part) {
        		if ($idx % 2) {
        			$parts[$idx] = str_replace("\n", "1NS3R7N3WL1N3", $part);
        		}
        	}
        	$str = implode('', $parts);
        	return substr($str, 1);
        }

        private function protect_pretag($str){
        	$str = " " . $str;
        	$parts = preg_split("/(< \s* pre .* \/ \s* pre \s* >)/Umsxu", $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        	foreach ($parts as $idx => $part) {
        		if ($idx % 2) {
        			$parts[$idx] = str_replace("\n", "1NS3R7N3WL1N3", $part);
        		}
        	}
        	$str = implode('', $parts);
        	return substr($str, 1);
        }
        
        public function css($destination_file, $arrSourceFiles = array()){
            
			if(is_array($arrSourceFiles) && count($arrSourceFiles) && !empty($destination_file)) {
				// setup the URL and read the CSS from a file
				$url = 'https://cssminifier.com/raw';
				$css = '';
				foreach( $arrSourceFiles as $css_file ) {
					if(is_file($css_file))
					$css.= file_get_contents($css_file);
				}
				

				// init the request, set various options, and send it
				$ch = curl_init();

				curl_setopt_array($ch, [
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
					CURLOPT_POSTFIELDS => http_build_query([ "input" => $css ])
				]);

				$minified = curl_exec($ch);

				// finally, close the request
				curl_close($ch);
				/*
				// output the $minified css
				echo $minified;
				*/
				
				file_put_contents($destination_file, $minified);
			}
        }
		
		public function js($destination_file, $arrSourceFiles = array()){
            if(is_array($arrSourceFiles) && count($arrSourceFiles) && !empty($destination_file)) {
				// setup the URL and read the CSS from a file
				$url = 'https://javascript-minifier.com/raw';
				$js = '';
				foreach( $arrSourceFiles as $js_file ) {
					if(is_file($js_file))
					$js.= file_get_contents($js_file);
				}
				

				// init the request, set various options, and send it
				$ch = curl_init();

				curl_setopt_array($ch, [
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
					CURLOPT_POSTFIELDS => http_build_query([ "input" => $js ])
				]);

				$minified = curl_exec($ch);

				// finally, close the request
				curl_close($ch);
				/*
				// output the $minified css
				echo $minified;
				*/
				
				file_put_contents($destination_file, $minified);
			}
        }
        
        public function html($data){
            if (1){
            	$data = $this->protect_pretag($data);
            	$data = $this->protect_textarea($data);
            	$data = $this->protect_escapes($data);

            	// CDATA
            	$data = preg_replace('/^(?:\s*\/\*\s*<!\[CDATA\[\s*\*\/|\s*\/\/\s*<!\[CDATA\[.*)/', ' ', $data);
            	$data = preg_replace('/(?:\/\*\s*\]\]>\s*\*\/|\/\/\s*\]\]>)\s*$/', ' ', $data);
            	$data = preg_replace('/\/\/]](>|&gt;)/', '', $data);
            	$data = preg_replace('/\/\*<!\[CDATA\[\*\//', ' ', $data);
            	$data = preg_replace('/\/\*]]>\*\//', ' ', $data);
            	//CDATA
/*
            	$data = preg_replace_callback('/<\s*script(?![^>]*\.js)[^>]*>(.*?)<\/script>/s', 'dwcMinifyJS', $data); */

            	$data = preg_replace('/>[^\S]+</', '> <', $data);
            	$data = str_replace(["\n", "\t"], ' ', $data);
            	$data = preg_replace('/\s{3,}/', ' ', $data);
            	$data = str_replace('1NS3R7N3WL1N3', "\n", $data);
            	$data = str_replace('"src=', '" src=', $data);
            	$data = str_replace('\'src=', '\' src=', $data);
            	$data = str_replace('"type=', '" type=', $data);
            	$data = str_replace('\'type=', '\' type=', $data);
            	$data = str_replace('" />', '"/>', $data);

            	// Brodey
            	$data = str_replace('> <', '><', $data);
            	$data = preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'', $data));
            	$pattern = '/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\')\/\/.*))/';
                $data = preg_replace($pattern, '', $data);


            	$data = $this->clean_escapes($data);
            }

            return $data;
        }
    }