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

class why_choose_us extends Widget_Base
{
    public function get_name()
    {
        return 'why_choose_us';
    }

    public function get_title()
    {
        return __('Why Choose Us', 'minar-toolkit');
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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Why choose us', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'title_prefix',
            [
                'label' => esc_html__('Title Prefix', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('We Fixed the', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'title_highlight',
            [
                'label' => esc_html__('Title Highlight', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Biggest Annoyance', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'title_suffix',
            [
                'label' => esc_html__('Title Suffix', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('in Colouring', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'subtitle_text',
            [
                'label' => esc_html__('Subtitle Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Because your offline break should feel calming, not stressful.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'desc_1',
            [
                'label' => esc_html__('Description 1', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Colouring is supposed to help you unwind, but thin paper, bleed-through, and messy pages usually ruin the moment.', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'desc_2',
            [
                'label' => esc_html__('Description 2', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We redesigned the entire experience — with thicker pages, smarter layouts, and tools that let you fully relax and enjoy your break without worrying about the ink.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_1_title',
            [
                'label' => esc_html__('Orbit 1 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Snap-lock technology & Reinforcement sticker', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_1_text',
            [
                'label' => esc_html__('Orbit 1 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('rope won’t tear the protective sheet', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_2_title',
            [
                'label' => esc_html__('Orbit 2 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Thick 200gsm pages', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_2_text',
            [
                'label' => esc_html__('Orbit 2 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('colours stay crisp with zero bleed-through.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_3_title',
            [
                'label' => esc_html__('Orbit 3 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Bookmark', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_3_text',
            [
                'label' => esc_html__('Orbit 3 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('can easily find where you left before', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_4_title',
            [
                'label' => esc_html__('Orbit 4 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Protective sheet included', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_4_text',
            [
                'label' => esc_html__('Orbit 4 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('use your markers freely.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_5_title',
            [
                'label' => esc_html__('Orbit 5 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Modern, gender-neutral illustrations', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_5_text',
            [
                'label' => esc_html__('Orbit 5 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('enjoyable for anyone.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_6_title',
            [
                'label' => esc_html__('Orbit 6 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Spiral Binding', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_6_text',
            [
                'label' => esc_html__('Orbit 6 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Easily lays flat while coloring.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'orbit_7_title',
            [
                'label' => esc_html__('Orbit 7 Title', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('300 GSM matt finished paper', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'orbit_7_text',
            [
                'label' => esc_html__('Orbit 7 Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('matte-finish cover for a smooth, durable feel.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Shop Vini', 'minar-toolkit'),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'default' => [
                    'url' => '/',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'book_image',
            [
                'label' => esc_html__('Book Image', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'book_image_responsive',
            [
                'label' => esc_html__('Book Image (Responsive)', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();
    }

    protected function style_tab_content()
    {
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'minar-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'selector' => '{{WRAPPER}} .why-choose-us__subtitle',
            ]
        );
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'selector' => '{{WRAPPER}} .why-choose-us__title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_highlight_color',
            [
                'label' => esc_html__('Title Highlight Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__title span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_text_typo',
                'selector' => '{{WRAPPER}} .why-choose-us__subtitle-text',
            ]
        );
        $this->add_control(
            'subtitle_text_color',
            [
                'label' => esc_html__('Subtitle Text Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__subtitle-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'selector' => '{{WRAPPER}} .why-choose-us__desc',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__('Description Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'orbit_title_typo',
                'selector' => '{{WRAPPER}} .orbit__text-box-title',
            ]
        );
        $this->add_control(
            'orbit_title_color',
            [
                'label' => esc_html__('Orbit Title Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .orbit__text-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'orbit_text_typo',
                'selector' => '{{WRAPPER}} .orbit__text-box-text',
            ]
        );
        $this->add_control(
            'orbit_text_color',
            [
                'label' => esc_html__('Orbit Text Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .orbit__text-box-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'orbit_box_background',
                'label' => esc_html__('Orbit Box Background', 'minar-toolkit'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .orbit__text-box',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'selector' => '{{WRAPPER}} .why-choose-us__btn',
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-us__btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => esc_html__('Button Background', 'minar-toolkit'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .why-choose-us__btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => esc_html__('Section Background', 'minar-toolkit'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .why-choose-us',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
                 
            <!-- Why Choose Us Start Here -->
    <section class="why-choose-us">
      <div class="why-choose-us__container container">
        <div class="why-choose-us__header">
          <div class="why-choose-us__subtitle-wrap">
            <p class="why-choose-us__subtitle subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p>
          </div>
          <h2 class="why-choose-us__title title-2"><?php echo esc_html( $settings['title_prefix'] ); ?> <span class="highlight"><?php echo esc_html( $settings['title_highlight'] ); ?></span> <?php echo esc_html( $settings['title_suffix'] ); ?></h2>
          <p class="why-choose-us__subtitle-text subtitle-text"><?php echo esc_html( $settings['subtitle_text'] ); ?>
          </p>

          <p class="why-choose-us__desc"><?php echo esc_html( $settings['desc_1'] ); ?></p>
          <p class="why-choose-us__desc"><?php echo esc_html( $settings['desc_2'] ); ?></p>
        </div>
        <div class="why-choose-us__orbit-area">
          <div class="orbit__rotating">
            <div class="orbit__text-box orbit__text-box--1">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_1_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_1_text'] ); ?></span>
            </div>
            <div class="orbit__text-box orbit__text-box--2">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_2_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_2_text'] ); ?></span>
            </div>
            <div class="orbit__text-box orbit__text-box--3">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_3_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_3_text'] ); ?></span>
            </div>
            <div class="orbit__text-box orbit__text-box--4">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_4_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_4_text'] ); ?></span>
            </div>
            <div class="orbit__text-box orbit__text-box--5">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_5_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_5_text'] ); ?></span>
            </div>
            <div class="orbit__text-box orbit__text-box--6">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_6_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_6_text'] ); ?></span>
            </div>
            <div class="orbit__text-box orbit__text-box--7">
              <span class="orbit__text-box-title"><?php echo esc_html( $settings['orbit_7_title'] ); ?></span>
              <span class="orbit__text-box-text"><?php echo esc_html( $settings['orbit_7_text'] ); ?></span>
            </div>
            <img src="<?php echo esc_url( !empty($settings['book_image_responsive']['url']) ? $settings['book_image_responsive']['url'] : get_template_directory_uri() . '/assets/images/book-orbit-responsive.png' ); ?>" alt=""
              class="why-choose-us__book why-choose-us__book--responsive">
          </div>
          <img src="<?php echo esc_url( !empty($settings['book_image']['url']) ? $settings['book_image']['url'] : get_template_directory_uri() . '/assets/images/book-orbit.png' ); ?>" alt="" class="why-choose-us__book">
        </div>

        <div class="why-choose-us__btn-wrap">
          <a href="<?php echo esc_url( !empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '/' ); ?>" class="why-choose-us__btn btn btn--primary"><?php echo esc_html( $settings['button_text'] ); ?></a>
        </div>
      </div>
    </section>
    <!-- Why Choose Us End Here -->
        <?php
    }
} 
$widgets_manager->register(new why_choose_us());
