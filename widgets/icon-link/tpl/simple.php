<a href="<?php echo $instance['link']; ?>" class="<?php echo $instance['icon']; ?> <?php echo sanitize_title( $instance['link']); ?>"<?php echo ($instance['blank']) ? ' target="_blank"' : ''; ?>></a>
<style>
.<?php echo str_replace(' ', '.', $instance['icon']); ?>.<?php echo sanitize_title( $instance['link']); ?> {
	color: <?php echo $instance['color']; ?> !important;
}
.<?php echo str_replace(' ', '.', $instance['icon']); ?>.<?php echo sanitize_title( $instance['link']); ?>:hover {
	color: <?php echo $instance['color_hover']; ?> !important;
}
</style>
