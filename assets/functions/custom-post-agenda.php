<?php

/* joints Custom Post Type Example
  This page walks you through creating
  a custom post type and taxonomies. You
  can edit this one or copy the following code
  to create another one.

  I put this in a separate file so as to
  keep it organized. I find it easier to edit
  and change things if they are concentrated
  in their own file.

 */

// let's create the function for the custom type
function custom_post_schedule() {
    // creating (registering) the custom type 
    register_post_type('agenda', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
            // let's now add all the options for this post type
            array('labels' => array(
            'name' => __('Schedule', 'jointswp'), /* This is the Title of the Group */
            'singular_name' => __('Date', 'jointswp'), /* This is the individual type */
            'all_items' => __('All dates', 'jointswp'), /* the all items menu item */
            'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
            'add_new_item' => __('Add New date', 'jointswp'), /* Add New Display Title */
            'edit' => __('Edit', 'jointswp'), /* Edit Dialog */
            'edit_item' => __('Edit date', 'jointswp'), /* Edit Display Title */
            'new_item' => __('New date', 'jointswp'), /* New Display Title */
            'view_item' => __('View dates', 'jointswp'), /* View Display Title */
            'search_items' => __('Search Post Type', 'jointswp'), /* Search Custom Type Title */
            'not_found' => __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ), /* end of arrays */
        'description' => __('This is the example date', 'jointswp'), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
        'menu_icon' => 'dashicons-calendar-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
        'rewrite' => array('slug' => 'agenda', 'with_front' => true), /* you can specify its url slug */
        'has_archive' => 'agenda', /* you can rename the slug here */
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array('title')
            ) /* end of options */
    ); /* end of register post type */

    /* this adds your post categories to your custom post type */
    //register_taxonomy_for_object_type('category', 'artistes');
    /* this adds your post tags to your custom post type */
    //register_taxonomy_for_object_type('post_tag', 'custom_type');
}

// adding the function to the Wordpress init
add_action('init', 'custom_post_schedule');
