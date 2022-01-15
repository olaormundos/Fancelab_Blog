<?php 

/**
 * AprendaWP Theme Customizer
 *
 * @package Fancelab
 */

function fancelab_customizer( $wp_customize ){	

	$wp_customize->add_section(
		'sec_copyright', array(
			'title'			=> __( 'Copyright Settings', 'fancelab' ),
			'description'	=> __( 'Copyright Section', 'fancelab' ),
			'priority' 		=> 160,
		)
	);

	$wp_customize->add_setting(
		'set_copyright', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_copyright', array(
			'label'			=> __( 'Copyright', 'fancelab' ),
			'description'	=> __( 'Please, add your copyright information here', 'fancelab' ),
			'section'		=> 'sec_copyright',
			'type'			=> 'text'
		)
	);


	$wp_customize->add_section(
		'sec_slider', array(
			'title'			=> __( 'Slider Settings', 'fancelab' ),
			'description'	=> __( 'Slider Section', 'fancelab' ),
		)
	);

	$wp_customize->add_setting(
		'set_slider_page1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page1', array(
			'label'			=> __( 'Set slider page 1', 'fancelab' ),
			'description'	=> __( 'Set slider page 1', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_text1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text1', array(
			'label'			=> __( 'Button Text for Page 1', 'fancelab' ),
			'description'	=> __( 'Button Text for Page 1', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_url1', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url1', array(
			'label'			=> __( 'URL for Page 1', 'fancelab' ),
			'description'	=> __( 'URL for Page 1', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);

	$wp_customize->add_setting(
		'set_slider_page2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page2', array(
			'label'			=> __( 'Set slider page 2', 'fancelab' ),
			'description'	=> __( 'Set slider page 2', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);			

	$wp_customize->add_setting(
		'set_slider_button_text2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text2', array(
			'label'			=> __( 'Button Text for Page 2', 'fancelab' ),
			'description'	=> __( 'Button Text for Page 2', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_url2', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url2', array(
			'label'			=> __( 'URL for Page 2', 'fancelab' ),
			'description'	=> __( 'URL for Page 2', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);			

	$wp_customize->add_setting(
		'set_slider_page3', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_page3', array(
			'label'			=> __( 'Set slider page 3', 'fancelab' ),
			'description'	=> __( 'Set slider page 3', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'dropdown-pages'
		)
	);			

	$wp_customize->add_setting(
		'set_slider_button_text3', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_text3', array(
			'label'			=> __( 'Button Text for Page 3', 'fancelab' ),
			'description'	=> __( 'Button Text for Page 3', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'text'
		)
	);

	$wp_customize->add_setting(
		'set_slider_button_url3', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'set_slider_button_url3', array(
			'label'			=> __( 'URL for Page 3', 'fancelab' ),
			'description'	=> __( 'URL for Page 3', 'fancelab' ),
			'section'		=> 'sec_slider',
			'type'			=> 'url'
		)
	);


	/*------------------*/
	// Home Page Settings

	$wp_customize->add_section(
		'sec_home_page', array(
			'title'			=> __( 'Home Page Products and Blog Settings', 'fancelab' ),
			'description'	=> __( 'Home Page Section', 'fancelab' ),
		)
	);	

	if( class_exists( 'WooCommerce' )):

		$wp_customize->add_setting(
			'set_popular_title', array(
				'type' 				=> 'theme_mod',
				'default' 			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_popular_title', array(
				'label' 		=> __( 'Popular Products Title', 'fancelab' ),
				'description' 	=> __( 'Popular Products Title', 'fancelab' ),
				'section' 		=> 'sec_home_page',
				'type' 			=> 'text'
			)
		);

		$wp_customize->add_setting(
			'set_popular_max_num', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_popular_max_num', array(
				'label'			=> __( 'Popular Products Max Number', 'fancelab' ),
				'description'	=> __( 'Popular Products Max Number', 'fancelab' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
			'set_popular_max_col', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_popular_max_col', array(
				'label'			=> __( 'Popular Products Max Columns', 'fancelab' ),
				'description'	=> __( 'Popular Products Max Columns', 'fancelab' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
			'set_new_arrivals_title', array(
				'type' 				=> 'theme_mod',
				'default' 			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_title', array(
				'label' 		=> __( 'New Arrivals Title', 'fancelab' ), 
				'description' 	=> __( 'New Arrivals Title', 'fancelab' ), 
				'section' 		=> 'sec_home_page',
				'type' 			=> 'text'
			)
		);

		$wp_customize->add_setting(
			'set_new_arrivals_max_num', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_num', array(
				'label'			=> __( 'New Arrivals Max Number', 'fancelab' ), 
				'description'	=> __( 'New Arrivals Max Number', 'fancelab' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
			'set_new_arrivals_max_col', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_col', array(
				'label'			=> __( 'New Arrivals Max Columns', 'fancelab' ), 
				'description'	=> __( 'New Arrivals Max Columns', 'fancelab' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		$wp_customize->add_setting(
		'set_deal_show', array(
			'type'					=> 'theme_mod',
			'default'				=> '',
			'sanitize_callback'		=> 'fancelab_sanitize_checkbox'
		)
		);

		$wp_customize->add_setting(
			'set_deal_title', array(
				'type' 				=> 'theme_mod',
				'default' 			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_deal_title', array(
				'label' 		=> __( 'Deal of the Week Title', 'fancelab' ),
				'description' 	=> __( 'Deal of the Week Title', 'fancelab' ),
				'section' 		=> 'sec_home_page',
				'type' 			=> 'text'
			)
		);

		$wp_customize->add_control(
			'set_deal_show', array(
				'label'			=> __( 'Show Deal of the Week?', 'fancelab' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		$wp_customize->add_setting(
			'set_deal', array(
				'type'					=> 'theme_mod',
				'default'				=> '',
				'sanitize_callback'		=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_deal', array(
				'label'			=> __( 'Deal of the Week Product ID', 'fancelab' ),
				'description'	=> __( 'Product ID to Display', 'fancelab' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

	endif;

	$wp_customize->add_setting(
		'set_blog_title', array(
			'type' 				=> 'theme_mod',
			'default' 			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'set_blog_title', array(
			'label' 		=> __( 'Blog Section Title', 'fancelab' ),
			'description' 	=> __( 'Blog Section Title', 'fancelab' ),
			'section' 		=> 'sec_home_page',
			'type' 			=> 'text'
		)
	);

}
add_action( 'customize_register', 'fancelab_customizer' );

function fancelab_sanitize_checkbox( $checked ){
	return ( ( isset ( $checked ) && true == $checked ) ? true : false );
}