<?php get_template_part('templates/page', 'header'); ?>
<?php if(is_tax()){ // Display filter form
		$tax = get_query_var( 'taxonomy' );
		echo "filter by";
		switch ($tax) {
			case 'goal':
						$filter = 'filter-for-goal-page';
				break;
			case 'region':
				$filter = 'filter-for-region-page';
				break;
			case 'tool_type':
				$filter = 'filter-for-type-page';
				break;
		}
		if ($filter){ // If page needs a filter, display it.
			echo '<div class="filterform">';
  			echo do_shortcode('[searchandfilter slug="'. $filter. '"  ]');
			//echo do_shortcode('[ULWPQSF id='. $filter. ']');
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

