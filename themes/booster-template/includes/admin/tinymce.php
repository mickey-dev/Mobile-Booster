<?php
function fb_mce_editor_buttons( $buttons ) {
    $buttons[0] = 'styleselect';
    return $buttons;
}
add_filter( 'mce_buttons', 'fb_mce_editor_buttons' );

function tuts_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Paragraph',
            'block' => 'p',
        ),
        array(
            'title' => 'Heading 1',
            'block' => 'h1',
        ),
        array(
            'title' => 'Heading 2',
            'block' => 'h2',
        ),
        array(
            'title' => 'Heading 3',
            'block' => 'h3',
        ),
        array(
            'title' => 'Heading 4',
            'block' => 'h4',
        ),
        array(
            'title' => 'Heading 5',
            'block' => 'h5',
        ),
        array(
            'title' => 'Heading 6',
            'block' => 'h6',
        ),
        array(
            'title' => 'Section',
            'block' => 'section',
            'classes' => 'section',
            'wrapper' => true
        ),
        array(
            'title' => 'Container',
            'block' => 'div',
            'classes' => 'container',
            'wrapper' => true
        ),
        array(
            'title' => 'Read More Link',
            'block' => 'a',
            'classes' => 'more-link',
            'attributes' => array(
                'href' => '#'
            )
        ),
        array(
            'title' => 'Read More Content',
            'block' => 'div',
            'classes' => 'more-content',
            'wrapper' => true
        ),
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;

}
add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );
