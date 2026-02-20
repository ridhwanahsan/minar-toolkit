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

class mission_widget1 extends Widget_Base
{
    public function get_name()
    {
        return 'mission_widget1';
    }

    public function get_title()
    {
        return __('Mission Widget', 'minar-toolkit');
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
            'left_title_prefix',
            [
                'label'       => __('Left Title Prefix', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Our', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'left_title_highlight',
            [
                'label'       => __('Left Title Highlight', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Mission', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'left_subtitle',
            [
                'label'       => __('Left Subtitle', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('We exist to help you stop.', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'left_hand_image',
            [
                'label'   => __('Left Hand Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/hand-writting.png',
                ],
            ]
        );

        $this->add_control(
            'left_hand_image_alt',
            [
                'label'       => __('Left Hand Image Alt', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Hand Writing', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $left_list_repeater = new Repeater();
        $left_list_repeater->add_control(
            'text',
            [
                'label'       => __('List Item', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('List item', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'left_list',
            [
                'label'       => __('Left List', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $left_list_repeater->get_controls(),
                'default'     => [
                    ['text' => __('To close the apps.', 'minar-toolkit')],
                    ['text' => __('To put the phone down.', 'minar-toolkit')],
                    ['text' => __('To take back your attention.', 'minar-toolkit')],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->add_control(
            'left_desc_1',
            [
                'label'       => __('Left Paragraph 1', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Minar Ease creates thoughtfully designed offline tools that encourage slowing down, breathing deeply, and reconnecting with the present moment.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'left_desc_2',
            [
                'label'       => __('Left Paragraph 2', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('No endless notifications. No pressure to perform. Just small, intentional breaks that help the mind rest and the hands create.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'left_desc_3',
            [
                'label'       => __('Left Paragraph 3', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('We believe calm isn’t something you download — it’s something you practice, one quiet moment at a time.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'right_title_prefix',
            [
                'label'       => __('Right Title Prefix', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Our', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_title_highlight',
            [
                'label'       => __('Right Title Highlight', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Vision', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_subtitle',
            [
                'label'       => __('Right Subtitle', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('We imagine a world where people choose to pause.', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_image',
            [
                'label'   => __('Right Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/vission-image.png',
                ],
            ]
        );

        $this->add_control(
            'right_image_alt',
            [
                'label'       => __('Right Image Alt', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Vision Image', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $right_list1_repeater = new Repeater();
        $right_list1_repeater->add_control(
            'text',
            [
                'label'       => __('List Item', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('List item', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_list1',
            [
                'label'       => __('Right List Top', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $right_list1_repeater->get_controls(),
                'default'     => [
                    ['text' => __('Where evenings aren’t lost to endless scrolling.', 'minar-toolkit')],
                    ['text' => __('Where attention is protected.', 'minar-toolkit')],
                    ['text' => __('Where silence feels safe again.', 'minar-toolkit')],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->add_control(
            'right_mid_text',
            [
                'label'       => __('Right Middle Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('A world where calm isn’t something you download — it’s something you practice.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $right_list2_repeater = new Repeater();
        $right_list2_repeater->add_control(
            'text',
            [
                'label'       => __('List Item', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('List item', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'right_list2',
            [
                'label'       => __('Right List Bottom', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $right_list2_repeater->get_controls(),
                'default'     => [
                    ['text' => __('One page. One breath.', 'minar-toolkit')],
                    ['text' => __('One quiet moment at a time.', 'minar-toolkit')],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->add_control(
            'bg_text_image',
            [
                'label'   => __('Background Text Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/about-us-text.png',
                ],
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

        $left_img_url = !empty($settings['left_hand_image']['url']) ? $settings['left_hand_image']['url'] : '';
        if (empty($left_img_url)) {
            $candidate = get_stylesheet_directory_uri() . '/assets/images/hand-writting.png';
            $left_img_url = $candidate;
        }

        $right_img_url = !empty($settings['right_image']['url']) ? $settings['right_image']['url'] : '';
        if (empty($right_img_url)) {
            $candidate = get_stylesheet_directory_uri() . '/assets/images/vission-image.png';
            $right_img_url = $candidate;
        }

        $bg_img_url = !empty($settings['bg_text_image']['url']) ? $settings['bg_text_image']['url'] : '';
        if (empty($bg_img_url)) {
            $candidate = get_stylesheet_directory_uri() . '/assets/images/about-us-text.png';
            $bg_img_url = $candidate;
        }
        ?>
            <!-- Mission Start Here -->
        <section class="mission mission--style-one">
            <div class="mission__container container">
                <div class="mission__content-area mission__content-area--left">
                    <div class="mission__content mission__content--one">
                        <h2 class="mission__title title--lg "><?php echo esc_html($settings['left_title_prefix']); ?> <span><?php echo esc_html($settings['left_title_highlight']); ?></span></h2>
                        <p class="mission__subtitle-text mission__subtitle-text--left subtitle-text"><?php echo esc_html($settings['left_subtitle']); ?></p>

                        <div class="mission__hand-image-wrap">
                            <?php if (!empty($left_img_url)): ?>
                                <img src="<?php echo esc_url($left_img_url); ?>" alt="<?php echo esc_attr(!empty($settings['left_hand_image_alt']) ? $settings['left_hand_image_alt'] : ''); ?>" class="mission__hand-image">
                            <?php endif; ?>
                        </div>

                        <ul class="mission__lists">
                            <?php if (!empty($settings['left_list'])): ?>
                                <?php foreach ($settings['left_list'] as $item): ?>
                                    <li class="mission__list-item"><?php echo esc_html($item['text']); ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                        <?php if (!empty($settings['left_desc_1'])): ?>
                            <p class="mission__text mission__text--left"><?php echo esc_html($settings['left_desc_1']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['left_desc_2'])): ?>
                            <p class="mission__text mission__text--left"><?php echo esc_html($settings['left_desc_2']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['left_desc_3'])): ?>
                            <p class="mission__text mission__text--left"><?php echo esc_html($settings['left_desc_3']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mission__content-area mission__content-area--right">
                    <div class="mission__content mission__content--right">
                        <h2 class=" mission__title title--lg "><?php echo esc_html($settings['right_title_prefix']); ?> <span><?php echo esc_html($settings['right_title_highlight']); ?></span></h2>
                        <p class=" mission__subtitle-text mission__suhbtitle-text--right subtitle-text"><?php echo esc_html($settings['right_subtitle']); ?></p>

                        <div class="mission__vission-image-wrap">
                            <?php if (!empty($right_img_url)): ?>
                                <img src="<?php echo esc_url($right_img_url); ?>" alt="<?php echo esc_attr(!empty($settings['right_image_alt']) ? $settings['right_image_alt'] : ''); ?>" class="mission__vission-image">
                            <?php endif; ?>
                        </div>

                        <ul class="mission__lists mission__lists--right">
                            <?php if (!empty($settings['right_list1'])): ?>
                                <?php foreach ($settings['right_list1'] as $item): ?>
                                    <li class="mission__list-item"><?php echo esc_html($item['text']); ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                        <?php if (!empty($settings['right_mid_text'])): ?>
                            <p class="mission__text mission__text-limit"><?php echo esc_html($settings['right_mid_text']); ?></p>
                        <?php endif; ?>
                        <ul class="mission__lists mission__lists--right">
                            <?php if (!empty($settings['right_list2'])): ?>
                                <?php foreach ($settings['right_list2'] as $item): ?>
                                    <li class="mission__list-item"><?php echo esc_html($item['text']); ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="mission__bg-text-wrap">
                    <?php if (!empty($bg_img_url)): ?>
                        <img src="<?php echo esc_url($bg_img_url); ?>" alt="" class="mission__bg-text">
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Mission End Here -->
        <?php
    }
} 
$widgets_manager->register(new mission_widget1());
