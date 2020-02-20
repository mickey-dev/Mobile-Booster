<?php
/**
 * structuredcontent
 * event.php
 *
 *
 * @category Production
 * @author anl
 * @package  Default
 * @date     2019-06-26 22:10
 * @license  http://structuredcontent.com/license.txt structuredcontent License
 * @version  GIT: 1.0
 * @link     https://structuredcontent.com/
 */ ?>
<?php
foreach ( $atts['elements'] as $element ) {
	if ( ! isset( $element['visible'] ) || $element['visible'] == 1 ) : ?>
        <section class="<?php echo ( empty( $atts['css_class'] ) ) ? 'sc_fs_event sc_card' : $atts['css_class']; ?>">
			<?php
			echo $atts['headline_open_tag'];
			echo esc_attr( $element['title'] );
			echo $atts['headline_close_tag'];
			?>
			<?php if ( ! empty( $element['image_id'] ) ) : ?>
                <figure>
                    <a href="<?php echo $element['img_url']; ?>" title="<?php echo $element['img_alt']; ?>">
                        <img src="<?php echo $element['thumbnail_url']; ?>" alt="<?php echo $element['img_alt']; ?>"/>
                    </a>
                    <meta content="<?php echo $element['img_url'] ?>">
                    <meta content="<?php echo $element['img_size'][0]; ?>">
                    <meta content="<?php echo $element['img_size'][1]; ?>">
                </figure>
			<?php endif; ?>
            <p>
				<?php echo htmlspecialchars_decode( do_shortcode( $element['description'] ) ); ?>
            </p>
            <div class="sc_row w-100">
                <div class="sc_grey-box">
                    <div class="sc_box-label">
						<?php echo __( 'Event Meta', 'structured-content' ) ?>
                    </div>
                    <div class="sc_company">
                        <div class="sc_company-infos">
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Name', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__location">
									<?php echo $element['event_location'] ?>
                                </div>
                            </div>
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Start Date', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__sameAs">
									<?php echo date( 'd.m.Y H:i', strtotime( $element['start_date'] ) ) ?>
                                </div>
                            </div>
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'End Date', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__sameAs">
									<?php echo date( 'd.m.Y H:i', strtotime( $element['end_date'] ) ) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sc_grey-box">
                    <div class="sc_box-label">
						<?php echo __( 'EVENT Location', 'structured-content' ) ?>
                    </div>
                    <div class="sc_input-group">
                        <div class="sc_input-label">
							<?php echo __( 'Street', 'structured-content' ) ?>
                        </div>
                        <div class="wp-block-structured-content-event__streetAddress">
							<?php echo $element['street_address'] ?>
                        </div>
                    </div>
                    <div class="sc_row">
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Postal Code', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__postalCode">
								<?php echo $element['postal_code'] ?>
                            </div>
                        </div>
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Locality', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__addressLocality">
								<?php echo $element['address_locality'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="sc_row">
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Country ISO Code', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__addressCountry">
								<?php echo $element['address_country'] ?>
                            </div>
                        </div>
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Region ISO Code', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__addressRegion">
								<?php echo $element['address_region'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sc_row w-100">
				<?php if ( $element['currency_code'] && $element['price'] && $element['offer_valid_from'] && $element['offer_availability'] && $element['offer_url'] ) : ?>
                    <div class="sc_grey-box">
                        <div class="sc_box-label">
							<?php echo __( 'PERFORMER', 'structured-content' ) ?>
                        </div>
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Type', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__offer_availability">
								<?php echo $element['performer'] ?>
                            </div>
                        </div>
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Name', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__offer_url">
								<?php echo $element['performer_name'] ?>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
				<?php if ( $element['currency_code'] && $element['price'] && $element['offer_valid_from'] && $element['offer_availability'] && $element['offer_url'] ) : ?>
                    <div class="sc_grey-box">
                        <div class="sc_box-label">
							<?php echo __( 'Offer', 'structured-content' ) ?>
                        </div>
                        <div class="sc_row">
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Availability', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__offer_availability">
									<?php echo $element['offer_availability'] ?>
                                </div>
                            </div>
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Ticket Website', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__offer_url">
                                    <a href="<?php echo $element['offer_url'] ?>"><?php echo $element['offer_url'] ?></a>
                                </div>
                            </div>
                        </div>

                        <div class="sc_row">
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Currency ISO Code', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__currency">
									<?php echo $element['currency_code'] ?>
                                </div>
                            </div>
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Price', 'structured-content' ) ?>
                                </div>
                                <div class="wp-block-structured-content-event__price">
									<?php echo number_format_i18n( $element['price'], 2 ) ?>
                                </div>
                            </div>
                        </div>
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Valid From', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-event__valid_from">
								<?php echo date( 'd.m.Y h:i', strtotime( $element['offer_valid_from'] ) ); ?>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </section>
	<?php endif;
}
foreach ( $atts['elements'] as $element ) { ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "name": "<?php echo $element['title'] ?>",
        "startDate": "<?php echo $element['start_date'] ?>",
        "endDate": "<?php echo $element['end_date'] ?>",
        "location": {
            "@type": "Place",
            "name": "<?php echo $element['event_location'] ?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress" : "<?php echo $element['street_address'] ?>",
				"addressLocality" : "<?php echo $element['address_locality'] ?>",
				"postalCode" : "<?php echo $element['postal_code'] ?>",
				"addressRegion" : "<?php echo $element['address_region'] ?>",
				"addressCountry": "<?php echo $element['address_country'] ?>"
            }
        },
      <?php if ( ! empty( $element['image_id'] ) ): ?>
            "image" : ["<?php echo wp_get_attachment_url( $element['image_id'] ) ?>"],
    <?php endif; ?>
    <?php if ( $element['currency_code'] && $element['price'] && $element['offer_valid_from'] && $element['offer_availability'] && $element['offer_url'] ) : ?>
        "offers": {
            "@type": "Offer",
            "url": "<?php echo $element['offer_url'] ?>",
            "price": "<?php echo number_format( $element['price'], 2, '.', '' ) ?>",
            "priceCurrency": "<?php echo $element['currency_code'] ?>",
            "availability": "https://schema.org/<?php echo $element['offer_availability'] ?>",
            "validFrom": "<?php echo $element['offer_valid_from'] ?>"
        },
    <?php endif; ?>
    <?php if ( $element['performer_name'] && $element['performer'] ) : ?>
        "performer": {
            "@type": "<?php echo $element['performer'] ?>",
            "name": "<?php echo $element['performer_name'] ?>"
          },
    <?php endif; ?>
        "description": "<?php echo str_replace( '"', '\"', $element['description'] ); ?>"
    }







    </script>
<?php } ?>