<?php
$post = $_POST;

if ( !isset($post['data']) || empty($post['data'])  )
    wp_redirect(home_url());

$tax_query = [];

foreach ( $post['data'] as $key => $value ){
    if (is_array($value)){
        foreach ($value as $val){
            $tax_query[] = [
                'taxonomy' 		=> $key,
                'terms' 		=> $val,
                'field' 		=> 'term_id'
            ];
        }
    } else{
        $tax_query[] = [
            'taxonomy' 		=> $key,
            'terms' 		=> $value,
            'field' 		=> 'term_id'
        ];
    }
}

$tax_query['relation'] = 'AND';

$args = array(
    'post_type'	=> 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'ignore_sticky_posts'	=> 1,
    'orderby' => 'meta_value_num',
    'meta_key' => '_price',
    'order' => 'ASC',
    'tax_query'	=> $tax_query,
);

$products = new WP_Query( $args );


if($products->have_posts()) {
    while ($products->have_posts()) { $products->the_post();
        wp_redirect(get_permalink());
        exit();
        wc_get_template_part('content', 'product_list');
    }
} else{
    get_header();
?>
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php wc_get_template( 'loop/no-products-found.php' ); ?>
    </div>
<?php
    get_footer();
}
?>
