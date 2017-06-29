<?php

/*
Widget Name: Immagine a rimpire le colonne
Description: Widget che permette di creare immagini che riempano le colonne
Author: Besposken Studio
Author URI: http://www.bspkn.it
*/

class Eduma_Image extends SiteOrigin_Widget  {
	function get_template_name($instance) {
        return 'simple';
    }

    function get_style_name($instance) {
        return 'tpl';
    }
    function __construct() {
		parent::__construct(
			'eduma-cover-image',
			__('Immagine per la colonna', 'siteorigin-panels'),
			array(
				'description' => __('Widget che permette di creare immagini che riempano le colonne', 'siteorigin-panels'),
				'default_style' => 'simple',
				'panels_groups' => array('mytheme')
			),
			array(),
			array(
				'image' => array(
					'type' => 'media',
					// TRANSLATORS: Uniform Resource Locator
					'label' => __('Immagine', 'siteorigin-panels'),
					'choose' => __( 'Scegli immagine', 'widget-form-fields-text-domain' ),
			        'update' => __( 'Aggiorna immagine', 'widget-form-fields-text-domain' ),
			        'library' => 'image',
			        'fallback' => true
				),
				'type' => array(
					'type' => 'select',
					'label' => __('Riempimento', 'siteorigin-panels'),
					'default' => 'contain',
					'options' => array(
						'contain' => 'Adatta',
						'cover' => 'Copri'
					)
				),
				'position' => array(
					'type' => 'select',
					// TRANSLATORS: Uniform Resource Locator
					'label' => __('Posizione', 'siteorigin-panels'),
					'default' => 'center',
					'options' => array(
						'center' => 'centrata',
						'bottom-center' => 'In basso centrata',
						'top-center' => 'In alto centrata',
						'bottom-left' => 'In basso a sinistra',
						'bottom-right' => 'In basso a destra',
						'top-left' => 'In alto a sinistra',
						'top-right' => 'In alto a sinistra',
					)
				),
			),
			get_template_directory()
		);		
		//$this->add_sub_widget('button', __('Button', 'siteorigin-panels'), 'SiteOrigin_Panels_Widget_Button');
	}
}

siteorigin_widget_register('eduma-cover-image', __FILE__, 'Eduma_Image');

