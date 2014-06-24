<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'themoment'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();

    // Footer
	$options[] = array(
		'name' => __('Footer Content', 'themoment'),
		'type' => 'heading');
    $options[] = array(
		'name' => __('Subscription Title', 'themoment'),
		'id'   => 'footer_subscribe_title',
		'std'  => 'Subscribe for Updates',
		'type' => 'text');
	$options[] = array(
		'name' => __('Subscription Description', 'themoment'),
		'id'   => 'footer_subscribe_desc',
		'std'  => "Sign up to keep up-to-date with future news and events related to The Moment You Can't Ignore.",
		'type' => 'textarea');
    $options[] = array(
		'name' => __('Stay Connected - Email', 'themoment'),
		'id'   => 'footer_stayconnected_email',
		'std'  => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Stay Connected - Twitter', 'themoment'),
		'id'   => 'footer_stayconnected_twitter',
		'std'  => 'https://twitter.com/CFAR_INC',
		'type' => 'text');
    $options[] = array(
		'name' => __('Stay Connected - LinkedIn', 'themoment'),
		'id'   => 'footer_stayconnected_linkedin',
		'std'  => 'https://www.linkedin.com/company/cfar',
		'type' => 'text');

	return $options;
}