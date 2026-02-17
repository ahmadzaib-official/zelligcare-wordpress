<?php
/**
 * Customizer additions
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zelligcare_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector' => '.site-title a',
                'render_callback' => 'zelligcare_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector' => '.site-description',
                'render_callback' => 'zelligcare_customize_partial_blogdescription',
            )
        );
    }

    // ============================================
    // ZELLIG CARE THEME OPTIONS SECTION
    // ============================================
    $wp_customize->add_section('zelligcare_theme_options', array(
        'title'    => __('Zellig Care Settings', 'zelligcare'),
        'priority' => 30,
    ));

    // Logo
    $wp_customize->add_setting('zelligcare_logo', array(
        'default'           => get_template_directory_uri() . '/images/homepage/zellig_new_logo.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_logo', array(
        'label'    => __('Site Logo', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'settings' => 'zelligcare_logo',
    )));

    // Contact Information
    $wp_customize->add_setting('zelligcare_phone', array(
        'default'           => '(215) 318-1821',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_phone', array(
        'label'    => __('Phone Number', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_phone_display', array(
        'default'           => '(215) 318-1821',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_phone_display', array(
        'label'    => __('Phone Number (Display Format)', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
        'description' => 'Different format for footer display (optional)',
    ));

    $wp_customize->add_setting('zelligcare_fax', array(
        'default'           => '(215) 315-5765',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_fax', array(
        'label'    => __('Fax Number', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_email', array(
        'default'           => 'practice@zelligcare.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('zelligcare_email', array(
        'label'    => __('Email Address', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'email',
    ));

    // Address
    $wp_customize->add_setting('zelligcare_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_address', array(
        'label'    => __('Street Address', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_city_state_zip', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_city_state_zip', array(
        'label'    => __('City, State ZIP', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    // Social Media Links
    $wp_customize->add_setting('zelligcare_facebook', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_facebook', array(
        'label'    => __('Facebook URL', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('zelligcare_instagram', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_instagram', array(
        'label'    => __('Instagram URL', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('zelligcare_google', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_google', array(
        'label'    => __('Google Business URL', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'url',
    ));

    // Homepage Hero Section
    $wp_customize->add_setting('zelligcare_hero_title', array(
        'default'           => 'Zellig Psychiatry',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_hero_title', array(
        'label'    => __('Hero Title', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_hero_subtitle', array(
        'default'           => 'Personalized care, thoughtfully delivered.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    // Homepage Hero Slider Images
    $wp_customize->add_setting('zelligcare_hero_slider_images', array(
        'default'           => '',
        'sanitize_callback' => 'zelligcare_sanitize_image_array',
    ));
    $wp_customize->add_control(new ZelligCare_Multiple_Image_Control($wp_customize, 'zelligcare_hero_slider_images', array(
        'label'    => __('Hero Slider Images', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'settings' => 'zelligcare_hero_slider_images',
        'description' => 'Add multiple images for the homepage hero slider',
    )));

    // Insurance Logos
    $wp_customize->add_setting('zelligcare_insurance_logos', array(
        'default'           => '',
        'sanitize_callback' => 'zelligcare_sanitize_image_array',
    ));
    $wp_customize->add_control(new ZelligCare_Multiple_Image_Control($wp_customize, 'zelligcare_insurance_logos', array(
        'label'    => __('Insurance Logos', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'settings' => 'zelligcare_insurance_logos',
        'description' => 'Add insurance company logos (Cigna, Aetna, BCBS, United Healthcare, etc.)',
    )));

    // States We Serve
    $wp_customize->add_setting('zelligcare_states_served', array(
        'default'           => 'Pennsylvania',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_states_served', array(
        'label'    => __('States We Serve', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
        'description' => 'Comma-separated list of states (e.g., Pennsylvania, New York)',
    ));

    // Appointment Form URL
    $wp_customize->add_setting('zelligcare_appointment_url', array(
        'default'           => 'https://intakeq.com/new/x25dh0',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_appointment_url', array(
        'label'    => __('Appointment Request URL', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'url',
        'description' => 'URL for appointment request form',
    ));

    // Homepage CTA Section
    $wp_customize->add_setting('zelligcare_cta_title', array(
        'default'           => 'WHAT WE<br>OFFER',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('zelligcare_cta_title', array(
        'label'    => __('CTA Section Title', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_cta_description', array(
        'default'           => 'World-class psychiatric care delivered by highly trained psychiatric physician assistants. We accept most insurance plans and offer appointments within the week.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('zelligcare_cta_description', array(
        'label'    => __('CTA Section Description', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'textarea',
    ));

    // Homepage Specialties Section
    $wp_customize->add_setting('zelligcare_specialties_subtitle', array(
        'default'           => 'EXPERTISE THAT MATTERS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_specialties_subtitle', array(
        'label'    => __('Specialties Section Subtitle', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
        'description' => __('First part of specialties title (e.g., "EXPERTISE THAT MATTERS")', 'zelligcare'),
    ));

    $wp_customize->add_setting('zelligcare_specialties_title', array(
        'default'           => 'OUR SPECIALTIES',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_specialties_title', array(
        'label'    => __('Specialties Section Title', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
        'description' => __('Main specialties title (e.g., "OUR SPECIALTIES")', 'zelligcare'),
    ));

    // Homepage Team Section
    $wp_customize->add_setting('zelligcare_team_title', array(
        'default'           => 'Meet the Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_team_title', array(
        'label'    => __('Team Section Title', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
        'description' => __('Title for the "Meet the Team" section on homepage', 'zelligcare'),
    ));

    // Homepage Locations Section
    $wp_customize->add_setting('zelligcare_locations_title', array(
        'default'           => 'States We Serve',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_locations_title', array(
        'label'    => __('Locations Section Title', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    // Homepage Insurance Section
    $wp_customize->add_setting('zelligcare_insurance_title', array(
        'default'           => 'Accepted Insurance',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_insurance_title', array(
        'label'    => __('Insurance Section Title', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'type'     => 'text',
    ));

    // ============================================
    // DEFAULT BANNER IMAGE
    // ============================================
    $wp_customize->add_setting('zelligcare_default_banner', array(
        'default'           => get_template_directory_uri() . '/images/homepage/ib.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_default_banner', array(
        'label'    => __('Default Page Banner Image', 'zelligcare'),
        'section'  => 'zelligcare_theme_options',
        'settings' => 'zelligcare_default_banner',
        'description' => 'Fallback banner image for pages without a featured image',
    )));

    // ============================================
    // SIDEBAR CTA SETTINGS
    // ============================================
    $wp_customize->add_section('zelligcare_sidebar_cta', array(
        'title'    => __('Sidebar CTA Cards', 'zelligcare'),
        'priority' => 35,
    ));

    // Sidebar CTA 1
    $wp_customize->add_setting('zelligcare_sidebar_cta1_image', array(
        'default'           => get_template_directory_uri() . '/images/homepage/sb1.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_sidebar_cta1_image', array(
        'label'    => __('CTA Card 1 Image', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'settings' => 'zelligcare_sidebar_cta1_image',
    )));

    $wp_customize->add_setting('zelligcare_sidebar_cta1_title', array(
        'default'           => 'Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta1_title', array(
        'label'    => __('CTA Card 1 Title', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta1_button', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta1_button', array(
        'label'    => __('CTA Card 1 Button Text', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta1_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta1_url', array(
        'label'    => __('CTA Card 1 URL', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'type'     => 'url',
        'description' => 'Defaults to /services/ if empty',
    ));

    // Sidebar CTA 2
    $wp_customize->add_setting('zelligcare_sidebar_cta2_image', array(
        'default'           => get_template_directory_uri() . '/images/homepage/sb2.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_sidebar_cta2_image', array(
        'label'    => __('CTA Card 2 Image', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'settings' => 'zelligcare_sidebar_cta2_image',
    )));

    $wp_customize->add_setting('zelligcare_sidebar_cta2_title', array(
        'default'           => 'Keep In Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta2_title', array(
        'label'    => __('CTA Card 2 Title', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta2_button', array(
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta2_button', array(
        'label'    => __('CTA Card 2 Button Text', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta2_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta2_url', array(
        'label'    => __('CTA Card 2 URL', 'zelligcare'),
        'section'  => 'zelligcare_sidebar_cta',
        'type'     => 'url',
        'description' => 'Defaults to /contact-us/ if empty',
    ));
}

// Sanitize function for image arrays
function zelligcare_sanitize_image_array($input) {
    if (is_array($input)) {
        return array_map('esc_url_raw', $input);
    }
    return esc_url_raw($input);
}

// Multiple Image Control Class
if (class_exists('WP_Customize_Control')) {
    class ZelligCare_Multiple_Image_Control extends WP_Customize_Control {
        public $type = 'multiple_image';
        
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php if (!empty($this->description)) : ?>
                    <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php endif; ?>
                <div class="multiple-image-container">
                    <?php
                    $images = $this->value();
                    if (!is_array($images)) {
                        $images = array();
                    }
                    foreach ($images as $index => $image_url) {
                        if (!empty($image_url)) {
                            ?>
                            <div class="image-item" data-index="<?php echo esc_attr($index); ?>">
                                <img src="<?php echo esc_url($image_url); ?>" style="max-width: 150px; height: auto; margin: 5px;">
                                <button type="button" class="button remove-image" data-index="<?php echo esc_attr($index); ?>">Remove</button>
                                <input type="hidden" class="image-url" value="<?php echo esc_url($image_url); ?>">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <button type="button" class="button button-primary add-image">Add Image</button>
                <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr(json_encode($this->value())); ?>">
            </label>
            <script>
            jQuery(document).ready(function($) {
                var control = $('#customize-control-<?php echo esc_js($this->id); ?>');
                var input = control.find('input[type="hidden"]');
                
                control.on('click', '.add-image', function(e) {
                    e.preventDefault();
                    var frame = wp.media({
                        title: 'Select Image',
                        button: { text: 'Use Image' },
                        multiple: false
                    });
                    frame.on('select', function() {
                        var attachment = frame.state().get('selection').first().toJSON();
                        var images = JSON.parse(input.val() || '[]');
                        images.push(attachment.url);
                        input.val(JSON.stringify(images)).trigger('change');
                        location.reload(); // Simple reload to show new image
                    });
                    frame.open();
                });
                
                control.on('click', '.remove-image', function(e) {
                    e.preventDefault();
                    var index = $(this).data('index');
                    var images = JSON.parse(input.val() || '[]');
                    images.splice(index, 1);
                    input.val(JSON.stringify(images)).trigger('change');
                    location.reload();
                });
            });
            </script>
            <style>
            .multiple-image-container {
                margin: 10px 0;
            }
            .image-item {
                display: inline-block;
                margin: 5px;
                padding: 5px;
                border: 1px solid #ddd;
                vertical-align: top;
            }
            </style>
            <?php
        }
    }
}
add_action('customize_register', 'zelligcare_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zelligcare_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zelligcare_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zelligcare_customize_preview_js()
{
    wp_enqueue_script('zelligcare-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'zelligcare_customize_preview_js');
