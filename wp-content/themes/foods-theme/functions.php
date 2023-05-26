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


/**
 * Short Codes
 */

add_shortcode('input_code', function ($attrs) {
    $attributes = shortcode_atts([
        'placeholder' => 'Fill in this field',
        'name' => '',
        'class' => 'form-input'
    ], $attrs, 'input_code');

    return "
        <input 
            placeholder='{$attributes['placeholder']}'
            name='{$attributes['name']}'
            class='{$attributes['name']}'
        />
    ";
});

// function new_login_url($login_url)
// {
//     $login_url = site_url(
//         'brian.php',
//         'login'
//     );

//     return $login_url;
// }

// add_filter('login_url', 'new_login_url');

// LIMITING LOGIN ATTEMPTS

// function check_attempted_login($user, $username, $password)
// {
//     if (get_transient('attempted_login')) {
//         $datas = get_transient('attempted_login');

//         if ($datas['tried'] >= 3) {
//             $until = get_option('_transient_timeout_' . 'attempted_login');
//             $time = time_to_go($until);

//             return new WP_Error('too_many_tried', sprintf(__('<strong>ERROR</strong>: You have reached authentication limit, please try after %1$s'), $time));
//         }
//     }

//     return $user;
// }

// add_filter('authenticate', 'check_attempted_login', 30, 3);

// function login_failed($username)
// {
//     if (get_transient('attempted_login')) {
//         $datas = get_transient('attempted_login');
//         $datas['tried']++;

//         if ($datas['tried'] <= 3)
//             set_transient('attempted_login', $datas, 300);
//     } else {
//         $datas = array(
//             'tried' => 1
//         );
//         set_transient('attempted_login', $datas, 300);
//     }
// }

// add_action('wp_login_failed', 'login_failed', 10, 1);


// function time_to_go($timestamp)
// {
//     //converting mysql timestamp to php time
//     $periods = array(
//         "second",
//         "minute",
//         "hour",
//         "day",
//         "week",
//         "month",
//         "year"
//     );

//     $lengths = array(
//         "60",
//         "60",
//         "24",
//         "7",
//         "4.35",
//         "12"
//     );

//     $current_timestamp = time();
//     $difference = abs($current_timestamp - $timestamp);

//     for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i++) {
//         $difference /= $lengths[$i];
//     }

//     //adding the countdown if the remaining is less than a minute
//     $difference = round($difference);

//     if (isset($difference)) {
//         if ($difference != 1) {
//             $periods[$i] .= "s";
//             $output = "$difference $periods[$i]";
//             return $output;
//         }
//     }
// }
