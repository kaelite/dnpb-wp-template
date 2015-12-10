<?
// add inc folder files
foreach ( glob( trailingslashit( get_template_directory() ) . 'inc/*.php' ) as $filename ) {
	include $filename;
}


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
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		]
	);
	register_sidebar(
		[
			'name' => 'Sidebar 2 widgets',
			'id' => 'sidebar-bottom',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
			'descriprion' => __('Here the place to put sidebar\'s widgets')
		]
	);
	register_sidebar(
		[
			'name' => 'Homepage widgets',
			'id' => 'homepage-main',
			'descriprion' => __('Here the place to put sidebar\'s widgets'),
			'before_widget' => '<section class="dnpb_block dnpb_news">',
			'after_widget' => '</section>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
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
			'supports'			 => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
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

add_filter( 'save_post_announcements', 'announcements_set_title', 10, 3 );
function announcements_set_title ( $post_id, $post, $update ){
    //This temporarily removes filter to prevent infinite loops
    remove_filter( 'save_post_announcements', __FUNCTION__ );
    //get first and last name meta

    $title=wordwrap(strip_tags($post->post_content),50)." ...";


    //update title
    wp_update_post( [ 'ID'=>$post_id, 'post_title'=>$title ] );

    //redo filter
    add_filter( 'save_post_announcements', __FUNCTION__, 10, 3 );
}



/**
 * Register events type
 **/

function dnpb_init_events(){
	$labels = [
        'name'               => _x( 'Events', 'post type general name' ),
        'singular_name'      => _x( 'Event', 'post type singular name' ),
        'menu_name'          => _x( 'Events', 'admin menu' ),
        'name_admin_bar'     => _x( 'Events', 'add new on admin bar' ),
        'add_new'            => _x( 'Add Event', 'Announcement' ),
        'add_new_item'       => __( 'Add New Event' ),
        'new_item'           => __( 'New Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'view_item'          => __( 'View Events' ),
        'all_items'          => __( 'All Events' ),
        'search_items'       => __( 'Search Events' ),
        'parent_item_colon'  => __( 'Parent Event:' ),
        'not_found'          => __( 'No events found.' ),
        'not_found_in_trash' => __( 'No events found in Trash.' )
		];
	register_post_type('events',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-lightbulb',
			'supports'			 => ['title', 'editor', 'thumbnail', 'excerpt'],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'events' ],
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
			'supports'			 => ['title','thumbnail'],
			'with_front'		 => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
}


/**
 * Register exhibitions type
 **/

function dnpb_init_exhibitions(){
	$labels = [

        'name'               => _x( 'Exhibitions', 'post type general name' ),
        'singular_name'      => _x( 'Exhibition', 'post type singular name' ),
        'menu_name'          => _x( 'Exhibitions', 'admin menu' ),
        'name_admin_bar'     => _x( 'Exhibitions', 'add new on admin bar' ),
        'add_new'            => _x( 'Add Exhibition', 'Slides' ),
        'add_new_item'       => __( 'Add New Exhibition' ),
        'new_item'           => __( 'New Exhibition' ),
        'edit_item'          => __( 'Edit Exhibition' ),
        'view_item'          => __( 'View Exhibition' ),
        'all_items'          => __( 'All Exhibitions' ),
        'search_items'       => __( 'Search Exhibitions' ),
        'parent_item_colon'  => __( 'Parent Exhibitions:' ),
        'not_found'          => __( 'No exhibitions found.' ),
        'not_found_in_trash' => __( 'No exhibitions found in Trash.' )
		];

	register_post_type('exhibitions',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-groups',
			'supports'			 => ['title', 'editor', 'thumbnail', 'excerpt'],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'exhibitions' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
}
 
/**
 * Register ourpublication type
 **/

function dnpb_init_ourpublications(){
	$labels = [
        'name'               => _x( 'Our Publications', 'post type general name' ),
        'singular_name'      => _x( 'Our Publication', 'post type singular name' ),
        'menu_name'          => _x( 'Our Publications', 'admin menu' ),
        'name_admin_bar'     => _x( 'Our Publications', 'add new on admin bar' ),
        'add_new'            => _x( 'Add Our Publication', 'Our Publication'),
        'add_new_item'       => __( 'Add New Publication' ),
        'new_item'           => __( 'New Publication' ),
        'edit_item'          => __( 'Edit Publication' ),
        'view_item'          => __( 'View Publication' ),
        'all_items'          => __( 'All Publications' ),
        'search_items'       => __( 'Search Publications' ),
        'parent_item_colon'  => __( 'Parent Publication:' ),
        'not_found'          => __( 'No publications found.' ),
        'not_found_in_trash' => __( 'No publications found in Trash.' )
		];

	register_post_type('ourpublications',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-book',
			'supports'			 => ['title', 'editor', 'thumbnail', 'excerpt'],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'our_publications' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
}
   
function dnpb_init_categories(){
	dnpb_init_news();
	dnpb_init_slider();
	dnpb_init_announcements();
	dnpb_init_events();
	dnpb_init_exhibitions();
	dnpb_init_ourpublications();
}
add_action('init', 'dnpb_init_categories');


include ('widgets/news/class.php');
include ('widgets/announcements/class.php');
include ('widgets/gallery/class.php');
include ('widgets/events/class.php');
include ('widgets/exhibitions/class.php');
include ('widgets/ourpublications/class.php');

function dnpb_register_widgets() {
	register_widget('DNPB_News_Widget');
	register_widget('DNPB_Announcements_Widget');
	register_widget('DNPB_Gallery_Widget');
	register_widget('DNPB_Events_Widget');
	register_widget('DNPB_Exhibitions_Widget');
	register_widget('DNPB_OurPublications_Widget');
}

add_action('widgets_init', 'dnpb_register_widgets');
