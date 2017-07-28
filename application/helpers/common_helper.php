<?php

if ( ! function_exists('h') ) {
	/**
	 * escape var
	 * 
	 * @param string or array $var
	 */
    function h($var)
    {
        if (is_array($var))
        {
            return array_map('h', $var);
        }
        else
        {
            return htmlspecialchars($var, ENT_QUOTES, config_item('charset'));
        }
    }
}

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

if (!function_exists('has_err')) {
    /**
     * form error class
     * 
     * @param string $var
     * @return string
     */
    function has_err($var) {
        if (!empty(form_error($var))) {
            return 'has-error';
        } else {
            return '';
        }
    }
}

if (!function_exists('f_date')) {
    /**
     * format_date
     * 
     * @param string $date
     * @return string
     */
    function f_date($date, $format='Y/m/d')
    {
        return date($format, strtotime($date));
    }
}

if (!function_exists('f_datetime')) {
    /**
     * format_date
     * 
     * @param string $datetime
     * @return string
     */
    function f_datetime($datetime, $format='Y/m/d H:i:s')
    {
        return date($format, strtotime($datetime));
    }
}