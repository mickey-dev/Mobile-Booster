<?php
// Add Display Fields Action
add_action( 'woocommerce_product_options_general_product_data', 'product_custom_fields_show' );

// Add Save Fields Action
add_action( 'woocommerce_process_product_meta', 'product_custom_fields_save' );


// Display Fields
function product_custom_fields_show() {

    echo '<div class="options_group">';

    // If is Bestseller
    woocommerce_wp_checkbox(
        array(
            'id'      => '_is_bestseller',
            'label'   => __( 'If is Bestseller', 'woocommerce' ),
        )
    );
    // If is Featured
    woocommerce_wp_checkbox(
        array(
            'id'      => '_is_featured',
            'label'   => __( 'If is Featured', 'woocommerce' ),
        )
    );

    echo '</div>';

}

// Save Fields
function product_custom_fields_save($post_id){

    $woocommerce_is_bestseller = $_POST['_is_bestseller'];
    update_post_meta( $post_id, '_is_bestseller', esc_attr( $woocommerce_is_bestseller ) );

    $woocommerce_is_featured = $_POST['_is_featured'];
    update_post_meta( $post_id, '_is_featured', esc_attr( $woocommerce_is_featured ) );

}


function product_meta_box_markup()
{
    global $post;

    $custom_tab_content = get_post_meta( $post->ID, 'custom_tab_content', true );
    $package_includes = get_post_meta( $post->ID, 'package_includes', true );

    echo '<div class="options_group">';
    woocommerce_wp_text_input(
        array(
            'id'          => 'custom_tab_title',
            'label'       => __( '<h3>Custom tab Title</h3>', 'woocommerce' ),
            'placeholder' => 'Tab Title',
        )
    );

    echo '<label for="custom_tab_content"><h3>Custom tab content</h3></label>';

    wp_editor( htmlspecialchars_decode( $custom_tab_content ), 'custom_tab_content' );
    echo '</div>';

    echo '<br><br><div class="options_group">';
    echo '<label for="package_includes"><h3>Package Includes</h3></label>';

    wp_editor( htmlspecialchars_decode( $package_includes ), 'package_includes' );
    echo '</div>';
}
function page_meta_box_markup()
{
    global $post;


    $content = get_post_meta( $post->ID, 'content_1', true );

    echo '<div class="options_group">';
    woocommerce_wp_text_input(
        array(
            'id'          => 'content_1_title',
            'label'       => __( 'Content 1 Title', 'woocommerce' ),
            'placeholder' => 'Content 1 Title',
        )
    );
    woocommerce_wp_text_input(
        array(
            'id'          => 'content_1_link',
            'label'       => __( 'Content 1 Action Link', 'woocommerce' ),
            'placeholder' => 'Content 1 Action Link',
        )
    );

    echo '<label for="custom_tab_content">Content 1</label>';

    wp_editor( htmlspecialchars_decode( $content ), 'content_1' );
    echo '</div>';

    $content = get_post_meta( $post->ID, 'content_1', true );

    echo '<div class="options_group">';
    woocommerce_wp_text_input(
        array(
            'id'          => 'content_2_title',
            'label'       => __( 'Content 2 Title', 'woocommerce' ),
            'placeholder' => 'Content 2 Title',
        )
    );
    woocommerce_wp_text_input(
        array(
            'id'          => 'content_2_link',
            'label'       => __( 'Content 2 Action Link', 'woocommerce' ),
            'placeholder' => 'Content 2 Action Link',
        )
    );

    echo '<label for="custom_tab_content">Content 2</label>';

    wp_editor( htmlspecialchars_decode( $content ), 'content_2' );
    echo '</div>';
}

function add_custom_meta_box()
{
    add_meta_box("product-meta-box", "Product Content", "product_meta_box_markup", "product", 'normal' , "high", null);
    add_meta_box("page-meta-box", "Page Content", "page_meta_box_markup", "page", 'normal' , "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");

function save_custom_meta_box($post_id, $post){
    if($post->post_type == "product") {
        if (isset($_POST['custom_tab_content'])) {
            $custom_tab_content = $_POST['custom_tab_content'];
            update_post_meta($post_id, "custom_tab_content", $custom_tab_content);
        }
        if (isset($_POST['custom_tab_title'])) {
            $custom_tab_title = $_POST['custom_tab_title'];
            update_post_meta($post_id, "custom_tab_title", $custom_tab_title);
        }
        if (isset($_POST['package_includes'])) {
            $package_includes = $_POST['package_includes'];
            update_post_meta($post_id, "package_includes", $package_includes);
        }
    }elseif($post->post_type == "page") {
        if (isset($_POST['content_1_title'])) {
            $custom_tab_title = $_POST['content_1_title'];
            update_post_meta($post_id, "content_1_title", $custom_tab_title);
        }
        if (isset($_POST['content_1_link'])) {
            $custom_tab_title = $_POST['content_1_link'];
            update_post_meta($post_id, "content_1_link", $custom_tab_title);
        }
        if (isset($_POST['content_1'])) {
            $custom_tab_title = $_POST['content_1'];
            update_post_meta($post_id, "content_1", $custom_tab_title);
        }

        if (isset($_POST['content_2_title'])) {
            $custom_tab_title = $_POST['content_2_title'];
            update_post_meta($post_id, "content_2_title", $custom_tab_title);
        }
        if (isset($_POST['content_2_link'])) {
            $custom_tab_title = $_POST['content_2_link'];
            update_post_meta($post_id, "content_2_link", $custom_tab_title);
        }
        if (isset($_POST['content_2'])) {
            $custom_tab_title = $_POST['content_2'];
            update_post_meta($post_id, "content_2", $custom_tab_title);
        }
    }

}

add_action("save_post", "save_custom_meta_box", 10, 2);
