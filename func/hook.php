<?php
/**
 * Created by vagrant.
 * User: vagrant
 */


if (!defined('ABSPATH')) {
	return;
}

if (!function_exists('ccsb_assign_footer')) {
	function ccsb_assign_footer() {
		$html           = array();
        $list_social    = array();

		$phone 	        = ccsb_get_option('phone');
		$zalo 	        = ccsb_get_option('zalo');
		$facebook 	    = ccsb_get_option('facebook');
		$viber 	        = ccsb_get_option('viber');
		$whatsapp 	    = ccsb_get_option('whatsapp');
		$skype	        = ccsb_get_option('skype');

        $array_social = array();

		if ($phone)
		    $array_social[]  =   'phone';
		if ($zalo)
		    $array_social[]  =   'zalo';
		if ($facebook)
		    $array_social[]  =   'facebook';
		if ($viber)
		    $array_social[]  =   'viber';
		if ($whatsapp)
		    $array_social[]  =   'whatsapp';
        if ($skype)
            $array_social[]  =   'skype';

        if (!empty($array_social)) {
            foreach ($array_social as $item){
                $list_social[$item]['type'] = ccsb_get_option('type_'.$item);
                $list_social[$item]['icon'] = ccsb_get_option('icon_'.$item);
                $list_social[$item]['image'] = ccsb_get_option('image_'.$item);
                $list_social[$item]['link'] = ccsb_get_option('link_'.$item);
            }
        }

        $list 	= ccsb_get_option('_button_social_list');
        if ( !empty($list))
            $list_social = array_merge($list_social, $list);

		$position		= ccsb_get_option('_position');
		$layout			= ccsb_get_option('_layout');
		$style			= ccsb_get_option('_style');

		$display		= ccsb_get_option('_display');
		$_page_show		= ccsb_get_option('_page_show');
		$_page_show		= ($_page_show == '') ? array() : $_page_show;

		global $post;

		if ($display == 'custom' && ((!in_array($post->ID, $_page_show) && is_page()) || !is_page()) ) {
			return;
		}

		$class = array(
			'ccsb',
			'ccsb-' . $style,
			'ccsb-' . $position,
			'ccsb-' . $layout
		);

		if (!empty($list_social)) {

			$html[] = '<div class="' . implode(' ', $class) . '">';
			$html[] = '<ul>';

			foreach ($list_social as $s) {
				$content_a = '';

				if ($s['type'] == 'icon') {
					$content_a = '<i class="' . $s['icon'] . '"></i>';
				} elseif ($s['type'] == 'image') {
					$image 		= $s['image'];
					$content_a 	= '<img src="' . ccsb_get_value_in_array($image,'url') . '" alt="' . ccsb_get_value_in_array($s, 'title') . '" />';
				}

				$html[] = '<li data-color="' . ccsb_get_value_in_array($s, 'color') . '"><a href="' . ccsb_get_value_in_array($s, 'link') . '">' . $content_a . '</a></li>';
			}

			$html[] = '</ul>';
			$html[] = '</div>';
		}

		echo implode('', $html);
	}

	add_action('wp_footer', 'ccsb_assign_footer', 99);
}