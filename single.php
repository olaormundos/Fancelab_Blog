		<?php get_header(); ?>
		<img src="<?php header_image(); ?>" class="img-fluid" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>"/>
		<div class="content-area">
			<main>
					<div class="container">
						<div class="row">
							<div class="blog-area col-lg-9 col-md-8 col-12">
								<?php
								while ( have_posts()): the_post();
									get_template_part( 'template-parts/content', 'single' );
									?>
									<div class="col-6 text-left">
										<?php next_post_link( '&laquo; %link' ); ?>
									</div>
									<div class="col-6 text-right">
										<?php previous_post_link( '%link &raquo;' ); ?>
									</div>	
									<?php if( comments_open() || get_comments_number() ):
									comments_template();
								endif;
							endwhile;
							?>
						</div>
						<?php get_sidebar(); ?>
					</div>
				</div>
			</main>
		</div>	
	<?php get_footer(); ?>