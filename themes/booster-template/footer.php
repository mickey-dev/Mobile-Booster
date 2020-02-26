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
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-4 first">
				<div class="bottom-logo">
					<a href="<?php echo home_url() ?>">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/mb-logo-white.png" alt="Mobile Booster Logo">
					</a>
				</div>
				<div class="contact">
					<ul>
						<?php 

						if ( $phone ) { ?>
							<li>
								<a href="tel:+<?= str_replace(["-", "–","_"], '', slugify( $phone )) ?>">
									<i class="fa fa-phone"></i><?php echo $phone; ?>
								</a>
							</li>
						<?php } 

						if ( $email ) { ?>
							<li>
								<a href="mailto:<?php echo $email; ?>">
									<i class="fa fa-envelope-o"></i><?php echo $email; ?>
								</a>
							</li>
						<?php }

						if ( $address ) { ?>
							<li><i class="fa fa-map-marker"></i> <?php echo $address; ?></li>
						<?php }

						?>
					</ul>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-2 second">
				<div class="title"><h4>Links</h4></div>
				<div class="links">
					<ul>
						<li><a href="<?php echo home_url(); ?>/about-us"><b>About Us</b></a></li>
						<li><a href="<?php echo home_url(); ?>/shop"><b>Go to Shop</b></a></li>
						<li><a href="<?php echo home_url(); ?>/#filter"><b>Find a Booster</b></a></li>
						<li><a href="<?php echo home_url(); ?>/product-category/accessories/"><b>Accessories</b></a></li>
						<li><a href="<?php echo home_url(); ?>/floor-plan-analysis/"><b>Floor Plan Analysis</b></a></li>
						<li><a href="<?php echo home_url(); ?>/mobile-signal-booster-installation-guide/"><b>Signal Booster Installation Guide</b></a></li>
					</ul>
				</div>
			</div>

			<div class="col-sm-12 visible-sm spacing"></div>

			<div class="col-xs-12 col-sm-6 col-md-2 third">
				<div class="title"><h4>Help & Support</h4></div>
				<div class="links">
					<ul>
						<li><a href="<?php echo home_url(); ?>/contact-us"><b>Contact Us</b></a></li>
						<li><a href="<?php echo home_url(); ?>/faq"><b>FAQs</b></a></li>
						<li><a href="<?php echo home_url(); ?>/returns-policy"><b>Return Policy</b></a></li>
						<li><a href="<?php echo home_url(); ?>/terms-and-condition"><b>Terms & Conditions</b></a></li>
						<li><a href="https://www.mobilebooster.co.uk/how-to-choose-right-mobile-signal-booster/"><b>Mobile Signal Booster Buyer's Guide</b></a></li>
					</ul>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-4 fourth">
				<div class="title"><h4>Subscribe</h4> Get latest updates and offers.</div>
				<div class="newsletter"><?php echo do_shortcode('[newsletter_form type="minimal"]'); ?></div>
				<div class="social">
					<h4>Follow us</h4>
					<?php

					if ( $fb ) { ?>
					<a href="<?php echo $fb; ?>" target="_blank" rel="nofollow">
						<svg width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg"><title>fb</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><path d="M24.885 11.123v2.715H23.27c-.59 0-.987.124-1.193.37-.205.247-.308.617-.308 1.11v1.944h3.012l-.4 3.044h-2.613v7.805H18.62v-7.804H16v-3.044h2.622v-2.24c0-1.276.357-2.265 1.07-2.968C20.405 11.35 21.354 11 22.54 11c1.008 0 1.79.04 2.345.123z" fill="#FFF"/><circle stroke="#FFF" cx="20" cy="20" r="20"/></g></svg>
					</a>
					<?php }

					if ( $tw ) { ?>
					<a href="<?php echo $tw; ?>" target="_blank" rel="nofollow">
						<svg width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg"><title>tw</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><path d="M28.613 14.602c-.47.69-1.04 1.276-1.708 1.76.007.1.01.247.01.443 0 .914-.133 1.826-.4 2.736-.267.91-.673 1.784-1.218 2.62-.544.836-1.192 1.576-1.944 2.22-.752.642-1.66 1.155-2.72 1.538-1.06.383-2.196.574-3.405.574-1.904 0-3.647-.51-5.228-1.528.246.028.52.042.822.042 1.58 0 2.99-.485 4.227-1.455-.74-.013-1.4-.24-1.983-.678-.583-.44-.983-1-1.2-1.682.23.035.445.053.642.053.3 0 .6-.04.895-.116-.787-.162-1.44-.553-1.956-1.175-.517-.622-.775-1.344-.775-2.166v-.043c.477.267.99.412 1.54.433-.465-.31-.834-.714-1.108-1.213-.274-.5-.41-1.04-.41-1.623 0-.618.153-1.19.463-1.718.85 1.047 1.885 1.885 3.104 2.514 1.22.63 2.524.978 3.916 1.05-.056-.268-.085-.528-.085-.78 0-.943.332-1.746.997-2.41.664-.664 1.466-.996 2.408-.996.984 0 1.813.358 2.488 1.075.766-.147 1.486-.42 2.16-.822-.26.808-.758 1.434-1.496 1.876.653-.07 1.307-.247 1.96-.528z" fill="#FFF"/><circle stroke="#FFF" cx="20" cy="20" r="20"/></g></svg>
					</a>
					<?php }

					if (  $ins ) { ?>
					<a href="<?php echo $ins; ?>" target="_blank" rel="nofollow">
						<svg width="42" height="42" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg"><title>ig</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><path d="M26.187 25.52v-6.75H24.78c.14.438.21.893.21 1.365 0 .875-.223 1.683-.667 2.422-.445.74-1.05 1.325-1.813 1.756-.763.43-1.597.645-2.5.645-1.368 0-2.538-.47-3.51-1.41-.972-.942-1.458-2.08-1.458-3.413 0-.472.07-.927.208-1.364h-1.47v6.75c0 .18.062.332.184.454.12.12.272.182.453.182h11.135c.174 0 .323-.06.448-.182s.187-.273.187-.453zm-2.958-5.55c0-.862-.315-1.597-.944-2.204-.628-.608-1.387-.912-2.276-.912-.882 0-1.637.304-2.265.912-.63.607-.943 1.342-.943 2.203 0 .86.314 1.594.943 2.202.628.608 1.383.91 2.265.91.89 0 1.648-.302 2.276-.91.63-.608.943-1.342.943-2.203zm2.957-3.75V14.5c0-.194-.07-.363-.208-.505-.14-.143-.31-.214-.51-.214h-1.814c-.2 0-.37.072-.51.215-.14.142-.21.31-.21.505v1.72c0 .2.07.37.21.51.14.138.31.208.51.208h1.813c.2 0 .37-.07.51-.21.138-.138.207-.308.207-.51zM28 14.05v11.896c0 .562-.2 1.045-.604 1.448-.403.403-.886.604-1.448.604H14.052c-.562 0-1.045-.2-1.448-.604-.403-.403-.604-.886-.604-1.448V14.052c0-.562.2-1.045.604-1.448.403-.403.886-.604 1.448-.604h11.896c.562 0 1.045.2 1.448.604.403.403.604.886.604 1.448z" fill="#FFF"/><circle stroke="#FFF" cx="20" cy="20" r="20"/></g></svg>
					</a>
					<?php }

					?>
                    <a href="https://www.linkedin.com/company/mobilebooster/" target="_blank" rel="nofollow">
                        <svg viewBox="0 0 512 512" style="border-radius:50%; border: 1px solid #fff;"><title>in</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd">
                            <path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z" fill="#FFF"/><circle stroke="#FFF" cx="20" cy="20" r="20"/></g>
                        </svg>
                    </a>
                    <a href="https://www.pinterest.co.uk/mobileboosters/" target="_blank" rel="nofollow">
                        <svg viewBox="0 0 512 512" style="border-radius:50%; border: 1px solid #fff;"><title>p</title><g transform="translate(1 1)" fill="none" fill-rule="evenodd">
                            <path d="M266.6 76.5c-100.2 0-150.7 71.8-150.7 131.7 0 36.3 13.7 68.5 43.2 80.6 4.8 2 9.2 0.1 10.6-5.3 1-3.7 3.3-13 4.3-16.9 1.4-5.3 0.9-7.1-3-11.8 -8.5-10-13.9-23-13.9-41.3 0-53.3 39.9-101 103.8-101 56.6 0 87.7 34.6 87.7 80.8 0 60.8-26.9 112.1-66.8 112.1 -22.1 0-38.6-18.2-33.3-40.6 6.3-26.7 18.6-55.5 18.6-74.8 0-17.3-9.3-31.7-28.4-31.7 -22.5 0-40.7 23.3-40.7 54.6 0 19.9 6.7 33.4 6.7 33.4s-23.1 97.8-27.1 114.9c-8.1 34.1-1.2 75.9-0.6 80.1 0.3 2.5 3.6 3.1 5 1.2 2.1-2.7 28.9-35.9 38.1-69 2.6-9.4 14.8-58 14.8-58 7.3 14 28.7 26.3 51.5 26.3 67.8 0 113.8-61.8 113.8-144.5C400.1 134.7 347.1 76.5 266.6 76.5z"fill="#FFF"/><circle stroke="#FFF" cx="20" cy="20" r="20"/></g>
                        </svg>
                    </a>
				</div>
				<div class="payment-icon">
					<a href="https://www.paypal.com" target="_blank" rel="nofollow">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/logo-paypal.png" alt="PayPal">
					</a>

					<a href="https://www.visaeurope.com/" target="_blank" rel="nofollow">
						<img class="combine1 sprite-logo-visa" src="<?php echo get_template_directory_uri() ?>/assets/img/combine1.png" alt="Credit Card">
					</a>
				</div>
			</div>

			<?php

			if ( theme_option( 'copyright_text' ) ) { ?>

				<div class="col-xs-12 col-sm-12 copyright text-center">
					<?php echo theme_option( 'copyright_text' ) ?>
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
