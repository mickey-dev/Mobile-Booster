<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php ?>
    <?php wp_head(); ?>
    
    <link rel='stylesheet' id='theme-style-css'  href='//www.mobilebooster.co.uk/wp-content/themes/booster-template/assets/css/style.min.css' type='text/css' media='all' />
  
    <meta name="p:domain_verify" content="065a32652b8c6057027528228f0f58b5"/>

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/custom-style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style-custom.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">

    <style media="screen">
      #loading-page {
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-align-items: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;

        background-color: white;
        position: fixed;
        z-index: 999;
        bottom: 0;
        right: 0;
        left: 0;
        top: 0;
      }
      #loading-page svg {
        height: 50px;
        width: 50px;
      }
    </style>

    <?php wp_head(); ?>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133322751-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133322751-1');
</script>
<meta name="yandex-verification" content="8e287b438d427c92" />
</head>

<body <?php body_class(); ?>>

<?php
    if ( !empty($_GET['dc']) && $_GET['dc'] == true )
        echo theme_option('banner_content');
?>

<!-- <div id="loading-page" class="full-center" style="display: none !important;">
  <svg xmlns="http://www.w3.org/2000/svg" version="1" width="100" height="100" viewBox="0 0 128 128"><g><path d="M38.52 33.37L21.36 16.2A63.6 63.6 0 0 1 59.5.16v24.3a39.5 39.5 0 0 0-20.98 8.92z" fill="#0083d5"/><path d="M67.642 24.324L67.65.05a63.6 63.6 0 0 1 38.31 15.626L88.777 32.86a39.5 39.5 0 0 0-21.142-8.53zM94.63 38.52l17.17-17.16a63.6 63.6 0 0 1 16.04 38.14h-24.3a39.5 39.5 0 0 0-8.92-20.98zM103.676 67.642l24.275.007a63.6 63.6 0 0 1-15.626 38.31L95.14 88.777a39.5 39.5 0 0 0 8.53-21.142zM89.48 94.63l17.16 17.17a63.6 63.6 0 0 1-38.14 16.04v-24.3a39.5 39.5 0 0 0 20.98-8.92zM60.358 103.676l-.007 24.275a63.6 63.6 0 0 1-38.31-15.626L39.223 95.14a39.5 39.5 0 0 0 21.142 8.53zM33.37 89.48L16.2 106.64A63.6 63.6 0 0 1 .16 68.5h24.3a39.5 39.5 0 0 0 8.92 20.98zM24.324 60.358L.05 60.35a63.6 63.6 0 0 1 15.626-38.31L32.86 39.223a39.5 39.5 0 0 0-8.53 21.142z" fill="#c0e0f5"/><animateTransform attributeName="transform" type="rotate" values="0 64 64;45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64" calcMode="discrete" dur="720ms" repeatCount="indefinite"/></g></svg>
</div> -->

<nav class="navbar navbar-primary" role="navigation">
    <section class="features v-center">
      <div class="container">
        <div class="col-xs-12 text-center col-sm-6 col-md-4 col-lg-3 feature">
          <i class="mb-icon mb-icon-free-delivery"></i>
          <span>Free delivery in <?= get_countries(true) ?></span>
        </div>
        <div class="col-xs-12 text-center col-sm-6 col-md-4 col-lg-3 visible-md visible-lg feature">
          <i class="mb-icon mb-icon-support"></i>
          <span>24/7 Support <a href="tel:+<?= str_replace(["-", "–","_"], '', slugify(theme_option('phone_number'))) ?>"><?= theme_option('phone_number') ?></a></span>
        </div>
        <div class="col-xs-12 text-center col-sm-6 col-md-4 col-lg-3 feature">
          <i class="mb-icon mb-icon-money-back"></i>
          <span> 30 Day Money-Back Guarantee</span></div>
        <div class="col-xs-12 text-center col-sm-6 col-md-4 col-lg-3 visible-lg feature">
          <i class="mb-icon mb-icon-bar-signal"></i>
          <span> Five Bar Signal Guarantee</span>
        </div>
      </div>
    </section>
    <div class="main-header">
        <div class="container">
          <div class="navbar-header">
              <a class="navbar-brand text-center" href="<?php echo home_url(); ?>">
                  <?php

                  $logo = theme_option('logo');

                  if ($logo && !empty($logo['url'])): ?>
                      <img src="<?= $logo['url'] ?>" height="<?= $logo['height'] ?>" width="<?= $logo['width'] ?>" alt="<?= bloginfo('name') ?> logo">
                  <?php
                  else:
                      //bloginfo('name');
                      echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2633 406.9"><defs><style>.cls-1{fill:#224e69;}.cls-2{fill:#f4bd41;}.cls-3{fill:#efc46f;}.cls-4{fill:#edcf9a;}.cls-5{fill:#e8dac4;}.cls-6{fill:#e5e2df;}</style></defs><title>Logo_MB</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M449.8 97.9l50.8.3 53 141.5 55.2-140.9 49.7.3 13.2 207.1-42.5-.3-6.9-147.9-50.4 126.5-38.6-.2L485 157.2 475.2 305l-41.1-.2zM701.2 231.5c.3-48.6 29.3-77 78.7-76.7 49.1.3 78.1 29 77.8 77.6-.3 48.8-29.6 77.5-78.7 77.2-49.4-.3-78.1-29.3-77.8-78.1zm114.3.6c.2-27.5-13.3-43.9-35.8-44.1-22.8-.1-36.5 16.2-36.6 43.6-.2 27.7 13.3 43.9 36.1 44.1 22.5.2 36.2-15.8 36.3-43.6zM1040 233.5c-.3 48.8-26.5 77.5-70.7 77.3-19.1-.1-36-7.2-46.8-18.9L908 307.6l-16.6-.1 1.3-219.2 39.4.2-.5 79.6a75.62 75.62 0 0 1 42-12.2c42.2.3 66.7 29 66.4 77.6zm-42.2-.3c.2-27.5-13.6-43.9-37.2-44.1-11.1-.1-21.9 3.5-29.2 8.7L931 268c6.6 5.3 17.4 8.7 29.1 8.8 23.6.2 37.6-15.8 37.7-43.6zM1072.3 109.6c.1-13.9 8.4-21.9 22.9-21.8 14.2.1 22.7 8.2 22.6 22.1-.1 13.6-8.7 21.6-22.9 21.5-14.4-.1-22.6-8.2-22.6-21.8zm2.8 49.7l39.4.2-.9 149.3-39.4-.2zM1158.2 271.6l1.1-181.8 39.4.2-1 176.5c0 7.2 6 11.7 16.3 11.8a39.2 39.2 0 0 0 9.2-.8l5.7 30a83.7 83.7 0 0 1-25.6 4.6c-28.4-.2-45.2-15.2-45.1-40.5zM1367.7 268.1l16.8 27c-15.6 11.3-39.5 17.8-64.5 17.7-49.7-.3-78.6-29.3-78.3-78.2.3-48.6 31.2-77 83.4-76.7 40.2.2 63.4 18.4 63.3 48.9-.2 29.1-22.5 46.2-59.9 46-15.8-.1-31.6-3.2-44.3-8.9 3.2 22.2 18.4 34.8 42.8 34.9a73 73 0 0 0 40.7-10.7zm-82.6-47.9a136.76 136.76 0 0 0 31.6 4.1c18.9.1 29.7-6.2 29.8-17.6.1-11.1-8.8-17.5-23.8-17.6-20-.2-33.4 11.1-37.6 31.1zM1657.2 253.7c-.2 36.6-25.6 58.1-68.9 57.9l-96.6-.6 1.2-207 85.7.5c43.3.3 68.4 20.9 68.2 55.3-.1 16.1-9.1 30.8-24.9 40.6 22.5 10 35.5 28.9 35.3 53.3zm-44.3-4.7c.1-17.2-12.3-27.3-33.4-27.4l-45.2-.3-.3 54.1 46.3.3c20.2.2 32.5-9.7 32.6-26.7zm-42.7-108.7l-35.5-.2-.3 48.8 35.5.2c20.3.1 32.5-9 32.6-24.2s-12-24.5-32.3-24.6zM1681.7 237.2c.3-48.6 29.3-77 78.7-76.7 49.1.3 78.1 29 77.8 77.6-.3 48.8-29.6 77.5-78.7 77.2-49.4-.2-78.1-29.2-77.8-78.1zm114.3.7c.2-27.5-13.3-43.9-35.8-44-22.8-.1-36.4 16.2-36.6 43.6-.2 27.7 13.3 43.9 36.1 44.1 22.5.1 36.2-16 36.3-43.7zM1863.2 238.3c.3-48.6 29.3-77 78.7-76.7 49.1.3 78.1 29 77.8 77.6-.3 48.8-29.6 77.5-78.7 77.2-49.4-.2-78.1-29.3-77.8-78.1zm114.3.7c.2-27.5-13.3-43.9-35.8-44.1-22.8-.1-36.4 16.2-36.6 43.6-.2 27.7 13.3 43.9 36.1 44.1 22.4.1 36.1-15.9 36.3-43.6zM2039.6 295.4l17.6-27.4c16.9 10.6 37.1 16.9 55.4 17 18.9.1 30-4.3 30-12.9.1-24.4-95.4-5.3-95.1-64.7.2-28.9 24.7-45.1 65.7-44.8 22.5.1 46.6 6.4 65.4 17.6l-15.4 27.7a109.38 109.38 0 0 0-50.2-13.1c-14.7-.1-23.6 3.7-23.7 11.5-.1 23 95.4 5.6 95.1 64.9-.2 29.1-26.9 46.5-72.1 46.2-25.7-.1-52.5-8.3-72.7-22zM2327.3 308.4c-16.1 6.3-34.5 10.1-49.2 10-32.2-.2-51.2-17.2-51.1-46.1l.4-73-30-.2.2-33.3 30.2.2 1-31.9 38.3-9.5-.2 41.6 53.6.3-.2 33.3-53.6-.3-.4 67.7c-.1 11.1 8.2 17.3 22.1 17.3a84.6 84.6 0 0 0 28.1-5.1zM2464.5 274.6l16.8 27c-15.6 11.3-39.5 17.8-64.5 17.7-49.7-.3-78.6-29.3-78.3-78.2.3-48.6 31.2-77 83.4-76.7 40.2.2 63.4 18.4 63.3 48.9-.2 29.1-22.5 46.2-59.9 46-15.8-.1-31.6-3.2-44.3-8.9 3.2 22.2 18.4 34.8 42.8 34.9 15.7.2 28.2-3.3 40.7-10.7zm-82.7-48a136.76 136.76 0 0 0 31.6 4.1c18.9.1 29.7-6.2 29.8-17.6.1-11.1-8.8-17.5-23.8-17.6-19.9-.1-33.3 11.2-37.6 31.1zM2633 169l-7.2 38.8c-9.7-2.8-19.7-4.6-27.2-4.6-13.9-.1-27.8 4-36.7 10.6l-.6 103.5-39.4-.2.6-102.7c.1-10-8.2-17.8-22.1-20.7l16-30.2c18.3 4 31.6 11.3 39 21 14.5-12.4 33.7-19.2 53.9-19.1a97.44 97.44 0 0 1 23.7 3.6z"/><path class="cls-2" d="M235.9 311.1h-35.8a.43.43 0 0 1-.4-.4V96.9a.43.43 0 0 1 .4-.4h35.8a.43.43 0 0 1 .4.4v213.8a.37.37 0 0 1-.4.4z"/><path class="cls-3" d="M186 311.1h-35.8a.43.43 0 0 1-.4-.4V139.9a.43.43 0 0 1 .4-.4H186a.43.43 0 0 1 .4.4v170.8a.43.43 0 0 1-.4.4z"/><path class="cls-4" d="M136.1 311.1h-35.8a.43.43 0 0 1-.4-.4V182.8a.43.43 0 0 1 .4-.4h35.8a.43.43 0 0 1 .4.4v127.9a.43.43 0 0 1-.4.4z"/><path class="cls-5" d="M86.1 311.1H50.3a.43.43 0 0 1-.4-.4v-85a.43.43 0 0 1 .4-.4h35.8a.43.43 0 0 1 .4.4v85c.1.2-.1.4-.4.4z"/><path class="cls-6" d="M36.2 311.1H.4a.43.43 0 0 1-.4-.4v-42.1a.43.43 0 0 1 .4-.4h35.8a.43.43 0 0 1 .4.4v42.1a.43.43 0 0 1-.4.4z"/><path class="cls-1" d="M126.4 93V59.6h183.1v288H126.4v-17h-18.9v43.2a33.2 33.2 0 0 0 33.1 33.1h154.8a33.2 33.2 0 0 0 33.1-33.1V33.1A33.2 33.2 0 0 0 295.4 0H140.6a33.2 33.2 0 0 0-33.1 33.1V162h18.9zm103 284.8a11.4 11.4 0 1 1-11.4-11.4 11.39 11.39 0 0 1 11.4 11.4z"/></g></g></svg>';
                  endif; ?>
              </a>

              <div class="header-search">
                  <input class="header-input" placeholder="Search Products (ie. carriers)">

                  <div class="input-group-append ">
                      <button class="btn btn-secondary" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                  </div>
              </div>
              <div class="header-right">
                  <div class="call-img">
                      <img src="<?php echo get_template_directory_uri() ?>/assets/img/phone.png" alt="<?php
                      $url = array_reverse(explode('/', $_SERVER["REQUEST_URI"]));
                      echo str_replace("-", " ", $url[1]);
                      ?>">
                  </div>
                  <div class="call-number">
                      <p class="right-text1">24/7 Support</p>
                      <span class="right-text2"><a href="tel:+44 20 3287 7868">+44 20 3287 7868</a></span>
                  </div>
              </div>

          </div>
          <div class="col-xs-2 col-sm-6 visible-xs visible-sm mobile-trigger">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 header-next">
            <?php
            wp_nav_menu( array(
                    'menu'              => 'right-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'container collapse navbar-collapse no-padding',
                    'container_id'      => '',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
        </div>

    </div>

</nav>
<?php if (get_post_type()=='product'){?>
<?php } else { ?>
    <div class="container out-of-menu hidden">
        <div class="visible-xs">
            <div class="text-center top-menu-fixed-issues">
                <span class="action-color"><i class="mb-icon mb-icon-connection"></i>  </span> Mobile Phone Signal Booster
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
<?php } ?>
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
<?php ?>
<?php if (get_post_type()=='post'){?>
    <?php if(is_single()){ ?>
    <div class="container-fluid page-header-bg full-center" style="height: unset; padding-left: 0px; padding-right: 0px;">
        <?php if (get_the_post_thumbnail_url(null, 'full')){?>
        <img src="<?php echo get_the_post_thumbnail_url(null, 'full') ?>" alt="<?php
        $url = array_reverse( explode('/', $_SERVER["REQUEST_URI"]) );
        echo str_replace( "-", " ", $url[1] );
        ?>" height="auto" width="100%">
        <?php } else {?>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/antenna-bg.jpg" alt="<?php
            $url = array_reverse( explode('/', $_SERVER["REQUEST_URI"]) );
            echo str_replace( "-", " ", $url[1] );
            ?>" height="auto" width="100%">
        <?php } ?>
    </div>
    <?php } else{ ?>
    <div class="container-fluid page-header-bg full-center" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/antenna-bg.jpg')">
        <div class="overlay"></div>
        <div class="row">
            <h2 class="page-title">
                <?php
                $url = array_reverse( explode('/', $_SERVER["REQUEST_URI"]) );
                echo str_replace( "-", " ", $url[1] );
                ?>
            </h2>
        </div>
    </div>
    <?php }?>
<?php } elseif ((get_post_type()=='product')) {

} else{ ?>
    <div class="container-fluid page-header-bg full-center" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/antenna-bg.jpg')">
        <div class="overlay"></div>
        <div class="row">
            <h2 class="page-title">
                <?php
                $url = array_reverse( explode('/', $_SERVER["REQUEST_URI"]) );
                echo str_replace( "-", " ", $url[1] );
                ?>
            </h2>
        </div>
    </div>
<?php } ?>


  <script type="text/javascript" src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function(){
        jQuery('.sgr-custom-taxonomies-menu ul').hide();
      });
    </script>
<?php endif; ?>
