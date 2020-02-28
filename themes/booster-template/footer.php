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
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 header-bottom-icons">
                    <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/1.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>Free Delivery</span> <br> <span>in the UK</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 header-bottom-icons">
                    <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/2.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>30 Day Money-Back</span> <br> <span>Guarantee</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 header-bottom-icons">
                    <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/3.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>Five Bar Signal</span> <br> <span>Guarantee</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6 header-bottom-icons">
                    <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/4.png" alt="Mobile Booster Guarantee">
                    <div class="header-icons-span">
                        <span>Works On Every </span> <br> <span>Network & Carrier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
		<div class="row">

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
                    <div class="footer-title">
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
				<div class="footer-title">Subscribe</div>

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

					if (  $ins ) { ?>
					<a href="<?php echo $ins; ?>" target="_blank" rel="nofollow">
                        <img class="followUs"  src="<?php echo get_template_directory_uri() ?>/assets/img/instagram.png" alt="">
					</a>
					<?php }

					?>

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
                        <a href="https://https://www.paypal.com" target="_blank" rel="nofollow">
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/mc.png" alt="Mc">
                        </a>

                        <a href="https://www.visaeurope.com/" target="_blank" rel="nofollow">
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/visa.png" alt="Credit Card">
                        </a>

                        <a href="https://www.paypal.com" target="_blank" rel="nofollow">
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/maestro.png" alt="PayPal">
                        </a>

                        <a href="https://www.paypal.com" target="_blank" rel="nofollow">
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/am.png" alt="PayPal">
                        </a>

                        <a href="https://www.paypal.com" target="_blank" rel="nofollow">
                            <img class="footer-pay-icon" src="<?php echo get_template_directory_uri() ?>/assets/img/cus.png" alt="PayPal">
                        </a>

                        <a href="https://www.paypal.com" target="_blank" rel="nofollow">
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
<script>
    objectFitImages();
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/mobile-nav.js"></script>
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
