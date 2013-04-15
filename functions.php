<?php

// Unregistering the HTML5 Boilerplate sidebar
// ###########################################

function remove_html5bp_sidebar() {
	unregister_sidebar( 'sidebar-1' );
}

add_action( 'widgets_init', 'remove_html5bp_sidebar', 11 );

// Register the global sidebar
// ###########################

function register_footer_widget_1() {
	register_sidebar(array(
		'name' => __( 'Footer Widget 1' ),
		'id' => 'footer-widget-1',
		'description' => __( 'The widgets in this area will show in the leftmost area of the footer. Recommend only one widget.' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function register_footer_widget_2() {
	register_sidebar(array(
		'name' => __( 'Footer Widget 2' ),
		'id' => 'footer-widget-2',
		'description' => __( 'The widgets in this area will show in the center area of the footer. Recommend only one widget.' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

add_action( 'widgets_init', 'register_footer_widget_1' );
add_action( 'widgets_init', 'register_footer_widget_2' );

// Register the primary and social nav menus
// #########################################

add_action( 'init', 'register_custom_menus' );

function register_custom_menus() {
  register_nav_menus(
    array( 
    	'primary-navigation' => __( 'Primary Navigation' ),
    	//'social-navigation' => __( 'Social Navigation' ),
    )
  );
}

// Add custom fields
// ###

function be_clip_metaboxes( $meta_boxes ) {
	$prefix = '_clip_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'clip_metadata',
		'title' => 'Clip Metadata',
		'pages' => array('clip'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Pullquote',
				'desc' => 'Brief pullquote from the clip.',
				'id' => $prefix . 'pullquote',
				'type' => 'textarea_small'
			),
			array(
				'name' => 'Link',
				'desc' => 'URL where clip was originally published.',
				'id' => $prefix . 'link',
				'type' => 'text'
			),
			array(
				'name' => 'Date Originally Published',
				'desc' => 'Date the clip was originally published.',
				'id' => $prefix . 'pubdate',
				'type' => 'text_date_timestamp'
			),
			array(
				'name' => 'Image',
				'desc' => 'Upload an image or enter a URL.',
				'id' => $prefix . 'image',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Display Style',
				'desc' => 'Select what to display in the teaser.',
				'id' => $prefix . 'display',
				'type' => 'radio',
				'options' => array(
					array('name' => 'Title', 'value' => 'display_title'),
					array('name' => 'Image', 'value' => 'display_image'),
					array('name' => 'Pullquote', 'value' => 'display_pullquote')				
				)
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'be_clip_metaboxes' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}

// Add custom post type
// ###

// let's create the function for the custom type
function custom_post_clip() { 
	// creating (registering) the custom type 
	register_post_type( 'clip', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Clips', 'writersblocks'), /* This is the Title of the Group */
			'singular_name' => __('Clip', 'writersblocks'), /* This is the individual type */
			'all_items' => __('All Clips', 'writersblocks'), /* the all items menu item */
			'add_new' => __('Add New', 'writersblocks'), /* The add new menu item */
			'add_new_item' => __('Add New Clip', 'writersblocks'), /* Add New Display Title */
			'edit' => __( 'Edit', 'writersblocks' ), /* Edit Dialog */
			'edit_item' => __('Edit Clip', 'writersblocks'), /* Edit Display Title */
			'new_item' => __('New Clip', 'writersblocks'), /* New Display Title */
			'view_item' => __('View Clip', 'writersblocks'), /* View Display Title */
			'search_items' => __('Search Clip', 'writersblocks'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'writersblocks'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'writersblocks'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the clip content type', 'writersblocks' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'clip', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'clip', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'excerpt', 'revisions', 'zoninator_zones')
	 	) /* end of options */
	); /* end of register post type */
	
}

// Add custom taxonomy
// ###

// now let's add custom categories (these act like categories)
register_taxonomy( 'clip_pub', 
	array('clip'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => false,     /* if this is true, it acts like categories */             
		'labels' => array(
			'name' => __( 'Clip Publications', 'writersblocks' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Clip Publication', 'writersblocks' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Clip Publications', 'writersblocks' ), /* search title for taxomony */
			'all_items' => __( 'All Clip Publications', 'writersblocks' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Clip Publication', 'writersblocks' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Clip Publication:', 'writersblocks' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Clip Publication', 'writersblocks' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Clip Publication', 'writersblocks' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Clip Publication', 'writersblocks' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Clip Publication Name', 'writersblocks' ) /* name title for taxonomy */
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'clip_pub' ),
	)
);

add_action( 'init', 'custom_post_clip');

?>