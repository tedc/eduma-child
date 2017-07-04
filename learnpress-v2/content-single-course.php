<?php
/**
 * The template for display the content of single course
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

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

?>

<?php do_action( 'learn_press_before_main_content' ); ?>

<?php do_action( 'learn_press_before_single_course' ); ?>

<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>

<div class="course-meta">
	<?php learn_press_course_instructor(); ?>
	<?php learn_press_course_categories(); ?>
	<?php thim_course_forum_link(); ?>
	<?php thim_course_ratings(); ?>
	<?php learn_press_course_progress(); ?>
</div>

<?php if ( !$is_enrolled ) { ?>
	<div class="course-payment">
		<?php

		if ( ( $course->is_free() || !$user->can( 'enroll-course', $course->id ) ) && !$hidden_price ) {
			learn_press_course_price();
		}
		learn_press_course_buttons();

		?>
	</div>
<?php } ?>

<?php learn_press_get_template( 'single-course/thumbnail.php', array() ); ?>
<div class="course-single-wrapper">
<div class="course-single-left">
<div class="course-summary">

	<?php if ( $is_enrolled || $user->has_course_status( $course->id, array( 'enrolled', 'finished' ) ) || !$require_enrolled ) { ?>

		<?php learn_press_get_template( 'single-course/content-learning.php', array() ); ?>

	<?php } else { ?>

		<?php learn_press_get_template( 'single-course/content-landing.php', array() ); ?>

	<?php } ?>

</div>

<?php //endif; ?>


<?php do_action( 'learn_press_after_single_course' ); ?>

<?php do_action( 'learn_press_after_main_content' ); ?>
