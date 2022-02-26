<?php


	if(isset($_GET['slug']) && !empty($_GET['slug']) && $_GET['slug'] == 'thank-you') {
		include 'quote_thank_you.php';
		die();
	}
    $claim_contentArr = array();
    $claim_content = quote_content::get_data($claim_contentArr);		
    if(count($claim_content)){
        $claim_content = $claim_content[0];
    }
	
	
	$mailDataArr = array();
	$mailData = general::get_data($mailDataArr);
	if(count($mailData)){
		$mailData = $mailData[0];
	}
	
	$ArrError = array();
	if(isset($_POST['submit_claim'])){
		
		if(isset($_POST['fName']) && empty($_POST['fName'])){
			$ArrError['fName'] = "Please Enter First Name";
		}
		
		if(isset($_POST['lName']) && empty($_POST['lName'])){
			$ArrError['lName'] = "Please Enter Last Name";
		}
		
		if(isset($_POST['email']) && empty($_POST['email'])){
			$ArrError['email'] = "Please Enter Email";
		} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$ArrError['email'] ='Please enter valid email address.';
		} 
		
		
		if(isset($_POST['mobile']) && empty($_POST['mobile'])){
			$ArrError['mobile'] = "Please Enter Mobile";
		} else if(!is_numeric($_POST['mobile'])){
			$ArrError['mobile'] = "Please Enter Numeric Mobile";
		}
		
		
		if(isset($_POST['policy-number']) && empty($_POST['policy-number'])){
			$ArrError['policy-number'] = "Please Enter Policy Number";
		}
		
		
		if(isset($_POST['business_name']) && empty($_POST['business_name'])){
			$ArrError['business_name'] = "Please Enter Business name";
		}
		
		if(isset($_POST['date_of_loss']) && empty($_POST['date_of_loss'])){
			$ArrError['date_of_loss'] = "Please Enter Date of Loss";
		}
		
		if(isset($_POST['loss_location']) && empty($_POST['loss_location'])){
			$ArrError['loss_location'] = "Please Enter Loss Of Location";
		}
		
		if(isset($_POST['third_party_name']) && empty($_POST['third_party_name'])){
			$ArrError['third_party_name'] = "Please Enter Third Party name";
		}
		
		if(isset($_POST['third_party_address']) && empty($_POST['third_party_address'])){
			$ArrError['third_party_address'] = "Please Enter Third Party Address";
		}
		
		if(isset($_POST['event_description']) && empty($_POST['event_description'])){
			$ArrError['event_description'] = "Please Enter Event Description";
		}
		
		if(isset($ArrError) && is_array($ArrError) && count($ArrError) == 0) {
			
			
			
			$ArrData = array(
				'fName'			        =>	$_POST['fName'],
				'lName'			        =>	$_POST['lName'],
				'email'			        =>	$_POST['email'],
				'mobile'			    =>	$_POST['mobile'],
				'policy-number'			=>	$_POST['policy-number'],
				'business_name'			=>	$_POST['business_name'],
				'date_of_loss'			=>	$_POST['date_of_loss'],
				'loss_location'			=>	$_POST['loss_location'],
				'third_party_name'		=>	$_POST['third_party_name'],
				'third_party_address'	=>	$_POST['third_party_address'],
				'event_description'		=>	$_POST['event_description'],
				
			);
			$lastid = quote_record::add_record($ArrData);
			
			foreach($_SESSION['Push_images'] as $ind => $val) {
				$Uploads = " INSERT INTO `vital_uploads` SET ";
				$Uploads.= " `order` = 1 ,";
				$Uploads.= " `createdTime` = '".date('Y-m-d H:i:s')."' ,";
				$Uploads.= " `tableName` = 'quote_record' ,";
				$Uploads.= " `fieldName` = 'releavant_files_or_images' ,";
				$Uploads.= " `filePath` = '".$val."', ";
				$Uploads.= " `urlPath` = '".$val."', ";
				$Uploads.= " `recordNum` = ".$lastid.", ";
				$Uploads.= " `filesize` = ".$_SESSION['Push_size'][$ind]." ";
				/* echo $Uploads;
				die(); */
				mysqli()->query($Uploads);
				
				rename('temp_files/'.$val, 'uploads/claims_files/'.$val);
			}
			
			
		$tableStyle = 'border: 1px solid #ddd;text-align: left; border-colspan: colspan; width: 100%;';
		$tableCellStyle = 'border: 1px solid #ddd;text-align: left; padding: 15px;';
		$tableCellStyler = 'border: 1px solid #ddd;text-align: right; padding: 15px;';
		$tableCellStyleHead = 'border: 1px solid #ddd;text-align: center; padding: 15px;';

		
		$html = "<table style='".$tableStyle."'>
                <tr>
                    <td style='".$tableCellStyle."'>First Name</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['fName']."</td>                                    
                </tr>
				<tr>
                    <td style='".$tableCellStyle."'>Last Name</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['lName']."</td>                                    
                </tr>
                <tr>
                    <td style='".$tableCellStyle."'>Phone Number</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['mobile']."</td>                                    
                </tr>
                <tr>
                    <td style='".$tableCellStyle."'>Email</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['email']."</td>                                    
                </tr>
                <tr>
                    <td style='".$tableCellStyle."'>Policy Number</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['policy-number']."</td>                                    
                </tr>
                <tr>
                    <td style='".$tableCellStyle."'>Business Name</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['business_name']."</td>                                    
                </tr>
                <tr>
                    <td style='".$tableCellStyle."'>Date Of Loss</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['date_of_loss']."</td>                                    
                </tr>
				 <tr>
                    <td style='".$tableCellStyle."'>Loss Location</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['loss_location']."</td>                                    
                </tr>
				 <tr>
                    <td style='".$tableCellStyle."'>Third Party Name</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['third_party_name']."</td>                                    
                </tr>
				 <tr>
                    <td style='".$tableCellStyle."'>Third Party Address</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['third_party_address']."</td>                                    
                </tr>
				 <tr>
                    <td style='".$tableCellStyle."'>Event Description</td>                                    
                    <td style='".$tableCellStyle."'>".$_POST['event_description']."</td>                                    
                </tr>
				
            </table>";
			
			unset($_SESSION['Push_images']);
			unset($_SESSION['Push_size']);
			$subject = 'New Quotes';
			_send_mail($mailData['title'],$subject,$html,$mailData['cc'],$mailData['bcc'],$mailData['host_name'],$mailData['username'],$mailData['host_password'],$mailData['port_number'],$_SESSION['Push_images']);	
			$_SESSION['success'] = 'Thank you for claims';
			header("Location:/get_quote/thank-you");
			die();
		}
	} 
	
	
	$count = 0;
	if(isset($_SESSION['Push_images']) && count($_SESSION['Push_images']) >0) { 
		foreach($_SESSION['Push_images'] as $ind => $val) { 
			if($val != '' ){ 
				$count = $count + 1;
			}
		}
	}
	
	 /*  Meta data */
    $meta_title 		= $claim_content['meta_title'];
    $meta_description 	= $claim_content['meta_description'];
    $meta_keyword 		= $claim_content['meta_keyword'];
    $meta_image 		= '';
    $meta_url 			= $claim_content['meta_title'];
    /* Meta Data End */
?>
<?php include 'partials/_header.php';?>
<style>
	.error {
		color:red;
		font-weight:bold;
		margin-top:5px;
	}
</style>
<!-- Claims Page Start -->
<main id="claims">
    <!-- Hero Banner Start -->

    <section <?php echo _imgSrc_Lazy_bg($claim_content,'banner_image','hero-banner');?>>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-banner-docs">
                        <h2 class="fw-700 text-White"><?php echo _isset($claim_content,'title');?></h2>
                        <b class="fw-600 text-White">
                            <?php echo _isset($claim_content,'content');?>
                        </b>
                        <div class="Badge">
                            <div class="Badge-img">
                               <img <?php echo _imgSrc_Lazy($access_to_over_100_australian_insurers,'image','');?>>
                            </div>
                            <div class="Badge-info">
                                <h4 class="text-White">
                                    <?php echo _isset($access_to_over_100_australian_insurers,'title');?>
                                </h4>
                                <hr class="text-Teal" />
                                <p class="text-Grey-white-bg fw-400">
                                    <?php echo _isset($access_to_over_100_australian_insurers,'Small_content');?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Banner End -->

    <!-- Mini CTAs Start -->

    <section class="Mini-CTAs">
        <div class="container">
            <div class="row">
                <div class="Mini-CTAs-col">
                    <h6 class="text-Teal fw-600"> <?php echo _isset($claim_content,'we_understand_title');?></h6>
                    <p class="text-Grey-white-bg fw-400">
                         <?php echo _isset($claim_content,'we_understand_content');?>
                    </p>
                </div>
                <div class="Mini-CTAs-col">
                    <h6 class="text-Teal fw-600"><?php echo _isset($claim_content,'convenience_title');?></h6>
                    <p class="text-Grey-white-bg fw-400">
                       <?php echo _isset($claim_content,'convenience_content');?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mini CTAs End -->

    <!-- Claims Contact Start -->

    <section class="claims-contact">
        <div class="container">
            <div class="fw-400 con-title"><?php echo _isset($claim_content,'please_contact_us');?></div>
			
			
            <form class="form-claims" action="" method="POST">
                <div class="form-section-claims pb-60">
                    <h2 class="text-Dark-Grey form-claims-title">
                        Your Identity
                    </h2>
                    <div class="form-claims-grup">
                        <label for="fName" class="form-label fw-500"> Please enter your <b class="fw-600"> first name</b> </label>
                        <input type="text" name="fName" class="form-control" id="fName" placeholder="Eg: John" value="<?php if(isset($_POST['fName']) && !empty($_POST['fName'])) { echo $_POST['fName'];}?>"  />
						<p class="error"><?php if(isset($ArrError['fName']) && !empty($ArrError['fName'])) { echo $ArrError['fName'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="lName" class="form-label fw-500"> Please enter your <b class="fw-600"> last name </b> </label>
                        <input type="text" name="lName" class="form-control" id="lName" placeholder="Eg: Doe" value="<?php if(isset($_POST['lName']) && !empty($_POST['lName'])) { echo $_POST['lName'];}?>"   />
						<p class="error"><?php if(isset($ArrError['lName']) && !empty($ArrError['lName'])) { echo $ArrError['lName'];}?></p>
                    </div>
                </div>
                <div class="form-section-claims pb-60">
                    <h2 class="text-Dark-Grey form-claims-title">
                        Contact Information
                    </h2>
                    <div class="form-claims-grup">
                        <label for="email" class="form-label fw-500"> Please enter your <b class="fw-600"> email address </b> </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Eg: name@example.com" value="<?php if(isset($_POST['email']) && !empty($_POST['email'])) { echo $_POST['email'];}?>"  />
						<p class="error"><?php if(isset($ArrError['email']) && !empty($ArrError['email'])) { echo $ArrError['email'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="mobile" class="form-label fw-500"> Please enter your <b class="fw-600"> phone number </b> </label>
                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Eg: 0400 000 000" value="<?php if(isset($_POST['mobile']) && !empty($_POST['mobile'])) { echo $_POST['mobile'];}?>"  />
						<p class="error"><?php if(isset($ArrError['mobile']) && !empty($ArrError['mobile'])) { echo $ArrError['mobile'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="policy-number" class="form-label fw-500"> Please enter your <b class="fw-600"> policy number </b> </label>
                        <input type="text" class="form-control" name="policy-number" id="policy-number" placeholder="Located on your insurance card" value="<?php if(isset($_POST['policy-number']) && !empty($_POST['policy-number'])) { echo $_POST['policy-number'];}?>"   />
						<p class="error"><?php if(isset($ArrError['policy-number']) && !empty($ArrError['policy-number'])) { echo $ArrError['policy-number'];}?></p>
                    </div>
                </div>
                <div class="form-section-claims">
                    <h2 class="text-Dark-Grey form-claims-title">
                        Quote Details
                    </h2>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Name of <b class="fw-600"> insured person </b> or <b class="fw-600"> business name </b> </label>
                        <input type="text" class="form-control" name="business_name" id="" placeholder="Eg: Michael Smith or Smith's Automotives Pty Ltd" value="<?php if(isset($_POST['business_name']) && !empty($_POST['business_name'])) { echo $_POST['business_name'];}?>"  />
						<p class="error"><?php if(isset($ArrError['business_name']) && !empty($ArrError['business_name'])) { echo $ArrError['business_name'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please enter the <b class="fw-600"> Date of Loss </b> </label>
                        <input type="text" class="form-control" name="date_of_loss" id="" placeholder="Select date here" value="<?php if(isset($_POST['date_of_loss']) && !empty($_POST['date_of_loss'])) { echo $_POST['date_of_loss'];}?>"   />
						<p class="error"><?php if(isset($ArrError['date_of_loss']) && !empty($ArrError['date_of_loss'])) { echo $ArrError['date_of_loss'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide the <b class="fw-600"> Loss Location </b> </label>
                        <input type="text" class="form-control" name="loss_location" id="" placeholder="Enter location address" value="<?php if(isset($_POST['loss_location']) && !empty($_POST['loss_location'])) { echo $_POST['loss_location'];}?>"   />
						<p class="error"><?php if(isset($ArrError['loss_location']) && !empty($ArrError['loss_location'])) { echo $ArrError['loss_location'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide your <b class="fw-600"> Third Party Name </b> </label>
                        <input type="text" class="form-control" name="third_party_name" id="" placeholder="Enter location address" value="<?php if(isset($_POST['third_party_name']) && !empty($_POST['third_party_name'])) { echo $_POST['third_party_name'];}?>"   />
						<p class="error"><?php if(isset($ArrError['third_party_name']) && !empty($ArrError['third_party_name'])) { echo $ArrError['third_party_name'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide the <b class="fw-600"> Third Party Address </b> </label>
                        <input type="text" class="form-control" name="third_party_address"id="" placeholder="Enter location address" value="<?php if(isset($_POST['third_party_address']) && !empty($_POST['third_party_address'])) { echo $_POST['third_party_address'];}?>"   />
						<p class="error"><?php if(isset($ArrError['third_party_address']) && !empty($ArrError['third_party_address'])) { echo $ArrError['third_party_address'];}?></p>
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide a <b class="fw-600"> Description </b> of the event </label>
                        <textarea class="form-control" id="" name="event_description" rows="3" placeholder="Enter your message here" ><?php if(isset($_POST['event_description']) && !empty($_POST['event_description'])) { echo $_POST['event_description'];}?></textarea>
						<p class="error"><?php if(isset($ArrError['event_description']) && !empty($ArrError['event_description'])) { echo $ArrError['event_description'];}?></p>
                    </div>
                    <div class="form-claims-grup form-claims-grup-file">
                        <label for="" class="form-label-file fw-500">
                            <p><b class="fw-600"> Upload </b> Upload any relevant files or images that you feel may help us with your claim (optional)</p>
                        </label>
                        <input type="file" id="myfile" class="form-control form-control-file" name="myfile[]" placeholder="Enter your message here" multiple accept=".gif,.jpg,.jpeg,.png,.doc,.docx,.zip" />
                        <img data-src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/claims/claims.png" alt="file Upload" title="file Upload" class="lazy file-Upload" />
						
						
                    </div>
                    <div class="file-uploaded">
                        <p class="file-uploaded-title"><i class="fa fa-check text-Teal" aria-hidden="true"></i> <span class="file_count"><?php echo $count;?></span> files uploaded successfully</p>
						<div class="append_files">
							<?php 
							if(isset($_SESSION['Push_images']) && count($_SESSION['Push_images']) >0) { 
								foreach($_SESSION['Push_images'] as $ind => $val) { 
									if($val != ''){ ?>
										<div class="file-uploaded-item">
											<span class="file-name">
												<?php echo $val;?>
											</span>
											<span class="file-closs" data-name="<?php echo $val;?>">
												<i class="fa fa-times"></i>
											</span>
										</div>
							<?php 
									}
								}
							}	?>
						</div>
                        <!---<div class="file-uploaded-item">
                            <span class="file-name">
                                img_47102_1
                            </span>
                            <span class="file-closs">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <div class="file-uploaded-item">
                            <span class="file-name">
                                img_47102_2
                            </span>
                            <span class="file-closs">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>--->
                    </div>
                    <div class="Claim-Submit">
                        <p class="fw-400 text-Dark-Grey">We will respond to you within <b class="fw-600">24hrs</b> (business hours) of your submission</p>
                        <button type="submit" class="btn btn-bg submit_claim" name="submit_claim">Submit Your Claim</button>
                    </div>
                </div>
            </form>
			
        </div>
    </section>

    <!-- Claims Contact End -->
</main>
<!--  Claims Page End -->

<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>
<script>
	$(document).ready(function(){
		<?php if(isset($ArrError) && count($ArrError) > 0 ) { ?>
			 $('html, body').animate({ scrollTop: $(".form-claims").offset().top}, 3000);
		<?php } ?>
		
		/* if($(".mess").val() == 1) {
			$('html, body').animate({ scrollTop: $(".claims-contact").offset().top}, 3000);
		} */
	});
</script>