<div class="footer">
    <div class="container">
        <div class="col-xs-12 copyright-text  text-center">
            Copyright © <?= date('Y')?>. <?=theme_option('copyright_text') ?>
        </div>
    </div>
</div>

<?php wp_footer() ?>

<?= theme_option('ga_tracking_script') ?>

<?= theme_option('chat_script') ?>

<?= theme_option('ab_testing_script') ?>

<?= theme_option('custom_script') ?>

<?= theme_option('ga_script') ?>
    </body>
</html>