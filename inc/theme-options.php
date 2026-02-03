<?php
/**
 * Theme Customizer Settings for Zellig Care
 *
 * Site-wide settings editable from Appearance > Customize.
 */

function zelligcare_theme_options_register($wp_customize) {

    // =============================================
    // CONTACT INFORMATION SECTION
    // =============================================
    $wp_customize->add_section('zelligcare_contact_info', array(
        'title'    => 'Contact Information',
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('zelligcare_phone', array(
        'default'           => '(555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_phone', array(
        'label'   => 'Phone Number',
        'section' => 'zelligcare_contact_info',
        'type'    => 'text',
    ));

    // Fax Number
    $wp_customize->add_setting('zelligcare_fax', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_fax', array(
        'label'   => 'Fax Number',
        'section' => 'zelligcare_contact_info',
        'type'    => 'text',
    ));

    // Email Address
    $wp_customize->add_setting('zelligcare_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('zelligcare_email', array(
        'label'   => 'Email Address',
        'section' => 'zelligcare_contact_info',
        'type'    => 'email',
    ));

    // Street Address
    $wp_customize->add_setting('zelligcare_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_address', array(
        'label'   => 'Street Address',
        'section' => 'zelligcare_contact_info',
        'type'    => 'text',
    ));

    // City, State, ZIP
    $wp_customize->add_setting('zelligcare_city_state_zip', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_city_state_zip', array(
        'label'   => 'City, State, ZIP',
        'section' => 'zelligcare_contact_info',
        'type'    => 'text',
    ));

    // =============================================
    // SOCIAL MEDIA SECTION
    // =============================================
    $wp_customize->add_section('zelligcare_social_media', array(
        'title'    => 'Social Media',
        'priority' => 35,
    ));

    $social_fields = array(
        'facebook'        => 'Facebook URL',
        'instagram'       => 'Instagram URL',
        'google_business' => 'Google Business URL',
    );

    foreach ($social_fields as $key => $label) {
        $wp_customize->add_setting('zelligcare_' . $key, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('zelligcare_' . $key, array(
            'label'   => $label,
            'section' => 'zelligcare_social_media',
            'type'    => 'url',
        ));
    }

    // =============================================
    // DEFAULT IMAGES SECTION
    // =============================================
    $wp_customize->add_section('zelligcare_default_images', array(
        'title'    => 'Default Images',
        'priority' => 40,
    ));

    // Default Banner Image
    $wp_customize->add_setting('zelligcare_default_banner', array(
        'default'           => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_default_banner', array(
        'label'   => 'Default Banner Image',
        'section' => 'zelligcare_default_images',
    )));

    // Sidebar CTA 1
    $wp_customize->add_setting('zelligcare_sidebar_cta1_image', array(
        'default'           => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb1.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_sidebar_cta1_image', array(
        'label'   => 'Sidebar CTA 1 - Image',
        'section' => 'zelligcare_default_images',
    )));

    $wp_customize->add_setting('zelligcare_sidebar_cta1_title', array(
        'default'           => 'Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta1_title', array(
        'label'   => 'Sidebar CTA 1 - Title',
        'section' => 'zelligcare_default_images',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta1_button', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta1_button', array(
        'label'   => 'Sidebar CTA 1 - Button Text',
        'section' => 'zelligcare_default_images',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta1_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta1_url', array(
        'label'       => 'Sidebar CTA 1 - Link URL',
        'description' => 'Leave empty for /services/',
        'section'     => 'zelligcare_default_images',
        'type'        => 'url',
    ));

    // Sidebar CTA 2
    $wp_customize->add_setting('zelligcare_sidebar_cta2_image', array(
        'default'           => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb2.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zelligcare_sidebar_cta2_image', array(
        'label'   => 'Sidebar CTA 2 - Image',
        'section' => 'zelligcare_default_images',
    )));

    $wp_customize->add_setting('zelligcare_sidebar_cta2_title', array(
        'default'           => 'Keep In Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta2_title', array(
        'label'   => 'Sidebar CTA 2 - Title',
        'section' => 'zelligcare_default_images',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta2_button', array(
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta2_button', array(
        'label'   => 'Sidebar CTA 2 - Button Text',
        'section' => 'zelligcare_default_images',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('zelligcare_sidebar_cta2_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('zelligcare_sidebar_cta2_url', array(
        'label'       => 'Sidebar CTA 2 - Link URL',
        'description' => 'Leave empty for /contact-us/',
        'section'     => 'zelligcare_default_images',
        'type'        => 'url',
    ));
}
add_action('customize_register', 'zelligcare_theme_options_register');
