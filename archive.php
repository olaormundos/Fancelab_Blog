		<?php get_header(); ?>
		<img src="<?php header_image(); ?>" class="img-fluid" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>"/>
		<div class="content-area">
			<main>
					<div class="container">
						<div class="row">
								<div class="blog-area col-lg-9 col-md-8 col-12">
								<?php 
									the_archive_title( '<h1 class="article-title">', '</h1>');
									if( have_posts() ):
										while( have_posts() ): the_post();
													get_template_part( 'template-parts/content', 'archive' );
											endwhile;
														the_posts_pagination(	array(
												'prev_text' => 'Previou',
												'next_text' => 'next',
											));
										else:?>
									 <p>Noting to display</p>
									<?php endif; ?>
								</div>
								<?php get_sidebar(); ?>
							</div>
						</div>	
				</section>
			</main>
		<?php get_footer(); ?>