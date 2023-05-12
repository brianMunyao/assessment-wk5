<?php

/**
 * @package ClassManager
 */

namespace Inc\Pages;

class RegisterTrainee
{
    public function register()
    {
        $this->create_trainees_table();
        $this->add_new_trainee();
    }

    function create_trainees_table()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'trainees';

        $query = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id int AUTO_INCREMENT PRIMARY KEY, 
            name text NOT NULL,
             phone text NOT NULL,
             email text NOT NULL
         );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($query);
    }

    function add_new_trainee()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email']
            ];

            global $wpdb;
            global $success_msg;
            global $error_msg;

            $success_msg = false;
            $error_msg = false;

            $table_name = $wpdb->prefix . 'trainees';

            $results = $wpdb->insert($table_name, $data);

            if ($results == true) {
                $success_msg = true;
            } else {
                $error_msg = true;
            }
        }
    }
}
