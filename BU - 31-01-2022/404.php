<?php
		
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


	
    /*  Meta data */
    $meta_title 		= '404 Page';
    $meta_description 	= '404 Page';
    $meta_keyword 		= '404 Page';
    $meta_image 		= '';
    $meta_url 			= '404 Page';
    /* Meta Data End */
?>
<?php include 'partials/_header.php';?>
<style>
	.thank-you-message {
		min-height:300px;
		text-align:center;
		padding:150px;
		background-color:black;
	}
	.thank-you-message h1{
		color:white;
		font-size:50px;
		font-weight:bold;
	}
	.thank-you-message .col-md-12 {
		width:100%;
	}
</style>

<div class="body-content">
    <!-- banner -->
    
    <div class="thank-you-message">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">    
                    <h1>404 Page !</h1>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>