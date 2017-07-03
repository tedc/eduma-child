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
		add_action( 'course_category_add_form_fields', array( $this, 'add_form_field_term_meta_icon' ) );
		add_action( 'course_category_edit_form_fields', array( $this, 'add_form_field_term_meta_icon' ) );
		add_action( 'edit_course_category',  array( $this, 'save_term_meta_icon' ) );
		add_action( 'create_course_category',  array( $this, 'save_term_meta_icon' ) );
		add_action( 'init',  array( $this, 'register_term_meta_icon' ) );
		add_filter( 'manage_edit-course_category_columns', array( $this, 'edit_term_columns'), 10, 3 );
		add_filter( 'manage_course_category_custom_column', array( $this, 'manage_term_custom_column'), 10, 3 );
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

	public function register_term_meta_icon($value='') {
		register_meta( 'term', 'icon-thumbnail-src', array( $this, 'sanitize_term_meta_icon') );
	}

	public function sanitize_term_meta_icon($value='') {
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
			get_stylesheet_directory_uri() . '/inc/admin/js/admin.js',
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
			get_stylesheet_directory_uri() . '/inc/admin/css/admin.css',
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

	public function get_term_meta_icon( $term_id ) {
	  $value = get_term_meta( $term_id, 'icon-thumbnail-src', true );
	  $value = $this->sanitize_term_meta_icon( $value );
	  return $value;
	}

	// ADD FIELD TO CATEGORY TERM PAGE


	public function add_form_field_term_meta_icon( $term ) { 
	    include_once( dirname( __FILE__ ) . '/views/admin.php' );
	}


	// ADD FIELD TO CATEGORY EDIT PAGE


	public function edit_form_field_term_meta_icon( $term ) {
	    include_once( dirname( __FILE__ ) . '/views/admin.php' );
	}


// SAVE TERM META (on term edit & create)

	public function save_term_meta_icon( $term_id ) {

	    // verify the nonce --- remove if you don't care
	    if ( ! isset( $_POST['icon-thumbnail-src_nonce'] ) || ! wp_verify_nonce( $_POST['icon-thumbnail-src_nonce'], basename( __FILE__ ) ) )
	        return;

	    $old_value  = $this->get_term_meta_icon( $term_id );
	    $new_value = isset( $_POST['icon-thumbnail-src'] ) ? $this->sanitize_term_meta_icon ( $_POST['icon-thumbnail-src'] ) : '';


	    if ( $old_value && '' === $new_value )
	        delete_term_meta( $term_id, 'icon-thumbnail-src' );

	    else if ( $old_value !== $new_value )
	        update_term_meta( $term_id, 'icon-thumbnail-src', $new_value );
	}

	// MODIFY COLUMNS (add our meta to the list)


	public function edit_term_columns( $columns ) {

	    $columns['icon-thumbnail-src'] = __( 'Icona categoria', 'uba' );

	    return $columns;
	}

// RENDER COLUMNS (render the meta data on a column)


	public function manage_term_custom_column( $out, $column, $term_id ) {

	    if ( 'icon-thumbnail-src' === $column ) {

	        $value  = $this->get_term_meta_icon( $term_id );

	        if ( ! $value )
	            $value = '';

	        $out = sprintf( '<span class="term-meta-text-block" style="" >%s</div>', esc_attr( $value ) );
	    }

	    return $out;
	}

}
