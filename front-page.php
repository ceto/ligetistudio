<?php while (have_posts()) : the_post(); ?>
<article id="ref-<?php the_ID(); ?>" <?php post_class('threref'); ?>>
        <figure class="theref__fig">
            <?php the_post_thumbnail('large21'); ?>
        </figure>



        <!-- <header class="theref__header">
            <div class="theref__content">
                <h1 class="theref__title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
            <blockquote class="theref__quote" cite="<?php echo get_post_meta( get_the_ID(), '_cmb_quote_link', true ); ?>">
                <p>Atque voluptatem ipsa, a nam fugit repudiandae enim nemo amet quia saepe porro tempore quae assumenda quibusdam.</p>
                <cite> 
                    Ligeti Ferenc
                </cite>
            </blockquote>
        </header> -->
    
    

<?php endwhile; ?>

<?php the_posts_navigation(); ?>
