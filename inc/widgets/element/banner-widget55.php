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

class banner_widget55 extends Widget_Base
{
    public function get_name()
    {
        return 'banner_widget55';
    }

    public function get_title()
    {
        return __('Banner Widget 5', 'minar-toolkit');
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

    }

    protected function style_tab_content()
    {
    
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
             <!-- Breadcrumbs Start Here -->
        <section class="breadcrumbs breadcrumbs--mission-page">
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
                        About Us
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.33325 2.66666C7.33325 1.93028 7.93021 1.33333 8.66659 1.33333C9.40297 1.33333 9.99992 1.93028 9.99992 2.66666V3.33333C9.99992 3.70152 10.2984 3.99999 10.6666 3.99999H12.6666C13.0348 3.99999 13.3333 4.29847 13.3333 4.66666V6.66666C13.3333 7.03485 13.0348 7.33333 12.6666 7.33333H11.9999C11.2635 7.33333 10.6666 7.93028 10.6666 8.66666C10.6666 9.40304 11.2635 10 11.9999 10H12.6666C13.0348 10 13.3333 10.2985 13.3333 10.6667V12.6667C13.3333 13.0349 13.0348 13.3333 12.6666 13.3333H10.6666C10.2984 13.3333 9.99992 13.0349 9.99992 12.6667V12C9.99992 11.2636 9.40297 10.6667 8.66659 10.6667C7.93021 10.6667 7.33325 11.2636 7.33325 12V12.6667C7.33325 13.0349 7.03478 13.3333 6.66659 13.3333H4.66659C4.2984 13.3333 3.99992 13.0349 3.99992 12.6667V10.6667C3.99992 10.2985 3.70144 10 3.33325 10H2.66659C1.93021 10 1.33325 9.40304 1.33325 8.66666C1.33325 7.93028 1.93021 7.33333 2.66659 7.33333H3.33325C3.70144 7.33333 3.99992 7.03485 3.99992 6.66666V4.66666C3.99992 4.29847 4.2984 3.99999 4.66659 3.99999H6.66659C7.03478 3.99999 7.33325 3.70152 7.33325 3.33333V2.66666Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </p>
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

                <div class="breadcrumbs__header breadcrumbs__header--mission-page">
                    <h1 class="breadcrumbs__title title--one">Discover Our Mission and Values</h1>
                    <p class="breadcrumbs__desc">Minar Ease brings back the simple things that make you feel human again
                        —quiet moments, creativity, and space for your mind to rest</p>
                </div>
            </div>
        </section>
        <!-- Breadcrumbs End Here -->
        <?php
    }
} 
$widgets_manager->register(new banner_widget55());