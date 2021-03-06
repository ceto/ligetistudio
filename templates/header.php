<header class="banner">
    <div class="banner__inner">
        <a class="brand" href="<?= esc_url(home_url('/')); ?>">
                    <img src="<?= get_stylesheet_directory_uri().'/assets/images/ligetilogo.png'; ?>" alt="">
                    <span class="show-for-sr"><?php bloginfo('name'); ?></span>
                    <span class="brand__desc"><?php bloginfo('description'); ?></span>
        </a>
        <nav class="mainnav">
            <?php
                if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu menu--main']);
                endif;
            ?>
        </nav>
    </div>
</header>
