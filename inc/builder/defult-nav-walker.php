<?php
class minar_Nav_Walker extends Walker_Nav_Menu
{
    public $tree_type = ['post_type', 'taxonomy', 'custom'];
    public $db_fields = [
        'parent' => 'menu_item_parent',
        'id'     => 'db_id',
    ];

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        // Add extra class for home-demo mega menu
        $extra_class = ($depth === 0 && $this->is_home_demo) ? ' has-homemenu' : '';
        $output .= "\n$indent<ul class=\"submenu{$extra_class}\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent  = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $has_children = in_array('menu-item-has-children', $classes);

        // Detect home-demo mega menu
        $this->is_home_demo = false;
        if ($depth === 0 && in_array('menu-thumb', $classes)) {
            $this->is_home_demo = true;
            $classes[] = 'has-dropdown';
        }

        $li_classes = [];
        if ($has_children || $this->is_home_demo) $li_classes[] = 'has-dropdown';
        if ($item->current || in_array('current-menu-item', $classes)) $li_classes[] = 'active';

        $output .= $indent . '<li' . ($li_classes ? ' class="' . esc_attr(implode(' ', $li_classes)) . '"' : '') . '>';

        // Build link
        $link_class = ($has_children || $this->is_home_demo) ? 'border-none' : '';
        $href = !empty($item->url) && $item->url !== '#' ? esc_url($item->url) : 'javascript:void(0)';

        $output .= sprintf(
            '<a href="%s"%s>%s</a>',
            $href,
            $link_class ? ' class="' . esc_attr(trim($link_class)) . '"' : '',
            esc_html($item->title)
        );

        // Inject mega-menu markup right after the top-level home-demo link
        if ($this->is_home_demo && $depth === 0) {
            $output .= $this->render_home_demo_markup();
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    /**
     * Returns the hard-coded home-demo mega menu markup
     */
    private function render_home_demo_markup()
    {
        ob_start();
        ?>
        <ul class="submenu has-homemenu">
            <li>
                <div class="homemenu-items">
                    <div class="homemenu">
                        <div class="homemenu-thumb">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-1.jpg" alt="img">
                            <div class="demo-button">
                                <a href="index.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">UX/UI DESIGNER</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-2.jpg" alt="img">
                            <div class="demo-button">
                                <a href="index-2.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">WEB DEVELOPER</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-3.jpg" alt="img">
                            <div class="demo-button">
                                <a href="index-3.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Graphic designer</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-4.jpg" alt="img">
                            <div class="demo-button">
                                <a href="index-4.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Fashion Model</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-5.jpg" alt="img">
                            <div class="demo-button">
                                <a href="smart-portfolio.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Coverflow Slider</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-6.jpg" alt="img">
                            <div class="demo-button">
                                <a href="smart-portfolio-2.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Wrapper Slider</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-7.jpg" alt="img">
                            <div class="demo-button">
                                <a href="portfolio-horizontal.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Horizontal Slider</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-8.jpg" alt="img">
                            <div class="demo-button">
                                <a href="portfolio-parallax.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Parallax Slider</h4>
                        </div>
                    </div>
                    <div class="homemenu">
                        <div class="homemenu-thumb mb-15">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/header/home-9.jpg" alt="img">
                            <div class="demo-button">
                                <a href="portfolio-vertical.html" class="gt-theme-btn">Demo page</a>
                            </div>
                        </div>
                        <div class="homemenu-content text-center">
                            <h4 class="homemenu-title">Vertical Slider</h4>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <?php
        return ob_get_clean();
    }
}

 class Mobile_Nav_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $submenu_class = 'submenu';
        
        $output .= "\n{$indent}<ul class=\"{$submenu_class}\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "{$indent}</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = str_repeat("\t", $depth);
        
        // Get all item classes
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes = array_filter($classes); // Remove empty values
        
        // Check if has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        // Build li classes array
        $li_classes = [];
        
        // Add has-dropdown if has children
        if ($has_children) {
            $li_classes[] = 'has-dropdown';
        }
        
        // Add active class
        if ($item->current || $item->current_item_ancestor) {
            $li_classes[] = 'active';
        }
        
        // Add custom classes
        $allowed_classes = ['menu-thumb', 'd-xl-none', 'd-lg-none', 'd-md-none', 'border-none'];
        foreach ($classes as $class) {
            if (in_array($class, $allowed_classes)) {
                $li_classes[] = $class;
            }
        }
        
        // Start li tag
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        // Build link
        $atts = [];
        $atts['href'] = !empty($item->url) ? $item->url : 'javascript:void(0)';
        
        // Add link classes
        $link_class = [];
        if (in_array('border-none', $classes)) {
            $link_class[] = 'border-none';
        }
        
        if (!empty($link_class)) {
            $atts['class'] = implode(' ', $link_class);
        }
        
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        // Build link output
        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        
        // Add arrow icon for nested dropdowns
        if ($has_children && $depth > 0) {
            $item_output .= ' <i class="fas fa-angle-right"></i>';
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
