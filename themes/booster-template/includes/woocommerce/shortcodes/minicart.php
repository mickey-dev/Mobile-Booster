<?php

function minicart_shortcode($atts,$content=null)
{
    $atts = shortcode_atts([
        'title' => false,
        'flush' => false
    ], $atts);

    $html = '';

    $html .= '<span class="minicart-wrapper">';
        $html .= '<span class="minicart">';

        $html .= '<i class="mb-icon-shopping_cart"></i>';

        if ($count = count(WC()->cart->get_cart())) {

            $html .= ' &nbsp; ';

            //$html .= count(WC()->cart->get_cart());
            $html .= '<span class="cart-contents-count">'. count(WC()->cart->get_cart()) .'</span>';

        }

        $html .= '</span>';
        if (wc_get_notices()) {
            $html .= '<span class="minicart_notice">';
            ob_start();
            do_action('woocommerce_single_product_minicart', $atts['flush']);
            $html .= ob_get_clean();
        }

    $html .= '</span>';


    return $html;
}

add_shortcode( 'minicart' , 'minicart_shortcode' );
