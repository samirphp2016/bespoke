<?php
    class cache {
        private $cache_file;

        private function serve($file){
            if(count($_POST) == 0 ) {
            	readfile('compress.zlib://' . $file);
            	exit();
            }
        }

		private function get_latest_update_time() {
			$time = filemtime(config::full_dir_path().'/content_modified.txt');
			
			$arrTemplate = array(
				config::full_dir_path(V_THEME_DIR.'index.php'),
				config::full_dir_path(V_THEME_DIR.'locations.php'),
				config::full_dir_path(V_THEME_DIR.'block-drains.php'),
				config::full_dir_path(V_THEME_DIR.'pipe-relining.php'),
				config::full_dir_path(V_THEME_DIR.'blog_detail.php'),
				config::full_dir_path(V_THEME_DIR.'blog.php'),
				config::full_dir_path(V_THEME_DIR.'contact-us.php'),
				config::full_dir_path(V_THEME_DIR.'pipe-relining-solutions.php'),
				config::full_dir_path(V_THEME_DIR.'inc/meta.php'),
				config::full_dir_path(V_THEME_DIR.'inc/relining-nearme.php'),
				config::full_dir_path(V_THEME_DIR.'inc/js.php'),
				config::full_dir_path(V_THEME_DIR.'inc/why_is_my_drain_blocked.php'),
				config::full_dir_path(V_THEME_DIR.'inc/difference_between.php'),
				config::full_dir_path(V_THEME_DIR.'inc/industries_we_cover.php'),
				config::full_dir_path(V_THEME_DIR.'inc/familiar-faces.php'),
				config::full_dir_path(V_THEME_DIR.'inc/services.php'),
				config::full_dir_path(V_THEME_DIR.'inc/reasons_to_choose.php'),
				config::full_dir_path(V_THEME_DIR.'inc/jobs.php'),
				config::full_dir_path(V_THEME_DIR.'inc/reason_pipe_relining_dig_us.php'),
				config::full_dir_path(V_THEME_DIR.'inc/sydney_relining_services.php'),
				config::full_dir_path(V_THEME_DIR.'inc/testimonials.php'),
				config::full_dir_path(V_THEME_DIR.'inc/footer.php'),
				config::full_dir_path(V_THEME_DIR.'inc/header.php'),
				config::full_dir_path(V_THEME_DIR.'inc/faq.php'),
			);
			foreach($arrTemplate as $file) {
				if(is_file($file)) {
					$file_time = filemtime($file);
					if($time <= $file_time) {
						$time = $file_time;
					}
				}
			}
			return $time;
		}
        // Checks if the cache exists and returns it.
         public function check($data){
            $a = ($data === '' ? 'home' : $data);
            $b = str_replace('/', '-', $a);
            $this->cache_file = config::full_dir_path().'/vital-cache' . '/' . $b . '.cache';
            
			if (is_file($this->cache_file)){
				/*$content_modified = filemtime(config::full_dir_path().'content_modified.txt');*/
			    // Check if the last_modified data in the page JSON is newer then the cache file.
				if (filemtime($this->cache_file) >= $this->get_latest_update_time()){
                    return $this->serve($this->cache_file);
                }			
            }
        }

        public function create($html){
            // Create gzip file of cache.
           /* file_put_contents('compress.zlib://' . $this->cache_file, $html); */
        }
    }