<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/uikit-menu-walker-offcanvas.php',
  'lib/uikit-menu-walker.php'
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


// Filter for results from UWPQSF plugin via AJAX
add_filter('uwpqsf_result_tempt', 'customize_output', '', 4);
function customize_output($results , $arg, $id, $getdata ){
   // The Query
            $apiclass = new uwpqsfprocess();
             $query = new WP_Query( $arg );
    ob_start(); $result = '';
      // The Loop
 
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();global $post; ?>
                                <!-- Start of output for each found item -->
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
                             <!-- END of output for each found item -->
          <?php
      }
          echo  $apiclass->ajax_pagination($arg['paged'],$query->max_num_pages, 4, $id, $getdata);
     } else {
           echo  'no post found';
        }
        /* Restore original Post Data */
        wp_reset_postdata();
 
    $results = ob_get_clean();    
      return $results;
}


if($_GET['s'] == 'uwpsfsearchtrg' && isset($_GET['uformid'])){
  echo "help!";
}