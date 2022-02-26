<?php
    $about_us_contentArr = array();
    $about_us_content = about_us_content::get_data($about_us_contentArr);		
    if(count($about_us_content)){
        $about_us_content = $about_us_content[0];
    }
	
	
	 /*  Meta data */
    $meta_title 		= $about_us_content['meta_title'];
    $meta_description 	= $about_us_content['meta_description'];
    $meta_keyword 		= $about_us_content['meta_keyword'];
    $meta_image 		= '';
    $meta_url 			= $about_us_content['meta_title'];
    /* Meta Data End */
?>
<?php include 'partials/_header.php';?>

<!-- About Us Page Start -->
<main id="about-us">
    <!-- Hero Banner Start -->

    <section  <?php echo _imgSrc_Lazy_bg($about_us_content,'banner_right_image','hero-banner');?>>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-banner-docs">
                        <h2 class="fw-700 text-White"><?php echo _isset($about_us_content,'banner_title');?></h2>
                        <b class="fw-600 text-White">
							<?php echo _isset($about_us_content,'banner_small_content');?>
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

    <!-- Contact 1 Start -->
    <section class="content-1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="content-docs">
                        <h2 class="fw-700 text-Dark-Grey">
                            <?php echo _isset($about_us_content,'real_support_means_title');?>
                        </h2>
                        <hr class="text-Teal" />
						<div class="desktop">
							<?php echo _isset($about_us_content,'real_support_means_content');?>
						</div>
						
						<div class="mobile">
							<div class="half_para">
								<?php echo _isset($about_us_content,'real_support_means_content');?>
							</div>
							<div class="full_para">
								<?php echo _isset($about_us_content,'real_support_means_content');?>
							</div>
						</div>
						<a class="mob_read_more">Read more</a>
                    </div>
                </div>
                <div class="col">
                    <img <?php echo _imgSrc_Lazy($about_us_content,'real_support_means_image','');?>>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact 1 End -->
    <!-- CTA Strip Start -->
    <section class="CTA-Strip">
        <div class="container">
            <div class="CTA-Strip-pera">
                <?php echo _isset($about_us_content,'that_all_commitment_large_title');?>
            </div>
            <div class="AboutUs-img">
                <img <?php echo _imgSrc_Lazy($about_us_content,'that_all_commitment_image','');?>>
            </div>
        </div>
    </section>

    <!-- CTA Strip End -->
    <!-- Contact 2 Start -->
    <section class="content-1 content-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="content-docs">
                        <h2 class="fw-700 text-White">
                            <?php echo _isset($about_us_content,'wealth_is_not_so_large_title');?>
                        </h2>
                        <hr class="text-Teal" />
                       
						<div class="desktop">
							 <?php echo _isset($about_us_content,'wealth_is_not_so_content');?>
						</div>
						
						<div class="mobile">
							<div class="half_para">
								 <?php echo _isset($about_us_content,'wealth_is_not_so_content');?>
							</div>
							<div class="full_para">
								 <?php echo _isset($about_us_content,'wealth_is_not_so_content');?>
							</div>
						</div>
						<a  class="mob_read_more abt_rm">Read more</a>
                    </div>
                </div>
                <div class="col">
                   
					<img <?php echo _imgSrc_Lazy($about_us_content,'wealth_is_not_so_image','AboutUsImage');?>>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact 2 End -->
</main>
<!-- About Us Page End -->

<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>
