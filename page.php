		<?php get_header(); ?>
		<img src="<?php header_image(); ?>" class="img-fluid" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>"/>
		<div class="content-area">
			<main>
					<div class="container">
							<?php
								while( have_posts() ): the_post();
											?>
								<article class="col">
										<h1><?php the_title(); ?></h1>
										<div class="content"><?php the_content(); ?></div>
								</article>
							<?php
							endwhile;
						?>
					</div>	
				</section>
			</main>
		<?php get_footer(); ?>