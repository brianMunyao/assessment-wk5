<?php

/**
 * 
 * @package RestApi
 */

/**
 * Plugin Name: MY REST API TEST
 * Plugin Description: plugin to  for creating REST Routes
 * Author: brian
 * Author URI: www.example.com
 * Plugin URI: www.example.com
 * Version: 1.0.0
 * Licence: GPLv2 or later
 */

if (!defined('ABSPATH')) die('Stopped');

class MyRestController
{
    public $namespace;
    public $route;

    public function __construct()
    {
        $this->namespace = 'myfoods/v1';
        $this->route = 'foods';
    }

    public function register_routes()
    {
        register_rest_route($this->namespace, $this->route, [
            'callback' => [$this, 'get_foods'],
            'method' => 'GET',
            'permission_callback' => [$this, 'endpoint_permission'],
            'args' => [
                'meta_key' => [
                    'required' => true,
                    'validate_callback' => function ($param, $request, $key) {
                        return !is_numeric($param);
                    }
                ],
                'meta_value' => [
                    'required' => true,
                    'default' => 1,
                    'validate_callback' => function ($param, $request, $key) {
                        return is_numeric($param);
                    }
                ]
            ],
            'schema' => [$this, 'food_schema']
        ]);
    }

    public function get_foods(WP_REST_Request $request)
    {
        $meta_key = $request->get_param('meta_key');
        $meta_value = $request->get_param('meta_value');

        $args = [
            'post_type' => 'foods',
            'status' => 'publish',
            'posts_per_query' => 10,
            'meta_query' => [[
                'key' => $meta_key,
                'value' => $meta_value
            ]]
        ];

        $query = new WP_Query($args);
        $foods = $query->posts;

        if (empty($foods)) {
            return new WP_Error(
                'no_data_found',
                'No Data Found',
                ['status' => 404]
            );
        }
        foreach ($foods as $food) {
            $response = $this->custom_prepare_post($food, $request);
            $data[] = $this->prepare_for_collection($response);
        }

        return $data;
    }

    public function food_schema()
    {
        $schema = [
            'type' => 'object',
            'properties' => [
                'id' => [
                    'description' => esc_html__('Unique identifier of the the object', 'my-textdomain'),
                    'type' => 'integer'
                ],
                'author' => [
                    'description' => esc_html__('The creator of the object', 'my-textdomain'),
                    'type' => 'integer'
                ],
                'title' => [
                    'desctiption' => esc_html__('This is the title of the portfolio', 'my-textdomain'),
                    'type' => 'string'
                ],
                'content' => [
                    'description' => esc_html__('The content of the portfolios', 'my-textdomain'),
                    'type' => 'string'
                ]
            ]
        ];

        return $schema;
    }

    function prepare_for_collection($response)
    {
        if (!($response instanceof WP_REST_Response)) {
            return $response;
        }

        $data = (array) $response->get_data();

        $links = rest_get_server()::get_compact_response_links($response);

        if (!(empty($links))) {
            $data['_links'] = $links;
        }

        return $data;
    }

    public function endpoint_permission()
    {
        return is_user_logged_in();
    }

    function custom_prepare_post($post, $request)
    {
        $post_data = [];
        $schema = $this->food_schema();

        if (isset($schema['properties']['id'])) {
            $post_data['id'] = (int) $post->ID;
        }
        if (isset($schema['properties']['author'])) {
            $post_data['author'] = (int) $post->post_author;
        }
        if (isset($schema['properties']['content'])) {
            $post_data['content'] = apply_filters('post_content', $post->post_content, $post);
        }
        if (isset($schema['properties']['title'])) {
            $post_data['title'] = apply_filters('post_title', $post->post_title, $post);
        }

        return rest_ensure_response($post_data);
    }
}


function init_controller()
{
    $controller = new MyRestController();
    $controller->register_routes();
}

add_action('rest_api_init', 'init_controller');
