<?php

namespace MrBlackElementor\Widgets;
use MrBlackElementor\Widgets\MrBlack_Shop_Widget_Product_Summary;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;


class MrBlack_Shop_Widget_Product_Summary_Extend extends MrBlack_Shop_Widget_Product_Summary {

	function dynamic_register_controls() {

		$this->start_controls_section( 'product_summary_extend_section', array(
			'label' => esc_html__( 'Social Options', 'mrblack-pro' ),
		) );

			$this->add_control( 'share_follow_type', array(
				'label'   => esc_html__( 'Share / Follow Type', 'mrblack-pro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'share',
				'options' => array(
					''       => esc_html__('None', 'mrblack-pro'),
					'share'  => esc_html__('Share', 'mrblack-pro'),
					'follow' => esc_html__('Follow', 'mrblack-pro'),
				),
				'description' => esc_html__( 'Choose between Share / Follow you would like to use.', 'mrblack-pro' ),
			) );

			$this->add_control( 'social_icon_style', array(
				'label'   => esc_html__( 'Social Icon Style', 'mrblack-pro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					'simple'        => esc_html__( 'Simple', 'mrblack-pro' ),
					'bgfill'        => esc_html__( 'BG Fill', 'mrblack-pro' ),
					'brdrfill'      => esc_html__( 'Border Fill', 'mrblack-pro' ),
					'skin-bgfill'   => esc_html__( 'Skin BG Fill', 'mrblack-pro' ),
					'skin-brdrfill' => esc_html__( 'Skin Border Fill', 'mrblack-pro' ),
				),
				'description' => esc_html__( 'This option is applicable for all buttons used in product summary.', 'mrblack-pro' ),
				'condition'   => array( 'share_follow_type' => array ('share', 'follow') )
			) );

			$this->add_control( 'social_icon_radius', array(
				'label'   => esc_html__( 'Social Icon Radius', 'mrblack-pro' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					'square'  => esc_html__( 'Square', 'mrblack-pro' ),
					'rounded' => esc_html__( 'Rounded', 'mrblack-pro' ),
					'circle'  => esc_html__( 'Circle', 'mrblack-pro' ),
				),
				'condition'   => array(
					'social_icon_style' => array ('bgfill', 'brdrfill', 'skin-bgfill', 'skin-brdrfill'),
					'share_follow_type' => array ('share', 'follow')
				),
			) );

			$this->add_control( 'social_icon_inline_alignment', array(
				'label'        => esc_html__( 'Social Icon Inline Alignment', 'mrblack-pro' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'yes', 'mrblack-pro' ),
				'label_off'    => esc_html__( 'no', 'mrblack-pro' ),
				'default'      => '',
				'return_value' => 'true',
				'description'  => esc_html__( 'This option is applicable for all buttons used in product summary.', 'mrblack-pro' ),
				'condition'   => array( 'share_follow_type' => array ('share', 'follow') )
			) );

		$this->end_controls_section();

	}

}