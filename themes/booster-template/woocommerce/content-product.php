<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php if(is_product_category('accessories')): ?>
<?php else: ?>
    <?php
    $class = [
        'list',
        'booster'
    ];

    ?>
    <li <?php post_class($class); ?>>

        <div class="container-fluid">
            <?php
            woocommerce_show_product_loop_sale_flash();
            ?>
            <div class="col-xs-12 col-sm-12 no-padding-left product-name">
                <?php
                woocommerce_template_loop_product_link_open();
                woocommerce_template_loop_product_title();
                woocommerce_template_loop_product_link_close();
                ?>
            </div>

            <?php woocommerce_get_product_list_details(); ?>

            <div class="col-xs-12 col-sm-12 no-padding-left image">
                <?php
                woocommerce_template_loop_product_link_open();
                woocommerce_template_loop_product_thumbnail();
                woocommerce_template_loop_product_link_close();
                ?>
            </div>

            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>

            <div class="col-xs-12 col-sm-12 no-padding-right product-action">
                <div class="col-xs-12 nopadding">
                    <?php woocommerce_template_loop_add_to_cart() ?>
                </div>
            </div>
        </div>

    </li>
<?php endif; ?>

