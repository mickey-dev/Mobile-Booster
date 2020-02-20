<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


if(!is_product_category('accessories')):

?>

<div class="container-fluid text-center product-list-header hidden-xs hidden">
        <div class="col-xs-12 col-sm-4 no-padding">Model</div>
        <div class="col-xs-12 col-sm-6 no-padding">
            <div class="col-xs-12 col-sm-4">Providers</div>
            <div class="col-xs-12 col-sm-4">Areas</div>
            <div class="col-xs-12 col-sm-4">Frequencies</div>
        </div>
        <div class="col-xs-12 col-sm-2 no-padding">Price</div>
</div>
<?php endif;?>
