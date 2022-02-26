<?php
	$page_found = false;
    $Explode = explode("/",$_SERVER['PHP_SELF']);
	if(isset($Explode[1]) && !empty($Explode[1])){
		$SuburbSlug = substr($Explode[1],12); 
		$SuburbsArray = array('where' => "`slug` = '".$SuburbSlug."' ");
		$Suburbs = suburbs::get_data($SuburbsArray);
		if(count($Suburbs) >0){
			$Suburbs = $Suburbs[0];
			$_GET['slug'] = $SuburbSlug;
			include('suburb-page.php');
			$page_found = true;
			/*die();*/
		}
	}
	
	if(isset($Explode[1]) && !empty($Explode[1])){
		$serviceArray = array('where' => "`slug` = '".$Explode[1]."'");
		$service = services_list::get_data($serviceArray);
		if(count($service) >0){
			$_GET['slug'] = $Explode[1];
			include('services.php');
			$page_found = true;
			/* die(); */
		}
	}
	
	$RedirectUrlArr = array('orderBy' => 'num ASC','where' => "`title` = '".$_SERVER['REQUEST_URI']."' ");
	$RedirectUrl = seo_redirects::get_data($RedirectUrlArr);
	/* $urls = array();
	$urlToRedirect = array();
	foreach( $RedirectUrl as $ind => $val ){
		$urls[] = $val['url'];
		$urlToRedirect[$val['url']] = $val['action_data'];
	} */
	if(count($RedirectUrl)){
		$RedirectUrl = $RedirectUrl[0];
		/* if(in_array($_SERVER['REQUEST_URI'],$urls)){ */
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location:".$RedirectUrl['content'].""); 
			exit();
		/* } */
	}

	if( $page_found == false ) {
	
    /*  Meta data */
    $meta_title 		= '404 Page';
    $meta_description 	= '404 Page';
    $meta_keyword 		= '404 Page';
    $meta_image 		= '';
    $meta_url 			= '404 Page';
    /* Meta Data End */
?>
<?php 
	include 'inc/header.php'; 
	include 'inc/menu.php';
?>
<div class="body-content">
    <!-- banner -->
    
    <div class="thank-you-message">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">    
                    <h1>404 Page !</h1>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php 
    include 'inc/footer.php'; 
	}
?>