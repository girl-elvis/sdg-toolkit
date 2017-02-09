<header class="banner">
  <div class="container uk-container">


  <!-- Offscreen menu --> 
        <div class="uk-offcanvas" id="sidemenu">
        
          <nav class="uk-offcanvas-bar uk-offcanvas-bar-flip">
          <a href="" class="" data-uk-toggle="{target:'#sidemenu', cls:'uk-active'}">close</a>
            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'items_wrap' => '<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>%3$s</ul>','walker' => new Walker_UIKIT_offCanvas() ]);
            endif;
            ?>
            <?php
            if (has_nav_menu('secondary_navigation')) :
              wp_nav_menu(['theme_location' => 'secondary_navigation', 'items_wrap' => '<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon secondnav" data-uk-nav>%3$s</ul>','walker' => new Walker_UIKIT_offCanvas() ]);
            endif;
            ?>


          </nav>
      
        </div>
  <!-- END Offscreen menu -->

    <div class="brand">
      <a  href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
     </div>

      <div class="uk-grid uk-grid-width-small-1-2">
        <div class="blogdesc">
        <?php bloginfo('description'); ?>
        </div>
        <div >
        <div class="uk-navbar-flip">
        <?php get_search_form(  ); ?>
        </div>
        </div>
    </div>

      <nav class="nav-primary uk-navbar uk-margin-top">
      <div class="find-nav">
        
      <?php
            if (has_nav_menu('find_navigation')) :
        wp_nav_menu(['items_wrap'     => '<ul id="menu-find-tools-nav" class="nav uk-subnav-line"><div class="find-label">Find tools by:</div>%3$s</ul>', 'theme_location' => 'find_navigation', 'menu_class' => 'nav', 'walker' => new Walker_UIKIT()]);
      endif;

      ?>
      </div>
      <div class="pages-nav">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'container-class' => 'test', 'menu_class' => 'nav uk-navbar-flip', 'walker' => new Walker_UIKIT()]);
      endif;
      ?>
      </div>
    </nav>

  </div>
</header>



<?php if(is_front_page()){
  get_template_part('templates/part', 'homebanner');
 } ?>

