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

    <div class="container white-bg main-content">
        <?php
            /**
             * woocommerce_before_single_product_summary hook.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
        ?>
        <div class="product-right col-xs-12 col-sm-6 col-md-5 right">
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
        <div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 additional-info">
                <div class="product-description">
                    Product Description
                </div>
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
    </div>

    <div class="container-fluid installation-wrapper">

		<?php how_it_works(); ?>
		
    </div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->
<section id="home_featured">
    <div class="container">
        <div class="">
            <div class="col-xs-12 col-sm-12 home_featured title">
                <h2 class="text-center">Similar Products</h2>
                <div class="featured-items owl-theme owl-carousel">
                    <?php
                    $args = array( 'post_type' => 'product', 'meta_key' => '_featured','posts_per_page' => 12,'columns' => '4', 'meta_value' => 'yes' );
                    $loop = new WP_Query( $args );

                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                        <div class="featured-item product type-product status-publish has-post-thumbnail provider-vodafone provider-o2-mobile provider-id provider-ee provider-3g provider-4g provider-three coverage-up-to-1000-sqm frequency-90018002100mhz tm-has-options last instock sale featured shipping-taxable purchasable product-type-simple">

                            <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" class="woocommerce-LoopProduct-link">

                                <!--              <span class="onsale1">-->
                                <!--                --><?php //woocommerce_show_product_sale_flash( $post, $product ); ?>
                                <!--              </span>-->

                                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" class="attachment-shop_catalog size-shop_catalog wp-post-image" />'; ?>

                                <h3><?php the_title(); ?></h3>
                            </a>

                            <?php
                            global $product;
                            $providers = get_the_terms($product->id,'provider');
                            $coverages = get_the_terms($product->id,'coverage');
                            $frequencies = get_the_terms($product->id,'frequency');
                            ?>
                            <div class="featured-details">
                                <div class="coverages col-xs-12 no-padding">
                                    <i class="icon-wifi-img meta-icon"></i>
                                    <span class="meta_prodtitle">Coverage:</span>
                                    <?php
                                    if ($coverages) {
                                        foreach ($coverages as $coverage){
                                            echo '<div class="meta-name">';
                                            echo '<span>';
                                            echo $coverage->name;
                                            echo '</span>';
                                            echo '</div>';
                                        }
                                    }

                                    ?>
                                </div>

                                <div class="coverages col-xs-12 no-padding">
                                    <?php
                                    if ($coverages) {
                                        foreach ($coverages as $coverage){
                                            $icon_class = get_term_meta($coverage->term_id, 'icon',true);
                                            echo '<i class="'.$icon_class.' meta-icon"></i>';
                                            echo '<span class="meta_prodtitle">Ideal for:</span>';
                                            echo '<div class="meta-name">';
                                            echo '<span>';
                                            echo get_term_meta($coverage->term_id, 'alt_name',true);
                                            echo '</span>';
                                            echo '</div>';
                                        }
                                    }

                                    ?>
                                </div>

                                <div class="providers col-xs-12 no-padding">
                                    <div class="meta-prov-title">Providers:</div>
                                    <?php
                                    echo '<div class="providers_wrapper">';
                                    if ($providers) {
                                        foreach ( $providers as $provider ){
                                            echo '<span class="provider">';
                                            $icon_class = get_term_meta($provider->term_id, 'icon',true);
                                            if ($icon_class){
                                                echo '<i class="'.$icon_class.'" title="'. $provider->name .'"></i>';
                                            }
                                            echo '</span>';
                                        }
                                    }

                                    echo '</div>';
                                    ?>
                                </div>
                            </div>
                            <div class="featured-actions">
                                <span class="price"><?php echo $product->get_price_html(); ?></span>
                                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="button button-filled">Product Details</a>
                            </div>

                        </div>
                        <?php
                        ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php do_action( 'woocommerce_after_single_product' ); ?>
