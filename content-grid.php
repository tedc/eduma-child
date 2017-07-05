<?php
$theme_options_data = get_theme_mods();

$classes            = array();
$classes[]			= 'eduma-magazine__cell';
$theme_options_data = get_theme_mods();
$show_author        = !empty( $theme_options_data['thim_show_author'] ) && $theme_options_data['thim_show_author'] == '1';
$show_date          = !empty( $theme_options_data['thim_show_date'] ) && $theme_options_data['thim_show_date'] == '1';
$show_comment       = !empty( $theme_options_data['thim_show_comment'] ) && $theme_options_data['thim_show_comment'] == '1';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="eduma-magazine__item">
		<div class="eduma-magazine__side">
			<figure class="eduma-magazine__figure" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
				<?php the_post_thumbnail('large'); ?>
			</figure>
			<time class="eduma-magazine__date">
				<?php the_time( 'd F' ); ?>
			</time>
		</div>
		<div class="eduma-magazine__content">
			<?php the_category(', '); ?>
			<h3 class="eduma-magazine__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(  ); ?>" class="eduma-magazine__more"><?php _e('Leggi tutto', 'uba'); ?></a>
		</div>
	</div>
</article><!-- #post-## -->