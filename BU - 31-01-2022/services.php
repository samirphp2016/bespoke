<?php
    $serviceArr = array();
    $service_content = service_content::get_data($serviceArr);		
    if(count($service_content)){
        $service_content = $service_content[0];
    }
	
	
	$service_listArr = array('orderBy' => 'num ASC');
	$service_list = service_list::get_data($service_listArr);
	
	
	 /*  Meta data */
    $meta_title 		= $service_content['meta_title'];
    $meta_description 	= $service_content['meta_description'];
    $meta_keyword 		= $service_content['meta_keyword'];
    $meta_image 		= '';
    $meta_url 			= $service_content['meta_title'];
    /* Meta Data End */
?>
<?php include 'partials/_header.php';?>

<!-- Services Page Start -->
<main id="services">
    <!-- Hero Banner Start -->

    <section <?php echo _imgSrc_Lazy_bg($service_content,'image','hero-banner');?>>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-banner-docs">
                        <h2 class="fw-700 text-White"><?php echo _isset($service_content,'title');?></h2>
                        <b class="fw-600 text-White">
                            <?php echo _isset($service_content,'content');?>
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
    <!-- Select Service Start -->
    <section class="Select-service">
        <div class="container">
            <div class="Select-service-row">
                <div class="Select-service-filtar">
                    <p>Select a service to jump to</p>
                    <div class="service-option">
                        <select name="change_services" id="change_services">
							<?php foreach( $service_list as $ind => $val ) { ?>
								<option value="<?php echo $val['slug'];?>"> <?php echo $val['title'];?></option>
							<?php } ?>
                        </select>
                        <i class="fa service-fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="Select-btn">
                    <a href="<?php echo _isset($service_content,'contact_bespoke_insurance_link');?>" class="btn btn-border"> <?php echo _isset($service_content,'contact_bespoke_insurance');?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Select Service End -->
    <!-- Services-list Start -->

    <section class="services-list">
        <div class="container">
            <div class="services-cont">
				<?php foreach( $service_list as $ind => $val ) { ?>
					<div class="services-item bg-color-White <?php echo $val['slug'];?>">
						<div class="services-item-img">							
							<img <?php echo _imgSrc_Lazy($val,'image','');?>>
							<div class="services-icon">
								<img data-src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/services/Icon-1.png" alt="services icon 1" title="services icon 1" class="lazy" />
							</div>
						</div>
						<div class="services-item-info">
							<h3 class="fw-700 text-Dark-Grey"><?php echo $val['title'];?></h3>
							<p class="fw-400 text-Grey-white-bg">
								<?php echo $val['small_content'];?>
							</p>
							<div class="serv-sub-list">
								<span class="fw-600"><?php echo $val['ul_cover_title'];?> </span>
								<?php echo $val['content'];?>
							</div>
						</div>
					</div>
				<?php } ?>                
            </div>
        </div>
    </section>

    <!-- Services-list End -->
</main>
<!--  Services Page End -->

<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>
