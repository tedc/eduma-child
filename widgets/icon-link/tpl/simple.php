<a href="<?php echo $instance['link']; ?>" class="<?php echo $instance['icona']; ?> icon-<?php echo sanitize_title( $instance['link']); ?>"<?php echo ($instance['blank']) ? ' target="_blank"' : ''; ?>></a>
<style>
.icon-<?php echo sanitize_title( $instance['link']); ?> {
	color: <?php echo $instance['color']; ?>
}
.icon-<?php echo sanitize_title( $instance['link']); ?> {
	color: <?php echo $instance['color_hover']; ?>
}
</style>
