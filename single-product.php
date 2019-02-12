<?php
/**
 * The Template for displaying all single product posts.
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="ref-<?php the_ID(); ?>" <?php post_class('threref'); ?>>
                <figure class="theref__fig">
                    <?php the_post_thumbnail('large21'); ?>
				</figure>

				<header class="theref__header">

                <?php if(get_post_meta( get_the_ID(), '_cmb_photo_1', true ) !='')  : ?>
                    <section class="theref__gallery">
                        <section class="gallery psgallery">
                            <?php $k=0; while ( ($k<13) && (get_post_meta( get_the_ID(), '_cmb_photo_'.++$k, true ) !='')  ): ?>
                                <?php
                                    $tsrc = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_cmb_photo_'.$k.'_id', true ), 'medium', false ) ;
                                    $tlnk = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_cmb_photo_'.$k.'_id', true ), 'full', false ) ;
                                ?>
                                <figure class="gallery__fig" style="/*padding-bottom:<?= $tsrc[2]/$tsrc[1]*100?>%;*/" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a href="<?php echo $tlnk[0] ; ?>" data-size="<?= $tlnk['1'].'x'.$tlnk['2']; ?>">
                                        <img src="<?php echo $tsrc[0] ; ?>" />
                                    </a>
                                </figure>
                            <?php endwhile;	?>
                        </section><!-- .gallery -->
                    </section>    

				    <?php endif; ?>
                    
                    <div class="theref__content">
                        <h1 class="theref__title"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <dl class="theref__params">
                            <?php if (get_post_meta( get_the_ID(), '_cmb_alap', true )!='') :?>
                                <dt>Alapterület</dt>
                                <dd><?php echo get_post_meta( get_the_ID(), '_cmb_alap', true); ?></dd>
                            <?php endif; ?>
                            <?php if (get_post_meta( get_the_ID(), '_cmb_hely', true )!='') :?>
                                <dt>Helyszín</dt>
                                <dd><?php echo get_post_meta( get_the_ID(), '_cmb_hely', true); ?></dd>
                            <?php endif; ?>

                            <?php if (get_post_meta( get_the_ID(), '_cmb_width', true )!='') :?>
                                <dt>Méret</dt>
                                <dd><?php echo get_post_meta( get_the_ID(), '_cmb_height', true); ?> &times; <?php echo get_post_meta( get_the_ID(), '_cmb_depth', true); ?></dd>
                            <?php endif; ?>

                            <?php if (get_post_meta( get_the_ID(), '_cmb_anyag', true )!='') :?>
                                <dt>Anyaga</dt>
                                <dd><?php echo get_post_meta( get_the_ID(), '_cmb_anyag', true); ?></dd>
                            <?php endif; ?>

                            <?php if (get_post_meta( get_the_ID(), '_cmb_keszulhet', true )!='') :?>
                                <dt>Készülhet még</dt>
                                <dd><?php echo get_post_meta( get_the_ID(), '_cmb_keszulhet', true); ?></dd>
                            <?php endif; ?>

                            <?php if (get_post_meta( get_the_ID(), '_cmb_egyeb', true )!='') :?>
                                <dt>Egyéb</dt>
                                <dd><?php echo get_post_meta( get_the_ID(), '_cmb_egyeb', true); ?></dd>
                            <?php endif; ?>
                        </dl>
                    </div>

                    <?php if (get_post_meta( get_the_ID(), '_cmb_quote', true )!='') :?>
                        <blockquote class="theref__quote" cite="<?php echo get_post_meta( get_the_ID(), '_cmb_quote_link', true ); ?>">
                            <p><?php echo get_post_meta( get_the_ID(), '_cmb_quote', true ); ?></p>
                            <cite> 
                                <?php echo get_post_meta( get_the_ID(), '_cmb_quote_src', true ); ?>
                            </cite>
                        </blockquote>
                    <?php endif; ?>





                </header>

			

				<?php
					$the_related=new WP_Query( array(
											'post_type' => 'product',
                                            'taxonomy' => 'prodcat',
                                            'posts_per_page' => '4',
											'post__not_in' => array( $post->ID ),
											'term' => $term->slug

											) );
					?>
					<?php if ( $the_related->have_posts() ) :?>
						<h3 class="minititle">Kapcsolódó munkák</h3>
						<ul class="relprods">
							<?php foreach( $the_related->posts as $posta ) : ?>
					            <li>
					              <a href="<?php the_permalink( $posta->ID ); ?>">
					              	<?php echo get_the_title($posta->ID); ?></a>
					            </li>
					        <?php endforeach ?>
						</ul>
				<?php endif; ?>

			</article><!-- #product-## -->


		<?php endwhile; // end of the loop. ?>

<?php get_template_part('templates/photoswipedom'); ?>