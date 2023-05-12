<?php

/**
 * @package ClassManager
 */

namespace Inc\Pages;


class AdminMenu
{
    public $pages;

    public function __construct()
    {
    }

    function register()
    {
        add_action('admin_menu', [$this, 'add_register_page']);
        add_action('admin_menu', [$this, 'add_view_all_page']);
    }

    function add_register_page()
    {
        add_menu_page(
            'Register Trainee',
            'Register Trainee',
            'manage_options',
            'register_trainee',
            [$this, "add_register_cb"],
            'dashicons-edit',
            110
        );
    }

    function add_register_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/class-manager/templates/register_trainee.php';
    }

    function add_view_all_page()
    {
        add_menu_page(
            'View All Trainees',
            'View All Trainees',
            'manage_options',
            'view_trainees',
            [$this, "view_all_cb"],
            'dashicons-open-folder',
            111
        );
    }

    function view_all_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/class-manager/templates/view_trainees.php';
    }
}
