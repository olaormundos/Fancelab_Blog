<?php
//Registrando navegação customizada navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

//Registrando template da loja
if( class_exists( 'WooCommerce' ) ){
	require get_template_directory() . '/inc/wc-modifications.php';
}

//Registrando Customizer
require_once get_template_directory() . '/inc/customizer.php';

//Carregando nossos scripts e folhas de estilo

 function estilos_load_scripts(){
//Bootstrap javascript and CSS files
 	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
 	wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );

 	// Theme's main stylesheet
 	wp_enqueue_style( 'aprendawp-style', get_stylesheet_uri(), array(),'1.0', 'all' );

 	// Google Fonts
 	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

 	// Flexslider Javascript and CSS files
	wp_enqueue_script( 'flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all' );
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '', true ); 
	//Font Awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/all.css', array(), '5.2.0', 'all' );
//Para aparecer o campo de comentários somente no post
 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comments_reply' );
 	}
 }
  	add_action( 'wp_enqueue_scripts', 'estilos_load_scripts' );

//Registrando Menus
 function fancelab_config(){
 	register_nav_menus(
 		array(
 			'fancelab_menu_principal' => 'fancelab menu principal',
 			'fancelab_menu_rodapé' => 'fancelab menu rodapé'
 		)
 	);
// Suporte ao Woocommerce 	
 	add_theme_support( 'woocommerce', array(
 		'thumbnail_image_width' => 225,
 		'single_image_width'    => 225,
 		'product_grid' => array(
 			'default_rows'    => 12,
 			'min_rows'        => 3,
 			'max_rows'        => 10,
 			'default_columns' => 1,
 			'min_columns'     => 3,
 			'max_columns'     => 12,
 		) 
 	) );
 	add_theme_support( 'wc-product-gallery-zoom' );
 	add_theme_support( 'wc-product-gallery-lightbox' );
 	add_theme_support( 'wc-product-gallery-slider' );
 	set_post_thumbnail_size( 825, 510, true );
 	add_theme_support( 'title-tag' );
 	add_theme_support( 'custom-logo', 
 		array( 'height' => 85,
 			   'width'  => 160,
 			   'flex-height' => true,
 			   'flex-width'   => true) 
 	);
 	//Tamanho das imagens
 	add_theme_support( 'post-thumbnails' );
 	add_image_size( 'fancelab-blog', 960, 640, array( 'center', 'center' ) );
    add_image_size( 'fancelab-slider', 1920, 800, array( 'center', 'center' ) );
	$args = array(
 					'height' => 225,
 					'width'  => 1920		
 			);
 	add_theme_support( 'custom-header', $args );
 	if( ! isset( $content_width ) ){
 		$content_width = 600;
 	}
 }
 add_action( 'after_setup_theme', 'fancelab_config', 0 );

 /**
  * Show cart contents / total Ajax
  */
add_filter( 'woocommerce_add_to_cart_fragments', 'fancelab_woocommerce_header_add_to_cart_fragment' );

function fancelab_woocommerce_header_add_to_cart_fragment( $fragments ) {
		 global $woocommerce;

		 ob_start();
		 ?>
		 <span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
		 <?php
		 $fragments['span.items'] = ob_get_clean();
		 return $fragments;
}

 /* Registrando áreas de widgets */
 add_action( 'widgets_init', 'fancelab_sidebars' );
 	function fancelab_sidebars(){
 		register_sidebar( array( 
 			'name'          => 'FanceLab Main Sidebar',
 			'id'            => 'fancelab-sidebar-1',
 			'description'   => 'Drag and drop your widgets here',
 			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
 			'after_widget'  => '</div>',
 			'before_title'  => '<h4 class="widget-title">',
 			'after_title'   => '</h4>',
 		));
 		register_sidebar( array( 
 			'name'          => 'Sidebar Footer 1',
 			'id'            => 'fancelab-sidebar-footer-1',
 			'description'   => 'Drag and drop your widgets here',
 			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
 			'after_widget'  => '</div>',
 			'before_title'  => '<h4 class="widget-title">',
 			'after_title'   => '</h4>',
 		));
 		register_sidebar( array( 
 			'name'          => 'Sidebar Footer 2',
 			'id'            => 'fancelab-sidebar-footer-2',
 			'description'   => 'Drag and drop your widgets here',
 			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
 			'after_widget'  => '</div>',
 			'before_title'  => '<h4 class="widget-title">',
 			'after_title'   => '</h4>',
 		));
 		register_sidebar( array( 
 			'name'          => 'Sidebar Footer 3',
 			'id'            => 'fancelab-sidebar-footer-3',
 			'description'   => 'Drag and drop your widgets here',
 			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
 			'after_widget'  => '</div>',
 			'before_title'  => '<h4 class="widget-title">',
 			'after_title'   => '</h4>',
 		));
 		register_sidebar( array( 
 			'name'          => 'Sidebar Footer 4',
 			'id'            => 'fancelab-sidebar-footer-4',
 			'description'   => 'Drag and drop your widgets here',
 			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
 			'after_widget'  => '</div>',
 			'before_title'  => '<h4 class="widget-title">',
 			'after_title'   => '</h4>',
 		));
 		register_sidebar( array( 
 			'name'           => 'Sidebar Shop',
 			'id'             => 'fancelab-wp-sidebar-shop',
 			'description'    => 'Drag and drop your woocommerce widgets here',
 			'before_widget'  => '<div id="%1$s" class="widget %2$s widget-wrapper">',
 			'after_widget'   => '</div>',
 			'before_title'   => '<h4 class="widget-title">',
 			'after_title'    => '</h4>,'
 		 ) );
 	}
/* Remover o campo de url do formulário de comentário do post e também move o campo comentário para baixo */
 function FanceLab_remove_website_field( $fields ){
 	unset( $fields['url'] );
 	return $fields;
 }
 add_filter( 'comment_form_default_fields', 'FanceLab_remove_website_field' );

 function FanceLab_move_comment_field_to_bottom( $fields ){
 	$comment_field = $fields['comment'];
 	unset( $fields['comment'] );
 	$fields['comment'] = $comment_field;
 	return $fields;
 }
add_filter( 'comment_form_fields', 'FanceLab_move_comment_field_to_bottom' );

// Remover espaços em branco nas áreas de widgets
function fancelab_wp_body_classes( $classes ) {

	if( ! is_active_sidebar( 'fancelab-wp-sidebar-1' ) ){
		$classes[] = 'no-sidebar';
	}
	if ( ! is_active_sidebar( 'fancelab-wp-sidebar-shop' ) ){
		$classes[] = 'no-sidebar-shop';
	}
	/*if( ! is_active_sidebar( 'fancelab-wp-sidebar-footer1' ) && ! is_active_sidebar( 'fancelab-wp-sidebar-footer2' ) && ! is_active_sidebar( 'fancelab-wp-sidebar-footer-3' ) ){
		$classes[] = 'no-sidebar-footer';
	}*/
	return $classes;
}
add_filter( 'body_class', 'fancelab_wp_body_classes' );

//Logo customizada na pagina de login (admin)

// Alterar o logo tela de login
function tpw_enqueue_admin_style() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/inc/login-styles.css" />';
}

add_action('login_head', 'tpw_enqueue_admin_style');