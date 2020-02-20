<?php
/**
 * Example functions to reference for developers.
 *
 * @package WordPress
 * @subpackage Custom Meta Boxes
 */

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes Existing metaboxes.
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	/**
	 * Example of all available fields.
	 */

	
	// PAGE
	$meta_boxes[] = array(
		 'title'	=> 'Page Title & Description',
		 'pages' 	=> 'page',
		 'fields'	=> array(
			array(
				 'id' 	=> 'title',
				 'name' => 'Title',
				 'type'	=> 'text',
				 'cols'	=> 12
			),

			array(
			 	'id'	=> 'description',
			 	'name'	=> 'Description',
			 	'type'	=> 'textarea',
			 	'cols'	=> 12
			)
		 )
	 );

	// Page How it Works
	$meta_boxes[] = array(
		'title'		=> 'Page Content',
		'pages'		=> 'page',
		'show_on' => array('page-template' => array ('page-how-it-works.php')),
		'fields'	=> array(
			array(
				'id'	=> 'the_group1',
				'name' => '#1',
				'type'	=> 'group',
				'cols'	=> 6,
				'fields' => array(
					array(
						'id'	=> 'title',
						'name'	=> 'Title',
						'type'	=> 'text',
						'cols'  => 12
					),

					array(
						'id'   	=> 'image',
						'name' 	=> 'Image',
						'type' 	=> 'image',
						'cols' 	=> 12
					),

					array(
						'id'	=> 'desc',
						'name'	=> 'Description',
						'type'	=> 'textarea',
						'rows'	=> 7,
						'cols'	=> 12
					)
				)
			),

			array(
				'id'	=> 'the_group2',
				'name' => '#2',
				'type'	=> 'group',
				'cols'	=> 6,
				'fields' => array(
					array(
						'id'	=> 'title',
						'name'	=> 'Title',
						'type'	=> 'text',
						'cols'  => 12
					),

					array(
						'id'   => 'image',
						'name' => 'Image',
						'type' => 'image',
						'cols' => 12,
					),

					array(
						'id'	=> 'desc',
						'name'	=> 'Description',
						'type'	=> 'textarea',
						'rows'	=> 7,
						'cols'	=> 12
					)					
				)
			)			
		)
	);

	return $meta_boxes;



}
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
