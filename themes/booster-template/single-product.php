<?php get_header();?>


<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p>','</p>' );
        }
        ?>
    </div>
</section>
<div class="white-bg single-post-container product-full">
    <?php if (have_posts()): ?>
        <div class="product-page col-xs-12 col-md-12 col-sm-12">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post() ?>
                    <div>
                        <?php the_content() ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>



<?php get_footer(); ?>
