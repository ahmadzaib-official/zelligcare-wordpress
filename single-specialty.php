<?php
/**
 * Template for displaying single specialty
 * Uses repeatable sections with alternating image/content layout
 */

get_header();

// Get specialty hero image with fallback chain
$hero_image = get_post_meta(get_the_ID(), 'specialty_hero_image', true);
if (empty($hero_image) && has_post_thumbnail()) {
    $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
if (empty($hero_image)) {
    $hero_image = get_theme_mod('zelligcare_default_banner', '');
}
if (empty($hero_image)) {
    $hero_image = get_template_directory_uri() . '/images/homepage/ib.jpg';
}

// Get sections
$sections = get_post_meta(get_the_ID(), 'specialty_sections', true);
if (!is_array($sections)) {
    $sections = array();
}
?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
        <div class="col-xs-12">
            <img src="<?php echo esc_url($hero_image); ?>" loading="lazy" alt="" class="img-responsive">
        </div>
        <div class="col-xs-12 ry-pg-title">
            <div class="col-xs-12 ry-container">
                <div>
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ry-pg-content">
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <?php
            if (!empty($sections)) :
                foreach ($sections as $index => $section) :
                    $aos_direction = ($index % 2 === 0) ? 'fade-left' : 'fade-right';
                    $title = isset($section['title']) ? $section['title'] : '';
                    $description = isset($section['description']) ? $section['description'] : '';
                    $image = isset($section['image']) ? $section['image'] : '';
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="<?php echo esc_attr($aos_direction); ?>">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image); ?>" loading="lazy" alt="<?php echo esc_attr($title); ?>" class="img-responsive">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <?php if ($title) : ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                    <?php echo wp_kses_post($description); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            else :
                // Fallback: show editor content if no sections defined
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-12 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- CTA: Request an Appointment -->
    <div class="col-xs-12 module-cta custom specialty-cta" data-aos-duration="1500" data-aos="fade-up">
        <div class="col-xs-12 ry-container" style="text-align: center; padding: 60px 0;">
            <h2 style="color: #b08d57; margin-bottom: 15px;">Ready to Get Started?</h2>
            <p style="max-width: 600px; margin: 0 auto 30px; font-size: 16px; line-height: 1.6;">
                Take the first step toward better mental health. Our team is here to provide compassionate, personalized care.
            </p>
            <a href="<?php echo esc_url(get_theme_mod('zelligcare_appointment_url', 'https://intakeq.com/new/zelligcare')); ?>" class="hero-cta-badge" target="_blank" title="Intake Form">REQUEST AN APPOINTMENT</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
