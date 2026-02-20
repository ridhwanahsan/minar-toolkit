<?php
namespace minar_toolkit\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if (! defined('ABSPATH')) {
    exit;
}

class news_section_grid extends Widget_Base
{
    public function get_name()
    {
        return 'news_section_grid';
    }

    public function get_title()
    {
        return __('News Section Grid', 'minar-toolkit');
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
        // Content Section
        $this->start_controls_section(
            'news_content_section',
            [
                'label' => __('News Content', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Section Subtitle
        $this->add_control(
            'news_subtitle',
            [
                'label' => __('Subtitle', 'minar-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('news & blog', 'minar-toolkit'),
            ]
        );

        // Section Title
        $this->add_control(
            'news_title',
            [
                'label' => __('Title', 'minar-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('latest news <span> & article</span>', 'minar-toolkit'),
            ]
        );

        // Button Text
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'minar-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('view all news', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'minar-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'minar-toolkit'),
                'default' => [
                    'url' => home_url('/blog'),
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __('Button Icon Class', 'minar-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => 'fa-solid fa-arrow-up-right',
            ]
        );

        // Query Controls
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Number of Posts', 'minar-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 12,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'minar-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => __('Date', 'minar-toolkit'),
                    'title' => __('Title', 'minar-toolkit'),
                    'name' => __('Slug', 'minar-toolkit'),
                    'modified' => __('Last Modified', 'minar-toolkit'),
                    'comment_count' => __('Comment Count', 'minar-toolkit'),
                    'rand' => __('Random', 'minar-toolkit'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'minar-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC' => __('ASC', 'minar-toolkit'),
                    'DESC' => __('DESC', 'minar-toolkit'),
                ],
            ]
        );

        // Category Filter
        $this->add_control(
            'category',
            [
                'label' => __('Filter by Category', 'minar-toolkit'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_post_categories(),
                'label_block' => true,
            ]
        );

        // Author Info
        $this->add_control(
            'show_author',
            [
                'label' => __('Show Author Info', 'minar-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'minar-toolkit'),
                'label_off' => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_date',
            [
                'label' => __('Show Date', 'minar-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'minar-toolkit'),
                'label_off' => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_category',
            [
                'label' => __('Show Category', 'minar-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'minar-toolkit'),
                'label_off' => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
        // Section Style
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Section', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .news-section',
            ]
        );

        $this->add_control(
            'section_padding',
            [
                'label' => __('Padding', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-padding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_margin',
            [
                'label' => __('Margin', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .news-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'section_border',
                'selector' => '{{WRAPPER}} .news-section',
            ]
        );

        $this->end_controls_section();

        // Subtitle Style
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => __('Subtitle', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_shape_color',
            [
                'label' => __('Shape Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h6::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .section-title h6::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .section-title h6',
            ]
        );

        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_span_color',
            [
                'label' => __('Span Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero_title',
            ]
        );

        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'button_style',
            [
                'label' => __('Button', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .theme-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .theme-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Hover Background', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .theme-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Hover Text Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .theme-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .section-title-area .theme-btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .section-title-area .theme-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-title-area .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // News Box Style
        $this->start_controls_section(
            'news_box_style',
            [
                'label' => __('News Box', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'news_box_bg',
            [
                'label' => __('Background Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-main-box-items' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'news_box_padding',
            [
                'label' => __('Padding', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .news-main-box-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'news_box_margin',
            [
                'label' => __('Margin', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .news-main-box-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'news_box_border',
                'selector' => '{{WRAPPER}} .news-main-box-items',
            ]
        );

        $this->add_control(
            'news_box_border_radius',
            [
                'label' => __('Border Radius', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .news-main-box-items' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Post Title Style
        $this->start_controls_section(
            'post_title_style',
            [
                'label' => __('Post Title', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'post_title_color',
            [
                'label' => __('Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'post_title_hover_color',
            [
                'label' => __('Hover Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'post_title_typography',
                'selector' => '{{WRAPPER}} .news-content h3',
            ]
        );

        $this->end_controls_section();

        // Author Info Style
        $this->start_controls_section(
            'author_info_style',
            [
                'label' => __('Author Info', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'author_name_color',
            [
                'label' => __('Author Name Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client-content .name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'author_label_color',
            [
                'label' => __('Author Label Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client-content p:not(.name)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_name_typography',
                'selector' => '{{WRAPPER}} .client-content .name',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_label_typography',
                'selector' => '{{WRAPPER}} .client-content p:not(.name)',
            ]
        );

        $this->end_controls_section();

        // Meta Info Style
        $this->start_controls_section(
            'meta_info_style',
            [
                'label' => __('Meta Info', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __('Category Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-content ul li span:first-child' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __('Date Color', 'minar-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-content ul li span.color-2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .news-content ul li span',
            ]
        );

        $this->end_controls_section();

        // Image Style
        $this->start_controls_section(
            'image_style',
            [
                'label' => __('Post Image', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => __('Image Height', 'minar-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .news-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .news-image img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'minar-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .news-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Get Post Categories for Select2
    protected function get_post_categories()
    {
        $categories = get_categories([
            'hide_empty' => true,
        ]);

        $options = [];
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                $options[$category->term_id] = $category->name;
            }
        }
        return $options;
    }

    // Get Posts Query
    protected function get_posts_query()
    {
        $settings = $this->get_settings_for_display();

        $args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'orderby' => $settings['orderby'],
            'order' => $settings['order'],
            'post_status' => 'publish',
        ];

        // Add category filter if selected
        if (!empty($settings['category'])) {
            $args['category__in'] = $settings['category'];
        }

        return new \WP_Query($args);
    }

    // Function to break title after 8 words
    protected function format_post_title($title)
    {
        $words = explode(' ', $title);
        if (count($words) > 8) {
            $first_line = implode(' ', array_slice($words, 0, 7));
            $second_line = implode(' ', array_slice($words, 7));
            return $first_line . '<br>' . $second_line;
        }
        return $title;
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $posts_query = $this->get_posts_query();
        ?> 
            <!--News Section Start -->
            <section class="news-section section-padding fix">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/01.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/01.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/01.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/01.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/01.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/horse-club-events-you-dont-want-to-miss/' ) ); ?>">
                                        Horse Club Events You Don’t Want to Miss
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/horse-club-events-you-dont-want-to-miss/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/02.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/02.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/02.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/02.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/02.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/how-to-get-kids-started-with-riding-lessons/' ) ); ?>">
                                            How to Get Kids Started With Riding Lessons
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/how-to-get-kids-started-with-riding-lessons/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/03.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/03.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/03.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/03.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/03.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/benefits-of-joining-a-horse-club-community/' ) ); ?>">
                                            Benefits of Joining a Horse Club Community
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/benefits-of-joining-a-horse-club-community/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 ">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/04.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/04.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/04.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/04.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/04.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/preparing-your-horse-for-competition-essential-tips/' ) ); ?>">
                                            Preparing Your Horse for Competition: Essential Tips
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/preparing-your-horse-for-competition-essential-tips/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/05.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/05.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/05.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/05.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/05.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/essential-gear-every-beginner-rider-should/' ) ); ?>">
                                            Essential Gear Every Beginner Rider Should
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/essential-gear-every-beginner-rider-should/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/06.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/06.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/06.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/06.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/06.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/top-costly-mistakes-new-riders-should-avoid-early/' ) ); ?>">
                                            Top Costly Mistakes New Riders Should Avoid Early
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/top-costly-mistakes-new-riders-should-avoid-early/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/07.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/07.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/07.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/07.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/07.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/choosing-the-right-gear-for-riding/' ) ); ?>">
                                            Choosing the Right Gear for Riding
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/choosing-the-right-gear-for-riding/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/08.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/08.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/08.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/08.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/08.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/emotional-benefits-of-horseback-raiding/' ) ); ?>">
                                            Emotional Benefits of Horseback Raiding
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/emotional-benefits-of-horseback-raiding/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <img src="https://minar.ex-coders.com/wp-content/assets/img/home-1/news/09.jpg" alt="img">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/09.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/09.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/09.jpg');"></div>
                                        <div class="news-layer-image" style="background-image: url('https://minar.ex-coders.com/wp-content/assets/img/home-1/news/09.jpg');"></div>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/how-to-make-strong-bond-with-your-horse/' ) ); ?>">
                                            How to Make Strong Bond with Your Horse
                                        </a>
                                    </h3>
                                    <ul class="date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i>
                                            19 Comments
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo esc_url( home_url( '/how-to-make-strong-bond-with-your-horse/' ) ); ?>" class="theme-btn">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
        <?php
    }
} 
$widgets_manager->register(new news_section_grid());
