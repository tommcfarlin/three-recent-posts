<ol>
	<?php while ( $this->query->has_posts() ) {  ?>
		<?php $this->query->the_post(); ?>
		<li>
			<a href="<?php get_the_permalink(); ?>" target="_blank">
				<?php echo get_the_title(); ?>
			</a>
		</li>
	<?php } ?>
</ol>