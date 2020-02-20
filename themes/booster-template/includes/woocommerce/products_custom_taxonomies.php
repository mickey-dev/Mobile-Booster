<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'product_taxonomies', 0 );

// create two taxonomies, Providers and writers for the post type "book"
function product_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Providers', 'taxonomy general name', 'woocommerce' ),
        'singular_name'     => _x( 'Provider', 'taxonomy singular name', 'woocommerce' ),
        'search_items'      => __( 'Search Providers', 'woocommerce' ),
        'all_items'         => __( 'All Providers', 'woocommerce' ),
        'parent_item'       => __( 'Parent Provider', 'woocommerce' ),
        'parent_item_colon' => __( 'Parent Provider:', 'woocommerce' ),
        'edit_item'         => __( 'Edit Provider', 'woocommerce' ),
        'update_item'       => __( 'Update Provider', 'woocommerce' ),
        'add_new_item'      => __( 'Add New Provider', 'woocommerce' ),
        'new_item_name'     => __( 'New Provider Name', 'woocommerce' ),
        'menu_name'         => __( 'Providers', 'woocommerce' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'provider','with_front' => false ),
    );

    register_taxonomy( 'provider', 'product', $args );

    $labels = array(
        'name'              => _x( 'Coverages', 'taxonomy general name', 'woocommerce' ),
        'singular_name'     => _x( 'Coverage', 'taxonomy singular name', 'woocommerce' ),
        'search_items'      => __( 'Search Coverages', 'woocommerce' ),
        'all_items'         => __( 'All Coverages', 'woocommerce' ),
        'parent_item'       => __( 'Parent Coverage', 'woocommerce' ),
        'parent_item_colon' => __( 'Parent Coverage:', 'woocommerce' ),
        'edit_item'         => __( 'Edit Coverage', 'woocommerce' ),
        'update_item'       => __( 'Update Coverage', 'woocommerce' ),
        'add_new_item'      => __( 'Add New Coverage', 'woocommerce' ),
        'new_item_name'     => __( 'New Coverage Name', 'woocommerce' ),
        'menu_name'         => __( 'Coverages', 'woocommerce' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'coverage' ),
    );

    register_taxonomy( 'coverage', 'product', $args );

    $labels = array(
        'name'              => _x( 'Frequencies', 'taxonomy general name', 'woocommerce' ),
        'singular_name'     => _x( 'Frequency', 'taxonomy singular name', 'woocommerce' ),
        'search_items'      => __( 'Search Frequencies', 'woocommerce' ),
        'all_items'         => __( 'All Frequencies', 'woocommerce' ),
        'parent_item'       => __( 'Parent Frequency', 'woocommerce' ),
        'parent_item_colon' => __( 'Parent Frequency:', 'woocommerce' ),
        'edit_item'         => __( 'Edit Frequency', 'woocommerce' ),
        'update_item'       => __( 'Update Frequency', 'woocommerce' ),
        'add_new_item'      => __( 'Add New Frequency', 'woocommerce' ),
        'new_item_name'     => __( 'New Frequency Name', 'woocommerce' ),
        'menu_name'         => __( 'Frequencies', 'woocommerce' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'frequency' ),
    );

    register_taxonomy( 'frequency', 'product', $args );

}


?>