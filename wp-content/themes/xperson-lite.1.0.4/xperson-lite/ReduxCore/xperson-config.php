<?php
	/**
	 * ReduxFramework Sample Config File
	 * For full documentation, please visit: http://docs.reduxframework.com/
	 */

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}


	// This is your option name where all the Redux data is stored.
	$opt_name = "xpersonlite";

	// This line is only for altering the demo. Can be easily removed.
	$opt_name = apply_filters( 'redux_demo/xperson', $opt_name );

	$imagepath  =  get_template_directory_uri() . '/images/';

	/**
	 * ---> SET ARGUMENTS
	 * All the possible arguments for Redux.
	 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
	 * */

	$theme = wp_get_theme(); // For use with some settings. Not necessary.

	$args = array(
		// TYPICAL -> Change these values as you need/desire
		'opt_name'			 => $opt_name,
		// This is where your data is stored in the database and also becomes your global variable name.
		'display_name'		 => $theme->get( 'Name' ),
		// Name that appears at the top of your panel
		'display_version'	  => $theme->get( 'Version' ),
		// Version that appears at the top of your panel
		'menu_type'			=> 'menu',
		//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
		'allow_sub_menu'	   => true,
		// Show the sections below the admin menu item or not
		'menu_title'		   => esc_html__( 'xPerson Options', 'xperson-lite' ),
		'page_title'		   => esc_html__( 'xPerson Options', 'xperson-lite' ),
		// You will need to generate a Google API key to use this feature.
		// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
		'google_api_key'	   => '',
		// Set it you want google fonts to update weekly. A google_api_key value is required.
		'google_update_weekly' => false,
		// Must be defined to add google fonts to the typography module
		'async_typography'	 => true,
		// Use a asynchronous font on the front end or font string
		//'disable_google_fonts_link' => true,					// Disable this in case you want to create your own google fonts loader
		'admin_bar'			=> true,
		// Show the panel pages on the admin bar
		'admin_bar_icon'	   => 'dashicons-portfolio',
		// Choose an icon for the admin bar menu
		'admin_bar_priority'   => 50,
		// Choose an priority for the admin bar menu
		'global_variable'	  => '',
		// Set a different name for your global variable other than the opt_name
		'dev_mode'			 => false,
		// Show the time the page took to load, etc
		'update_notice'		=> true,
		// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
		'customizer'		   => true,
		// Enable basic customizer support
		//'open_expanded'	 => true,					// Allow you to start the panel in an expanded way initially.
		//'disable_save_warn' => true,					// Disable the save warning when a user changes a field

		// OPTIONAL -> Give you extra features
		'page_priority'		=> null,
		// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
		'page_parent'		  => 'themes.php',
		// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
		'page_permissions'	 => 'manage_options',
		// Permissions needed to access the options panel.
		'menu_icon'			=> '',
		// Specify a custom URL to an icon
		'last_tab'			 => '',
		// Force your panel to always open to a specific tab (by id)
		'page_icon'			=> 'icon-themes',
		// Icon displayed in the admin panel next to your menu_title
		'page_slug'			=> '',
		// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
		'save_defaults'		=> true,
		// On load save the defaults to DB before user clicks save or not
		'default_show'		 => true,
		// If true, shows the default value next to each field that is not the default value.
		'default_mark'		 => '',
		// What to print by the field's title if the value shown is default. Suggested: *
		'show_import_export'   => true,
		// Shows the Import/Export panel when not used as a field.

		// CAREFUL -> These options are for advanced use only
		'transient_time'	   => 60 * MINUTE_IN_SECONDS,
		'output'			   => true,
		// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
		'output_tag'		   => true,
		// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
		// 'footer_credit'	 => '',				   // Disable the footer credit of Redux. Please leave if you can help it.

		// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
		'database'			 => '',
		// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
		'use_cdn'			  => true,
		// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

		// HINTS
		'hints'				=> array(
			'icon'		  => 'el el-question-sign',
			'icon_position' => 'right',
			'icon_color'	=> 'lightgray',
			'icon_size'	 => 'normal',
			'tip_style'	 => array(
				'color'   => 'red',
				'shadow'  => true,
				'rounded' => false,
				'style'   => '',
			),
			'tip_position'  => array(
				'my' => 'top left',
				'at' => 'bottom right',
			),
			'tip_effect'	=> array(
				'show' => array(
					'effect'   => 'slide',
					'duration' => '500',
					'event'	=> 'mouseover',
				),
				'hide' => array(
					'effect'   => 'slide',
					'duration' => '500',
					'event'	=> 'click mouseleave',
				),
			),
		)
	);


   // Add content after the form.
	$args['footer_text'] = '';

	Redux::setArgs( $opt_name, $args );

	/*
	 * ---> END ARGUMENTS
	 */


	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

	/*

		As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


	 */
	
	if ( !function_exists( 'the_custom_logo' ) ) {
		
		Redux::setSection($opt_name, array(
			'title'			=> esc_html__( 'Logo Settings', 'xperson-lite' ),
			'desc'			 => '',
			'icon'			 => 'el el-cog',
			'fields'		   => array(
				array(
					'id'   => 'skt-logo-image',
					'type'	 => 'media',
					'url'	  => true,
					'title'	=> esc_html__( 'Site Logo Image', 'xperson-lite' ),
					'default'  => array('url' => get_template_directory_uri() . '/images/logo.png'),
				),
			)  
		) );
	}

	Redux::setSection($opt_name, array(
		'title'			=> esc_html__( 'General Settings', 'xperson-lite' ),
		'desc'			 => '',
		'icon'			 => 'el el-cog',
		'fields'		   => array(
			array(
				'id'	   => 'skt-primary-color',
				'type'	 => 'color',
				'title'	=> esc_html__( 'Primary Theme Color', 'xperson-lite' ),
				'desc'	 => esc_html__( 'Please choose primary color of theme', 'xperson-lite' ),
				'default'   => '#009387',   
			),
			array(
				'id'	   => 'skt-secondary-color',
				'type'	 => 'color',
				'title'	=> esc_html__( 'Secondary Theme Color', 'xperson-lite' ),
				'desc'	 => esc_html__( 'Please choose secondary color of theme', 'xperson-lite' ),
				'default'   => '#2e383e',
			),
			array(
				'id'   => 'skt-preloader-image',
				'type'	 => 'media',
				'url'	  => true,
				'title'	=> esc_html__( 'Pre-loader Image', 'xperson-lite' ),
				'default'  => array('url' => $imagepath.'preloader.gif'),
			),
			array(
			    'id'          => 'skt-typography',
			    'type'        => 'typography',
			    'title'       => esc_html__('Typography', 'xperson-lite'),
			    'google'      => true,
			    'font-backup' => false,
			    'output'      => true,
			    'units'       =>'px',
			    'default'     => array(
			        'color'       => '#777', 
			        'font-style'  => '400', 
			        'font-family' => 'Roboto', 
			        'google'      => true,
			        'font-size'   => '14px', 
			        'line-height' => '28px'
				)
			),
		)  
	) );

	Redux::setSection($opt_name, array(
		'title'			=> esc_html__( 'Header Settings', 'xperson-lite' ),
		'desc'			 => esc_html__('Upload header image from "Appearance->Customize->Header Image"', 'xperson-lite' ),
		'icon'			 => 'el el-th-list',
		'fields' => array(
			array(
				'id'	   => 'skt-header-overlay-color',
				'type'	  => 'color_rgba',
				'title'	 => esc_html__('Header Overlay Color', 'xperson-lite' ),
				'subtitle'  => esc_html__('Set color and alpha channel', 'xperson-lite' ),
				'default'   => array(
					'color'	 => '#1A1E23',
					'alpha'	 => 0.6
				),
			),
			array(
				'id'=>'skt-header-subtitle',
				'type' => 'text',
				'title' => esc_html__('Header Profile Subtitle', 'xperson-lite'), 
				'subtitle' => esc_html__('Enter profile subtitle text.', 'xperson-lite'),
				'desc' => '',
				'validate' => 'html',
			),
			array(
				'id'=>'skt-header-title',
				'type' => 'text',
				'title' => esc_html__('Header Profile Title', 'xperson-lite'), 
				'subtitle' => esc_html__('Enter profile title text. Wrap word/words in span tag to change color.', 'xperson-lite'),
				'desc' => '',
				'validate' => 'html',
			),
			array(
				'id'=>'skt-header-text',
				'type' => 'textarea',
				'title' => esc_html__('Header Profile Description', 'xperson-lite'), 
				'subtitle' => esc_html__('Enter profile content/description.', 'xperson-lite'),
				'desc' => '',
				'validate' => 'html',
			),
			array(
				'id'		=> 'facebook-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Facebook link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Facebook link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'twitter-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Twitter link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Twitter link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'behance-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Behance link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Behance link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'dribbble-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Dribbble link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Dribbble link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'pinterest-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Pinterest link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Pinterest link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'google-plus-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Google link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Google link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'linkedin-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Linkedin link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Linkedin link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'instagram-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Instagram link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Instagram link.', 'xperson-lite'),
			),
			array(
				'id'		=> 'xing-url',
				'type'	  => 'text',
				'title'	 => esc_html__('Xing link', 'xperson-lite'),
				'desc'	  => esc_html__('Enter Xing link.', 'xperson-lite'),
			),
		)  
	) );
	
	$xpersonlite_categories = get_categories();
	$xpersonlite_timeline_category = array();
	if ( ! empty( $xpersonlite_categories ) ) {
	    foreach( $xpersonlite_categories as $xpersonlite_category ) {
	        $key = $xpersonlite_category->slug;
	        $xpersonlite_timeline_category[$key] = $xpersonlite_category->name;
	    }
	}

	$xpersonlite_pages = get_pages( array('post_type' => 'page') );
	$xpersonlite_landing_pages = array();
	$xpersonlite_landing_pages['none'] = esc_html__('Select Page', 'xperson-lite');
	if ( ! empty( $xpersonlite_pages ) ) {
		foreach ( $xpersonlite_pages as $xpersonlite_page ) {
			$key = $xpersonlite_page->ID;
			$xpersonlite_landing_pages[$key] = $xpersonlite_page->post_title;
		}
	}
	
	Redux::setSection($opt_name, array(
		'title'			=> esc_html__( 'Static Front Page Settings', 'xperson-lite' ),
		'desc'			 => esc_html__( 'Set A static front page from Appearance->Customize->Static Front Page.', 'xperson-lite' ),
		'icon'			 => 'el el-bookmark',
		'fields'		   => array(
			array(
				'id'			  => 'skt-timeline-section',
				'type'			=> 'select',
				'title'		   => esc_html__( 'Show Timeline Section', 'xperson-lite' ),
				'desc'			=> esc_html__( 'Please select option to show/hide timeline section.', 'xperson-lite' ),
				'customizer_only' => false,
				'options'		 => array(
					'on' => 'On',
					'off' => 'Off',
				),
				'default'		 => 'on'
			),
			array(
				'id'		=> 'skt-timeline-category',
				'type'		=> 'select',
				'title'		=> esc_html__('Category Name', 'xperson-lite'),
				'desc'		=> esc_html__('In Menus create custom link with "#front-timeline-section" and add in Landing Page Navigation. For multiple timeline upgrade to pro version.', 'xperson-lite'),
				'customizer_only' => false,
				//Must provide key => value pairs for select options
				'options'		 => $xpersonlite_timeline_category,
				'default'		 => 'uncategorized'
			),
			array(
				'id'			  => 'skt-landing-page1',
				'type'			=> 'select',
				'title'		   => esc_html__( 'Select Landing Page', 'xperson-lite' ),
				'desc'		=> esc_html__('In Menus create custom link with "#section1" and add in Landing Page Navigation. For multiple landing pages with parallax, and more features upgrade to pro.', 'xperson-lite'),
				'customizer_only' => false,
				'options'		 => $xpersonlite_landing_pages,
				'default'		 => 'none'
			),
		)
	) );

	Redux::setSection($opt_name, array(
		'title'			=> esc_html__( 'Breadcrumb Settings', 'xperson-lite' ),
		'desc'			 => esc_html__( 'This is global setting for breadcrumb section. The breadcrum section ', 'xperson-lite' ),
		'icon'			 => 'el el-bookmark',
		'fields'		   => array(
			array(
				'id'			  => 'skt-breadcrumb-section',
				'type'			=> 'select',
				'title'		   => esc_html__( 'Show Breadcrumb Section', 'xperson-lite' ),
				'desc'			=> esc_html__( 'Please select one option to show/hide whole custom breadcrumb section.', 'xperson-lite' ),
				'customizer_only' => false,
				'options'		 => array(
					'on' => 'On',
					'off' => 'Off',
				),
				'default'		 => 'on'
			),
			array(
				'id'   => 'skt-breadcrumb-image',
				'type'	 => 'media',
				'url'	  => true,
				'title'	=> esc_html__( 'Breadcrumb Image', 'xperson-lite' ),
				'default'  => array('url' => $imagepath.'breadcrumb.jpg'),
			),
			array(
				'id'	=> 'skt-breadcrumb-image-repeat',
				'type'	=> 'select',
				'title'	=> esc_html__( 'Background Image Repeat', 'xperson-lite' ),
				'customizer_only' => false,
				//Must provide key => value pairs for select options
				'options'	=> array(
					'no-repeat'   => esc_html__( 'No Repeat', 'xperson-lite' ),
					'repeat-all'	 => esc_html__( 'Repeat All', 'xperson-lite' ),
					'repeat-x'   => esc_html__( 'Repeat Horizontally', 'xperson-lite' ),
					'repeat-y'	 => esc_html__( 'Repeat Vertically', 'xperson-lite' ),
					'inherit'   => esc_html__( 'Inherit', 'xperson-lite' ),
				),
				'default' => 'no-repeat',
			),
			array(
				'id'	=> 'skt-breadcrumb-image-attach',
				'type'	=> 'select',
				'title'	=> esc_html__( 'Background Image Attachment', 'xperson-lite' ),
				'customizer_only' => false,
				'options' => array(
					'background-attachment' => esc_html__( 'Background Attachment', 'xperson-lite' ),
					'fixed'   => esc_html__( 'Fixed', 'xperson-lite' ),
					'scroll'	 => esc_html__( 'Scroll', 'xperson-lite' ),
					'inherit'   => esc_html__( 'Inherit', 'xperson-lite' ),
				),
				'default' => 'scroll',
			),
			array(
				'id'	=> 'skt-breadcrumb-image-position',
				'type'	=> 'select',
				'title'	=> esc_html__( 'Background Image Position', 'xperson-lite' ),
				'customizer_only' => false,
				//Must provide key => value pairs for select options
				'options' => array(
				'inherit' => esc_html__( 'Background Position', 'xperson-lite' ),
					'inherit' => esc_html__( 'Background Position', 'xperson-lite' ),
					'left top'   => esc_html__( 'Left Top', 'xperson-lite' ),
					'left center'	 => esc_html__( 'Left Center', 'xperson-lite' ),
					'left bottom'   => esc_html__( 'Left Bottom', 'xperson-lite' ),
					'center top'   => esc_html__( 'Center Top', 'xperson-lite' ),
					'center center'	 => esc_html__( 'Center Center', 'xperson-lite' ),
					'center bottom'   => esc_html__( 'Center Bottom', 'xperson-lite' ),
					'right top'   => esc_html__( 'Right Top', 'xperson-lite' ),
					'right center'	 => esc_html__( 'Right Center', 'xperson-lite' ),
					'right bottom'   => esc_html__( 'Right Bottom', 'xperson-lite' ),
					'top left'   => esc_html__( 'Top Left', 'xperson-lite' ),
					'top center'   => esc_html__( 'Top Center', 'xperson-lite' ),
					'top right'   => esc_html__( 'Top Right', 'xperson-lite' ),
				),
				'default' => 'center center',
			),
			array(
				'id'		=> 'skt-breadcrumb-image-size',
				'title'	=> esc_html__( 'Background Image Size', 'xperson-lite' ),
				'type'	  => 'text',
				'default'   => 'cover'
			),
			array(
				'id'	   => 'skt-breadcrumb-overlay-color',
				'type'	 => 'color',
				'title'	=> esc_html__( 'Header Background Overlay Color', 'xperson-lite' ),
				'default'  => '#000000',
			),
			array(
				'id'		=> 'skt-breadcrumb-overlay-opacity',
				'title'	=> esc_html__( 'Overlay Color Opacity', 'xperson-lite' ),
				'desc'   => esc_html__('Enter number between 0 - 1. For example 0.5 or 0.95. 0 - Full Transparant and 1 - Solid color', 'xperson-lite' ),
				'type'	  => 'text',
				'default'   => '0.5'
			),
		)  
	) );


	Redux::setSection( $opt_name, array(
		'icon'   => 'el el-website',
		'title'  => esc_html__( 'Footer Setting', 'xperson-lite' ),
		'fields' => array(
			array(
				'id'	   => 'skt-footer-background-color',
				'type'	 => 'color',
				'title'	=> esc_html__( 'Footer Background Color', 'xperson-lite' ),
				'desc'	 => esc_html__( 'Please choose footer background color', 'xperson-lite' ),
				'default'   => '#1a1e23',
			),
			array(
				'id'	   => 'skt-footer-font-color',
				'type'	 => 'color',
				'title'	=> esc_html__( 'Footer Font Color', 'xperson-lite' ),
				'desc'	 => esc_html__( 'Set footer font color.', 'xperson-lite' ),
				'default'   => '#ffffff'
			),
		   	array(
				'id'	=> 'skt-copyright-text',
				'type'	=> 'textarea',
				'title'	=> esc_html__('Copyright Text.', 'xperson-lite'), 
				'subtitle'	=> esc_html__('You can use HTML for links etc..', 'xperson-lite'),
				'default'	=> esc_html__( 'Proudly powered by WordPress', 'xperson-lite' ),
				'args'   => array(
					'teeny'			=> true,
					'textarea_rows'	=> 10
				)
			),
		)
	));

	/**
	 * Custom function for the callback validation referenced above
	 * */
	if ( ! function_exists( 'redux_validate_callback_function' ) ) {
		function redux_validate_callback_function( $field, $value, $existing_value ) {
			$error   = false;
			$warning = false;

			//do your validation
			if ( $value == 1 ) {
				$error = true;
				$value = $existing_value;
			} elseif ( $value == 2 ) {
				$warning = true;
				$value   = $existing_value;
			}

			$return['value'] = $value;

			if ( $error == true ) {
				$return['error'] = $field;
				$field['msg']	= '';
			}

			if ( $warning == true ) {
				$return['warning'] = $field;
				$field['msg']	  = '';
			}

			return $return;
		}
	}

	/**
	 * Custom function for the callback referenced above
	 */
	if ( ! function_exists( 'redux_my_custom_field' ) ) {
		function redux_my_custom_field( $field, $value ) {
			print_r( $field );
			echo '<br/>';
			print_r( $value );
		}
	}

	/**
	 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built in icons
	 * */
	if ( ! function_exists( 'dynamic_section' ) ) {
		function dynamic_section( $sections ) {
			//$sections = array();
			$sections[] = array(
				'title'  => esc_html__( 'Section via hook', 'xperson-lite' ),
				'desc'   => esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'xperson-lite' ),
				'icon'   => 'el el-paper-clip',
				// Leave this as a blank section, no options just some intro text set above.
				'fields' => array()
			);

			return $sections;
		}
	}

	/**
	 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
	 * */
	if ( ! function_exists( 'change_arguments' ) ) {
		function change_arguments( $args ) {
			//$args['dev_mode'] = true;

			return $args;
		}
	}

	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 * */
	if ( ! function_exists( 'change_defaults' ) ) {
		function change_defaults( $defaults ) {
			$defaults['str_replace'] = '';

			return $defaults;
		}
	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	 */
	if ( ! function_exists( 'remove_demo' ) ) {
		function remove_demo() {
			// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				remove_filter( 'plugin_row_meta', array(
					ReduxFrameworkPlugin::instance(),
					'plugin_metalinks'
				), null, 2 );

				// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
				remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}
	}