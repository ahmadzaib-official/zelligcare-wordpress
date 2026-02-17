<?php
/**
 * Template Name: Depression
 *
 * Custom page template for the Depression specialty page.
 * Content is editable via the WordPress editor.
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <?php get_template_part('template-parts/specialty-sections'); ?>
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
