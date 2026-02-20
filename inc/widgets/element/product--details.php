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

class product_details extends Widget_Base
{
    public function get_name()
    {
        return 'product_details';
    }

    public function get_title()
    {
        return __('Product Details Widget', 'minar-toolkit');
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
            'buy_button_text',
            [
                'label'       => __('Buy Button Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Buy Now', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'initial_quantity',
            [
                'label'       => __('Initial Quantity', 'minar-toolkit'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 1,
                'min'         => 1,
                'step'        => 1,
            ]
        );

        $this->add_control(
            'desc_title_prefix',
            [
                'label'       => __('Description Title Prefix', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Product', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'desc_title_highlight',
            [
                'label'       => __('Description Title Highlight', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Description', 'minar-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'desc_bg_image',
            [
                'label'   => __('Description Title BG Image', 'minar-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/description-title-bg.png',
                ],
            ]
        );

        $this->add_control(
            'show_vat_text',
            [
                'label'        => __('Show VAT Text', 'minar-toolkit'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __('Show', 'minar-toolkit'),
                'label_off'    => __('Hide', 'minar-toolkit'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'vat_text',
            [
                'label'       => __('VAT Text', 'minar-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Incl. VAT', 'minar-toolkit'),
                'label_block' => true,
                'condition'   => [
                    'show_vat_text' => 'yes',
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
                'label' => __('Style', 'minar-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'price_typography',
                'selector' => '{{WRAPPER}} .product-card__current-price',
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label'     => __('Price Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-card__current-price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'vat_typography',
                'selector' => '{{WRAPPER}} .product__price-vat',
                'condition'=> [
                    'show_vat_text' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'vat_color',
            [
                'label'     => __('VAT Text Color', 'minar-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product__price-vat' => 'color: {{VALUE}}',
                ],
                'condition'=> [
                    'show_vat_text' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        $product_id = get_the_ID();
        $product = wc_get_product( $product_id );

        if ( ! $product ) {
            return;
        }

        // Images
        $attachment_ids = $product->get_gallery_image_ids();
        if ( has_post_thumbnail( $product_id ) ) {
            array_unshift( $attachment_ids, get_post_thumbnail_id( $product_id ) );
        }

        // Fallback images if no images found
        if ( empty( $attachment_ids ) ) {
            $fallback_image = wc_placeholder_img_src();
        }
        ?>
                  <!-- Product Details Start Here -->
        <section class="product product--details-page">
            <div class="product__top">
                <div class="product__container container">
                    <div class="product-card">
                        <div class="product-card__content">
                            <div class="product-card__image-wrap">
                                <div class="product-card__main-slider" id="slider">
                                    <div class="product-card__slider-inner" id="sliderInner">
                                        <?php
                                        $slides = [];
                                        if (!empty($attachment_ids)) {
                                            foreach ($attachment_ids as $aid) {
                                                $url = wp_get_attachment_image_url($aid, 'large');
                                                if ($url) {
                                                    $slides[] = $url;
                                                }
                                            }
                                        }
                                        if (empty($slides) && !empty($fallback_image)) {
                                            $slides[] = $fallback_image;
                                        }
                                        $index = 0;
                                        foreach ($slides as $url):
                                        ?>
                                        <div class="product-card__slide" data-index="<?php echo esc_attr($index); ?>">
                                            <img src="<?php echo esc_url($url); ?>" draggable="false" alt="">
                                        </div>
                                        <?php $index++; endforeach; ?>
                                    </div>
                                </div>
                                <div class="product-card__thumbnails" id="thumbnails">
                                    <?php
                                    $index = 0;
                                    foreach ($slides as $url):
                                        $active = $index === 0 ? ' product-card__thumb--active' : '';
                                    ?>
                                    <div class="product-card__thumb<?php echo esc_attr($active); ?>" data-index="<?php echo esc_attr($index); ?>">
                                        <img src="<?php echo esc_url($url); ?>" draggable="false" alt="">
                                    </div>
                                    <?php $index++; endforeach; ?>
                                </div>
                            </div>

                            <div class="product-card__info">
                                <div>
                                    <h1 class="product-card__title"><?php echo esc_html($product->get_name()); ?></h1>
                                    <div class="product-card__subtitle">
                                        <?php
                                        $author_id = get_post_field('post_author', $product_id);
                                        $author_name = $author_id ? get_the_author_meta('display_name', $author_id) : '';
                                        echo esc_html($author_name);
                                        ?>
                                    </div>
                                    <p class="product-card__description">
                                        <?php echo wp_kses_post($product->get_short_description()); ?>
                                    </p>
                                </div>
 
                                    <ul class="product-card__features">
                                <?php 
                                $features = ['list_01', 'list_02', 'list_03', 'list_04', 'list_05'];
                                foreach ( $features as $feature ) {
                                    $feature_value = get_field( $feature, $product_id );
                                    if ( $feature_value ) {
                                        echo '<li>' . esc_html( $feature_value ) . '</li>';
                                    }
                                }
                                ?>
                            </ul> 

                                <div class="product-card__price-btn">
                                    <div class="product-card__price-btn-top">
                                        <div class="product-card__current-price">
                                            <?php echo wp_kses_post($product->get_price_html()); ?>
                                            <?php if (!empty($settings['show_vat_text']) && $settings['show_vat_text'] === 'yes' && !empty($settings['vat_text'])): ?>
                                                <small class="product__price-vat"><?php echo esc_html($settings['vat_text']); ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="product-card__quantity">
                                                <?php
                                                $min_qty  = max(1, intval($product->get_min_purchase_quantity()));
                                                $max_qty  = intval($product->get_max_purchase_quantity());
                                                $init_qty = intval($settings['initial_quantity']);
                                                if ($init_qty < $min_qty) { $init_qty = $min_qty; }
                                                if ($max_qty > 0 && $init_qty > $max_qty) { $init_qty = $max_qty; }
                                                ?>
                                                <button class="product-card__quantity-btn product__qty-btn--decrement" aria-label="<?php esc_attr_e('Decrease quantity', 'minar-toolkit'); ?>">−</button>
                                                <span id="qty"
                                                    class="product-card__quantity-value product__qty-number"
                                                    data-min="<?php echo esc_attr($min_qty); ?>"
                                                    data-max="<?php echo esc_attr($max_qty > 0 ? $max_qty : ''); ?>"
                                                    data-step="1"><?php echo esc_html($init_qty); ?></span>
                                                <button class="product-card__quantity-btn product__qty-btn--increment" aria-label="<?php esc_attr_e('Increase quantity', 'minar-toolkit'); ?>">+</button>
                                        </div>
                                    </div>

                                    <?php
                                    $add_url = $product->add_to_cart_url();
                                    ?>
                                    <a href="<?php echo esc_url($add_url); ?>" class="product-card__buy-btn" data-base-url="<?php echo esc_url($add_url); ?>">
                                        <span class="product-card__buy-btn-text"><?php echo esc_html($settings['buy_button_text']); ?></span>

                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.8001 8L7.37378 8M3.82297 10.7795H2.2001M3.82297 8.09762H0.600098M3.82297 5.41571H2.2001M6.67169 3.06397L15.5086 7.34852C16.0528 7.61238 16.0528 8.38763 15.5086 8.65148L6.67169 12.936C6.06631 13.2296 5.42284 12.6107 5.69251 11.9944L7.31307 8.2902C7.39401 8.1052 7.39401 7.89481 7.31307 7.70981L5.69251 4.00565C5.42284 3.38927 6.06631 2.77045 6.67169 3.06397Z"
                                                stroke="white" stroke-width="1.2" stroke-linecap="round" />
                                        </svg>
                                    </a>
                                    <div class="minar-notices-area woocommerce-notices-wrapper">
                                        <?php wc_print_notices(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product__bottom">
                <div class="product__bottom-container container">
                    <div class="product__content-title-wrap">
                        <h2 class="product__content-title title--one"><?php echo esc_html($settings['desc_title_prefix']); ?> <span class="highlight"><?php echo esc_html($settings['desc_title_highlight']); ?></span>
                        </h2>
                        <div class="product__content-title-bg-wrap">
                            <?php if (!empty($settings['desc_bg_image']['url'])): ?>
                                <img src="<?php echo esc_url($settings['desc_bg_image']['url']); ?>" alt="" class="product__content-title-bg-img">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="product__content-wrap">
                        <div class="product__content-text">
                            <?php echo wpautop(wp_kses_post($product->get_description())); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Details End Here -->
           
        <!-- Product Details End Here -->
         <style>
            .product-card__info .minar-notices-area  {
    margin-top: 20px;
}

.product-card__info .minar-notices-area .woocommerce-message {
   border-top-color: #FF8000;
}
.product-card__info .minar-notices-area  .woocommerce-message::before{
   color: #FF8000;
}

.product--details .product-card__content {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: start;
    gap: 2rem;
    max-width: 1158px;
    padding: 20px 30px;
    align-content: center;
    justify-content: space-evenly;
}
.product--details-page .product__price-vat {
    font-size: 12px;
}
         </style>
        <script>
            (function(){
                var sliderInner = document.getElementById('sliderInner');
                var thumbs = document.querySelectorAll('#thumbnails .product-card__thumb');
                var current = 0;
                function goTo(i){
                    current = i;
                    var w = 100;
                    sliderInner.style.transform = 'translateX(' + (-current * w) + '%)';
                    thumbs.forEach(function(t, idx){
                        if(idx === current){ t.classList.add('product-card__thumb--active'); }
                        else { t.classList.remove('product-card__thumb--active'); }
                    });
                }
                thumbs.forEach(function(t){
                    t.addEventListener('click', function(){
                        var i = parseInt(t.getAttribute('data-index')) || 0;
                        goTo(i);
                    });
                });
                var dec = document.querySelector('.product__qty-btn--decrement');
                var inc = document.querySelector('.product__qty-btn--increment');
                var qtyEl = document.getElementById('qty');
                var buyBtn = document.querySelector('.product-card__buy-btn');
                var baseUrl = buyBtn ? buyBtn.getAttribute('data-base-url') : '';
                var min = qtyEl ? parseInt(qtyEl.getAttribute('data-min')) || 1 : 1;
                var maxAttr = qtyEl ? qtyEl.getAttribute('data-max') : '';
                var max = (maxAttr === '' || maxAttr === null) ? Infinity : (parseInt(maxAttr) || Infinity);
                var step = qtyEl ? parseInt(qtyEl.getAttribute('data-step')) || 1 : 1;
                function clamp(q){
                    q = isNaN(q) ? min : q;
                    if (q < min) q = min;
                    if (q > max) q = max;
                    return q;
                }
                function updateButtons(q){
                    if(dec){
                        dec.disabled = (q <= min);
                        dec.classList.toggle('disabled', dec.disabled);
                    }
                    if(inc){
                        var atMax = (max !== Infinity && q >= max);
                        inc.disabled = atMax;
                        inc.classList.toggle('disabled', inc.disabled);
                    }
                }
                function updateHref(){
                    if(!buyBtn || !baseUrl) return;
                    var q = clamp(parseInt(qtyEl.textContent));
                    var url = new URL(baseUrl, window.location.origin);
                    url.searchParams.set('quantity', q);
                    buyBtn.setAttribute('href', url.toString());
                    updateButtons(q);
                }
                if(dec){
                    dec.addEventListener('click', function(){
                        var q = clamp(parseInt(qtyEl.textContent)) - step;
                        q = clamp(q);
                        qtyEl.textContent = q;
                        updateHref();
                    });
                }
                if(inc){
                    inc.addEventListener('click', function(){
                        var q = clamp(parseInt(qtyEl.textContent)) + step;
                        q = clamp(q);
                        qtyEl.textContent = q;
                        updateHref();
                    });
                }
                // Initialize href and button states
                updateHref();
                function moveWooNotices(){
                    var target = document.querySelector('.minar-notices-area.woocommerce-notices-wrapper');
                    if(!target) return;
                    var wrappers = document.querySelectorAll('.woocommerce-notices-wrapper');
                    wrappers.forEach(function(wrap){
                        if(wrap !== target){
                            if(wrap.innerHTML && wrap.innerHTML.trim() !== ''){
                                target.innerHTML = wrap.innerHTML;
                            }
                            if(wrap.parentNode){
                                wrap.parentNode.removeChild(wrap);
                            }
                        }
                    });
                }
                moveWooNotices();
            })();
        </script>
        <?php
    }
} 
$widgets_manager->register(new product_details());
