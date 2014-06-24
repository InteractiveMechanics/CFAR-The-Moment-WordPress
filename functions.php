<?php
	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );
	
	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;

		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );
	
	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
	// Add the site name.
		$title .= get_bloginfo( 'name' );
	
	// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
	// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );
	
		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );

	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				//wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ), false);
				//wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Clean up the <head>, if you so desire.
	//	function removeHeadLinks() {
	//    	remove_action('wp_head', 'rsd_link');
	//    	remove_action('wp_head', 'wlwmanifest_link');
	//    }
	//    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function html5reset_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'html5reset_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

	add_action( 'init', 'register_cpt_project' );
	function register_cpt_project() {
	    $labels = array( 
	        'name' => _x( 'Projects', 'project' ),
	        'singular_name' => _x( 'Project', 'project' ),
	        'add_new' => _x( 'Add New', 'project' ),
	        'add_new_item' => _x( 'Add New Project', 'project' ),
	        'edit_item' => _x( 'Edit Project', 'project' ),
	        'new_item' => _x( 'New Project', 'project' ),
	        'view_item' => _x( 'View Project', 'project' ),
	        'search_items' => _x( 'Search Projects', 'project' ),
	        'not_found' => _x( 'No projects found', 'project' ),
	        'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
	        'parent_item_colon' => _x( 'Parent Project:', 'project' ),
	        'menu_name' => _x( 'Projects', 'project' ),
	    );
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => false,
	        'description' => 'All projects',
	        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	        'taxonomies' => array( '' ),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 5,
	        
	        'show_in_nav_menus' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'has_archive' => true,
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => true,
	        'capability_type' => 'post'
	    );
	    register_post_type( 'project', $args );
	}

    add_action( 'init', 'register_cpt_people' );
	function register_cpt_people() {
	    $labels = array( 
	        'name' => _x( 'People', 'people' ),
	        'singular_name' => _x( 'People', 'people' ),
	        'add_new' => _x( 'Add New', 'people' ),
	        'add_new_item' => _x( 'Add New Person', 'people' ),
	        'edit_item' => _x( 'Edit Person', 'people' ),
	        'new_item' => _x( 'New Person', 'people' ),
	        'view_item' => _x( 'View Person', 'people' ),
	        'search_items' => _x( 'Search People', 'people' ),
	        'not_found' => _x( 'No people found', 'people' ),
	        'not_found_in_trash' => _x( 'No people found in Trash', 'people' ),
	        'parent_item_colon' => _x( 'Parent Person:', 'people' ),
	        'menu_name' => _x( 'People', 'people' ),
	    );
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => false,
	        'description' => 'All people',
	        'supports' => array( 'title', 'editor', 'thumbnail' ),
	        'taxonomies' => array( '' ),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 6,
	        
	        'show_in_nav_menus' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'has_archive' => true,
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => true,
	        'capability_type' => 'post'
	    );
	    register_post_type( 'people', $args );
	}

	add_action( 'init', 'register_taxonomy_featured' );
	function register_taxonomy_featured() {
	    $labels = array( 
	        'name' => _x( 'Featured', 'featured' ),
	        'singular_name' => _x( 'Featured', 'featured' ),
	        'search_items' => _x( 'Search Featured', 'featured' ),
	        'popular_items' => _x( 'Popular Featured', 'featured' ),
	        'all_items' => _x( 'All Featured', 'featured' ),
	        'parent_item' => _x( 'Parent Featured', 'featured' ),
	        'parent_item_colon' => _x( 'Parent Featured:', 'featured' ),
	        'edit_item' => _x( 'Edit Featured', 'featured' ),
	        'update_item' => _x( 'Update Featured', 'featured' ),
	        'add_new_item' => _x( 'Add New Featured', 'featured' ),
	        'new_item_name' => _x( 'New Featured', 'featured' ),
	        'separate_items_with_commas' => _x( 'Separate featured with commas', 'featured' ),
	        'add_or_remove_items' => _x( 'Add or remove featured', 'featured' ),
	        'choose_from_most_used' => _x( 'Choose from the most used featured', 'featured' ),
	        'menu_name' => _x( 'Featured', 'featured' ),
	    );
	    $args = array( 
	        'labels' => $labels,
	        'public' => true,
	        'show_in_nav_menus' => true,
	        'show_ui' => true,
	        'show_tagcloud' => true,
	        'show_admin_column' => false,
	        'hierarchical' => true,

	        'rewrite' => true,
	        'query_var' => true
	    );
	    register_taxonomy( 'featured', array('project'), $args );
	}
?>
