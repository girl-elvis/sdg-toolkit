<?php 
$term = 'tool_type';
$terms = get_terms( array(
    'taxonomy' => $term,
    'hide_empty' => false,
    'orderby' => 'id'
	) );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    echo '<ul class="goal-grid uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-3 uk-grid-match uk-grid-small" data-uk-grid-margin  data-uk-grid-match="{row:false}" >';
	    $icons = array("articles" => "newspaper-o", "presentations" => "file-o", "social-media" => "facebook", "images" => "image", "policy-papers"=>"file-text-o", "monitoring-review-tools" => "thumbs-o-up", "sdg-coalitions" => "group", "other-tool-type" => "question-circle-o", "speakers" => "bullhorn");
	    foreach ( $terms as $term ) {
	 		$icon = $icons[$term->slug];
	        $i++;
	        echo '<li class="typeslist">';
	         echo '<div class="uk-button button-' . $term->slug . ' uk-flex uk-flex-space-around" >'; 
	         echo '<div class="grid-child"  ><a class="" href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">'. $term->name ;
	        echo '</a></div><div class=""  >';
	        echo '<i class="uk-icon-' . $icon . '"></i>';
	        echo '</div></div></li>';


	        if ( $count != $i ) {           
	        }
	        else {
	            echo '</ul>';
	        }
	    }
	    //echo $term_list;
	}


the_content(); ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>