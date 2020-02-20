<?php
/*
 * Inspire Here Please
 */

function get_testimonials() {
  $args = array('post_type' => 'testimonial', 'status' => 'publish', 'post_per_page' => -1);
  $testimonials= new WP_Query( $args );

  if ( $testimonials->have_posts() ) :
    while ( $testimonials->have_posts() ) : $testimonials->the_post() ?>

      <div class="item">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail( array( 100,100 ) );
          }else {
            echo "<img src='". get_template_directory_uri() ."/assets/img/user.png' alt='Mobile Booster'>";
          }
        ?>
        <h4 class="text-blue"><?php the_title(); ?></h4>
  			<div class="desc"><?php the_content();  ?></div>
      </div>

    <?php
    endwhile;
    wp_reset_postdata();
  endif;
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



/* ================
    Kesato & Co.
================ */

require_once( 'cmb/custom-meta-boxes.php' );
require_once( 'cmb/meta-setting.php' );

function get_page_title() {  
  global $post;

  if( is_shop() ){
    $pageID = get_option( 'woocommerce_shop_page_id' );
  }else{
    $pageID = $post->ID;
  }

  ?>

  <section pageID="<?php echo $pageID; ?>" id="contact" class="full-background full-center" style="background-image:url('<?php echo get_template_directory_uri() ?>/assets/img/globe.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
              <h1 class="text-white">
                <?php

                $pageTitle = get_post_meta( $pageID, 'title', true );
                $pageDesc  = get_post_meta( $pageID, 'description', true );                

                if ( term_description() ) { 
                  $url = array_reverse( explode('/', $_SERVER["REQUEST_URI"]) );
                  echo str_replace( "-", " ", $url[1] );
                } else {
                  if ( $pageTitle ) {
                    echo $pageTitle;
                  }else {
                    echo 'Mobile Phone Signal Booster';
                  }
                }

                ?>
            </h1>
              <div class="description">
                <?php 

                if ( term_description() ) {
                  echo term_description();
                }else {
                  if ( $pageDesc ) {
                    echo $pageDesc;
                  }else {
                    echo '
Mobile Phone Signal Boosters will help any property that is suffering from poor mobile signal in your homes or offices. They have the latest technology to boost all voice and data signals for UK mobile operators. We have 5G mobile boosters in stock too which can help you enjoy the best quality voice and data signals from even the remotest part of the country where mobile signal is almost non-existent.';
                  }
                }

                ?>
              </div>
          </div>
        </div>
      </div>
    </section>

  <?php
}


function how_it_works() { ?>
  <section id="how-it-works">
    <div class="container">
      <div class="row">
        <div class="col-xs-12-col-sm-12 title center"><h2>How it works</h2></div>
        <div class="col-xs-12 col-sm-12 gambar"><img src="<?php echo get_template_directory_uri() ?>/assets/img/how-it-works.svg" alt="How it works"></div>

        <div class="col-xs-12 col-sm-4 how satu">
          <div class="text siji">
            <span class="numb">1</span> <b><?php echo theme_option('1st_title'); ?></b><br>

            <p><?php echo theme_option('1st_description') ?></p>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 how dua">
          <div class="text loro">
            <span class="numb">2</span> <b><?php echo theme_option('2nd_title'); ?></b> <br>

            <p> <?php echo theme_option('2nd_description'); ?> </p>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 how tiga">
          <div class="text telu">
            <span class="numb">3</span> <b><?php echo theme_option('3rd_title'); ?></b> <br>

            <p> <?php echo theme_option('3rd_description'); ?> </p>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 go-shop center">
          <a href="<?php echo home_url(); ?>/how-it-works" class="button button-filled angle-right btn-see">SEE HOW OUR BOOSTERS WORKS</a>
          <a href="<?php echo home_url(); ?>/shop" class="button button-filled angle-right btn-shop" style="display: none; max-width: 300px; margin: 0 auto;">SHOP OUR BOOSTER</a>
        </div>
      </div>
    </div>
  </section>

  <?php
}