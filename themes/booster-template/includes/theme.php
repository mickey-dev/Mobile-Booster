<?php
/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 1/14/2017
 * Time: 3:41 PM
 */
class SmartBoosters
{
    public static function styles(){

        wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/style.min.css');

    }

    public static function get_template($name, $params=null){

        ob_start();

        require(get_stylesheet_directory().'/templates/'.$name.'.php');

        $view = ob_get_clean();

        echo $view;



    }

    public static function scripts() {
        wp_deregister_script('jquery');
        wp_deregister_script('wp-embed');
        wp_register_script('object-fit', get_template_directory_uri() . '/assets/js/plugins/ofi.min.js', null, null, true);
        wp_register_script('base64-plugin', get_template_directory_uri() . '/assets/js/plugins/base64.min.js', null, null, true);
        wp_enqueue_script('object-fit');
        wp_enqueue_script('base64-plugin');
        if (is_woocommerce() || is_cart() || is_checkout()) {
            wp_register_script('jquery', get_template_directory_uri() . '/assets/js/plugins/jquery.min.js', array(), null, true);
            wp_enqueue_script('jquery');

            wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/plugins/bootstrap.min.js', array('jquery'), null, true);
            wp_enqueue_script('bootstrap');

            wp_register_script('main', get_template_directory_uri() . '/assets/js/plugins/main.js', array('jquery'), null, true);
            wp_enqueue_script('main');
            wp_localize_script( 'main', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        } else {
            wp_deregister_script('jquery');
            wp_deregister_script('wp-embed');
            wp_deregister_script('jquery-blockui');
            wp_deregister_script('jquery-cookie');
            wp_deregister_script('wc-cart-fragments');
            wp_deregister_script('wc-add-to-cart');
            wp_deregister_script('woocommerce');
            wp_register_script('site-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js',array(),null,true);
            wp_enqueue_script('site-scripts');
            wp_localize_script( 'site-scripts', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        }
    }

    public static function best_selling_products( $atts ){

        $atts = shortcode_atts(array(

            'per_page' => '12',

            'columns' => '',

        ), $atts);

        $query_args = array(

            'post_type' => 'product',

            'post_status' => 'publish',

            'ignore_sticky_posts' => 1,

            'posts_per_page' => $atts['per_page'],

            'orderby' => 'date',

            'meta_key' => '_is_bestseller',

            'meta_value' => 'yes'

        );


        if(isset($atts['tax_query'])) $query_args['tax_query'] = $atts['tax_query'];



        return self::product_loop($query_args, $atts, 'best_selling_products');

    }
    /**

     * Loop over found products

     * @param  array $query_args

     * @param  array $atts

     * @param  string $loop_name

     * @return string

     */

    private static function product_loop( $query_args, $atts, $loop_name ) {

        global $woocommerce_loop;



        $products                    = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $query_args, $atts ) );

        $columns                     = absint( $atts['columns'] );

        $woocommerce_loop['columns'] = $columns;

        ob_start();



        if ( $products->have_posts() ) : ?>



            <?php do_action( "woocommerce_shortcode_before_{$loop_name}_loop" ); ?>



            <?php woocommerce_product_loop_start(); ?>



            <?php while ( $products->have_posts() ) : $products->the_post(); ?>



                <?php wc_get_template_part( 'content', 'product_grid' ); ?>



            <?php endwhile; // end of the loop. ?>



            <?php woocommerce_product_loop_end(); ?>



            <?php do_action( "woocommerce_shortcode_after_{$loop_name}_loop" ); ?>



        <?php endif;



        woocommerce_reset_loop();

        wp_reset_postdata();



        return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

    }

}
function theme_head($path = null, $theme_color = '#ffffff', $title_color = "#2d89ef"){
    if ($path==null)
        $path = get_stylesheet_directory_uri().'/assets/favicons';
    ?>
    <link rel="shortcut icon" href="<?= $path ?>/favicon.ico" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $path ?>/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $path ?>/apple-touch-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $path ?>/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $path ?>/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $path ?>/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $path ?>/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $path ?>/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $path ?>/apple-touch-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $path ?>/apple-touch-icon-180x180.png"/>
    <link rel="icon" type="image/png" href="<?= $path ?>/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="<?= $path ?>/favicon-194x194.png" sizes="194x194"/>
    <link rel="icon" type="image/png" href="<?= $path ?>/favicon-96x96.png" sizes="96x96"/>
    <link rel="shortcut icon" type="image/png" href="<?= $path ?>/android-chrome-192x192.png" sizes="192x192"/>
    <link rel="icon" type="image/png" href="<?= $path ?>/favicon-16x16.png" sizes="16x16"/>
    <link rel="manifest" href="<?= $path ?>/manifest.json"/>
    <link rel="mask-icon" href="<?= $path ?>/safari-pinned-tab.svg" color="<?= $theme_color ?>"/>
    <meta name="apple-mobile-web-app-title" content="<?= bloginfo('name') ?>"/>
    <meta name="application-name" content="<?= bloginfo('name') ?>"/>
    <meta name="msapplication-TileColor" content="<?= $title_color ?>"/>
    <meta name="msapplication-TileImage" content="/mstile-144x144.png"/>
    <meta name="theme-color" content="<?= $theme_color ?>"/>
    <meta name="mobile-web-app-capable" content="yes"/>

    <?php

}
function theme_option($key){
    global $theme_options;
    return (isset($theme_options[$key]) && !empty(isset($theme_options[$key])))? $theme_options[$key] : false;
}
function get_countries($string =false){
//    $countries = str_replace(' ', '', theme_option('countries'));
    $countries = trim(theme_option('countries'));
    $countries = explode(',', $countries);
    $countries = array_map(function ($value){
        return explode(':',$value);
    },$countries);
    if ($string) {
        $separator = ', ';
        if (count($countries) == 2){
            $separator = ' and ';
        }
        return implode($separator, array_map(function ($country) {
            if (!empty($country[1]))
                return $country[1];
            return $country[0];
        }, $countries));
    }
    return $countries;
}
/*
 *  Sidebars
 *
 */
add_action( 'widgets_init', 'sb_sidebars_init' );
function sb_sidebars_init() {

    $args = array(
        'name'          => __( 'Primary Sidebar', TEXTDOMAIN ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'This is the Primary Sidebar of the site', TEXTDOMAIN ),
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '<i class="glyphicon glyphicon-menu-up"></i></h4>' );

    register_sidebar( $args );

    $args = array(
        'name'          => __( 'Footer Sidebar', TEXTDOMAIN ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'This is the Footer Section of the site', TEXTDOMAIN ),
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s col-xs-12 col-sm-6 col-md-3">',
        'after_widget'  => '</li>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>' );

    register_sidebar( $args );

    $args = array(
        'name'          => __( 'Blog Sidebar', TEXTDOMAIN ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'This is the Sidebaf for site Blog section', TEXTDOMAIN ),
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>' );

    register_sidebar( $args );

}

add_action( 'wp_footer', 'SmartBoosters::styles' );
add_action( 'wp_enqueue_scripts', 'SmartBoosters::scripts' );
remove_action( 'wp_head', 'print_emoji_detection_script' , 7);
remove_action( 'wp_print_styles', 'print_emoji_styles');


function slugify( $str ) {
    $str = strtolower( $str );
    $str = html_entity_decode( $str );
    $str = preg_replace( '/[^\w ]+/', '', $str );
    $str = preg_replace( '/ +/', '-', $str );

    return $str;
}

/* add phone number before right menu */
function right_menu_items($items){
    // $fixed = '<li class="hidden-xs top-menu-paypal"><img src="'. get_stylesheet_directory_uri() .'/assets/images/paypal-badge.png" alt="paypal badge"></li>';
    // $fixed .= '<li id="menu-item-13339" class="hidden-xs top-menu-fixed-issues menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a href="javascript:void(0)"><span class="action-color"><i class="mb-icon mb-icon-connection"></i> 13,862 </span> Signal Issues Fixed</a></li>';
    if(wc_isactive()) {
        $items .= '<li id="menu-item-12229" class="hidden-xs mb-top-menu-minicart menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a href="' . wc_get_cart_url() . '">'.do_shortcode('[minicart]').'</a></li>';
    }
    return $fixed.$items;
}

add_filter( 'wp_nav_menu_right-menu_items', 'right_menu_items' );
