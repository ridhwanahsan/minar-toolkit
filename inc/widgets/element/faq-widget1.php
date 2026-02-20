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

    class faq_widget1 extends Widget_Base
{
    public function get_name()
    {
        return 'faq_widget1';
    }

    public function get_title()
    {
        return __('Faq Widget', 'minar-toolkit');
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
                'label' => __('Content', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_title',
            [
                'label'       => __('FAQ Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('FAQ', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'faq_question',
            [
                'label'       => __('Question', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('What is Minar Ease?', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'faq_answer',
            [
                'label'       => __('Answer', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Minar Ease helps you create small offline moments that make a real difference. No notifications. No pressure. Just calm, creativity, and a break your brain deserves.', 'minar-toolkit'),
                'rows'        => 4,
            ]
        );
        $repeater->add_control(
            'faq_active',
            [
                'label'       => __('Active (expanded)', 'minar-toolkit'),
                'type'        => Controls_Manager::SWITCHER,
                'label_on'    => __('Yes', 'minar-toolkit'),
                'label_off'   => __('No', 'minar-toolkit'),
                'return_value'=> 'yes',
                'default'     => '',
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label'       => __('FAQ Items', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'faq_question' => 'Is the protective sheet bothering?',
                        'faq_answer'   => 'Not at all. It stays flat while colouring and uses snap-lock technology, so you can detach it anytime.',
                        'faq_active'   => 'yes',
                    ],
                    [
                        'faq_question' => 'Will the protective sheet tear over time?',
                        'faq_answer'   => 'No. It’s reinforced with a protective sticker, making it durable for regular use.',
                        'faq_active'   => '',
                    ],
                    [
                        'faq_question' => 'Is VINI suitable for beginners?',
                        'faq_answer'   => 'Yes. The designs vary in detail, so you can start simple or take your time with more intricate pages. It’s made to be relaxing, not overwhelming.',
                        'faq_active'   => '',
                    ],
                    [
                        'faq_question' => 'Can I use alcohol markers?',
                        'faq_answer'   => 'Yes. VINI includes a detachable protective sheet to place behind the page, helping prevent bleed-through when using markers.',
                        'faq_active'   => '',
                    ],
                    [
                        'faq_question' => 'Can I remove finished pages?',
                        'faq_answer'   => 'Yes. The spiral binding makes it easy to carefully tear out pages if you’d like to frame or share your work.',
                        'faq_active'   => '',
                    ],
                    [
                        'faq_question' => 'Will the colour bleed onto the next page?',
                        'faq_answer'   => 'No. VINI uses thick 200gsm single-sided pages, and with the included protective sheet, it offers 100% bleed protection.',
                        'faq_active'   => '',
                    ],
                ],
                'title_field' => '{{{ faq_question }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => __('Section Background', 'minar-toolkit'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .faq',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .faq__title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'question_typography',
                'selector' => '{{WRAPPER}} .faq__header',
            ]
        );
        $this->add_control(
            'question_color',
            [
                'label' => __('Question Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__header' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'question_active_color',
            [
                'label' => __('Question Color (Active)', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item--active .faq__header' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'answer_typography',
                'selector' => '{{WRAPPER}} .faq__text',
            ]
        );
        $this->add_control(
            'answer_color',
            [
                'label' => __('Answer Text Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'answer_active_color',
            [
                'label' => __('Answer Text Color (Active)', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item--active .faq__text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'item_bg_color',
            [
                'label' => __('Item Background', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'item_border_color',
            [
                'label' => __('Item Border Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'item_active_bg_color',
            [
                'label' => __('Active Item Background', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item--active' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'item_active_border_color',
            [
                'label' => __('Active Item Border Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item--active' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_active_color',
            [
                'label' => __('Icon Color (Active)', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq__item--active .faq__icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            <!-- Faq Start Here -->
            <section class="faq">
                <div class="faq__container container">
                    <h1 class="faq__title title-2"><?php echo esc_html($settings['faq_title']); ?></h1>

                    <div class="faq__area">
                        <?php if (!empty($settings['faq_items'])): foreach ($settings['faq_items'] as $item): ?>
                        <div class="faq__item <?php echo !empty($item['faq_active']) ? 'faq__item--active' : ''; ?>">
                            <button class="faq__header">
                                <?php echo esc_html($item['faq_question']); ?>
                                <span class="faq__icon"></span>
                            </button>
                            <div class="faq__content">
                                <p class="faq__text">
                                    <?php echo esc_html($item['faq_answer']); ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </section>
            <!-- Faq End Here -->
        <?php
    }
} 
$widgets_manager->register(new faq_widget1());
