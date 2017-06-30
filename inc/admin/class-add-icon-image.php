<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://tommcfarlin.com
 * @since      0.1.0
 *
 * @package    Acme_icon_image
 * @subpackage Acme_icon_image/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, the meta box functionality
 * and the JavaScript for loading the Media Uploader.
 *
 * @package    Acme_icon_image
 * @subpackage Acme_icon_image/admin
 * @author     Tom McFarlin <tom@tommcfarlin.com>
 */
class Add_Icon_Image {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $name    The ID of this plugin.
	 */
	private $name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The version of the plugin
	 */
	private $version;

	/**
	 * Initializes the plugin by defining the properties.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {

		$this->name = 'acme-icon-image';
		$this->version = '1.0.0';

	}

	/**
	 * Defines the hooks that will register and enqueue the JavaScriot
	 * and the meta box that will render the option.
	 *
	 * @since 0.1.0
	 */
	public function run() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'course_category_add_form_fields', array( $this, 'add_meta_box' ) );
		add_action( 'edit_course_category',  array( $this, 'save_post' ) );
		add_action( 'create_course_category',  array( $this, 'save_post' ) );
		add_action( 'init',  array( $this, 'register_term_meta_text' ) );

	}

	/**
	 * Renders the meta box on the post and pages.
	 *
	 * @since 0.1.0
	 */
	public function add_meta_box() {

		$screens = array( 'course_category' );

		foreach ( $screens as $screen ) {

			add_meta_box(
				$this->name,
				__('Icon Image', 'uba'),
				array( $this, 'display_featured_icon_image' ),
				$screen,
				'side'
			);

		}

	}

	public function register_term_meta_text($value='') {
		register_meta( 'term', '__term_meta_text', array( $this, 'sanitize_term_meta_text') );
	}

	public function ___register_term_meta_text($value='') {
		return sanitize_text_field ($value);
	}

	/**
	 * Registers the JavaScript for handling the media uploader.
	 *
	 * @since 0.1.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_media();

		wp_enqueue_script(
			$this->name,
			plugin_dir_url( __FILE__ ) . 'js/admin.js',
			array( 'jquery' ),
			$this->version,
			'all'
		);

	}

	/**
	 * Registers the stylesheets for handling the meta box
	 *
	 * @since 0.2.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style(
			$this->name,
			plugin_dir_url( __FILE__ ) . 'css/admin.css',
			array()
		);

	}

	/**
	 * Sanitized and saves the post featured footer image meta data specific with this post.
	 *
	 * @param    int    $term_id    The ID of the post with which we're currently working.
	 * @since    1.0.0
	 */
	public function save_post( $term_id ) {

		if ( isset( $_REQUEST['icon-thumbnail-src'] ) ) {
			update_term_meta( $term_id, 'icon-thumbnail-src', sanitize_text_field( $_REQUEST['icon-thumbnail-src'] ) );
		}

		if ( isset( $_REQUEST['icon-thumbnail-title'] ) ) {
			update_term_meta( $term_id, 'icon-thumbnail-title', sanitize_text_field( $_REQUEST['icon-thumbnail-title'] ) );
		}

		if ( isset( $_REQUEST['icon-thumbnail-alt'] ) ) {
			update_term_meta( $term_id, 'icon-thumbnail-alt', sanitize_text_field( $_REQUEST['icon-thumbnail-alt'] ) );
		}

	}


	/**
	 * Renders the view that displays the contents for the meta box that for triggering
	 * the meta box.
	 *
	 * @param    WP_Post    $post    The post object
	 * @since    0.1.0
	 */
	public function display_featured_icon_image( $post ) {
		include_once( dirname( __FILE__ ) . '/views/admin.php' );
	}

}
