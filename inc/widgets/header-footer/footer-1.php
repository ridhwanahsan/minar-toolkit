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

class minar_footer_1 extends Widget_Base
{

    public function get_name()
    {
        return 'minar-footer-1';
    }

    public function get_title()
    {
        return __('Footer One', 'minar-toolkit');
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
            'content_section',
            [
                'label' => __('Content', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo_image',
            [
                'label'   => __('Logo Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/logo-white.png',
                ],
            ]
        );

        $this->add_control(
            'logo_alt',
            [
                'label'       => __('Logo Alt Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Minar Ease', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __('Description', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Minar Ease brings back the simple things that make you feel human again — quiet moments, creativity, and space for your mind to rest.', 'minar-toolkit'),
                'rows'        => 3,
            ]
        );

        $this->add_control(
            'social_heading',
            [
                'label' => __('Social Links', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'social_facebook_url',
            [
                'label'       => __('Facebook URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'social_twitter_url',
            [
                'label'       => __('Twitter/X URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'social_linkedin_url',
            [
                'label'       => __('LinkedIn URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'social_reddit_url',
            [
                'label'       => __('Reddit URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'social_instagram_url',
            [
                'label'       => __('Instagram URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'lists_heading',
            [
                'label' => __('Link Sections', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'show_explore',
            [
                'label'        => __('Explore Section', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'show_products',
            [
                'label'        => __('Products Section', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'show_contact',
            [
                'label'        => __('Contact Section', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'explore_title',
            [
                'label'       => __('Explore Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Explore', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $explore_repeater = new Repeater();
        $explore_repeater->add_control(
            'explore_link_text',
            [
                'label'       => __('Link Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Item', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $explore_repeater->add_control(
            'explore_link_url',
            [
                'label'       => __('Link URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'explore_links',
            [
                'label'       => __('Explore Links', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $explore_repeater->get_controls(),
                'default'     => [
                    [ 'explore_link_text' => 'Home',        'explore_link_url' => ['url' => '#'] ],
                    [ 'explore_link_text' => 'Our Mission', 'explore_link_url' => ['url' => '#'] ],
                    [ 'explore_link_text' => 'Products',    'explore_link_url' => ['url' => '#'] ],
                    [ 'explore_link_text' => 'Blog',        'explore_link_url' => ['url' => '#'] ],
                ],
                'title_field' => '{{{ explore_link_text }}}',
            ]
        );

        $this->add_control(
            'products_title',
            [
                'label'       => __('Products Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Products', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $products_repeater = new Repeater();
        $products_repeater->add_control(
            'product_link_text',
            [
                'label'       => __('Link Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Vini', 'minar-toolkit'),
                'label_block' => true,
            ]
        );
        $products_repeater->add_control(
            'product_link_url',
            [
                'label'       => __('Link URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'products_links',
            [
                'label'       => __('Products Links', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $products_repeater->get_controls(),
                'default'     => [
                    [ 'product_link_text' => 'Vini', 'product_link_url' => ['url' => '#'] ],
                    [ 'product_link_text' => 'Vini', 'product_link_url' => ['url' => '#'] ],
                    [ 'product_link_text' => 'Vini', 'product_link_url' => ['url' => '#'] ],
                    [ 'product_link_text' => 'Vini', 'product_link_url' => ['url' => '#'] ],
                ],
                'title_field' => '{{{ product_link_text }}}',
            ]
        );

        $this->add_control(
            'contact_title',
            [
                'label'       => __('Contact Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Contact Info', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'phone_text',
            [
                'label'       => __('Phone Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('+31642077345', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'phone_number',
            [
                'label'       => __('Phone Number (tel)', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('+31642077345', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'email_text',
            [
                'label'       => __('Email Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('minarease.info@gmail.com', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'email_address',
            [
                'label'       => __('Email Address', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('minarease.info@gmail.com', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'address_text',
            [
                'label'       => __('Address Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('2903 HP, Capelle aan den IJssel, The Netherlands', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );

        $this->add_control(
            'bottom_heading',
            [
                'label' => __('Bottom Row', 'minar-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'terms_text',
            [
                'label'       => __('Terms Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Terms & Conditions', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'terms_url',
            [
                'label'       => __('Terms URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'privacy_text',
            [
                'label'       => __('Privacy Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Privacy Policy', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'privacy_url',
            [
                'label'       => __('Privacy URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => ['url' => '#'],
            ]
        );

        $this->add_control(
            'copyright_text',
            [
                'label'       => __('Copyright Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('© 2025, Minar Ease, All Rights Reserved.', 'minar-toolkit'),
                'rows'        => 2,
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
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'footer_background',
                'label'    => __('Footer Background', 'minar-toolkit'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'desc_typography',
                'label'    => __('Description Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .footer__desc',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label'     => __('Description Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'link_title_typography',
                'label'    => __('Link Title Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .footer__link-title',
            ]
        );
        $this->add_control(
            'link_title_color',
            [
                'label'     => __('Link Title Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__link-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'links_typography',
                'label'    => __('Links Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .footer__link',
            ]
        );
        $this->add_control(
            'links_color',
            [
                'label'     => __('Links Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'links_hover_color',
            [
                'label'     => __('Links Hover Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'bottom_links_typography',
                'label'    => __('Bottom Links Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .footer__bottom-link',
            ]
        );
        $this->add_control(
            'bottom_links_color',
            [
                'label'     => __('Bottom Links Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__bottom-link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'copyright_typography',
                'label'    => __('Copyright Typography', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .footer__bottom-copyright',
            ]
        );
        $this->add_control(
            'copyright_color',
            [
                'label'     => __('Copyright Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__bottom-copyright' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_wrap_bg',
            [
                'label'     => __('Contact Icon Background', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer .footer__icon-wrap' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'social_link_bg',
            [
                'label'     => __('Social Link Background', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__social-link' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_icon_color',
            [
                'label'     => __('Social Icon Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__social-link svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_icon_hover_color',
            [
                'label'     => __('Social Icon Hover Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer__social-link:hover svg' => 'fill: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'footer_bottom_border',
                'label'    => __('Bottom Row Border', 'minar-toolkit'),
                'selector' => '{{WRAPPER}} .footer__bottom',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); 
        ?>
             <!-- Footer Start Here -->
            <footer class="footer">
                <div class="footer__container container">

                <div class="footer__top">
                    <div class="footer__left">
                    <div class="footer__logo-wrap">
                        <img src="<?php echo esc_url(!empty($settings['logo_image']['url']) ? $settings['logo_image']['url'] : get_stylesheet_directory_uri() . '/assets/images/logo-white.png'); ?>" alt="<?php echo esc_attr($settings['logo_alt']); ?>" class="footer__logo">
                    </div>
                    <p class="footer__desc"><?php echo esc_html($settings['description']); ?></p>

                    <div class="footer__social-area">
                        <a href="<?php echo esc_url(!empty($settings['social_facebook_url']['url']) ? $settings['social_facebook_url']['url'] : '#'); ?>" class="footer__social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                            d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z" />
                        </svg>
                        </a>
                        <a href="<?php echo esc_url(!empty($settings['social_twitter_url']['url']) ? $settings['social_twitter_url']['url'] : '#'); ?>" class="footer__social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                            d="M523.4 215.7C523.7 220.2 523.7 224.8 523.7 229.3C523.7 368 418.1 527.9 225.1 527.9C165.6 527.9 110.4 510.7 64 480.8C72.4 481.8 80.6 482.1 89.3 482.1C138.4 482.1 183.5 465.5 219.6 437.3C173.5 436.3 134.8 406.1 121.5 364.5C128 365.5 134.5 366.1 141.3 366.1C150.7 366.1 160.1 364.8 168.9 362.5C120.8 352.8 84.8 310.5 84.8 259.5L84.8 258.2C98.8 266 115 270.9 132.2 271.5C103.9 252.7 85.4 220.5 85.4 184.1C85.4 164.6 90.6 146.7 99.7 131.1C151.4 194.8 229 236.4 316.1 240.9C314.5 233.1 313.5 225 313.5 216.9C313.5 159.1 360.3 112 418.4 112C448.6 112 475.9 124.7 495.1 145.1C518.8 140.6 541.6 131.8 561.7 119.8C553.9 144.2 537.3 164.6 515.6 177.6C536.7 175.3 557.2 169.5 576 161.4C561.7 182.2 543.8 200.7 523.4 215.7z" />
                        </svg>
                        </a>
                        <a href="<?php echo esc_url(!empty($settings['social_linkedin_url']['url']) ? $settings['social_linkedin_url']['url'] : '#'); ?>" class="footer__social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                            d="M196.3 512L103.4 512L103.4 212.9L196.3 212.9L196.3 512zM149.8 172.1C120.1 172.1 96 147.5 96 117.8C96 103.5 101.7 89.9 111.8 79.8C121.9 69.7 135.6 64 149.8 64C164 64 177.7 69.7 187.8 79.8C197.9 89.9 203.6 103.6 203.6 117.8C203.6 147.5 179.5 172.1 149.8 172.1zM543.9 512L451.2 512L451.2 366.4C451.2 331.7 450.5 287.2 402.9 287.2C354.6 287.2 347.2 324.9 347.2 363.9L347.2 512L254.4 512L254.4 212.9L343.5 212.9L343.5 253.7L344.8 253.7C357.2 230.2 387.5 205.4 432.7 205.4C526.7 205.4 544 267.3 544 347.7L544 512L543.9 512z" />
                        </svg>
                        </a>
                        <a href="<?php echo esc_url(!empty($settings['social_reddit_url']['url']) ? $settings['social_reddit_url']['url'] : '#'); ?>" class="footer__social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                            d="M476.9 161.1C435 119.1 379.2 96 319.9 96C197.5 96 97.9 195.6 97.9 318C97.9 357.1 108.1 395.3 127.5 429L96 544L213.7 513.1C246.1 530.8 282.6 540.1 319.8 540.1L319.9 540.1C442.2 540.1 544 440.5 544 318.1C544 258.8 518.8 203.1 476.9 161.1zM319.9 502.7C286.7 502.7 254.2 493.8 225.9 477L219.2 473L149.4 491.3L168 423.2L163.6 416.2C145.1 386.8 135.4 352.9 135.4 318C135.4 216.3 218.2 133.5 320 133.5C369.3 133.5 415.6 152.7 450.4 187.6C485.2 222.5 506.6 268.8 506.5 318.1C506.5 419.9 421.6 502.7 319.9 502.7zM421.1 364.5C415.6 361.7 388.3 348.3 383.2 346.5C378.1 344.6 374.4 343.7 370.7 349.3C367 354.9 356.4 367.3 353.1 371.1C349.9 374.8 346.6 375.3 341.1 372.5C308.5 356.2 287.1 343.4 265.6 306.5C259.9 296.7 271.3 297.4 281.9 276.2C283.7 272.5 282.8 269.3 281.4 266.5C280 263.7 268.9 236.4 264.3 225.3C259.8 214.5 255.2 216 251.8 215.8C248.6 215.6 244.9 215.6 241.2 215.6C237.5 215.6 231.5 217 226.4 222.5C221.3 228.1 207 241.5 207 268.8C207 296.1 226.9 322.5 229.6 326.2C232.4 329.9 268.7 385.9 324.4 410C359.6 425.2 373.4 426.5 391 423.9C401.7 422.3 423.8 410.5 428.4 397.5C433 384.5 433 373.4 431.6 371.1C430.3 368.6 426.6 367.2 421.1 364.5z" />
                        </svg>
                        </a>
                        <a href="<?php echo esc_url(!empty($settings['social_instagram_url']['url']) ? $settings['social_instagram_url']['url'] : '#'); ?>" class="footer__social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                            <path
                            d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z" />
                        </svg>
                        </a>
                    </div>
                    </div>

                    <div class="footer__right">
                    <?php if (!empty($settings['show_explore']) && $settings['show_explore'] === 'yes'): ?>
                        <div class="footer__link-item">
                            <h5 class="footer__link-title"><?php echo esc_html($settings['explore_title']); ?></h5>
                            <ul class="footer__link-list">
                            <?php if (!empty($settings['explore_links'])): foreach ($settings['explore_links'] as $item): ?>
                                <li><a href="<?php echo esc_url(!empty($item['explore_link_url']['url']) ? $item['explore_link_url']['url'] : '#'); ?>" class="footer__link footer__link--icon"><?php echo esc_html($item['explore_link_text']); ?></a></li>
                            <?php endforeach; endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['show_products']) && $settings['show_products'] === 'yes'): ?>
                        <div class="footer__link-item">
                            <h5 class="footer__link-title"><?php echo esc_html($settings['products_title']); ?></h5>
                            <ul class="footer__link-list">
                            <?php if (!empty($settings['products_links'])): foreach ($settings['products_links'] as $item): ?>
                                <li><a href="<?php echo esc_url(!empty($item['product_link_url']['url']) ? $item['product_link_url']['url'] : '#'); ?>" class="footer__link footer__link--icon"><?php echo esc_html($item['product_link_text']); ?></a></li>
                            <?php endforeach; endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($settings['show_contact']) && $settings['show_contact'] === 'yes'): ?>
                        <div class="footer__link-item footer__link-item--contact">
                            <h5 class="footer__link-title"><?php echo esc_html($settings['contact_title']); ?></h5>
                            <ul class="footer__link-list">
                                <li>
                                    <a href="tel:<?php echo esc_attr($settings['phone_number']); ?>" class="footer__link">
                                        <div class="footer__icon-wrap">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_100_638)"><g clip-path="url(#clip1_100_638)"><g clip-path="url(#clip2_100_638)"><mask id="mask0_100_638" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="18" height="18"><path d="M18 0H0V18H18V0Z" fill="white" /></mask><g mask="url(#mask0_100_638)"><path d="M2.83321 8.9568C2.1222 7.71698 1.77889 6.70461 1.57188 5.67841C1.26571 4.16069 1.96636 2.67811 3.12703 1.7321C3.61759 1.33229 4.17992 1.46889 4.47 1.9893L5.12488 3.16418C5.64397 4.09543 5.9035 4.56104 5.85202 5.05469C5.80055 5.54834 5.45053 5.9504 4.75048 6.75451L2.83321 8.9568ZM2.83321 8.9568C4.27238 11.4662 6.53088 13.726 9.0432 15.1668M9.0432 15.1668C10.283 15.8778 11.2954 16.2211 12.3216 16.4281C13.8393 16.7343 15.3219 16.0337 16.2679 14.873C16.6677 14.3825 16.5311 13.8201 16.0107 13.53L14.8358 12.8751C13.9045 12.356 13.4389 12.0965 12.9453 12.148C12.4516 12.1994 12.0496 12.5495 11.2455 13.2495L9.0432 15.1668Z" stroke="#FF8000" stroke-width="1.5" stroke-linejoin="round" /><path d="M10.5 5.12389C11.5674 5.57718 12.4228 6.43258 12.8761 7.5M10.9905 1.5C13.6434 2.26557 15.7343 4.35639 16.5 7.00922" stroke="#FF8000" stroke-width="1.5" stroke-linecap="round" /></g></g></g></g><defs><clipPath id="clip0_100_638"><rect width="18" height="18" fill="white" /></clipPath><clipPath id="clip1_100_638"><rect width="18" height="18" fill="white" /></clipPath><clipPath id="clip2_100_638"><rect width="18" height="18" fill="white" /></clipPath></defs></svg>
                                        </div>
                                        <span class="footer__link-text"><?php echo esc_html($settings['phone_text']); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:<?php echo esc_attr($settings['email_address']); ?>" class="footer__link">
                                        <div class="footer__icon-wrap">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_100_654)"><g clip-path="url(#clip1_100_654)"><path d="M5.25 6.375L7.45652 7.67955C8.7429 8.44012 9.2571 8.44012 10.5435 7.67955L12.75 6.375" stroke="#FF8000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M1.51183 10.1067C1.56086 12.4059 1.58537 13.5554 2.43372 14.4071C3.28206 15.2586 4.46275 15.2882 6.82412 15.3476C8.27948 15.3842 9.72053 15.3842 11.1759 15.3476C13.5373 15.2882 14.7179 15.2586 15.5663 14.4071C16.4147 13.5554 16.4392 12.4059 16.4881 10.1067C16.504 9.36743 16.504 8.63258 16.4881 7.8933C16.4392 5.59415 16.4147 4.44457 15.5663 3.593C14.7179 2.74142 13.5373 2.71176 11.1759 2.65243C9.72053 2.61586 8.27947 2.61586 6.82411 2.65242C4.46275 2.71175 3.28206 2.74141 2.43371 3.59299C1.58537 4.44456 1.56085 5.59414 1.51182 7.8933C1.49605 8.63258 1.49606 9.36743 1.51183 10.1067Z" stroke="#FF8000" stroke-width="1.5" stroke-linejoin="round" /></g></g><defs><clipPath id="clip0_100_654"><rect width="18" height="18" fill="white" /></clipPath><clipPath id="clip1_100_654"><rect width="18" height="18" fill="white" /></clipPath></defs></svg>
                                        </div>
                                        <span class="footer__link-text"><?php echo esc_html($settings['email_text']); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer__link">
                                        <div class="footer__icon-wrap">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_100_667)"><path d="M11.625 8.25C11.625 9.69975 10.4497 10.875 9 10.875C7.55025 10.875 6.375 9.69975 6.375 8.25C6.375 6.80025 7.55025 5.625 9 5.625C10.4497 5.625 11.625 6.80025 11.625 8.25Z" stroke="#FF8000" stroke-width="1.5" /><path d="M9 1.5C12.653 1.5 15.75 4.52474 15.75 8.19435C15.75 11.9224 12.6025 14.5385 9.69525 16.3175C9.48338 16.4372 9.24375 16.5 9 16.5C8.75625 16.5 8.51662 16.4372 8.30475 16.3175C5.40292 14.5212 2.25 11.9353 2.25 8.19435C2.25 4.52474 5.34708 1.5 9 1.5Z" stroke="#FF8000" stroke-width="1.5" /></g><defs><clipPath id="clip0_100_667"><rect width="18" height="18" fill="white" /></clipPath></defs></svg>
                                        </div>
                                        <span class="footer__link-text"><?php echo esc_html($settings['address_text']); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>

                <div class="footer__bottom">
                    <a href="<?php echo esc_url(!empty($settings['terms_url']['url']) ? $settings['terms_url']['url'] : '#'); ?>" class="footer__bottom-link"><?php echo esc_html($settings['terms_text']); ?></a>
                    <p class="footer__bottom-copyright"><?php echo esc_html($settings['copyright_text']); ?></p>
                    <a href="<?php echo esc_url(!empty($settings['privacy_url']['url']) ? $settings['privacy_url']['url'] : '#'); ?>" class="footer__bottom-link"><?php echo esc_html($settings['privacy_text']); ?></a>
                </div>
                </div>

                <!-- <span class="footer__bg-text">Minar Ease</span> -->
            </footer>
            <!-- Footer End Here -->
        <?php
    }
}
$widgets_manager->register(new minar_footer_1());
