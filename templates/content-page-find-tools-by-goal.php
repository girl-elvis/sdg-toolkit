<?php 
$term = 'goal';
$terms = get_terms( array(
    'taxonomy' => $term,
    'hide_empty' => false,
    'orderby' => 'id'
	) );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    echo '<ul class="goal-grid uk-grid uk-grid-small uk-grid-width-1-1 uk-grid-width-medium-1-3 uk-grid-width-large-1-6" data-uk-grid-margin>';
	    foreach ( $terms as $term ) {
	        $i++;
	        echo '<li><div class="panel-' . $term->slug . '"><figure class="uk-overlay uk-overlay-hover">';
	       
	        //echo $term->name . '&nbsp;(' . $term->count . ')';
	        echo '<div class="uk-overlay-panel uk-overlay-background">'.  $term->description   .'</div>';
	        echo '<img src="' ;
	        bloginfo('stylesheet_directory');
	        echo '/dist/images/' . $term->slug . '.png">';
	         echo '<a class="uk-position-cover" href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">';
	        echo '</a></figure></div></li>';


	        if ( $count != $i ) {           
	        }
	        else {
	            echo '</ul>';
	        }
	    }
	    echo "<h2>Key</h2>";
	}

the_content(); ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>