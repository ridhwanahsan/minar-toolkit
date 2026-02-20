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

class banner_widget2 extends Widget_Base
{
    public function get_name()
    {
        return 'banner_widget2';
    }

    public function get_title()
    {
        return __('Banner Widget 2', 'minar-toolkit');
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
            'banner_content_section',
            [
                'label' => __('Banner Content', 'minar-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Subtitle text control
        $this->add_control(
            'banner_subtitle',
            [
                'label' => __('Subtitle Text', 'minar-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Products', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        // Subtitle image control
        $this->add_control(
            'banner_subtitle_image',
            [
                'label' => __('Subtitle Image', 'minar-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/img/product.svg',
                ],
            ]
        );

        // Current item text control
        $this->add_control(
            'banner_current_item',
            [
                'label' => __('Current Item Text', 'minar-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Product Details', 'minar-toolkit'),
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
            <!-- Breadcrumbs Start Here -->
            <section class="breadcrumbs breadcrumbs--product-details-page">
                <div class="breadcrumbs__container container">
                    <div class="breadcrumbs__subtitle-wrap">
                        <svg class="breadcrumbs__shape" width="455" height="6" viewBox="0 0 455 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line y1="-0.5" x2="452" y2="-0.5" transform="matrix(-1 0 0 1 452 4)"
                                stroke="url(#paint0_linear_121_557)" />
                            <circle cx="452" cy="3" r="3" fill="#FF8000" />
                            <defs>
                                <linearGradient id="paint0_linear_121_557" x1="0" y1="0.5" x2="452" y2="0.5"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF8000" />
                                    <stop offset="1" stop-color="#FF8000" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>

                        <p class="breadcrumbs__subtitle subtitle--two">
                            <?php echo esc_html($settings['banner_subtitle']); ?>
                            <img src="<?php echo esc_url($settings['banner_subtitle_image']['url']); ?>" alt="">
                        </p>

                        <div class="breadcrumbs__arrow">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none">
                                <path
                                    d="M0.21934 13.7613C0.0788899 13.6206 0 13.43 0 13.2313C0 13.0325 0.0788899 12.8419 0.21934 12.7013L5.93934 6.98127L0.21934 1.26127C0.0869317 1.11901 0.0148279 0.930954 0.0181847 0.736637C0.0215414 0.54232 0.100097 0.356871 0.23734 0.219267C0.374943 0.0820243 0.560393 0.00346888 0.75471 0.000112156C0.949027 -0.00324457 1.13708 0.0688587 1.27934 0.201267L7.52934 6.45127C7.66979 6.59189 7.74868 6.78252 7.74868 6.98127C7.74868 7.18002 7.66979 7.37064 7.52934 7.51127L1.27934 13.7613C1.13871 13.9017 0.948091 13.9806 0.74934 13.9806C0.550589 13.9806 0.359966 13.9017 0.21934 13.7613Z"
                                    fill="white" />
                            </svg>
                        </div>

                        <p class="breadcrumbs__current-item"><?php echo esc_html($settings['banner_current_item']); ?></p>

                        <svg class="breadcrumbs__shape" width="455" height="6" viewBox="0 0 455 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="3" y1="3.5" x2="455" y2="3.5" stroke="url(#paint0_linear_121_556)" />
                            <circle cx="3" cy="3" r="3" fill="#FF8000" />
                            <defs>
                                <linearGradient id="paint0_linear_121_556" x1="3" y1="4.5" x2="455" y2="4.5"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FF8000" />
                                    <stop offset="1" stop-color="#FF8000" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </section>
            <!-- Breadcrumbs End Here -->
        <?php
    }
} 
$widgets_manager->register(new banner_widget2());