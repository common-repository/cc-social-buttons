<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 4/19/2019
 * Time: 9:45 PM
 */

if (! class_exists('CCSB_Style_Builder')) {
	return;
}

$style_builder	= CCSB_Style_Builder::getInstance();

$list_social    = array();
$phone 	        = ccsb_get_option('phone');
$zalo 	        = ccsb_get_option('zalo');
$facebook 	    = ccsb_get_option('facebook');
$viber 	        = ccsb_get_option('viber');
$whatsapp 	    = ccsb_get_option('whatsapp');
$skype 	        = ccsb_get_option('skype');

$box_shadow 	= ccsb_get_option('box_shadow');

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
        $list_social[$item]['_style']                   = 'color';
//        $list_social[$item]['_style_color']             = ccsb_get_option('color_'.$item);
        $list_social[$item]['_style_background_color']  = ccsb_get_option('background_color_'.$item);
    }
}

$list 	= ccsb_get_option('_button_social_list');
if ( !empty($list))
    $list_social = array_merge($list_social, $list);

if (!empty($list_social)) {
    $count = 0;
    foreach ($list_social as $s) {
        $count++;
        $style	= $s['_style'];
        if ($style == 'basic') {
            $basic_color 			= $s['_style_basic_color'];
            $basic_bg_color 		= $s['_style_basic_bg_color'];
            $basic_color_hover 		= $s['_style_basic_hover_color'];
            $basic_bg_hover_color 	= $s['_style_basic_bg_hover_color'];

            if ($basic_color) {
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a', 'color: ' . $basic_color . '');
            }

            if ($basic_bg_color) {
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a', 'background-color: ' . $basic_bg_color . '');
            }

            if ($basic_color_hover) {
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a:hover', 'color: ' . $basic_color_hover . '');
            }

            if ($basic_bg_hover_color) {
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a:hover', 'background-color: ' . $basic_bg_hover_color . '');
            }
        }

        if ($style == 'color') {
            $color 			    = isset($s['_style_color'])? :'';
            $background_color 	= $s['_style_background_color']? $s['_style_background_color'] :'#484d51';

            if ($color) {
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a', 'color: ' . $color . '');
            }

            if ($background_color) {
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a', 'background-color: ' . $background_color . '');
                $style_builder->addStyle('.ccsb ul li:nth-child('.$count.')', 'background-color: ' . $background_color . '');

                if ($box_shadow == 1){
                    $style_builder->addStyle('.ccsb ul li:nth-child('.$count.')', 'box-shadow: 0 0 0 0 ' . $background_color . '');
                    $style_builder->addStyle('.ccsb ul li:nth-child('.$count.')', 'background-image: radial-gradient(circle, ' . $background_color . ', #ffffffbf)');
                }
            }
        }

        if ($box_shadow == 1){

            $style_builder->addStyle('.ccsb ul li', 'padding: 10px');
            $style_builder->addStyle('.ccsb ul li:nth-child('.$count.')', 'margin-right: 25px');
            $style_builder->addStyle('.ccsb ul li:nth-child('.$count.')', 'margin-bottom: 25px');
            $style_builder->addStyle('.ccsb ul li:nth-child('.$count.')', 'animation: zoom 1s infinite');
            $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a i', 'animation:stretch 1s infinite ease-in-out;');
            $style_builder->addStyle('.ccsb ul li:nth-child('.$count.') a img', 'animation:stretch 1s infinite ease-in-out;');

        }
    }
}


