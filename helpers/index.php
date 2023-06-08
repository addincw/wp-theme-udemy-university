<?php

if (!function_exists('uu_get_class_nav_item')) {
    /**
     * Give css class (active or not active) base on current route.
     * 
     * @param string $post_type post_type expected to give active class.
     * @param bool|null $add_cond Additional condition to determine navigation menu item class.
     * 
     * @return string Return css class name.
     */
    function uu_get_class_nav_item($post_type = '', $add_cond = null)
    {
        $passedCriteria = get_post_type() === $post_type;

        if (isset($add_cond)) $passedCriteria = $passedCriteria && $add_cond;

        if ($passedCriteria) {
            return 'current-menu-item';
        }
        return '';
    }
}
