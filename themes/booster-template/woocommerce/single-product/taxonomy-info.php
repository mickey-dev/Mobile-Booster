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

    <div class="tex-inline">
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

    <div class="tex-home">
        <div class="tex-home-right">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/tax-home-icon.jpg" alt=""">
        </div>

        <div class="tex-home-left">
            <p>Ideal for:</p>
            <span>Smaller offices, studios, and homes</span>
        </div>

    </div>



</div>
