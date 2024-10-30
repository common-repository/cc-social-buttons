<?php
/**
 * Created by PhpStorm.
 * User: TRUNG
 * Date: 10/27/2017
 * Time: 9:53 PM
 */

if (!defined('ABSPATH')) {
	return;
}

$args = array(
	'post_type'			=> 'page',
	'posts_per_page'	=> '-1'
);

$data 			= get_posts($args);
$page_options 	= array();

if (!empty($data)) {
	foreach ($data as $p) {
		$page_options[$p->ID] = $p->post_title;
	}
}

$options	= array();

$options[]	= array(
	'name'		=> 'button_social',
	'title'		=> esc_html__('List Socials', 'cc-social-buttons'),
	'fields'	=> array(

        array(
            'id'    => 'phone',
            'type'  => 'switcher',
            'title' => 'Phone',
        ),

        array(
            'id'			=> 'type_phone',
            'class'			=> 'chosen',
            'type'			=> 'select',
            'title'			=> esc_html__('Icon Type Phone', 'cc-social-buttons'),
            'options'		=> array(
                'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
                'image'		=> esc_html__('Image', 'cc-social-buttons'),
            ),
            'default'       => 'image',
            'dependency'	=> array('phone', '==', true)

        ),

        array(
            'id'			=> 'icon_phone',
            'type'			=> 'icon',
            'title'			=> esc_html__('Icon Phone', 'cc-social-buttons'),
            'dependency'	=> array('type_phone', '==', 'icon')
        ),

        array(
            'id'			=> 'image_phone',
            'type'			=> 'media',
            'title'			=> esc_html__('Image Phone', 'cc-social-buttons'),
            'dependency'	=> array('phone', '==', true),
            'default'       => array(
                'url'           => CC_SOCIAL_BUTTONS_DIR_URL.'assets/images/phone.png',
            )
        ),

        array(
            'id'			=> 'link_phone',
            'type'			=> 'text',
            'title'			=> esc_html__('Phone Number', 'cc-social-buttons'),
            'default'       => '',
            'dependency'	=> array('phone', '==', true)
        ),

//        array(
//            'id'			=> 'color_phone',
//            'type'			=> 'color',
//            'title'			=> esc_html__('Color', 'cc-social-buttons'),
//            'default'       => '#e60808',
//            'dependency'	=> array('phone', '==', true)
//        ),

        array(
            'id'			=> 'background_color_phone',
            'type'			=> 'color',
            'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
            'default'       => '#e60808',
            'dependency'	=> array('phone', '==', true)
        ),

        array(
            'id'    => 'zalo',
            'type'  => 'switcher',
            'title' => 'Zalo',
        ),

        array(
            'id'			=> 'type_zalo',
            'class'			=> 'chosen',
            'type'			=> 'select',
            'title'			=> esc_html__('Icon Type Zalo', 'cc-social-buttons'),
            'options'		=> array(
                'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
                'image'		=> esc_html__('Image', 'cc-social-buttons'),
            ),
            'default'       => 'image',
            'dependency'	=> array('zalo', '==', true)

        ),

        array(
            'id'			=> 'icon_zalo',
            'type'			=> 'icon',
            'title'			=> esc_html__('Icon Zalo', 'cc-social-buttons'),
            'dependency'	=> array('type_zalo', '==', 'icon')
        ),

        array(
            'id'			=> 'image_zalo',
            'type'			=> 'media',
            'title'			=> esc_html__('Image Zalo', 'cc-social-buttons'),
            'dependency'	=> array('zalo', '==', true),
            'default'       => array(
                'url'           => CC_SOCIAL_BUTTONS_DIR_URL.'assets/images/zalo.png',
            )
        ),

        array(
            'id'			=> 'link_zalo',
            'type'			=> 'text',
            'title'			=> esc_html__('Link Zalo', 'cc-social-buttons'),
            'default'       => 'https://zalo.me/',
            'dependency'	=> array('zalo', '==', true)
        ),

//        array(
//            'id'			=> 'color_zalo',
//            'type'			=> 'color',
//            'title'			=> esc_html__('Color', 'cc-social-buttons'),
//            'default'       => '#2196F3',
//            'dependency'	=> array('zalo', '==', true)
//        ),

        array(
            'id'			=> 'background_color_zalo',
            'type'			=> 'color',
            'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
            'default'       => '#2196F3',
            'dependency'	=> array('zalo', '==', true)
        ),

        array(
            'id'    => 'facebook',
            'type'  => 'switcher',
            'title' => 'Facebook',
        ),


        array(
            'id'			=> 'type_facebook',
            'class'			=> 'chosen',
            'type'			=> 'select',
            'title'			=> esc_html__('Icon Type Facebook', 'cc-social-buttons'),
            'options'		=> array(
                'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
                'image'		=> esc_html__('Image', 'cc-social-buttons'),
            ),
            'default'       => 'image',
            'dependency'	=> array('facebook', '==', true)

        ),

        array(
            'id'			=> 'icon_facebook',
            'type'			=> 'icon',
            'title'			=> esc_html__('Icon Facebook', 'cc-social-buttons'),
            'dependency'	=> array('type_facebook', '==', 'icon')
        ),

        array(
            'id'			=> 'image_facebook',
            'type'			=> 'media',
            'title'			=> esc_html__('Image Facebook', 'cc-social-buttons'),
            'default'       => array(
                'url'       => CC_SOCIAL_BUTTONS_DIR_URL.'assets/images/facebook.png',
            ),
            'dependency'	=> array('facebook', '==', true),
        ),

        array(
            'id'			=> 'link_facebook',
            'type'			=> 'text',
            'title'			=> esc_html__('Link Facebook', 'cc-social-buttons'),
            'default'       => 'https://www.facebook.com/',
            'dependency'	=> array('facebook', '==', true)
        ),

//        array(
//            'id'			=> 'color_facebook',
//            'type'			=> 'color',
//            'title'			=> esc_html__('Color', 'cc-social-buttons'),
//            'default'       => '#2d88ff',
//            'dependency'	=> array('facebook', '==', true)
//        ),

        array(
            'id'			=> 'background_color_facebook',
            'type'			=> 'color',
            'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
            'default'       => '#2d88ff',
            'dependency'	=> array('facebook', '==', true)
        ),

        array(
            'id'    => 'viber',
            'type'  => 'switcher',
            'title' => 'Viber',
        ),


        array(
            'id'			=> 'type_viber',
            'class'			=> 'chosen',
            'type'			=> 'select',
            'title'			=> esc_html__('Icon Type Viber', 'cc-social-buttons'),
            'options'		=> array(
                'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
                'image'		=> esc_html__('Image', 'cc-social-buttons'),
            ),
            'default'       => 'image',
            'dependency'	=> array('viber', '==', true)

        ),

        array(
            'id'			=> 'icon_viber',
            'type'			=> 'icon',
            'title'			=> esc_html__('Icon Viber', 'cc-social-buttons'),
            'dependency'	=> array('type_viber', '==', 'icon')
        ),

        array(
            'id'			=> 'image_viber',
            'type'			=> 'media',
            'title'			=> esc_html__('Image Viber', 'cc-social-buttons'),
            'dependency'	=> array('viber', '==', true),
            'default'       => array(
                'url'           => CC_SOCIAL_BUTTONS_DIR_URL.'assets/images/viber.png',
            )
        ),

        array(
            'id'			=> 'link_viber',
            'type'			=> 'text',
            'title'			=> esc_html__('Link Viber', 'cc-social-buttons'),
            'default'       => 'https://viber.com/',
            'dependency'	=> array('viber', '==', true)
        ),

//        array(
//            'id'			=> 'color_viber',
//            'type'			=> 'color',
//            'title'			=> esc_html__('Color', 'cc-social-buttons'),
//            'default'       => '#714497',
//            'dependency'	=> array('viber', '==', true)
//        ),

        array(
            'id'			=> 'background_color_viber',
            'type'			=> 'color',
            'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
            'default'       => '#714497',
            'dependency'	=> array('viber', '==', true)
        ),

        array(
            'id'    => 'whatsapp',
            'type'  => 'switcher',
            'title' => 'Whatsapp',
        ),

        array(
            'id'			=> 'type_whatsapp',
            'class'			=> 'chosen',
            'type'			=> 'select',
            'title'			=> esc_html__('Icon Type Whatsapp', 'cc-social-buttons'),
            'options'		=> array(
                'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
                'image'		=> esc_html__('Image', 'cc-social-buttons'),
            ),
            'default'       => 'image',
            'dependency'	=> array('whatsapp', '==', true)

        ),

        array(
            'id'			=> 'icon_whatsapp',
            'type'			=> 'icon',
            'title'			=> esc_html__('Icon Whatsapp', 'cc-social-buttons'),
            'dependency'	=> array('type_whatsapp', '==', 'icon')
        ),

        array(
            'id'			=> 'image_whatsapp',
            'type'			=> 'media',
            'title'			=> esc_html__('Image Whatsapp', 'cc-social-buttons'),
            'dependency'	=> array('whatsapp', '==', true),
            'default'       => array(
                'url'           => CC_SOCIAL_BUTTONS_DIR_URL.'assets/images/whatsapp.png',
            )
        ),

        array(
            'id'			=> 'link_whatsapp',
            'type'			=> 'text',
            'title'			=> esc_html__('Link Whatsapp', 'cc-social-buttons'),
            'default'       => 'https://whatsapp.com/',
            'dependency'	=> array('viber', '==', true)
        ),

        array(
            'id'			=> 'background_color_whatsapp',
            'type'			=> 'color',
            'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
            'default'       => '#18970E',
            'dependency'	=> array('whatsapp', '==', true)
        ),

        array(
            'id'    => 'skype',
            'type'  => 'switcher',
            'title' => 'Skype',
        ),

        array(
            'id'			=> 'type_skype',
            'class'			=> 'chosen',
            'type'			=> 'select',
            'title'			=> esc_html__('Icon Type Skype', 'cc-social-buttons'),
            'options'		=> array(
                'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
                'image'		=> esc_html__('Image', 'cc-social-buttons'),
            ),
            'default'       => 'image',
            'dependency'	=> array('skype', '==', true)

        ),

        array(
            'id'			=> 'icon_skype',
            'type'			=> 'icon',
            'title'			=> esc_html__('Icon Skype', 'cc-social-buttons'),
            'dependency'	=> array('type_skype', '==', 'icon')
        ),

        array(
            'id'			=> 'image_skype',
            'type'			=> 'media',
            'title'			=> esc_html__('Image Skype', 'cc-social-buttons'),
            'dependency'	=> array('skype', '==', true),
            'default'       => array(
                'url'           => CC_SOCIAL_BUTTONS_DIR_URL.'assets/images/skype.png',
            )
        ),

        array(
            'id'			=> 'link_skype',
            'type'			=> 'text',
            'title'			=> esc_html__('Link Skype', 'cc-social-buttons'),
            'default'       => 'https://skype.com/',
            'dependency'	=> array('skype', '==', true)
        ),

        array(
            'id'			=> 'background_color_skype',
            'type'			=> 'color',
            'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
            'default'       => '#0096E1',
            'dependency'	=> array('skype', '==', true)
        ),

        array(
			'id'				=> '_button_social_list',
			'type'				=> 'group',
			'title'				=> esc_html__('Social List', 'cc-social-buttons'),
			'button_title'		=> esc_html__('Add New Social', 'cc-social-buttons'),
//			'accordion_title_prefix'	=> esc_html__('New Social', 'cc-social-buttons'),
			'fields'			=> array(
				array(
					'id'			=> 'title',
					'type'			=> 'text',
					'title'			=> esc_html__('Title', 'cc-social-buttons'),
                    'default'       => ''
				),

				array(
					'id'			=> 'type',
					'class'			=> 'chosen',
					'type'			=> 'select',
					'title'			=> esc_html__('Icon Type', 'cc-social-buttons'),
					'options'		=> array(
						'icon'		=> esc_html__('Icon', 'cc-social-buttons'),
						'image'		=> esc_html__('Image', 'cc-social-buttons'),
					)
				),

				array(
					'id'			=> 'icon',
					'type'			=> 'icon',
					'title'			=> esc_html__('Icon', 'cc-social-buttons'),
					'dependency'	=> array('type', '==', 'icon')
				),

				array(
					'id'			=> 'image',
					'type'			=> 'media',
					'title'			=> esc_html__('Image', 'cc-social-buttons'),
					'dependency'	=> array('type', '==', 'image')
				),

				array(
					'id'			=> 'link',
					'type'			=> 'text',
					'title'			=> esc_html__('Link', 'cc-social-buttons'),
				),

                array(
                    'id'		=> '_style',
                    'type'		=> 'select',
                    'class'		=> 'chosen',
                    'title'		=> esc_html__('Style', 'cc-social-buttons'),
                    'options'	=> array(
                        'basic'			=> esc_html__('Basic', 'cc-social-buttons'),
                        'color'			=> esc_html__('Color', 'cc-social-buttons'),
                    ),
                    'default'   => 'color'
                ),

                array(
                    'id'			=> '_style_basic_color',
                    'type'			=> 'color',
                    'title'			=> esc_html__('Color', 'cc-social-buttons'),
                    'dependency'	=> array('_style', '==', 'basic'),
                ),

                array(
                    'id'			=> '_style_basic_bg_color',
                    'type'			=> 'color',
                    'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
                    'dependency'	=> array('_style', '==', 'basic'),
                ),

                array(
                    'id'			=> '_style_basic_hover_color',
                    'type'			=> 'color',
                    'title'			=> esc_html__('Hover Color', 'cc-social-buttons'),
                    'dependency'	=> array('_style', '==', 'basic'),
                ),

                array(
                    'id'			=> '_style_basic_bg_hover_color',
                    'type'			=> 'color',
                    'title'			=> esc_html__('Background Hover Color', 'cc-social-buttons'),
                    'dependency'	=> array('_style', '==', 'basic'),
                ),

                array(
                    'id'			=> '_style_color',
                    'type'			=> 'color',
                    'title'			=> esc_html__('Color', 'cc-social-buttons'),
                    'dependency'	=> array('_style', '==', 'color'),
                ),

                array(
                    'id'			=> '_style_background_color',
                    'type'			=> 'color',
                    'title'			=> esc_html__('Background Color', 'cc-social-buttons'),
                    'dependency'	=> array('_style', '==', 'color'),
                ),

			),
		),

    )
);

$options[]	= array(
	'name'		=> 'setting',
	'title'		=> esc_html__('Setting', 'cc-social-buttons'),
	'fields'	=> array(
		array(
			'id'		=> '_position',
			'type'		=> 'select',
			'class'		=> 'chosen',
			'title'		=> esc_html__('Position', 'cc-social-buttons'),
			'options'	=> array(
				'bottom-right'	=> esc_html__('Bottom Right', 'cc-social-buttons'),
				'bottom-left'	=> esc_html__('Bottom Left', 'cc-social-buttons'),
				'middle-right'	=> esc_html__('Middle Right', 'cc-social-buttons'),
				'middle-left'	=> esc_html__('Middle Left', 'cc-social-buttons'),
			)
		),

		array(
			'id'		=> '_layout',
			'type'		=> 'select',
			'class'		=> 'chosen',
			'title'		=> esc_html__('Layout', 'cc-social-buttons'),
			'options'	=> array(
				'vertical'		=> esc_html__('Vertical', 'cc-social-buttons'),
				'horizontal'	=> esc_html__('Horizontal', 'cc-social-buttons'),
			)
		),

        array(
            'id'		=> '_display',
            'type'		=> 'select',
            'class'		=> 'chosen',
            'title'		=> esc_html__('Display', 'cc-social-buttons'),
            'options'	=> array(
                'all'		=> esc_html__('All Page', 'cc-social-buttons'),
                'custom'	=> esc_html__('Custom Page', 'cc-social-buttons'),
            ),
        ),

        array(
            'id'		=> '_page_show',
            'type'		=> 'select',
            'class'		=> 'chosen',
            'title'		=> esc_html__('Chosen Page', 'cc-social-buttons'),
            'options'	=> $page_options,
            'attributes' => array(
                'multiple' => 'multiple',
            ),
            'dependency'	=> array('_display', '==', 'custom'),
        ),

        array(
            'id'          => 'button_size',
            'type'        => 'spinner',
            'title'       => 'Button Size',
            'min'         => 0,
            'max'         => 50,
            'step'        => 1,
            'unit'        => 'px',
            'output'      => '.ccsb ul li a',
            'output_mode' => 'font-size',
            'default'     => 20,
        ),

        array(
            'id'          => 'button_spacing',
            'type'        => 'spacing',
            'title'       => 'Button Spacing',
            'output'      => '.ccsb ul li',
            'output_mode' => 'margin', // or margin, relative
            'default'     => array(
                'top'       => '10',
                'right'     => '10',
                'bottom'    => '10',
                'left'      => '10',
                'unit'      => 'px',
            ),
        ),

        array(
            'id'    => 'box_shadow',
            'type'  => 'switcher',
            'title' => 'Box Shadow',
            'default'=> true
        ),

	)
);

CSF::createOptions(CC_SOCIAL_BUTTONS, array(
    'framework_title'   => esc_html__('Premium Contact Buttons', 'cc-social-buttons'),
    'menu_title'        => esc_html__('Contact Buttons', 'cc-social-buttons'),
    'menu_slug'         => 'cc-social-buttons',
    'menu_icon'         => 'dashicons-share'
) );

foreach ($options as $option){
    CSF::createSection(CC_SOCIAL_BUTTONS, $option);
}


