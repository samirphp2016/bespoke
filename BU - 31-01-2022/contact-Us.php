<?php

	if(isset($_GET['slug']) && !empty($_GET['slug']) && $_GET['slug'] == 'thank-you') {
		include 'contact_thank_you.php';
		die();
	}
    $contact_us_contentArr = array();
    $contact_us_content = contact_us_content::get_data($contact_us_contentArr);		
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
	.error {
		color:red;
		margin-top:3px;
	}
</style>
<!-- Contact Us Page Start -->
<main id="Contact-Us">
    <!-- Hero Banner Start -->
    <Section <?php echo _imgSrc_Lazy_bg($contact_us_content,'banner_image','hero-banner');?> >
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-banner-docs">
                        <h2 class="fw-700 text-White">
                           <?php echo _isset($contact_us_content,'title');?>
                        </h2>
                        <b class="fw-600 text-White">
                             <?php echo _isset($contact_us_content,'content');?>
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
    </Section>
    <!-- Hero Banner End -->
    <!-- Contact List Start -->
    <section class="Contact-list">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="Contact-box">
                        <div <?php echo _imgSrc_Lazy_bg($contact_us_content,'speak_image','Contact-box-img');?>>
                            <span class="Contact-Shield" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/Shield.png);"></span>
                        </div>
                        <div class="Contact-box-info" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/Content-Box.png);">
                            <h3 class="fw-700"> <?php echo _isset($contact_us_content,'speak_title');?></h3>
                            <hr class="text-Light-Green-text-green-bg" />
                            <p class="fw400"><?php echo _isset($contact_us_content,'speak_small_text');?></p>
                            <a href="tel:+<?php echo _isset($contact_us_content,'speak_contact_no');?>" class="btn btn-bg-Dark-Grey">Call an Expert Now</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="Contact-box">
                         <div <?php echo _imgSrc_Lazy_bg($contact_us_content,'send_image','Contact-box-img');?>>
                            <span class="Contact-Shield" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/Shield.png);"></span>
                        </div>
                        <div class="Contact-box-info" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/Content-Box.png);">
                            <h3 class="fw-700"><?php echo _isset($contact_us_content,'send_title');?></h3>
                            <hr class="text-Light-Green-text-green-bg" />
                            <p class="fw400"><?php echo _isset($contact_us_content,'send_email');?></p>
                            <a href="mailto:<?php echo _isset($contact_us_content,'send_email');?>" class="btn btn-bg-Dark-Grey">Send Message</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="Contact-box">
                        <div <?php echo _imgSrc_Lazy_bg($contact_us_content,'visit_image','Contact-box-img');?>>
                            <span class="Contact-Shield" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/Shield.png);"></span>
                        </div>
                        <div class="Contact-box-info" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/Content-Box.png);">
                            <h3 class="fw-700"><?php echo _isset($contact_us_content,'visit_title');?></h3>
                            <hr class="text-Light-Green-text-green-bg" />
                            <p class="fw400"><?php echo _isset($contact_us_content,'address');?></p>
                            <a href="<?php echo _isset($contact_us_content,'map_link');?>" class="btn btn-bg-Dark-Grey">Get Directions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact List End -->
    <!-- Form Section Start -->
    <section class="form-section bg-color-Light-Teal">
        <div class="container">
            <div class="form-title">
                <h2 class="fw-700 text-Dark-Grey">
                    <?php echo _isset($contact_us_content,'ad_title');?>
                </h2>
                <p class="text-Dark-Grey fw-400">
                   <?php echo _isset($contact_us_content,'ad_small_content');?>
                </p>
            </div>
            <div class="form-row">
                <div class="form-col bg-color-White">
                    <form action="" method="POST" class="men-form">
                        <div class="form-input" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/3.png);">
                            <input type="text" class="" name="fName" id="fName" placeholder="name" value=""  />
							<p class="error fName_error"></p>
                        </div>
                        <div class="form-input" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/1.png);">
                            <input type="tel" class="" name="mobile" id="mobile" placeholder="Phone Number" value="" />
							<p class="error mobile_error"></p>
                        </div>
                        <div class="form-input" style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Contact-Box/2.png);">
                            <input type="email" class="" name="email" id="email" placeholder="email" value="" />
							<p class="error email_error"></p>
                        </div>
                        <div class="">
                            <textarea class="" name="message" id="message" placeholder="Message (optional)" value=""></textarea>
                        </div>
                        <button class="btn btn-bg send_inquiry" type="button">Send an Enquiry</button>
                    </form>
                </div>
                <div class="form-col form-col-docs bg-color-Teal">
                    <div class="form-docs text-White">
                        <h2 class="fw-700">
                            Contact
                        </h2>
                        <hr class="text-Light-Green-text-green-bg ">
                        <h4 class="fw-500">
                           <?php echo _isset($contact_us_content,'alternatively');?>
                        </h4>
                        <hr class="text-Light-Green-text-green-bg ">
                        <p>
                            <?php echo _isset($contact_us_content,'our_trading');?>
                        </p>
                        <a href="tel:+<?php echo _isset($contact_us_content,'call_1300_030_555');?>" class="btn btn-bg-Dark-Grey">
                            Call <?php echo _isset($contact_us_content,'call_1300_030_555');?>
                        </a>
                    </div>
                </div>
               
				<img <?php echo _imgSrc_Lazy($contact_us_content,'lady_image','Team-Member');?>>
            </div>
        </div>
    </section>
    <!-- Form Section End -->
</main>
<!--  Contact-Us Page End -->

<?php include 'partials/_footer.php';?>