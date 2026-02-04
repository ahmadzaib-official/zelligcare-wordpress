<?php
/**
 * Custom Post Types for Zellig Care Theme
 * Makes Team Members, Services, and Specialties fully editable from WordPress admin
 */

// Register Team Member CPT
function zelligcare_register_team_member_cpt() {
    $labels = array(
        'name'               => 'Team Members',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Team',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team Member',
        'edit_item'          => 'Edit Team Member',
        'new_item'           => 'New Team Member',
        'view_item'          => 'View Team Member',
        'search_items'       => 'Search Team Members',
        'not_found'          => 'No team members found',
        'not_found_in_trash' => 'No team members found in trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true, // Enable Gutenberg
    );

    register_post_type('team_member', $args);
}
add_action('init', 'zelligcare_register_team_member_cpt');

// Register Specialty CPT
function zelligcare_register_specialty_cpt() {
    $labels = array(
        'name'               => 'Specialties',
        'singular_name'      => 'Specialty',
        'menu_name'          => 'Specialties',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Specialty',
        'edit_item'          => 'Edit Specialty',
        'new_item'           => 'New Specialty',
        'view_item'          => 'View Specialty',
        'search_items'       => 'Search Specialties',
        'not_found'          => 'No specialties found',
        'not_found_in_trash' => 'No specialties found in trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'specialties'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true, // Enable Gutenberg
    );

    register_post_type('specialty', $args);
}
add_action('init', 'zelligcare_register_specialty_cpt');

// Register Service CPT
function zelligcare_register_service_cpt() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Service',
        'edit_item'          => 'Edit Service',
        'new_item'           => 'New Service',
        'view_item'          => 'View Service',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found',
        'not_found_in_trash' => 'No services found in trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true, // Enable Gutenberg
    );

    register_post_type('service', $args);
}
add_action('init', 'zelligcare_register_service_cpt');

// Flush rewrite rules on theme activation
function zelligcare_rewrite_flush() {
    zelligcare_register_team_member_cpt();
    zelligcare_register_specialty_cpt();
    zelligcare_register_service_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'zelligcare_rewrite_flush');

// ============================================
// META BOXES
// ============================================

// Team Member Meta Box
function zelligcare_team_meta_boxes() {
    add_meta_box(
        'team_member_details',
        'Team Member Details',
        'zelligcare_team_meta_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'zelligcare_team_meta_boxes');

function zelligcare_team_meta_callback($post) {
    wp_nonce_field('zelligcare_team_meta', 'zelligcare_team_nonce');

    $position = get_post_meta($post->ID, 'team_position', true);
    $display_homepage = get_post_meta($post->ID, 'team_display_homepage', true);
    $display_order = get_post_meta($post->ID, 'team_display_order', true);
    if (empty($display_order)) {
        $display_order = 0;
    }
    ?>
    <table class="form-table">
        <tr>
            <th><label for="team_position">Position/Title</label></th>
            <td>
                <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" class="regular-text">
                <p class="description">e.g., Operations Manager, Physician Assistant</p>
            </td>
        </tr>
        <tr>
            <th><label for="team_display_homepage">Display on Homepage</label></th>
            <td>
                <input type="checkbox" id="team_display_homepage" name="team_display_homepage" value="1" <?php checked($display_homepage, '1'); ?>>
                <label for="team_display_homepage">Show this team member on the homepage</label>
            </td>
        </tr>
        <tr>
            <th><label for="team_display_order">Display Order</label></th>
            <td>
                <input type="number" id="team_display_order" name="team_display_order" value="<?php echo esc_attr($display_order); ?>" class="small-text" min="0">
                <p class="description">Lower numbers appear first. Used for ordering on homepage and team page.</p>
            </td>
        </tr>
    </table>
    <p class="description"><strong>Note:</strong> Use the Featured Image for the team member's photo. The post content (editor) is for the full bio.</p>
    <?php
}

function zelligcare_save_team_meta($post_id) {
    if (!isset($_POST['zelligcare_team_nonce']) || !wp_verify_nonce($_POST['zelligcare_team_nonce'], 'zelligcare_team_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['team_position'])) {
        update_post_meta($post_id, 'team_position', sanitize_text_field($_POST['team_position']));
    }
    $display_homepage = isset($_POST['team_display_homepage']) ? '1' : '0';
    update_post_meta($post_id, 'team_display_homepage', $display_homepage);
    if (isset($_POST['team_display_order'])) {
        update_post_meta($post_id, 'team_display_order', intval($_POST['team_display_order']));
    }
}
add_action('save_post_team_member', 'zelligcare_save_team_meta');

// Specialty Meta Box
function zelligcare_specialty_meta_boxes() {
    add_meta_box(
        'specialty_details',
        'Specialty Details',
        'zelligcare_specialty_meta_callback',
        'specialty',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'zelligcare_specialty_meta_boxes');

function zelligcare_specialty_meta_callback($post) {
    wp_nonce_field('zelligcare_specialty_meta', 'zelligcare_specialty_nonce');

    $icon_url = get_post_meta($post->ID, 'specialty_icon_url', true);
    $display_order = get_post_meta($post->ID, 'specialty_display_order', true);
    if (empty($display_order)) {
        $display_order = 0;
    }
    ?>
    <table class="form-table">
        <tr>
            <th><label for="specialty_icon_url">Icon Image URL</label></th>
            <td>
                <input type="url" id="specialty_icon_url" name="specialty_icon_url" value="<?php echo esc_url($icon_url); ?>" class="regular-text" placeholder="https://...">
                <button type="button" class="button zelligcare-upload-btn" data-target="specialty_icon_url">Upload Image</button>
                <p class="description">Icon for specialty cards. If not set, Featured Image will be used.</p>
                <?php if ($icon_url) : ?>
                <br><img src="<?php echo esc_url($icon_url); ?>" style="max-width: 150px; margin-top: 10px;">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><label for="specialty_display_order">Display Order</label></th>
            <td>
                <input type="number" id="specialty_display_order" name="specialty_display_order" value="<?php echo esc_attr($display_order); ?>" class="small-text" min="0">
                <p class="description">Lower numbers appear first. Used for ordering on homepage and services page.</p>
            </td>
        </tr>
    </table>
    <p class="description"><strong>Note:</strong> Use the Featured Image for the specialty image. The post content (editor) is for the specialty description.</p>
    <?php
}

function zelligcare_save_specialty_meta($post_id) {
    if (!isset($_POST['zelligcare_specialty_nonce']) || !wp_verify_nonce($_POST['zelligcare_specialty_nonce'], 'zelligcare_specialty_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['specialty_icon_url'])) {
        update_post_meta($post_id, 'specialty_icon_url', esc_url_raw($_POST['specialty_icon_url']));
    }
    if (isset($_POST['specialty_display_order'])) {
        update_post_meta($post_id, 'specialty_display_order', intval($_POST['specialty_display_order']));
    }
}
add_action('save_post_specialty', 'zelligcare_save_specialty_meta');

// Service Meta Box
function zelligcare_service_meta_boxes() {
    add_meta_box(
        'service_details',
        'Service Details',
        'zelligcare_service_meta_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'zelligcare_service_meta_boxes');

function zelligcare_service_meta_callback($post) {
    wp_nonce_field('zelligcare_service_meta', 'zelligcare_service_nonce');

    $icon_class = get_post_meta($post->ID, 'service_icon_class', true);
    $link_url = get_post_meta($post->ID, 'service_link_url', true);
    $display_order = get_post_meta($post->ID, 'service_display_order', true);
    if (empty($display_order)) {
        $display_order = 0;
    }
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_icon_class">Icon Class (Font Awesome)</label></th>
            <td>
                <input type="text" id="service_icon_class" name="service_icon_class" value="<?php echo esc_attr($icon_class); ?>" class="regular-text" placeholder="fa-solid fa-leaf">
                <p class="description">Font Awesome icon class (e.g., fa-solid fa-leaf, fa-solid fa-seedling)</p>
            </td>
        </tr>
        <tr>
            <th><label for="service_link_url">Link URL</label></th>
            <td>
                <input type="url" id="service_link_url" name="service_link_url" value="<?php echo esc_url($link_url); ?>" class="regular-text" placeholder="<?php echo esc_attr(home_url('/services/')); ?>">
                <p class="description">URL for the "Learn More" link. Leave empty to use the service page URL.</p>
            </td>
        </tr>
        <tr>
            <th><label for="service_display_order">Display Order</label></th>
            <td>
                <input type="number" id="service_display_order" name="service_display_order" value="<?php echo esc_attr($display_order); ?>" class="small-text" min="0">
                <p class="description">Lower numbers appear first. Used for ordering on homepage.</p>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_save_service_meta($post_id) {
    if (!isset($_POST['zelligcare_service_nonce']) || !wp_verify_nonce($_POST['zelligcare_service_nonce'], 'zelligcare_service_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['service_icon_class'])) {
        update_post_meta($post_id, 'service_icon_class', sanitize_text_field($_POST['service_icon_class']));
    }
    if (isset($_POST['service_link_url'])) {
        update_post_meta($post_id, 'service_link_url', esc_url_raw($_POST['service_link_url']));
    }
    if (isset($_POST['service_display_order'])) {
        update_post_meta($post_id, 'service_display_order', intval($_POST['service_display_order']));
    }
}
add_action('save_post_service', 'zelligcare_save_service_meta');

// Enqueue media uploader for meta boxes
function zelligcare_enqueue_media_uploader() {
    global $post_type;
    if (in_array($post_type, array('team_member', 'specialty', 'service'))) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'zelligcare_enqueue_media_uploader');

// Add upload button script
function zelligcare_upload_button_script() {
    global $post_type;
    if (in_array($post_type, array('team_member', 'specialty', 'service'))) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            $('.zelligcare-upload-btn').on('click', function(e) {
                e.preventDefault();
                var targetInput = $(this).data('target');
                var frame = wp.media({
                    title: 'Select Image',
                    button: { text: 'Use Image' },
                    multiple: false
                });
                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#' + targetInput).val(attachment.url);
                    // Update preview if exists
                    var preview = $('#' + targetInput).closest('td').find('img');
                    if (preview.length) {
                        preview.attr('src', attachment.url).show();
                    }
                });
                frame.open();
            });
        });
        </script>
        <?php
    }
}
add_action('admin_footer', 'zelligcare_upload_button_script');
