<?php
/**
 * Page Meta Boxes - Makes all page content editable from WordPress admin
 */

// Add meta boxes for all pages
function zelligcare_add_page_meta_boxes() {
    // Add to all pages
    add_meta_box(
        'zelligcare_page_sections',
        'Page Content Sections',
        'zelligcare_page_sections_callback',
        'page',
        'normal',
        'high'
    );
    
    // Add careers-specific meta box
    add_meta_box(
        'zelligcare_careers_benefits',
        'Careers Page - Benefits Section',
        'zelligcare_careers_benefits_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'zelligcare_add_page_meta_boxes');

// Page Sections Meta Box
function zelligcare_page_sections_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_nonce');
    
    $sections = get_post_meta($post->ID, 'zelligcare_page_sections', true);
    if (!is_array($sections)) {
        $sections = array();
    }
    
    // Check if this is a specialty page
    $is_specialty = false;
    $specialty_templates = array(
        'page-anxiety.php', 'page-adhd.php', 'page-bipolar.php', 
        'page-depression.php', 'page-insomnia.php', 'page-life-transitions.php',
        'page-ocd.php', 'page-trauma-ptsd.php', 'page-autism-neurodivergence.php'
    );
    $page_template = get_page_template_slug($post->ID);
    if (in_array($page_template, $specialty_templates)) {
        $is_specialty = true;
    }
    ?>
    <div class="zelligcare-sections-container">
        <div class="notice notice-info" style="margin: 10px 0; padding: 10px;">
            <p><strong>📝 Content Management:</strong> 
            <?php if ($is_specialty) : ?>
                This specialty page uses the sections below for its content. Add your content sections here - each section will automatically alternate layout (image left/right). You can also add content in the WordPress editor above if you prefer.
            <?php else : ?>
                This page can use custom content sections below. Add sections with title, content, and images. You can also add content in the WordPress editor above.
            <?php endif; ?>
            </p>
        </div>
        <p class="description">
            <?php if ($is_specialty) : ?>
                <strong>Specialty Page Sections:</strong> Add content sections with images. Each section alternates layout (image left/right).
            <?php else : ?>
                <strong>Page Sections:</strong> Add custom content sections for this page. Each section can have a title, content, and image.
            <?php endif; ?>
        </p>
        
        <div id="page-sections-list">
            <?php
            if (empty($sections)) {
                // Show one empty section by default
                zelligcare_render_page_section_fields(0, array(), $is_specialty);
            } else {
                foreach ($sections as $index => $section) {
                    zelligcare_render_page_section_fields($index, $section, $is_specialty);
                }
            }
            ?>
        </div>
        
        <p style="margin-top: 20px;">
            <button type="button" class="button button-primary" id="add-page-section">+ Add Section</button>
        </p>
        
        <script type="text/template" id="page-section-template">
            <?php zelligcare_render_page_section_fields('{{INDEX}}', array(), $is_specialty); ?>
        </script>
        
        <script>
        jQuery(document).ready(function($) {
            var sectionIndex = <?php echo count($sections); ?>;
            
            $('#add-page-section').on('click', function() {
                var template = $('#page-section-template').html();
                template = template.replace(/\{\{INDEX\}\}/g, sectionIndex);
                $('#page-sections-list').append(template);
                sectionIndex++;
            });
            
            $(document).on('click', '.remove-page-section', function() {
                $(this).closest('.page-section-item').remove();
            });
            
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
        });
        </script>
        
        <style>
        .page-section-item {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
        }
        .page-section-item .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .page-section-item .section-header h4 {
            margin: 0;
            color: #23282d;
        }
        .page-section-item .remove-page-section {
            color: #a00;
            cursor: pointer;
            text-decoration: none;
        }
        .page-section-item .remove-page-section:hover {
            color: #dc3232;
        }
        .page-section-item label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .page-section-item input[type="text"],
        .page-section-item input[type="url"],
        .page-section-item textarea {
            width: 100%;
        }
        .page-section-item .field-group {
            margin-bottom: 15px;
        }
        .page-section-item .section-image-preview {
            max-width: 200px;
            margin-top: 10px;
            display: block;
        }
        </style>
    </div>
    <?php
}

function zelligcare_render_page_section_fields($index, $section, $is_specialty = false) {
    $title = isset($section['title']) ? $section['title'] : '';
    $content = isset($section['content']) ? $section['content'] : '';
    $image = isset($section['image']) ? $section['image'] : '';
    
    if (is_numeric($index)) {
        $section_num = $index + 1;
    } else {
        $section_num = '{{INDEX_PLUS_1}}';
    }
    ?>
    <div class="page-section-item" data-index="<?php echo esc_attr($index); ?>">
        <div class="section-header">
            <h4>Section <?php echo esc_html($section_num); ?></h4>
            <a href="#" class="remove-page-section">Remove</a>
        </div>
        
        <div class="field-group">
            <label for="section_title_<?php echo esc_attr($index); ?>">Section Title</label>
            <input type="text"
                   id="section_title_<?php echo esc_attr($index); ?>"
                   name="zelligcare_page_sections[<?php echo esc_attr($index); ?>][title]"
                   value="<?php echo esc_attr($title); ?>"
                   placeholder="e.g., Understanding Anxiety">
        </div>
        
        <div class="field-group">
            <label for="section_content_<?php echo esc_attr($index); ?>">Section Content</label>
            <textarea id="section_content_<?php echo esc_attr($index); ?>"
                      name="zelligcare_page_sections[<?php echo esc_attr($index); ?>][content]"
                      rows="8"
                      placeholder="Enter the content for this section. You can use basic HTML like <p>, <ul>, <li>, <strong>, etc."><?php echo esc_textarea($content); ?></textarea>
            <p class="description">Supports HTML: &lt;p&gt;, &lt;ul&gt;, &lt;ol&gt;, &lt;li&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;br&gt;, &lt;h3&gt;</p>
        </div>
        
        <div class="field-group">
            <label for="section_image_<?php echo esc_attr($index); ?>">Section Image</label>
            <input type="url"
                   id="section_image_<?php echo esc_attr($index); ?>"
                   name="zelligcare_page_sections[<?php echo esc_attr($index); ?>][image]"
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

// Careers Benefits Meta Box
function zelligcare_careers_benefits_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_nonce');
    
    $page_template = get_page_template_slug($post->ID);
    if ($page_template !== 'page-careers.php') {
        echo '<p class="description">This meta box only appears on the Careers page.</p>';
        return;
    }
    
    $why_zellig_title = get_post_meta($post->ID, 'zelligcare_why_zellig_title', true);
    $why_zellig_content = get_post_meta($post->ID, 'zelligcare_why_zellig_content', true);
    $join_us_title = get_post_meta($post->ID, 'zelligcare_join_us_title', true);
    $join_us_content = get_post_meta($post->ID, 'zelligcare_join_us_content', true);
    $join_us_instructions = get_post_meta($post->ID, 'zelligcare_join_us_instructions', true);
    
    $benefits = get_post_meta($post->ID, 'zelligcare_careers_benefits', true);
    if (!is_array($benefits)) {
        $benefits = array();
    }
    ?>
    <div class="zelligcare-careers-benefits">
        <h3>Why Zellig Section</h3>
        <table class="form-table">
            <tr>
                <th><label for="why_zellig_title">Section Title</label></th>
                <td>
                    <input type="text" id="why_zellig_title" name="zelligcare_why_zellig_title" value="<?php echo esc_attr($why_zellig_title ?: 'Why Zellig?'); ?>" class="regular-text">
                </td>
            </tr>
            <tr>
                <th><label for="why_zellig_content">Section Content</label></th>
                <td>
                    <textarea id="why_zellig_content" name="zelligcare_why_zellig_content" rows="5" class="large-text"><?php echo esc_textarea($why_zellig_content); ?></textarea>
                </td>
            </tr>
        </table>
        
        <h3>Benefits</h3>
        <div id="careers-benefits-list">
            <?php
            if (empty($benefits)) {
                // Default benefits
                $default_benefits = array(
                    array('title' => 'Transparent, Market-Leading Pay', 'content' => 'We believe in paying clinicians fairly and transparently. Our compensation is among the best in the field, with options for 1099 contracts or W2 roles with a comprehensive benefits package.', 'icon' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon1.png'),
                    array('title' => 'A Supportive, Tech-Forward Practice', 'content' => 'Administrative burdens are kept off your plate. Our systems—from an award-winning EMR with AI scribe to thoughtfully designed workflows—are built to make your work smoother.', 'icon' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon2.png'),
                    array('title' => 'Unmatched Career Development', 'content' => 'At Zellig, professional growth isn\'t an afterthought. Newer providers are paired with experienced mentors. Teaching, writing, and leadership opportunities are encouraged and supported at every stage.', 'icon' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon3.png'),
                    array('title' => 'Mission-Driven Work', 'content' => 'We are deeply committed to making mental health care more equitable. Through our pro bono program, clinicians are paid while providing low-cost or free care to patients who need it most. Advocacy for causes that matter isn\'t just allowed—it\'s part of who we are.', 'icon' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon4.png'),
                    array('title' => 'A Connected Team, Even From Afar', 'content' => 'Because we spend so much of our lives at work, we believe that genuine connection matters. At Zellig, community isn\'t mandatory—but it\'s thoughtfully supported. From group chats and case discussions to optional meetups and shared projects, we make it easy to build meaningful relationships with your peers.', 'icon' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon_5_new.png'),
                    array('title' => 'Autonomy with Support', 'content' => 'You bring the expertise—we trust you to use it. At Zellig, clinicians have the freedom to craft individualized care plans while still having access to collaborative support when they need it.', 'icon' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon6.png'),
                );
                foreach ($default_benefits as $index => $benefit) {
                    zelligcare_render_benefit_fields($index, $benefit);
                }
            } else {
                foreach ($benefits as $index => $benefit) {
                    zelligcare_render_benefit_fields($index, $benefit);
                }
            }
            ?>
        </div>
        <p>
            <button type="button" class="button button-primary" id="add-benefit">+ Add Benefit</button>
        </p>
        
        <h3>Join Us Section</h3>
        <table class="form-table">
            <tr>
                <th><label for="join_us_title">Section Title</label></th>
                <td>
                    <input type="text" id="join_us_title" name="zelligcare_join_us_title" value="<?php echo esc_attr($join_us_title ?: 'join us'); ?>" class="regular-text">
                </td>
            </tr>
            <tr>
                <th><label for="join_us_content">Section Content</label></th>
                <td>
                    <textarea id="join_us_content" name="zelligcare_join_us_content" rows="5" class="large-text"><?php echo esc_textarea($join_us_content); ?></textarea>
                </td>
            </tr>
            <tr>
                <th><label for="join_us_instructions">Cover Letter Instructions</label></th>
                <td>
                    <textarea id="join_us_instructions" name="zelligcare_join_us_instructions" rows="8" class="large-text"><?php echo esc_textarea($join_us_instructions); ?></textarea>
                    <p class="description">HTML supported. Use &lt;ul&gt; and &lt;li&gt; for lists.</p>
                </td>
            </tr>
        </table>
        
        <script type="text/template" id="benefit-template">
            <?php zelligcare_render_benefit_fields('{{INDEX}}', array()); ?>
        </script>
        
        <script>
        jQuery(document).ready(function($) {
            var benefitIndex = <?php echo count($benefits) ?: 6; ?>;
            
            $('#add-benefit').on('click', function() {
                var template = $('#benefit-template').html();
                template = template.replace(/\{\{INDEX\}\}/g, benefitIndex);
                $('#careers-benefits-list').append(template);
                benefitIndex++;
            });
            
            $(document).on('click', '.remove-benefit', function() {
                $(this).closest('.benefit-item').remove();
            });
            
            $(document).on('click', '.benefit-upload-btn', function(e) {
                e.preventDefault();
                var button = $(this);
                var targetInput = button.data('target');
                var previewImg = button.siblings('.benefit-icon-preview');
                
                var frame = wp.media({
                    title: 'Select Benefit Icon',
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
        });
        </script>
        
        <style>
        .benefit-item {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .benefit-item .benefit-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .benefit-item .remove-benefit {
            color: #a00;
            cursor: pointer;
        }
        .benefit-item label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .benefit-item input[type="text"],
        .benefit-item input[type="url"],
        .benefit-item textarea {
            width: 100%;
        }
        .benefit-item .benefit-icon-preview {
            max-width: 100px;
            margin-top: 10px;
        }
        </style>
    </div>
    <?php
}

function zelligcare_render_benefit_fields($index, $benefit) {
    $title = isset($benefit['title']) ? $benefit['title'] : '';
    $content = isset($benefit['content']) ? $benefit['content'] : '';
    $icon = isset($benefit['icon']) ? $benefit['icon'] : '';
    ?>
    <div class="benefit-item" data-index="<?php echo esc_attr($index); ?>">
        <div class="benefit-header">
            <h4>Benefit <?php echo is_numeric($index) ? ($index + 1) : '{{INDEX_PLUS_1}}'; ?></h4>
            <a href="#" class="remove-benefit">Remove</a>
        </div>
        <div class="field-group">
            <label for="benefit_title_<?php echo esc_attr($index); ?>">Title</label>
            <input type="text" id="benefit_title_<?php echo esc_attr($index); ?>" name="zelligcare_careers_benefits[<?php echo esc_attr($index); ?>][title]" value="<?php echo esc_attr($title); ?>" class="regular-text">
        </div>
        <div class="field-group">
            <label for="benefit_content_<?php echo esc_attr($index); ?>">Content</label>
            <textarea id="benefit_content_<?php echo esc_attr($index); ?>" name="zelligcare_careers_benefits[<?php echo esc_attr($index); ?>][content]" rows="4" class="large-text"><?php echo esc_textarea($content); ?></textarea>
        </div>
        <div class="field-group">
            <label for="benefit_icon_<?php echo esc_attr($index); ?>">Icon Image URL</label>
            <input type="url" id="benefit_icon_<?php echo esc_attr($index); ?>" name="zelligcare_careers_benefits[<?php echo esc_attr($index); ?>][icon]" value="<?php echo esc_url($icon); ?>" class="regular-text">
            <button type="button" class="button benefit-upload-btn" data-target="benefit_icon_<?php echo esc_attr($index); ?>">Upload Icon</button>
            <?php if ($icon) : ?>
            <img src="<?php echo esc_url($icon); ?>" class="benefit-icon-preview">
            <?php else : ?>
            <img src="" class="benefit-icon-preview" style="display:none;">
            <?php endif; ?>
        </div>
    </div>
    <?php
}

// Save page meta data
function zelligcare_save_page_meta($post_id) {
    if (!isset($_POST['zelligcare_page_nonce']) || !wp_verify_nonce($_POST['zelligcare_page_nonce'], 'zelligcare_page_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save page sections
    if (isset($_POST['zelligcare_page_sections']) && is_array($_POST['zelligcare_page_sections'])) {
        $sections = array();
        foreach ($_POST['zelligcare_page_sections'] as $section) {
            if (empty($section['title']) && empty($section['content']) && empty($section['image'])) {
                continue;
            }
            $sections[] = array(
                'title' => sanitize_text_field($section['title']),
                'content' => wp_kses_post($section['content']),
                'image' => esc_url_raw($section['image'])
            );
        }
        $sections = array_values($sections);
        update_post_meta($post_id, 'zelligcare_page_sections', $sections);
    } else {
        delete_post_meta($post_id, 'zelligcare_page_sections');
    }
    
    // Save careers page fields
    $page_template = get_page_template_slug($post_id);
    if ($page_template === 'page-careers.php') {
        if (isset($_POST['zelligcare_why_zellig_title'])) {
            update_post_meta($post_id, 'zelligcare_why_zellig_title', sanitize_text_field($_POST['zelligcare_why_zellig_title']));
        }
        if (isset($_POST['zelligcare_why_zellig_content'])) {
            update_post_meta($post_id, 'zelligcare_why_zellig_content', wp_kses_post($_POST['zelligcare_why_zellig_content']));
        }
        if (isset($_POST['zelligcare_join_us_title'])) {
            update_post_meta($post_id, 'zelligcare_join_us_title', sanitize_text_field($_POST['zelligcare_join_us_title']));
        }
        if (isset($_POST['zelligcare_join_us_content'])) {
            update_post_meta($post_id, 'zelligcare_join_us_content', wp_kses_post($_POST['zelligcare_join_us_content']));
        }
        if (isset($_POST['zelligcare_join_us_instructions'])) {
            update_post_meta($post_id, 'zelligcare_join_us_instructions', wp_kses_post($_POST['zelligcare_join_us_instructions']));
        }
        
        // Save benefits
        if (isset($_POST['zelligcare_careers_benefits']) && is_array($_POST['zelligcare_careers_benefits'])) {
            $benefits = array();
            foreach ($_POST['zelligcare_careers_benefits'] as $benefit) {
                if (empty($benefit['title']) && empty($benefit['content'])) {
                    continue;
                }
                $benefits[] = array(
                    'title' => sanitize_text_field($benefit['title']),
                    'content' => wp_kses_post($benefit['content']),
                    'icon' => esc_url_raw($benefit['icon'])
                );
            }
            $benefits = array_values($benefits);
            update_post_meta($post_id, 'zelligcare_careers_benefits', $benefits);
        }
    }
}
add_action('save_post', 'zelligcare_save_page_meta');

// Enqueue media uploader
function zelligcare_enqueue_page_media_uploader() {
    global $post_type;
    if ($post_type === 'page') {
        wp_enqueue_media();
        
        // Add script to hide default WordPress editor message for pages using meta boxes
        ?>
        <script>
        jQuery(document).ready(function($) {
            // Hide default WordPress "ready for editing" message
            function hideDefaultEditorMessage() {
                var editorContent = $('#content').val() || '';
                var hasMetaBoxes = $('.zelligcare-sections-container').length > 0 || 
                                   $('.zelligcare-careers-benefits').length > 0;
                
                // Check if content is just the default WordPress message
                if (hasMetaBoxes && (editorContent.includes('This page is ready for editing') || 
                    editorContent.includes('Edit with Elementor') ||
                    editorContent.includes('You can replace this default content'))) {
                    // Clear the default message
                    $('#content').val('');
                }
            }
            
            // Run on page load
            hideDefaultEditorMessage();
            
            // Also check when editor content changes (for Gutenberg)
            if (typeof wp !== 'undefined' && wp.data) {
                wp.data.subscribe(function() {
                    setTimeout(hideDefaultEditorMessage, 100);
                });
            }
        });
        </script>
        <?php
    }
}
add_action('admin_enqueue_scripts', 'zelligcare_enqueue_page_media_uploader');
