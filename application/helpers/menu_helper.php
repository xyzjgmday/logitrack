<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('is_active')) {
    function is_active($uri_segment, $segment_position = 1)
    {
        $CI =& get_instance();
        return ($CI->uri->segment($segment_position) == $uri_segment) ? 'm-menu__item--active' : '';
    }
}

if (!function_exists('is_active_submenu')) {
    function is_active_submenu($uri_segments, $segment_position = 1)
    {
        $CI =& get_instance();
        foreach ($uri_segments as $segment) {
            if ($CI->uri->segment($segment_position) == $segment) {
                return 'm-menu__item--open m-menu__item--expanded';
            }
        }
        return '';
    }
}
