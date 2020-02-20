<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container-fluid white-bg main-content">
        <?php
            /**
             * woocommerce_before_single_product_summary hook.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
        ?>
        <div class="col-xs-12 col-sm-6 col-md-5 right">
						<div class="col-xs-12 col-sm-12 product-title">
							<?php the_title( '<h1 itemprop="name" class="product_title entry-title">', '</h1>' ); ?>
						</div>
            <div class="col-xs-12 no-padding">
                <?php do_action( 'product_taxonomy_information' ); ?>
            </div>
            <div class="col-xs-12 col-sm-12 summary entry-summary">

                <?php
                    /**
                     * woocommerce_single_product_summary hook.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action( 'woocommerce_single_product_summary' );
                ?>

            </div><!-- .summary -->
        </div>
    </div>
    <div class="container-fluid after-content">
			<div class="col-xs-12 col-sm-12 col-md-12 additional-info">
			<?php
					/**
					 * woocommerce_after_single_product_summary hook.
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					woocommerce_output_product_data_tabs()
					//do_action( 'woocommerce_after_single_product_summary' );
			?>
			</div>

			<?php if ($content = theme_option('why_chose_us')): ?>
	        <div class="col-xs-12 col-sm-12 col-md-7 why-chose-us">
	            <h3>Features and Benefit</h3>
	            <?= do_shortcode($content) ?>
	        </div>
	    <?php endif; ?>
	    <?php if($pack = get_post_meta($post->ID,'package_includes',true)): ?>
	        <div class="col-xs-12 col-sm-12 col-md-5 package-includes">
	            <h3>What's in The Box</h3>
	            <?= do_shortcode($pack) ?>
	        </div>
	    <?php endif; ?>

    </div>

    <div class="container-fluid installation-wrapper">

		<?php how_it_works(); ?>
		
    </div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
