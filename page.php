<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php $slug = get_queried_object()->post_name;
		
		get_template_part('templates/content-page', $slug);
 ?>
<?php endwhile; ?>
