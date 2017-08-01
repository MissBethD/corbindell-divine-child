<?php


add_action('init', 'codex_custom_init_podcast');
function codex_custom_init_podcast() 
{
  $labels = array(
    'name' => _x('Podcasts', 'post type general name'),
    'singular_name' => _x('Podcast', 'post type singular name'),
    'add_new' => _x('Add New', 'Podcast'),
    'add_new_item' => __('Add New Podcast'),
    'edit_item' => __('Edit Podcast'),
    'new_item' => __('New Podcast'),
    'view_item' => __('View Podcast'),
    'search_items' => __('Search Podcasts'),
    'not_found' =>  __('No podcast found'),
    'not_found_in_trash' => __('No podcast found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Podcasts'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor','author','revisions','custom-fields'),
    'taxonomies' => array('podcast_category')
  ); 
  register_post_type('podcast',$args);
};


add_action( 'init', 'create_podcast_taxonomy', 0 );
function create_podcast_taxonomy() 
{
  $labels = array(
    'name' => _x( 'Podcast Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Podcast Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Podcast Categories' ),
    'all_items' => __( 'All Podcast Categories' ),
    'parent_item' => __( 'Parent Podcast Category' ),
    'parent_item_colon' => __( 'Parent Podcast Category:' ),
    'edit_item' => __( 'Edit Podcast Category' ), 
    'update_item' => __( 'Update Podcast Category' ),
    'add_new_item' => __( 'Add New Podcast Category' ),
    'new_item_name' => __( 'New Podcast Category Name' ),
    'menu_name' => __( 'Podcast Categories' ),
  ); 	
  register_taxonomy('podcast_category',array('podcast'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'podcast-category'),
  ));
};
?>