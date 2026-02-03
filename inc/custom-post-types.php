<?php
/**
 * Custom Post Types for Zellig Care Theme
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
        'supports'           => array('title', 'thumbnail', 'excerpt', 'custom-fields'), // Removed 'editor' - content is in sections
        'show_in_rest'       => false, // Use classic editor for meta boxes
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
    $credentials = get_post_meta($post->ID, 'team_credentials', true);
    $headshot = get_post_meta($post->ID, 'team_headshot', true);
    $display_homepage = get_post_meta($post->ID, 'team_display_homepage', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="team_position">Position/Title</label></th>
            <td>
                <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" class="regular-text">
                <p class="description">e.g., Psychiatric Nurse Practitioner</p>
            </td>
        </tr>
        <tr>
            <th><label for="team_credentials">Credentials</label></th>
            <td>
                <input type="text" id="team_credentials" name="team_credentials" value="<?php echo esc_attr($credentials); ?>" class="regular-text">
                <p class="description">e.g., PMHNP-BC, MSN, RN</p>
            </td>
        </tr>
        <tr>
            <th><label for="team_headshot">Headshot Image URL</label></th>
            <td>
                <input type="url" id="team_headshot" name="team_headshot" value="<?php echo esc_url($headshot); ?>" class="regular-text" placeholder="https://...">
                <button type="button" class="button zelligcare-upload-btn" data-target="team_headshot">Upload Image</button>
                <p class="description">Used when no Featured Image is set.</p>
                <?php if ($headshot) : ?>
                <br><img src="<?php echo esc_url($headshot); ?>" style="max-width: 150px; margin-top: 10px;">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><label for="team_display_homepage">Display on Homepage</label></th>
            <td>
                <input type="checkbox" id="team_display_homepage" name="team_display_homepage" value="1" <?php checked($display_homepage, '1'); ?>>
                <label for="team_display_homepage">Show this team member on the homepage</label>
            </td>
        </tr>
    </table>
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
    if (isset($_POST['team_credentials'])) {
        update_post_meta($post_id, 'team_credentials', sanitize_text_field($_POST['team_credentials']));
    }
    if (isset($_POST['team_headshot'])) {
        update_post_meta($post_id, 'team_headshot', esc_url_raw($_POST['team_headshot']));
    }
    $display_homepage = isset($_POST['team_display_homepage']) ? '1' : '0';
    update_post_meta($post_id, 'team_display_homepage', $display_homepage);
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
    add_meta_box(
        'specialty_sections',
        'Content Sections',
        'zelligcare_specialty_sections_callback',
        'specialty',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'zelligcare_specialty_meta_boxes');

function zelligcare_specialty_meta_callback($post) {
    wp_nonce_field('zelligcare_specialty_meta', 'zelligcare_specialty_nonce');

    $icon = get_post_meta($post->ID, 'specialty_icon', true);
    $hero_image = get_post_meta($post->ID, 'specialty_hero_image', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="specialty_icon">Icon Image URL</label></th>
            <td>
                <input type="url" id="specialty_icon" name="specialty_icon" value="<?php echo esc_url($icon); ?>" class="regular-text">
                <button type="button" class="button zelligcare-upload-btn" data-target="specialty_icon">Upload Icon</button>
                <p class="description">Small icon for cards (recommended: 100x100px)</p>
                <?php if ($icon) : ?>
                <br><img src="<?php echo esc_url($icon); ?>" style="max-width: 100px; margin-top: 10px;">
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th><label for="specialty_hero_image">Hero/Banner Image URL</label></th>
            <td>
                <input type="url" id="specialty_hero_image" name="specialty_hero_image" value="<?php echo esc_url($hero_image); ?>" class="regular-text">
                <button type="button" class="button zelligcare-upload-btn" data-target="specialty_hero_image">Upload Image</button>
                <p class="description">Background image for page banner (recommended: 1920x600px)</p>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_specialty_sections_callback($post) {
    $sections = get_post_meta($post->ID, 'specialty_sections', true);
    if (!is_array($sections)) {
        $sections = array();
    }
    ?>
    <p class="description" style="margin-bottom: 15px;">
        Add content sections below. Each section has a title, description, and image.
        Sections alternate layout: first section shows image on left, second shows image on right, and so on.
    </p>

    <div id="specialty-sections-container">
        <?php
        if (empty($sections)) {
            // Show one empty section by default
            zelligcare_render_section_fields(0, array());
        } else {
            foreach ($sections as $index => $section) {
                zelligcare_render_section_fields($index, $section);
            }
        }
        ?>
    </div>

    <p style="margin-top: 20px;">
        <button type="button" class="button button-primary" id="add-specialty-section">+ Add Section</button>
    </p>

    <script type="text/template" id="section-template">
        <?php zelligcare_render_section_fields('{{INDEX}}', array()); ?>
    </script>

    <script>
    jQuery(document).ready(function($) {
        var sectionIndex = <?php echo count($sections); ?>;

        // Add new section
        $('#add-specialty-section').on('click', function() {
            var template = $('#section-template').html();
            template = template.replace(/\{\{INDEX\}\}/g, sectionIndex);
            $('#specialty-sections-container').append(template);
            sectionIndex++;
        });

        // Remove section
        $(document).on('click', '.remove-section-btn', function() {
            $(this).closest('.specialty-section-item').remove();
        });

        // Media uploader for section images
        $(document).on('click', '.section-upload-btn', function(e) {
            e.preventDefault();
            var button = $(this);
            var targetInput = button.data('target');
            var previewImg = button.siblings('.section-image-preview');

            var frame = wp.media({
                title: 'Select Section Image',
                button: { text: 'Use Image' },
                multiple: false
            });

            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#' + targetInput).val(attachment.url);
                if (previewImg.length) {
                    previewImg.attr('src', attachment.url).show();
                }
            });

            frame.open();
        });

        // Legacy upload buttons
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
            });
            frame.open();
        });
    });
    </script>

    <style>
        .specialty-section-item {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
        }
        .specialty-section-item .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .specialty-section-item .section-header h4 {
            margin: 0;
            color: #23282d;
        }
        .specialty-section-item .section-layout-hint {
            font-size: 12px;
            color: #666;
            font-style: italic;
        }
        .specialty-section-item .remove-section-btn {
            color: #a00;
            cursor: pointer;
            text-decoration: none;
        }
        .specialty-section-item .remove-section-btn:hover {
            color: #dc3232;
        }
        .specialty-section-item label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .specialty-section-item input[type="text"],
        .specialty-section-item input[type="url"],
        .specialty-section-item textarea {
            width: 100%;
        }
        .specialty-section-item .field-group {
            margin-bottom: 15px;
        }
        .specialty-section-item .section-image-preview {
            max-width: 200px;
            margin-top: 10px;
            display: block;
        }
    </style>
    <?php
}

function zelligcare_render_section_fields($index, $section) {
    $title = isset($section['title']) ? $section['title'] : '';
    $description = isset($section['description']) ? $section['description'] : '';
    $image = isset($section['image']) ? $section['image'] : '';
    // Handle template placeholder - use placeholder text for non-numeric index
    if (is_numeric($index)) {
        $layout = ($index % 2 === 0) ? 'Image Left / Content Right' : 'Content Left / Image Right';
        $section_num = $index + 1;
    } else {
        $layout = 'Layout alternates automatically';
        $section_num = '{{INDEX_PLUS_1}}';
    }
    ?>
    <div class="specialty-section-item" data-index="<?php echo esc_attr($index); ?>">
        <div class="section-header">
            <h4>Section <?php echo esc_html($section_num); ?> <span class="section-layout-hint">(<?php echo esc_html($layout); ?>)</span></h4>
            <a href="#" class="remove-section-btn">Remove</a>
        </div>

        <div class="field-group">
            <label for="section_title_<?php echo esc_attr($index); ?>">Section Title</label>
            <input type="text"
                   id="section_title_<?php echo esc_attr($index); ?>"
                   name="specialty_sections[<?php echo esc_attr($index); ?>][title]"
                   value="<?php echo esc_attr($title); ?>"
                   placeholder="e.g., Understanding Anxiety">
        </div>

        <div class="field-group">
            <label for="section_description_<?php echo esc_attr($index); ?>">Section Content</label>
            <textarea id="section_description_<?php echo esc_attr($index); ?>"
                      name="specialty_sections[<?php echo esc_attr($index); ?>][description]"
                      rows="8"
                      placeholder="Enter the content for this section. You can use basic HTML like <p>, <ul>, <li>, <strong>, etc."><?php echo esc_textarea($description); ?></textarea>
            <p class="description">Supports HTML: &lt;p&gt;, &lt;ul&gt;, &lt;ol&gt;, &lt;li&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;br&gt;</p>
        </div>

        <div class="field-group">
            <label for="section_image_<?php echo esc_attr($index); ?>">Section Image</label>
            <input type="url"
                   id="section_image_<?php echo esc_attr($index); ?>"
                   name="specialty_sections[<?php echo esc_attr($index); ?>][image]"
                   value="<?php echo esc_url($image); ?>"
                   placeholder="https://...">
            <button type="button" class="button section-upload-btn" data-target="section_image_<?php echo esc_attr($index); ?>">Upload Image</button>
            <?php if ($image) : ?>
            <img src="<?php echo esc_url($image); ?>" class="section-image-preview">
            <?php else : ?>
            <img src="" class="section-image-preview" style="display:none;">
            <?php endif; ?>
        </div>
    </div>
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

    // Save basic fields
    if (isset($_POST['specialty_icon'])) {
        update_post_meta($post_id, 'specialty_icon', esc_url_raw($_POST['specialty_icon']));
    }
    if (isset($_POST['specialty_hero_image'])) {
        update_post_meta($post_id, 'specialty_hero_image', esc_url_raw($_POST['specialty_hero_image']));
    }

    // Save sections
    if (isset($_POST['specialty_sections']) && is_array($_POST['specialty_sections'])) {
        $sections = array();
        foreach ($_POST['specialty_sections'] as $section) {
            // Skip empty sections
            if (empty($section['title']) && empty($section['description']) && empty($section['image'])) {
                continue;
            }
            $sections[] = array(
                'title' => sanitize_text_field($section['title']),
                'description' => wp_kses_post($section['description']),
                'image' => esc_url_raw($section['image'])
            );
        }
        // Re-index array to ensure sequential keys
        $sections = array_values($sections);
        update_post_meta($post_id, 'specialty_sections', $sections);
    } else {
        delete_post_meta($post_id, 'specialty_sections');
    }
}
add_action('save_post_specialty', 'zelligcare_save_specialty_meta');

// Enqueue media uploader for meta boxes
function zelligcare_enqueue_media_uploader() {
    global $post_type;
    if (in_array($post_type, array('team_member', 'specialty', 'service'))) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'zelligcare_enqueue_media_uploader');
