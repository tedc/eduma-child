<?php

/*
Widget Name: Learn Press Categories
Description: Wdiget per inserire le categorie di Learn Press in formato mosaico.
Author: Besposken Studio
Author URI: http://www.bspkn.it
*/

class Learn_Press_Search extends SiteOrigin_Widget  {
	function get_template_name($instance) {
        return 'simple';
    }

    function get_style_name($instance) {
        return 'tpl';
    }
    function __construct() {
		parent::__construct(
			'learn-press-search',
			__('Cerca corsi, con categorie', 'siteorigin-panels'),
			array(
				'description' => __('Form per cercare i corsi con inclusa tendina per le categorie', 'siteorigin-panels'),
				'default_style' => 'simple',
				'panels_groups' => array('mytheme')
			),
			array(),
			get_template_directory()
		);		
		//$this->add_sub_widget('button', __('Button', 'siteorigin-panels'), 'SiteOrigin_Panels_Widget_Button');
	}
}

siteorigin_widget_register('learn-press-search', __FILE__, 'Learn_Press_Search');

