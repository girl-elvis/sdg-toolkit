<?php 
if (is_page(array('find-tools-by-region-country', 'find-tools-by-type', 'find-tools-by-goal'))){	
	$slug = get_post_field( 'post_name', get_post() );
	switch ($slug) {
		case 'find-tools-by-region-country':
			$term = 'region';
			break;
		case 'find-tools-by-type':
			$term = 'tool_type';
			break;
		case 'find-tools-by-goal':
			$term = 'goal';
			break;
		// default:
		// 	# code...
		// 	break;
	}
	$terms = get_terms( array(
    'taxonomy' => $term,
    'hide_empty' => false,
	) );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    $term_list = '<ul class="my_term-archive">';
	    foreach ( $terms as $term ) {
	        $i++;
	        $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '&nbsp;(' . $term->count . ')</a></li>';
	        if ( $count != $i ) {           
	        }
	        else {
	            $term_list .= '</ul>';
	        }
	    }
	    echo $term_list;
	}

}



the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
