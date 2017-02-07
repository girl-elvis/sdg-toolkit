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


// function sdg_enqueue_script() {
//     wp_enqueue_script( 'raphael', 'dist/scripts/raphael.min.js', 'jquery' );
//         wp_enqueue_script( 'scale.raphael', 'dist/scripts/scale.raphael.js', 'raphael' );
//      wp_enqueue_script( 'map-paths', 'dist/scripts/map-paths.js', 'jquery' );
//      wp_enqueue_script( 'map-init', 'dist/scripts/map-init.js', 'map-paths' );
// }
// //if (is_front_page()){
//   add_action( 'wp_enqueue_scripts', 'sdg_enqueue_script' );
// //}
// function sdg_enqueue_style() {
//     // wp_enqueue_style( 'raphael', 'dist/scripts/raphael.min.js', 'jquery' );
//     //     wp_enqueue_script( 'scale.raphael', 'dist/scripts/scale.raphael.js', 'raphael' );
//     //  wp_enqueue_script( 'map-paths', 'dist/scripts/map-paths.js', 'jquery' );
//     //  wp_enqueue_script( 'map-init', 'dist/scripts/map-init.js', 'map-paths' );
// }
// //if (is_front_page()){
//   //add_action( 'wp_enqueue_scripts', 'sdg_enqueue_style' );
//}