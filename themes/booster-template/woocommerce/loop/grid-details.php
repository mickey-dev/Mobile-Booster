<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

$providers = get_the_terms($product->id,'provider');
$coverages = get_the_terms($product->id,'coverage');
$frequencies = get_the_terms($product->id,'frequency');

?>



<div class="coverages col-xs-6 no-padding">
    <?php
    /*
     * loop coverages
     */

    foreach ($coverages as $coverage){
        echo '<i class="mb-icon-connection" title="'. get_term_meta($coverage->term_id, 'additional_info',true) .'"></i>';
        echo '<div class="name">';
        echo $coverage->name;
        echo '</div>';
    }
    ?>
</div>

<div class="coverages col-xs-6 no-padding">
    <?php
    /*
     * loop coverages
     */

    foreach ($coverages as $coverage){
        $icon_class = get_term_meta($coverage->term_id, 'icon',true);
        if ($icon_class){
            echo '<i class="'.$icon_class.'" title="'. get_term_meta($coverage->term_id, 'additional_info',true) .'"></i>';
        }
        echo '<div class="name">';
        echo get_term_meta($coverage->term_id, 'alt_name',true);
        echo '</div>';
    }
    ?>
</div>

<div class="providers col-xs-12 no-padding">
    <?php
    /*
     * loop providers
     */

    foreach ( $providers as $provider ){
        echo '<div class="provider">';
            $icon_class = get_term_meta($provider->term_id, 'icon',true);
            if ($icon_class){
                echo '<i class="'.$icon_class.'" title="'. $provider->name .'"></i>';
            }
        echo '</div>';
    }
    ?>
</div>