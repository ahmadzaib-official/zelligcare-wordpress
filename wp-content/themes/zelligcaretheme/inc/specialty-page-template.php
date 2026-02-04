<?php
/**
 * Reusable template function for specialty pages
 * Makes all specialty page content editable from WordPress admin
 */

function zelligcare_render_specialty_page_sections() {
    // Get editable sections from meta fields
    $sections = get_post_meta(get_the_ID(), 'zelligcare_page_sections', true);
    
    // If no sections set, check if page has content in editor
    if (empty($sections) || !is_array($sections)) {
        $page_content = get_the_content();
        if (!empty(trim(strip_tags($page_content)))) {
            // Use page content if available
            echo '<div class="col-xs-12 ry-container"><div class="col-xs-12 content"><div class="ry-text">';
            echo apply_filters('the_content', $page_content);
            echo '</div></div></div>';
            return;
        }
        
        // If still empty, show a message for admins
        if (current_user_can('edit_pages')) {
            echo '<div class="col-xs-12 ry-container"><div class="col-xs-12 content"><div class="ry-text">';
            echo '<div class="notice notice-info" style="padding: 15px; margin: 20px 0;">';
            echo '<p><strong>No content found for this specialty page.</strong></p>';
            echo '<p>To add content:</p>';
            echo '<ol>';
            echo '<li>Go to <a href="' . admin_url('tools.php?page=zelligcare-import-html') . '">Tools → Import HTML Content</a> to import from HTML files, OR</li>';
            echo '<li>Edit this page and add content sections using the "Page Content Sections" meta box below the editor.</li>';
            echo '</ol>';
            echo '</div>';
            echo '</div></div></div>';
        }
        return;
    }
    
    // Display sections
    if (!empty($sections) && is_array($sections)) {
        $animations = array('fade-left', 'fade-right', 'fade-left');
        foreach ($sections as $index => $section) {
            if (empty($section['title']) && empty($section['content'])) continue;
            
            $animation = isset($animations[$index % count($animations)]) ? $animations[$index % count($animations)] : 'fade-up';
            $image_on_left = ($index % 2 == 0);
            // Try multiple image field names for compatibility
            $section_image = '';
            if (!empty($section['image'])) {
                $section_image = $section['image'];
            } elseif (!empty($section['image_url'])) {
                $section_image = $section['image_url'];
            } elseif (!empty($section['image_id'])) {
                $img_url = wp_get_attachment_image_url($section['image_id'], 'full');
                if ($img_url) {
                    $section_image = $img_url;
                }
            }
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="<?php echo esc_attr($animation); ?>">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <?php if ($image_on_left && $section_image) : ?>
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <img src="<?php echo esc_url($section_image); ?>" loading="lazy" alt="<?php echo esc_attr($section['title']); ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <?php if (!empty($section['title'])) : ?>
                                    <h3><?php echo esc_html($section['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($section['content'])) : ?>
                                    <div><?php echo wp_kses_post($section['content']); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!$image_on_left && $section_image) : ?>
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <img src="<?php echo esc_url($section_image); ?>" loading="lazy" alt="<?php echo esc_attr($section['title']); ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
