<?php
/**
 * ACF Functions and CPTs
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//ACF SAVE and LOAD JSON
add_filter('acf/settings/save_json', 'alt_motivation_save_point');
 
function alt_motivation_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
    
}


add_filter('acf/settings/load_json', 'alt_motivation_json_load_point');

function alt_motivation_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory()  . '/acf-json';
    
    
    // return
    return $paths;
    
}



//person custom post type

// Register Custom Post Type person
// Post Type Key: person

function create_person_cpt() {

  $labels = array(
    'name' => __( 'Persons', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Person', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Person', 'textdomain' ),
    'name_admin_bar' => __( 'Person', 'textdomain' ),
    'archives' => __( 'Person Archives', 'textdomain' ),
    'attributes' => __( 'Person Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Person:', 'textdomain' ),
    'all_items' => __( 'All Persons', 'textdomain' ),
    'add_new_item' => __( 'Add New Person', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Person', 'textdomain' ),
    'edit_item' => __( 'Edit Person', 'textdomain' ),
    'update_item' => __( 'Update Person', 'textdomain' ),
    'view_item' => __( 'View Person', 'textdomain' ),
    'view_items' => __( 'View Persons', 'textdomain' ),
    'search_items' => __( 'Search Persons', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into person', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this person', 'textdomain' ),
    'items_list' => __( 'Person list', 'textdomain' ),
    'items_list_navigation' => __( 'Person list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Person list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'person', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'person', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_person_cpt', 0 );


//research custom post type

// Register Custom Post Type research
// Post Type Key: research

// function create_research_cpt() {

//   $labels = array(
//     'name' => __( 'research', 'Post Type General Name', 'textdomain' ),
//     'singular_name' => __( 'Research', 'Post Type Singular Name', 'textdomain' ),
//     'menu_name' => __( 'Research', 'textdomain' ),
//     'name_admin_bar' => __( 'Research', 'textdomain' ),
//     'archives' => __( 'Research Archives', 'textdomain' ),
//     'attributes' => __( 'Research Attributes', 'textdomain' ),
//     'parent_item_colon' => __( 'Research:', 'textdomain' ),
//     'all_items' => __( 'All research', 'textdomain' ),
//     'add_new_item' => __( 'Add New Research', 'textdomain' ),
//     'add_new' => __( 'Add New', 'textdomain' ),
//     'new_item' => __( 'New Research', 'textdomain' ),
//     'edit_item' => __( 'Edit Research', 'textdomain' ),
//     'update_item' => __( 'Update Research', 'textdomain' ),
//     'view_item' => __( 'View Research', 'textdomain' ),
//     'view_items' => __( 'View research', 'textdomain' ),
//     'search_items' => __( 'Search research', 'textdomain' ),
//     'not_found' => __( 'Not found', 'textdomain' ),
//     'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
//     'featured_image' => __( 'Featured Image', 'textdomain' ),
//     'set_featured_image' => __( 'Set featured image', 'textdomain' ),
//     'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
//     'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
//     'insert_into_item' => __( 'Insert into research', 'textdomain' ),
//     'uploaded_to_this_item' => __( 'Uploaded to this research', 'textdomain' ),
//     'items_list' => __( 'Research list', 'textdomain' ),
//     'items_list_navigation' => __( 'Research list navigation', 'textdomain' ),
//     'filter_items_list' => __( 'Filter Research list', 'textdomain' ),
//   );
//   $args = array(
//     'label' => __( 'research', 'textdomain' ),
//     'description' => __( '', 'textdomain' ),
//     'labels' => $labels,
//     'menu_icon' => '',
//     'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
//     'taxonomies' => array('category'),
//     'public' => true,
//     'show_ui' => true,
//     'show_in_menu' => true,
//     'menu_position' => 5,
//     'show_in_admin_bar' => true,
//     'show_in_nav_menus' => true,
//     'can_export' => true,
//     'has_archive' => true,
//     'hierarchical' => false,
//     'exclude_from_search' => false,
//     'show_in_rest' => true,
//     'publicly_queryable' => true,
//     'capability_type' => 'post',
//     'menu_icon' => 'dashicons-welcome-learn-more',
//   );
//   register_post_type( 'research', $args );
  
//   // flush rewrite rules because we changed the permalink structure
//   global $wp_rewrite;
//   $wp_rewrite->flush_rules();
// }
// add_action( 'init', 'create_research_cpt', 0 );



//project custom post type

// Register Custom Post Type project
// Post Type Key: project

function create_project_cpt() {

  $labels = array(
    'name' => __( 'Projects', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Project', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Project', 'textdomain' ),
    'name_admin_bar' => __( 'Project', 'textdomain' ),
    'archives' => __( 'Project Archives', 'textdomain' ),
    'attributes' => __( 'Project Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Project:', 'textdomain' ),
    'all_items' => __( 'All Projects', 'textdomain' ),
    'add_new_item' => __( 'Add New Project', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Project', 'textdomain' ),
    'edit_item' => __( 'Edit Project', 'textdomain' ),
    'update_item' => __( 'Update Project', 'textdomain' ),
    'view_item' => __( 'View Project', 'textdomain' ),
    'view_items' => __( 'View Projects', 'textdomain' ),
    'search_items' => __( 'Search Projects', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into project', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this project', 'textdomain' ),
    'items_list' => __( 'Project list', 'textdomain' ),
    'items_list_navigation' => __( 'Project list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Project list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'project', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-generic',
  );
  register_post_type( 'project', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_project_cpt', 0 );


//partner custom post type

// Register Custom Post Type partner
// Post Type Key: partner

function create_partner_cpt() {

  $labels = array(
    'name' => __( 'Partners', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Partner', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Partner', 'textdomain' ),
    'name_admin_bar' => __( 'Partner', 'textdomain' ),
    'archives' => __( 'Partner Archives', 'textdomain' ),
    'attributes' => __( 'Partner Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Partner:', 'textdomain' ),
    'all_items' => __( 'All Partners', 'textdomain' ),
    'add_new_item' => __( 'Add New Partner', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Partner', 'textdomain' ),
    'edit_item' => __( 'Edit Partner', 'textdomain' ),
    'update_item' => __( 'Update Partner', 'textdomain' ),
    'view_item' => __( 'View Partner', 'textdomain' ),
    'view_items' => __( 'View Partners', 'textdomain' ),
    'search_items' => __( 'Search Partners', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into partner', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this partner', 'textdomain' ),
    'items_list' => __( 'Partner list', 'textdomain' ),
    'items_list_navigation' => __( 'Partner list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Partner list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'partner', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-thumbs-up',
  );
  register_post_type( 'partner', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_partner_cpt', 0 );