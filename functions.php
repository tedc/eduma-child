<?php

function thim_child_enqueue_styles() {
	if ( is_multisite() ) {
		wp_enqueue_style( 'thim-child-style', get_stylesheet_uri() );
	} else {
		wp_enqueue_style( 'thim-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('eduma-child-theme', get_stylesheet_directory_uri() .'/assets/styles/main.css', ['thim-parent-style'], null);
	}
}

add_action( 'wp_enqueue_scripts', 'thim_child_enqueue_styles', 1000 );

function add_my_awesome_widgets_collection($folders){
	$folders[] = get_template_directory() . '-child/widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_my_awesome_widgets_collection');

function wbexample_activate_bundled_widgets(){
	if( !get_theme_mod('bundled_widgets_activated') ) {
        SiteOrigin_Widgets_Bundle::single()->activate_widget( 'learn-press-categories' );
        set_theme_mod( 'bundled_widgets_activated', true );
    }
}
add_filter('admin_init', 'wbexample_activate_bundled_widgets');

function mytheme_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('My Tab', 'mytheme'),
        'filter' => array(
            'groups' => array('mytheme')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'mytheme_add_widget_tabs', 20);