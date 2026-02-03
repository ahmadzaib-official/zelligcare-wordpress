<?php
/**
 * Page-Specific Meta Boxes for Zellig Care Theme
 *
 * Registers meta boxes conditionally based on page template.
 * Uses the same repeatable sections pattern established in custom-post-types.php.
 */

// ============================================
// REGISTER META BOXES
// ============================================

function zelligcare_page_meta_boxes() {
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'page') {
        return;
    }

    global $post;
    if (!$post) {
        return;
    }

    $template = get_page_template_slug($post->ID);
    $slug = $post->post_name;

    // Careers page: benefit cards
    if ($template === 'page-careers.php' || $slug === 'practice-with-purpose' || $slug === 'careers') {
        add_meta_box('careers_intro', 'Why Zellig Section', 'zelligcare_careers_intro_callback', 'page', 'normal', 'high');
        add_meta_box('careers_benefits', 'Benefit Cards', 'zelligcare_careers_benefits_callback', 'page', 'normal', 'high');
        add_meta_box('careers_join', 'Join Us Section', 'zelligcare_careers_join_callback', 'page', 'normal', 'high');
    }

    // Payment page: insurance logos
    if ($template === 'page-payment.php' || $slug === 'payment-options') {
        add_meta_box('payment_insurance', 'Insurance Logos', 'zelligcare_payment_insurance_callback', 'page', 'normal', 'high');
    }

    // Review page: heading + button config
    if ($template === 'page-review.php' || $slug === 'review' || $slug === 'reviews') {
        add_meta_box('review_config', 'Review Page Settings', 'zelligcare_review_config_callback', 'page', 'normal', 'high');
    }

    // Form pages: heading + description
    if ($template === 'page-refer-patient.php' || $slug === 'refer-a-patient') {
        add_meta_box('refer_settings', 'Referral Form Settings', 'zelligcare_refer_settings_callback', 'page', 'normal', 'high');
    }

    if ($template === 'page-feedback.php' || $slug === 'feedback') {
        add_meta_box('feedback_settings', 'Feedback Page Settings', 'zelligcare_feedback_settings_callback', 'page', 'normal', 'high');
    }

    if ($template === 'page-leave-review.php' || $slug === 'leave-a-review') {
        add_meta_box('leave_review_settings', 'Leave a Review Settings', 'zelligcare_leave_review_settings_callback', 'page', 'normal', 'high');
    }

    if ($template === 'page-appointment.php' || $slug === 'request-an-appointment') {
        add_meta_box('appointment_settings', 'Appointment Page Settings', 'zelligcare_appointment_settings_callback', 'page', 'normal', 'high');
    }

    // Contact page
    if ($template === 'page-contact.php' || $slug === 'contact-us') {
        add_meta_box('contact_settings', 'Contact Page Settings', 'zelligcare_contact_settings_callback', 'page', 'normal', 'high');
    }

    // Services page: section heading
    if ($template === 'page-services.php' || $slug === 'services') {
        add_meta_box('services_settings', 'Services Page Settings', 'zelligcare_services_settings_callback', 'page', 'normal', 'high');
    }
}
add_action('add_meta_boxes', 'zelligcare_page_meta_boxes');

// ============================================
// CAREERS PAGE CALLBACKS
// ============================================

function zelligcare_careers_intro_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'careers_intro_heading', true);
    $text = get_post_meta($post->ID, 'careers_intro_text', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="careers_intro_heading">Section Heading</label></th>
            <td>
                <input type="text" id="careers_intro_heading" name="careers_intro_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="Why Zellig?">
            </td>
        </tr>
        <tr>
            <th><label for="careers_intro_text">Introduction Text</label></th>
            <td>
                <textarea id="careers_intro_text" name="careers_intro_text" rows="4" class="large-text" placeholder="Join us in making mental health care..."><?php echo esc_textarea($text); ?></textarea>
                <p class="description">Supports HTML: &lt;p&gt;, &lt;br&gt;, &lt;strong&gt;, &lt;em&gt;</p>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_careers_benefits_callback($post) {
    $benefits = get_post_meta($post->ID, 'careers_benefits', true);
    if (!is_array($benefits)) {
        $benefits = array();
    }
    ?>
    <p class="description" style="margin-bottom: 15px;">
        Add benefit cards below. Each card has an icon, title, and description.
    </p>

    <div id="careers-benefits-container">
        <?php
        if (empty($benefits)) {
            zelligcare_render_benefit_fields(0, array());
        } else {
            foreach ($benefits as $index => $benefit) {
                zelligcare_render_benefit_fields($index, $benefit);
            }
        }
        ?>
    </div>

    <p style="margin-top: 20px;">
        <button type="button" class="button button-primary" id="add-careers-benefit">+ Add Benefit Card</button>
    </p>

    <script type="text/template" id="benefit-template">
        <?php zelligcare_render_benefit_fields('{{INDEX}}', array()); ?>
    </script>

    <script>
    jQuery(document).ready(function($) {
        var benefitIndex = <?php echo count($benefits); ?>;

        $('#add-careers-benefit').on('click', function() {
            var template = $('#benefit-template').html();
            template = template.replace(/\{\{INDEX\}\}/g, benefitIndex);
            $('#careers-benefits-container').append(template);
            benefitIndex++;
        });

        $(document).on('click', '.remove-benefit-btn', function() {
            $(this).closest('.benefit-item').remove();
        });

        $(document).on('click', '.benefit-upload-btn', function(e) {
            e.preventDefault();
            var button = $(this);
            var targetInput = button.data('target');
            var previewImg = button.siblings('.benefit-image-preview');

            var frame = wp.media({
                title: 'Select Icon',
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
            padding: 20px;
            margin-bottom: 15px;
        }
        .benefit-item .benefit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .benefit-item .benefit-header h4 { margin: 0; }
        .benefit-item .remove-benefit-btn { color: #a00; cursor: pointer; text-decoration: none; }
        .benefit-item .remove-benefit-btn:hover { color: #dc3232; }
        .benefit-item label { display: block; font-weight: 600; margin-bottom: 5px; }
        .benefit-item input[type="text"], .benefit-item input[type="url"], .benefit-item textarea { width: 100%; }
        .benefit-item .field-group { margin-bottom: 15px; }
        .benefit-item .benefit-image-preview { max-width: 80px; margin-top: 10px; display: block; }
    </style>
    <?php
}

function zelligcare_render_benefit_fields($index, $benefit) {
    $icon = isset($benefit['icon']) ? $benefit['icon'] : '';
    $title = isset($benefit['title']) ? $benefit['title'] : '';
    $description = isset($benefit['description']) ? $benefit['description'] : '';

    if (is_numeric($index)) {
        $num = $index + 1;
    } else {
        $num = '{{INDEX_PLUS_1}}';
    }
    ?>
    <div class="benefit-item" data-index="<?php echo esc_attr($index); ?>">
        <div class="benefit-header">
            <h4>Benefit Card <?php echo esc_html($num); ?></h4>
            <a href="#" class="remove-benefit-btn">Remove</a>
        </div>

        <div class="field-group">
            <label for="benefit_icon_<?php echo esc_attr($index); ?>">Icon Image URL</label>
            <input type="url" id="benefit_icon_<?php echo esc_attr($index); ?>" name="careers_benefits[<?php echo esc_attr($index); ?>][icon]" value="<?php echo esc_url($icon); ?>" placeholder="https://...">
            <button type="button" class="button benefit-upload-btn" data-target="benefit_icon_<?php echo esc_attr($index); ?>">Upload Icon</button>
            <?php if ($icon) : ?>
            <img src="<?php echo esc_url($icon); ?>" class="benefit-image-preview">
            <?php else : ?>
            <img src="" class="benefit-image-preview" style="display:none;">
            <?php endif; ?>
        </div>

        <div class="field-group">
            <label for="benefit_title_<?php echo esc_attr($index); ?>">Title</label>
            <input type="text" id="benefit_title_<?php echo esc_attr($index); ?>" name="careers_benefits[<?php echo esc_attr($index); ?>][title]" value="<?php echo esc_attr($title); ?>" placeholder="e.g., Transparent, Market-Leading Pay">
        </div>

        <div class="field-group">
            <label for="benefit_desc_<?php echo esc_attr($index); ?>">Description</label>
            <textarea id="benefit_desc_<?php echo esc_attr($index); ?>" name="careers_benefits[<?php echo esc_attr($index); ?>][description]" rows="4" placeholder="Describe this benefit..."><?php echo esc_textarea($description); ?></textarea>
        </div>
    </div>
    <?php
}

function zelligcare_careers_join_callback($post) {
    $heading = get_post_meta($post->ID, 'careers_join_heading', true);
    $text = get_post_meta($post->ID, 'careers_join_text', true);
    $list = get_post_meta($post->ID, 'careers_join_list', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="careers_join_heading">Section Heading</label></th>
            <td>
                <input type="text" id="careers_join_heading" name="careers_join_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="join us">
            </td>
        </tr>
        <tr>
            <th><label for="careers_join_text">Introduction Text</label></th>
            <td>
                <textarea id="careers_join_text" name="careers_join_text" rows="4" class="large-text" placeholder="We accept applications on a rolling basis..."><?php echo esc_textarea($text); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="careers_join_list">Cover Letter Requirements</label></th>
            <td>
                <textarea id="careers_join_list" name="careers_join_list" rows="6" class="large-text" placeholder="&lt;h5&gt;Please include in your cover letter:&lt;/h5&gt;&#10;&lt;ul&gt;&#10;&lt;li&gt;..."><?php echo esc_textarea($list); ?></textarea>
                <p class="description">Supports HTML: &lt;h5&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;p&gt;, &lt;strong&gt;</p>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// PAYMENT PAGE CALLBACK
// ============================================

function zelligcare_payment_insurance_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'insurance_heading', true);
    $logos = get_post_meta($post->ID, 'insurance_logos', true);
    if (!is_array($logos)) {
        $logos = array();
    }
    ?>
    <table class="form-table">
        <tr>
            <th><label for="insurance_heading">Section Heading</label></th>
            <td>
                <input type="text" id="insurance_heading" name="insurance_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="Insurance We Accept:">
            </td>
        </tr>
    </table>

    <p class="description" style="margin: 15px 0;">Add insurance carrier logos below.</p>

    <div id="insurance-logos-container">
        <?php
        if (empty($logos)) {
            zelligcare_render_logo_fields(0, array());
        } else {
            foreach ($logos as $index => $logo) {
                zelligcare_render_logo_fields($index, $logo);
            }
        }
        ?>
    </div>

    <p style="margin-top: 20px;">
        <button type="button" class="button button-primary" id="add-insurance-logo">+ Add Insurance Logo</button>
    </p>

    <script type="text/template" id="logo-template">
        <?php zelligcare_render_logo_fields('{{INDEX}}', array()); ?>
    </script>

    <script>
    jQuery(document).ready(function($) {
        var logoIndex = <?php echo count($logos); ?>;

        $('#add-insurance-logo').on('click', function() {
            var template = $('#logo-template').html();
            template = template.replace(/\{\{INDEX\}\}/g, logoIndex);
            $('#insurance-logos-container').append(template);
            logoIndex++;
        });

        $(document).on('click', '.remove-logo-btn', function() {
            $(this).closest('.logo-item').remove();
        });

        $(document).on('click', '.logo-upload-btn', function(e) {
            e.preventDefault();
            var button = $(this);
            var targetInput = button.data('target');
            var previewImg = button.siblings('.logo-image-preview');

            var frame = wp.media({
                title: 'Select Logo',
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
        .logo-item {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .logo-item .remove-logo-btn { color: #a00; cursor: pointer; text-decoration: none; }
        .logo-item .remove-logo-btn:hover { color: #dc3232; }
        .logo-item .logo-image-preview { max-width: 100px; max-height: 50px; }
        .logo-item input[type="text"], .logo-item input[type="url"] { flex: 1; }
    </style>
    <?php
}

function zelligcare_render_logo_fields($index, $logo) {
    $name = isset($logo['name']) ? $logo['name'] : '';
    $image = isset($logo['image']) ? $logo['image'] : '';
    ?>
    <div class="logo-item" data-index="<?php echo esc_attr($index); ?>">
        <div style="flex: 1;">
            <label>Name:</label>
            <input type="text" name="insurance_logos[<?php echo esc_attr($index); ?>][name]" value="<?php echo esc_attr($name); ?>" placeholder="e.g., Cigna" style="width: 100%;">
        </div>
        <div style="flex: 2;">
            <label>Image URL:</label>
            <input type="url" id="logo_image_<?php echo esc_attr($index); ?>" name="insurance_logos[<?php echo esc_attr($index); ?>][image]" value="<?php echo esc_url($image); ?>" placeholder="https://..." style="width: 100%;">
            <button type="button" class="button logo-upload-btn" data-target="logo_image_<?php echo esc_attr($index); ?>">Upload</button>
            <?php if ($image) : ?>
            <img src="<?php echo esc_url($image); ?>" class="logo-image-preview">
            <?php else : ?>
            <img src="" class="logo-image-preview" style="display:none;">
            <?php endif; ?>
        </div>
        <a href="#" class="remove-logo-btn">Remove</a>
    </div>
    <?php
}

// ============================================
// REVIEW PAGE CALLBACK
// ============================================

function zelligcare_review_config_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'review_heading', true);
    $subtitle = get_post_meta($post->ID, 'review_subtitle', true);
    $good_url = get_post_meta($post->ID, 'good_review_url', true);
    $good_text = get_post_meta($post->ID, 'good_review_text', true);
    $bad_url = get_post_meta($post->ID, 'bad_review_url', true);
    $bad_text = get_post_meta($post->ID, 'bad_review_text', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="review_heading">Main Heading</label></th>
            <td><input type="text" id="review_heading" name="review_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="We'd Love Your Feedback!"></td>
        </tr>
        <tr>
            <th><label for="review_subtitle">Subtitle</label></th>
            <td><input type="text" id="review_subtitle" name="review_subtitle" value="<?php echo esc_attr($subtitle); ?>" class="regular-text" placeholder="How was your experience with us?"></td>
        </tr>
        <tr>
            <th><label for="good_review_text">Good Button Text</label></th>
            <td><input type="text" id="good_review_text" name="good_review_text" value="<?php echo esc_attr($good_text); ?>" class="regular-text" placeholder="Good"></td>
        </tr>
        <tr>
            <th><label for="good_review_url">Good Button URL</label></th>
            <td><input type="url" id="good_review_url" name="good_review_url" value="<?php echo esc_url($good_url); ?>" class="regular-text" placeholder="<?php echo esc_url(home_url('/leave-a-review/')); ?>"></td>
        </tr>
        <tr>
            <th><label for="bad_review_text">Bad Button Text</label></th>
            <td><input type="text" id="bad_review_text" name="bad_review_text" value="<?php echo esc_attr($bad_text); ?>" class="regular-text" placeholder="Bad"></td>
        </tr>
        <tr>
            <th><label for="bad_review_url">Bad Button URL</label></th>
            <td><input type="url" id="bad_review_url" name="bad_review_url" value="<?php echo esc_url($bad_url); ?>" class="regular-text" placeholder="<?php echo esc_url(home_url('/feedback/')); ?>"></td>
        </tr>
    </table>
    <?php
}

// ============================================
// FORM PAGE CALLBACKS
// ============================================

function zelligcare_refer_settings_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'refer_form_heading', true);
    $description = get_post_meta($post->ID, 'refer_form_description', true);
    $image = get_post_meta($post->ID, 'refer_form_image', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="refer_form_heading">Form Heading</label></th>
            <td><input type="text" id="refer_form_heading" name="refer_form_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="Referral Form"></td>
        </tr>
        <tr>
            <th><label for="refer_form_description">Form Description</label></th>
            <td>
                <textarea id="refer_form_description" name="refer_form_description" rows="3" class="large-text" placeholder="We accept referrals for individuals seeking..."><?php echo esc_textarea($description); ?></textarea>
                <p class="description">Supports HTML: &lt;p&gt;, &lt;br&gt;, &lt;strong&gt;</p>
            </td>
        </tr>
        <tr>
            <th><label for="refer_form_image">Form Section Image</label></th>
            <td>
                <input type="url" id="refer_form_image" name="refer_form_image" value="<?php echo esc_url($image); ?>" class="regular-text" placeholder="https://...">
                <button type="button" class="button zelligcare-upload-btn" data-target="refer_form_image">Upload Image</button>
                <?php if ($image) : ?>
                <br><img src="<?php echo esc_url($image); ?>" style="max-width: 200px; margin-top: 10px;">
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_feedback_settings_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'feedback_heading', true);
    $description = get_post_meta($post->ID, 'feedback_description', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="feedback_heading">Form Heading</label></th>
            <td><input type="text" id="feedback_heading" name="feedback_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="Thank you for your honesty."></td>
        </tr>
        <tr>
            <th><label for="feedback_description">Form Description</label></th>
            <td>
                <textarea id="feedback_description" name="feedback_description" rows="3" class="large-text" placeholder="We're truly sorry we missed the mark..."><?php echo esc_textarea($description); ?></textarea>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_leave_review_settings_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'review_form_heading', true);
    $instructions = get_post_meta($post->ID, 'review_form_instructions', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="review_form_heading">Form Heading</label></th>
            <td><input type="text" id="review_form_heading" name="review_form_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="Write a Review"></td>
        </tr>
        <tr>
            <th><label for="review_form_instructions">Form Instructions</label></th>
            <td>
                <textarea id="review_form_instructions" name="review_form_instructions" rows="4" class="large-text" placeholder="We value your opinion!..."><?php echo esc_textarea($instructions); ?></textarea>
                <p class="description">Supports HTML: &lt;p&gt;, &lt;br&gt;, &lt;span&gt;, &lt;strong&gt;</p>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_appointment_settings_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $intro = get_post_meta($post->ID, 'appointment_intro', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="appointment_intro">Introduction Text</label></th>
            <td>
                <textarea id="appointment_intro" name="appointment_intro" rows="4" class="large-text" placeholder="At Zellig, we provide the highest quality service..."><?php echo esc_textarea($intro); ?></textarea>
                <p class="description">Displayed above the appointment form.</p>
            </td>
        </tr>
    </table>
    <?php
}

function zelligcare_contact_settings_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $heading = get_post_meta($post->ID, 'contact_heading', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="contact_heading">Section Heading</label></th>
            <td><input type="text" id="contact_heading" name="contact_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="Get In Touch"></td>
        </tr>
    </table>
    <?php
}

function zelligcare_services_settings_callback($post) {
    wp_nonce_field('zelligcare_page_meta', 'zelligcare_page_meta_nonce');

    $subtitle = get_post_meta($post->ID, 'services_subtitle', true);
    $heading = get_post_meta($post->ID, 'services_heading', true);
    $bg_image = get_post_meta($post->ID, 'services_bg_image', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="services_subtitle">Section Subtitle</label></th>
            <td><input type="text" id="services_subtitle" name="services_subtitle" value="<?php echo esc_attr($subtitle); ?>" class="regular-text" placeholder="EXPERTISE THAT MATTERS"></td>
        </tr>
        <tr>
            <th><label for="services_heading">Section Heading</label></th>
            <td><input type="text" id="services_heading" name="services_heading" value="<?php echo esc_attr($heading); ?>" class="regular-text" placeholder="OUR SPECIALTIES"></td>
        </tr>
        <tr>
            <th><label for="services_bg_image">Section Background Image</label></th>
            <td>
                <input type="url" id="services_bg_image" name="services_bg_image" value="<?php echo esc_url($bg_image); ?>" class="regular-text" placeholder="https://...">
                <button type="button" class="button zelligcare-upload-btn" data-target="services_bg_image">Upload Image</button>
            </td>
        </tr>
    </table>
    <?php
}

// ============================================
// SAVE PAGE META
// ============================================

function zelligcare_save_page_meta($post_id) {
    if (!isset($_POST['zelligcare_page_meta_nonce']) || !wp_verify_nonce($_POST['zelligcare_page_meta_nonce'], 'zelligcare_page_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Simple text fields
    $text_fields = array(
        'careers_intro_heading', 'careers_join_heading',
        'insurance_heading',
        'review_heading', 'review_subtitle', 'good_review_text', 'bad_review_text',
        'refer_form_heading',
        'feedback_heading',
        'review_form_heading',
        'contact_heading',
        'services_subtitle', 'services_heading',
    );

    foreach ($text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    // HTML textarea fields
    $html_fields = array(
        'careers_intro_text', 'careers_join_text', 'careers_join_list',
        'refer_form_description',
        'feedback_description',
        'review_form_instructions',
        'appointment_intro',
    );

    foreach ($html_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
        }
    }

    // URL fields
    $url_fields = array(
        'good_review_url', 'bad_review_url',
        'refer_form_image',
        'services_bg_image',
    );

    foreach ($url_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, esc_url_raw($_POST[$field]));
        }
    }

    // Repeatable: careers benefits
    if (isset($_POST['careers_benefits']) && is_array($_POST['careers_benefits'])) {
        $benefits = array();
        foreach ($_POST['careers_benefits'] as $benefit) {
            if (empty($benefit['title']) && empty($benefit['description']) && empty($benefit['icon'])) {
                continue;
            }
            $benefits[] = array(
                'icon' => esc_url_raw($benefit['icon']),
                'title' => sanitize_text_field($benefit['title']),
                'description' => wp_kses_post($benefit['description']),
            );
        }
        update_post_meta($post_id, 'careers_benefits', array_values($benefits));
    }

    // Repeatable: insurance logos
    if (isset($_POST['insurance_logos']) && is_array($_POST['insurance_logos'])) {
        $logos = array();
        foreach ($_POST['insurance_logos'] as $logo) {
            if (empty($logo['name']) && empty($logo['image'])) {
                continue;
            }
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
function zelligcare_enqueue_media_uploader_for_pages() {
    global $post_type;
    if ($post_type === 'page') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'zelligcare_enqueue_media_uploader_for_pages');
