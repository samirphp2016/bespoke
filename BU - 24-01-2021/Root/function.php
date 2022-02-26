<?php 


function _send_mail($tomail,$Subject,$MessagesBody,$mCc,$mBcc,$smtpHost,$smtpUsername,$smtpPassword,$smtpPort){
   	$to_email = $tomail;
    $subject = $Subject;
    $message = $MessagesBody;  
	
	if($smtpHost != '') { 
		require_once 'class.phpmailer.php';
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		try {
									
			$mail->Host       = $smtpHost;
			$mail->SMTPAuth   = true;
			$mail->SMTPSecure = "ssl";
			$mail->Port       = $smtpPort;
			$mail->Username   = $smtpUsername;
			$mail->Password   = $smtpPassword;
			
			$mail->SetFrom($smtpUsername, 'Brillare');
			$mail->AddAddress($to_email);
			$mail->addCC($mCc);
			$mail->addBCC($mBcc);
			$mail->Subject = $subject;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
			$mail->MsgHTML($message);
			$mail->Send();
			
		} catch (phpmailerException $e) {
			
			echo "Error processing your request. Tyagain";
		}
	} else { 
    
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";    
		$headers.= 'From: brillare.net <mail@brillare.net>'. "\r\n";   
		$headers.= 'Cc: '.$mCc.'' . "\r\n";    
		$headers.= 'Bcc: '.$mBcc.' ' . "\r\n";
		
		@mail($to_email,$subject,$message,$headers);
	}
}
function _isArray($tmpData = array()) {
	if(isset($tmpData) && is_array($tmpData) && count($tmpData)) {
		return true;
	} 
	return false;
}
function get_time_ago_for_review( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'Mon',
                24 * 60 * 60            =>  'Day',
                60 * 60                 =>  'Hrs',
                60                      =>  'Min',
                1                       =>  'Sec'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str;
        }
    }
}

function get_time_ago_for_review_yellow( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'Mon',
                24 * 60 * 60            =>  'Day',
                60 * 60                 =>  'Hrs',
                60                      =>  'Min',
                1                       =>  'Sec'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}
function _get_home_banner($tmpBanner = array()){ 
	ob_start();
	?>
	<!-- Banner -->
	<section class="banner_wrapper">
		<?php /* <img src="<?php echo $tmpBanner['background_image']; ?>" alt="Image" class="bnr_img"> */ ?>
		<video playsinline autoplay muted loop poster="<?php echo $tmpBanner['background_image']; ?>" id="bgvid" class="bnr_img">
			<source src="<?php echo V_CDN_URL.V_THEME_DIR; ?>assets/media/video.mp4" type="video/mp4">
		</video>
			<div class="banner_inner_content">
				<div class="container">
					<h1><?php echo $tmpBanner['title']; ?></h1>
					<p><?php echo $tmpBanner['small_introduction']; ?></p>
				</div>
			</div>
			<div class="banner_badge">
				<div class="container">
					<div class="badge_content_wrap">
						<img src="images/banner-shape1.png" alt="">
						<div class="badge_content">
							<div class="top_badge">
								<span class="badge_num">50</span>
								<p>Years <span class="badge_line">LIFE EXPECTANCY</span></p>
							</div>
							<div class="bottom_lbl">
								<p>All Pipe Relining Work</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="banner_form">
				<div class="container">
					<form method="post">
						<div class="form_group">
							<input type="text" name="name" class="form-control" placeholder="Name :" required>
						</div>
						<div class="form_group">
							<input type="email" name="email" class="form-control" placeholder="Email Address :" required>
						</div>
						<div class="form_btn">
							<input type="hidden" name="form_info" value="Banner Contact Form">
							<button type="submit" class="btn_style1">I WANT A $0 CAMERA INSPECTION</button>
						</div>
					</form>
				</div>
			</div>
	</section>
	<!-- End -->
	<?php
	$bannerHTML = ob_get_contents();
	ob_end_clean();
	echo $bannerHTML;
}

function _get_meta_info($tmpArr = array(),$arrHeader = array()){
	ob_start(); ?>
<!-- Primary Meta Tags -->
<title><?php echo $tmpArr['meta_title']; ?></title>
<meta name="title" content="<?php echo $tmpArr['meta_title']; ?>">
<meta name="description" content="<?php echo $tmpArr['meta_description']; ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo V_SITE_URL . $_SERVER['REQUEST_URI']; ?>">
<meta property="og:title" content="<?php echo $tmpArr['meta_title']; ?>">
<meta property="og:description" content="<?php echo $tmpArr['meta_description']; ?>">
<meta property="og:image" content="<?php echo V_CDN_URL . $arrHeader['header_background_image'][0]['urlPath']; ?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo V_SITE_URL . $_SERVER['REQUEST_URI']; ?>">
<meta property="twitter:title" content="<?php echo $tmpArr['meta_title']; ?>">
<meta property="twitter:description" content="<?php echo $tmpArr['meta_description']; ?>">
<meta property="twitter:image" content="<?php echo V_CDN_URL . $arrHeader['header_background_image'][0]['urlPath']; ?>">

	<?php
	$metaHTML = ob_get_contents();
	ob_end_clean();
	echo $metaHTML;
}


function _isset($DataArray = array(),$field){
	$echoValue = '';
	if(isset($DataArray[$field]) && !empty($DataArray[$field])) {
		$echoValue = $DataArray[$field];
	}
	return $echoValue;
}

/* get image src alt and title */
function _imgSrc($tmpArr = array(),$key = ''){
	$tmpHTML = '';
	if(isset($key) && !empty($key)){
		$tmpHTML = 'src="'.V_CDN_URL.$tmpArr[$key][0]['urlPath'].'" alt="'.$tmpArr[$key][0]['info1'].'" title="'.$tmpArr[$key][0]['info2'].'"';
	}
	return $tmpHTML;
}

function _imgSrc_Lazy($tmpArr = array(),$key = '',$extraClass = ''){
	$tmpHTML = '';
	if($extraClass != ''){
		$extraClass = ' '.$extraClass;
	}
	if(isset($key) && !empty($key)){
		$tmpHTML = 'class="lazy'.$extraClass.'" data-src="'.V_CDN_URL.$tmpArr[$key][0]['urlPath'].'" alt="'.$tmpArr[$key][0]['info1'].'" title="'.$tmpArr[$key][0]['info2'].'"';
	}
	return $tmpHTML;
}
function _imgSrc_Lazy_bg($tmpArr = array(),$key = '',$extraClass = ''){
	$tmpHTML = '';
	if($extraClass != ''){
		$extraClass = ' '.$extraClass;
	}
	if(isset($key) && !empty($key)){
		$tmpHTML = 'class="lazy'.$extraClass.'" data-bg="'.V_CDN_URL.$tmpArr[$key][0]['urlPath'].'" alt="'.$tmpArr[$key][0]['info1'].'" title="'.$tmpArr[$key][0]['info2'].'"';
	}
	return $tmpHTML;
}

function style_min(){	$minify = new minify();
 
	 $destination_css_file = config::full_dir_path(V_THEME_DIR.'css/style.min.css'); 
	 $arrSourceFiles = array(
		
		config::full_dir_path(V_THEME_DIR.'font-awesome/css/font-awesome.min.css'),
		config::full_dir_path(V_THEME_DIR.'css/bootstrap.min.css'),
		config::full_dir_path(V_THEME_DIR.'css/owl.carousel.min.css'),
		config::full_dir_path(V_THEME_DIR.'css/owl.theme.default.css'),
		config::full_dir_path(V_THEME_DIR.'css/reset.css'),
		config::full_dir_path(V_THEME_DIR.'css/style.css'),
		config::full_dir_path(V_THEME_DIR.'css/media.css'),
	 );
	 
	 $minimize = false;
	 if(is_file($destination_css_file)){
		 foreach($arrSourceFiles as $file) {
			if($minimize == false && filemtime($destination_css_file) <= filemtime($file)) {
				$minimize = true;
			}
		 }
	 } else {
		 $minimize = true;
	 }
	 if($minimize) {
		$minify->css(
			$destination_css_file,
			$arrSourceFiles
		);
	 }}

function style_js(){
	$minify = new minify();
	
	 $destination_js_file = config::full_dir_path(V_THEME_DIR.'js/site.min.js'); 
	 $arrSourceFiles = array(
		config::full_dir_path(V_THEME_DIR.'js/jquery.min.js'),
		config::full_dir_path(V_THEME_DIR.'js/bootstrap.min.js'),
		config::full_dir_path(V_THEME_DIR.'js/owl.carousel.min.js'),
		config::full_dir_path(V_THEME_DIR.'js/custom.js')
	 );
	 $minimize = false;
	 if(is_file($destination_js_file)){
		 foreach($arrSourceFiles as $file) {
			if($minimize == false && filemtime($destination_js_file) <= filemtime($file)) {
				$minimize = true;
			}
		 }
	 } else {
		 $minimize = true;
	 }
	 if($minimize) {
		$minify->js(
			$destination_js_file,
			$arrSourceFiles
		);
	 }
}
?>