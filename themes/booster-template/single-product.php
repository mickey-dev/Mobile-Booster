<?php get_header();?>
<div class="container white-bg single-post-container" style="margin-top: 48px; margin-bottom: 64px;">
    <?php if (have_posts()): ?>
        <div class="col-xs-12 col-md-12 col-sm-12">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post() ?>
                    <article>
                        <header>
                            <h1><?php the_title() ?></h1>
                        </header>
                        <main>
                            <?php the_content() ?>
                        </main>
                    </article>
                <?php endwhile; ?>

                <?php
                $url = get_permalink($post->ID);
                $title = get_the_title($post->ID);
                echo do_shortcode('[easy-social-share buttons="facebook,twitter,pinterest,linkedin" counters=0 style="button" point_type="simple" url="'.$url.'" text="'.$title.'"]');
                ?>
                <?php
                $next_post = get_next_post();
                $prev_post = get_previous_post();
                if (!empty($next_post) or !empty($prev_post)) { ?>
                <div class="mb-block-row mb-post-next-prev">
                    <?php if (!empty($prev_post)) { ?>
                        <div class="mb-block-span6 mb-post-prev-post">
                            <div class="mb-post-next-prev-content">
                                <span><?php esc_html_e('Previous article', 'mobilebooster') ?></span>
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)) ?>"><?php echo esc_html(get_the_title($prev_post->ID)) ?></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="mb-block-span6 mb-post-prev-post"></div>
                    <?php } ?>

                    <div class="mb-next-prev-separator"></div>

                    <?php if (!empty($next_post)) { ?>
                        <div class="mb-block-span6 mb-post-next-post">
                            <div class="mb-post-next-prev-content">
                                <span><?php esc_html_e('Next article', 'mobilebooster') ?></span>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)) ?>"><?php echo esc_html(get_the_title($next_post->ID)) ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>



<?php get_footer(); ?>
