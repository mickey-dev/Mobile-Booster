<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php theme_head(null,'#00679f','#ffffff'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( !empty($_GET['dc']) && $_GET['dc'] == true )
    echo theme_option('banner_content');
?>
<nav class="navbar navbar-primary" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#left-menu, #right-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php $logo = theme_option('logo'); if ($logo && !empty($logo['url'])): ?>
                    <img src="<?= $logo['url'] ?>" height="<?= $logo['height'] ?>" width="<?= $logo['width'] ?>" alt="<?= bloginfo('name') ?> logo">
                <?php else:
                    bloginfo('name');
                endif; ?>
            </a>
        </div>

        <?php
        wp_nav_menu( array(
                'menu'              => 'right-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse no-padding navbar-right',
                'container_id'      => 'right-menu',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
        );
        ?>
    </div>
</nav>
<div class="container out-of-menu">
    <div class="visible-xs">
        <div class="text-center top-menu-fixed-issues">
            <span class="primary-color"><i class="mb-icon mb-icon-connection"></i> 13,862 </span> Signal Issues Fixed
        </div>
        <?php if (wc_isactive()){ ?>
            <div class="text-center mb-top-menu-minicart">
                <a href="<?= wc_get_cart_url() ?>">
                    <?= do_shortcode('[minicart flush=1]') ?>
                </a>
            </div>
        <?php } ?>
    </div>
</div>



<div class="progress-indicator">
    <div class="container steps">
        <?php $name = 'Shopping Cart'; ?>
        <div class="step text-center no-padding col-xs-4<?php if(is_cart()) echo ' active'?>" title="<?= $name ?>"><div class="icon"><i class="mb-icon mb-icon-shopping_cart"></i></div><div class="step-name"><?= $name ?></div></div>
        <?php $name = 'Shipping & Payment Details'; ?>
        <div class="step text-center no-padding col-xs-4<?php if(is_checkout()) echo ' active'?>" title="<?= $name ?>"><div class="icon"><i class="mb-icon mb-icon-free-delivery"></i></div><div class="step-name"><?= $name ?></div></div>
        <?php $name = 'Secure Payment'; ?>
        <div class="step text-center no-padding col-xs-4"><div class="icon" title="<?= $name ?>"><i class="mb-icon mb-icon-lock"></i></div><div class="step-name"><?= $name ?></div></div>
    </div>
</div>
