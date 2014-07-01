<?php
	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function themoment_setup() {
		load_theme_textdomain( 'themoment', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'themoment' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'themoment_setup' );
	
	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function themoment_scripts_styles() {
		global $wp_styles;

		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'themoment_scripts_styles' );
	
	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function themoment_wp_title( $title, $sep ) {
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
			$title = "$title $sep " . sprintf( __( 'Page %s', 'themoment' ), max( $paged, $page ) );
	
		return $title;
	}
	add_filter( 'wp_title', 'themoment_wp_title', 10, 2 );

    // Change the excerpt "read more" tags
    function new_excerpt_more($more) {
        global $post;
        return '<a class="read-more" href="'. get_permalink($post->ID) . '">Read more&nbsp;&nbsp;&raquo;</a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');


	// Load/dequeue jQuery
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

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'themoment' ) );

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<time class="entry-date" datetime="%1$s" pubdate>%2$s</time></a>', '' ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date() )
		);
	}

	add_action( 'init', 'register_cpt_resource' );
	function register_cpt_resource() {
	    $labels = array( 
	        'name' => _x( 'Resources', 'resource' ),
	        'singular_name' => _x( 'Resource', 'resource' ),
	        'add_new' => _x( 'Add New', 'resource' ),
	        'add_new_item' => _x( 'Add New Resource', 'resource' ),
	        'edit_item' => _x( 'Edit Resource', 'resource' ),
	        'new_item' => _x( 'New Resource', 'resource' ),
	        'view_item' => _x( 'View Resource', 'resource' ),
	        'search_items' => _x( 'Search Resources', 'resource' ),
	        'not_found' => _x( 'No resources found', 'resource' ),
	        'not_found_in_trash' => _x( 'No resources found in Trash', 'resource' ),
	        'parent_item_colon' => _x( 'Parent Resource:', 'resource' ),
	        'menu_name' => _x( 'Resources', 'resource' ),
	    );
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => false,
	        'description' => 'All resources',
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
	    register_post_type( 'resource', $args );
	}

    add_action( 'init', 'register_cpt_event' );
	function register_cpt_event() {
	    $labels = array( 
	        'name' => _x( 'Events', 'event' ),
	        'singular_name' => _x( 'Event', 'event' ),
	        'add_new' => _x( 'Add New', 'event' ),
	        'add_new_item' => _x( 'Add New Event', 'event' ),
	        'edit_item' => _x( 'Edit Event', 'event' ),
	        'new_item' => _x( 'New Event', 'event' ),
	        'view_item' => _x( 'View Event', 'event' ),
	        'search_items' => _x( 'Search Events', 'event' ),
	        'not_found' => _x( 'No events found', 'event' ),
	        'not_found_in_trash' => _x( 'No events found in Trash', 'event' ),
	        'parent_item_colon' => _x( 'Parent Event:', 'event' ),
	        'menu_name' => _x( 'Events', 'event' ),
	    );
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => false,
	        'description' => 'All events',
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
	    register_post_type( 'event', $args );
	}

    function remove_editor() {
        remove_post_type_support('page', 'editor');
    }
    add_action('admin_init', 'remove_editor');
?>
