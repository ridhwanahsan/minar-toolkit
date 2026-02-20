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

    class experience_widget1 extends Widget_Base
{
    public function get_name()
    {
        return 'experience_widget1';
    }

    public function get_title()
    {
        return __('Experience Widget', 'minar-toolkit');
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
            'top_subtitle',
            [
                'label'       => __('Top Subtitle', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('What makes us unique?', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_prefix',
            [
                'label'       => __('Title Prefix', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('We Redesigned the Entire', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_highlight',
            [
                'label'       => __('Title Highlight', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Experience', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card1_heading',
            [
                'label'       => __('Card 1 Heading', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Protective Sheet Included', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card1_desc',
            [
                'label'       => __('Card 1 Description', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Use markers with confidence, no mess underneath.', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );

        $this->add_control(
            'gsm_value',
            [
                'label'       => __('Card 2 GSM Value', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('200', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gsm_unit',
            [
                'label'       => __('Card 2 Unit Heading', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Gsm Thick Paper', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gsm_desc',
            [
                'label'       => __('Card 2 Description', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Premium pages that keep colors vibrant with zero bleed-through.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'card3_image',
            [
                'label'   => __('Card 3 Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/experience-book.png',
                ],
            ]
        );

        $this->add_control(
            'card3_image_alt',
            [
                'label'       => __('Card 3 Image Alt', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Book', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card3_heading',
            [
                'label'       => __('Card 3 Heading', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Single-Sided Pages', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card3_desc',
            [
                'label'       => __('Card 3 Description', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Each illustration is printed on one side only, so you can colour without worrying about the next page.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'card4_heading',
            [
                'label'       => __('Card 4 Heading', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Modern, Gender-Neutral Illustrations', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card4_desc',
            [
                'label'       => __('Card 4 Description', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Thoughtfully designed artwork with a clean, contemporary style that’s enjoyable for anyone.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'card5_image',
            [
                'label'   => __('Card 5 Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/breaks-img.png',
                ],
            ]
        );

        $this->add_control(
            'card5_image_alt',
            [
                'label'       => __('Card 5 Image Alt', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card5_heading',
            [
                'label'       => __('Card 5 Heading', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Made for Quiet Breaks', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card5_desc',
            [
                'label'       => __('Card 5 Description', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Created to help you pause, unplug, and enjoy a quiet creative moment away from screens.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
    
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            <!-- Experience Start Here -->
            <section class="experience">
                <div class="experience__container container">
                    <header class="experience__header">
                        <div class="experience__subtitle-wrap">
                            <p class="experience__subtitle subtitle--two"><?php echo esc_html($settings['top_subtitle']); ?></p>
                        </div>
                        <h2 class="experience__title title-2"><?php echo esc_html($settings['title_prefix']); ?> <span
                                class="hightlight"><?php echo esc_html($settings['title_highlight']); ?></span></h2>
                    </header>

                    <div class="experience__grid">
                        <article class="experience__card experience__card--1">
                            <div class="experience__card-content">
                                <h3 class="experience__card-heading"><?php echo esc_html($settings['card1_heading']); ?></h3>
                                <p class="experience__card-desc"><?php echo esc_html($settings['card1_desc']); ?></p>
                            </div>
                        </article>

                        <article class="experience__card experience__card--2">
                            <div class="experience__card-content">
                                <span class="experience__gsm-value"><?php echo esc_html($settings['gsm_value']); ?></span>
                                <h3 class="experience__gsm-unit"><?php echo esc_html($settings['gsm_unit']); ?></h3>
                                <p class="experience__card-desc experience__card-desc--center"><?php echo esc_html($settings['gsm_desc']); ?></p>
                            </div>
                        </article>

                        <article class="experience__card experience__card--3">
                            <div class="experience__card-image-wrap">
                                <img src="<?php echo esc_url(!empty($settings['card3_image']['url']) ? $settings['card3_image']['url'] : ''); ?>" alt="<?php echo esc_attr($settings['card3_image_alt']); ?>" class="experience__card-image">
                            </div>
                            <div class="experience__card-content experience__card-content--3">
                                <h3 class="experience__card-heading"><?php echo esc_html($settings['card3_heading']); ?></h3>
                                <p class="experience__card-desc experience__card-desc--max-w"><?php echo esc_html($settings['card3_desc']); ?></p>
                            </div>
                        </article>

                        <article class="experience__card experience__card--4">
                            <h3 class="experience__card-heading"><?php echo esc_html($settings['card4_heading']); ?></h3>
                            <p class="experience__card-desc"><?php echo esc_html($settings['card4_desc']); ?></p>
                        </article>

                        <article class="experience__card experience__card--5">
                            <div class="experience__image-wrap">
                                <img src="<?php echo esc_url(!empty($settings['card5_image']['url']) ? $settings['card5_image']['url'] : ''); ?>" alt="<?php echo esc_attr($settings['card5_image_alt']); ?>" class="experience__img">
                            </div>
                            <div class="experience__card-content">
                                <h3 class="experience__card-heading"><?php echo esc_html($settings['card5_heading']); ?></h3>
                                <p class="experience__card-desc"><?php echo esc_html($settings['card5_desc']); ?></p>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <!-- Experience End Here -->
        <?php
    }
} 
$widgets_manager->register(new experience_widget1());
