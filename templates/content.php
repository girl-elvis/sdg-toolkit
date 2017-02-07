<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php // get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

  <?php
  $taxes = array('goal', 'tool_type', 'region', 'doc_type');

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

<?php if(is_tax()){ // Display download

$downloads = get_post_meta( get_the_ID(), 'tools', true );
if( $downloads ) {
  for( $i = 0; $i < $downloads; $i++ ) {
    $name = esc_html( get_post_meta( get_the_ID(), 'tools_' . $i . '_name', true ) );
    $file = esc_html( get_post_meta( get_the_ID(), 'tools_' . $i . '_file', true ) );
    $file_url = wp_get_attachment_url($file);
    // Build the video box
    if (!$name) {$name = basename($file_url);}
    echo '<div><strong>Download:</strong> <a href="' . $file_url . '" target="_blank">' . $name . '</a></div>';
  }
}
} ?>
<hr><hr>