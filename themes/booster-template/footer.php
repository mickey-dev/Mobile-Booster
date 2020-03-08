<?php 
$taxs = get_query_var( 'taxonomy' );
if ($taxs=='provider'){

} elseif ($taxs=='frequency'){

} elseif ($taxs=='coverage'){

} elseif (get_the_title()=='Contact us'){

}else{
//    get_page_title();
}
// Redux
global $redux_demo;
$phone = theme_option( 'phone_number' );
$email = theme_option( 'imel' );
$address = theme_option( 'address' );
$fb = theme_option( 'fb' );
$tw = theme_option( 'tw' );
$ins= theme_option( 'ins' );

?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="row guarantee">
        <div class="header-bottom">
            <div class="container">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 header-bottom-icons">
                    <img class="sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/1.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span ">
                        <span>Free Delivery</span> <br> <span>in the UK</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 header-bottom-icons">
                    <img class="sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/2.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>30 Day Money-Back</span> <br> <span>Guarantee</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 header-bottom-icons">
                    <img class="sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/3.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>Five Bar Signal</span> <br> <span>Guarantee</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-6 header-bottom-icons">
                    <img class="sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/4.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>Works On Every </span> <br> <span>Network & Carrier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
		<div class="row footer-blue">

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 second">
				<div class="footer-title">Useful Information</div>
				<div class="links">
					<ul>
						<li><a href="<?php echo home_url(); ?>/about-us"><b>About Us</b></a></li>
						<li><a href="<?php echo home_url(); ?>/shop"><b>Go to Shop</b></a></li>
						<li><a href="<?php echo home_url(); ?>/#filter"><b>Find a Booster</b></a></li>
						<li><a href="<?php echo home_url(); ?>/product-category/accessories/"><b>Accessories</b></a></li>
						<li><a href="<?php echo home_url(); ?>/floor-plan-analysis/"><b>Floor Plan Analysis</b></a></li>
						<li><a href="<?php echo home_url(); ?>/mobile-signal-booster-installation-guide/"><b>Installation Guide</b></a></li>
					</ul>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 third">
				<div class="footer-title">Help & Support</div>
				<div class="links">
					<ul>
						<li><a href="<?php echo home_url(); ?>/contact-us"><b>Contact Us</b></a></li>
						<li><a href="<?php echo home_url(); ?>/faq"><b>FAQs</b></a></li>
						<li><a href="<?php echo home_url(); ?>/returns-policy"><b>Return Policy</b></a></li>
						<li><a href="<?php echo home_url(); ?>/terms-and-condition"><b>Terms & Conditions</b></a></li>
						<li><a href="https://www.mobilebooster.co.uk/how-to-choose-right-mobile-signal-booster/"><b>Buyer's Guide</b></a></li>
					</ul>
				</div>
			</div>

            <div class="col-sm-12 visible-sm spacing"></div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 first">
                <div class="contact">
                    <div class="footer-title footer-title-next">
                    Contact Us</div>
                   <ul>
                        <?php

                        if ( $phone ) { ?>
                            <li>
                                <a href="tel:+<?= str_replace(["-", "–","_"], '', slugify( $phone )) ?>">
                                    <?php echo $phone; ?>
                                </a>
                            </li>
                        <?php }

                        if ( $email ) { ?>
                            <li>
                                <a href="mailto:<?php echo $email; ?>">
                                    <?php echo $email; ?>
                                </a>
                            </li>
                        <?php }

//                        if ( $address ) { ?>
<!--                            <li>-->
<!--                                 --><?php //echo $address; ?>
<!--                            </li>-->
<!--                        --><?php //}
//
//                        ?>

                       <li>
                           59 The Drive Hove, East Sussex, BN3 3Pf, United Kingdom
                       </li>
                    </ul>
                </div>
            </div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 fourth">
                <img  class="message" src="<?php echo get_template_directory_uri() ?>/assets/img/message.jpg" alt="">
				<div class="footer-title footer-title-next">Subscribe</div>

				<div class="newsletter"><?php echo do_shortcode('[newsletter_form type="minimal" button=" "]'); ?></div>
				<div class="social">

                    <h4>Follow us</h4>

					<?php

					if ( $fb ) { ?>
					<a href="<?php echo $fb; ?>" target="_blank" rel="nofollow">
                        <img class="followUs"  src="<?php echo get_template_directory_uri() ?>/assets/img/fb.png" alt="">
					</a>
					<?php }

					if ( $tw ) { ?>
					<a href="<?php echo $tw; ?>" target="_blank" rel="nofollow">
                        <img class="followUs"  src="<?php echo get_template_directory_uri() ?>/assets/img/twitter.png" alt="">
					</a>
					<?php }

					if ( $ins ) { ?>
					<a href="<?php echo $ins; ?>" target="_blank" rel="nofollow">
                        <img class="followUs"  src="<?php echo get_template_directory_uri() ?>/assets/img/instagram.png" alt="">
					</a>
					<?php }

					?>
                    <a href="https://www.linkedin.com/company/mobilebooster/" target="_blank" rel="nofollow">
                        <svg viewBox="0 0 512 512" style="border-radius:50%; border: 1px solid #fff;background: #ffffff"><title></title><g transform="translate(1 1)" fill="none" fill-rule="evenodd">
                                <path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z" fill="#10293b"/><circle stroke="#10293b" cx="20" cy="20" r="20"/></g>
                        </svg>
                    </a>
                    <a href="https://www.pinterest.co.uk/mobileboosters/" target="_blank" rel="nofollow">
                        <svg viewBox="0 0 512 512" style="border-radius:50%; border: 1px solid #fff;background: #ffffff;"><title></title><g transform="translate(1 1)" fill="none" fill-rule="evenodd">
                                <path d="M266.6 76.5c-100.2 0-150.7 71.8-150.7 131.7 0 36.3 13.7 68.5 43.2 80.6 4.8 2 9.2 0.1 10.6-5.3 1-3.7 3.3-13 4.3-16.9 1.4-5.3 0.9-7.1-3-11.8 -8.5-10-13.9-23-13.9-41.3 0-53.3 39.9-101 103.8-101 56.6 0 87.7 34.6 87.7 80.8 0 60.8-26.9 112.1-66.8 112.1 -22.1 0-38.6-18.2-33.3-40.6 6.3-26.7 18.6-55.5 18.6-74.8 0-17.3-9.3-31.7-28.4-31.7 -22.5 0-40.7 23.3-40.7 54.6 0 19.9 6.7 33.4 6.7 33.4s-23.1 97.8-27.1 114.9c-8.1 34.1-1.2 75.9-0.6 80.1 0.3 2.5 3.6 3.1 5 1.2 2.1-2.7 28.9-35.9 38.1-69 2.6-9.4 14.8-58 14.8-58 7.3 14 28.7 26.3 51.5 26.3 67.8 0 113.8-61.8 113.8-144.5C400.1 134.7 347.1 76.5 266.6 76.5z"fill="#10293b"/><circle stroke="#FFF" cx="20" cy="20" r="20"/></g>
                        </svg>
                    </a>

				</div>

			</div>

		</div>
	</div>

    <div class="footer-bottom container-fluid">
        <div class="container">
            <?php

            if ( theme_option( 'copyright_text' ) ) { ?>

                <div class="col-xs-12 col-sm-12 copyright text-center">
                    <?php echo theme_option( 'copyright_text' ) ?>
                    <div class="payment-icon">
                        <a>
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/mc.png" alt="Mc">
                        </a>

                        <a>
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/visa.png" alt="Credit Card">
                        </a>

                        <a>
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/maestro.png" alt="PayPal">
                        </a>

                        <a>
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/am.png" alt="PayPal">
                        </a>

                        <a>
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/cus.png" alt="PayPal">
                        </a>

                        <a>
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/paypal.png" alt="PayPal">
                        </a>
                    </div>
                </div>

            <?php }

            ?>
        </div>
    </div>
</footer>

<?php wp_footer() ?>

<?= theme_option('ga_tracking_script') ?>

<?= theme_option('chat_script') ?>

<?= theme_option('ab_testing_script') ?>

<?= theme_option('custom_script') ?>

<?= theme_option('ga_script') ?>
<script src='https://www.mobilebooster.co.uk//wp-content/plugins/easy-social-share-buttons3/assets/js/essb-core.min.js?ver=6.2.9'></script>
<script src='https://www.mobilebooster.co.uk//wp-content/plugins/easy-social-share-buttons3/assets/admin/sweetalert.min.js?ver=5.3.2'></script>
<script src='https://www.mobilebooster.co.uk//wp-content/plugins/easy-social-share-buttons3/lib/modules/live-customizer/assets/essb-live-customizer.js?ver=5.3.2'></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/owl.carousel.min.js"></script>
<!-- <script type="text/javascript" src="<?php// echo home_url() ?>/wp-content/plugins/simple-responsive-slider/assets/js/responsiveslides.min.js"></script>
 -->
<script>
	jQuery(document).ready(function(){
		jQuery('.sgr-custom-taxonomies-menu h4').click(function(){
			jQuery(this).next('ul').slideToggle('fast');
		});

		jQuery('.home .products .featured a:last-child').contents().filter(function() {
		    return this.nodeType == 3
		}).each(function(){
		    this.textContent = this.textContent.replace('PRODUCT DETAILS','VIEW PRODUCT');
		});

		jQuery('.single_add_to_cart_button').contents().filter(function() {
		    return this.nodeType == 3
		}).each(function(){
		    this.textContent = this.textContent.replace('Add to basket','Add to cart');
		});


	});
</script>


</body>
</html>
