<div class="learn-press-categories">
	<div class="learn-press-categories__cell">
		<h2 class="learn-press-categories__title"><?php echo esc_html( $instance['title'] ); ?></h2>
		<div class="learn-press-categories__desc"><?php echo esc_html( $instance['text'] ); ?></div>
	</div>
	<?php
		$number = ($instance['number']) ? intval($instance['number']) : 7;
		$terms = get_terms(
			array(
				'taxonomy' => 'course_category',
				'number' => $number,
				'orderby' => 'name',
				'hide_empty' => false
			)
		);
		var_dump(intval($instance['number']));
		var_dump($terms);
		foreach ($terms as $term) :
	?>
	<div class="learn-press-categories__cell">
		<?php
			$img_id = get_term_meta( $term->term_id, 'thim_learnpress_top_image', true )['id'];
			$image = wp_get_attachment_image_src( $img_id, 'large', false ); ?>
		<figure class="learn-press-categories__figure" style="background-image: url(<?php echo $image[0]; ?>)">
			<img src="<?php echo $image[0]; ?>"  class="learn-press-categories__image" />
		</figure>
		<div class="learn-press-categories__content">
		<h3 class="learn-press-categories__title"><?php echo $term->name; ?></h3>
		<a href="<?php echo get_term_link( $term->term_id); ?>" class="learn-press-categories__button"><?php _e('Scopri', 'uba'); ?></a>
		</div>
	</div>
	<?php endforeach; ?>
</div>