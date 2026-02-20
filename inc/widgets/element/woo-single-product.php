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

class woo_single_product extends Widget_Base
{
    public function get_name()
    {
        return 'woo_single_product';
    }

    public function get_title()
    {
        return __('Woo Single Product', 'minar-toolkit');
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
            'minar_product_id',
            [
                'label' => esc_html__('Product ID', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'description' => esc_html__('Enter the Product ID here.', 'minar-toolkit'),
            ]
        );

        $this->add_control(
            'show_vat',
            [
                'label' => esc_html__('Show VAT Note', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'minar-toolkit'),
                'label_off' => esc_html__('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'vat_text',
            [
                'label' => esc_html__('VAT Text', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Including VAT', 'minar-toolkit'),
                'condition' => [
                    'show_vat' => 'yes',
                ],
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

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .minar-product-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => esc_html__('Price Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .minar-product-price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'vat_color',
            [
                'label' => esc_html__('VAT Text Color', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .product__price-vat' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_vat' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'vat_font_size',
            [
                'label' => esc_html__('VAT Font Size', 'minar-toolkit'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => ['min' => 8, 'max' => 24],
                    'em' => ['min' => 0.5, 'max' => 2],
                    'rem' => ['min' => 0.5, 'max' => 2],
                ],
                'default' => [
                    'size' => 12,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .product__price-vat' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_vat' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $product_id = $settings['minar_product_id'];

        if (empty($product_id)) {
            echo '<div class="minar-error">' . esc_html__('Please enter a Product ID.', 'minar-toolkit') . '</div>';
            return;
        }

        if (!class_exists('WooCommerce')) {
            echo '<div class="minar-error">' . esc_html__('WooCommerce is not active.', 'minar-toolkit') . '</div>';
            return;
        }

        $product = wc_get_product($product_id);

        if (!$product) {
            echo '<div class="minar-error">' . esc_html__('Product not found.', 'minar-toolkit') . '</div>';
            return;
        }
        $title = $product->get_name();
        $author_id = get_post_field('post_author', $product_id);
        $author_name = $author_id ? get_the_author_meta('display_name', $author_id) : '';
        $desc = $product->get_short_description() ? $product->get_short_description() : $product->get_description();
        $price_html = function_exists('wc_price') ? wc_price($product->get_price()) : $product->get_price();
        $fallback_img = get_stylesheet_directory_uri() . '/assets/images/product-image.png';
        $images = [];
        $featured_id = $product->get_image_id();
        $featured_url = $featured_id ? wp_get_attachment_image_url($featured_id, 'full') : '';
        if ($featured_url) {
            $images[] = $featured_url;
        }
        $gallery_ids = method_exists($product, 'get_gallery_image_ids') ? $product->get_gallery_image_ids() : [];
        foreach ($gallery_ids as $gid) {
            $url = wp_get_attachment_image_url($gid, 'full');
            if ($url) {
                $images[] = $url;
            }
        }
        while (count($images) < 3) {
            $images[] = $fallback_img;
        }
        $feature_1 = function_exists('get_field') ? get_field('list_01', $product_id) : '';
        $feature_2 = function_exists('get_field') ? get_field('list_02', $product_id) : '';
        $feature_3 = function_exists('get_field') ? get_field('list_03', $product_id) : '';
        $feature_4 = function_exists('get_field') ? get_field('list_04', $product_id) : '';
        $feature_5 = function_exists('get_field') ? get_field('list_05', $product_id) : '';

        $checkout_url = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : (function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/checkout/'));
        $default_buy_url = add_query_arg(
            [
                'add-to-cart' => $product_id,
                'quantity'    => 1,
            ],
            $checkout_url
        );
        ?>
         <!-- Product Card Start Here -->
            <section class="product product--home-page">
            <div class="product__container container">
                <div class="product__area">
                <div class="product__content">
                    <h1 class="product__title"><?php echo esc_html($title); ?></h1>
                    <p class="product__author"><?php echo esc_html($author_name); ?></p>
                    <p class="product__description">
                    <?php echo wp_kses_post($desc); ?>
                    </p>

                    <ul class="product__features">
                    <li class="product__feature"><?php echo esc_html($feature_1 ?: ''); ?></li>
                    <li class="product__feature"><?php echo esc_html($feature_2 ?: ''); ?></li>
                    <li class="product__feature"><?php echo esc_html($feature_3 ?: ''); ?></li>
                    <li class="product__feature"><?php echo esc_html($feature_4 ?: ''); ?></li>
                    <li class="product__feature"><?php echo esc_html($feature_5 ?: ''); ?></li>
                    </ul>

                    <div class="product__bottom">
                    <div class="product__footer">
                        <div class="product__price-wrap">
                            <span class="product__price"><?php echo wp_kses_post($price_html); ?></span>
                            <?php if (!empty($settings['show_vat']) && $settings['show_vat'] === 'yes') : ?>
                            <small class="product__price-vat" style="display:block;line-height:1.2;opacity:0.8;"><?php echo esc_html($settings['vat_text']); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="product__qty-control" data-qty="1">
                        <button class="product__qty-btn product__qty-btn--decrement">−</button>
                        <span class="product__qty-number">1</span>
                        <button class="product__qty-btn product__qty-btn--increment">+</button>
                        </div>
                    </div>

                    <a href="<?php echo esc_url($default_buy_url); ?>" class="product__btn btn btn--primary" data-product-id="<?php echo esc_attr($product_id); ?>" data-checkout-url="<?php echo esc_url($checkout_url); ?>">Buy Now <svg width="17" height="12" viewBox="0 0 17 12"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.8 5.61353L7.37369 5.61353M3.82288 8.39307H2.20001M3.82288 5.71115H0.600006M3.82288 3.02923H2.20001M6.6716 0.677498L15.5085 4.96205C16.0527 5.2259 16.0527 6.00116 15.5085 6.26501L6.6716 10.5496C6.06621 10.8431 5.42275 10.2243 5.69242 9.60788L7.31298 5.90373C7.39392 5.71873 7.39392 5.50833 7.31298 5.32333L5.69242 1.61918C5.42275 1.0028 6.06621 0.383978 6.6716 0.677498Z"
                            stroke="white" stroke-width="1.2" stroke-linecap="round" />
                        </svg>
                    </a>
                    </div>
                </div>

                <div class="product__image-wrapper swiper product__slider_1">
                    <div class="product__slider-track swiper-wrapper">
                    <div class="product__slider-item swiper-slide">
                        <img src="<?php echo esc_url($images[0]); ?>" alt="<?php echo esc_attr($title); ?>"
                        class="product__image swiper-slide">
                    </div>
                    <div class="product__slider-item swiper-slide">
                        <img src="<?php echo esc_url($images[1]); ?>" alt="<?php echo esc_attr($title); ?>"
                        class="product__image swiper-slide">
                    </div>
                    <div class="product__slider-item swiper-slide">
                        <img src="<?php echo esc_url($images[2]); ?>" alt="<?php echo esc_attr($title); ?>"
                        class="product__image swiper-slide">
                    </div>
                    </div>
                    <div class="product__slider-nav  swiper-pagination"></div>
                </div>
                </div>
            </div>
            </section>

            <script>
                jQuery(document).ready(function($) {
                    $('.product__qty-btn--increment').off('click.minarQty').on('click.minarQty', function() {
                        var $wrap = $(this).closest('.product__qty-control');
                        var val = parseInt($wrap.attr('data-qty'), 10) || 1;
                        val = val + 1;
                        $wrap.attr('data-qty', val);
                        $wrap.find('.product__qty-number').text(val);
                    });
                    $('.product__qty-btn--decrement').off('click.minarQty').on('click.minarQty', function() {
                        var $wrap = $(this).closest('.product__qty-control');
                        var val = parseInt($wrap.attr('data-qty'), 10) || 1;
                        if (val > 1) {
                            val = val - 1;
                        }
                        $wrap.attr('data-qty', val);
                        $wrap.find('.product__qty-number').text(val);
                    });

                    $('.product__btn').off('click.minarQty').on('click.minarQty', function(e) {
                        e.preventDefault();
                        var $area = $(this).closest('.product__area');
                        var qty = parseInt($area.find('.product__qty-control').attr('data-qty'), 10) || parseInt($area.find('.product__qty-number').text(), 10) || 1;
                        var pid = $(this).data('product-id');
                        var checkoutUrl = $(this).data('checkout-url');
                        var sep = checkoutUrl.indexOf('?') === -1 ? '?' : '&';
                        var finalUrl = checkoutUrl + sep + 'add-to-cart=' + encodeURIComponent(pid) + '&quantity=' + encodeURIComponent(qty);
                        window.location.href = finalUrl;
                    });
                });
            </script> 
        <?php
    }
} 
$widgets_manager->register(new woo_single_product());
