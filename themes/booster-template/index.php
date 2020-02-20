<?php

get_header();
?>


    <div class="container white-bg archive-container">

        <?php if(is_archive()){ ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php single_cat_title(); ?>
                </h1>
            </header>
        <?php } else { ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php _e( 'Blog posts', TEXTDOMAIN ); ?>
                </h1>
            </header>
        <?php } ?>
        <div class="col-xs-12 col-md-9 col-sm-7">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post() ?>
                    <?php get_template_part('archive-content') ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <asside class="sidebar col-xs-12 col-md-3 col-sm-5">
            <?php dynamic_sidebar('blog-sidebar'); ?>
        </asside>

    </div>


<?php get_footer(); ?>