<p class="hide-if-no-js">
	<a title="Set Footer Image" href="javascript:;" id="set-icon-thumbnail" class="button simplePanelimageUpload"><?php _e('Icona categoria', 'uba'); ?></a>
</p>

<div id="featured-icon-image-container" class="hidden">
	<img src="<?php if(isset($term->term_id)) { echo get_term_meta( $term->term_id, 'icon-thumbnail-src', true ); } ?>" id="icon-thumbnail-src" />
</div><!-- #featured-icon-image-container -->

<p class="hide-if-no-js hidden">
	<a title="Remove Footer Image" href="javascript:;" id="remove-icon-thumbnail" class="button simplePanelimageUploadclear"><?php _e('Rimuovi cona categoria', 'uba'); ?></a>
</p><!-- .hide-if-no-js -->

<p id="featured-icon-image-info">
	<input type="hidden" id="icon-thumbnail-src" name="icon-thumbnail-src" value="<?php echo get_term_meta( $term->term_id, 'icon-thumbnail-src', true ); ?>" />
</p><!-- #featured-icon-image-meta -->