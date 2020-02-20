<?php
/*
 * Register experts post type
 */
function add_testimonial_post_type() {

    $name = 'Testimonial';

    $args = array(
        'labels' => array(
            'name' => __( $name.'s', TEXTDOMAIN ),
            'singular_name' => __( $name, TEXTDOMAIN ),
            'plural_name' => __( $name.'s', TEXTDOMAIN ),
            'item_name_sing' => __( $name, TEXTDOMAIN ),
            'item_name_plur' => __( $name.'s', TEXTDOMAIN ),
            'add_new' => __( 'Add New '.$name, TEXTDOMAIN ),
            'add_new_item' => __( 'Add New '.$name, TEXTDOMAIN ),
            'edit' => __( 'Edit', TEXTDOMAIN ),
            'edit_item' => __( 'Edit '.$name, TEXTDOMAIN ),
            'new_item' => __( 'New '.$name, TEXTDOMAIN ),
            'view' => __( 'View '.$name, TEXTDOMAIN ),
            'view_item' => __( 'View '.$name, TEXTDOMAIN ),
            'search_items' => __( 'Search '.$name.'s', TEXTDOMAIN ),
            'not_found' => __( 'No '.$name.'s found', TEXTDOMAIN ),
            'not_found_in_trash' => __( 'No '.$name.'s found in the Trash', TEXTDOMAIN ),
        ),
        'public' => true,
        'publicly_queryable' => false,
        'menu_position' => 58,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title',
            'editor',
            'categories',
            'thumbnail'
        ),
        'description' => "Post type for ".$name."s."

    );

    register_post_type(slugify($name), $args);
}

add_action( 'init', 'add_testimonial_post_type', 9 );


function testimonial_meta_box_markup(){
    global $post;

    $role = get_post_meta( $post->ID, 'role', true );

    $field = 'Role';
    $value = get_post_meta( $post->ID, strtolower($field), true );
    echo '<p class="form-field"><label for="'.strtolower($field).'">'.$field.': <input type="text" name="'.strtolower($field).'" id="'.strtolower($field).'" value="'.$value.'"></label>';
}

function add_testimonial_meta_box()
{
    add_meta_box("product-meta-box", "Testimonial Fields", "testimonial_meta_box_markup", "testimonial", 'normal' , "high", null);
}

add_action("add_meta_boxes", "add_testimonial_meta_box");

function save_testimonial_meta_box($post_id, $post)
{
    if ($post->post_type == "testimonial") {
        $custom_tab_content = $_POST['role'];
        update_post_meta($post_id, "role", $custom_tab_content);
    }
}

add_action("save_post", "save_testimonial_meta_box", 10, 2);
