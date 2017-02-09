<?php 
if (is_page(array('find-tools-by-region-country', 'find-tools-by-type', 'find-tools-by-goal'))){	
  get_template_part('templates/part', 'filters');
} else if(is_front_page()){?>

	<div class="uk-grid">
		<div class="uk-width-1-1">
		<h1>I'm Ready! Find Tools:</h1>
		<h2>By Region / country:</h2>
			<div class="themap">
			  <div class="mapWrapper">
                <div id="map"></div>
                <div id="text"></div>
        </div>

			</div>
		</div>
		<div class="uk-width-1-1 uk-width-small-1-2">
			<h2>By tool type:</h2>
			<a class="uk-button uk-text-uppercase" href="/find-tools-by-type/">Take me to the toolkit <i class="uk-icon-wrench"></i></a>
			text from tool type page
		</div>
		<div class="uk-width-1-1 uk-width-small-1-2">
			<h2>By goal:</h2>
			<a class="uk-button uk-text-uppercase" href="/find-tools-by-goal/">Take me to the Goals <i class="uk-icon-list-ol"></i></a>
			text from goals page
		</div>
	</div>
	<?php
} else {
	the_content(); 
	wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); 

}




