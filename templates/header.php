<header class="banner">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>">
                <img src="<?= get_stylesheet_directory_uri().'/assets/images/ligetilogo.png'; ?>" alt="">
                <span class="show-for-sr"><?php bloginfo('name'); ?></span>
    </a>
    <a id="menutoggle" href="#" class="menutoggle">Menü</a>
    <nav class="mainnav">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--main']);
      endif;
      ?>
    </nav>
</header>
