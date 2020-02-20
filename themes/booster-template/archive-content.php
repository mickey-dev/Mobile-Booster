<style>
    .container.white-bg.archive-container header h2 a{ font-size: 24px; color: #333}
    .container.white-bg.archive-container header h2{ margin-top: 12px;}
    .container.white-bg.archive-container header .categories a{color: #083d54;}
    .container.white-bg.archive-container main a{color:#083d54;}
    .archive-container article{margin-bottom: 32px; padding-top: 0px; padding-bottom: 0px;}
</style>
<article class="row">
    <asside class="col-md-12 col-xs-12">
        <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail( null, [ 'class' => 'img-responsive' ]) ?>
        </a>
    </asside>

    <div class="col-md-12 col-xs-12">
        <header>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <div style="margin-top: 6px;margin-bottom: 12px;">

                <span class="categories">
                <?php
                foreach ($categories = get_the_category(get_the_ID()) as $key => $category){
                    ?>
                    <a href="<?= get_category_link($category->term_id) ?>">
                            <?php
                            echo $category->name;
                            if(count($categories) != $key+1) echo ',';
                            ?>
                        </a>
                    <?php
                }
                ?>
                </span>
                |
                <span class="post-date">
                    <em>
                        <?php the_date()?>
                    </em>
                </span>
            </div>
        </header>
        <main>
            <?php the_excerpt() ?>
            <a href="<?php the_permalink() ?>">Read more</a>
        </main>
    </div>
</article>
