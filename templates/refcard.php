<article id="refcard-<?php the_ID(); ?>" <?php post_class('refcard'); ?>>
    <?php
        $ima = get_post_meta( $post->ID, '_cmb_photo_1_id', true );
        $imci = wp_get_attachment_image_src( $ima, 'medium43');
    ?>
    <figure class="refcard__fig">
        <a href="<?php the_permalink(); ?>">
            <img width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" src="<?php echo $imci[0]; ?>" alt="<?php echo the_title(); ?>" />
        </a>
    </figure>
    <h3 class="refcard__title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            <span class="refcard__year"><?php echo '’'.substr(get_post_meta( get_the_ID(), '_cmb_date', true ),2); ?></span>
        </a>
    </h3>
</article>