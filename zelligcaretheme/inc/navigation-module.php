<?php
/**
 * Navigation Module
 * 
 * Handles navigation menus with Bootstrap dropdown support
 * 
 * @package ZelligCare
 */

/**
 * Custom Bootstrap Navigation Walker
 * 
 * Extends WordPress Walker_Nav_Menu to output Bootstrap 3 dropdown menus
 */
class ZelligCare_Bootstrap_Nav_Walker extends Walker_Nav_Menu {
    
    /**
     * Start the list before the elements are added.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
    
    /**
     * End the list of after the elements are added.
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "$indent</ul>\n";
    }
    
    /**
     * Start the element output.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Check if item has children
        $has_children = in_array( 'menu-item-has-children', $classes );
        
        // Add dropdown class if has children
        if ( $has_children && $depth === 0 ) {
            $classes[] = 'dropdown';
            $classes[] = 'primary'; // Add primary class to match original HTML structure
        }
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names . ' role="presentation">';
        
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )       ? ' href="'   . esc_attr( $item->url       ) .'"' : '';
        
        // Add dropdown attributes if has children
        if ( $has_children && $depth === 0 ) {
            $attributes .= ' class="dropdown-toggle"';
            $attributes .= ' data-toggle="dropdown"';
            $attributes .= ' role="button"';
            $attributes .= ' aria-haspopup="true"';
            $attributes .= ' aria-expanded="false"';
        }
        
        $item_output = isset( $args->before ) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
        
        // Add caret for dropdown items
        if ( $has_children && $depth === 0 ) {
            $item_output .= '<span class="caret"></span>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset( $args->after ) ? $args->after : '';
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
    /**
     * End the element output.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

/**
 * Render About Dropdown Menu
 * 
 * Helper function to render the About dropdown menu with submenu items
 * 
 * @param array $menu_items Array of menu items with 'title', 'url', and optional 'children'
 * @return string HTML output
 */
function zelligcare_render_about_dropdown( $menu_items = array() ) {
    // Default menu items if none provided
    if ( empty( $menu_items ) ) {
        $careers_page = get_page_by_path('practice-with-purpose');
        if (!$careers_page) {
            $careers_page = get_page_by_path('careers'); // Fallback
        }
        $careers_url = $careers_page ? get_permalink($careers_page->ID) : home_url('/practice-with-purpose/');
        
        $menu_items = array(
            array(
                'title' => 'Our Practice',
                'url' => home_url( '/about/' ),
            ),
            array(
                'title' => 'Careers',
                'url' => $careers_url,
            ),
        );
    }
    
    $output = '<li class="dropdown" role="presentation">';
    $output .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' . esc_url( home_url( '/about/' ) ) . '" role="button" aria-haspopup="true" aria-expanded="false">';
    $output .= 'About<span class="caret"></span>';
    $output .= '</a>';
    $output .= '<ul class="dropdown-menu">';
    
    foreach ( $menu_items as $item ) {
        $output .= '<li>';
        $output .= '<a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>';
        $output .= '</li>';
    }
    
    $output .= '</ul>';
    $output .= '</li>';
    
    return $output;
}

/**
 * Render Specialties Dropdown Menu
 * 
 * Helper function to render the Specialties dropdown menu with all specialty pages
 * 
 * @param array $menu_items Array of menu items with 'title', 'url', and optional 'children'
 * @return string HTML output
 */
function zelligcare_render_specialties_dropdown( $menu_items = array() ) {
    // Default specialty menu items if none provided
    if ( empty( $menu_items ) ) {
        $menu_items = array(
            array(
                'title' => 'Anxiety',
                'url' => home_url( '/anxiety/' ),
            ),
            array(
                'title' => 'ADHD',
                'url' => home_url( '/adhd/' ),
            ),
            array(
                'title' => 'Bipolar',
                'url' => home_url( '/bipolar/' ),
            ),
            array(
                'title' => 'Depression',
                'url' => home_url( '/depression/' ),
            ),
            array(
                'title' => 'Insomnia',
                'url' => home_url( '/insomnia/' ),
            ),
            array(
                'title' => 'Life Transitions',
                'url' => home_url( '/life-transitions/' ),
            ),
            array(
                'title' => 'OCD',
                'url' => home_url( '/ocd/' ),
            ),
            array(
                'title' => 'Trauma & PTSD',
                'url' => home_url( '/trauma-ptsd/' ),
            ),
            array(
                'title' => 'Autism & Neurodivergence',
                'url' => home_url( '/autism-neurodivergence/' ),
            ),
        );
    }
    
    $output = '<li class="dropdown" role="presentation">';
    $output .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">';
    $output .= 'Specialties<span class="caret"></span>';
    $output .= '</a>';
    $output .= '<ul class="dropdown-menu">';
    
    foreach ( $menu_items as $item ) {
        $output .= '<li>';
        $output .= '<a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>';
        $output .= '</li>';
    }
    
    $output .= '</ul>';
    $output .= '</li>';
    
    return $output;
}

/**
 * Get Navigation Menu Items
 * 
 * Retrieves menu items for the primary navigation
 * 
 * @param string $theme_location Menu location slug
 * @return array Array of menu items
 */
function zelligcare_get_nav_menu_items( $theme_location = 'primary' ) {
    $menu_items = array();
    
    if ( has_nav_menu( $theme_location ) ) {
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locations[ $theme_location ] );
        
        if ( $menu ) {
            $menu_items = wp_get_nav_menu_items( $menu->term_id );
        }
    }
    
    return $menu_items;
}

/**
 * Render Primary Navigation Menu
 * 
 * Renders the primary navigation menu with Bootstrap dropdown support
 * 
 * @param array $args Menu arguments
 * @return string HTML output
 */
function zelligcare_render_primary_nav( $args = array() ) {
    $defaults = array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav-menu ry-nav',
        'fallback_cb' => 'zelligcare_fallback_menu',
        'walker' => new ZelligCare_Bootstrap_Nav_Walker(),
    );
    
    $args = wp_parse_args( $args, $defaults );
    
    return wp_nav_menu( $args );
}

/**
 * Check if menu item has children
 * 
 * @param int $item_id Menu item ID
 * @param array $menu_items All menu items
 * @return bool
 */
function zelligcare_menu_item_has_children( $item_id, $menu_items ) {
    foreach ( $menu_items as $item ) {
        if ( $item->menu_item_parent == $item_id ) {
            return true;
        }
    }
    return false;
}
