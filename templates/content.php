<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <?php
  $taxes = array('goal', 'tool_type', 'region');

  foreach($taxes as $tax) {
	  $terms = get_the_terms( get_the_ID(), $tax );
	                         
	if ( $terms && ! is_wp_error( $terms ) ) :  
	    $links = array();
	    foreach ( $terms as $term ) {
	        $links[] = $term->name;
	    }
	    $list = join( ", ", $links );

	    echo ('<li class="' . $tax . '">');
	    echo ( $tax . ': <span>'. $list .'</span></li>'  );
	 endif; 

}
?>


</article>
<hr><hr>