<?php
namespace minar_toolkit\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Repeater;

if (! defined('ABSPATH')) {
    exit;
}

class testimonials_widget extends Widget_Base
{
    public function get_name()
    {
        return 'testimonials_widget';
    }

    public function get_title()
    {
        return __('Testimonials Widget', 'minar-toolkit');
    }

    public function get_icon()
    {
        return 'eicon-elementor';
    }

    public function get_categories()
    {
        return ['minar'];
    }

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->style_tab_content();
    }

    protected function register_controls_section()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'minar-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'auto_slide',
            [
                'label' => esc_html__('Auto Slide', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'minar-toolkit'),
                'label_off' => esc_html__('No', 'minar-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slide_interval',
            [
                'label' => esc_html__('Slide Interval (ms)', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'auto_slide' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_items',
            [
                'label' => esc_html__('Items to Show', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
                'min' => 1,
                'max' => 10,
            ]
        );

        $this->add_control(
            'show_items_mobile',
            [
                'label' => esc_html__('Items to Show (Mobile)', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 5,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'author_image',
            [
                'label' => esc_html__('Image', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/testimonial-avatar-1.png',
                ],
            ]
        );
        $repeater->add_control(
            'author_name',
            [
                'label' => esc_html__('Author Name', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Lieke Visser', 'minar-toolkit'),
            ]
        );
        $repeater->add_control(
            'author_content',
            [
                'label' => esc_html__('Content', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('I bought this hoping to reduce my nightly scrolling habit, and surprisingly it worked. Spending a few minutes coloring helps me relax and sleep better.', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'testimonials_items',
            [
                'label' => esc_html__('Testimonials', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'author_image' => [
                            'url' => get_stylesheet_directory_uri() . '/assets/images/testimonial-avatar-1.png',
                        ],
                        'author_name' => esc_html__('Anouk Jansen', 'minar-toolkit'),
                        'author_content' => esc_html__('At first I thought the protective sheet was unnecessary. After using markers, I get why it’s there. It actually does prevent bleed.', 'minar-toolkit'),
                    ],
                    [
                        'author_image' => [
                            'url' => get_stylesheet_directory_uri() . '/assets/images/testimonial-avatar-2.png',
                        ],
                        'author_name' => esc_html__('Luuk Hendriks', 'minar-toolkit'),
                        'author_content' => esc_html__('I was debating between this and a popular Amazon bestseller. I chose this because of the spiral binding and protective sheet. No regrets so far.', 'minar-toolkit'),
                    ],
                    [
                        'author_image' => [
                            'url' => get_stylesheet_directory_uri() . '/assets/images/testimonial-avatar-3.png',
                        ],
                        'author_name' => esc_html__('Mila Smit', 'minar-toolkit'),
                        'author_content' => esc_html__('I bought it as a gift and ended up keeping it for myself. It’s simple, but in a good way.', 'minar-toolkit'),
                    ],
                ],
                'title_field' => '{{{ author_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'minar-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonials_bg_color',
            [
                'label' => esc_html__('Background Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'author_name_color',
            [
                'label' => esc_html__('Author Name Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__author-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dot_active_color',
            [
                'label' => esc_html__('Active Dot Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__pagination-dot--active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dot_inactive_color',
            [
                'label' => esc_html__('Inactive Dot Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonials__pagination-dot' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); 
        ?>
                 
            <!-- Testimonials Start Here -->
                <section class="testimonials testimonials--style-one">
                <div class="testimonials__container container">
                    <div class="testimonials__header">
                    <p class="testimonials__subtitle subtitle">Testimonials
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4H16V12H7L4 15V4Z" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round" />

                        <path d="M11 8H20V16H17L14 19V16H11V8Z" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                    </p>
                    <h2 class="testimonials__title title-2">Loved by those who needed a break</h2>
                    <p class="testimonials__subtitle-text subtitle-text">Join hundreds of others who traded scrolling for
                        creating.</p>
                    </div>

                    <div id="testimonials-slider-one" class="testimonials__area swiper">
                    <div class="testimonials__content swiper-wrapper">
                        <?php if ( ! empty( $settings['testimonials_items'] ) ) : ?>
                            <?php foreach ( $settings['testimonials_items'] as $item ) : ?>
                                <div class="testimonials__item swiper-slide">
                                    <p class="testimonials__text"><?php echo esc_html( $item['author_content'] ); ?></p>
                                    <h3 class="testimonials__author-name"><?php echo esc_html( $item['author_name'] ); ?></h3>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="testimonials__pagination">
                        <div class="testimonials__pagination--inner swiper-pagination">
                        <span class="testimonials__pagination-dot"></span>
                        <span class="testimonials__pagination-dot testimonials__pagination-dot--active"></span>
                        <span class="testimonials__pagination-dot"></span>
                        <span class="testimonials__pagination-dot"></span>
                        </div>
                    </div>
                    </div>
                </div>
                </section>
            <!-- Testimonials End Here -->
        <?php
    }
} 
$widgets_manager->register(new testimonials_widget());
