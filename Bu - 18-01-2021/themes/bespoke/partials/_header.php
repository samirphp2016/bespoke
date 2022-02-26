<?php

    $header_settingsArr = array();
	$header_settings = header_settings::get_data($header_settingsArr);
    if(count($header_settings)){
        $header_settings = $header_settings[0];
    }
	

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if(isset($meta_title) && !empty($meta_title)) { echo $meta_title;}?></title>
    <meta name="title" content="<?php if(isset($meta_title) && !empty($meta_title)) { echo $meta_title;}?>">
    <meta name="description" content="<?php if(isset($meta_description) && !empty($meta_description)) { echo $meta_description;}?>">
    <meta name="keyword" content="<?php if(isset($meta_keyword) && !empty($meta_keyword)) { echo $meta_keyword;}?>">
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php if(isset($meta_url) && !empty($meta_url)) { echo $meta_url;}?>">
    <meta property="og:title" content="<?php if(isset($meta_title) && !empty($meta_title)) { echo $meta_title;}?>">
    <meta property="og:description" content="<?php if(isset($meta_description) && !empty($meta_description)) { echo $meta_description;}?>">
    <meta property="og:image" content="<?php if(isset($meta_image) && !empty($meta_image)) { echo $meta_image;}?>">
    <meta property="twitter:card" content="summary_large_image">
    
    <meta property="twitter:url" content="<?php if(isset($meta_url) && !empty($meta_url)) { echo $meta_url;}?>">
    <meta property="twitter:title" content="<?php if(isset($meta_title) && !empty($meta_title)) { echo $meta_title;}?>">
    <meta property="twitter:description" content="<?php if(isset($meta_description) && !empty($meta_description)) { echo $meta_description;}?>">
    <meta property="twitter:image" content="<?php if(isset($meta_image) && !empty($meta_image)) { echo $meta_image;}?>">
    <!-- Favicon Ico -->
    <link rel="shortcut icon" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/images/favicon/favicon.ico" type="image/x-icon" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/reset.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/owl.carousel.min.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/all.css" />
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/fonts.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/style.css" />
    <!-- Media CSS -->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/media.css" />
    <!----<link rel="stylesheet" href="assets/css/style_kalpesh.css" />----->
    <link rel="stylesheet" href="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/css/animation.css" />
</head>

<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <a href="/" class="logo">
                    <img <?php echo _imgSrc($header_settings,'site_logo');?>>
                </a>
            </div>
            <div class="site-header__middle">
                <div class="header-mob">
                    <a href="/" class="logo logo-mob">
                        <img <?php echo _imgSrc($header_settings,'site_logo');?>>
                    </a>
                    <button class="nav_circle btn" aria-expanded="false" type="button">
                        <i class="fa fa-times fa-2x"></i>

                    </button>
                </div>

                <nav class="nav">

                    <ul class="nav__wrapper">
                        <li class="nav__item"><a href="<?php echo _isset($header_settings,'home_link');?>"><?php echo _isset($header_settings,'home_title');?></a></li>
                        <li class="nav__item"><a href="<?php echo _isset($header_settings,'discover_bespokev_link');?>"><?php echo _isset($header_settings,'discover_bespokev_tiltle');?></a></li>
                        <li class="nav__item"><a href="<?php echo _isset($header_settings,'services_link');?>"><?php echo _isset($header_settings,'services_title');?></a></li>
                        <li class="nav__item"><a href="<?php echo _isset($header_settings,'community_foundations_link');?>"><?php echo _isset($header_settings,'community_foundations_title');?></a></li>
                        <li class="nav__item"><a href="<?php echo _isset($header_settings,'claims_link');?>"><?php echo _isset($header_settings,'claims_title');?></a></li>
                        <li class="nav__item"><a href="<?php echo _isset($header_settings,'contact_us_link');?>"><?php echo _isset($header_settings,'contact_us_title');?></a></li>
                    </ul>
                </nav>
                <div class="btn-Group">
                    <a href="<?php echo _isset($header_settings,'speak_to_an_expert_link');?>" class="btn btn-border"><?php echo _isset($header_settings,'speak_to_an_expert_title');?></a>
                    <a href="<?php echo _isset($header_settings,'get_online_quote_link');?>" class="btn btn-bg"><?php echo _isset($header_settings,'get_online_quote_title');?></a>
                </div>
            </div>
            <div class="site-header__end">
                <button class="nav__toggle btn" aria-expanded="false" type="button">
                    <i class="fas fa-bars fa-2x"></i>
                </button>
            </div>
        </div>
    </header>
    <!-- Header End -->