<?php

/*
Widget Name: Icona con Link
Author: Besposken Studio
Author URI: http://www.bspkn.it
*/

class Icon_Link extends SiteOrigin_Widget  {
	function get_template_name($instance) {
        return 'simple';
    }

    function get_style_name($instance) {
        return 'tpl';
    }
    function __construct() {
		parent::__construct(
			'icon-link',
			__('Icona con link', 'siteorigin-panels'),
			array(
				'description' => __('Icona con link', 'siteorigin-panels'),
				'default_style' => 'simple',
				'panels_groups' => array('mytheme')
			),
			array(),
			array(
				'icon' => array(
					'type' => 'text',
					'label' => __('Icona', 'siteorigin-panels'),
				),
				'link' => array(
					'type' => 'text',
					'label' => __('Link', 'uba')
				),
				'color' => array(
					'type' => 'color',
					'label' => __('Colore', 'uba')
				),
				'color_hover' => array(
					'type' => 'color',
					'label' => __('Colore hover', 'uba')
				),
				'blank' => array(
					'type' => 'checkbox',
					'label' => __('Apri link in nuova finestra', 'uba'),
					'default' => false
				)
			),
			get_template_directory()
		);		
		//$this->add_sub_widget('button', __('Button', 'siteorigin-panels'), 'SiteOrigin_Panels_Widget_Button');
	}
}

siteorigin_widget_register('icon-link', __FILE__, 'Icon_Link');

