<?php
    $home_contentArr = array();
    $home_content = home_content::get_data($home_contentArr);		
    if(count($home_content)){
        $home_content = $home_content[0];

    }

    /* home brands  Record Start*/
    $home_brandsArr = array('orderBy' => 'num ASC');
    $home_brands = home_brands::get_data($home_brandsArr);

    /* reviews  Record Start*/
    $reviewsArr = array('orderBy' => 'num ASC');
    $reviews = protection_business_reviews::get_data($reviewsArr);

	$bespoke_insurance_servicesArr = array('orderBy' => 'num ASC');
	$bespoke_insurance_services = bespoke_insurance_services::get_data($bespoke_insurance_servicesArr);

	function get_words($sentence, $count = 30) {
		preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
		return $matches[0];
	}
    
    /*  Meta data */
    $meta_title 		= $home_content['meta_title'];
    $meta_description 	= $home_content['meta_description'];
    $meta_keyword 		= $home_content['meta_keyword'];
    $meta_image 		= '';
    $meta_url 			= $home_content['meta_title'];
    /* Meta Data End */
?>

<?php include 'partials/_header.php';?>

<!-- Home page Start -->
<!-- <style>
	.solution-section {
		background-image: url(https://yash.tatsavijoshi.com/bespoke/assets/images/solution/image_without_hands.png), linear-gradient(180deg, #0e0f0f 0%, #009182 100%);
	}
	.solution-section.active {
		background-image: url(https://yash.tatsavijoshi.com/bespoke/assets/images/solution/image_with_hands.png), linear-gradient(180deg, #0e0f0f 0%, #009182 100%);
	}
</style> -->
<main id="Home">
    <!-- Banner Start -->
    <Section class="banner">
        <div class="row">
            <div class="col banner-col banner-left">
                <div class="banner-docs">
                    <h2 class="text-White main">
                        <?php echo _isset($home_content,'banner_title');?>
                    </h2>
                    <div class="Badge">
                        <div class="Badge-img">
                           <img <?php echo _imgSrc_Lazy($access_to_over_100_australian_insurers,'image','');?>>
                        </div>
                        <div class="Badge-info">
                            <h4 class="text-White">
                                 <?php echo _isset($access_to_over_100_australian_insurers,'title');?>
                            </h4>
                            <hr class="text-Teal">
                            <p class="text-Grey-white-bg fw-400">
                                <?php echo _isset($access_to_over_100_australian_insurers,'Small_content');?>
                            </p>
                        </div>
                    </div>
                    <a href="<?php echo _isset($access_to_over_100_australian_insurers,'get_online_quote_link');?>" class="btn btn-bg"><?php echo _isset($access_to_over_100_australian_insurers,'get_online_quote_title');?></a>
                </div>
            </div>
            <div class="col banner-col banner-right">
				<video loop="true" autoplay="autoplay" class="" style="width:100%" id="dektop_vid" muted playsinline>
					<source src="<?php echo V_CDN_URL;?><?php echo $home_content['banner_right_image'][0]['urlPath']?>" type="video/mp4">
				</video>
                <!----<div class="banner-docs">
                    <a href="<?php echo _isset($home_content,'risk_profiling_services_link');?>"
                        class="btn btn-bg btn-radius">
                        <?php echo _isset($home_content,'risk_profiling_services_title');?> </a>
                </div>--->
            </div>
        </div>
    </Section>
    <!-- banner End -->
    <!-- Brand Start -->
    <section class="Brand">
        <div class="Brand__title">
            <div class="container">
                <div class="row">
                    <p class="text-Dark-Grey  fw-400 col">
                        <?php echo _isset($home_content,'over_100_content');?>
                    </p>
                </div>
            </div>
        </div>
        <div class="Brand__list">
            <div class="container">
                <div class="row">
                    <div class="Brand__list-logo col owl-carousel owl-theme">
                        <?php foreach($home_brands as $ind => $val){ ?>
                        <div class="Brand__logo">
                            <img <?php echo _imgSrc($val,'image');?>>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand End -->
    <!-- Problem Start -->
    <section class="Problem bg-color-Smoky-Black">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-Milano-Red fw-700">
                        <?php echo _isset($home_content,'problem_title');?>
                    </h2>
                    <div class="text-White Problem-info">
                        <h4 class="fw-600">
                            <?php echo _isset($home_content,'problem_small_content');?>
                        </h4>
                        <hr class="text-Milano-Red">
                        <span class="fw-400 text-Grey-white-bg">
                            <?php echo _isset($home_content,'problem_content');?>
                        </span>
                    </div>
                    <div class="Problem-qna-box">
                        <div class="text-Grey-white-bg bg-color-White Problem-qna fw-400">
                            <h4 class="text-Dark-Grey fw-600 Problem-qna-box-titile">
                                <span> <?php echo _isset($home_content,'overwhelming_range_title');?> </span>
                                <i class="fas fa-chevron-down"></i>
                            </h4>
                            <div class="Problem-qna-box-pera ">
                                <?php echo _isset($home_content,'overwhelming_range_content');?>
                            </div>
                        </div>
                        <div class="text-Grey-white-bg bg-color-White Problem-qna fw-400">
                            <h4 class="text-Dark-Grey fw-600 Problem-qna-box-titile">
                                <span> <?php echo _isset($home_content,'finding_the_best_title');?> </span>
                                <i class="fas fa-chevron-down"></i>
                            </h4>
                            <div class="Problem-qna-box-pera">
                                <?php echo _isset($home_content,'finding_the_best_content');?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <!---<img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/problem/BG-Image.png"
                        alt="WorkSafe" title="WorkSafe" class="lazy problem-mob">---->
						
					<img <?php echo _imgSrc_Lazy($home_content,'problem_background_image','problem-mob');?>>
                </div>
                <!-- <div class="problem-solution-section">
                    <div class="col Problem-Animation" >
                        <div class="problem-animation-img">
                            <img <?php echo _imgSrc_Lazy($home_content,'problem_animation_image','Problem-Animation_ani');?>>
                        </div>
                    </div>
					
					<div class="col Problem-Animation_second">
						<div class="problem-animation-img">
							<img <?php echo _imgSrc_Lazy($home_content,'the_solution_animation_image','solution-animation_ani');?>>
						</div>
					</div> -->
                <!-- <div class="col solution-animation">
                        <div class="problem-animation-img">
                            <img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Solution-Animation/image-1.png" class="lazy" alt="">
                        </div>
                    </div> -->
                <!-- </div> -->
            </div>
        </div>
        <!---<div class="Problem-Animation">

        </div>---->
        <div class="Problem-Animation">
            <div class="Problem-Animation-docs">
               <!---- <img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Problem-Animation/BG-Image-1.png"
                    src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Problem-Animation/BG-Image-1.png"
                    alt="Problem-Animation BG-Image-1" title="Problem-Animation BG-Image-1"
                    class="lazy Problem-img-bg-1">--->
				<img <?php echo _imgSrc($home_content,'animation_bg_without_lady');?> class="Problem-img-bg-1">
                <div class="credit-card">
                    <div class="credit-card-info"></div>
                    <div class="credit-card-doc">
                       <!--- <img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Problem-Animation/credit-card-2.png"
                            src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Problem-Animation/credit-card-2.png"
                            alt="Problem-Animation credit-card-2" title="Problem-Animation credit-card-2"
                            class="lazy credit-card-2">---->
						<img <?php echo _imgSrc($home_content,'problem_animation_image');?> class="credit-card-2">
                    </div>
                </div>
               <!--- <img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Problem-Animation/BG-Image-2.png"
                    src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Problem-Animation/BG-Image-2.png"
                    alt="Problem-Animation BG-Image-2" title="Problem-Animation BG-Image-2"
                    class="lazy Problem-img-bg-2">---->
				<img <?php echo _imgSrc($home_content,'animation_image_2');?> class="Problem-img-bg-2">
            </div>
        </div>
    </section>
    <!-- Problem End -->
    <!-- Solution Start -->
    <section class="Solution bg-no-repeat solution-section">
        <div class="container">
            <div class="row row-reverse">
                <div class="col">
                    <div class="phone-img">
                        <img <?php echo _imgSrc_Lazy($home_content,'the_solution_hand_image');?>>
                    </div>
                </div>
                <div class="col">
                    <div class="Solution-docs">
                        <h2 class="text-White fw-700">
                            <?php echo _isset($home_content,'the_solution_title');?>
                        </h2>
                        <h4 class="text-White fw-500">
                            <?php echo _isset($home_content,'the_solution_small_content');?>
                        </h4>

                    </div>
                    <div class="Solution-cards">
                        <div class="Solution-card">
                            <div class="Solution-card-img">
                                <img <?php echo _imgSrc_Lazy($home_content,'save_time_money_image');?>>
                            </div>
                            <div class="Solution-card-info bg-color-White text-Grey-white-bg fw-400">
                                <h4 class="fw-600 text-Dark-Grey">
                                    <?php echo _isset($home_content,'save_time_money_title');?>
                                </h4>
                                <?php echo _isset($home_content,'save_time_money_content');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <img data-src="assets/images/Animation/Solution-Animation/image-2.png" alt="Solution image 2"
            title="Solution image 2" class="lazy sa-img-2">
        <img data-src="assets/images/Animation/Solution-Animation/image-3.png" alt="Solution image 3"
            title="Solution image 3" class="lazy sa-img-3">
        <img data-src="assets/images/Animation/Solution-Animation/image-1.png" alt="Solution image 1"
            title="Solution image 1" class="lazy sa-img-1" id="sa-img-1"> -->
        <div class="Solution-Animation">
            <div class="Solution-Animation-info">
               <!--- <img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Solution-Animation/image-2.png"
                    src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Solution-Animation/image-2.png"
                    alt="Solution image 2" title="Solution image 2" class="lazy sa-img-2">---->
				<img <?php echo _imgSrc($home_content,'the_solution_background_image');?> class="sa-img-2">
                <div class="Solution-Animation-doc">
                    <div class="so-an-img">
                    </div>
                    <div class="sol-img">
                        <!---<img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Solution-Animation/image-1.png"
                            src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Solution-Animation/image-1.png"
                            alt="Solution image 1" title="Solution image 1" class="lazy sa-img-1" id="sa-img-1">--->
						<img <?php echo _imgSrc($home_content,'the_solution_animation_image');?> id="sa-img-1" class="sa-img-1">
                    </div>
                </div>
               <!--- <img data-src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Solution-Animation/image-3.png"
                    src="https://yash.tatsavijoshi.com/bespoke/assets/images/Animation/Solution-Animation/image-3.png"
                    alt="Solution image 3" title="Solution image 3" class="lazy sa-img-3">---->
					
				<img <?php echo _imgSrc($home_content,'hand_thumb_image');?> class="sa-img-3">
            </div>
        </div>
    </section>
    <!-- Solution End -->
    <!-- Protection Start -->
    <section class="protection bg-no-repeat bg-color-Light-Teal"
        style="background-image:url('<?php echo V_CDN_URL.$home_content['protection_your_business_image'][0]['urlPath'];?>');">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="phone-img">
                        <img <?php echo _imgSrc_Lazy($home_content,'protection_your_business_image');?>>
                    </div>
                </div>
                <div class="col">
                    <div class="Protection-docs fw-400">
                        <h2 class="text-Dark-Grey fw-700">
                            <?php echo _isset($home_content,'protection_your_business_title');?>
                        </h2>
                        <hr class="text-Teal">
						<div class="desktop">
							<?php echo _isset($home_content,'protection_your_business_content');?>
						</div>
						
						<div class="mobile">
							<div class="half_para">
								<?php echo _isset($home_content,'protection_your_business_content');?>
							</div>
							<div class="full_para">
								<?php echo _isset($home_content,'protection_your_business_content');?>
							</div>
						</div>
						<a  class="mob_read_more">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="Protection-Business">
            <div class="Protection-Business-docs owl-carousel owl-theme">
                <?php foreach($reviews as $ind => $val){ ?>
                <div class="Protection-Business-item">
                    <div class="Protection-Business-item-img">
                        <img <?php echo _imgSrc($val,'image');?>>
                    </div>
                    <div class="Protection-Business-item-info FW-600">
                        <h4 class="text-Dark-Grey">
                            <?php echo _isset($val,'title');?>
                        </h4>
                        <img <?php echo _imgSrc($val,'rating_image');?>>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Protection End -->
    <!--  Discover Start -->
    <section class="Discover bg-color-OffGrey">
        <div class="container">
            <img <?php echo _imgSrc_Lazy($home_content,'discover_bespoke_image','discover-pc');?>>
            <div class="row row-reverse">
                <div class="col">
                    <div class="phone-img">
                        <img <?php echo _imgSrc_Lazy($home_content,'discover_bespoke_image');?>>
                    </div>
                </div>
                <div class="col">
                    <div class="discover-docs ">
                        <h2 class="text-Dark-Grey fw-700">
                            <?php echo _isset($home_content,'discover_bespoke_title');?>
                        </h2>
                        <h3 class="text-Dark-Grey fw-600">
                            <?php echo _isset($home_content,'discover_bespoke_small_content');?>
                        </h3>
                        <div class="btn-Group">
                            <a href="<?php echo _isset($home_content,'learn_more_link');?>"
                                class="btn btn-bg"><?php echo _isset($home_content,'learn_more_title');?></a>
                            <a href="<?php echo _isset($home_content,'get_online_quote_link');?>"
                                class="btn btn-border"><?php echo _isset($home_content,'get_online_quote_title');?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discover End -->
    <!-- Comment Start -->
    <section class="bg-color-Teal Comment">
        <div class="Comment-top">
            <div class="container">
                <div class="Comment-top_Badge">
                    <div class="Badge">
                        <img <?php echo _imgSrc_Lazy($home_content,'over_15_industry_image');?>>
                    </div>
                    <div class="Comment-top_Badge-info">
                        <h4 class="fw-600 text-White"><?php echo _isset($home_content,'over_15_industry_title');?></h4>
                        <hr class="text-White">
                        <p class="fw-500 text-Light-Green-text-green-bg ">
                            <?php echo _isset($home_content,'over_15_industry_small_content');?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="Comment-bottom">
            <div class="container">
                <div class="Comment-row">
                    <div class="Comment-bottom-left  bg-no-repeat"
                        style="background-image: url(<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Comment/Coloured-BG.png)">
                        <div class="Comment-left-docs">
                            <div class="quote_img">
                                <img data-src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Comment/st.png" alt="st"
                                    title="st" class="lazy">
                            </div>
                            <h2 class="text-White">
                                <?php echo _isset($home_content,'once_you_become_title');?>
                            </h2>
                            <hr class="text-Teal">
                            <p class="fw-400 text-Grey-white-bg ">
                                <?php echo _isset($home_content,'once_you_become_left_content');?>
                            </p>
                        </div>
                    </div>
                    <div class="Allan-portrait">
                        <img <?php echo _imgSrc_Lazy($home_content,'once_you_become_man_image');?>>
                    </div>
                    <div class="Comment-bottom-right  bg-color-Light-Teal">
                        <div class="Comment-bottom-docs">
                            <div class="">
                                <img data-src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Comment/sb.png" alt="sb"
                                    title="sb" class="lazy">
                            </div>
                            <p class="fw-400 text-Dark-Grey">
                                <?php echo _isset($home_content,'once_you_become_right_content');?>
                            </p>
                            <div class="Signature">
                                <img <?php echo _imgSrc_Lazy($home_content,'once_you_become_signature_image');?>>
                            </div>
                            <div class="Signature-info text-Dark-Grey">
                                <?php echo _isset($home_content,'once_you_become_signature_content');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comment End -->
    <!-- Service Start -->
    <section class="Service bg-color-OffGrey">
        <div class="container">
            <div class="Service-title">
                <h2 class="text-Dark-Grey fw-700">
                    <?php echo _isset($home_content,'services_title');?>
                </h2>
            </div>
            <div class="Service-filter">
                <div class="Service-filter-title">
					
					<?php 
					$i = 0;
					foreach( $bespoke_insurance_services as $ind => $val ) {
						$act = '';
						$dis2 = 'none';
						if($i == 0){
							$act = 'active';
							$dis2 = 'block';
						}?>
						<div class="Service-filter-title-box <?php echo $act;?>" data-filter="itme-<?php echo $ind+1;?>">
							<h4 class="fw-600">
								<?php echo $val['title'];?>
							</h4>
							<span><?php echo $val['small_content'];?></span>
						</div>
						<div class=" Service-filter-ditel Service-filter-ditel-mob " >
							<div class="Service-filter-itme n_mobile itme-<?php echo $ind+1;?>" style="display:<?php echo $dis2;?>;">
								<!---<img data-src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/Service/service-image-1.png"
									class="lazy service-image">--->
								<!---<img <?php echo _imgSrc_Lazy($val,'image','service-image');?>>---->
								<img <?php echo _imgSrc($val,'image');?> class="service-image">
								<div class="sf-docs fw-500 text-White">
									<h2 class="fw-700">
										<?php echo $val['title'];?>
									</h2>
									<hr class="text-White">
									<p class="">
										<?php echo $val['content'];?>
									</p>
									<a href="/services/" class="btn btn-bg-Dark-Grey">View Services</a>
								</div>
							</div>
						</div>
					<?php $i++;
					} ?>                    
                    <div class="Service-filter-title-box see_all_services" data-filter="itme" data-url="services/">                        
						<h4 class="fw-600">
							See All Services
						</h4>
						<span>Click to see more</span>						
                    </div>                    
                </div>
				
                <div class="Service-filter-ditel Service-filter-ditel-pc"> 
					<?php 
					$j = 0;
					foreach( $bespoke_insurance_services as $ind => $val ) { 
					$dis = '';
					if($j == 0) {
						$dis = 'wing-in-top-bck';
					}?>
						<div class="Service-filter-itme <?php echo $dis;?> itme-<?php echo $ind+1;?>">
							<div class="Service-filter-itme-info">
								<img <?php echo _imgSrc($val,'image');?> class="service-image">

								<div class="sf-docs fw-500 text-White">
									<h2 class="fw-700">
										<?php echo $val['title'];?>
									</h2>
									<hr class="text-White">
									<p class="">
										<?php echo $val['content'];?>
									</p>
									<a href="/services/" class="btn btn-bg-Dark-Grey">View Services</a>
								</div>
							</div>
						</div>
					<?php $j++; 
					} ?>                    
                </div>
            </div>
        </div>
    </section>
    <!-- Service End -->
</main>

<!-- Home Page End -->



<?php include 'partials/_cta-bottom.php';?>



<?php include 'partials/_footer.php';?>