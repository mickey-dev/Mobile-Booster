<?php

get_header();

?>

<section id="home-slider">
  <div class="container-fluid">
    <div class="row">
       <?php
        echo do_shortcode('[smartslider3 slider=2]');
      ?>
      


      <div class="col-xs-12 col-sm-12 guarantee">
        <div class="container header-bottom">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 header-bottom-icons">
                <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/1.png" alt="Mobile Booster Guarantee">
                <div class="header-icons-span">
                    <span>Free Delivery</span> <br> <span>in the UK</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 header-bottom-icons">
                <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/1.png" alt="Mobile Booster Guarantee">
                <div class="header-icons-span">
                    <span>30 Day Money-Back</span> <br> <span>Guarantee</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 header-bottom-icons">
                <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/1.png" alt="Mobile Booster Guarantee">
                <div class="header-icons-span">
                    <span>Five Bar Signal</span> <br> <span>Guarantee</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 header-bottom-icons">
                <img class="combine1 sprite-guarantee" src="<?php echo get_template_directory_uri() ?>/assets/img/1.png" alt="Mobile Booster Guarantee">
                <div class="header-icons-span">
                    <span>Works On Every </span> <br> <span>Network & Carrier</span>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="filter" class="section filter-custom filter-custom2">
    <?php echo do_shortcode('[filter title="Try Our Product Wizard"]'); ?>
</section>

<section id="home_featured">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 home_featured title">
        <h2 class="text-center">Our Best Sellers</h2>
        <?php //echo do_shortcode('[featured_products per_page="4" columns="4"]'); ?>
          <div class="featured-items">
              <?php
              $args = array( 'post_type' => 'product', 'meta_key' => '_featured','posts_per_page' => 4,'columns' => '4', 'meta_value' => 'yes' );
              $loop = new WP_Query( $args );

              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                  <li class="product type-product status-publish has-post-thumbnail provider-vodafone provider-o2-mobile provider-id provider-ee provider-3g provider-4g provider-three coverage-up-to-1000-sqm frequency-90018002100mhz tm-has-options last instock sale featured shipping-taxable purchasable product-type-simple">

                      <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" class="woocommerce-LoopProduct-link">

                          <!--              <span class="onsale1">-->
                          <!--                --><?php //woocommerce_show_product_sale_flash( $post, $product ); ?>
                          <!--              </span>-->

                          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" class="attachment-shop_catalog size-shop_catalog wp-post-image" />'; ?>

                          <h3><?php the_title(); ?></h3><br />

                      </a>

                      <?php
                      global $product;
                      $providers = get_the_terms($product->id,'provider');
                      $coverages = get_the_terms($product->id,'coverage');
                      $frequencies = get_the_terms($product->id,'frequency');
                      ?>
                      <div class="featured-details">
                          <div class="coverages col-xs-12 no-padding">
                              <i class="icon-wifi-img meta-icon"></i>
                              <span class="meta_prodtitle">Coverage:</span>
                              <?php

                              foreach ($coverages as $coverage){
                                  echo '<div class="meta-name">';
                                  echo '<span>';
                                  echo $coverage->name;
                                  echo '</span>';
                                  echo '</div>';
                              }
                              ?>
                          </div>

                          <div class="coverages col-xs-12 no-padding">
                              <?php
                              foreach ($coverages as $coverage){
                                  $icon_class = get_term_meta($coverage->term_id, 'icon',true);
                                  echo '<i class="'.$icon_class.' meta-icon"></i>';
                                  echo '<span class="meta_prodtitle">Ideal for:</span>';
                                  echo '<div class="meta-name">';
                                  echo '<span>';
                                  echo get_term_meta($coverage->term_id, 'alt_name',true);
                                  echo '</span>';
                                  echo '</div>';
                              }
                              ?>
                          </div>

                          <div class="providers col-xs-12 no-padding">
                              <div class="meta-prov-title">Providers:</div>
                              <?php
                              echo '<div class="providers_wrapper">';
                              foreach ( $providers as $provider ){
                                  echo '<span class="provider">';
                                  $icon_class = get_term_meta($provider->term_id, 'icon',true);
                                  if ($icon_class){
                                      echo '<i class="'.$icon_class.'" title="'. $provider->name .'"></i>';
                                  }
                                  echo '</span>';
                              }
                              echo '</div>';
                              ?>
                          </div>
                      </div>
                      <div class="featured-actions">
                          <span class="price"><?php echo $product->get_price_html(); ?></span>
                          <a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="button button-filled">Product Details</a>
                      </div>

                  </li>
                  <?php
                  ?>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
          </div>
      </div>
    </div>
  </div>
</section>
<?php how_it_works(); ?>
<section id="what-osbc" class="what-osbc">
    <div class="container">
        <div class="title-box">
            <h1>What Our Signal Boosters Cover</h1>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 osbc-card-wrapper">
                <div class="osbc-card">
                    <img class="osbc-card-img" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home-yellow-icon.png">
                    <h2 class="osbc-card-titile">Homes</h2>
                    <p class="osbc-card-desc">We have mobile boosters that can help you cover whatever area within your home that requires covering.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 osbc-card-wrapper">
                <div class="osbc-card">
                    <img class="osbc-card-img" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/icon-office.png">
                    <h2 class="osbc-card-titile">Offices</h2>
                    <p class="osbc-card-desc">We are offering you the best mobile phone signal booster. Caters for offices ranging from 300 sq. metres to 5000 sq. metres.</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 osbc-card-wrapper">
                <div class="osbc-card">
                    <img class="osbc-card-img" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/icon-hotel.png">
                    <h2 class="osbc-card-titile">Hotels</h2>
                    <p class="osbc-card-desc">We provide you with mobile signal boosters for a hotel of up to 600 sq. metres and another one for up to 1500 sq. meters.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="testimony" class="testimonials">
  <div class="container text-center title">
    <h2 class="text-center">What Our Customers Say</h2>

    <div class="owl-carousel owl-theme content">
      <?php get_testimonials(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
  jQuery('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });
</script>
