<?
// add inc folder files
foreach ( glob( trailingslashit( get_template_directory() ) . 'inc/*.php' ) as $filename ) {
	include $filename;
}


if ( ! function_exists( 'twentyfifteen_setup' ) ) :
function dnpb_setup(){
	add_image_size( 'dnpb-portrait-custom-size', 150, 200 );
	load_theme_textdomain( 'dnpb', get_template_directory().'/languages' );
}
add_action( 'after_setup_theme', 'dnpb_setup' );
endif; //end dnpb setup

/**
 * Load Styles and Scripts
 *
 **/

function dnpb_loadscripts(){
	/* Styles */
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/bootstrap-theme.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('dnpb_fonts', get_template_directory_uri().'/assets/css/fonts.css');
	wp_enqueue_style('dnpb', get_template_directory_uri().'/assets/css/dnpb.css');

	/* Scripts */
	wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/jquery.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js');
	wp_enqueue_script('hoverIntent', get_template_directory_uri().'/assets/js/jquery.hoverIntent.js');
	wp_enqueue_script('dnpb_menu', get_template_directory_uri().'/assets/js/dnpb_menu.js');
}

add_action('wp_enqueue_scripts', 'dnpb_loadscripts');

/**
 * Add Google Analitycs Scripts
 **/
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { 
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72167824-1', 'auto');
  ga('send', 'pageview');

</script>

<?
} 


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
        'name'               => _x( 'News', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'News', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'News', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add New', 'News', 'dnpb'),
        'add_new_item'       => __( 'Add New News', 'dnpb'),
        'new_item'           => __( 'New News', 'dnpb'),
        'edit_item'          => __( 'Edit News', 'dnpb'),
        'view_item'          => __( 'View News', 'dnpb'),
        'all_items'          => __( 'All News', 'dnpb'),
        'search_items'       => __( 'Search News', 'dnpb'),
        'parent_item_colon'  => __( 'Parent News:'),
        'not_found'          => __( 'No news found.'),
        'not_found_in_trash' => __( 'No news found in Trash.')
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
        'name'               => _x( 'Announcements', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Announcement', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Announcements', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Announcements', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add Announcement', 'Announcement', 'dnpb'),
        'add_new_item'       => __( 'Add New Announcement', 'dnpb'),
        'new_item'           => __( 'New Announcement', 'dnpb'),
        'edit_item'          => __( 'Edit Announcement', 'dnpb'),
        'view_item'          => __( 'View Announcements', 'dnpb'),
        'all_items'          => __( 'All Announcements', 'dnpb'),
        'search_items'       => __( 'Search Announcements', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Announcement:', 'dnpb'),
        'not_found'          => __( 'No announcements found.', 'dnpb'),
        'not_found_in_trash' => __( 'No announcements found in Trash.', 'dnpb')
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
        'name'               => _x( 'Events', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Event', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Events', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Events', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add Event', 'Announcement', 'dnpb'),
        'add_new_item'       => __( 'Add New Event', 'dnpb'),
		'new_item'           => __( 'New Event', 'dnpb'),
        'edit_item'          => __( 'Edit Event', 'dnpb'),
        'view_item'          => __( 'View Events', 'dnpb'),
        'all_items'          => __( 'All Events', 'dnpb'),
        'search_items'       => __( 'Search Events', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Event:', 'dnpb'),
        'not_found'          => __( 'No events found.', 'dnpb'),
        'not_found_in_trash' => __( 'No events found in Trash.', 'dnpb')
		];
	register_post_type('events',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-lightbulb',
			'supports'			 => [
										'title', 
										'editor', 
										'thumbnail', 
										'excerpt',
										'custom-fields'
									],
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

        'name'               => _x( 'Slides', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Slide', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Slides', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Slides', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add Slide', 'Slides', 'dnpb'),
        'add_new_item'       => __( 'Add New Slide', 'dnpb'),
        'new_item'           => __( 'New Slide', 'dnpb'),
        'edit_item'          => __( 'Edit Slide', 'dnpb'),
        'view_item'          => __( 'View Slide', 'dnpb'),
        'all_items'          => __( 'All Slides', 'dnpb'),
        'search_items'       => __( 'Search Slides', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Slides:', 'dnpb'),
        'not_found'          => __( 'No slides found.', 'dnpb'),
        'not_found_in_trash' => __( 'No slides found in Trash.', 'dnpb')
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

        'name'               => _x( 'Exhibitions', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Exhibition', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Exhibitions', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Exhibitions', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add Exhibition', 'Slides', 'dnpb'),
        'add_new_item'       => __( 'Add New Exhibition', 'dnpb'),
        'new_item'           => __( 'New Exhibition', 'dnpb'),
        'edit_item'          => __( 'Edit Exhibition', 'dnpb'),
        'view_item'          => __( 'View Exhibition', 'dnpb'),
        'all_items'          => __( 'All Exhibitions', 'dnpb'),
        'search_items'       => __( 'Search Exhibitions', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Exhibitions:', 'dnpb'),
        'not_found'          => __( 'No exhibitions found.', 'dnpb'),
        'not_found_in_trash' => __( 'No exhibitions found in Trash.', 'dnpb')
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
        'name'               => _x( 'Our Publications', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Our Publication', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Our Publications', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Our Publications', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add Our Publication', 'Our Publication', 'dnpb'),
        'add_new_item'       => __( 'Add New Publication', 'dnpb'),
        'new_item'           => __( 'New Publication', 'dnpb'),
        'edit_item'          => __( 'Edit Publication', 'dnpb'),
        'view_item'          => __( 'View Publication', 'dnpb'),
        'all_items'          => __( 'All Publications', 'dnpb'),
        'search_items'       => __( 'Search Publications', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Publication:', 'dnpb'),
        'not_found'          => __( 'No publications found.', 'dnpb'),
        'not_found_in_trash' => __( 'No publications found in Trash.', 'dnpb')
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
   
/**
 * Register publication type
 **/

function dnpb_init_publications(){
	$labels = [
        'name'               => _x( 'Publications', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Publication', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Publications', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Publications', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add Publication', 'Our Publication', 'dnpb'),
        'add_new_item'       => __( 'Add New Publication', 'dnpb'),
        'new_item'           => __( 'New Publication', 'dnpb'),
        'edit_item'          => __( 'Edit Publication', 'dnpb'),
        'view_item'          => __( 'View Publication', 'dnpb'),
        'all_items'          => __( 'All Publications', 'dnpb'),
        'search_items'       => __( 'Search Publications', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Publication:', 'dnpb'),
        'not_found'          => __( 'No publications found.', 'dnpb'),
        'not_found_in_trash' => __( 'No publications found in Trash.', 'dnpb')
		];

	register_post_type('publications',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-book',
			'supports'			 => 
			[
				'title', 
				'editor', 
				'thumbnail', 
				'excerpt',
				'custom-fields'
			],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'publications' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null
		]);
	add_image_size( 'dnpb_publications-thumb', 120, 200 );
}
   
/**
 * Register index type
 **/

function dnpb_init_indexes(){
	$labels = [
        'name'               => _x( 'Indexes', 'post type general name', 'dnpb'),
        'singular_name'      => _x( 'Index', 'post type singular name', 'dnpb'),
        'menu_name'          => _x( 'Indexes', 'admin menu', 'dnpb'),
        'name_admin_bar'     => _x( 'Indexes', 'add new on admin bar', 'dnpb'),
        'add_new'            => _x( 'Add New Index Info', 'Indexes', 'dnpb'),
        'add_new_item'       => __( 'Add New Index Info', 'dnpb'),
        'new_item'           => __( 'New Index Info', 'dnpb'),
        'edit_item'          => __( 'Edit Index Info', 'dnpb'),
        'view_item'          => __( 'View Index Info', 'dnpb'),
        'all_items'          => __( 'All Indexes', 'dnpb'),
        'search_items'       => __( 'Search Indexes', 'dnpb'),
        'parent_item_colon'  => __( 'Parent Index:', 'dnpb'),
        'not_found'          => __( 'No indexes found.', 'dnpb'),
        'not_found_in_trash' => __( 'No indexes found in Trash.', 'dnpb')
		];

	register_post_type('indexes',
		[
			'labels'			 => $labels,
			'public'			 => true,
			'menu_icon'			 => 'dashicons-book',
			'supports'			 => 
			[
				'title', 
				'thumbnail', 
				'editor',
				'custom-fields',
				'page-attributes'
			],
			'with_front'		 => false,
			'rewrite'            => [ 'slug' => 'indexes' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null
		]);
	dnpb_init_index_taxonomies();
}


function dnpb_init_index_taxonomies(){
	register_taxonomy(
		'dnpb_index_list',
		'indexes',
		array(
			'label' => __( 'Indexes list groups', 'dnpb' ),
			'rewrite' => array( 'slug' => 'indexgroups' ),
			'hierarchical' => false,
		)
	);
}


function dnpb_init_categories(){
	dnpb_init_news();
	dnpb_init_slider();
	dnpb_init_announcements();
	dnpb_init_events();
	dnpb_init_exhibitions();
	dnpb_init_ourpublications();
	dnpb_init_publications();
	dnpb_init_indexes();
}
add_action('init', 'dnpb_init_categories');


include ('widgets/news/class.php');
include ('widgets/announcements/class.php');
include ('widgets/gallery/class.php');
include ('widgets/events/class.php');
include ('widgets/exhibitions/class.php');
include ('widgets/ourpublications/class.php');
include ('widgets/publications/class.php');

function dnpb_register_widgets() {
	register_widget('DNPB_News_Widget');
	register_widget('DNPB_Announcements_Widget');
	register_widget('DNPB_Gallery_Widget');
	register_widget('DNPB_Events_Widget');
	register_widget('DNPB_Exhibitions_Widget');
	register_widget('DNPB_OurPublications_Widget');
	register_widget('DNPB_Publications_Widget');
}

add_action('widgets_init', 'dnpb_register_widgets');

function dnpb_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'dnpb-portrait-custom-size' => __( 'Portrait size (150x200)' ),
    ) );
}

add_filter( 'image_size_names_choose', 'dnpb_custom_sizes' );
