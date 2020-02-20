<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

$providers = get_the_terms($product->id,'provider');
$coverages = get_the_terms($product->id,'coverage');
$frequencies = get_the_terms($product->id,'frequency');

?>
<div class="tax-info">
    <?php if ($providers):?>
        <div class="providers tax">
            <div class="slug">
              <?php
              $xx = '';
              foreach ( $providers as $provider ) {
                $xx .= ucwords($provider->slug) .' / ';
              }

              echo rtrim($xx,' /');

              ?>
            </div>       
        </div>
    <?php endif; ?>

    <?php if ( $providers ): ?>
      <div class="tax-items">
        <?php

        foreach ($providers as $provider){
            $icon_class = get_term_meta($provider->term_id, 'icon',true);
            if ($icon_class){
                echo '<i class="'.$icon_class.'" title="'. $provider->name .'"></i>';
            }
        }
        ?>
      </div>
    <?php endif; ?>    

    <?php if ($frequencies): ?>
      <div class="frequencies">
        <?php

        foreach ( $frequencies as $frequency ) {
          echo '<i class="fa fa-signal"></i> '. $frequency->name;
        }

        ?>
      </div>
    <?php endif; ?>

    <?php if ( $coverages ): ?>
      <div class="coverages">
        <?php

        foreach( $coverages as $coverage ) {
          echo '<i class="fa fa-wifi"></i> '. $coverage->name;          
        }

        ?>
      </div>
    <?php endif; ?>     

</div>
