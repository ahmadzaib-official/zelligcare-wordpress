<?php
/**
 * Template for displaying single service
 */

get_header();

$banner_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg';
?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php echo esc_url($banner_image); ?>');">
        <div class="col-xs-12">
            <img src="<?php echo esc_url($banner_image); ?>" loading="lazy" alt class="img-responsive">
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

    <!-- Intro Section -->
    <?php if (has_excerpt()) : ?>
    <div id="ry-pg-body" class="col-xs-12 ry-section service-intro">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content">
                <div class="ry-text" style="text-align: center;">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <div class="col-xs-12 block">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 each each-text">
                            <div class="ry-text service-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="col-xs-12 module-cta custom v2">
        <div class="col-xs-12 background-wrapper" style="background: linear-gradient(135deg, #bd945a 0%, #d4a76a 100%);">
            <div class="col-xs-12 ry-container">
                <div class="col-xs-12 ry-headline" style="text-align: center;">
                    <h2>Schedule Your Appointment</h2>
                    <p>Our team is here to help you on your journey to better mental health.</p>
                </div>
                <div class="col-xs-12 btn-wrapper" style="text-align: center;">
                    <a href="<?php echo home_url('/request-appointment/'); ?>" class="ry-btn ry-btn-dark">
                        <?php echo esc_html(zelligcare_get_booking_text()); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
.service-intro .ry-container {
    max-width: 900px;
}
.service-intro .ry-text {
    font-size: 20px;
    line-height: 1.7;
}
.service-content h2 {
    font-family: 'Tenor Sans', sans-serif;
    font-size: 32px;
    color: #184f5a;
    margin: 40px 0 20px;
    text-transform: uppercase;
}
.service-content h3 {
    font-family: 'Tenor Sans', sans-serif;
    font-size: 26px;
    color: #184f5a;
    margin: 30px 0 15px;
}
.service-content ul, .service-content ol {
    margin: 20px 0;
    padding-left: 30px;
}
.service-content li {
    margin-bottom: 10px;
}
.ry-btn-dark {
    background: #184f5a;
    color: #fff;
}
</style>

<?php get_footer(); ?>
