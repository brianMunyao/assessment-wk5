<?php


/*
 Plugin Name: Class Manager
 Plugin URI: HTTP://example.com	
 Description: Plugin that helps add all members of the WordPress cohort
 version: 1.0
 Author: Brian
 Author URI: https://something.com
*/

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use  Inc\Init;

//security check
defined('ABSPATH') or die('Stopped');


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once(dirname(__FILE__) . '/vendor/autoload.php');
}

function activate_class_manager_plugin()
{
    Activate::activate();
}

function deactivate_class_manager_plugin()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_class_manager_plugin');

register_deactivation_hook(__FILE__, 'deactivate_class_manager_plugin');


// to add the plugin services
if (class_exists('Inc\\Init')) {
    Init::register_services();
}
