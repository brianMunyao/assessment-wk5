<?php

function foods_enqueue_scripts()
{
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'foods_enqueue_scripts');


function foods_widgets_init()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails', ['foods']);
}
add_action('widgets_init', 'foods_widgets_init');



function foods_post_type()
{

    $labels = [
        'name' => 'Foods',
        'singular_name' => 'Foods',
        'add_new' => 'Add Food Item',
        'all_items' => 'All Foods',
        'add_new_item' => 'Edit Item',
        'new_item' => 'New Items',
        'view_item' => 'View Item',
        'search_item' => 'Search Food',
        'not_found' => 'No Items Found',
        'parent_item_colon' => 'Parent Item'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'query_variable' => true,
        'rewrite' => array('slug' => 'foods'),
        'capability' => 'post',
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'taxonomies' => [
            'food_group'
        ]
    ];
    register_post_type('foods', $args);
}




add_action('init', 'foods_post_type');


function foods_group_taxonomy()
{
    $labels = [
        'name' => 'Food Groups',
        'singular_name' => 'Food Group',
        'search_items' => 'Search Food Groups',
        'all_items' => 'All Food Groups',
        'parent_item' => 'Parent Food Group',
        'parent_item_colon' => 'Parent Food Group',
        'edit_item' => 'Edit Food Group',
        'update_item' => 'Update Food Group',
        'add_new_item' => 'Add New Food Group',
        'new_item_name' => 'New Food Group Name',
        'menu_name' => 'Food Groups',
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'food-group']
    ];

    register_taxonomy('food_group', ['foods'], $args);
}


add_action('init', 'foods_group_taxonomy');
