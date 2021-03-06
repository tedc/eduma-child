<?php
/**
 * Template for displaying content of learning course
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$review_is_enable = thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' );
$student_list_enable = thim_plugin_active( 'learnpress-students-list/learnpress-students-list.php' );
?>

<?php do_action( 'learn_press_before_content_learning' );?>

<div class="course-learning-summary">

	<?php do_action( 'learn_press_content_learning_summary' ); ?>

</div>
<div id="course-learning">

	<div class="course-tabs">

		<ul class="nav nav-tabs">
			<li role="presentation">
				<a href="#tab-course-description" data-toggle="tab">
					<i class="fa fa-bookmark"></i>
					<span><?php esc_html_e( 'Description', 'eduma' ); ?></span>
				</a>
			</li>
			<li class="active">
				<a href="#tab-course-curriculum" data-toggle="tab">
					<i class="fa fa-cube"></i>
					<span><?php esc_html_e( 'Curriculum', 'eduma' ); ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#tab-course-instructor" data-toggle="tab">
					<i class="fa fa-user"></i>
					<span><?php esc_html_e( 'Instructors', 'eduma' ); ?></span>
				</a>
			</li>
			<?php if ( $review_is_enable ) : ?>
				<li role="presentation">
					<a href="#tab-course-review" data-toggle="tab">
						<i class="fa fa-comments"></i>
						<span><?php esc_html_e( 'Reviews', 'eduma' ); ?></span>
						<span><?php echo '(' . learn_press_get_course_rate_total( get_the_ID() ) . ')'; ?></span>
					</a>
				</li>
			<?php endif; ?>
			<?php if ( $student_list_enable ) : ?>
				<li role="presentation">
					<a href="#tab-course-student-list" data-toggle="tab">
						<i class="fa fa-list"></i>
						<span><?php esc_html_e( 'Student List', 'eduma' ); ?></span>
					</a>
				</li>
			<?php endif; ?>
		</ul>

		<div class="tab-content">
			<div class="tab-pane" id="tab-course-description">
				<?php do_action( 'learn_press_begin_course_content_course_description' ); ?>
				<div class="thim-course-content">
					<?php the_content(); ?>
				</div>
				<?php do_action( 'learn_press_end_course_content_course_description' ); ?>
			</div>
			<div class="tab-pane active" id="tab-course-curriculum">
				<?php learn_press_course_curriculum(); ?>
			</div>
			<div class="tab-pane" id="tab-course-instructor">
				<?php thim_about_author(); ?>
			</div>
			<?php if ( $review_is_enable ) : ?>
				<div class="tab-pane" id="tab-course-review">
					<?php thim_course_review(); ?>
				</div>
			<?php endif; ?>
			<?php if ( $student_list_enable ) : ?>
				<div class="tab-pane" id="tab-course-student-list">
					<?php learn_press_course_students_list(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php do_action( 'learn_press_after_content_learning' );?>
