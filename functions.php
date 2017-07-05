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
        SiteOrigin_Widgets_Bundle::single()->activate_widget( 'eduma-cover-image' );
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

include( locate_template( 'inc/add-icon-image.php', false, true ));


function my_learn_press_before_single_course() {
    echo '<div class="course-single-wrapper"><div class="course-single-left">';
}

function my_learn_press_after_single_course() {
    $course = LP()->global['course'];
    $user   = learn_press_get_current_user();

    $is_enrolled      = $user->has( 'enrolled-course', $course->id );
    $require_enrolled = $course->is_require_enrollment();

    $buy_through_membership      = LP()->settings->get( 'buy_through_membership' );

    $list_course_membership = array();
    $hidden_price = false;

    if( function_exists('learn_press_pmpro_check_require_template')) {
        $membership_list = learn_press_pmpro_check_require_template();
        $list_course_membership = $membership_list['list_courses'];
    }
    if( !empty($list_course_membership)) {
        if( array_key_exists($course->id, $list_course_membership ) ) {
            $hidden_price = true;
        }
    }

    if( !empty( $buy_through_membership )  && $buy_through_membership == 'no' ) {
        $hidden_price = false;
    }
    echo '</div><aside class="course-single-aside">';
    thim_course_info();
    if ( !$is_enrolled ) { ?>
    <div class="course-payment">
        <?php

        if ( ( $course->is_free() || !$user->can( 'enroll-course', $course->id ) ) && !$hidden_price ) {
            learn_press_course_price();
        }
        learn_press_course_buttons();

        ?>
    </div>
    <?php } 
    echo '</aside></div>';
    do_action( 'thim_social_share' );
    thim_related_courses();
}

add_action('learn_press_before_single_course', 'my_learn_press_before_single_course');
add_action('learn_press_after_single_course', 'my_learn_press_after_single_course');


function current_user() {
    if(is_user_logged_in()) {
        $current = wp_get_current_user();
        $name =  $current->user_firstname;
        $avatar = get_avatar_url($current->ID);
        echo '<style>#masthead .thim-widget-login-popup a.profile:before {content:"'.$name.'"}#masthead .thim-widget-login-popup a.profile:after {background-image: url('.$avatar.');}</style>';
    }
}
add_action( 'wp_head', 'current_user' );