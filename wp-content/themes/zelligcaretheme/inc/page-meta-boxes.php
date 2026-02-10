<?php
/**
 * Page Meta Boxes - Per-page content fields editable from WordPress admin
 *
 * Each meta box is conditionally displayed based on the page template slug.
 */

// Register all page meta boxes
function zelligcare_add_page_meta_boxes() {
    $screen = get_current_screen();
    if (!$screen || $screen->id !== 'page') {
        return;
    }

    global $post;
    if (!$post) return;

    $template = get_page_template_slug($post->ID);
    $slug = $post->post_name;

    // Careers page
    if ($template === 'page-careers.php' || $slug === 'practice-with-purpose' || $slug === 'careers') {
        add_meta_box('zelligcare_careers_benefits', 'Careers Page - Benefits Section', 'zelligcare_careers_benefits_callback', 'page', 'normal', 'high');
    }

    // Payment page
    if ($template === 'page-payment.php' || $slug === 'payment-options') {
        add_meta_box('zelligcare_payment_meta', 'Payment Page Settings', 'zelligcare_payment_meta_callback', 'page', 'normal', 'high');
    }

    // Review page
    if ($template === 'page-review.php' || $slug === 'review' || $slug === 'reviews') {
        add_meta_box('zelligcare_review_meta', 'Reviews Page Settings', 'zelligcare_review_meta_callback', 'page', 'normal', 'high');
    }

    // Refer a Patient page
    if ($template === 'page-refer-patient.php' || $slug === 'refer-a-patient') {
        add_meta_box('zelligcare_refer_meta', 'Referral Page Settings', 'zelligcare_refer_meta_callback', 'page', 'normal', 'high');
    }

    // Feedback page
    if ($template === 'page-feedback.php' || $slug === 'feedback') {
        add_meta_box('zelligcare_feedback_meta', 'Feedback Page Settings', 'zelligcare_feedback_meta_callback', 'page', 'normal', 'high');
    }

    // Leave a Review page
    if ($template === 'page-leave-review.php' || $slug === 'leave-a-review') {
        add_meta_box('zelligcare_leave_review_meta', 'Leave a Review Page Settings', 'zelligcare_leave_review_meta_callback', 'page', 'normal', 'high');
    }

    // Appointment page
    if ($template === 'page-appointment.php' || $slug === 'request-an-appointment') {
        add_meta_box('zelligcare_appointment_meta', 'Appointment Page Settings', 'zelligcare_appointment_meta_callback', 'page', 'normal', 'high');
    }

    // Contact page
    if ($template === 'page-contact.php' || $slug === 'contact-us') {
        add_meta_box('zelligcare_contact_meta', 'Contact Page Settings', 'zelligcare_contact_meta_callback', 'page', 'normal', 'high');
    }

    // Services page
    if ($template === 'page-services.php' || $slug === 'services') {
        add_meta_box('zelligcare_services_meta', 'Services Page Settings', 'zelligcare_services_meta_callback', 'page', 'normal', 'high');
    }
}
add_action('add_meta_boxes', 'zelligcare_add_page_meta_boxes');

// ============================================
// CAREERS PAGE META BOX
// ============================================
function zelligcare_careers_benefits_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_nonce');

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
                $default_benefits = array(
                    array('title' => 'Transparent, Market-Leading Pay', 'content' => 'We believe in paying clinicians fairly and transparently. Our compensation is among the best in the field, with options for 1099 contracts or W2 roles with a comprehensive benefits package.', 'icon' => get_template_directory_uri() . '/images/careers/icon1.png'),
                    array('title' => 'A Supportive, Tech-Forward Practice', 'content' => 'Administrative burdens are kept off your plate. Our systems—from an award-winning EMR with AI scribe to thoughtfully designed workflows—are built to make your work smoother.', 'icon' => get_template_directory_uri() . '/images/careers/icon2.png'),
                    array('title' => 'Unmatched Career Development', 'content' => 'At Zellig, professional growth isn\'t an afterthought. Newer providers are paired with experienced mentors. Teaching, writing, and leadership opportunities are encouraged and supported at every stage.', 'icon' => get_template_directory_uri() . '/images/careers/icon3.png'),
                    array('title' => 'Mission-Driven Work', 'content' => 'We are deeply committed to making mental health care more equitable. Through our pro bono program, clinicians are paid while providing low-cost or free care to patients who need it most.', 'icon' => get_template_directory_uri() . '/images/careers/icon4.png'),
                    array('title' => 'A Connected Team, Even From Afar', 'content' => 'Because we spend so much of our lives at work, we believe that genuine connection matters. At Zellig, community isn\'t mandatory—but it\'s thoughtfully supported.', 'icon' => get_template_directory_uri() . '/images/careers/icon_5_new.png'),
                    array('title' => 'Autonomy with Support', 'content' => 'You bring the expertise—we trust you to use it. At Zellig, clinicians have the freedom to craft individualized care plans while still having access to collaborative support when they need it.', 'icon' => get_template_directory_uri() . '/images/careers/icon6.png'),
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

            $(document).on('click', '.remove-benefit', function(e) {
                e.preventDefault();
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
        .benefit-item { background: #f9f9f9; border: 1px solid #ddd; border-radius: 4px; padding: 15px; margin-bottom: 15px; }
        .benefit-item .benefit-header { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .benefit-item .remove-benefit { color: #a00; cursor: pointer; }
        .benefit-item label { display: block; font-weight: 600; margin-bottom: 5px; }
        .benefit-item input[type="text"], .benefit-item input[type="url"], .benefit-item textarea { width: 100%; }
        .benefit-item .benefit-icon-preview { max-width: 100px; margin-top: 10px; }
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

// ============================================
// PAYMENT PAGE META BOX
// ============================================
function zelligcare_payment_meta_callback($post) {
    $heading = get_post_meta($post->ID, 'insurance_heading', true);
    $logos = get_post_meta($post->ID, 'insurance_logos', true);
    if (!is_array($logos)) $logos = array();
    ?>
    <table class="form-table">
        <tr>
            <th><label for="insurance_heading">Insurance Section Heading</label></th>
            <td>
                <input type="text" id="insurance_heading" name="insurance_heading" value="<?php echo esc_attr($heading ?: 'Accepted Insurance'); ?>" class="regular-text">
            </td>
        </tr>
    </table>
    <h3>Insurance Logos</h3>
    <p class="description">Add insurance company logos with names. These appear on the payment page only.</p>
    <div id="insurance-logos-list">
        <?php
        if (empty($logos)) {
            zelligcare_render_insurance_logo_fields(0, array());
        } else {
            foreach ($logos as $index => $logo) {
                zelligcare_render_insurance_logo_fields($index, $logo);
            }
        }
        ?>
    </div>
    <p><button type="button" class="button" id="add-insurance-logo">+ Add Logo</button></p>

    <script type="text/template" id="insurance-logo-template">
        <?php zelligcare_render_insurance_logo_fields('{{INDEX}}', array()); ?>
    </script>
    <script>
    jQuery(document).ready(function($) {
        var logoIndex = <?php echo max(count($logos), 1); ?>;
        $('#add-insurance-logo').on('click', function() {
            var t = $('#insurance-logo-template').html().replace(/\{\{INDEX\}\}/g, logoIndex);
            $('#insurance-logos-list').append(t);
            logoIndex++;
        });
        $(document).on('click', '.remove-insurance-logo', function(e) {
            e.preventDefault();
            $(this).closest('.insurance-logo-item').remove();
        });
        $(document).on('click', '.insurance-logo-upload-btn', function(e) {
            e.preventDefault();
            var btn = $(this), target = btn.data('target');
            var frame = wp.media({ title: 'Select Logo', button: { text: 'Use Image' }, multiple: false });
            frame.on('select', function() {
                var url = frame.state().get('selection').first().toJSON().url;
                $('#' + target).val(url);
                btn.siblings('.insurance-logo-preview').attr('src', url).show();
            });
            frame.open();
        });
    });
    </script>
    <style>
    .insurance-logo-item { background: #f9f9f9; border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; display: flex; gap: 10px; align-items: center; }
    .insurance-logo-item input { flex: 1; }
    .insurance-logo-preview { max-width: 80px; max-height: 40px; }
    </style>
    <?php
}

function zelligcare_render_insurance_logo_fields($index, $logo) {
    $name = isset($logo['name']) ? $logo['name'] : '';
    $image = isset($logo['image']) ? $logo['image'] : '';
    ?>
    <div class="insurance-logo-item" data-index="<?php echo esc_attr($index); ?>">
        <input type="text" name="insurance_logos[<?php echo esc_attr($index); ?>][name]" value="<?php echo esc_attr($name); ?>" placeholder="Insurance name" style="max-width:200px;">
        <input type="url" id="insurance_logo_image_<?php echo esc_attr($index); ?>" name="insurance_logos[<?php echo esc_attr($index); ?>][image]" value="<?php echo esc_url($image); ?>" placeholder="Image URL">
        <button type="button" class="button insurance-logo-upload-btn" data-target="insurance_logo_image_<?php echo esc_attr($index); ?>">Upload</button>
        <?php if ($image) : ?>
        <img src="<?php echo esc_url($image); ?>" class="insurance-logo-preview">
        <?php else : ?>
        <img src="" class="insurance-logo-preview" style="display:none;">
        <?php endif; ?>
        <a href="#" class="remove-insurance-logo" style="color:#a00;">Remove</a>
    </div>
    <?php
}

// ============================================
// REVIEW PAGE META BOX
// ============================================
function zelligcare_review_meta_callback($post) {
    $heading = get_post_meta($post->ID, 'review_heading', true);
    $subtitle = get_post_meta($post->ID, 'review_subtitle', true);
    $good_text = get_post_meta($post->ID, 'good_review_text', true);
    $good_url = get_post_meta($post->ID, 'good_review_url', true);
    $bad_text = get_post_meta($post->ID, 'bad_review_text', true);
    $bad_url = get_post_meta($post->ID, 'bad_review_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="review_heading">Page Heading</label></th>
            <td><input type="text" id="review_heading" name="review_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="e.g., Patient Reviews"></td>
        </tr>
        <tr>
            <th><label for="review_subtitle">Subtitle</label></th>
            <td><input type="text" id="review_subtitle" name="review_subtitle" value="<?php echo esc_attr($subtitle); ?>" class="regular-text" placeholder="e.g., How did we do?"></td>
        </tr>
        <tr>
            <th><label for="good_review_text">Good Experience Button Text</label></th>
            <td><input type="text" id="good_review_text" name="good_review_text" value="<?php echo esc_attr($good_text ?: 'Good'); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="good_review_url">Good Experience URL</label></th>
            <td><input type="url" id="good_review_url" name="good_review_url" value="<?php echo esc_url($good_url); ?>" class="regular-text" placeholder="e.g., Google review URL"></td>
        </tr>
        <tr>
            <th><label for="bad_review_text">Bad Experience Button Text</label></th>
            <td><input type="text" id="bad_review_text" name="bad_review_text" value="<?php echo esc_attr($bad_text ?: 'Bad'); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="bad_review_url">Bad Experience URL</label></th>
            <td><input type="url" id="bad_review_url" name="bad_review_url" value="<?php echo esc_url($bad_url); ?>" class="regular-text" placeholder="e.g., Feedback form URL"></td>
        </tr>
    </table>
    <?php
}

// ============================================
// REFER A PATIENT META BOX
// ============================================
function zelligcare_refer_meta_callback($post) {
    $heading = get_post_meta($post->ID, 'refer_form_heading', true);
    $description = get_post_meta($post->ID, 'refer_form_description', true);
    $image = get_post_meta($post->ID, 'refer_form_image', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="refer_form_heading">Section Heading</label></th>
            <td><input type="text" id="refer_form_heading" name="refer_form_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="e.g., Refer a Patient"></td>
        </tr>
        <tr>
            <th><label for="refer_form_description">Description</label></th>
            <td><textarea id="refer_form_description" name="refer_form_description" rows="4" class="large-text"><?php echo esc_textarea($description); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="refer_form_image">Form Image</label></th>
            <td>
                <input type="url" id="refer_form_image" name="refer_form_image" value="<?php echo esc_url($image); ?>" class="regular-text">
                <button type="button" class="button zelligcare-upload-btn" data-target="refer_form_image">Upload</button>
                <?php if ($image) : ?>
                <br><img src="<?php echo esc_url($image); ?>" style="max-width:200px; margin-top:10px;">
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// FEEDBACK PAGE META BOX
// ============================================
function zelligcare_feedback_meta_callback($post) {
    $heading = get_post_meta($post->ID, 'feedback_heading', true);
    $description = get_post_meta($post->ID, 'feedback_description', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="feedback_heading">Page Heading</label></th>
            <td><input type="text" id="feedback_heading" name="feedback_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="e.g., We Value Your Feedback"></td>
        </tr>
        <tr>
            <th><label for="feedback_description">Description</label></th>
            <td><textarea id="feedback_description" name="feedback_description" rows="4" class="large-text"><?php echo esc_textarea($description); ?></textarea></td>
        </tr>
    </table>
    <?php
}

// ============================================
// LEAVE A REVIEW META BOX
// ============================================
function zelligcare_leave_review_meta_callback($post) {
    $heading = get_post_meta($post->ID, 'review_form_heading', true);
    $instructions = get_post_meta($post->ID, 'review_form_instructions', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="review_form_heading">Page Heading</label></th>
            <td><input type="text" id="review_form_heading" name="review_form_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="e.g., Leave a Review"></td>
        </tr>
        <tr>
            <th><label for="review_form_instructions">Instructions</label></th>
            <td>
                <textarea id="review_form_instructions" name="review_form_instructions" rows="4" class="large-text"><?php echo esc_textarea($instructions); ?></textarea>
                <p class="description">HTML supported for formatting.</p>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// APPOINTMENT PAGE META BOX
// ============================================
function zelligcare_appointment_meta_callback($post) {
    $intro = get_post_meta($post->ID, 'appointment_intro', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="appointment_intro">Introduction Text</label></th>
            <td>
                <textarea id="appointment_intro" name="appointment_intro" rows="4" class="large-text"><?php echo esc_textarea($intro); ?></textarea>
                <p class="description">Text shown above the appointment request form/iframe.</p>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// CONTACT PAGE META BOX
// ============================================
function zelligcare_contact_meta_callback($post) {
    $heading = get_post_meta($post->ID, 'contact_heading', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="contact_heading">Section Heading</label></th>
            <td><input type="text" id="contact_heading" name="contact_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="e.g., Get In Touch"></td>
        </tr>
    </table>
    <?php
}

// ============================================
// SERVICES PAGE META BOX
// ============================================
function zelligcare_services_meta_callback($post) {
    $subtitle = get_post_meta($post->ID, 'services_subtitle', true);
    $heading = get_post_meta($post->ID, 'services_heading', true);
    $bg_image = get_post_meta($post->ID, 'services_bg_image', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="services_subtitle">Section Subtitle</label></th>
            <td><input type="text" id="services_subtitle" name="services_subtitle" value="<?php echo esc_attr($subtitle); ?>" class="regular-text" placeholder="e.g., EXPERTISE THAT MATTERS"></td>
        </tr>
        <tr>
            <th><label for="services_heading">Section Heading</label></th>
            <td><input type="text" id="services_heading" name="services_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="e.g., OUR SPECIALTIES"></td>
        </tr>
        <tr>
            <th><label for="services_bg_image">Background Image</label></th>
            <td>
                <input type="url" id="services_bg_image" name="services_bg_image" value="<?php echo esc_url($bg_image); ?>" class="regular-text">
                <button type="button" class="button zelligcare-upload-btn" data-target="services_bg_image">Upload</button>
                <?php if ($bg_image) : ?>
                <br><img src="<?php echo esc_url($bg_image); ?>" style="max-width:200px; margin-top:10px;">
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// SAVE ALL PAGE META
// ============================================
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

    $template = get_page_template_slug($post_id);

    // Careers fields
    if ($template === 'page-careers.php') {
        $text_fields = array('zelligcare_why_zellig_title', 'zelligcare_join_us_title');
        foreach ($text_fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
        $html_fields = array('zelligcare_why_zellig_content', 'zelligcare_join_us_content', 'zelligcare_join_us_instructions');
        foreach ($html_fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
            }
        }
        if (isset($_POST['zelligcare_careers_benefits']) && is_array($_POST['zelligcare_careers_benefits'])) {
            $benefits = array();
            foreach ($_POST['zelligcare_careers_benefits'] as $benefit) {
                if (empty($benefit['title']) && empty($benefit['content'])) continue;
                $benefits[] = array(
                    'title' => sanitize_text_field($benefit['title']),
                    'content' => wp_kses_post($benefit['content']),
                    'icon' => esc_url_raw($benefit['icon']),
                );
            }
            update_post_meta($post_id, 'zelligcare_careers_benefits', array_values($benefits));
        }
    }

    // Simple text fields (all pages)
    $simple_text_fields = array(
        'insurance_heading', 'review_heading', 'review_subtitle',
        'good_review_text', 'bad_review_text',
        'refer_form_heading', 'feedback_heading',
        'review_form_heading', 'contact_heading',
        'services_subtitle', 'services_heading',
    );
    foreach ($simple_text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    // URL fields
    $url_fields = array('good_review_url', 'bad_review_url', 'refer_form_image', 'services_bg_image');
    foreach ($url_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, esc_url_raw($_POST[$field]));
        }
    }

    // HTML fields
    $html_fields = array('refer_form_description', 'feedback_description', 'review_form_instructions', 'appointment_intro');
    foreach ($html_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
        }
    }

    // Insurance logos (payment page)
    if (isset($_POST['insurance_logos']) && is_array($_POST['insurance_logos'])) {
        $logos = array();
        foreach ($_POST['insurance_logos'] as $logo) {
            if (empty($logo['name']) && empty($logo['image'])) continue;
            $logos[] = array(
                'name' => sanitize_text_field($logo['name']),
                'image' => esc_url_raw($logo['image']),
            );
        }
        update_post_meta($post_id, 'insurance_logos', array_values($logos));
    }
}
add_action('save_post_page', 'zelligcare_save_page_meta');

// Enqueue media uploader for pages
function zelligcare_enqueue_page_media_uploader() {
    global $post_type;
    if ($post_type === 'page') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'zelligcare_enqueue_page_media_uploader');
