<?php
/**
 * Recent Post Widget
 */
class minar_posts_thumbs extends WP_Widget {
    function __construct(){
        $widget_ops = array('description' => esc_html__('Display Random or Recent posts with a small image.', 'minar-toolkit'));
        parent::__construct( false, esc_html__('minar Recent Posts With Image', 'minar-toolkit'), $widget_ops);
    }

    function widget($args, $instance){
        global $minar_theme, $minar_opt;
        extract($args); //it receives an associative array

        $title = apply_filters('widget_title', $instance['title']);
        $args = array(
            'posts_per_page' => $instance['number'],
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => $instance['orderby']
        );
        $query = new WP_Query($args);

        if( !$query->have_posts() ) return;
        echo $before_widget;
        if(!$instance['number']) $instance['number'] = 4;

        if($query->have_posts()): ?>
            <div class="news-sideber-widget">
                 <div class="widget-title">
                  <h3><?php echo $title; ?></h3>
                    <div class="recent-post-area">
                        <?php while($query->have_posts()): $query->the_post(); ?>
                            <div class="recent-items">
                                <?php if( has_post_thumbnail() ): ?>
                                    <div class="recent-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title()]); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="recent-content">
                                    <h5>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo wp_trim_words( get_the_title(), 10, '' ); ?>
                                        </a>
                                    </h5>
                                    <ul>
                                        <li>
                                            <?php echo esc_html(get_the_date()); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                  </div>
            </div>
            <?php
            wp_reset_postdata();
        endif;
        echo $after_widget;
    }

    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['orderby'] = $new_instance['orderby'];
        return $instance;
    }

    function form($instance){
        $defaults = array(
            'title' => 'Recent posts',
            'number' => 4,
            'orderby' => 'date'
        );
        $instance = wp_parse_args((array)$instance, $defaults);
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php esc_html_e('Title:', 'minar-toolkit'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of posts to show:', 'minar-toolkit'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Mode:', 'minar-toolkit') ?> </label>
            <select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
                <option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php esc_html_e('Recent Posts', 'minar-toolkit'); ?></option>
                <option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php esc_html_e('Random Posts', 'minar-toolkit'); ?></option>
                <?php if( function_exists('get_field') ): // By views ?>
                    <option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php esc_html_e('Post views', 'minar-toolkit'); ?></option>
                <?php endif; ?>
            </select>
        </p>
        <?php
    }

}

function minar_register_posts_thumbs() {
    register_widget('minar_posts_thumbs');
}

add_action('widgets_init', 'minar_register_posts_thumbs');