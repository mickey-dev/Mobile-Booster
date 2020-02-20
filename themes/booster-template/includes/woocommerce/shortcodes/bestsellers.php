<?php

/**

 * Created by PhpStorm.

 * User: Vanand Mkrtchyan

 * bestsellers

 */

function bestsellers_shortcode($atts, $content=null){

    $atts = shortcode_atts([
        'per_page'      => '4',
        'columns'       => '4',
        'title'       => false,
        'class'         => null,
        'shop_button'   => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => array( 'accessories', 'signal-booster-cable' ),
                'operator' => 'NOT IN'
            )
        ),
    ],$atts);



    if(!class_exists('WC_Shortcodes')) return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Class \'WC_Shortcodes\' not found".</div><div class="alert alert-warning" role="alert"><strong>Hint!</strong> Please install and activate Woocommerce plugin to see the full funcionality of theme.</div>';



    $atts['class'] = ($atts['class']) ? ' '.$atts['class'] : '' ;

    $button = ($atts['shop_button']) ? '<div class="text-center col-xs-12 nopadding"><a class="btn info-button" href="'. esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ).'">'.__( 'View All Products', 'woocommerce' ) .'</a></div>' : '' ;

    $html = '<div class="mobile_providers'.$atts['class'].'">';

    $html.= ($atts['title']) ? '<h2 class="title">'. $atts['title'] .'</h2>' : '' ;
    $html.= '<div class="widget-content">';

    $html .= SmartBoosters::best_selling_products($atts);

    $html .= $button;
    $html .= '</div>';

    $html .= '</div>';



    return $html;

}

add_shortcode( 'bestsellers' , 'bestsellers_shortcode' );