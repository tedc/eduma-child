<?php 
	$image = $instance['image'];
	$position = $instance['position'];
	$position = $instance['type'];
?>
<figure class="eduma-child__figure eduma-child__figure--<?php echo $type; ?>-<?php echo $position; ?>" style="background-image: url(<?php echo $image; ?>)">
	<img src="<?php echo $image; ?>" class="eduma-child__image" alt="">
</figure>