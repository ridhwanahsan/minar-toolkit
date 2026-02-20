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

    class product_grid_1 extends Widget_Base
{
    public function get_name()
    {
        return 'products-grid';
    }

    public function get_title()
    {
        return __('Products Grid', 'minar-toolkit');
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
                'label' => esc_html__( 'Content', 'minar-toolkit' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__( 'Posts Per Page', 'minar-toolkit' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Order By', 'minar-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__( 'Date', 'minar-toolkit' ),
                    'title' => esc_html__( 'Title', 'minar-toolkit' ),
                    'rand' => esc_html__( 'Random', 'minar-toolkit' ),
                    'menu_order' => esc_html__( 'Menu Order', 'minar-toolkit' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'minar-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC' => esc_html__( 'DESC', 'minar-toolkit' ),
                    'ASC' => esc_html__( 'ASC', 'minar-toolkit' ),
                ],
            ]
        );

        // Get product categories
        $options = [];
        if ( taxonomy_exists( 'product_cat' ) ) {
            $categories = get_terms( 'product_cat', [ 'hide_empty' => false ] );
            if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $options[ $category->term_id ] = $category->name;
                }
            }
        }

        $this->add_control(
            'category',
            [
                'label' => esc_html__( 'Category', 'minar-toolkit' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $options,
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

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => $settings['posts_per_page'],
            'orderby'        => $settings['orderby'],
            'order'          => $settings['order'],
        ];

        if ( ! empty( $settings['category'] ) ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $settings['category'],
                ],
            ];
        }

        $query = new \WP_Query( $args );

        if ( ! $query->have_posts() ) {
            return;
        }
        ?>
             <!-- Product Start Here -->
        <section class="product product--product-page">
            <div class="product__container container">
                <div class="product__grid">
                    <?php
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        global $product;
                        $attachment_ids = $product->get_gallery_image_ids();
                        // Add featured image to the beginning if it exists
                        if ( has_post_thumbnail() ) {
                            array_unshift( $attachment_ids, get_post_thumbnail_id() );
                        }
                        ?>
                    <div class="product__card">
                        <div class="product__image-box">
                            <div class="product__swiper swiper">
                                <div class="product__slider-wrap swiper-wrapper">
                                    <?php
                                    if ( ! empty( $attachment_ids ) ) :
                                        foreach ( $attachment_ids as $attachment_id ) :
                                            $image_url = wp_get_attachment_image_url( $attachment_id, 'large' );
                                            ?>
                                    <div class="product__img-wrap swiper-slide"><img
                                            src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>" class="product__img"></div>
                                            <?php
                                        endforeach;
                                    else :
                                        ?>
                                    <div class="product__img-wrap swiper-slide"><img
                                            src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title_attribute(); ?>" class="product__img"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="product__content">
                            <a href="<?php the_permalink(); ?>" class="product__title-link">
                                <h3 class="product__title"><?php the_title(); ?></h3>
                            </a>
                            <p class="product__author"><?php echo get_the_author(); ?></p>
                            <p class="product__desc"><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                            <div class="product__footer">
                                <span class="product__price"><?php echo $product->get_price_html(); ?></span>
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="product__btn"><?php echo esc_html( $product->add_to_cart_text() ); ?>
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.8001 8L7.37378 8M3.82297 10.7795H2.2001M3.82297 8.09762H0.600098M3.82297 5.41571H2.2001M6.67169 3.06397L15.5086 7.34852C16.0528 7.61238 16.0528 8.38763 15.5086 8.65148L6.67169 12.936C6.06631 13.2296 5.42284 12.6107 5.69251 11.9944L7.31307 8.2902C7.39401 8.1052 7.39401 7.89481 7.31307 7.70981L5.69251 4.00565C5.42284 3.38927 6.06631 2.77045 6.67169 3.06397Z"
                                            stroke="white" stroke-width="1.2" stroke-linecap="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
        <!-- Product End  Here -->
        <?php
    }
} 
$widgets_manager->register(new product_grid_1());