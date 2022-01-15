		<?php get_header(); ?>
		<img src="<?php header_image(); ?>" class="img-fluid" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>"/>
		<div class="content-area">
			<main>
					<div class="container">
						<div class="row">
							<?php 
								if( have_posts() ):
									while( have_posts() ): the_post();
												?>
												<article>
													<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
													<div class="post-thumbnail">
														<h1>Search Results for: <?php echo get_search_query(); ?></h1>
													<?php
														if ( has_post_thumbnail() ) {
																the_post_thumbnail( 'fancelab-blog', array( 'class' => 'img-fluid') );
															}
													?>
													</div>
													<div class="meta">
														<p>Published by <?php the_author_posts_link(); ?> on <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
													<br />
													<?php if( has_category() ): ?>
														Categories: <span><?php the_category( ' ' ); ?></span>
													<br />
													<?php endif; ?>
													<?php if( has_tag() ): ?>
														Tags: <span><?php the_tags( '', ' , ' ); ?></span>
													<?php endif; ?>	
													</p>
													</div>	
													</div>	
													</div>			
													<div class="content"><?php the_excerpt(); ?></div>
												</article>
											<?php
										endwhile;
										the_posts_pagination( array(
											'prev_text' => 'Previous',
											'next_text'	=> 'Next',
										));
									else:?>
								 <p>Noting to display</p>
								<?php endif; ?>
							</div>
						</div>	
				</section>
			</main>
		<?php get_footer(); ?>