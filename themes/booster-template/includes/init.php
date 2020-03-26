<?php
require_once "bootstrap_walker.php";
require_once "admin/tinymce.php";
require_once "admin/testimonial.php";
require_once "theme.php";
require_once "shortcodes/contact-form.php";

define('TEXTDOMAIN','smartbooster');

add_theme_support('widgets');

add_theme_support('menus');

register_nav_menus( array(
    'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
    'secondary' => __( 'Secondary Menu', 'myfirsttheme' )
) );

if ( wc_isactive() )
    require_once('woocommerce.php');
function wc_isactive(){
    return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

if ( !class_exists( 'ReduxFramework' ) && file_exists( __DIR__.'/redux/ReduxCore/framework.php' ) ) {
    require_once __DIR__.'/redux/ReduxCore/framework.php';
}

if ( !isset( $redux_demo ) && file_exists( __DIR__.'/redux/sample/config.php' ) ) {
    require_once( __DIR__.'/redux/sample/config.php' );
}



function _remove_script_version( $src ){
    $src = preg_replace('/^(http?|https):/', '', $src);

    if ( !strpos( $src, get_template_directory_uri() ) && !strpos( $src, 'fonts.googleapis.com' ) ){
        $parts = explode( '?', $src );
        return $parts[0];
    }
    return $src;
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


if(in_array( 'woocommerce-tm-extra-product-options/tm-woo-extra-product-options.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )){

    add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );
}

function disable_plugin_updates( $value ) {
    if (isset($value->response['woocommerce-tm-extra-product-options/tm-woo-extra-product-options.php']))
        unset( $value->response['woocommerce-tm-extra-product-options/tm-woo-extra-product-options.php'] );
    return $value;
}
