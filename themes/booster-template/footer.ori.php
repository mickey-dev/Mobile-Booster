<div class="footer">
    <div class="container">
        <ul>
            <?php dynamic_sidebar('footer-sidebar') ?>
        </ul>
    </div>

    <div class="container">
        <div class="col-xs-12 col-sm-4 copyright-text  text-center">
            Copyright © <?= date('Y')?>. <?= theme_option('copyright_text') ?>
        </div>
        <div class="col-xs-12 col-sm-3 footer-socials text-center">
            <?php
            if($socials = theme_option('social_links')){
                foreach($socials as $social){
                    if(!empty($social)) {
                        $social = explode('|', $social);
                        ?>
                        <a href="<?= $social[1] ?>" target="_blank">
                            <i class="fa fa-<?= $social[0] ?>"></i>
                        </a>
                        <?php
                    }
                }
            }
            ?>
        </div>

    </div>
</div>

<?php wp_footer() ?>

<?= theme_option('ga_tracking_script') ?>

<?= theme_option('chat_script') ?>

<?= theme_option('ab_testing_script') ?>

<?= theme_option('custom_script') ?>

<?= theme_option('ga_script') ?>

  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/custom.js">

  </script>

  </body>
</html>
