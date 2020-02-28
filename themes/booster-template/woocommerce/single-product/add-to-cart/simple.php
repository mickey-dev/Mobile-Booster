<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$providers = get_the_terms($product->id,'provider');
if ( ! $product->is_purchasable() ) {
	return;
}

?>



<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
//	 		if ( ! $product->is_sold_individually() ) {
//	 			woocommerce_quantity_input( array(
//	 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
//	 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
//	 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
//	 			) );
//	 		}
	 	?>
        <input type="hidden" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">

        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
        <div class="tax-info-all">
            <div class="tax-info-text">
                Providers Available:
            </div>
            <div class="tax-info">
            <?php if ($providers):?>
                <div class="providers tax">
                    <div class="slug">
                        <?php
                        $xx = '';
                        foreach ( $providers as $provider ) {
                            $xx .= ucwords($provider->slug) .' / ';
                        }

                        echo rtrim($xx,' /');

                        ?>
                    </div>
                </div>
            <?php endif; ?>
                <div class="tax-items">
                    <?php

                    if ($providers) {
                        foreach ($providers as $provider){
                            $icon_class = get_term_meta($provider->term_id, 'icon',true);
                            if ($icon_class){
                                echo '<i class="'.$icon_class.'" title="'. $provider->name .'"></i>';
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>

	 	<button type="submit" class="single_add_to_cart_button button primary-button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?>&nbsp;| &nbsp; <?php echo $product->get_price_html(); ?></button>

        <button type="submit" name="to_checkout" value="1" class="single_add_to_cart_button action-button to_checkout_button button alt">Proceed to checkout</button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
    <div class="shipping-text">
        <div class="col-sm-12 col-xs-12">
            <i class="mb-icon-free-delivery primary-color hidden"></i>
                <p><img src="<?php echo get_template_directory_uri() ?>/assets/img/truck icon.jpg" alt=""> Fast, Free Shipping. Arrives in 3-5 Working Days</p>
        </div>
    </div>
<?php endif; ?>
