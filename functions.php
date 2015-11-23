<?
/**
 * Load Styles and Scripts
 *
 **/

function dnpb_loadscripts(){
	/* Styles */
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/bootstrap-theme.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('fonts', get_template_directory_uri().'/assets/css/fonts.css');
	wp_enqueue_style('dnpb', get_template_directory_uri().'/assets/css/dnpb.css');

	/* Scripts */
	wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/jquery.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js');
}

add_action('wp_enqueue_scripts', 'dnpb_loadscripts');


/**
 * Thubnails support enable
 **/

add_theme_support('post-thumbnails');

/**
 *	Add menu support to theme
 **/

function register_dnpb_menus() {
  register_nav_menus(
    [
		'main-menu' => __( 'Main Menu' ),
      'top-menu' => __( 'Top Menu' )
    ]
  );
}
add_action( 'init', 'register_dnpb_menus' );

/**
 * Show home menu
 **/

function dnpb_home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'dnpb_home_page_menu_args' );
