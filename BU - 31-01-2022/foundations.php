<?php 

	$foundations_contentArr = array();
    $foundations_content = foundations_content::get_data($foundations_contentArr);		
    if(count($foundations_content)){
        $foundations_content = $foundations_content[0];
    }
	
	
	$our_community_partnersArr = array();
    $our_community_partners = our_community_partners::get_data($our_community_partnersArr);
	  /*  Meta data */
    $meta_title 		= $foundations_content['meta_title'];
    $meta_description 	= $foundations_content['meta_description'];
    $meta_keyword 		= $foundations_content['meta_keyword'];
    $meta_image 		= '';
    $meta_url 			= $foundations_content['meta_title'];
    /* Meta Data End */
?>
<?php include 'partials/_header.php';?>

<!-- Foundations Page Start -->
<main id="foundations">
    <!-- Hero Banner Start -->

    <section class="hero-banner" style="background-image: url(<?php echo V_CDN_URL.$foundations_content['banner_right_image'][0]['urlPath'];?>);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-banner-docs">
                        <h2 class="fw-700 text-White"><?php echo _isset($foundations_content,'banner_title');?></h2>
                        <b class="fw-600 text-White">
                            <?php echo _isset($foundations_content,'banner_small_content');?>
                        </b>
                        <div class="Badge">
                            <div class="Badge-img">
                                <!---<img data-src="assets/images/banner/Badge.png" alt="Badge" title="Badge" class="lazy" />---->
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

    <!-- CTA Section Start -->

    <section class="CTA-Section ">
        <div class="container">
            <div class="c-row">
                <div class="c-col">
                    <img <?php echo _imgSrc_Lazy($foundations_content,'our_community_image_mobile','image-m');?>>
					<img <?php echo _imgSrc_Lazy($foundations_content,'our_community_image','image-d');?>>
                </div>
                <div class="c-col">
                    <div class="c-docs text-Dark-Grey">
                        <h2 class="fw-700 ">
                             <?php echo _isset($foundations_content,'our_community_title');?>
                        </h2>
                        <h4 class="fw-600">
                            <?php echo _isset($foundations_content,'local_community_title');?>
                        </h4>
                        <hr class="text-Teal" />

                        <p class="fw-400">
                            <?php echo _isset($foundations_content,'local_community_content');?>
                        </p>
                        <h4 class="fw-600">
                             <?php echo _isset($foundations_content,'how_does_it_work_title');?>
                        </h4>
                        <hr class="text-Teal" />
                        <p class="fw-400">
                            <?php echo _isset($foundations_content,'how_does_it_work_content');?>
                        </p>
                    </div>
                </div>
				<img <?php echo _imgSrc_Lazy($foundations_content,'our_community_laptopoverlay_image','LaptopOverlay');?>>
            </div>
        </div>
    </section>

    <!-- CTA Section End -->
    <!-- Community Partners Start -->
    <section class="Community-Partners">
        <div class="container">
            <h2 class="fw-700 text-Dark-Grey">
                 <?php echo _isset($foundations_content,'our_community_partners_title');?>
            </h2>
            <div class="partner-list">
				<?php foreach( $our_community_partners as $ind => $val) { ?>
					<div class="partner">
						<div class="partner-img">
							<img <?php echo _imgSrc_Lazy($val,'image','');?>>
						</div>
						<div class="partner-docs">
							<h4 class="fw-600 text-Dark-Grey">
								<?php echo $val['title'];?>
							</h4>
							<?php echo $val['content'];?>
						</div>
						<div class="partner-link">
							<?php if($val['watch_video_link'] != '') { ?>
								<a href="<?php echo $val['watch_video_link'];?>">
									<span>Watch Video</span>
									<img data-src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/foundations/Watch.png" alt="Foundations Watch" title="Foundations Watch" class="" src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/foundations/Watch.png">
								</a>
							<?php } ?>
							<a href="<?php echo $val['visit_site_link'];?>">
								<span>Visit Site</span>
								<i class='fas fa-external-link-alt'></i>
							</a>
						</div>
					</div>
				<?php } ?>                
            </div>
        </div>
    </section>
    <!-- Community Partners End -->
</main>
<!-- Foundations Page End -->

<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>