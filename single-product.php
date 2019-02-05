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
                    <h1 class="theref__title"><?php the_title(); ?></h1>
                    <div class="theref__lead">
                        <?php the_content(); ?>
                    </div>
                </header>
                <?php if (get_post_meta( get_the_ID(), '_cmb_quote', true )!='') :?>
						<blockquote class="quote" cite="<?php echo get_post_meta( get_the_ID(), '_cmb_quote_link', true ); ?>">
							<p><?php echo get_post_meta( get_the_ID(), '_cmb_quote', true ); ?></p>
							<footer>
								— <a href="<?php echo get_post_meta( get_the_ID(), '_cmb_quote_link', true ); ?>">
								<?php echo get_post_meta( get_the_ID(), '_cmb_quote_src', true ); ?>
								</a>
							</footer>
						</blockquote>
                <?php endif; ?>
                

                <div class="theref__params">
								<?php if (get_post_meta( get_the_ID(), '_cmb_alap', true )!='') :?>
									<p>
										<span class="name">Alapterület:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_alap', true); ?></span>
									</p>
								<?php endif; ?>
								<?php if (get_post_meta( get_the_ID(), '_cmb_hely', true )!='') :?>
									<p>
										<span class="name">Helyszín:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_hely', true); ?></span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_width', true )!='') :?>
									<p>
										<span class="name">Méret:</span>
										<span class="value">
											<?php echo get_post_meta( get_the_ID(), '_cmb_width', true); ?> &times;
											<?php echo get_post_meta( get_the_ID(), '_cmb_height', true); ?> &times;
											<?php echo get_post_meta( get_the_ID(), '_cmb_depth', true); ?>
										</span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_anyag', true )!='') :?>
									<p>
										<span class="name">Anyaga:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_anyag', true); ?></span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_keszulhet', true )!='') :?>
									<p>
										<span class="name">Készülhet még:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_keszulhet', true); ?></span>
									</p>
								<?php endif; ?>

								<?php if (get_post_meta( get_the_ID(), '_cmb_egyeb', true )!='') :?>
									<p>
										<span class="name">Egyéb:</span>
										<span class="value"><?php echo get_post_meta( get_the_ID(), '_cmb_egyeb', true); ?></span>
									</p>
								<?php endif; ?>
							</div>
							<div class="span5">
							<?php if ( get_post_meta( get_the_ID(), '_cmb_price', true )!='') : ?>
							<div class="prod-priceblock">
									<span class="ar">~Ár:</span>
									<span class="prod-price"><?php echo get_post_meta( get_the_ID(), '_cmb_price', true ); ?></span>
									<span class="penz">,- Ft</span>
									<a class="ib" href="#" data-trigger="hover" title="Miért nincs pontos ár?" data-toggle="popover"  data-content="Ide jön a magyarázkodás a hozzávetőleges árról.">
										<i class="icon-info-sign"></i>
									</a>


							</div>
							<?php endif; ?>
                

                <?php if(get_post_meta( get_the_ID(), '_cmb_photo_1', true ) !='')  : ?>
					<ul class="theref__gallery">
					<?php $k=0; while ( ($k<13) && (get_post_meta( get_the_ID(), '_cmb_photo_'.++$k, true ) !='')  ): ?>
					 <li class="theref__gallery__item">
					 	<?php
					 		$tsrc = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_cmb_photo_'.$k.'_id', true ), 'fullfree', false ) ;
					 		$tlnk = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_cmb_photo_'.$k.'_id', true ), 'fullfree', false ) ;
					 	?>
					 	<figure class="refthumb">
						 	<a href="<?php echo $tlnk[0] ; ?>">
						 		<img src="<?php echo $tsrc[0] ; ?>" />
							</a>
						</figure>
					</li>
					<?php endwhile;	?>
					</ul><!-- .gallery -->
				<?php endif; ?>



			







					<?php
					$the_related=new WP_Query( array(
											'post_type' => 'product',
											'taxonomy' => 'prodcat',
											'post__not_in' => array( $post->ID ),
											'term' => $term->slug

											) );
					?>
					<?php if ( $the_related->have_posts() ) :?>
					<div class="prod-related clearfix">
						<h3>További találatok a(z) <?php echo $term->name; ?> kategóriából</h3>
						<ul class="related-menu">
							<?php foreach( $the_related->posts as $posta ) : ?>
					            <li>
					              <a href="<?php echo get_permalink( $posta->ID ); ?>">
					              	<?php echo $posta->post_title; ?></a>
					            </li>
					        <?php endforeach ?>
<!-- 					        <li>
					            <a href="?prodcat=<?php echo $osanya; ?>#<?php echo $term->slug; ?>">
					                 <?php echo $term->name; ?> kategória összes találata
					            </a>
					        </li> -->
						</ul>
					</div>
				<?php endif; ?>


				<footer class="prod-meta">

				</footer><!-- .prod-meta -->
			</article><!-- #product-## -->


		<?php endwhile; // end of the loop. ?>

