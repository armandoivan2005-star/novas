<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WeDesignTech_Widget_Base_AdvanceTestimonial { 

	private static $_instance = null;

	private $cc_repeater_contents;
	private $cc_content_position;
	private $cc_layout;
	private $cc_style;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	function __construct() {

		// Options
			$options_group = array( 'default' );
			$options['default'] = array(
				'image'        => esc_html__( 'Image', 'wdt-elementor-addon'),
				'icon'         => esc_html__( 'Icon', 'wdt-elementor-addon'),
				'title'        => esc_html__( 'Name', 'wdt-elementor-addon'),
				'sub_title'    => esc_html__( 'Role', 'wdt-elementor-addon'),
				'description'  => esc_html__( 'Description', 'wdt-elementor-addon'),
				'link'         => esc_html__( 'Link', 'wdt-elementor-addon'),
				'button'       => esc_html__( 'Button', 'wdt-elementor-addon'),
				'social_icons' => esc_html__( 'Social Icons', 'wdt-elementor-addon'),
				'rating'       => esc_html__( 'Rating', 'wdt-elementor-addon')
			);

		// Group 1 content positions
			$group1_content_position_elements = array(
				'image'           => esc_html__( 'Image', 'wdt-elementor-addon'),
				'icon'            => esc_html__( 'Icon', 'wdt-elementor-addon'),
				'elements_group'  => esc_html__( 'Elements Group', 'wdt-elementor-addon')
			);
			$group1_content_positions = wedesigntech_elementor_format_repeater_values($group1_content_position_elements);

		// Group 1 - Element Group content positions
			$group1_element_group_content_position_elements = array(
				'title'           => esc_html__( 'Name', 'wdt-elementor-addon'),
				'separator_1'     => esc_html__( 'Separator 1', 'wdt-elementor-addon'),
				'sub_title'       => esc_html__( 'Role', 'wdt-elementor-addon')
			);
			$group1_element_group_content_positions = wedesigntech_elementor_format_repeater_values($group1_element_group_content_position_elements);


		// Group 2 content positions
			$group2_content_position_elements = array(
				'description' => esc_html__( 'Description', 'wdt-elementor-addon'),
				'social_icons' => esc_html__( 'Social Icons', 'wdt-elementor-addon'),
				'rating'       => esc_html__( 'Rating', 'wdt-elementor-addon'),
				'elements_group'  => esc_html__( 'Elements Group', 'wdt-elementor-addon')
			);
			$group2_content_positions = wedesigntech_elementor_format_repeater_values($group2_content_position_elements);

		// Group 2 - Element Group content positions
			$group2_element_group_content_position_elements = array(
				'separator_2'     => esc_html__( 'Separator 2', 'wdt-elementor-addon'),
				'button'          => esc_html__( 'Button', 'wdt-elementor-addon')
			);
			$group2_element_group_content_positions = wedesigntech_elementor_format_repeater_values($group2_element_group_content_position_elements);


		// Content position elements
			$other_content_position_elements = array(
				'title_sub_title' => esc_html__( 'Name and Role', 'wdt-elementor-addon')
			);
			$content_position_elements = array_merge($other_content_position_elements, $group1_content_position_elements, $group1_element_group_content_position_elements, $group2_content_position_elements, $group2_element_group_content_position_elements);

		// Module defaults
			$option_defaults = array(
				array(
					'item_type' => 'default',
					'media_image' => array (
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
					'media_image_size' => 'thumbnail',
					'media_icon' => array (
						'value' => 'fas fa-quote-right',
						'library' => 'fa-solid'
					),
					'media_icon_style' => 'default',
					'media_icon_shape' => 'circle',
					'item_title' => esc_html__( 'Ut accumsan mass', 'wdt-elementor-addon' ),
					'item_sub_title' => esc_html__( 'Accumsan mass', 'wdt-elementor-addon' ),
					'item_description' => esc_html__( 'Donec sit amet turpis tincidunt eros, nam porttitor massa leo porta maecenas reque.', 'wdt-elementor-addon' ),
					'item_link'    => array (
						'url' => '#',
						'is_external' => true,
						'nofollow' => true,
						'custom_attributes' => ''
					),
					'item_button_text' => esc_html__( 'Click Here', 'wdt-elementor-addon' ),
					'rating' => 5
				),
				array(
					'item_type' => 'default',
					'media_image' => array (
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
					'media_image_size' => 'thumbnail',
					'media_icon' => array (
						'value' => 'fas fa-quote-right',
						'library' => 'fa-solid'
					),
					'media_icon_style' => 'default',
					'media_icon_shape' => 'circle',
					'item_title' => esc_html__( 'Pellentesque ornare', 'wdt-elementor-addon' ),
					'item_sub_title' => esc_html__( 'Tesque ornare', 'wdt-elementor-addon' ),
					'item_description' => esc_html__( 'Donec sit amet turpis tincidunt eros, nam porttitor massa leo porta maecenas reque.', 'wdt-elementor-addon' ),
					'item_link'    => array (
						'url' => '#',
						'is_external' => true,
						'nofollow' => true,
						'custom_attributes' => ''
					),
					'item_button_text' => esc_html__( 'Click Here', 'wdt-elementor-addon' ),
					'rating' => 5
				)
			);

		// Module Details
			$module_details = array(
				'content_positions'    => array ( 'group1', 'group1_element_group', 'group2', 'group2_element_group', 'title_subtitle_position'),
				'group1_title'         => esc_html__( 'Image Group', 'wdt-elementor-addon'),
				'group2_title'         => esc_html__( 'Content Group', 'wdt-elementor-addon'),
				'group_cp_label'       => esc_html__( 'Content Positions', 'wdt-elementor-addon'),
				'group_eg_cp_label'    => esc_html__( 'Element Group - Content Positions', 'wdt-elementor-addon'),
				'jsSlug'               => 'wdtRepeaterTestimonialContent',
				'title'                => esc_html__( 'Advance Testimonial Items', 'wdt-elementor-addon' ),
				'icon_default_library' => array (
					'value'               => 'fas fa-quote-right',
					'library'             => 'fa-solid'
				),
				'description'          => ''
			);

		// Initialize depandant class
			$this->cc_repeater_contents = new WeDesignTech_Common_Controls_Repeater_Contents($options_group, $options, $option_defaults, $module_details);
			$this->cc_content_position = new WeDesignTech_Common_Controls_Content_Position($content_position_elements, $group1_content_positions, $group1_element_group_content_positions, $group2_content_positions, $group2_element_group_content_positions, $module_details);
			$this->cc_layout = new WeDesignTech_Common_Controls_Layout('both');
			$this->cc_style = new WeDesignTech_Common_Controls_Style();

	}

	public function name() {
		return 'wdt-advanced-testimonial';
	}

	public function title() {
		return esc_html__( 'Advanced Testimonial', 'wdt-elementor-addon' );
	}

	public function icon() {
		return 'eicon-apps';
	}

	public function init_styles() {
		return array_merge(
			$this->cc_layout->init_styles(),
			$this->cc_repeater_contents->init_styles(),
			array (
				$this->name() =>  WEDESIGNTECH_ELEMENTOR_ADDON_DIR_URL.'inc/widgets/testimonial/assets/css/style.css'
			)
		);
	}

	public function init_inline_styles() {
		if(!\Elementor\Plugin::$instance->preview->is_preview_mode()) {
			return array (
				$this->name() => $this->cc_layout->get_column_css()
			);
		}
		return array ();
	}

	public function init_scripts() {
		return array_merge(
			$this->cc_layout->init_scripts(),
			array (
				// 'jquery-swiper' =>  WEDESIGNTECH_ELEMENTOR_ADDON_DIR_URL.'inc/widgets/advanced-testimonial/assets/js/swiper.min.js',
				$this->name() =>  WEDESIGNTECH_ELEMENTOR_ADDON_DIR_URL.'inc/widgets/advanced-testimonial/assets/js/script.js',
			)
		);
	}

	public function create_elementor_controls($elementor_object) {


		$this->cc_repeater_contents->get_controls($elementor_object);

		$elementor_object->start_controls_section( 'wdt_section_settings', array(
			'label' => esc_html__( 'Settings', 'wdt-elementor-addon'),
			));

			$elementor_object->add_control( 'effect', array(
				'label' => esc_html__( 'Effect', 'wdt-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fade',
				'options' => array(
					'fade' 	    => esc_html__( 'Fade', 'wdt-elementor-addon' ),
					'cube' 	    => esc_html__( 'Cube', 'wdt-elementor-addon' ),
					'coverflow' => esc_html__( 'Coverflow', 'wdt-elementor-addon' ),
					'free_mode'	=> esc_html__( 'Free Mode', 'wdt-elementor-addon' )
				),
				'frontend_available' => true
			));

			$elementor_object->add_control( 'centered_slides', array(
				'label' => esc_html__( 'Centered Slides', 'wdt-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => false
			));

			$elementor_object->add_responsive_control(
                'gap',
                array (
                    'label' => esc_html__( 'Gap', 'wdt-elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'default' => array (
                        'size' => 20,
                        'unit' => 'dpt',
                    ),
                    'size_units' => array( 'dpt' ),
                    'range' => array (
                        'dpt' => array(
                            'min' => 0,
                            'step' => 1,
                            'max' => 100
                        )
                    ),
                    'frontend_available' => true,
                )
            );

			$slides_per_view = range( 1, 5 );
			$slides_per_view = array_combine( $slides_per_view, $slides_per_view );

			$elementor_object->add_responsive_control( 'slides_to_show_opts', array(
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Slides to Show (Odd)', 'wdt-elementor-addon' ),
				'options' => $slides_per_view,
				'desktop_default'      => 4,
				'laptop_default'       => 4,
				'tablet_default'       => 2,
				'tablet_extra_default' => 2,
				'mobile_default'       => 1,
				'mobile_extra_default' => 1,
				'frontend_available'   => true,
				
			) );

			$elementor_object->add_responsive_control( 'slides_to_show_even_opts', array(
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Slides to Show (Even)', 'wdt-elementor-addon' ),
				'options' => $slides_per_view,
				'desktop_default'      => 4,
				'laptop_default'       => 4,
				'tablet_default'       => 2,
				'tablet_extra_default' => 2,
				'mobile_default'       => 1,
				'mobile_extra_default' => 1,
				'frontend_available'   => true,
				
			) );

			$elementor_object->add_control( 'arrows', array(
				'label' => esc_html__( 'Arrows', 'wdt-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => true
			) );

			$elementor_object->add_control(
				'arrows_prev_icon',
				array (
					'label' => esc_html__( 'Arrow Prev Icon', 'wdt-elementor-addon' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'label_block' => false,
					'skin' => 'inline',
					'default' => array( 'value' => 'fas fa-arrow-left', 'library' => 'fa-solid', ),
					'condition' => array( 'arrows' => 'yes' )
				)
			);

			$elementor_object->add_control(
				'arrows_next_icon',
				array (
					'label' => esc_html__( 'Arrow Next Icon', 'wdt-elementor-addon' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'label_block' => false,
					'skin' => 'inline',
					'default' => array( 'value' => 'fas fa-arrow-right', 'library' => 'fa-solid', ),
					'condition' => array( 'arrows' => 'yes' )
				)
			);

			$elementor_object->add_control( 'allow_touch', array(
				'label' => esc_html__( 'Allow Touch', 'wdt-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => true
			));
			
			$elementor_object->add_control( 'speed', array(
				'label' => esc_html__( 'Transition Duration', 'wdt-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 300,
				'frontend_available' => true
			));

		$elementor_object->end_controls_section();

		// Item
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'item',
			'title' => esc_html__( 'Item', 'wdt-elementor-addon' ),
			'styles' => array (
				'alignment' => array (
					'field_type' => 'alignment',
                    'control_type' => 'responsive',
                    'default' => 'center',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item' => 'text-align: {{VALUE}}; justify-content: {{VALUE}}; justify-items: {{VALUE}};'
					),
					'condition' => array ()
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item, {{WRAPPER}} .wdt-content-item .wdt-content-title h5, {{WRAPPER}} .wdt-content-item .wdt-content-title h5 > a, {{WRAPPER}} .wdt-content-item .wdt-content-subtitle, {{WRAPPER}} .wdt-content-item .wdt-social-icons-list li a, {{WRAPPER}} .wdt-content-item .wdt-rating li span, {{WRAPPER}} .wdt-content-item ul li, {{WRAPPER}} .wdt-content-item span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover, {{WRAPPER}} .wdt-content-item:hover .wdt-content-title h5, {{WRAPPER}} .wdt-content-item:hover .wdt-content-title h5 > a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-subtitle, {{WRAPPER}} .wdt-content-item:hover .wdt-social-icons-list li a, {{WRAPPER}} .wdt-content-item:hover .wdt-rating li span, {{WRAPPER}} .wdt-content-item:hover ul li, {{WRAPPER}} .wdt-content-item:hover span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));

		// Name
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'name',
			'title' => esc_html__( 'Name', 'wdt-elementor-addon' ),
			'styles' => array (
				'typography' => array (
					'field_type' => 'typography',
					'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-title h5',
					'condition' => array ()
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-title-group, {{WRAPPER}} .wdt-content-item div:not(.wdt-content-title-group) .wdt-content-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-title h5, {{WRAPPER}} .wdt-content-item .wdt-content-title h5 > a' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-title h5, {{WRAPPER}} .wdt-content-item:hover .wdt-content-title h5 > a:hover, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group:hover .wdt-content-title h5 > a:hover, .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-cover > .wdt-media-image-cover-container > div h5 > a:hover, .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-overlay > .wdt-media-image-overlay-container > div h5 > a:hover' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						)
					)
				)
			)
		));

		// Role
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'role',
			'title' => esc_html__( 'Role', 'wdt-elementor-addon' ),
			'styles' => array (
				'typography' => array (
					'field_type' => 'typography',
					'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-subtitle',
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-subtitle' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-subtitle' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						)
					)
				)
			)
		));

		// Image
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'image',
			'title' => esc_html__( 'Image', 'wdt-elementor-addon' ),
			'styles' => array (
				'alignment' => array (
					'field_type' => 'alignment',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item .wdt-content-image-wrapper .wdt-content-image' => 'text-align: {{VALUE}}; justify-content: {{VALUE}}; justify-items: {{VALUE}};'
					),
					'condition' => array ()
				),
				'width' => array (
					'field_type' => 'width',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > a' => 'width: {{SIZE}}{{UNIT}};',

                        '{{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-side-image .wdt-content-item .wdt-content-media-group .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-side-image .wdt-content-item .wdt-content-media-group .wdt-content-image-wrapper .wdt-content-image, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-side-image .wdt-content-item .wdt-content-media-group .wdt-content-image-wrapper .wdt-content-image > a, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-side-image .wdt-content-item .wdt-content-media-group .wdt-content-image-wrapper .wdt-content-image > span,

						{{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-content .wdt-content-item .wdt-content-group .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-content .wdt-content-item .wdt-content-group .wdt-content-image-wrapper .wdt-content-image, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-content .wdt-content-item .wdt-content-group .wdt-content-image-wrapper .wdt-content-image > a, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-content .wdt-content-item .wdt-content-group .wdt-content-image-wrapper .wdt-content-image > span,

						{{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-title .wdt-content-item .wdt-content-group .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-title .wdt-content-item .wdt-content-group .wdt-content-image-wrapper .wdt-content-image, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-title .wdt-content-item .wdt-content-group .wdt-content-image-wrapper .wdt-content-image > a, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-title .wdt-content-item .wdt-content-group .wdt-content-image-wrapper .wdt-content-image > span,

						{{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-icon .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-icon .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper .wdt-content-image, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-icon .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper .wdt-content-image > a, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-aside-icon .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper .wdt-content-image > span,

						{{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-duotone .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-duotone .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper .wdt-content-image, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-duotone .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper .wdt-content-image > a, {{WRAPPER}} .wdt-content-item-holder.wdt-rc-template-duotone .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group .wdt-content-image-wrapper .wdt-content-image > span' => 'min-width: {{SIZE}}{{UNIT}};'
                    ),
					'condition' => array ()
				),
				'height' => array (
					'field_type' => 'height',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > a' => 'height: {{SIZE}}{{UNIT}};',

                        '{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-elements-group.wdt-media-image-cover .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-elements-group.wdt-media-image-cover .wdt-content-image-wrapper .wdt-content-image > a,
						{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-elements-group.wdt-media-image-overlay .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-elements-group.wdt-media-image-overlay .wdt-content-image-wrapper .wdt-content-image > a' => 'height: {{SIZE}}{{UNIT}}; margin-top: auto; margin-bottom: auto;',

						'{{WRAPPER}} .wdt-rc-template-stage-over .wdt-content-item .wdt-content-media-group .wdt-content-image-wrapper' => 'font-size: {{SIZE}}{{UNIT}};'
                    ),
					'condition' => array ()
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-image-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'border' => array (
					'field_type' => 'border',
					'selector' => '{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > a',
					'condition' => array ()
				),
				'border_radius' => array (
					'field_type' => 'border_radius',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'box_shadow' => array (
					'field_type' => 'box_shadow',
					'selector' => '{{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > span, {{WRAPPER}} .wdt-content-item-holder .wdt-content-item .wdt-content-image-wrapper .wdt-content-image > a',
					'condition' => array ()
				)
			)
		));

		// Icon
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'icon',
			'title' => esc_html__( 'Icon', 'wdt-elementor-addon' ),
			'styles' => array (
				'font_size' => array (
					'field_type' => 'font_size',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span' => 'font-size: {{SIZE}}{{UNIT}};'
                    ),
					'condition' => array ()
				),
				'width' => array (
					'field_type' => 'width',
					'default' => array (
						'unit' => 'px'
					),
					'size_units' => array ( 'px' ),
					'range' => array (
                        'px' => array (
                            'min' => 10,
                            'max' => 500,
                        )
                    ),
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span' => 'width: {{SIZE}}{{UNIT}};'
					)
				),
				'height' => array (
					'field_type' => 'height',
					'default' => array (
						'unit' => 'px'
					),
					'size_units' => array ( 'px' ),
					'range' => array (
                        'px' => array (
                            'min' => 10,
                            'max' => 500,
                        )
                    ),
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span' => 'height: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .wdt-rc-template-default .wdt-content-item .wdt-content-media-group .wdt-content-image-wrapper + .wdt-content-icon-wrapper,
						{{WRAPPER}} .wdt-rc-template-ico-boxed-overlap .wdt-content-item .wdt-content-detail-group .wdt-content-group .wdt-content-icon-wrapper,
						{{WRAPPER}} .wdt-rc-template-ico-stage-over .wdt-content-item .wdt-content-media-group .wdt-media-group .wdt-content-icon-wrapper,
						{{WRAPPER}} .wdt-rc-template-ico-side-overlap .wdt-content-item .wdt-content-media-group .wdt-content-icon-wrapper' => 'font-size: {{SIZE}}{{UNIT}};',

						'{{WRAPPER}} .wdt-rc-template-ico-boxed-overlap .wdt-content-item' => 'margin-top: calc({{SIZE}}{{UNIT}} / 2);',

						'{{WRAPPER}} .wdt-rc-template-ico-side-overlap .wdt-content-item' => 'margin-left: calc({{SIZE}}{{UNIT}} / 2);',

						'{{WRAPPER}} .wdt-rc-template-ico-side-overlap .wdt-content-item .wdt-content-media-group .wdt-content-icon-wrapper' => 'margin-left: calc({{SIZE}}{{UNIT}} / -2);'
					)
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'tabs_default' => array (
					'field_type' => 'tabs',
					'unique_key' => 'default',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}}  .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-icon-wrapper .wdt-content-icon span',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-icon-wrapper .wdt-content-icon span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-icon-wrapper .wdt-content-icon span',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-icon-wrapper .wdt-content-icon span',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-icon-wrapper .wdt-content-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-icon-wrapper .wdt-content-icon span',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));

		// Arrow
		$this->cc_layout->get_carousel_style_controls($elementor_object, array ('layout' => 'carousel'));

		// Description
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'description',
			'title' => esc_html__( 'Description', 'wdt-elementor-addon' ),
			'styles' => array (
				'typography' => array (
					'field_type' => 'typography',
					'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-description',
					'condition' => array ()
				),
				'alignment' => array (
					'field_type' => 'alignment',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-description' => 'text-align: {{VALUE}}; justify-content: {{VALUE}}; justify-items: {{VALUE}};'
					),
					'condition' => array ()
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-description' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-description',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-description',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-description' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-description',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-description' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-description',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-description',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-description' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-description',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));

		// Button
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'button',
			'title' => esc_html__( 'Button', 'wdt-elementor-addon' ),
			'styles' => array (
				'typography' => array (
					'field_type' => 'typography',
					'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-button > a',
					'condition' => array ()
				),
				'alignment' => array (
					'field_type' => 'alignment',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-button' => 'text-align: {{VALUE}}; justify-content: {{VALUE}}; justify-items: {{VALUE}};'
					),
					'condition' => array ()
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-button > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-button > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-button > a' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-button > a',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-button > a',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-button > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-button > a',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:focus, {{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:hover' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:focus, {{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:hover',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:focus, {{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:hover',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:focus, {{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:focus, {{WRAPPER}} .wdt-content-item:hover .wdt-content-button > a:hover',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));

		// Social Icons
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'socialicons',
			'title' => esc_html__( 'Social Icons', 'wdt-elementor-addon' ),
			'styles' => array (
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-social-icons-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-social-icons-list li a' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-social-icons-list li:hover a, {{WRAPPER}} .wdt-content-item:hover .wdt-social-icons-list li a:hover, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group:hover .wdt-social-icons-list li:hover a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group:hover .wdt-social-icons-list li a:hover, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-cover > .wdt-media-image-cover-container .wdt-social-icons-list li:hover a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-cover > .wdt-media-image-cover-container .wdt-social-icons-list li a:hover, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-overlay > .wdt-media-image-overlay-container .wdt-social-icons-list li:hover a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-overlay > .wdt-media-image-overlay-container .wdt-social-icons-list li a:hover' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						)
					)
				)
			)
		));

		// Ratings
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'ratings',
			'title' => esc_html__( 'Ratings', 'wdt-elementor-addon' ),
			'styles' => array (
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-rating-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-rating li span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-rating li span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
							)
						)
					)
				)
			)
		));

        // Separator
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'separator',
			'title' => esc_html__( 'Separator', 'wdt-elementor-addon' ),
			'styles' => array (
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-separator.separator-1 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
                'width' => array (
					'field_type' => 'width',
					'default' => array (
						'unit' => '%'
					),
					'size_units' => array ( '%', 'px' ),
					'range' => array (
                        '%' => array (
                            'min' => 0,
                            'max' => 100,
                        ),
                        'px' => array (
                            'min' => 10,
                            'max' => 500,
                        )
                    ),
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-separator.separator-1 span' => 'width: {{SIZE}}{{UNIT}};'
					)
				),
				'height' => array (
					'field_type' => 'height',
					'default' => array (
						'unit' => 'px'
					),
					'size_units' => array ( '%', 'px' ),
					'range' => array (
                        '%' => array (
                            'min' => 0,
                            'max' => 100,
                        ),
                        'px' => array (
                            'min' => 10,
                            'max' => 500,
                        )
                    ),
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-separator.separator-1 span' => 'height: {{SIZE}}{{UNIT}};'
					)
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
                                'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-separator.separator-1 span',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
                                'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-separator.separator-1 span',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));

		// Elements Group - Image
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'group1_elementsgroup',
			'title' => esc_html__( 'Elements Group - Image', 'wdt-elementor-addon' ),
			'styles' => array (
				'media_image_type' => array (
					'field_type' => 'media_image_type',
					'options' => array(
						'default' => esc_html__( 'Default', 'wdt-elementor-addon' ),
						'cover' => esc_html__( 'Cover', 'wdt-elementor-addon' ),
						'overlay' => esc_html__( 'Overlay', 'wdt-elementor-addon' ),
                    ),
					'condition' => array (
						'template' => array ('default', 'custom-template')
					)
				),
				'alignment' => array (
					'field_type' => 'alignment',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-image-cover > .wdt-media-image-cover-container, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-image-overlay > .wdt-media-image-overlay-container' => 'text-align: {{VALUE}}; justify-content: {{VALUE}}; justify-items: {{VALUE}};'
					),
					'condition' => array ()
				),
                'vertical_align_image_eg' => array (
                    'field_type' => 'vertical_align',
                    'unique_key' => 'image_eg',
                    'label' => esc_html__( 'Vertical Position', 'wdt-elementor-addon' ),
                    'options' => array (
                        'flex-start' => array (
                            'title' => esc_html__( 'Top', 'wdt-elementor-addon' ),
                            'icon' => 'eicon-v-align-top',
                        ),
                        'flex-end' => array (
                            'title' => esc_html__( 'Bottom', 'wdt-elementor-addon' ),
                            'icon' => 'eicon-v-align-bottom',
                        )
                    ),
                    'default' => 'middle',
                    'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-media-image-overlay > .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item .wdt-media-image-overlay > .wdt-media-image-overlay-container, {{WRAPPER}} .wdt-content-item .wdt-media-image-cover > .wdt-content-image-wrapper, {{WRAPPER}} .wdt-content-item .wdt-media-image-cover > .wdt-media-image-cover-container' => 'align-content: {{VALUE}};',
                    ),
                    'condition' => array (
						'media_image_type' => array ('cover', 'overlay')
					)
                ),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group .wdt-content-title h5, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group .wdt-content-title h5 > a, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group .wdt-content-subtitle, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group .wdt-social-icons-list li a, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group .wdt-rating li span, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group ul li, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group:not(.wdt-media-image-cover):not(.wdt-media-image-overlay), {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-image-cover .wdt-content-image-wrapper:before, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-image-overlay .wdt-content-image-wrapper:before, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-image-cover .wdt-content-image-wrapper:after, .wdt-rc-template-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:before, .wdt-rc-template-ico-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:before',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group, .wdt-rc-template-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:before, .wdt-rc-template-ico-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:before',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-media-group, .wdt-rc-template-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:before, .wdt-rc-template-ico-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:before',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group .wdt-content-title h5, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group .wdt-content-title h5 > a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group .wdt-content-subtitle, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group .wdt-social-icons-list li a:hover, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group .wdt-rating li span, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group ul li, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group:not(.wdt-media-image-cover):not(.wdt-media-image-overlay), {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-cover .wdt-content-image-wrapper:before, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-overlay .wdt-content-image-wrapper:before, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-image-cover .wdt-content-image-wrapper:after, .wdt-rc-template-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:after, .wdt-rc-template-ico-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:after',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group, .wdt-rc-template-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:after, .wdt-rc-template-ico-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:after',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-media-group, .wdt-rc-template-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:after, .wdt-rc-template-ico-minimal .wdt-content-item .wdt-content-media-group .wdt-content-elements-group.wdt-media-group:after',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));

		// Elements Group - Content
		$this->cc_style->get_style_controls($elementor_object, array (
			'slug' => 'group2_elementsgroup',
			'title' => esc_html__( 'Elements Group - Content', 'wdt-elementor-addon' ),
			'styles' => array (
				'alignment' => array (
					'field_type' => 'alignment',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group' => 'text-align: {{VALUE}}; justify-content: {{VALUE}}; justify-items: {{VALUE}};'
					),
					'condition' => array ()
				),
				'margin' => array (
					'field_type' => 'margin',
					'selector' => array (
                        '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
					'condition' => array ()
				),
				'padding' => array (
					'field_type' => 'padding',
					'selector' => array (
						'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition' => array ()
				),
				'tabs' => array (
					'field_type' => 'tabs',
					'tab_items' => array (
						'normal' => array (
							'title' => esc_html__( 'Normal', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group .wdt-content-title h5, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group .wdt-content-title h5 > a, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group .wdt-content-subtitle, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group .wdt-social-icons-list li a, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group .wdt-rating li span, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group ul li, {{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item .wdt-content-elements-group.wdt-content-group',
									'condition' => array ()
								)
							)
						),
						'hover' => array (
							'title' => esc_html__( 'Hover', 'wdt-elementor-addon' ),
							'styles' => array (
								'color' => array (
									'field_type' => 'color',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group .wdt-content-title h5, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group .wdt-content-title h5 > a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group .wdt-content-subtitle, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group .wdt-social-icons-list li a, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group .wdt-rating li span, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group ul li, {{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group span' => 'color: {{VALUE}};'
									),
									'condition' => array ()
								),
								'background' => array (
									'field_type' => 'background',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group',
									'condition' => array ()
								),
								'border' => array (
									'field_type' => 'border',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group',
									'condition' => array ()
								),
								'border_radius' => array (
									'field_type' => 'border_radius',
									'selector' => array (
										'{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
									'condition' => array ()
								),
								'box_shadow' => array (
									'field_type' => 'box_shadow',
									'selector' => '{{WRAPPER}} .wdt-content-item:hover .wdt-content-elements-group.wdt-content-group',
									'condition' => array ()
								)
							)
						)
					)
				)
			)
		));
	}

	public function get_advanced_testimonial_swiper_attributes($settings) {

		$default_breakpoints = array(
			'desktop'       => 4,
			'laptop'        => 4,
			'tablet'        => 2,
			'tablet_extra'  => 2,
			'mobile'        => 1,
			'mobile_extra'  => 1,
			'widescreen'    => 4,
		);
	
		// Carousel settings
		$carousel_settings = array(
			'effect'               => $settings['effect'],
			'slides_to_show'       => $settings['slides_to_show_opts'],
			'slides_to_even_show'  => $settings['slides_to_show_even_opts'],
			'arrows'               => $settings['arrows'],
			'speed'                => $settings['speed'],
			'allow_touch'          => $settings['allow_touch'],
			'centered_slides'      => $settings['centered_slides'],
			'gap'                  => isset($settings['gap']['size']) ? $settings['gap']['size'] : 20,
		);

		$active_breakpoints = \Elementor\Plugin::$instance->breakpoints->get_active_breakpoints();
        $swiper_breakpoints = array();

        foreach ($active_breakpoints as $key => $breakpoint) {
            $breakpoint_show_odd = $settings["slides_to_show_opts_$key"] ?? $default_breakpoints[$key] ?? 4;
            $breakpoint_gap_odd = isset($settings["gap_$key"]['size']) 
                ? $settings["gap_$key"]['size'] 
                : $carousel_settings['gap'];

            $swiper_breakpoints['odd'][$breakpoint->get_value()] = array(
                'slidesToShow' => (int) $breakpoint_show_odd,
                'gap' => $breakpoint_gap_odd,
            );

            $breakpoint_show_even = $settings["slides_to_show_even_opts_$key"] ?? $default_breakpoints[$key] ?? 4;
            $breakpoint_gap_even = isset($settings["gap_$key"]['size']) 
                ? $settings["gap_$key"]['size'] 
                : $carousel_settings['gap'];

            $swiper_breakpoints['even'][$breakpoint->get_value()] = array(
                'slidesToShow' => (int) $breakpoint_show_even,
                'gap' => $breakpoint_gap_even,
            );
        }

        return array(
            'carousel_settings' => $carousel_settings,
            'breakpoints'       => $swiper_breakpoints,
        );
	}
	


	public function render_html($widget_object, $settings) {

		if ($widget_object->widget_type != 'elementor') {
			return;
		}
	
		$output = '';

		$settings['module_id'] = $widget_object->get_id();
		$settings['module_class'] = 'testimonial-swiper-';
		$settings_attr = $this->get_advanced_testimonial_swiper_attributes($settings);

		$output .= '<div class="wdt-advance-testimonial-swiper-holder" data-settings="' .  esc_attr(json_encode($settings_attr)) . '">';
		$output .= sprintf(
			'<div class="swiper-carousels wdt-%s%s" data-id="%s" data-wrapper-class="wdt-%s%s">',
			esc_attr($settings['module_class']),
			esc_attr($settings['module_id']),
			esc_attr($settings['module_id']),
			esc_attr($settings['module_class']),
			esc_attr($settings['module_id'])
		);
	
		$output_odd_swiper = ''; 
		$output_even_swiper = '';

		if (isset($settings['item_contents']) && is_array($settings['item_contents']) && !empty($settings['item_contents'])) {
			foreach ($settings['item_contents'] as $index => $item) {

				$output_odd_swiper .= '<div class="swiper-slide">';
				$output_odd_swiper .= sprintf(
					'<div class="wdt-testimonial-swiper-container" id="wdt-testimonial-swiper-index-%s">',
					esc_attr($index)
				);
				$output_odd_swiper .= '<div class="wdt-testimonial-swiper-info">';
	
				if (!empty($item['item_description'])) {
					$output_odd_swiper .= '<div class="wdt-testimonial-swiper-content">' . esc_html($item['item_description']) . '</div>';
				}
				if (!empty($item['item_title'])) {
					$output_odd_swiper .= '<h4 class="wdt-testimonial-swiper-title">' . esc_html($item['item_title']) . '</h4>';
				}
				if (!empty($item['item_sub_title'])) {
					$output_odd_swiper .= '<h6 class="wdt-testimonial-swiper-sub-title">' . esc_html($item['item_sub_title']) . '</h6>';
				}
	
				$output_odd_swiper .= '</div>';
				$output_odd_swiper .= '</div>';
				$output_odd_swiper .= '</div>';
	
				// Even swiper content
				$output_even_swiper .= '<div class="swiper-slide">';
				$output_even_swiper .= '<div class="wdt-thumb-slider-image">';
				if (!empty($item['media_image']['url'])) {
					$output_even_swiper .= sprintf('<img src="%s" alt="">', esc_url($item['media_image']['url']));
				}
				$output_even_swiper .= '</div>';
				$output_even_swiper .= '</div>';
			}
		} else {

			$output .= '<div class="wdt-testimonial-container no-records">';
			$output .= esc_html__('No records found!', 'wdt-elementor-addon');
			$output .= '</div>';
		}
	
		$output .= '<div class="swiper slider-odd">';
		$output .= '<div class="swiper-wrapper">' . $output_odd_swiper . '</div>';
		$output .= '</div>';

		$output .= '<div class="swiper-navigation-wrapper">';
		$output .= '<div class="swiper-prev-button swiper-prev-button-even"></div>';
		$output .= '<div class="swiper-next-button swiper-next-button-even"></div>';
		$output .= '</div>';

		$output .= '<div class="swiper slider-even">';
		$output .= '<div class="swiper-wrapper">' . $output_even_swiper . '</div>';
		$output .= '</div>';
	
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
	

}

if( !function_exists( 'wedesigntech_widget_base_advancetestimonial' ) ) {
    function wedesigntech_widget_base_advancetestimonial() {
        return WeDesignTech_Widget_Base_AdvanceTestimonial::instance();
    }
}