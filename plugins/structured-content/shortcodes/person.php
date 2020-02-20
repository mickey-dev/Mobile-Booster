<?php
/**
 * structuredcontent
 * person.php
 *
 *
 * @category Production
 * @author anl
 * @package  Default
 * @date     2019-07-13 00:49
 * @license  http://structuredcontent.com/license.txt structuredcontent License
 * @version  GIT: 1.0
 * @link     https://structuredcontent.com/
 */
?>
<?php if ( ! isset( $atts['html'] ) || $atts['html'] === 'true' ) : ?>
    <section class="<?php echo ( empty( $atts['css_class'] ) ) ? 'sc_fs_person sc_card' : $atts['css_class']; ?>">
        <div class="sc_row">
            <div class="sc_grey-box">
                <div class="sc_box-label">
					<?php echo __( 'Personal', 'structured-content' ) ?>
                </div>
                <div class="sc_company">
                    <div class="sc_person-infos">
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Name', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-person__personName">
								<?php echo $atts['person_name'] ?>
                            </div>
                        </div>
                        <div class="sc_input-group">
                            <div class="sc_input-label">
								<?php echo __( 'Job Title', 'structured-content' ) ?>
                            </div>
                            <div class="wp-block-structured-content-person__jobTitle">
								<?php echo $atts['job_title'] ?>
                            </div>
                        </div>
                    </div>
					<?php if ( ! empty( $atts['image_url'] ) ) : ?>
                        <div class="sc_person-image">
                            <div class="sc_input-group">
                                <div class="sc_input-label">
									<?php echo __( 'Image', 'structured-content' ) ?>
                                </div>
                                <div>
                                    <figure class="sc_person-image-wrapper">
                                        <a href="<?php echo $atts['image_url']; ?>" title="<?php echo $atts['image_alt']; ?>">
                                            <img src="<?php echo $atts['thumbnail_url']; ?>" alt="<?php echo $atts['image_alt']; ?>"/>
                                        </a>
                                        <meta content="<?php echo $atts['image_url'] ?>">
                                        <meta content="<?php echo $atts['image_size'][0]; ?>">
                                        <meta content="<?php echo $atts['image_size'][1]; ?>">
                                    </figure>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
            <div class="sc_grey-box">
                <div class="sc_box-label">
					<?php echo __( 'Contact', 'structured-content' ) ?>
                </div>
                <div class="sc_input-group">
                    <div class="sc_input-label">
						<?php echo __( 'E-Mail', 'structured-content' ) ?>
                    </div>
                    <div class="wp-block-structured-content-person__email">
                        <a href="mailto:<?php echo $atts['email'] ?>"><?php echo $atts['email'] ?></a>
                    </div>
                </div>
                <div class="sc_input-group">
                    <div class="sc_input-label">
						<?php echo __( 'URL', 'structured-content' ) ?>
                    </div>
                    <div class="wp-block-structured-content-person__url">
                        <a href="<?php echo $atts['url'] ?>"><?php echo $atts['url'] ?></a>
                    </div>
                </div>
                <div class="sc_input-group">
                    <div class="sc_input-label">
						<?php echo __( 'Telephone', 'structured-content' ) ?>
                    </div>
                    <div class="wp-block-structured-content-person__telephone">
                        <a href="tel:<?php echo $atts['telephone'] ?>"><?php echo $atts['telephone'] ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sc_row">
            <div class="sc_grey-box">
                <div class="sc_box-label">
					<?php echo __( 'Address', 'structured-content' ) ?>
                </div>
                <div class="sc_input-group">
                    <div class="sc_input-label">
						<?php echo __( 'Street', 'structured-content' ) ?>
                    </div>
                    <div class="wp-block-structured-content-person__streetAddress">
						<?php echo $atts['street_address'] ?>
                    </div>
                </div>
                <div class="sc_row">
                    <div class="sc_input-group">
                        <div class="sc_input-label">
							<?php echo __( 'Postal Code', 'structured-content' ) ?>
                        </div>
                        <div class="wp-block-structured-content-person__postalCode">
							<?php echo $atts['postal_code'] ?>
                        </div>
                    </div>
                    <div class="sc_input-group">
                        <div class="sc_input-label">
							<?php echo __( 'Locality', 'structured-content' ) ?>
                        </div>
                        <div class="wp-block-structured-content-person__addressLocality">
							<?php echo $atts['address_locality'] ?>
                        </div>
                    </div>
                </div>
                <div class="sc_row">
                    <div class="sc_input-group">
                        <div class="sc_input-label">
							<?php echo __( 'Country ISO Code', 'structured-content' ) ?>
                        </div>
                        <div class="wp-block-structured-content-person__addressCountry">
							<?php echo $atts['address_country'] ?>
                        </div>
                    </div>
                    <div class="sc_input-group">
                        <div class="sc_input-label">
							<?php echo __( 'Region ISO Code', 'structured-content' ) ?>
                        </div>
                        <div class="wp-block-structured-content-person__addressRegion">
							<?php echo $atts['address_region'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sc_grey-box">
                <div class="sc_box-label">
					<?php echo __( 'Colleague', 'structured-content' ) ?>
                </div>
                <div class="sc_input-group">
                    <div class="sc_input-label">
						<?php echo __( 'URL', 'structured-content' ) ?>
                    </div>
                    <div class="wp-block-structured-content-person__colleague_url">
                        <ul>
							<?php if ( ! empty( $atts['links'] ) ) {
								foreach ( $atts['links'] as $link => $url ) { ?>
                                    <li><a href="<?php echo $url ?>"><?php echo $url ?></a></li>
								<?php }
							} ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Person",
        "address" : {
            "@type" : "PostalAddress",
            "streetAddress" : "<?php echo $atts['street_address'] ?>",
            "addressLocality" : "<?php echo $atts['address_locality'] ?>",
            "addressRegion" : "<?php echo $atts['address_region'] ?>",
            "postalCode" : "<?php echo $atts['postal_code'] ?>",
            "addressCountry": "<?php echo $atts['address_country'] ?>"
        },
        "colleague": [
            <?php
	foreach ( $atts['links'] as $link => $url ) :
		echo '"' . $url . '"';
		echo $link !== count( $atts['links'] ) - 1 ? ", \n" : " \n";
	endforeach;
	?>
        ],
        "email": "mailto:<?php echo $atts['email']; ?>",
        "image": "<?php echo wp_get_attachment_url( $atts['image_id'] ) ?>",
        "jobTitle": "<?php echo $atts['job_title']; ?>",
        "name": "<?php echo $atts['person_name']; ?>",
        "telephone": "<?php echo $atts['telephone']; ?>",
        "url": "<?php echo $atts['url']; ?>"
    }



</script>
