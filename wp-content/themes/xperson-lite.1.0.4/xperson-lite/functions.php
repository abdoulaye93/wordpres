<?php 
/********************************************************
	xPerson FRAMEWORK FILES
*********************************************************/
require_once( get_template_directory().'/SketchBoard/functions/sketch-enqueue.php' );	// Enqueue all css, js, fonts files


/********************************************************
	xPerson OPTIONS FRAMEWORK ( Redux )
*********************************************************/
require_once( get_template_directory().'/ReduxCore/xperson-config.php' );	// theme options using Redux

/**
 * xPerson RECOMMENDED PLUGINS
 */
require_once( get_template_directory().'/includes/skt-required-plugins.php' );

function xperson_lite_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on xPerson Lite, use a find and replace
	 * to change 'xperson-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'xperson-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *  @since xPerson Lite 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'	  => 30,
		'width'	   => 98,
		'flex-width' => true,
		'flex-height' => true,
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 600, array( 'top', 'left') ); // 800x600 pixels, hard crop mode 4:3
	add_image_size( 'xperson-blog-thumbnail', 1170, 390, true );  // 1170x390 pixels, hard crop mode 3:1

	/*
	 * Enable support for Post Formats.
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	));

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('editor-style.css');
	
	/*
	 * This theme uses wp_nav_menu() in one location.
	 * 1. Landing Page Navigation
	 */
	register_nav_menus( array(
		'landing_page_nav' => esc_html__( 'Landing Page Navigation', 'xperson-lite'),
	));

	// This theme allows users to set a custom header.
	add_theme_support( 'custom-header', array(
		'flex-width' => true,
		'width' => 'auto',
		'flex-height' => true,
		'height' => 'auto',
		'default-text-color' => '#ffffff',
		'default-image' => get_template_directory_uri() . '/images/header.jpg'
	));


	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'xperson_custom_background_args', array('default-color' => 'ffffff') ) );
	/*
	 * Sets the content width in pixels, based on the theme's design and stylesheet.
	 * Priority 0 to make it available to lower priority callbacks.
	 * @global int $content_width
	 * @since xPerson Lite 1.0.0
	 */
	$GLOBALS['content_width'] = apply_filters( 'xperson_content_width', 840 );
}
add_action( 'after_setup_theme', 'xperson_lite_theme_setup' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since xPerson Lite 1.0.0
 */
function xperson_lite_widgets_init() {
	register_sidebar( array(
		'name'		  => esc_html__( 'Sidebar', 'xperson-lite' ),
		'id'			=> 'primary-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'xperson-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'xperson_lite_widgets_init' );

/**
* Funtion to add CSS class to post
*/
function xperson_lite_post_class( $classes ) {
	$classes[] = 'blog-post-wrapper';
	return $classes;
}
add_filter( 'post_class','xperson_lite_post_class' );

/**
 * Filter content with empty post title
 */
function xperson_lite_untitled($title) {
	if ($title == '') {
		return esc_html__('Untitled','xperson-lite');
	} else {
		return $title;
	}
}
add_filter('the_title', 'xperson_lite_untitled');

/**
 * Filters the output of default password form
 * Wraps the input type in 'form-control' class for common theme style
 */
function xperson_lite_custom_password_form() {
	global $post;
	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$output = '<form action="' . esc_url(get_option('siteurl')) . '/wp-pass.php" class="post-password-form" method="post">
	<p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'xperson-lite' ) . '</p>
	<p><label for="' . $label . '">' . esc_html__( 'Password:', 'xperson-lite' ) . ' <input name="post_password" id="' . $label . '" class="form-control" type="password" size="20" /></label> <input type="submit" name="' . esc_html__( 'Submit', 'xperson-lite' ) . '" value="' . esc_attr_x( 'Enter', 'post password form', 'xperson-lite' ) . '" /></p></form>
	';
	return $output;
}
add_filter( 'the_password_form', 'xperson_lite_custom_password_form' );

function xperson_lite_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	} else {
		global $xpersonlite;
		$xpersonlite_logo = isset( $xpersonlite['skt-logo-image']['url'] ) ? $xpersonlite['skt-logo-image']['url'] : '';

		echo '<a href="'.esc_url(home_url('/')).'" class="custom-logo-link" rel="home" itemprop="url" title="Shift-click to edit this element."><img src="'.esc_url($xpersonlite_logo).'" class="custom-logo" alt="xperson-logo" itemprop="logo"></a>';
	}
	if ( display_header_text() ) :
		if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_attr($description); ?></p>
		<?php endif;
	 endif;
}

function xperson_lite_Hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
	$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
	$rgbArray = array();
	if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
		$colorVal = hexdec($hexStr);
		$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
		$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
		$rgbArray['blue'] = 0xFF & $colorVal;
	} elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
		$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
		$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
		$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
	} else {
		$rgbArray['red'] = 0;
		$rgbArray['green'] = 0;
		$rgbArray['blue'] = 0;
		return $rgbArray; //Invalid hex color code
	}
	return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}


function xperson_lite_post_published_link() {
	/* Get the year, month, and day of the current post. */
	$year = get_the_time( 'Y' );
	$month = get_the_time( 'm' );
	$day = get_the_time( 'd' );
	$out = '';

	/* Add a link to the monthly archive. */
	$out .= '<a href="' . esc_url(get_month_link( $year, $month )) . '" title="'.__('Archive for ','xperson-lite') . esc_attr( get_the_time( 'F Y' ) ) . '">' . get_the_time( 'F' ) . '</a>';

	/* Add a link to the daily archive. */
	$out .= ' <a href="' . esc_url(get_day_link( $year, $month, $day )) . '" title="'.__('Archive for ','xperson-lite') . esc_attr( get_the_time( 'F d, Y' ) ) . '">' . $day . '</a>';

	/* Add a link to the yearly archive. */
	$out .= ', <a href="' . esc_url(get_year_link( $year )) . '" title="'.__('Archive for ','xperson-lite') . esc_attr( $year ) . '">' . $year . '</a>';

	return $out;
}

if ( ! function_exists( 'xperson_lite_post_icon' ) ) :
/**
 * Displays an post icon.
 *
 * Get the post format, and displays the icon.
 *
 * Create your own xperson_lite_post_icon() function to override in a child theme.
 *
 * @since xPerson Lite 1.0.0
 */
function xperson_lite_post_icon() {
	$format = get_post_format();
	switch ( $format ) {
		case 'aside':
			echo '<i class="fa fa-file-photo-o"></i>';
			break;
		case 'image':
			echo '<i class="fa fa-file-photo-o"></i>';
			break;
		case 'video':
			echo '<i class="fa fa-file-video-o"></i>';
			break;
		case 'quote':
			echo '<i class="fa fa-quote-left"></i>';
			break;
		case 'link':
			echo '<i class="fa fa-link"></i>';
			break;
		case 'gallery':
			echo '<i class="fa fa-file-photo-o"></i>';
			break;
		case 'status':
			echo '<i class="fa fa-file-photo-o"></i>';
			break;
		case 'audio':
			echo '<i class="fa fa-file-audio-o"></i>';
			break;
		case 'chat':
			echo '<i class="fa fa-comment-o"></i>';
			break;
		default:
			echo '<i class="fa fa-file-photo-o"></i>';
			break;
	}
}
endif;

if ( ! function_exists( 'xperson_lite_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own xperson_lite_post_thumbnail() function to override in a child theme.
 *
 * @since xPerson Lite 1.0.0
 */
function xperson_lite_post_thumbnail() {
	if ( ! has_post_thumbnail() ) {
		return;
	}
	if ( post_password_required() || is_attachment() ) {
		return;
	}

	if ( is_singular() ) :
	?>
	<div class="figure">
		<div class="post-thumbnail">
			<?php the_post_thumbnail('xperson-blog-thumbnail'); ?>
		</div>
		<?php xperson_lite_post_icon(); ?>
	</div><!-- .figure -->

	<?php else : ?>

	<div class="figure">
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( 'xperson-blog-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</a>
			<?php xperson_lite_post_icon(); ?>
		</div>
	</div>
	<?php endif; // End is_singular()
}
endif;