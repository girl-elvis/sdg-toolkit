<?php get_template_part('templates/page', 'header'); ?>
<?php if(is_tax){ // Display filter form
		$tax = get_query_var( 'taxonomy' );
		echo "filter by";
		switch ($tax) {
			case 'goal':
				$filter = 62;
				break;
			case 'region':
				$filter = 63;
				break;
			case 'tool_type':
				$filter = 64;
				break;
		}
		if ($filter){ // If page needs a filter, display it.
			echo '<div class="filterform">';
			echo do_shortcode('[searchandfilter id="'. $filter. '"]');
			echo '</div>';
			 //echo do_shortcode('[searchandfilter id="'. $filter. '" show="results" ]');
		}

		
	} 
?>
<div id="the_content">

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

</div>

<?php the_posts_navigation(); ?>

