<?php
/**
 * Created by vagrant.
 * User: vagrant
 */

if (!defined('ABSPATH')) {
	return;
}

if (!function_exists('ccsb_get_option')) {
	function ccsb_get_option($option_name = '', $default = '') {

		$options = apply_filters('cc_get_option', get_option('_ccsb_options'), $option_name, $default);

		if (!empty($option_name) && !empty($options[$option_name])) {
			return $options[$option_name];
		} else {
			return (!empty($default)) ? $default : null;
		}

	}
}

/**
 * Get array value.
 */
if (! function_exists('ccsb_get_value_in_array')) {
    function ccsb_get_value_in_array($array, $key, $default = false) {
        return isset($array[ $key ]) ? $array[ $key ] : $default;
    }
}