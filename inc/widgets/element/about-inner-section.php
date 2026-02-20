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

class about_inner_section extends Widget_Base
{
    public function get_name()
    {
        return 'about_inner_section';
    }

    public function get_title()
    {
        return __('About Inner Section', 'minar-toolkit');
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
            'rating_bg',
            [
                'label'   => __('Rating Box Background', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/about/blur.png',
                ],
            ]
        );

        $this->add_control(
            'rating_value',
            [
                'label'       => __('Rating Value', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('4.90', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'rating_label',
            [
                'label'       => __('Rating Label', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Average rating', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'star_count',
            [
                'label'   => __('Star Count', 'minar-toolkit'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
                'min'     => 1,
                'max'     => 5,
            ]
        );

        $this->add_control(
            'left_image_1',
            [
                'label'   => __('Left Image 1', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/about/05.jpg',
                ],
            ]
        );

        $this->add_control(
            'left_image_2',
            [
                'label'   => __('Left Image 2', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/about/06.jpg',
                ],
            ]
        );

        $this->add_control(
            'subtitle_icon',
            [
                'label'   => __('Subtitle Icon', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-1/icon/hourse.svg',
                ],
            ]
        );

        $this->add_control(
            'subtitle_text',
            [
                'label'       => __('Subtitle Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Bringing the Wild West back', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'main_title',
            [
                'label'       => __('Main Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('about Our riding school', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tabs_heading',
            [
                'label' => __('Tabs', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $tab_repeater = new Repeater();
        $tab_repeater->add_control(
            'tab_id',
            [
                'label'       => __('Tab ID', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('tech', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $tab_repeater->add_control(
            'tab_label',
            [
                'label'       => __('Tab Label', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('who we  are', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $tab_repeater->add_control(
            'tab_span_text',
            [
                'label'       => __('Top Short Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('We believe in the power of attention to detail. Our cleaners are meticulous in their work, leaving no nook or cranny untouched.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );
        $tab_repeater->add_control(
            'tab_paragraph_text',
            [
                'label'       => __('Paragraph Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Our riding school has been providing top-quality horse training and riding lessons for riders of all ages. With well-trained horses, experienced instructors, and a friendly atmosphere, we help you build confidence and riding skills step by step.', 'minar-toolkit'),
                'rows'        => 4,
            ]
        );
        $tab_repeater->add_control(
            'button_text',
            [
                'label'       => __('Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('contact us', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $tab_repeater->add_control(
            'button_url',
            [
                'label'       => __('Button URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => home_url('/contact')],
            ]
        );
        $tab_repeater->add_control(
            'person_image',
            [
                'label'   => __('Person Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/man.png',
                ],
            ]
        );
        $tab_repeater->add_control(
            'person_name',
            [
                'label'       => __('Person Name', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Regina Moore', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $tab_repeater->add_control(
            'person_role',
            [
                'label'       => __('Person Role', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('CEO, trainer', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $tab_repeater->add_control(
            'sign_image',
            [
                'label'   => __('Signature Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/sign.png',
                ],
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label'       => __('Tabs Items', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $tab_repeater->get_controls(),
                'default'     => [
                    [
                        'tab_id'              => 'tech',
                        'tab_label'           => 'who we  are',
                        'tab_span_text'       => 'We believe in the power of attention to detail. Our cleaners are meticulous in their work, leaving no nook or cranny untouched.',
                        'tab_paragraph_text'  => 'Our riding school has been providing top-quality horse training and riding lessons for riders of all ages. With well-trained horses, experienced instructors, and a friendly atmosphere, we help you build confidence and riding skills step by step.',
                        'button_text'         => 'contact us',
                        'button_url'          => [ 'url' => home_url('/contact') ],
                        'person_image'        => [ 'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/man.png' ],
                        'person_name'         => 'Regina Moore',
                        'person_role'         => 'CEO, trainer',
                        'sign_image'          => [ 'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/sign.png' ],
                    ],
                    [
                        'tab_id'              => 'works',
                        'tab_label'           => 'why choose us',
                        'tab_span_text'       => 'We believe in the power of attention to detail. Our cleaners are meticulous in their work, leaving no nook or cranny untouched.',
                        'tab_paragraph_text'  => 'Our riding school has been providing top-quality horse training and riding lessons for riders of all ages. With well-trained horses, experienced instructors, and a friendly atmosphere, we help you build confidence and riding skills step by step.',
                        'button_text'         => 'contact us',
                        'button_url'          => [ 'url' => home_url('/contact-us') ],
                        'person_image'        => [ 'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/man.png' ],
                        'person_name'         => 'Regina Moore',
                        'person_role'         => 'CEO, trainer',
                        'sign_image'          => [ 'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/sign.png' ],
                    ],
                    [
                        'tab_id'              => 'ambit',
                        'tab_label'           => 'what you get',
                        'tab_span_text'       => 'We believe in the power of attention to detail. Our cleaners are meticulous in their work, leaving no nook or cranny untouched.',
                        'tab_paragraph_text'  => 'Our riding school has been providing top-quality horse training and riding lessons for riders of all ages. With well-trained horses, experienced instructors, and a friendly atmosphere, we help you build confidence and riding skills step by step.',
                        'button_text'         => 'contact us',
                        'button_url'          => [ 'url' => home_url('/contact-us') ],
                        'person_image'        => [ 'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/man.png' ],
                        'person_name'         => 'Regina Moore',
                        'person_role'         => 'CEO, trainer',
                        'sign_image'          => [ 'url' => 'https://minar.ex-coders.com/wp-content/assets/img/home-new/sign.png' ],
                    ],
                ],
                'title_field' => '{{{ tab_label }}}',
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
            <!--About-Inner Section Start -->
            <section class="about-inner-section section-padding fix">
                <div class="container">
                    <div class="about-inner-wrapper">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="about-left-item">
                                    <div class="rating-box bg-cover" style="background-image: url(<?php echo esc_url(!empty($settings['rating_bg']['url']) ? $settings['rating_bg']['url'] : ''); ?>);">
                                        <h2><?php echo esc_html($settings['rating_value']); ?></h2>
                                        <p><?php echo esc_html($settings['rating_label']); ?></p>
                                        <div class="star">
                                            <?php
                                                $stars = isset($settings['star_count']) ? (int)$settings['star_count'] : 5;
                                                for ($i = 0; $i < $stars; $i++) {
                                                    echo '<i class="fa-solid fa-star"></i>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="about-image">
                                                <img src="<?php echo esc_url(!empty($settings['left_image_1']['url']) ? $settings['left_image_1']['url'] : ''); ?>" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="about-image style-2">
                                                <img src="<?php echo esc_url(!empty($settings['left_image_2']['url']) ? $settings['left_image_2']['url'] : ''); ?>" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-content">
                                    <div class="section-title mb-0">
                                        <span class="sub-title wow fadeInUp justify-content-start">
                                            <img src="<?php echo esc_url(!empty($settings['subtitle_icon']['url']) ? $settings['subtitle_icon']['url'] : ''); ?>" alt="img">
                                            <?php echo esc_html($settings['subtitle_text']); ?>
                                        </span>
                                        <h2 class="text-anim">
                                            <?php echo esc_html($settings['main_title']); ?>
                                        </h2>
                                    </div>
                                    <ul class="nav" role="tablist">
                                        <?php
                                            $delayBase = 0.2;
                                            if (!empty($settings['tabs'])):
                                                foreach ($settings['tabs'] as $index => $tab):
                                                    $id   = !empty($tab['tab_id']) ? sanitize_title($tab['tab_id']) : 'tab-' . ($index + 1);
                                                    $label= !empty($tab['tab_label']) ? $tab['tab_label'] : 'Tab ' . ($index + 1);
                                                    $active = $index === 0 ? 'active' : '';
                                                    $delay = number_format($delayBase * ($index + 1), 1);
                                        ?>
                                        <li class="nav-item wow fadeInUp" data-wow-delay=".<?php echo esc_attr($delay); ?>s">
                                            <a href="#<?php echo esc_attr($id); ?>" data-bs-toggle="tab" class="nav-link <?php echo esc_attr($active); ?>" role="tab">
                                                <?php echo esc_html($label); ?>
                                            </a>
                                        </li>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </ul>
                                    <div class="tab-content">
                                        <?php
                                            if (!empty($settings['tabs'])):
                                                foreach ($settings['tabs'] as $index => $tab):
                                                    $id   = !empty($tab['tab_id']) ? sanitize_title($tab['tab_id']) : 'tab-' . ($index + 1);
                                                    $activeClass = $index === 0 ? 'active show' : '';
                                                    $spanText = !empty($tab['tab_span_text']) ? $tab['tab_span_text'] : '';
                                                    $paraText = !empty($tab['tab_paragraph_text']) ? $tab['tab_paragraph_text'] : '';
                                                    $btnText  = !empty($tab['button_text']) ? $tab['button_text'] : '';
                                                    $btnUrl   = !empty($tab['button_url']['url']) ? $tab['button_url']['url'] : '#';
                                                    $personImg= !empty($tab['person_image']['url']) ? $tab['person_image']['url'] : '';
                                                    $personNm = !empty($tab['person_name']) ? $tab['person_name'] : '';
                                                    $personRl = !empty($tab['person_role']) ? $tab['person_role'] : '';
                                                    $signImg  = !empty($tab['sign_image']['url']) ? $tab['sign_image']['url'] : '';
                                        ?>
                                        <div id="<?php echo esc_attr($id); ?>" class="tab-pane fade <?php echo esc_attr($activeClass); ?>" role="tabpanel">
                                            <div class="about-bootom-item">
                                                <span>
                                                    <?php echo esc_html($spanText); ?>
                                                </span>
                                                <p class="text">
                                                    <?php echo esc_html($paraText); ?>
                                                </p>
                                                <div class="about-button-item">
                                                    <a href="<?php echo esc_url($btnUrl); ?>" class="theme-btn">
                                                    <?php echo esc_html($btnText); ?>
                                                    </a>
                                                    <div class="right-info-item">
                                                        <div class="info-item">
                                                            <?php if (!empty($personImg)): ?>
                                                            <img src="<?php echo esc_url($personImg); ?>" alt="img">
                                                            <?php endif; ?>
                                                                <div class="cont">
                                                                <p><?php echo esc_html($personNm); ?></p>
                                                                <span><?php echo esc_html($personRl); ?></span>
                                                            </div>
                                                        </div>
                                                        <?php if (!empty($signImg)): ?>
                                                        <img src="<?php echo esc_url($signImg); ?>" alt="img">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
} 
$widgets_manager->register(new about_inner_section());
