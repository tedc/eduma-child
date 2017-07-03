<div class="learn-press-categories<?php echo ($instance['red']) ? ' learn-press-categories--red' : ''; ?>">
	<div class="learn-press-categories__cell">
		<div class="learn-press-categories__content learn-press-categories__content--desc">
			<h2 class="learn-press-categories__title"><?php echo esc_html( $instance['title'] ); ?></h2>
			<div class="learn-press-categories__desc"><?php echo esc_html( $instance['text'] ); ?></div>
		</div>
	</div>
	<?php
		$number = ($instance['number']) ? intval($instance['number']) : 0;
		$terms = get_terms(
			array(
				'taxonomy' => 'course_category',
				'number' => $number,
				'orderby' => 'name',
				'hide_empty' => false
			)
		);
		foreach ($terms as $term) :
	?>
	<div class="learn-press-categories__cell learn-press-categories__cell--term">
		<?php
			$img_id = get_term_meta( $term->term_id, 'thim_learnpress_top_image', true )['id'];
			$image = wp_get_attachment_image_src( $img_id, 'large', false ); ?>
		<figure class="learn-press-categories__figure" style="background-image: url(<?php echo $image[0]; ?>)">
			<img src="<?php echo $image[0]; ?>"  class="learn-press-categories__image" />
		</figure>
		<div class="learn-press-categories__content">
		<?php if(get_term_meta($term->id, 'icon-thumbnail-src', true)):?>
			<img src="<?php echo get_term_meta($term->id, 'icon-thumbnail-src', true); ?>" id="icon-thumbnail-src">
		<?php endif; ?>
		<h3 class="learn-press-categories__title"><?php echo $term->name; ?></h3>
		<a href="<?php echo get_term_link( $term->term_id); ?>" class="learn-press-categories__button"><?php _e('Scopri', 'uba'); ?></a>
		</div>
	</div>
	<?php endforeach; ?>
</div>