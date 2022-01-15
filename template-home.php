<?php  
/*
Template name: Home Page
*/
get_header();?>
<!-- Inicio slides -->
<div class="content-area" id="banner">
			<main>
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
						<?php  
							for ( $i=1; $i < 4; $i++ ) :
								$slider_page[$i]         = get_theme_mod( 'set_slider_page' . $i );
								$slider_button_text[$i]  = get_theme_mod( 'set_slider_button_text' . $i);
								$slider_button_url[$i]   = get_theme_mod( 'set_slider_button_url' . $i);
							endfor;	
							$args = array(
								'post_type'			=> 'page',
								'posts_per_page'	=> 3,
								'post__in'		    => $slider_page,
								'orderby'           => 'post__in',
								
							);

							$slider_loop = new WP_Query( $args );
							$j = 1;

							if( $slider_loop->have_posts() ):
								while( $slider_loop->have_posts() ):
									$slider_loop->the_post();
							?>
					    <li>
					      <?php the_post_thumbnail( 'fancelab-slider', array( 'class' => 'img-fluid' ) ); ?>
					      <div class="container">
					      	<div class="slider-details-container">
					      		<div class="slider-title">
					      			<h1><?php the_title(); ?></h1>
					      		</div>
					      		<div class="slider-description">
					      			<div class="subtitle"><?php the_content(); ?></div>
					      			<a class="link" href="<?php echo esc_url( $slider_button_url[$j] ); ?>"><?php echo esc_html( $slider_button_text[$j] ); ?></a>
					      		</div>
					      	</div>
					      </div>
					    </li>
					<?php
					$j++;
					endwhile;
					wp_reset_postdata();
					endif;
					?>
				  </ul>
				</div>
			</section>
			<!-- Fim do slides -->

			<!-- Inicio produtos populares -->
			<?php 
				if( class_exists( 'WooCommerce' ) ):
			 ?>
				<section class="popular-products">
					<?php 
					$popular_limit  = get_theme_mod( 'set_popular_max_num', 4 );
					$popular_col    = get_theme_mod( 'set_popular_max_col', 4 );
					$arrivals_limit = get_theme_mod( 'set_new_arrivals_max_num', 4 );
					$arrivals_col   = get_theme_mod( 'set_new_arrivals_max_col', 4 );
					 ?>
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_popular_title', 'popular-products' ); ?></h2>
						</div>
						<?php echo do_shortcode( '[products limit=" ' .$popular_limit. ' " columns=" ' .$popular_col. ' " orderby="popularity"]' ); ?>
					</div>	
				</section>
				<sections class="new-arrivals">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_new_arrivals_title', 'New Arrivals' ); ?></h2>
						</div>
						<?php echo do_shortcode( '[products limit=" ' .$arrivals_limit. ' " columns=" ' .$arrivals_col. ' " orderby="date"]' ); ?>
					</div>
				</sections>
				<?php 
				$showdeal     = get_theme_mod( 'set_deal_show', 0 );
				$deal         = get_theme_mod( 'set_deal' );
				$currency     = get_woocommerce_currency_symbol();
				$regular      = get_post_meta( $deal, '_regular_price', true );
				$sale         = get_post_meta( $deal, '_sale_price', true ); 

				if( $showdeal == 1 && ( !empty( $deal ) ) ):
				$discount_percentage = absint( 100 - ( ( $sale/$regular ) * 100 ) );	
 				?>
 				<!-- Fim produtos populares -->

 				<!-- Inicio promoção da semana -->
				<section class="deal-of-the-week">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_deal_title', 'Deal of the Week' ); ?></h2>
						</div>
							<div class="row d-flex align-itens-center">
								<div class="deal-img col-md-6 col-12 ml-auto text-center">
									<?php echo get_the_post_thumbnail( $deal, 'large', array( 'class' => 'img-fluid' ) ); ?>
								</div>
								<div class="deal-desc col-md-4 col-12 mr-auto text-center">
								<?php if( !empty( $sale ) ): ?>	
									<span class="discount">
										<?php echo $discount_percentage . '% OFF'; ?>
									</span>
								<?php endif; ?>	
								<h3>
									<a href="<?php echo get_permalink( $deal ); ?>"><?php echo get_the_title( $deal ); ?></a>
								</h3>
								<p><?php echo get_the_excerpt( $deal ); ?></p>
								<div class="prices">
									<span class="regular">
										<?php echo sprintf( get_woocommerce_price_format(), $currency, $regular ); ?>
									</span>
										<?php if( !empty( $sale ) ): ?>	
									<span class="sale">
										<?php echo sprintf( get_woocommerce_price_format(), $currency, $sale ); ?>
									</span>
								<?php endif; ?>
								</div>
								<a href="<?php echo '?add-to-cart=' . $deal; ?>" class="add-to-cart">Adicionar ao carrinho</a>	
							</div>
						</div>
					</div>	
				</section>
				<?php endif; ?>
			    <?php endif; ?>
			    <!-- Fim promoção da semana -->

				<!-- Inicio Destaques -->
				<section class="site-blog">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_blog_title', 'Novidades' ); ?></h2>
						</div>
						<div class="row">
							<?php 
								$args = array( 
									'post_type' 			 => 'post',
									'posts_per_page'		 => 3,
									'ignore_sticky_posts'	 => true,

								 );
								$blog_posts = new WP_Query( $args );
								if ( $blog_posts->have_posts() ):
									while( $blog_posts->have_posts() ): $blog_posts->the_post();
							?>
								<article class="col-md-4">
									<div class="post-thumbanil">
										<a href="<?php the_permalink(); ?>">
											<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail(
														'fancelab-blog',
														array(
															'class' => 'img-fluid'
														)
													);
												}
											?>
										</a>
									</div>
									<h3>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<span class="pub-date">
										<a href="<?php the_permalink(); ?>">
											<?php echo get_the_date(); ?>
										</a>
									</span>
									<div class="excerpt"><?php the_excerpt(); ?></div>
									</article>
										<?php		
											endwhile;
												wp_reset_postdata();
									else: ?>			
								 <p>Noting to display</p>
								<?php endif; ?>
							</div>
						</div>	
				</section>
				<!-- Fim Destaques -->


				<!-- Inicio imagem promocional -->

			    <section class="site-blog">
					<div class="container">
						<div class="row">
						    <?php $Imagem_Promocional = get_field( 'Imagem Promocional' ); ?>
							<?php if ( $Imagem_Promocional ) : ?>
								<img src="<?php echo esc_url( $Imagem_Promocional['url'] ); ?>" alt="<?php echo esc_attr( $Imagem_Promocional['alt'] ); ?>" />
							<?php endif; ?>
						</div>	
				</section>
				<!-- Fim imagem promocional -->

				<!-- Início do blog -->
				<section class="site-blog">
    			<div class="container">
    				<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_deal_title', 'Notícias' ); ?></h2>
						</div>
    				<div class="row">
						<?php if ( have_rows( 'posts' ) ) : ?>
							
							<?php while ( have_rows( 'posts' ) ) : the_row(); ?>
								<?php $Posts = get_sub_field( 'Posts' ); ?>
								<?php if ( $Posts ) : ?>
									<?php foreach ( $Posts as $post ) :  ?>
										<?php setup_postdata( $post ); ?>
										<article class="col-md-4">
											<div class="post-thumbanil">
												<a href="<?php the_permalink(); ?>">
													<?php
														if ( has_post_thumbnail() ) {
															the_post_thumbnail(
																'fancelab-blog',
																array(
																	'class' => 'img-fluid'
																)
															);
														}
													?>
												</a>
											</div>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<h3>
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<span class="pub-date">
												<a href="<?php the_permalink(); ?>">
												<?php echo get_the_date(); ?>
												</a>
												</span>
												<div class="excerpt"><?php the_excerpt(); ?></div>
										</article>	
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="col-md-12 row d-flex justify-content-center">
								<a href="#">
									<button class="subscribe-form">Mais Posts <i class="fas fa-long-arrow-alt-right"></i></button>
								</a>	
						</div>		
					</div>
				</div>
				</section>
				<!-- Fim do blog -->

				<!-- Inicio da Newsletter -->

				<section class="site-blog subscribe-area pb-50 pt-70">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_blog_title', 'Newsletter' ); ?></h2>
						</div>
						<div class="row">
                                    <div class="col-md-4">
										<div class="subscribe-text mb-15">
											<span>ASSINE NOSSA NEWSLETTER</span>
											<h2>Inscreva-se newsletter</h2>
										</div>
									</div>
									<div class="col-md-8">
										<div class="subscribe-wrapper subscribe2-wrapper mb-15">
											<div class="subscribe-form">
												<form action="#">
													<input placeholder="Enter com seu e-mail" type="email">
													<button>Inscrever <i class="fas fa-long-arrow-alt-right"></i></button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</article>
						</div>	
				</section>
				<!-- Fim da Newsletter -->

				<!-- Conteúdo principal -->
				<section class="site-blog">
					<div class="container">
						<div class="section-title">
							<h2><?php echo get_theme_mod( 'set_blog_title', 'Conteúdo' ); ?></h2>
						</div>
						<div class="row">
							<?php the_field( 'Conteúdo Principal' ); ?>
						</div>	
				</section>
				<!-- Fim conteúdo principal -->
			</main>
		<?php get_footer(); ?>