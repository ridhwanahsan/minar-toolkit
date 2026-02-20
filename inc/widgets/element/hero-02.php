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

class hero_02 extends Widget_Base
{
    public function get_name()
    {
        return 'hero_02';
    }

    public function get_title()
    {
        return __('Hero 02', 'minar-toolkit');
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
            'hero_title',
            [
                'label'       => __('Hero Title', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Life Feels Better Offline', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_subtitle',
            [
                'label'       => __('Hero Subtitle', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Tools designed to help you slow down, breathe, and reconnect with your real life', 'minar-toolkit'),
                'rows'        => 2,
            ]
        );

        $gallery_repeater = new Repeater();
        $gallery_repeater->add_control(
            'image',
            [
                'label'   => __('Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/slider-img-1.png',
                ],
            ]
        );
        $gallery_repeater->add_control(
            'alt',
            [
                'label'       => __('Alt Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gallery_items',
            [
                'label'       => __('Gallery Items', 'minar-toolkit'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $gallery_repeater->get_controls(),
                'default'     => [
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-1.png' ], 'alt' => '1' ],
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-2.png' ], 'alt' => '2' ],
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-3.png' ], 'alt' => '3' ],
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-4.png' ], 'alt' => '4' ],
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-5.png' ], 'alt' => '5' ],
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-6.png' ], 'alt' => '6' ],
                    [ 'image' => [ 'url' => get_template_directory_uri() . '/assets/images/slider-img-7.png' ], 'alt' => '7' ],
                ],
                'title_field' => '{{{ alt }}}',
            ]
        );

        $this->add_control(
            'center_index',
            [
                'label'   => __('Center Card Index (1-based)', 'minar-toolkit'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
                'min'     => 1,
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label'       => __('Primary Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Order Vini Now', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'primary_button_url',
            [
                'label'       => __('Primary Button URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [ 'url' => '#' ],
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label'       => __('Secondary Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Join our community', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'secondary_button_url',
            [
                'label'       => __('Secondary Button URL', 'minar-toolkit'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [ 'url' => '#' ],
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
              <!-- Hero Area Start Here -->
                <section class="hero hero--one">
                <div class="hero__container container">
                    <div class="hero__header-area">
                    <h1 class="hero__title"><?php echo esc_html($settings['hero_title']); ?></h1>
                    <p class="hero__subtitle-text"><?php echo esc_html($settings['hero_subtitle']); ?></p>
                    </div>

                    <div class="hero__gallery-wrapper">
                    <div class="card-track" id="track" data-center-index="<?php echo max(0, ((isset($settings['center_index']) ? (int)$settings['center_index'] : 4) - 1)); ?>">
                        <?php
                            $center = isset($settings['center_index']) ? (int)$settings['center_index'] : 4;
                            if (!empty($settings['gallery_items'])):
                                foreach ($settings['gallery_items'] as $i => $item):
                                    $src = !empty($item['image']['url']) ? $item['image']['url'] : '';
                                    $alt = !empty($item['alt']) ? $item['alt'] : (string)($i + 1);
                                    $is_center = ($i + 1) === $center;
                                    $card_class = $is_center ? 'card active' : 'card';
                                    $id_attr = $is_center ? ' id="center"' : '';
                        ?>
                        <div class="<?php echo esc_attr($card_class); ?>"<?php echo $id_attr; ?>><img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>"></div>
                        <?php
                                endforeach;
                            endif;
                        ?>
                    </div>
                    </div>
                    <div class="hero__gallery-pagination pagination" id="dots"></div>

                    <div class="hero__content-area">
                    <div class="hero__btn-wrap">
                        <a href="<?php echo esc_url(!empty($settings['primary_button_url']['url']) ? $settings['primary_button_url']['url'] : '#'); ?>" class="hero__btn btn btn--primary"<?php echo !empty($settings['primary_button_url']['is_external']) ? ' target="_blank"' : ''; ?><?php echo !empty($settings['primary_button_url']['nofollow']) ? ' rel="nofollow"' : ''; ?>>
                        <?php echo esc_html($settings['primary_button_text']); ?>
                        </a>

                        <a href="<?php echo esc_url(!empty($settings['secondary_button_url']['url']) ? $settings['secondary_button_url']['url'] : '#'); ?>" class="hero__btn btn btn--secondary"<?php echo !empty($settings['secondary_button_url']['is_external']) ? ' target="_blank"' : ''; ?><?php echo !empty($settings['secondary_button_url']['nofollow']) ? ' rel="nofollow"' : ''; ?>>
                        <?php echo esc_html($settings['secondary_button_text']); ?>
                        </a>
                    </div>
                    </div>
                </div>

                <!-- Gradient Bg-->
                <div class="hero__gradient-left-bottom"></div>
                <div class="hero__gradient-right-bottom"></div>

                </section>
                <!-- Hero Area End Here -->
        <?php
    }
} 
$widgets_manager->register(new hero_02());
