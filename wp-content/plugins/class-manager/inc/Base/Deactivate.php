<?php

/**
 * 
 * @package ClassManager
 */

namespace Inc\Base;

class Deactivate
{
    static function deactivate()
    {
        flush_rewrite_rules();
    }
}
