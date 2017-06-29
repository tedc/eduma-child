<?php 
	$image = wp_get_attachment_image_src( $instance['image'], 'full', false );
	$position = $instance['position'];
	$type = $instance['type'];
?>
<figure class="eduma-child__figure eduma-child__figure--<?php echo $position; ?> eduma-child__figure--<?php echo $type; ?>" style="background-image: url(<?php echo $image[0]; ?>)">
	<?php echo wp_get_attachment_image( $instance['image'], 'large', false ); ?>
</figure>