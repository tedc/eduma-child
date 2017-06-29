<form class="courses-search" method="get" action="<?php echo get_permalink(get_option('learn_press_courses_page_id') ); ?>">
	<input type="hidden" name="ref" value="course">
	<div class="courses-search__select">
		<div class="courses-search__value">
			<div class="courses-search__text"><?php _e('Seleziona categoria', 'uba'); ?></div>
		</div>
		<select name="course_category">
			<option value="0"><?php _e('Seleziona categoria', 'uba'); ?></option>
			<?php 
				$terms = get_terms(
					array(
						'taxonomy' => 'course_category',
						'orderby' => 'name',
						'hide_empty' => false
					)
				);
				foreach($terms as $term) :
			?>
			<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="courses-search__inputs">
		<input type="search" name="s" placeholder="<?php _e('Corso o parola chiave', 'uba'); ?>" />
		<input type="submit" class="button" value="<?php _e('Cerca', 'uba'); ?>" />
	</div>
</form>
<script type="text/javascript">
	(function($) {
		$('.courses-search__select').each(function() {
			var value = $(this).find('.courses-search__text');
			$(this).find('select[name="course_category"]').on('change', function() {
				var val = $(this).val(),
					text = $(this).find('option[value="'+val+'"]').text();
				value.html(text);
			});
		})
	})(jQuery);
</script>