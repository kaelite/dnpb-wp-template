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
 * Register sidebar
 **/
function dnpb_widgets_init(){
	register_sidebar(
		[
			'name' => 'Sidebar widgets',
			'id' => 'sidebar',
			'descriprion' => __('Here the place to put sidebar\'s widgets'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3><a href="#">',
			'after_title' => '</a></h3>',
		]
	);
	register_sidebar(
		[
			'name' => 'Sidebar 2 widgets',
			'id' => 'sidebar-bottom',
			'descriprion' => __('Here the place to put sidebar\'s widgets')
		]
	);
	register_sidebar(
		[
			'name' => 'Homepage widgets',
			'id' => 'homepage-main',
			'descriprion' => __('Here the place to put sidebar\'s widgets')
		]
	);
}
add_action( 'widgets_init', 'dnpb_widgets_init' );

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

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


/**
 * Register news type
 **/

function dnpb_init_news(){
	$labels = [
        'name'               => _x( 'News', 'post type general name' ),
        'singular_name'      => _x( 'News', 'post type singular name' ),
        'menu_name'          => _x( 'News', 'admin menu' ),
        'name_admin_bar'     => _x( 'News', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'News' ),
        'add_new_item'       => __( 'Add New News' ),
        'new_item'           => __( 'New News' ),
        'edit_item'          => __( 'Edit News' ),
        'view_item'          => __( 'View News' ),
        'all_items'          => __( 'All News' ),
        'search_items'       => __( 'Search News' ),
        'parent_item_colon'  => __( 'Parent News:' ),
        'not_found'          => __( 'No news found.' ),
        'not_found_in_trash' => __( 'No news found in Trash.' )
		];
	register_post_type('news',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-microphone',
			'supports'			 => ['title', 'editor', 'author', 'thumbnail'],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'news' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
}
/**
 * Register announcement type
 **/
function dnpb_init_announcements(){
	$labels = [
        'name'               => _x( 'Announcements', 'post type general name' ),
        'singular_name'      => _x( 'Announcement', 'post type singular name' ),
        'menu_name'          => _x( 'Announcements', 'admin menu' ),
        'name_admin_bar'     => _x( 'Announcements', 'add new on admin bar' ),
        'add_new'            => _x( 'Add Announcement', 'Announcement' ),
        'add_new_item'       => __( 'Add New Announcement' ),
        'new_item'           => __( 'New Announcement' ),
        'edit_item'          => __( 'Edit Announcement' ),
        'view_item'          => __( 'View Announcements' ),
        'all_items'          => __( 'All Announcements' ),
        'search_items'       => __( 'Search Announcements' ),
        'parent_item_colon'  => __( 'Parent Announcement:' ),
        'not_found'          => __( 'No announcements found.' ),
        'not_found_in_trash' => __( 'No announcements found in Trash.' )
		];
	register_post_type('announcements',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-testimonial',
			'supports'			 => ['editor'/*, 'author'*/, 'thumbnail'/*, 'excerpt'*/],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'announcements' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
}

function dnpb_init_slider(){
	$labels = [

        'name'               => _x( 'Slides', 'post type general name' ),
        'singular_name'      => _x( 'Slide', 'post type singular name' ),
        'menu_name'          => _x( 'Slides', 'admin menu' ),
        'name_admin_bar'     => _x( 'Slides', 'add new on admin bar' ),
        'add_new'            => _x( 'Add Slide', 'Slides' ),
        'add_new_item'       => __( 'Add New Slide' ),
        'new_item'           => __( 'New Slide' ),
        'edit_item'          => __( 'Edit Slide' ),
        'view_item'          => __( 'View Slide' ),
        'all_items'          => __( 'All Slides' ),
        'search_items'       => __( 'Search Slides' ),
        'parent_item_colon'  => __( 'Parent Slides:' ),
        'not_found'          => __( 'No slides found.' ),
        'not_found_in_trash' => __( 'No slides found in Trash.' )
		];

	register_post_type('slider',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-slides',
			'supports'			 => ['title','thumbnail', 'editor'],
			'with_front'		 => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
}

function dnpb_init_categories(){
	dnpb_init_news();
	dnpb_init_slider();
	dnpb_init_announcements();
}
add_action('init', 'dnpb_init_categories');



include ('widgets/news/class.php');
include ('widgets/announcements/class.php');
function dnpb_register_widgets() {
	register_widget('DNPB_News_Widget');
	register_widget('DNPB_Announcements_Widget');
}

add_action('widgets_init', 'dnpb_register_widgets');
