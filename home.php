<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'ligeti'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<ul class="refgrid">
<?php while (have_posts()) : the_post(); ?>
  <li><?php get_template_part('templates/refcard'); ?></li>
<?php endwhile; ?>
</ul>

<?php the_posts_navigation(); ?>
