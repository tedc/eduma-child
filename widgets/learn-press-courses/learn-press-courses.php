<?php

/*
Widget Name: Learn Press Courses
Description: Widget per inserire la lista degli ultimi corsi.
Author: Besposken Studio
Author URI: http://www.bspkn.it
*/

class Learn_Press_Courses extends SiteOrigin_Widget  {
	function get_template_name($instance) {
        return 'simple';
    }

    function get_style_name($instance) {
        return 'tpl';
    }
    function __construct() {
		parent::__construct(
			'learn-press-courses',
			__('Gli ultimi corsi', 'siteorigin-panels'),
			array(
				'description' => __('Mostra la lista degli ultimi corsi', 'siteorigin-panels'),
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
					'label' => __('Quantità', 'siteorigin-panels'),
				),
			),
			get_template_directory()
		);		
		//$this->add_sub_widget('button', __('Button', 'siteorigin-panels'), 'SiteOrigin_Panels_Widget_Button');
	}
}

siteorigin_widget_register('learn-press-courses', __FILE__, 'Learn_Press_Courses');

