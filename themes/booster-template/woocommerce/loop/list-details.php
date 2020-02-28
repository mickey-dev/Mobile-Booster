<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

$providers = get_the_terms($product->id,'provider');
$coverages = get_the_terms($product->id,'coverage');
$frequencies = get_the_terms($product->id,'frequency');

?>

<div class="double-wrapper">
  <div class="coverages-frequencies">
    <?php

    if ($coverages) {
        foreach ( $coverages as $coverage ) {
            echo $coverage->name .' / ';
        }
    }
    if ($frequencies) {

        foreach ($frequencies as $frequency){
            echo $frequency->name;
        }
    }


    ?>
  </div>
</div>

<div class="double-wrapper" style="display: none !important;">
  <div class="col-xs-12 col-sm-6 coverages">
    <?php
    /*
     * loop coverages
     */

    if ($coverages) {
        foreach ($coverages as $coverage){
            $icon_class = get_term_meta($coverage->term_id, 'icon',true);
            if ($icon_class){
                echo '<i class="'.$icon_class.'" title="'. get_term_meta($coverage->term_id, 'additional_info',true) .'"></i>';
            }
            echo '<div class="name">';
            echo $coverage->name;
            echo '</div>';
        }
    }

    ?>
  </div>

  <div class="col-xs-12 col-sm-6 frequencies">
    <?php
    /*
     * loop frequencies
     */
    if ($frequencies) {
        foreach ($frequencies as $frequency){
            echo $frequency->name;
        }
    }

    ?>
  </div>
</div>

<div class="col-xs-12 col-sm-6 providers">
    <?php
    /*
     * loop providers
     */

    if ($providers) {
        foreach ($providers as $provider){
            $icon_class = get_term_meta($provider->term_id, 'icon',true);
            if ($icon_class){
                echo '<i class="'.$icon_class.'" title="'. $provider->name .'"></i>';
            }
        }
    }

    ?>
</div>
