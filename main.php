<?php
/**
 * Created by vagrant.
 * User: vagrant
 */

/*
Plugin Name: 		Premium Contact Buttons
Plugin URI: 		https://wpplg.com/product/cc-social-buttons/
Description: 		This plugin allows you to add call, Skype, Facebook, Line, Viber, Zalo, WhatsApp ... anything you want to the website, and give you the best ways to engage your customers
Version: 			1.1.0
Author: 			WPPLG
Author URI: 		https://wpplg.com/
*/

if (!defined('ABSPATH')) {
    return;
}

if (!class_exists('CC_Social_Buttons')) {
    class CC_Social_Buttons
    {
        public function __construct()
        {
            $this->define();
            $this->load_library();
            $this->load_helper();

            add_action('init', array(__CLASS__, 'load_config'), 2);

            if (!is_admin()) {
                add_action('wp_enqueue_scripts', array($this, 'action_enqueue_scripts'), 20);
            }
        }

        // define
        public function define()
        {
            define('CC_SOCIAL_BUTTONS_DIR_PATH', plugin_dir_path(__FILE__));
            define('CC_SOCIAL_BUTTONS_DIR_URL', plugin_dir_url(__FILE__));

            define('CC_SOCIAL_BUTTONS', '_ccsb_options');
        }

        // load library.
        public function load_library()
        {
            // Load core framework
            if (!class_exists('CSF')) {
                require_once CC_SOCIAL_BUTTONS_DIR_PATH . '/libs/codestar-framework/codestar-framework.php';
            }
        }

        // load config.
        public static function load_config()
        {
            require_once CC_SOCIAL_BUTTONS_DIR_PATH . '/config/framework.php';
        }

        // load helper.
        public function load_helper() {
            require_once CC_SOCIAL_BUTTONS_DIR_PATH . '/func/helper.php';
            require_once CC_SOCIAL_BUTTONS_DIR_PATH . '/func/hook.php';
        }

        public function action_enqueue_scripts()
        {
            wp_enqueue_style('ocanus-social-buttons-style', CC_SOCIAL_BUTTONS_DIR_URL . 'assets/css/style.css', array(), false);

            wp_enqueue_script('ocanus-social-buttons-script', CC_SOCIAL_BUTTONS_DIR_URL . '/assets/js/script.js', array('jquery'), false, true);
            wp_localize_script('ocanus-social-buttons-script', 'ocanus_script', array(
                'ajax_url' => admin_url('admin-ajax.php')
            ));

            //style
			wp_enqueue_style('font-awesome', 	CC_SOCIAL_BUTTONS_DIR_URL . 'assets/plugins/font-awesome/font-awesome.css');
			wp_enqueue_style('ccsb-style', 		CC_SOCIAL_BUTTONS_DIR_URL . 'assets/css/style.css');

			require_once CC_SOCIAL_BUTTONS_DIR_PATH . '/class/style-builder.class.php';
			require_once CC_SOCIAL_BUTTONS_DIR_PATH . '/func/custom-style.php';

			$style_builder	= CCSB_Style_Builder::getInstance();
			$custom_style	= $style_builder->render();

			if ($custom_style) {
				wp_add_inline_style('ccsb-style', $custom_style);
			}

			//javascript
			wp_enqueue_script('ccsb-script', 	CC_SOCIAL_BUTTONS_DIR_URL . 'assets/js/script.js', array('jquery'), '1.0.0', true);
			wp_localize_script('ccsb-script', 'ccsb_script', array(
				'ajax_url' 				=> admin_url('admin-ajax.php'),
				'site_url'				=> esc_url(home_url('/')),
			));

        }
    }

    new CC_Social_Buttons();
}




