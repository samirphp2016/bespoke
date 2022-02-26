<?php
		
	$contact_us_contentArr = array();
    $contact_us_content = quote_thank_you_page::get_data($contact_us_contentArr);		
    if(count($contact_us_content)){
        $contact_us_content = $contact_us_content[0];
    }
	
     /*  Meta data */
    $meta_title 		= $contact_us_content['meta_title'];
    $meta_description 	= $contact_us_content['meta_description'];
    $meta_keyword 		= $contact_us_content['meta_keyword'];
    $meta_image 		= '';
    $meta_url 			= $contact_us_content['meta_title'];
    /* Meta Data End */
?>
<?php include 'partials/_header.php';?>
<style>
	.thank-you-message {
		min-height:400px;
		text-align:center;
		padding-top:150px;
		background-color:black;
		color:white;
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
                    <h1><?php echo $contact_us_content['title']?></h1>
					<?php echo $contact_us_content['content']?>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>