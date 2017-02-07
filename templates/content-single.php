<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>

    </header>
    <div class="entry-content">
      <?php the_content(); ?>


<?php if ( 'tool' == get_post_type() ){ // Display download

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

    </div>




    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
