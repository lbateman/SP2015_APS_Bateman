<?php
/**
 * taf functions and definitions
 *
 * @package taf
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'taf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function taf_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on taf, use a find and replace
	 * to change 'taf' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'taf', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'taf' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'taf_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // taf_setup
add_action( 'after_setup_theme', 'taf_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function taf_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'taf' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'taf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 
function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/nps4ick.js');
}

add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}

add_action( 'wp_head', 'theme_typekit_inline' );

function taf_scripts() {
	wp_enqueue_style( 'taf-style', get_stylesheet_uri() );

	wp_enqueue_script( 'taf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'taf-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery') );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'taf_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action( 'init', 'create_my_post_types' );

function my_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_flush_rewrite_rules' );


function create_my_post_types() {
 register_post_type( 'show_post', array(
      'labels' => array(
      	'name' => __( 'Shows' ),
      	'singular_name' => __( 'Show' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add New Show' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Show' ),
      	'new_item' => __( 'New Show' ),
      	'view' => __( 'View Show' ),
      	'view_item' => __( 'View Show' ),
      	'search_items' => __( 'Search Shows' ),
      	'not_found' => __( 'No Shows Found' ),
      	'not_found_in_trash' => __( 'No Shows Found in Trash' ),
      	'parent' => __( 'Parent Show' ),
      ),
 'public' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'shows'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );
  register_post_type( 'audition_post', array(
      'labels' => array(
      	'name' => __( 'Auditions' ),
      	'singular_name' => __( 'Audition' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add New Audition' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Audition' ),
      	'new_item' => __( 'New Audition' ),
      	'view' => __( 'View Audition' ),
      	'view_item' => __( 'View Audition' ),
      	'search_items' => __( 'Search Auditions' ),
      	'not_found' => __( 'No Auditions Found' ),
      	'not_found_in_trash' => __( 'No Auditions Found in Trash' ),
      	'parent' => __( 'Parent Audition' ),
      ),
      'public' => true,
      'menu_position' => 5,
      'rewrite' => array('slug' => 'auditions'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );

 register_post_type( 'press_post', array(
      'labels' => array(
        'name' => __( 'Press' ),
        'singular_name' => __( 'Article' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Article' ),
        'edit' => __( 'Edit' ),
        'edit_item' => __( 'Edit Article' ),
        'new_item' => __( 'New Article' ),
        'view' => __( 'View Article' ),
        'view_item' => __( 'View Article' ),
        'search_items' => __( 'Search Articles' ),
        'not_found' => __( 'No Articles Found' ),
        'not_found_in_trash' => __( 'No Articles Found in Trash' ),
        'parent' => __( 'Parent Article' ),
      ),
      'public' => true,
      'menu_position' => 6,
      'rewrite' => array('slug' => 'press'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
    )
  );
}


