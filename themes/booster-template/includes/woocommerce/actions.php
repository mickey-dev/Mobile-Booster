<?php

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
add_action('woocommerce_before_single_product_summary','woocommerce_template_single_title',5);


remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
add_action('woocommerce_before_add_to_cart_button','woocommerce_template_single_price',60);




remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
add_action('woocommerce_before_shop_loop','woocommerce_get_product_list_header',40);

function woocommerce_get_product_list_details(){
    return wc_get_template('loop/list-details.php');
}
function woocommerce_get_product_grid_details(){
    return wc_get_template('loop/grid-details.php');
}
function woocommerce_get_product_list_header(){
    return wc_get_template('loop/list-header.php');
}



add_action('product_taxonomy_information', 'product_tax_info',10);

function product_tax_info(){
    return wc_get_template('single-product/taxonomy-info.php');
}

function link_to_installation_guide(){
    echo '<div class="link-to-installation-guide">';
    echo '<a href="'. home_url() .'/installation-guide" target="_blank"><i class="mb-icon mb-icon-file-pdf"></i>Installation Guide</a>';
    echo '</div>';
}

add_action('woocommerce_after_add_to_cart_form','link_to_installation_guide',30);
//remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);

function add_to_cart_redirect_checkout() {
    if (isset($_POST['to_checkout'])) {
        $to_checkout = $_POST['to_checkout'];
        if ($to_checkout == 1) {
            return wc_get_checkout_url();
        }
    }
}

add_filter( 'woocommerce_add_to_cart_redirect', 'add_to_cart_redirect_checkout' );


add_filter("woocommerce_checkout_fields", "checkout_fields");

function checkout_fields($all_fields){

    $order = array(
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'country',
        'city',
        'state',
        'postcode',
        'company',
        'email',
        'phone',
    );
    /*  convert labels to placeholders  */
    $new_fields = array();
    foreach ($all_fields as $key => $fields){
        foreach ($fields as $k => $field) {
            if (isset($field['label'])) {
                $field['placeholder'] = $field['label'];
            }
            $new_fields[$key][$k] = $field;
        }
    }

    /*  order fields  */
    $all_fields = array();
    foreach ($new_fields as $key => $fields) {
        foreach ($order as $k) {
            if (isset($fields[$key.'_'.$k]))
                $all_fields[$key][$key.'_'.$k] = $fields[$key.'_'.$k];
        }
    }
    $all_fields = [
        'shipping'  =>  $all_fields['shipping'],
        'billing'   =>  $all_fields['billing'],
        'order'     =>  $new_fields['order'],
    ];

    return $all_fields;
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_action( 'woocommerce_before_add_to_cart_button', 'display_extras', 10, 0 );

function display_extras(){
    global $wp_actions,$wp_filter;
    if (in_array( 'woocommerce-tm-extra-product-options/tm-woo-extra-product-options.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
        if (has_term('accessories', 'product_cat')) {
            remove_action(TM_EPO()->tm_epo_options_placement, array(TM_EPO(), 'tm_epo_fields'), TM_EPO()->tm_epo_options_placement_hook_priority);
            remove_action(TM_EPO()->tm_epo_options_placement, array(TM_EPO(), 'tm_add_inline_style'), TM_EPO()->tm_epo_options_placement_hook_priority + 99999);
            remove_action(TM_EPO()->tm_epo_totals_box_placement, array(TM_EPO(), 'tm_epo_totals'), TM_EPO()->tm_epo_totals_box_placement_hook_priority);
        }
    }
}

//remove notices from single product

remove_action('woocommerce_before_single_product','wc_print_notices',10);
add_action('woocommerce_single_product_minicart','sb_notice', 10, 1);

function sb_notice($flush = true){
    $all_notices = wc_get_notices();
    $notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );

    foreach ( $notice_types as $notice_type ) {
        if ( wc_notice_count( $notice_type ) > 0 ) {
            wc_get_template( "notices/{$notice_type}.php", array(
                'messages' => array_filter( $all_notices[ $notice_type ] )
            ) );
        }
    }
    if ($flush)
        wc_clear_notices();
}

add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );

function custom_add_to_cart_message($message) {

    return sprintf( 'Successfully added to your cart.');
}

/* hide category from shop*/

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

function custom_pre_get_posts_query( $q ) {

    if ( ! $q->is_main_query() ) return;
    if ( ! $q->is_post_type_archive() ) return;

    if ( ! is_admin() && is_shop() ) {

        $q->set( 'tax_query', array(array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array( 'accessories' ), // Don't display products in the knives category on the shop page
            'operator' => 'NOT IN'
        )));

    }
    remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

}

add_action('woocommerce_gpf_title', 'override_gpf_title', 10, 3);

function override_gpf_title($title, $feed_item_id, $taxonomy){
    if ( $taxonomy == null )
        return $title . ' Mobile Phone Signal Booster';
    if ($alt_name = get_term_meta($taxonomy->term_id, 'alt_name',true))
        return strpos($alt_name, 'Mobile Phone Signal Booster') === false ? $alt_name . ' Mobile Phone Signal Booster' : $alt_name ;
}
