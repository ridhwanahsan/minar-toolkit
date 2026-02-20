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

class awareness_widget extends Widget_Base
{
    public function get_name()
    {
        return 'awareness_widget';
    }

    public function get_title()
    {
        return __('Awareness Widget', 'minar-toolkit');
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
                'default'     => __('A Raising Issue', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_prefix',
            [
                'label'       => __('Title Prefix', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Almost', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_highlight',
            [
                'label'       => __('Title Highlight', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('7 Hours', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subtitle_text',
            [
                'label'       => __('Subtitle Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('That’s how long most of us spend in front of screens each day', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );

        $this->add_control(
            'left_image',
            [
                'label'   => __('Left Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/raising-issue-image.png',
                ],
            ]
        );

        $this->add_control(
            'left_image_alt',
            [
                'label'       => __('Left Image Alt', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Awareness Image', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'desc_1',
            [
                'label'       => __('Description 1', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('The real problem isn’t just lost time — it’s the stress, the tension, and the constant noise that never lets the mind rest.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'desc_2',
            [
                'label'       => __('Description 2', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Minar Ease helps you create small offline moments that make a real difference. No notifications. No pressure. Just calm, creativity, and a break your brain deserves.', 'minar-toolkit'),
                'rows'        => 4,
            ]
        );

        $this->add_control(
            'cta_text',
            [
                'label'       => __('CTA Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Explore the Collection', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cta_url',
            [
                'label'       => __('CTA Button URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'right_image',
            [
                'label'   => __('Right Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/raising-issue-image.png',
                ],
            ]
        );

        $this->add_control(
            'right_image_alt',
            [
                'label'       => __('Right Image Alt', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Awareness Image', 'minar-toolkit'),
                'label_block' => true,
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
                 
            <!-- Awareness Area Start Here -->
            <section class="awareness">
                <div class="awareness__container container">
                    <div class="awareness__subtitle-wrap">
                    <p class="awareness__subtitle subtitle"><?php echo esc_html($settings['top_subtitle']); ?></p>
                    </div>

                    <div class="awareness__content-area">
                    <div class="awareness__left">
                        <h2 class="awareness__title title-2"><?php echo esc_html($settings['title_prefix']); ?> <span class="highlight"><?php echo esc_html($settings['title_highlight']); ?></span></h2>
                        <p class="awareness__subtitle-text subtitle-text"><?php echo esc_html($settings['subtitle_text']); ?></p>
                        <img src="<?php echo esc_url(!empty($settings['left_image']['url']) ? $settings['left_image']['url'] : ''); ?>" class="awareness__image awareness__image--responsive"
                        alt="<?php echo esc_attr($settings['left_image_alt']); ?>">
                        <p class="awareness__desc"><?php echo esc_html($settings['desc_1']); ?></p>
                        <p class="awareness__desc"><?php echo esc_html($settings['desc_2']); ?></p>
                        <a href="<?php echo esc_url(!empty($settings['cta_url']['url']) ? $settings['cta_url']['url'] : '#'); ?>" class="awareness__btn btn btn--primary"<?php echo !empty($settings['cta_url']['is_external']) ? ' target="_blank"' : ''; ?><?php echo !empty($settings['cta_url']['nofollow']) ? ' rel="nofollow"' : ''; ?>><?php echo esc_html($settings['cta_text']); ?></a>
                    </div>
                    <div class="awareness__right">
                        <img src="<?php echo esc_url(!empty($settings['right_image']['url']) ? $settings['right_image']['url'] : ''); ?>" class="awareness__image" alt="<?php echo esc_attr($settings['right_image_alt']); ?>">
                    </div>
                    </div>
                </div>
            </section>
            <!-- Awareness Area End Here -->
        <?php
    }
} 
$widgets_manager->register(new awareness_widget());
