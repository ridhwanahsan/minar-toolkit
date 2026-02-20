<?php
namespace minar_toolkit\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;

if (! defined('ABSPATH')) {
    exit;
}

class header_2 extends Widget_Base
{

    public function get_name()
    {
        return 'minar-header-21';
    }

    public function get_title()
    {
        return __('Header Two', 'minar-toolkit');
    }

    public function get_icon()
    {
        return 'eicon-elementor';
    }

    public function get_categories()
    {
        return ['header_footer'];
    }

    protected function register_controls()
    {
        $this->register_controls_section();
        $this->style_tab_content();
    }

    protected function register_controls_section() 
    {
        $this->start_controls_section(
            'header_menu_section',
            [
                'label' => __('Header Menu', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'logo',
            [
                'label'   => __('Logo', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/logo-black.png',
                ],
            ]
        );
           // Language switcher control
        $this->add_control(
            'show_language_switcher',
            [
                'label'        => __('Show Language Switcher', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        ); 


        $this->add_control(
            'profile_link',
            [
                'label'       => __('Profile Link', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'placeholder' => 'https://your-profile-link.com',
                'default'     => [
                    'url' => '/',
                ],
            ]
        );
        $this->add_control(
            'cart_link',
            [
                'label'       => __('Cart Link', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'placeholder' => 'https://your-cart-link.com',
                'default'     => [
                    'url' => '/',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_item_text',
            [
                'label'   => __('Menu Text', 'minar-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Menu Item', 'minar-toolkit'),
            ]
        );

        $repeater->add_control(
            'menu_item_link',
            [
                'label'       => __('Menu Link', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );

        $repeater->add_control(
            'is_active',
            [
                'label'        => __('Active Item?', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Yes', 'minar-toolkit'),
                'label_off'    => __('No', 'minar-toolkit'),
                'return_value' => 'current-menu-item',
                'default'      => '',
            ]
        );

        $this->add_control(
            'header_menu_list',
            [
                'label'       => __('Menu List', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'menu_item_text' => __('Home', 'minar-toolkit'),
                        'menu_item_link' => ['url' => '/'],
                        'is_active'      => 'current-menu-item',
                    ],
                    [
                        'menu_item_text' => __('Our Mission', 'minar-toolkit'),
                        'menu_item_link' => ['url' => './our-mission.html'],
                    ],
                    [
                        'menu_item_text' => __('Products', 'minar-toolkit'),
                        'menu_item_link' => ['url' => './product.html'],
                    ],
                    [
                        'menu_item_text' => __('Blog', 'minar-toolkit'),
                        'menu_item_link' => ['url' => './blog.html'],
                    ],
                    [
                        'menu_item_text' => __('Vanish', 'minar-toolkit'),
                        'menu_item_link' => ['url' => './vanish.html'],
                    ],
                    [
                        'menu_item_text' => __('Contact Us', 'minar-toolkit'),
                        'menu_item_link' => ['url' => './contact.html'],
                    ],
                ],
                'title_field' => '{{{ menu_item_text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'offcanvas_section',
            [
                'label' => __('Off-canvas', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'offcanvas_logo',
            [
                'label'   => __('Off-canvas Logo', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/offcanvas-logo.png',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_text',
            [
                'label'   => __('Menu Text', 'minar-toolkit'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Menu Item', 'minar-toolkit'),
            ]
        );

        $repeater->add_control(
            'menu_link',
            [
                'label' => __('Menu Link', 'minar-toolkit'),
                'type'  => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );

        $repeater->add_control(
            'menu_icon',
            [
                'label' => __('Menu Icon', 'minar-toolkit'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'offcanvas_menu_list',
            [
                'label'       => __('Menu List', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'menu_text' => __('Home', 'minar-toolkit'),
                        'menu_link' => ['url' => '/'],
                        'menu_icon' => ['url' => get_stylesheet_directory_uri() . '/assets/images/menu-icon/home.svg'],
                    ],
                    [
                        'menu_text' => __('Our Mission', 'minar-toolkit'),
                        'menu_link' => ['url' => '/our-mission.html'],
                        'menu_icon' => ['url' => get_stylesheet_directory_uri() . '/assets/images/menu-icon/our-mission.svg'],
                    ],
                    [
                        'menu_text' => __('Products', 'minar-toolkit'),
                        'menu_link' => ['url' => '/product.html'],
                        'menu_icon' => ['url' => get_stylesheet_directory_uri() . '/assets/images/menu-icon/product.svg'],
                    ],
                    [
                        'menu_text' => __('Blog', 'minar-toolkit'),
                        'menu_link' => ['url' => '/blog.html'],
                        'menu_icon' => ['url' => get_stylesheet_directory_uri() . '/assets/images/menu-icon/blogs.svg'],
                    ],
                    [
                        'menu_text' => __('Vanish', 'minar-toolkit'),
                        'menu_link' => ['url' => '/vanish.html'],
                        'menu_icon' => ['url' => get_stylesheet_directory_uri() . '/assets/images/menu-icon/vanish.svg'],
                    ],
                    [
                        'menu_text' => __('Contact', 'minar-toolkit'),
                        'menu_link' => ['url' => '/contact.html'],
                        'menu_icon' => ['url' => get_stylesheet_directory_uri() . '/assets/images/menu-icon/contact.svg'],
                    ],
                ],
                'title_field' => '{{{ menu_text }}}',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Style Tab Content Section
     * ------------------------
     */
    protected function style_tab_content()
    {

        // Header Style Section
        $this->start_controls_section(
            'header_style_section',
            [
                'label' => __('Header Style', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Header background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'header_background',
                'label'    => __('Header Background', 'minar-toolkit'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header',
            ]
        );

        // Header top spacing
        $this->add_responsive_control(
            'header_top_spacing',
            [
                'label'      => __('Header Top Spacing', 'minar-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'size' => 60,
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .header' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Nav container background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'nav_background',
                'label'    => __('Nav Background', 'minar-toolkit'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header .nav',
            ]
        );

        // Nav border radius
        $this->add_responsive_control(
            'nav_border_radius',
            [
                'label'      => __('Nav Border Radius', 'minar-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .header .nav' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Nav box shadow
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'nav_border',
                'label'    => __('Nav Border', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .header .nav',
            ]
        );

        /* === Standalone WP Menu (defult-header) === */
        // Menu wrapper
        $this->add_control(
            'menu_wrapper_style_heading',
            [
                'label' => __('Menu Wrapper (defult-header)', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'menu_wrapper_typography',
                'label'    => __('Menu Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .defult-header',
            ]
        );
        $this->add_control(
            'menu_link_color',
            [
                'label'     => __('Menu Link Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .defult-header li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'menu_link_hover_color',
            [
                'label'     => __('Menu Link Hover/Active Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF8000',
                'selectors' => [
                    '{{WRAPPER}} .defult-header li a:hover,
                     {{WRAPPER}} .defult-header li.current-menu-item > a,
                     {{WRAPPER}} .defult-header li.current_page_parent > a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_item_gap',
            [
                'label'      => __('Menu Item Gap', 'minar-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'size' => 15,
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .defult-header' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_item_padding',
            [
                'label'      => __('Menu Item Padding', 'minar-toolkit'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'default'    => [
                    'top'    => 0,
                    'right'  => 16,
                    'bottom' => 0,
                    'left'   => 16,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .defult-header li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Submenu
        $this->add_control(
            'submenu_style_heading',
            [
                'label'     => __('Submenu', 'minar-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'submenu_background',
            [
                'label'     => __('Submenu Background', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .defult-header li .sub-menu' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'submenu_link_color',
            [
                'label'     => __('Submenu Link Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .defult-header li .sub-menu li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_min_width',
            [
                'label'      => __('Submenu Min Width', 'minar-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 100,
                        'max'  => 400,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'size' => 200,
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .defult-header li .sub-menu' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_item_padding',
            [
                'label'      => __('Submenu Item Padding', 'minar-toolkit'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'default'    => [
                    'top'    => 8,
                    'right'  => 16,
                    'bottom' => 8,
                    'left'   => 16,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .defult-header li .sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'submenu_box_shadow',
                'label'    => __('Submenu Box Shadow', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .defult-header li .sub-menu',
            ]
        );

        // Language select color
        $this->add_control(
            'language_select_color',
            [
                'label'     => __('Language Select Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .header .nav__language' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Off-canvas Style Section
        $this->start_controls_section(
            'offcanvas_style_section',
            [
                'label' => __('Off-canvas Style', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Off-canvas background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'offcanvas_background',
                'label'    => __('Off-canvas Background', 'minar-toolkit'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .offcanvas',
            ]
        );

        // Off-canvas padding
        $this->add_responsive_control(
            'offcanvas_padding',
            [
                'label'      => __('Off-canvas Padding', 'minar-toolkit'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .offcanvas' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Off-canvas close button color
        $this->add_control(
            'offcanvas_close_color',
            [
                'label'     => __('Close Button Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .offcanvas__close' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Off-canvas menu link typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'offcanvas_menu_typography',
                'label'    => __('Off-canvas Menu Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .offcanvas .nav__link',
            ]
        );

        // Off-canvas menu link color
        $this->add_control(
            'offcanvas_menu_link_color',
            [
                'label'     => __('Off-canvas Menu Link Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .offcanvas .nav__link' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Off-canvas menu link hover color
        $this->add_control(
            'offcanvas_menu_link_hover_color',
            [
                'label'     => __('Off-canvas Menu Link Hover Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF8000',
                'selectors' => [
                    '{{WRAPPER}} .offcanvas .nav__link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Off-canvas logo max width
        $this->add_responsive_control(
            'offcanvas_logo_width',
            [
                'label'      => __('Off-canvas Logo Width', 'minar-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 500,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .offcanvas__logo-img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Off-canvas menu icon size
        $this->add_responsive_control(
            'offcanvas_menu_icon_size',
            [
                'label'      => __('Menu Icon Size', 'minar-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .offcanvas .nav__item img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); 
        ?>
                  <!-- Starting of the Header One Area Here -->
                <header class="header header--style-2">
                    <div class="header__container container">
                        <nav class="nav">
                            <div class="nav__logo">
                               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__link">
                                    <img src="<?php echo esc_url( $settings['logo']['url'] ); ?>" alt="Logo" class="nav__logo-img">
                                </a>
                            </div>

                            <ul class="nav__menu">
                               <?php
                                if(has_nav_menu('primary')){ 
                                    wp_nav_menu( [ 
                                        'menu'            => 'primary',
                                        'theme_location'  => 'primary',
                                        'container'       => '',
                                        'container_class' => '',
                                        'depth'           => 3,
                                        'menu_id'         => 'menu-main-menu',
                                        'menu_class'      => 'defult-header',
                                        'fallback_cb'     => false,
                                        ]
                                    );
                                }
                            ?>
                            </ul>

                            <div class="nav__btn-wrap">
                                <?php if ( 'yes' === $settings['show_language_switcher'] ) : ?>
                                    <div class="nav__lang">
                                        <select class="nav__language" name="lang" id="language">
                                            <option value="eng">Eng</option>
                                            <option value="Dutch">Dutch</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <div class="nav__user-profile">
                                    <a href="<?php echo esc_url( $settings['profile_link']['url'] ); ?>" class="nav__user-profile-link">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 11C9.99163 11 9.12843 10.641 8.41038 9.92291C7.69232 9.20486 7.33329 8.34166 7.33329 7.33333C7.33329 6.325 7.69232 5.4618 8.41038 4.74375C9.12843 4.02569 9.99163 3.66666 11 3.66666C12.0083 3.66666 12.8715 4.02569 13.5895 4.74375C14.3076 5.4618 14.6666 6.325 14.6666 7.33333C14.6666 8.34166 14.3076 9.20486 13.5895 9.92291C12.8715 10.641 12.0083 11 11 11ZM3.66663 16.5V15.7667C3.66663 15.2472 3.80046 14.7699 4.06813 14.3348C4.33579 13.8997 4.69085 13.5673 5.13329 13.3375C6.08051 12.8639 7.04301 12.5088 8.02079 12.2723C8.99857 12.0358 9.99163 11.9173 11 11.9167C12.0083 11.9161 13.0013 12.0346 13.9791 12.2723C14.9569 12.5101 15.9194 12.8651 16.8666 13.3375C17.3097 13.5667 17.665 13.8991 17.9327 14.3348C18.2004 14.7706 18.3339 15.2478 18.3333 15.7667V16.5C18.3333 17.0042 18.1539 17.4359 17.7952 17.7952C17.4365 18.1546 17.0047 18.3339 16.5 18.3333H5.49996C4.99579 18.3333 4.56435 18.154 4.20563 17.7952C3.8469 17.4365 3.66724 17.0048 3.66663 16.5ZM5.49996 16.5H16.5V15.7667C16.5 15.5986 16.4581 15.4458 16.3744 15.3083C16.2907 15.1708 16.1797 15.0639 16.0416 14.9875C15.2166 14.575 14.384 14.2658 13.5437 14.0598C12.7034 13.8539 11.8555 13.7506 11 13.75C10.1444 13.7494 9.29649 13.8527 8.45621 14.0598C7.61593 14.267 6.78329 14.5762 5.95829 14.9875C5.82079 15.0639 5.70988 15.1708 5.62554 15.3083C5.54121 15.4458 5.49935 15.5986 5.49996 15.7667V16.5ZM11 9.16666C11.5041 9.16666 11.9359 8.9873 12.2952 8.62858C12.6545 8.26986 12.8339 7.83811 12.8333 7.33333C12.8327 6.82855 12.6533 6.39711 12.2952 6.039C11.9371 5.68089 11.5053 5.50122 11 5.5C10.4946 5.49878 10.0631 5.67844 9.70563 6.039C9.34813 6.39955 9.16846 6.831 9.16663 7.33333C9.16479 7.83566 9.34446 8.26741 9.70563 8.62858C10.0668 8.98975 10.4982 9.16911 11 9.16666Z"
                                                fill="black" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="nav__user-cart">
                                    <a href="<?php echo esc_url( $settings['cart_link']['url'] ); ?>" class="nav__user-cart-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none">
                                            <path
                                                d="M16.3019 5.83333C16.3466 5.57795 16.3349 5.31586 16.2676 5.06547C16.2003 4.81508 16.079 4.58246 15.9123 4.38393C15.7455 4.1854 15.5373 4.02577 15.3023 3.91626C15.0673 3.80675 14.8112 3.75 14.5519 3.75H5.44854C5.18926 3.75 4.93313 3.80675 4.69812 3.91626C4.4631 4.02577 4.2549 4.1854 4.08814 4.38393C3.92137 4.58246 3.80008 4.81508 3.73278 5.06547C3.66547 5.31586 3.65379 5.57795 3.69854 5.83333M14.5835 3.75C14.6069 3.53333 14.6194 3.42583 14.6194 3.33666C14.6203 2.92474 14.4686 2.52708 14.1936 2.22038C13.9186 1.91369 13.5398 1.7197 13.1302 1.67583C13.0419 1.66666 12.9335 1.66666 12.7169 1.66666H7.28354C7.06687 1.66666 6.95771 1.66666 6.86938 1.67583C6.45979 1.7197 6.08097 1.91369 5.80598 2.22038C5.53098 2.52708 5.37931 2.92474 5.38021 3.33666C5.38021 3.42583 5.39188 3.53416 5.41604 3.75"
                                                stroke="white" stroke-width="1.5" />
                                            <path
                                                d="M12.5001 15H7.50011M17.6618 13.9942C17.3701 16.0608 17.2243 17.095 16.4768 17.7142C15.7293 18.3333 14.6268 18.3333 12.4209 18.3333H7.57928C5.37428 18.3333 4.27095 18.3333 3.52345 17.7142C2.77595 17.095 2.63011 16.0617 2.33844 13.9942L1.98678 11.4942C1.61428 8.85749 1.42844 7.53999 2.21844 6.68583C3.00844 5.83333 4.41511 5.83333 7.22678 5.83333H12.7734C15.5851 5.83333 16.9918 5.83333 17.7818 6.68666C18.4051 7.36083 18.4209 8.32499 18.2159 9.99999"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </a>
                                </div>
                                <button id="offcanvas-toggle" class="nav__toggle" aria-label="Toggle navigation">
                                    <svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.66667 0H21.6667C22.1087 0 22.5326 0.175595 22.8452 0.488155C23.1577 0.800716 23.3333 1.22464 23.3333 1.66667C23.3333 2.10869 23.1577 2.53262 22.8452 2.84518C22.5326 3.15774 22.1087 3.33333 21.6667 3.33333H1.66667C1.22464 3.33333 0.800716 3.15774 0.488155 2.84518C0.175595 2.53262 0 2.10869 0 1.66667C0 1.22464 0.175595 0.800716 0.488155 0.488155C0.800716 0.175595 1.22464 0 1.66667 0V0ZM1.66667 13.3333H21.6667C22.1087 13.3333 22.5326 13.5089 22.8452 13.8215C23.1577 14.134 23.3333 14.558 23.3333 15C23.3333 15.442 23.1577 15.8659 22.8452 16.1785C22.5326 16.4911 22.1087 16.6667 21.6667 16.6667H1.66667C1.22464 16.6667 0.800716 16.4911 0.488155 16.1785C0.175595 15.8659 0 15.442 0 15C0 14.558 0.175595 14.134 0.488155 13.8215C0.800716 13.5089 1.22464 13.3333 1.66667 13.3333ZM1.66667 6.66667H21.6667C22.1087 6.66667 22.5326 6.84226 22.8452 7.15482C23.1577 7.46738 23.3333 7.89131 23.3333 8.33333C23.3333 8.77536 23.1577 9.19928 22.8452 9.51184C22.5326 9.8244 22.1087 10 21.6667 10H1.66667C1.22464 10 0.800716 9.8244 0.488155 9.51184C0.175595 9.19928 0 8.77536 0 8.33333C0 7.89131 0.175595 7.46738 0.488155 7.15482C0.800716 6.84226 1.22464 6.66667 1.66667 6.66667Z"
                                            fill="black" />
                                    </svg>
                                </button>
                            </div>
                        </nav>
                    </div>
                </header>
                <!-- End of the Header One Area Here -->

                     <!-- Starting of the offcanvas Area Here-->
            <div class="offcanvas offcanvas--style-1">
                <div class="offcanvas__header">
                <button id="offcanvas-close" class="offcanvas__close" aria-label="Close navigation">
                    &times;
                </button>
                </div>

                <div class="offcanvas__logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="offcanvas__logo-link">
                    <img src="<?php echo esc_url( $settings['offcanvas_logo']['url'] ); ?>" alt="Logo" class="offcanvas__logo-img">
                </a>
                </div>

                <ul id="offcanvas-nav-menu" class="nav__menu">
                <?php
                foreach ( $settings['offcanvas_menu_list'] as $item ) :
                    $target   = $item['menu_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $item['menu_link']['nofollow'] ? ' rel="nofollow"' : '';
                    ?>
                    <li class="nav__item">
                        <a href="<?php echo esc_url( $item['menu_link']['url'] ); ?>" class="nav__link"<?php echo $target . $nofollow; ?>>
                            <?php echo esc_html( $item['menu_text'] ); ?>
                        </a>
                        <?php if ( ! empty( $item['menu_icon']['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $item['menu_icon']['url'] ); ?>" alt="icon">
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <!-- End of the offcanvas Area Here-->
        <?php
    }
}
$widgets_manager->register(new header_2());
