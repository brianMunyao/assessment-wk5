<?php

/**
 * 
 * @package ClassManager
 */

namespace Inc\Base;

class Activate
{
    static function activate()
    {
        // echo "Testing activation";
        flush_rewrite_rules();
    }
}
