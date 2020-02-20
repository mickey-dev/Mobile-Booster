<?php
// if(is_page(array('cart', 'checkout'))){
//     get_header('cart');
// } else{
//     get_header();
// }

get_header();
?>

<div class="container white-bg default-padding" style="min-height: 60vh;">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post() ?>
            <?php the_content() ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php
// if(is_page(array('cart', 'checkout'))){
//     get_footer('cart');
// } else{
//     get_footer();
// }
get_footer();
?>
