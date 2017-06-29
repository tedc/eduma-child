<?php

/*
Widget Name: Learn Press Categories
Description: Widget per inserire le categorie di Learn Press in formato mosaico.
Author: Besposken Studio
Author URI: http://www.bspkn.it
*/

class Learn_Press_Categories extends SiteOrigin_Widget  {
	function get_template_name($instance) {
        return 'simple';
    }

    function get_style_name($instance) {
        return 'tpl';
    }
    function __construct() {
		parent::__construct(
			'learn-press-categories',
			__('Corsi: le categorie', 'siteorigin-panels'),
			array(
				'description' => __('Mostra le categorie dei corsi in formato mosaico', 'siteorigin-panels'),
				'default_style' => 'simple',
				'panels_groups' => array('mytheme')
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Titolo', 'siteorigin-panels'),
				),
				'text' => array(
					'type' => 'textarea',
					'label' => __('Testo', 'siteorigin-panels'),
				),
				'number' => array(
					'type' => 'number',
					// TRANSLATORS: Uniform Resource Locator
					'label' => __('Quantità', 'siteorigin-panels'),
				),
				'red' => array(
					'type' => 'checkbox',
					// TRANSLATORS: Uniform Resource Locator
					'label' => __('Sfondo rosso', 'siteorigin-panels'),
					'value' => 1
				),
			),
			get_template_directory()
		);		
		//$this->add_sub_widget('button', __('Button', 'siteorigin-panels'), 'SiteOrigin_Panels_Widget_Button');
	}
}

siteorigin_widget_register('learn-press-categories', __FILE__, 'Learn_Press_Categories');

