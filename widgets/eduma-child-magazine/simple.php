<div class="eduma-magazine<?php ($instance['red']) ? ' eduma-magazine--red' : ''; ?>">
	<?php
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page' => 1,
			'post__in'  => $sticky,
			'ignore_sticky_posts' => 1
		);
		$query = new WP_Query( $args );
		while($query->have_posts()) : $query->the_post(); ?>
	<div class="eduma-magazine__last">
		<div class="eduma-magazine__item">
			<div class="eduma-magazine__side">
				<time class="eduma-magazine__date">
					<?php the_time( 'd F Y' ); ?>
				</time>
				<figure class="eduma-magazine__figure" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
					<?php the_post_thumbnail('large'); ?>
				</figure>
			</div>
			<div class="eduma-magazine__content">
				<?php the_category(', '); ?>
				<h3 class="eduma-magazine__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<a href="<?php the_permalink(  ); ?>" class="eduma-magazine__more"><?php _e('Leggi tutto', 'uba'); ?></a>
			</div>
		</div>
	</div>
	<?php endwhile; wp_reset_query(); ?>
	<div class="eduma-magazine__grid">
	<?php 
		$new_q = new WP_Query(
			array(	
				'ignore_sticky_posts' => 1,
				'post__not_in' => $sticky,
				'posts_per_page' => $instance['number'] || 2
			)
		);
		if($instance['instagram']) : ?>
		<div class="eduma-magazine__cell">
			<?php while($new_q->have_posts()) : $new_q->the_post(); ?>
			<div class="eduma-magazine__item">
				<div class="eduma-magazine__side">
					<time class="eduma-magazine__date">
						<?php the_time( 'd F Y' ); ?>
					</time>
					<figure class="eduma-magazine__figure" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
						<?php the_post_thumbnail('large'); ?>
					</figure>
				</div>
				<div class="eduma-magazine__content">
					<?php the_category(', '); ?>
					<h3 class="eduma-magazine__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(  ); ?>" class="eduma-magazine__more"><?php _e('Leggi tutto', 'uba'); ?></a>
				</div>
			</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
		<div class="eduma-magazine__cell">
			<div class="eduma-magazine__instagram">
				<header>
					<a href="<?php echo $instance['instagram_link']; ?>">
						<i class="fa fa-instagram"></i>
						<?php echo str_replace(array('https:', '/', 'instagram.com'), '', $instance['instagram_link']); ?>
					</a>
				</header>
				<?php echo $instance['instagram']; ?>
			</div>
		</div>
	<?php else : ?>
		<?php while($new_q->have_posts()) : $new_q->the_post(); ?>
		<div class="eduma-magazine__cell">
			<div class="eduma-magazine__item">
				<div class="eduma-magazine__side">
					<time class="eduma-magazine__date">
						<?php the_time( 'd F Y' ); ?>
					</time>
					<figure class="eduma-magazine__figure" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)">
						<?php the_post_thumbnail('large'); ?>
					</figure>
				</div>
				<div class="eduma-magazine__content">
					<?php the_category(', '); ?>
					<h3 class="eduma-magazine__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(  ); ?>" class="eduma-magazine__more"><?php _e('Leggi tutto', 'uba'); ?></a>
				</div>
			</div>
		</div>
		<?php endwhile; wp_reset_query(); ?>
	<?php endif; ?>
	</div>
</div>