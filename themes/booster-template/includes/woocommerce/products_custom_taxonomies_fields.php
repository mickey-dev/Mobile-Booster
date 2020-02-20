<?php

/*
 *
 *  Start coverage custom taxonomy fields
 *
 */

function coverage_taxonomy_add_meta_fields($tag){

    ?>
    <div class="form-field">
        <label for="alt_name"><?php _e('Coverage alternative name'); ?></label>
        <input type="text" name="alt_name" id="alt_name"/>
    </div>

    <div class="form-field">
        <label for="content"><?php _e('Provider content'); ?></label>
        <?php wp_editor( '', 'content' );?>
    </div>

    <div class="form-field">
        <label for="additional_info"><?php _e('Provider additional info'); ?></label>
        <input type="text" name="additional_info" id="additional_info"/>
    </div>

    <div class="form-field">
        <label for="icon"><?php _e('Provider icon class name'); ?></label>
        <input type="text" name="icon" id="icon"/>
    </div>
    <?php

}

function coverage_taxonomy_edit_page_meta_fields($tag){

    ?>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="alt_name"><?php _e('Coverage alternative name'); ?></label>
        </th>
        <td>
            <input name="alt_name" id="alt_name" type="text" value="<?php echo get_term_meta($tag->term_id, 'alt_name', true); ?>"/>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="content"><?php _e('Provider content'); ?></label>
        </th>
        <td>
            <?php wp_editor( htmlspecialchars_decode( get_term_meta($tag->term_id, 'content', true) ), 'content' );?>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="additional_info"><?php _e('Provider additional info'); ?></label>
        </th>
        <td>
            <input name="additional_info" id="additional_info" type="text" value="<?php echo get_term_meta($tag->term_id, 'additional_info', true); ?>"/>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="icon"><?php _e('Provider icon class name'); ?></label>
        </th>
        <td>
            <input name="icon" id="icon" type="text" value="<?php echo get_term_meta($tag->term_id, 'icon', true); ?>"/>
        </td>
    </tr>
    <?php

}
function coverage_taxonomy_save_meta_fields( $term_id ) {

    if ( isset($_POST['alt_name']) )
        update_term_meta( $term_id, 'alt_name', esc_attr($_POST['alt_name']) );

    if ( isset($_POST['content']) )
        update_term_meta( $term_id, 'content', esc_attr($_POST['content']) );

    if ( isset($_POST['additional_info']) )
        update_term_meta( $term_id, 'additional_info', esc_attr($_POST['additional_info']) );

    if ( isset($_POST['icon']) )
        update_term_meta( $term_id, 'icon', esc_attr($_POST['icon']) );

}

add_action( 'coverage_add_form_fields', 'coverage_taxonomy_add_meta_fields', 10, 1 );
add_action( 'coverage_edit_form_fields', 'coverage_taxonomy_edit_page_meta_fields', 10, 1 );
add_action( 'created_coverage', 'coverage_taxonomy_save_meta_fields', 10, 1);
add_action( 'edited_coverage', 'coverage_taxonomy_save_meta_fields', 10, 1);

/*
 *
 *  End coverage custom taxonomy fields
 *
 */


/*
 *
 *  Start frequency custom taxonomy fields
 *
 */

function frequency_taxonomy_add_meta_fields($tag){

    ?>
    <div class="form-field">
        <label for="alt_name"><?php _e('Provider alternative name'); ?></label>
        <input type="text" name="alt_name" id="alt_name"/>
    </div>

    <div class="form-field">
        <label for="content"><?php _e('Provider content'); ?></label>
        <?php wp_editor( '', 'content' );?>
    </div>

    <div class="form-field">
        <label for="additional_info"><?php _e('Provider additional info'); ?></label>
        <input type="text" name="additional_info" id="additional_info"/>
    </div>

    <div class="form-field">
        <label for="icon"><?php _e('Provider icon class name'); ?></label>
        <input type="text" name="icon" id="icon"/>
    </div>
    <?php

}

function frequency_taxonomy_edit_page_meta_fields($tag){

    ?>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="alt_name"><?php _e('Provider alternative name'); ?></label>
        </th>
        <td>
            <input name="alt_name" id="alt_name" type="text" value="<?php echo get_term_meta($tag->term_id, 'alt_name', true); ?>"/>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="content"><?php _e('Provider content'); ?></label>
        </th>
        <td>
            <?php wp_editor( htmlspecialchars_decode( get_term_meta($tag->term_id, 'content', true) ), 'content' );?>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="additional_info"><?php _e('Provider additional info'); ?></label>
        </th>
        <td>
            <input name="additional_info" id="additional_info" type="text" value="<?php echo get_term_meta($tag->term_id, 'additional_info', true); ?>"/>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="icon"><?php _e('Provider icon class name'); ?></label>
        </th>
        <td>
            <input name="icon" id="icon" type="text" value="<?php echo get_term_meta($tag->term_id, 'icon', true); ?>"/>
        </td>
    </tr>
    <?php

}
function frequency_taxonomy_save_meta_fields( $term_id ) {

    if ( isset($_POST['alt_name']) )
        update_term_meta( $term_id, 'alt_name', esc_attr($_POST['alt_name']) );

    if ( isset($_POST['content']) )
        update_term_meta( $term_id, 'content', esc_attr($_POST['content']) );

    if ( isset($_POST['additional_info']) )
        update_term_meta( $term_id, 'additional_info', esc_attr($_POST['additional_info']) );

    if ( isset($_POST['icon']) )
        update_term_meta( $term_id, 'icon', esc_attr($_POST['icon']) );

}

add_action( 'frequency_add_form_fields', 'frequency_taxonomy_add_meta_fields', 10, 1 );
add_action( 'frequency_edit_form_fields', 'frequency_taxonomy_edit_page_meta_fields', 10, 1 );
add_action( 'created_frequency', 'frequency_taxonomy_save_meta_fields', 10, 1);
add_action( 'edited_frequency', 'frequency_taxonomy_save_meta_fields', 10, 1);

/*
 *
 *  End frequency custom taxonomy fields
 *
 */


/*
 *
 *  Start provider custom taxonomy fields
 *
 */

function provider_taxonomy_add_meta_fields($tag){
    // remove whitespace
    $countries = get_countries();

    ?>
    <div class="form-field">
        <label for="alt_name"><?php _e('Provider alternative name'); ?></label>
        <input type="text" name="alt_name" id="alt_name"/>
    </div>

    <div class="form-field">
        <label for="country"><?php _e('Provider Country'); ?></label>
        <select name="country">
            <?php
            foreach ($countries as $country){
                echo "<option value='$country[0]' >$country[1]</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-field">
        <label for="additional_info"><?php _e('Provider additional info'); ?></label>
        <input type="text" name="additional_info" id="additional_info"/>
    </div>

    <div class="form-field">
        <label for="content"><?php _e('Provider content'); ?></label>
        <?php wp_editor( '', 'content' );?>
    </div>

    <div class="form-field">
        <label for="icon"><?php _e('Provider icon class name'); ?></label>
        <input type="text" name="icon" id="icon"/>
    </div>
    <?php

}

function provider_taxonomy_edit_page_meta_fields($tag){
    // remove whitespace
    $countries = get_countries();
    ?>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="alt_name"><?php _e('Provider alternative name'); ?></label>
        </th>
        <td>
            <input name="alt_name" id="alt_name" type="text" value="<?php echo get_term_meta($tag->term_id, 'alt_name', true); ?>"/>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="country"><?php _e('Provider Country'); ?></label>
        </th>
        <td>
            <select name="country">
                <?php
                    foreach ($countries as $country){
                        $selected = (get_term_meta($tag->term_id, 'country', true) == $country[0]) ? "selected":"";

                        echo "<option value='$country[0]' $selected>$country[1]</option>";
                    }
                ?>
            </select>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="additional_info"><?php _e('Provider additional info'); ?></label>
        </th>
        <td>
            <input name="additional_info" id="additional_info" type="text" value="<?php echo get_term_meta($tag->term_id, 'additional_info', true); ?>"/>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="content"><?php _e('Provider content'); ?></label>
        </th>
        <td>
            <?php wp_editor( htmlspecialchars_decode( get_term_meta($tag->term_id, 'content', true) ), 'content' );?>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="icon"><?php _e('Provider icon class name'); ?></label>
        </th>
        <td>
            <input name="icon" id="icon" type="text" value="<?php echo get_term_meta($tag->term_id, 'icon', true); ?>"/>
        </td>
    </tr>
    <?php

}
function provider_taxonomy_save_meta_fields( $term_id ) {

    if ( isset($_POST['alt_name']) )
        update_term_meta( $term_id, 'alt_name', esc_attr($_POST['alt_name']) );

    if ( isset($_POST['country']) )
        update_term_meta( $term_id, 'country', esc_attr($_POST['country']) );

    if ( isset($_POST['content']) )
        update_term_meta( $term_id, 'content', esc_attr($_POST['content']) );

    if ( isset($_POST['additional_info']) )
        update_term_meta( $term_id, 'additional_info', esc_attr($_POST['additional_info']) );

    if ( isset($_POST['icon']) )
        update_term_meta( $term_id, 'icon', esc_attr($_POST['icon']) );

}

add_action( 'provider_add_form_fields', 'provider_taxonomy_add_meta_fields', 10, 1 );
add_action( 'provider_edit_form_fields', 'provider_taxonomy_edit_page_meta_fields', 10, 1 );
add_action( 'created_provider', 'provider_taxonomy_save_meta_fields', 10, 1);
add_action( 'edited_provider', 'provider_taxonomy_save_meta_fields', 10, 1);

/*
 *
 *  End provider custom taxonomy fields
 *
 */