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
        SiteOrigin_Widgets_Bundle::single()->activate_widget( 'learn-press-search' );
        set_theme_mod( 'bundled_widgets_activated', true );
    }
}
add_filter('admin_init', 'wbexample_activate_bundled_widgets');

function mytheme_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('Uba', 'mytheme'),
        'filter' => array(
            'groups' => array('mytheme')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'mytheme_add_widget_tabs', 20);


// function search_shortcode() {
// 	ob_start();
// 	get_template_part('shortcodes/search');
// 	$form = ob_get_clean();
// 	return $form;
// }
// add_shortcode( 'search-courses', 'search_shortcode' );

//add_action('pre_get_posts', 'search_by_cat');
function search_by_cat($query)
{
    if (is_page(get_option('learn_press_courses_page_id'))) {
        $cat = intval($_GET['course_category']);
        $arr = ($cat > 0) ? array(
        	array(
        		'taxonomy' => 'course_category',
        		'field' => 'term_id',
        		'term' => $cat
        	)
        ) : false;
        $query->query_vars['tax_query'] = $arr;
    }
    return $query;
}