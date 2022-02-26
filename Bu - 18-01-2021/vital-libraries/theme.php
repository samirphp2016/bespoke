<?php
    /*
        Vital Technolabs
        Version: 1.0
        Updated: 09/04/2021

        File Name: theme.php
        Description:
        This file compiles the theme, pulls in the data and formats it correctly.

        Help: https://www.vitaltechnolabs.com/
    */

    class theme {
        public $short_data = array();
        public $nest_data = array();
        public $page;

        function __construct() {
            $this->page = '';
        }

        public function checkPage($data){
            global $errors;

            $a = ($data === '' ? 'home' : $data);
            $b = str_replace('/', '-', $a);
            $c = RH_DATA_DIR . '/rh_' . (RH_ENCRYPTED ? encrypt($b) : $b) . '.json';
            return (is_file($c) ? $c : $errors->handle(95815311, $c));
        }

        // Pulls the theme file in assosiated to the page.
        private function getTemplate($data){
            global $db;
            global $config;
            global $errors;

            $a = RH_THEME_DIR . '/' . $config->theme . '/' . $data . '.php';
            $b = (is_file($a) ? $a : $errors->handle(51040335, $a));

            return $b;
        }

        private function getBlock($data){
            global $db;
            global $config;
            global $errors;
            global $page;
            global $short_data;

            $a = RH_THEME_DIR . '/' . $config->theme . '/blocks/' . $data . '.php';
		    $b = (is_file($a) ? $a : $errors->handle(86623538, $a));

            ob_start();
            ob_implicit_flush(false);
            require $a;
            return ob_get_clean();
		}

    	public function polish($data){
    	    global $db;
    	    global $config;
    	    global $short_data;
    	    global $filter_array;
    	    $content = '';

            // Minify
            require 'minify.class.php';
            $minify = new minify();

            // Require filters
            require 'filters.class.php';

    	    // Include shortcodes.class.php for use later.
    	    require 'shortcodes.class.php';

    	    // Pull the template file.
            $template = $this->getTemplate($data->template);
            
            // If minify CSS is turned on, minify.
            if ($config->minify->css){
                $minify->css();
            }

            // For each section in the json file.
            if (!isset($data->structure)){
                $data->structure = json_decode(file_get_contents($template));
            }

            foreach ($data->structure as $section => $sections){
                if (isset($sections->data)){
                    $this->nest_data = $sections->data;

                    $content .= $shortcode->process($this->getBlock($sections->section), $this->nest_data) . PHP_EOL;
                } else {
                    $content .= $shortcode->process($this->getBlock($sections->section)) . PHP_EOL;
                }
            }

            $output = $shortcode->process($content, $data, 'global');

            // If html minify is turned on.
            return $minify->html($output);
    	}
    }

    $theme = new theme();