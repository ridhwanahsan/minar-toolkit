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

class banner_widget5 extends Widget_Base
{
    public function get_name()
    {
        return 'banner_widget5';
    }

    public function get_title()
    {
        return __('Banner Widget', 'minar-toolkit');
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
            'subtitle_text',
            [
                'label'       => __('Subtitle', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Products', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title_text',
            [
                'label'       => __('Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Explore Our Products', 'minar-toolkit'),
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
        <section class="breadcrumbs breadcrumbs--product-page">
            <div class="breadcrumbs__container container">
                <div class="breadcrumbs__subtitle-wrap">
                    <svg class="breadcrumbs__shape" width="455" height="6" viewBox="0 0 455 6" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <?php echo esc_html($settings['subtitle_text']); ?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.33317 3.33333H3.99984C3.64622 3.33333 3.30708 3.4738 3.05703 3.72385C2.80698 3.9739 2.6665 4.31304 2.6665 4.66666V12.6667C2.6665 13.0203 2.80698 13.3594 3.05703 13.6095C3.30708 13.8595 3.64622 14 3.99984 14H7.79784"
                                stroke="#0A0A0A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.0002 7.99999V4.66666C12.0002 4.31304 11.8597 3.9739 11.6096 3.72385C11.3596 3.4738 11.0205 3.33333 10.6668 3.33333H9.3335"
                                stroke="#0A0A0A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M5.3335 3.33333C5.3335 2.97971 5.47397 2.64057 5.72402 2.39052C5.97407 2.14048 6.31321 2 6.66683 2H8.00016C8.35378 2 8.69292 2.14048 8.94297 2.39052C9.19302 2.64057 9.3335 2.97971 9.3335 3.33333C9.3335 3.68696 9.19302 4.02609 8.94297 4.27614C8.69292 4.52619 8.35378 4.66667 8.00016 4.66667H6.66683C6.31321 4.66667 5.97407 4.52619 5.72402 4.27614C5.47397 4.02609 5.3335 3.68696 5.3335 3.33333Z"
                                stroke="#0A0A0A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.3335 7.33333H8.00016" stroke="#0A0A0A" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5.3335 10H7.3335" stroke="#0A0A0A" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M9.3335 11.6667C9.3335 12.1087 9.50909 12.5326 9.82165 12.8452C10.1342 13.1577 10.5581 13.3333 11.0002 13.3333C11.4422 13.3333 11.8661 13.1577 12.1787 12.8452C12.4912 12.5326 12.6668 12.1087 12.6668 11.6667C12.6668 11.2246 12.4912 10.8007 12.1787 10.4882C11.8661 10.1756 11.4422 10 11.0002 10C10.5581 10 10.1342 10.1756 9.82165 10.4882C9.50909 10.8007 9.3335 11.2246 9.3335 11.6667Z"
                                stroke="#0A0A0A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.3335 13L14.0002 14.6667" stroke="#0A0A0A" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </p>
                    <svg class="breadcrumbs__shape" width="455" height="6" viewBox="0 0 455 6" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                <div class="breadcrumbs__header breadcrumbs__header--product-page">
                    <h1 class="breadcrumbs__title title--one"><?php echo esc_html($settings['title_text']); ?></h1>
                </div>
            </div>
        </section>
        <!-- Breadcrumbs End Here -->
        <?php
    }
} 
$widgets_manager->register(new banner_widget5());
