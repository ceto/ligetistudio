<?php while (have_posts()) : the_post(); ?>
  <?php //get_template_part('templates/page', 'header'); ?>
  <figure class="theref__fig">
            <?php the_post_thumbnail('large21'); ?>
        </figure>
        <br>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
