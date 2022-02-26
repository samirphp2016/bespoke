<?php

    $business_or_home_todayArr = array();
	$business_or_home = protect_your_business_or_home_today::get_data($business_or_home_todayArr);
    if(count($business_or_home)){
        $business_or_home = $business_or_home[0];
    }
	

?>

<!-- CTA Bottom Start -->

<div class="cta-bottom">
    <h2 class="text-White fw-700">
        <?php echo _isset($business_or_home,'title');?>
    </h2>
    <h3 class="fw-600 text-White"><?php echo _isset($business_or_home,'small_title');?></h3>
    <div class="btn-Group">
        <a href="<?php echo _isset($business_or_home,'speak_to_an_expert_link');?>" class="btn btn-bg"><?php echo _isset($business_or_home,'speak_to_an_expert_title');?></a>
        <a href="<?php echo _isset($business_or_home,'get_online_quote_link');?>" class="btn btn-border"><?php echo _isset($business_or_home,'get_online_quote_title');?></a>
        <a href="<?php echo _isset($business_or_home,'contact_us_link');?>" class="btn btn-border"><?php echo _isset($business_or_home,'contact_us_title');?></a>
    </div>
</div>

<!-- CTA Bottom End -->