<p class="hide-if-no-js">
	<a title="Set Footer Image" href="javascript:;" id="set-icon-thumbnail">Set featured image</a>
</p>

<div id="featured-icon-image-container" class="hidden">
	<img src="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-src', true ); ?>" alt="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-alt', true ); ?>" title="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-title', true ); ?>" />
</div><!-- #featured-icon-image-container -->

<p class="hide-if-no-js hidden">
	<a title="Remove Footer Image" href="javascript:;" id="remove-icon-thumbnail">Remove featured image</a>
</p><!-- .hide-if-no-js -->

<p id="featured-icon-image-info">
	<input type="hidden" id="icon-thumbnail-src" name="icon-thumbnail-src" value="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-src', true ); ?>" />
	<input type="hidden" id="icon-thumbnail-title" name="icon-thumbnail-title" value="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-title', true ); ?>" />
	<input type="hidden" id="icon-thumbnail-alt" name="icon-thumbnail-alt" value="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-alt', true ); ?>" />
</p><!-- #featured-icon-image-meta -->