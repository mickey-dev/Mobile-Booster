<?php
/**
 * structured-content
 * class-structuredcontent-tinymce.php
 *
 *
 * @category Production
 * @author anl
 * @package  Default
 * @date     2019-05-27 01:00
 * @license  http://structured-content.com/license.txt structured-content License
 * @version  GIT: 1.0
 * @link     https://structured-content.com/
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load registration for our blocks.
 *
 * @since 1.6.0
 */
class StructuredContent_Register_TinyMCE {


	/**
	 * This plugin's instance.
	 *
	 * @var StructuredContent_Register_TinyMCE
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 */
	public static function register() {
		if ( null === self::$instance ) {
			self::$instance = new StructuredContent_Register_TinyMCE();
		}
	}

	/**
	 * The Plugin version.
	 *
	 * @var string $_slug
	 */
	private $_slug;

	/**
	 * The Constructor.
	 */
	private function __construct() {
		$this->_slug = 'structured-content';

		add_action( 'init', [ $this, 'register_tinymce' ], 99 );
		add_action( 'after_wp_tiny_mce', [ $this, 'tinymce_extra_vars' ] );
	}

	/**
	 * Add actions to enqueue assets.
	 *
	 * @access public
	 */
	public function register_tinymce() {

		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}

		add_filter( 'mce_external_plugins', [ $this, 'add_buttons' ] );
		add_filter( 'mce_buttons', [ $this, 'register_buttons' ] );
	}

	public function add_buttons( $plugin_array ) {
		$plugin_array['structured_content_dropdown'] = STRUCTURED_CONTENT_PLUGIN_URL . 'dist/tinymce.js';

		return $plugin_array;
	}

	public function register_buttons( $buttons ) {
		array_push( $buttons, 'structured_content_dropdown' );

		return $buttons;
	}

	public function tinymce_extra_vars() { ?>
        <script type="text/javascript">
            const structured_content_tinymce = <?php echo json_encode(
					array(
						'structured_content_dropdown_name' => esc_html__( 'Structured Content', 'structured-content' ),
					)
				);
				?>;
        </script><?php
	}
}

StructuredContent_Register_TinyMCE::register();
