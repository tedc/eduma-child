<div class="latest-courses<?php echo ($instance['white']) ? ' latest-courses--white' : ''; ?>">
<?php if($instance['title']) { ?>

<?php }
	$processed_posts = siteorigin_widget_post_selector_process_query($instance['courses']);
	$latest = new WP_Query($processed_posts);
	if($latest->have_posts()) :
?> 
<div class="latest-courses__list">
	<?php while($latest->have_posts()) : $latest->the_post(); ?>
	<div class="latest-courses__item">
	<header class="latest-courses__header">
	<?php
		$cats = wp_get_post_terms(get_the_ID(), 'course_category');
		$c = 0;
		foreach ($cats as $cat) {
			$comma = ($c < count($cats) - 1) ? ', ' : '';
			echo '<a href="'.get_term_link( $cat->term_id, 'course_category' ).'" class="latest-courses__cat">'.$cat->name.'</a>'.$comma;
		}
	?>
	<h3 class="latest-courses__title"><a href="<?php the_permalink(  ); ?>"><?php the_title(); ?></a></h3>
	</header>
	<footer class="latest-courses__button button-inverted"><div class="thim-widget-button thim-widget-button-base"><a class="widget-button tiny-rounded normal" href="<?php the_permalink(  ); ?>"><?php _e('Scopri', 'uba'); ?></a></div></footer>
	</div>
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php endif; ?>
</div>