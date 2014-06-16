<?php get_header(); ?>
	<section class="carousel">
		<div>
			<?php echo get_attached_images( 'size=large&single=1' ); ?>
		</div>
	</section>
	<article>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile;  ?>
	</article>
<?php get_footer(); ?>
