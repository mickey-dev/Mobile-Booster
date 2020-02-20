<?php

/*
 *  Adding custom fields to products
 *
 */

require_once "woocommerce/actions.php";
require_once "woocommerce/products_custom_fields.php";
require_once "woocommerce/products_custom_taxonomies.php";
require_once "woocommerce/products_custom_taxonomies_fields.php";
require_once "woocommerce/shortcodes/filter_shortcode.php";
require_once "woocommerce/shortcodes/minicart.php";
require_once "woocommerce/shortcodes/bestsellers.php";
require_once "woocommerce/ProductExport.php";

add_filter( 'woocommerce_enqueue_styles', '__return_false' );


/*
 *  Edit Woocommerce Tabs
 *
 */

add_filter( 'woocommerce_product_tabs', 'product_tabs', 98 );

function product_tabs($tabs) {
    global $post;

    $tabs['description']['callback'] = 'product_description_tab_content';
    $tabs['description']['priority'] = 10;
    $tabs['description']['title'] = 'Overview';

    $custom_tab_title = get_post_meta( $post->ID, 'custom_tab_title', true );
    $custom_tab_content = get_post_meta( $post->ID, 'custom_tab_content', true );

    if(!empty($custom_tab_title)) {
        $tabs['custom_tab'] = array(
            'title' => __($custom_tab_title, 'woocommerce'),
            'priority' => 16,
            'callback' => function () use ($custom_tab_content) {
                echo $custom_tab_content;
            }
        );
    }

    unset($tabs['reviews']);

    return $tabs;

}

function product_description_tab_content(){
    echo '<h2><strong>' . __('Product Overview', 'woocommerce') . ':</strong></h2>';
    the_content();
}

add_action('woocommerce_archive_description','wc_archive_description');

// XXX
function wc_archive_description(){
    // echo '<div class="term-description">';
    // echo term_description();
    // echo '</div>';
}

add_action('woocommerce_after_shop_loop','wc_archive_bottom_content');

function wc_archive_bottom_content(){
    echo '<div class="custom-sidebar hidden-xs">';
      do_action( 'woocommerce_sidebar' );
      echo '<div class="term-description">';
        echo htmlspecialchars_decode(get_term_meta(get_queried_object_id(), 'content',true));
      echo '</div>';
      ?>

      <div class="sidebar-guarantee">
        <div class="title"><h4>Our Guarantee</h4></div>
        <div class="guarantee delivery">
          <div class="image"><img src="<?php echo get_template_directory_uri() ?>/assets/img/free-delivery-wh.png" alt="Our Guarantee"></div>
          <div class="text">
            <h5>Free Delivery</h5>
            <span>3-5 Working Days</span>
          </div>
        </div>

        <div class="guarantee support">
          <div class="image"><img src="<?php echo get_template_directory_uri() ?>/assets/img/support-wh.png" alt="Our Guarantee"></div>
          <div class="text">
            <h5>24/7 Support</h5>
            <span>Phone and live chat support</span>
          </div>
        </div>

        <div class="guarantee money">
          <div class="image"><img src="<?php echo get_template_directory_uri() ?>/assets/img/money-back-wh.png" alt="Our Guarantee"></div>
          <div class="text">
            <h5>Money Back</h5>
            <span>30 Day Money Back</span>
          </div>
        </div>
      </div>

    <?php
    echo '</div>';

    // global $slug;
    // $slug = 'shop';
}
