<?php

    $footer_settingsArr = array();
	$footer_settings = footer_settings::get_data($footer_settingsArr);
    if(count($footer_settings)){
        $footer_settings = $footer_settings[0];
    }

    $main_menu = array(
        'quick_links' => 'Quick Links',
        'our_services' => 'Our Services',
        'discover_bespoke' => 'Discover Bespoke Insurance Group',
        'support' => 'Support'
        );
    $footer_menu_array = array();
    foreach($main_menu as $ind => $val){
        /* Footer Menu  Record Start*/
        $footer_menuArr = array('orderBy' => 'num ASC','where' => "`select_menu` = '".$ind."' ");
        $footer_menu = footer_menu::get_data($footer_menuArr);
        /* Footer Menu  Record  End*/
        $footer_menu_array[$ind] = $footer_menu;
        $footer_menu_array[$ind]['main_menu'] = $val;
    }

?>

<!-- Footer Start -->
<footer>
    <div class="footer-top bg-color-Dark-Grey">
        <div class="container">
            <div class="foot-logo">
                <a href="/">
                    <img <?php echo _imgSrc_Lazy($footer_settings,'site_logo');?>>
                </a>
            </div>
            <hr class="text-Teal">
            <div class="row">
                <?php foreach($footer_menu_array as $ind => $val){ ?>
                <div class="col">
                    <p data-filter="<?php echo $ind; ?>" class="foo-menu-title">
                        <span> <?php echo _isset($val,'main_menu');?></span> <i class="fa fa-angle-down"></i>
                    </p>
                    <div class="foo-menu <?php echo $ind; ?>">
                        <ul>
                            <?php foreach($val as $subind => $subval){ ?>
                            <li><a href="<?php echo _isset($subval,'link');?>"><?php echo _isset($subval,'title');?></a></li>
                            <?php } ?>
                            <!-- <li><a href="#">About Bespoke</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Contact Us</a></li> -->
                        </ul>
                    </div>
                </div>
                <?php } ?>
                <!-- <div class="col">
                    <p data-filter="Our-Services" class="foo-menu-title">
                        <span> Our Services </span> <i class="fa fa-angle-down"></i>

                    </p>
                    <div class="foo-menu Our-Services">
                        <ul>
                            <li><a href="#">Risk Profiling Services</a></li>
                            <li><a href="#">Annual Review</a></li>
                            <li><a href="#">Endorsements</a></li>
                            <li><a href="#">Claims</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <p data-filter="Discover-Bespoke" class="foo-menu-title">
                        <span> Discover Bespoke Insurance Group</span> <i class="fa fa-angle-down"></i>
                    </p>
                    <div class="foo-menu Discover-Bespoke">
                        <ul>
                            <li><a href="#">About Bespoke </a></li>
                            <li><a href="#">Communities We Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <p data-filter="Support" class="foo-menu-title">
                        <span> Support</span> <i class="fa fa-angle-down"></i>
                    </p>
                    <div class="foo-menu Support">
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Get Online Quote</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policies</a></li>
                        </ul>

                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="foot-bot">
        <div class="container">
            <div class="Copyright">
                <ul>
                    <li><?php echo _isset($footer_settings,'copyright');?> </li>
                    <li><?php echo _isset($footer_settings,'bespoke_insurance_group');?> </li>
                    <li><?php echo _isset($footer_settings,'all_rights_reserved');?></li>
                </ul>
                <a href="<?php echo _isset($footer_settings,'aiims_link');?>">
                    <img <?php echo _imgSrc_Lazy($footer_settings,'aiims_logo');?>>
                </a>
            </div>
        </div>
    </div>
</footer>
<!--  Footer End -->
<!-- Jquery Js  -->
<script src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/js/jquery.min.js"></script>
<!-- owl Carousel Js  -->
<script src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/js/owl.carousel.min.js"></script>
<!-- Instant Page 5.1.0 Js  -->
<script src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/js/instant-page.5.1.0.js"></script>
<!-- Index Js  -->
<script src="<?php echo V_CDN_URL.V_THEME_DIR;?>assets/js/index.js"></script>
<!-- Script Js Start -->
<script>
$(document).ready(function() {
    var Brand__list = $(".Brand__list-logo");
    Brand__list.owlCarousel({
        nav: false,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 20000,
        responsive: {
            0: {
                margin: 20,
                items: 1,
                autoWidth: false,
            },
            700: {
                items: 3,
                autoWidth: false,
                margin: 50,
            },
            1200: {
                margin: 80,
                items: 6,
            },
            1800: {
                margin: 103,
                autoWidth: true,
            },
        }
    });
    var Protection__Business = $(".Protection-Business-docs");
    Protection__Business.owlCarousel({
        nav: false,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 20000,
        margin: 22,
        autoWidth: true,
        /* center: true, */

    });
    /* $(window).scrollTop();
    console.log($(window).scrollTop( ));
        $(window).scroll(function() {
            var positiontop = $(document).scrollTop()
            if ((positiontop => 1632) && (positiontop <= 2346)) {
                console.log($(window).scrollTop());
                // $("#sa-img-1").css("bottom", "100%")
            }

        }) */
});
</script>
<!-- Script Js End -->

</body>

</html>