<?php

/*
Widget Name: Eduma Child Magazine
Description: Magazine.
Author: Besposken Studio
Author URI: http://www.bspkn.it
*/

class Eduma_Child_Magazine extends SiteOrigin_Widget  {
	function get_template_name($instance) {
        return 'simple';
    }

    function get_style_name($instance) {
        return 'tpl';
    }
    function __construct() {
		parent::__construct(
			'eduma-child-magazine',
			__('Eduma Magazine', 'siteorigin-panels'),
			array(
				'description' => __('Form per cercare i corsi con inclusa tendina per le categorie', 'siteorigin-panels'),
				'default_style' => 'simple',
				'panels_groups' => array('mytheme')
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Titolo', 'siteorigin-panels'),
				),
				'number' => array(
					'type' => 'number',
					// TRANSLATORS: Uniform Resource Locator
					'label' => __('Quantità (dopo la prima)', 'siteorigin-panels'),
				),
				'instagram' => array(
					'type' => 'text',
					'label' => __('Shortcode instagram', 'uba')
				),
				'instagram_link' => array(
					'type' => 'text',
					'label' => __('Link instagram', 'uba')
				),
				'red' => array(
					'type' => 'checkbox',
					'label' => __('Rosso a destra', 'uba'),
					'default' => true
				)
			),
			get_template_directory()
		);		
		//$this->add_sub_widget('button', __('Button', 'siteorigin-panels'), 'SiteOrigin_Panels_Widget_Button');
	}
}

siteorigin_widget_register('eduma-child-magazine', __FILE__, 'Eduma_Child_Magazine');

