			<footer>
				<section class="footer-widgets">
					<div class="container">
						<div class="row">
							 <?php if( is_active_sidebar( 'fancelab-sidebar-footer-1' )): ?>
							 	<div class="col-md-3 col-12">
							 		<?php dynamic_sidebar( 'fancelab-sidebar-footer-1' ); ?>
							 	</div>
							 <?php endif; ?>
							 <?php if( is_active_sidebar( 'fancelab-sidebar-footer-2' )): ?>
							 	<div class="col-md-3 col-12">
							 		<?php dynamic_sidebar( 'fancelab-sidebar-footer-2' ); ?>
							 	</div>
							 <?php endif; ?>
							 <?php if( is_active_sidebar( 'fancelab-sidebar-footer-3' )): ?>
							 	<div class="col-md-3 col-12">
							 		<?php dynamic_sidebar( 'fancelab-sidebar-footer-3' ); ?>
							 	</div>
							 <?php endif; ?>
							 <?php if( is_active_sidebar( 'fancelab-sidebar-footer-4' )): ?>
							 	<div class="col-md-3 col-12">
							 		<?php dynamic_sidebar( 'fancelab-sidebar-footer-4' ); ?>
							 	</div>
							 <?php endif; ?>	
						</div>
					</div>	
				</section>
				<section class="copyright">
					<div class="container">
						<div class="row">
							<div class="copyright-text col-md-6">
								<p><?php echo get_theme_mod( 'set_copyright' ); ?></p>
							</div>
							<nav class="footer-menu col-md-6 text-left text-md-right">
								<?php 
									wp_nav_menu(  
										array( 
											'theme_location' => 'fancelab_menu_rodapé',	
											'depth'			 =>	1
										 )
									);
								 ?>
							</nav>
						</div>
					</div>		
				</section>
			</footer>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>