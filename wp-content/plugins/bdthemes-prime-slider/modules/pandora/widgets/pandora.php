<?php
namespace PrimeSliderPro\Modules\Pandora\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Plugin;
use PrimeSliderPro\Utils;

use PrimeSlider\Traits\Global_Widget_Controls;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Pandora extends Widget_Base {

	use Global_Widget_Controls;

	public function get_name() {
		return 'prime-slider-pandora';
	}

	public function get_title() {
		return BDTPS . esc_html__( 'Pandora', 'bdthemes-prime-slider' );
	}

	public function get_icon() {
		return 'bdt-widget-icon ps-wi-pandora bdt-new';
	}

	public function get_categories() {
		return [ 'prime-slider-pro' ];
	}

	public function get_keywords() {
		return [ 'prime slider', 'slider', 'pandora', 'prime' ];
	}

	public function get_style_depends() {
		return [ 'prime-slider-font', 'ps-pandora' ];
	}

	public function get_script_depends() {
		return [ 'ps-pandora' ];
	}

	// public function get_custom_help_url() {
	// 	return 'https://youtu.be/mgT1NMMBEFA';
	// }

	protected function is_dynamic_content(): bool {
		return false;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content_items',
            [ 
                'label' => esc_html__( 'Items', 'bdthemes-prime-slider' ),
            ]
		);

		$repeater = new Repeater();

        /**
         * Repeater sub Title Controls
         */
        $this->register_repeater_sub_title_controls( $repeater );

		/**
		 * Repeater Title Controls
		 */
		$this->register_repeater_title_controls( $repeater );

        /**
		 * Repeater Title Link Controls
		 */
		$this->register_repeater_title_link_controls( $repeater );

		/**
		 * Repeater Image Controls
		 */
		$this->register_repeater_image_controls( $repeater );

		$this->add_control(
			'items',
			[ 
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [ 
					[ 
						'sub_title' => esc_html__( '01', 'bdthemes-prime-slider' ),
						'title'     => esc_html__( 'Amalthea', 'bdthemes-prime-slider' ),
						'image'     => [ 'url' => BDTPS_CORE_ASSETS_URL . 'images/gallery/item-1.svg' ]
					],
					[ 
                        'sub_title' => esc_html__( '02', 'bdthemes-prime-slider' ),
						'title'     => esc_html__( 'Miranda', 'bdthemes-prime-slider' ),
						'image'     => [ 'url' => BDTPS_CORE_ASSETS_URL . 'images/gallery/item-2.svg' ]
					],
					[ 
                        'sub_title' => esc_html__( '03', 'bdthemes-prime-slider' ),
						'title'     => esc_html__( 'Titania', 'bdthemes-prime-slider' ),
						'image'     => [ 'url' => BDTPS_CORE_ASSETS_URL . 'images/gallery/item-3.svg' ]
					],
					[ 
                        'sub_title' => esc_html__( '04', 'bdthemes-prime-slider' ),
						'title'     => esc_html__( 'Enceladus', 'bdthemes-prime-slider' ),
						'image'     => [ 'url' => BDTPS_CORE_ASSETS_URL . 'images/gallery/item-4.svg' ]
					],
					[ 
                        'sub_title' => esc_html__( '05', 'bdthemes-prime-slider' ),
						'title'     => esc_html__( 'Bebhion', 'bdthemes-prime-slider' ),
						'image'     => [ 'url' => BDTPS_CORE_ASSETS_URL . 'images/gallery/item-5.svg' ]
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'section_content_additional',
            [ 
                'label' => esc_html__( 'Additional Options', 'bdthemes-prime-slider' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
		);
		
		/**
		 * Thumbnail Size Controls
		 */
		$this->register_thumbnail_size_controls();


		/**
		 * Show Title Controls
		 */
		$this->register_show_title_controls();

		/**
		 * Show Sub Title Controls
		 */
		$this->register_show_sub_title_controls();

        $this->add_control(
			'item_hover_event',
			[ 
				'label'     => esc_html__( 'Select Event ', 'bdthemes-prime-slider' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'mouseover',
				'options'   => [ 
					'click'     => esc_html__( 'Click', 'bdthemes-prime-slider' ),
					'mouseover' => esc_html__( 'Hover', 'bdthemes-prime-slider' ),
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'hover_active_item',
			[ 
				'label'       => esc_html__( 'Active Item', 'bdthemes-prime-slider' ),
				'description' => esc_html__( 'Set default item by inserting the item\'s numeric position (i.e. 1 or 2 or 3 or ...) The numeric position reads from the top-left corner as 1st and continues to the right side.', 'bdthemes-prime-slider' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '1',
			]
		);

		$this->end_controls_section();

		/**
		 * Style Tab
		 */
		$this->start_controls_section(
			'section_wrapper_style',
			[
				'label' => esc_html__( 'Wrapper', 'bdthemes-prime-slider' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'item_height',
			[ 
				'label'      => esc_html__( 'Height', 'bdthemes-prime-slider' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px', 'vh' ],
				'range'      => [ 
					'px' => [ 
						'min' => 200,
						'max' => 1080,
					],
					'%'  => [ 
						'min' => 10,
						'max' => 100,
					],
					'vh' => [ 
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors'  => [ 
					'{{WRAPPER}} .bdt-ps-pandora' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_max_width',
			[
				'label' => esc_html__( 'Max Width', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1600,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-item-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-item-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/**
		 * Background Controls
		 */
		$this->register_background_settings( '.bdt-ps-pandora .bdt-img' );
		$this->add_control(
			'note',
			[ 
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => esc_html__( 'Note: If image interactions conflict while hovering, set the background color to match the image\'s background from the advanced settings. This will improve the design\'s aesthetics and interactivity.', 'bdthemes-prime-slider' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'bdthemes-prime-slider' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-prime-slider' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_fill_color',
			[
				'label'     => esc_html__( 'Fill Color', 'bdthemes-prime-slider' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-title:after' => '-webkit-text-fill-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .bdt-ps-pandora .bdt-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'title_text_stroke',
				'selector' => '{{WRAPPER}} .bdt-ps-pandora .bdt-title',
			]
		);
		$this->add_responsive_control(
			'title_x_spacing',
			[
				'label' => esc_html__( 'X Spacing', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-title' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdt-ps-pandora .bdt-title:after' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdt-ps-pandora .bdt-item.active .bdt-title::after' => 'width: calc(100% - calc({{SIZE}}{{UNIT}} * 2));',
					'{{WRAPPER}} .bdt-ps-pandora .bdt-line' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdt-ps-pandora .bdt-item.active .bdt-subtitle' => 'transform: translateX(calc(calc({{SIZE}}{{UNIT}} * 2) - 5px));',
				],
			]
		);
		$this->add_responsive_control(
			'title_y_spacing',
			[
				'label' => esc_html__( 'Y Spacing', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-title' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bdt-ps-pandora .bdt-title:after' => 'bottom: {{SIZE}}{{UNIT}}; height: calc(100% - calc({{SIZE}}{{UNIT}} * 2));',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_sub_title_style',
			[
				'label' => esc_html__( 'Sub Title', 'bdthemes-prime-slider' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_sub_title' => 'yes',
				],
			]
		);
		$this->add_control(
			'sub_title_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-prime-slider' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_active_color',
			[
				'label'     => esc_html__( 'Active Color', 'bdthemes-prime-slider' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-item.active .bdt-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .bdt-ps-pandora .bdt-subtitle',
			]
		);
		$this->add_control(
			'sub_title_opacity',
			[
				'label' => esc_html__( 'Opacity', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-subtitle' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_line_style',
			[
				'label' => esc_html__( 'Line', 'bdthemes-prime-slider' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'line_color',
			[
				'label'     => esc_html__( 'Color', 'bdthemes-prime-slider' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-line' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'line_opacity',
			[
				'label' => esc_html__( 'Opacity', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-line' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_responsive_control(
			'line_height',
			[
				'label' => esc_html__( 'Height', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-line' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(

			'line_width',
			[
				'label' => esc_html__( 'Width', 'bdthemes-prime-slider' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bdt-ps-pandora .bdt-line' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}

    public function activeItem( $active_item, $totalItem ) {
		$active_item = (int) $active_item;
		return $active_item = ( $active_item <= 0 || $active_item > $totalItem ? 1 : $active_item );
	}

    public function render_title( $item ) {
        $settings = $this->get_settings_for_display();
        if ( '' == $settings['show_title'] ) {
			return;
		}

        if ( ! empty( $item['title_link']['url'] ) && ! empty( $item['title'] ) ) {
            $this->add_link_attributes( 'link', $item['title_link'], true );
        }

        if ( ! empty( $item['title'] ) ) : ?>
            <<?php echo esc_html( Utils::get_valid_html_tag( $settings['title_html_tag'] ) ); ?> class="bdt-title" data-link-text="<?php echo esc_html($item['title']); ?>">
                <?php echo esc_html($item['title']); ?>
                <?php if ( ! empty( $item['title_link']['url'] ) && ! empty( $item['title'] ) ) : ?>
                    <a <?php $this->print_render_attribute_string('link'); ?>></a>
                <?php endif; ?>
            </<?php echo esc_html( Utils::get_valid_html_tag( $settings['title_html_tag'] ) ); ?>>
        <?php
        endif;
    }

	public function render_pandora_items() {
		$settings = $this->get_settings_for_display();
        $id       = $this->get_id();

		foreach ( $settings['items'] as $index => $item ) :

            $tab_count = $index + 1;
			$tab_id    = 'bdt-items-' . $tab_count . esc_attr( $id );

            $active_item = $this->activeItem( $settings['hover_active_item'], count( $settings['items'] ) );

            if ( $tab_id == 'bdt-items-' . $active_item . esc_attr( $id ) ) {
                $this->add_render_attribute( 'item', 'class', 'bdt-item active', true );
            } else {
                $this->add_render_attribute( 'item', 'class', 'bdt-item', true );
            }

			?>
			<div <?php $this->print_render_attribute_string('item'); ?> data-id="<?php echo esc_attr( $tab_id ); ?>">
                <?php $this->render_sub_title( $item, 'bdt-subtitle', '' ); ?>
                <span class="bdt-line"></span>
                <?php $this->render_title( $item, 'bdt-title', '' ); ?>
                <?php $this->rendar_item_image( $item, 'bdt-img' ); ?>
			</div>

		<?php endforeach;
	}

	public function render() {
        $settings = $this->get_settings_for_display();

        if ( $settings['item_hover_event'] ) {
			$hoverBoxEvent = $settings['item_hover_event'];
		} else {
			$hoverBoxEvent = false;
		}

        $this->add_render_attribute(
			[ 
				'pandora' => [ 
					'id'            => 'bdt-ps-pandora-' . $this->get_id(),
					'class'         => 'bdt-ps-pandora bdt-flex bdt-flex-middle',
					'data-settings' => [ 
						wp_json_encode( array_filter( [ 
							'box_id'      => 'bdt-ps-pandora-' . $this->get_id(),
							'mouse_event' => $hoverBoxEvent,
						] ) )
					]
				]
			]
		);

        ?>
        <div <?php $this->print_render_attribute_string('pandora'); ?>>
            <div class="bdt-item-wrap">
                <?php $this->render_pandora_items(); ?>
            </div>
        </div>
        <?php
	}
}