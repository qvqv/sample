<?php
if (!function_exists('active_nav')) {

    /**
     * navbar active style set
     * 
     * @param string $segment
     * @param string $var
     * @param boolean $c
     * @return string
     */
    function active_nav($segment, $var, $c = TRUE) {
        $ret = "";
        if ($segment == $var) {
            if ($c) {
                $ret = "class='active'";
            } else {
                $ret = ' active';
            }
        }
        return $ret;
    }

}