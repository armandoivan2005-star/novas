<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WeDesignTech_Widget_Base_Flex_Banner {

	private static $_instance = null;
	private $cc_style;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

    function __construct() {
		// Initialize depandant class
		$this->cc_style = new WeDesignTech_Common_Controls_Style();
	}

    public function name() {
		return 'wdt-flex-banner';
	}

	public function title() {
		return esc_html__( 'Flex Banner', 'wdt-elementor-addon' );
	}

	public function icon() {
		return 'eicon-apps';
	}

    public function init_styles() {
		return array (
				$this->name() =>  WEDESIGNTECH_ELEMENTOR_ADDON_DIR_URL.'inc/widgets/flex-banner/assets/css/style.css'
			);
	}

	public function init_inline_styles() {
		return array ();
	}

	public function init_scripts() {
		return array (
			$this->name() => WEDESIGNTECH_ELEMENTOR_ADDON_DIR_URL.'inc/widgets/flex-banner/assets/js/script.js'
		);
	}

    public function create_elementor_controls($elementor_object) {

        $elementor_object->start_controls_section( 'wdt_section_features', array(
        'label' => esc_html__( 'Content', 'wdt-elementor-addon'),
        ) );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'list_title',
                array(
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'label' => esc_html__( 'Title', 'wdt-elementor-addon' ),
                    'default' => 'Sample Title'
                )
            );

            $repeater->add_control(
                'list_icon',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'far fa-paper-plane', 'library' => 'fa-regular' )
                )
            );

            $repeater->add_control(
                'list_sub_title',
                array(
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'label' => esc_html__( 'Sub Title', 'wdt-elementor-addon' ),
                    'default' => 'Sample Sub Title'
                )
            );

            $repeater->add_control(
                'list_content',
                array(
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'label' => esc_html__( 'Description', 'wdt-elementor-addon' ),
                    'default' => 'Sample Description'
                )
            );

            $repeater->add_control( 'flexbanner_1_item', array(
                'label'       => esc_html__( 'Specifications Item 1', 'wdt-elementor-addon' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Specifications item 1 goes here', 'wdt-elementor-addon' ),
                'default'	  => esc_html__('Item 1', 'wdt-elementor-addon'),
                'condition'   => array ()
            ) );

            $repeater->add_control(
                'list_icon_1',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Specifications item 1 Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' )
                )
            );
    
            $repeater->add_control( 'flexbanner_2_item', array(
                'label'       => esc_html__( 'Specifications Item 2', 'wdt-elementor-addon' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Specifications item 2 goes here', 'wdt-elementor-addon' ),
                'default'	  => esc_html__('Item 2', 'wdt-elementor-addon'),
                'condition'   => array ()
            ) );

            $repeater->add_control(
                'list_icon_2',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Specifications item 2 Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' )
                )
            );
    
            $repeater->add_control( 'flexbanner_3_item', array(
                'label'       => esc_html__( 'Specifications Item 3', 'wdt-elementor-addon' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Specifications item 3 goes here', 'wdt-elementor-addon' ),
                'default'	  => esc_html__('Item 3', 'wdt-elementor-addon'),
                'condition'   => array ()
            ) );

            $repeater->add_control(
                'list_icon_3',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Specifications item 3 Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' )
                )
            );

            $repeater->add_control( 'flexbanner_4_item', array(
                'label'       => esc_html__( 'Specifications Item 4', 'wdt-elementor-addon' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Specifications item 4 goes here', 'wdt-elementor-addon' ),
                'default'	  => esc_html__('Item 4', 'wdt-elementor-addon'),
                'condition'   => array ()
            ) );

            $repeater->add_control(
                'list_icon_4',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Specifications item 4 Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' )
                )
            );

            $repeater->add_control( 'flexbanner_5_item', array(
                'label'       => esc_html__( 'Specifications Item 5', 'wdt-elementor-addon' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Specifications item 5 goes here', 'wdt-elementor-addon' ),
                'default'	  => esc_html__('Item 5', 'wdt-elementor-addon'),
                'condition'   => array ()
            ) );

            $repeater->add_control(
                'list_icon_5',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Specifications item 5 Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' )
                )
            );

            $repeater->add_control( 'flexbanner_6_item', array(
                'label'       => esc_html__( 'Specifications Item 6', 'wdt-elementor-addon' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Specifications item 6 goes here', 'wdt-elementor-addon' ),
                'default'	  => esc_html__('Item 6', 'wdt-elementor-addon'),
                'condition'   => array ()
            ) );

            $repeater->add_control(
                'list_icon_6',
                array(
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label' => esc_html__( 'Specifications item 6 Icon', 'wdt-elementor-addon' ),
                    'default' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' )
                )
            );

            $repeater->add_control(
                'button',
                array(
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'label' => esc_html__( 'Button text', 'wdt-elementor-addon' ),
                    'default' => 'Click Here'
                )
            );

            $repeater->add_control(
                'image',
                array(
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label' => esc_html__( 'Image', 'wdt-elementor-addon' ),
                    'default' => array(
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ),
                )
            );

            $repeater->add_control(
                'button_link', 
                array(
                        'label' => esc_html__( 'Link', 'wdt-elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'wdt-elementor-addon' ),
                        'options' => array( 'url', 'is_external', 'nofollow' ),
                        'default' => array(
                            'url' => '#',
                            'is_external' => false,
                            'nofollow' => false,
                        
                        ),
                        'label_block' => true,
                )
            );

            $elementor_object->add_control( 'features_content', array(
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'label'       => esc_html__('Banner Items', 'wdt-elementor-addon'),
                'description' => esc_html__('Banner Items', 'wdt-elementor-addon' ),
                'fields'      => $repeater->get_controls(),
                'default' => array (
                    array (
                        'list_title'     => esc_html__('Sed ut perspiciatis', 'wdt-elementor-addon' ),
                        'list_sub_title'     => esc_html__('Unde omnis iste', 'wdt-elementor-addon' ),
                        'list_content'     => esc_html__('when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.', 'wdt-elementor-addon' ),
                        'list_icon' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' ),
                        'button' => esc_html__('Click Here', 'wdt-elementor-addon' ),
                        'button_link' => array( 'value' => '#' )
                    ),
                    array (
                        'list_title'     => esc_html__('Lorem ipsum dolor', 'wdt-elementor-addon' ),
                        'list_sub_title'     => esc_html__('Nemo enim ipsam', 'wdt-elementor-addon' ),
                        'list_content'     => esc_html__('He lay on his armour-like back, and if he lifted his head a little he could see his brown belly', 'wdt-elementor-addon' ),
                        'list_icon' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' ),
                        'button' => esc_html__('Click Here', 'wdt-elementor-addon' ),
                        'button_link' => array( 'value' => '#' )
                    ),
                    array (
                        'list_title'     => esc_html__('Li Europan lingues', 'wdt-elementor-addon' ),
                        'list_sub_title'     => esc_html__('The European languages', 'wdt-elementor-addon' ),
                        'list_content'     => esc_html__('The bedding was hardly able to cover it and seemed ready to slide off any moment.', 'wdt-elementor-addon' ),
                        'list_icon' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' ),
                        'button' => esc_html__('Click Here', 'wdt-elementor-addon' ),
                        'button_link' => array( 'value' => '#' )
                    ),
                    array (
                        'list_title'     => esc_html__('Far far away', 'wdt-elementor-addon' ),
                        'list_sub_title'     => esc_html__('One morning, when', 'wdt-elementor-addon' ),
                        'list_content'     => esc_html__('His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked.', 'wdt-elementor-addon' ),
                        'list_icon' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' ),
                        'button' => esc_html__('Click Here', 'wdt-elementor-addon' ),
                        'button_link' => array( 'value' => '#' )
                    ),
                    array (
                        'list_title'     => esc_html__('A wonderful serenity', 'wdt-elementor-addon' ),
                        'list_sub_title'     => esc_html__('The quick, brown', 'wdt-elementor-addon' ),
                        'list_content'     => esc_html__('Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', 'wdt-elementor-addon' ),
                        'list_icon' => array( 'value' => 'fas fa-check', 'library' => 'fa-solid' ),
                        'button' => esc_html__('Click Here', 'wdt-elementor-addon' ),
                        'button_link' => array( 'value' => '#' )
                    )
                 
                ),
                'title_field' => '{{{list_title}}}'
            ) );

        $elementor_object->end_controls_section();

        $elementor_object->start_controls_section( 'wdt_section_settings', array(
        'label' => esc_html__( 'Settings', 'wdt-elementor-addon'),
        ));
    
            $elementor_object->add_control( 'animation_slider', array(
                'label'        => esc_html__( 'Show slider on hover', 'wdt-elementor-addon' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'No',
            ) );

            $elementor_object->add_control( 'vertical_slider', array(
                'label'        => esc_html__( 'Vertical slider', 'wdt-elementor-addon' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'No',
            ) );

            $elementor_object->add_responsive_control(
                'flex-height',
                array(
                    'label' => esc_html__( 'Banner Height', 'wdt-elementor-addon' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => array('px', '%', 'em', 'rem', 'custom'),
                    'range' => array(
                        'px' => array(
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ),
                        '%' => array(
                            'min' => 0,
                            'max' => 100,
                        ),
                    ),
                    'default' => array(
                        'unit' => 'px',
                        'size' => 600,
                    ),
                    'selectors' => array(
                        '{{WRAPPER}} .wdt-flex-banner-option' => 'min-height: {{SIZE}}{{UNIT}};',
                    ),
                )
            );
    
        $elementor_object->end_controls_section();

    }

    public function render_html($widget_object, $settings) {

		if($widget_object->widget_type != 'elementor') {
			return;
		}

		$output = '';
        $animation_settings = array (
            'option' => $settings['animation_slider'],
        );

        $vertical_slider_settings = $settings['vertical_slider'];
        $vertical_slider_item = $vertical_slider_settings == 'yes' ? "vertical-slider" : '';

        $output .= ' <div class="wdt-flex-banner-options '.esc_attr($vertical_slider_item).'" id="wdt-animation-'.esc_attr($widget_object->get_id()).'" data-settings="'.esc_js(wp_json_encode($animation_settings)).'"  >';
   
            foreach ( $settings['features_content'] as $index => $item ) :
                    $img_output = '';
                    $class = ($index == 0) ? 'active' : '';
                    $img_output .= esc_url( $item['image']['url'] );
                    $output .= '  <div class="wdt-flex-banner-option ' . $class .'" style="--optionBackground:url(' . $img_output . ');">';

                    if($vertical_slider_settings == "yes") {

                        $output .= '<div class="wdt-flex-banner-title-group">';
                         $output .= '<div class="wdt-flex-banner-title-wrapper">';

                            if(isset($item['list_title']) && !empty($item['list_title'])) {
                                $output .= '<div class="wdt-flex-banner-title">' . $item['list_title'] . '</div>';
                            }
                            
                            if(isset($item['list_icon']['value'])) {
                                $output .= ' <div class="wdt-flex-banner-icon">';
                                    ob_start();
                                    \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] );
                                    $contents = ob_get_contents();
                                    ob_end_clean();
                                    $output .= $contents;
                                $output .= ' </div>';
                            }
                         $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="wdt-flex-banner-detail-group">';

                            $output .= '<div class="wdt-flex-banner-element-group">';

                                if(isset($item['list_content']) && !empty($item['list_content'])) {
                                    $output .= '<div class="wdt-flex-banner-content">' . $item['list_content'] . '</div>';
                                }

                                if( !empty($item['flexbanner_1_item']) || !empty($item['flexbanner_2_item']) || !empty($item['flexbanner_3_item']) || !empty($item['flexbanner_4_item']) || !empty($item['flexbanner_5_item']) || !empty($item['flexbanner_6_item'])) {
                                    $output .= '<div class="wdt-flex-banner-content-item-group">';
                                        $output .= '<div class="wdt-flex-banner-content-item-wrapper">';
                                            if(!empty($item['list_icon_1']['value'])) {
                                                $output .= ' <div class="wdt-flex-banner-spec-icon">';
                                                    ob_start();
                                                    \Elementor\Icons_Manager::render_icon( $item['list_icon_1'], [ 'aria-hidden' => 'true' ] );
                                                    $contents = ob_get_contents();
                                                    ob_end_clean();
                                                    $output .= $contents;
                                                $output .= ' </div>';
                                            }
                                            if( isset($item['flexbanner_1_item']) && !empty($item['flexbanner_1_item']) ) {
                                                $output .= '<div class="wdt-flex-banner-content-items"><span>'. $item['flexbanner_1_item'] .'</span></div>';
                                            }
                                        $output .= '</div>';
                                        $output .= '<div class="wdt-flex-banner-content-item-wrapper">';
                                            if(!empty($item['list_icon_2']['value'])) {
                                                $output .= ' <div class="wdt-flex-banner-spec-icon">';
                                                    ob_start();
                                                    \Elementor\Icons_Manager::render_icon( $item['list_icon_2'], [ 'aria-hidden' => 'true' ] );
                                                    $contents = ob_get_contents();
                                                    ob_end_clean();
                                                    $output .= $contents;
                                                $output .= ' </div>';
                                            }
                                            if( isset($item['flexbanner_2_item']) && !empty($item['flexbanner_2_item']) ) {
                                                $output .= '<div class="wdt-flex-banner-content-items"><span>'. $item['flexbanner_2_item'] .'</span></div>';
                                            }
                                        $output .= '</div>';
                                        $output .= '<div class="wdt-flex-banner-content-item-wrapper">';
                                            if(!empty($item['list_icon_3']['value'])) {
                                                $output .= ' <div class="wdt-flex-banner-spec-icon">';
                                                    ob_start();
                                                    \Elementor\Icons_Manager::render_icon( $item['list_icon_3'], [ 'aria-hidden' => 'true' ] );
                                                    $contents = ob_get_contents();
                                                    ob_end_clean();
                                                    $output .= $contents;
                                                $output .= ' </div>';
                                            }
                                            if( isset($item['flexbanner_3_item']) && !empty($item['flexbanner_3_item']) ) {
                                                $output .= '<div class="wdt-flex-banner-content-items"><span>'. $item['flexbanner_3_item'] .'</span></div>';
                                            }
                                        $output .= '</div>';
                                        $output .= '<div class="wdt-flex-banner-content-item-wrapper">';
                                            if(!empty($item['list_icon_4']['value'])) {
                                                $output .= ' <div class="wdt-flex-banner-spec-icon">';
                                                    ob_start();
                                                    \Elementor\Icons_Manager::render_icon( $item['list_icon_4'], [ 'aria-hidden' => 'true' ] );
                                                    $contents = ob_get_contents();
                                                    ob_end_clean();
                                                    $output .= $contents;
                                                $output .= ' </div>';
                                            }
                                            if( isset($item['flexbanner_4_item']) && !empty($item['flexbanner_4_item']) ) {
                                                $output .= '<div class="wdt-flex-banner-content-items"><span>'. $item['flexbanner_4_item'] .'</span></div>';
                                            }
                                        $output .= '</div>';
                                        $output .= '<div class="wdt-flex-banner-content-item-wrapper">';
                                            if(!empty($item['list_icon_5']['value'])) {
                                                $output .= ' <div class="wdt-flex-banner-spec-icon">';
                                                    ob_start();
                                                    \Elementor\Icons_Manager::render_icon( $item['list_icon_5'], [ 'aria-hidden' => 'true' ] );
                                                    $contents = ob_get_contents();
                                                    ob_end_clean();
                                                    $output .= $contents;
                                                $output .= ' </div>';
                                            }
                                            if( isset($item['flexbanner_5_item']) && !empty($item['flexbanner_5_item']) ) {
                                                $output .= '<div class="wdt-flex-banner-content-items"><span>'. $item['flexbanner_5_item'] .'</span></div>';
                                            }
                                        $output .= '</div>';
                                        $output .= '<div class="wdt-flex-banner-content-item-wrapper">';
                                            if(!empty($item['list_icon_6']['value'])) {
                                                $output .= ' <div class="wdt-flex-banner-spec-icon">';
                                                    ob_start();
                                                    \Elementor\Icons_Manager::render_icon( $item['list_icon_6'], [ 'aria-hidden' => 'true' ] );
                                                    $contents = ob_get_contents();
                                                    ob_end_clean();
                                                    $output .= $contents;
                                                $output .= ' </div>';
                                            }
                                            if( isset($item['flexbanner_6_item']) && !empty($item['flexbanner_6_item']) ) {
                                                $output .= '<div class="wdt-flex-banner-content-items"><span>'. $item['flexbanner_6_item'] .'</span></div>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                }

                                $link_start = $link_end = '';
                                if( !empty( $item['button_link']['url'] ) && $item['button'] !== '' ){
                                    $target = ( $item['button_link']['is_external'] == 'on' ) ? ' target="_blank" ' : '';
                                    $nofollow = ( $item['button_link']['nofollow'] == 'on' ) ? 'rel="nofollow" ' : '';
                                    $link_start = '<a href="'.esc_url( $item['button_link']['url'] ).'"'. $target . $nofollow.'>';
                                    $link_end = '</a>';
                                    $output .= '<div class="wdt-flex-banner-button">' . $link_start . $item['button'] . $link_end . '</div>' ;
                                }
                            $output .= '</div>'; 
                                $output .= '<div class="wdt-flex-banner-media-group">';
                                    $output .= '<span class="wdt-flex-banner-image">
                                                    <a href="' . esc_url($item['button_link']['url']) . '">
                                                            <img src="' . esc_url($item['image']['url']) . '" alt="" image_size="full" with_link="true">
                                                    </a>
                                                </span>';
                                        if (isset($item['list_icon']['value'])) {
                                            $output .= '<div class="wdt-flex-banner-icon">';
                                                $icon_link = isset($item['button_link']['url']) && !empty($item['button_link']['url']) ? $item['button_link']['url'] : '#';

                                                ob_start();
                                                \Elementor\Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']);
                                                $contents = ob_get_contents();
                                                ob_end_clean();

                                                $output .= '<a href="' . esc_url($icon_link) . '" aria-label="Icon Link">';
                                                    $output .= $contents;
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        }
                                       
                                $output .= '</div>';
                        $output .= '</div>';

                    } else {

                        $output .= ' <div class="wdt-flex-banner-shadow"></div>';
                            $output .= ' <div class="wdt-flex-banner-label">';
                                $output .= '  <div class="wdt-flex-banner-info">';
                                    if(!empty($item['list_icon']['value'])) {
                                        $output .= ' <div class="wdt-flex-banner-icon">';
                                            ob_start();
                                            \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] );
                                            $contents = ob_get_contents();
                                            ob_end_clean();
                                            $output .= $contents;
                                        $output .= ' </div>';
                                    }
                                    if(isset($item['list_title']) && !empty($item['list_title'])) {
                                        $output .= '<div class="wdt-flex-banner-title">' . $item['list_title'] . '</div>';
                                    }
                                    if(isset($item['list_sub_title']) && !empty($item['list_sub_title'])) {
                                    $output .= '<div class="wdt-flex-banner-sub-title">' . $item['list_sub_title'] . '</div>';
                                    }
                                    if(isset($item['list_content']) && !empty($item['list_content'])) {
                                    $output .= '<div class="wdt-flex-banner-content">' . $item['list_content'] . '</div>';
                                    }
            
                                    $link_start = $link_end = '';
                                    if( !empty( $item['button_link']['url'] ) && $item['button'] !== '' ){
                                        $target = ( $item['button_link']['is_external'] == 'on' ) ? ' target="_blank" ' : '';
                                        $nofollow = ( $item['button_link']['nofollow'] == 'on' ) ? 'rel="nofollow" ' : '';
                                        $link_start = '<a href="'.esc_url( $item['button_link']['url'] ).'"'. $target . $nofollow.'>';
                                        $link_end = '</a>';
                                        $output .= '<div class="wdt-flex-banner-button">' . $link_start . $item['button'] . $link_end . '</div>' ;
                                    }

                                    $output .= '<div class="wdt-flex-banner-image">';
                                        $output .= '<img src="' . $img_output . '" alt="">';
                                    $output .= '</div>';
                                    
                                $output .= '   </div>';
                        $output .= '  </div>';
                    }
                    $output .= '  </div>';
            endforeach;

        $output .= '</div>';

        return $output;

	}

}

if( !function_exists( 'wedesigntech_widget_base_flex_banner' ) ) {
    function wedesigntech_widget_base_flex_banner() {
        return WeDesignTech_Widget_Base_Flex_Banner::instance();
    }
}