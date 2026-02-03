<?php
/**
 * Template Name: Payment Options
 *
 * Custom page template for the Payment Options page.
 */

get_header(); ?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php
        if (function_exists('get_field')) {
            $banner_image = get_field('banner_image');
        }
        if (empty($banner_image)) {
            $banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
        if (empty($banner_image)) {
            $banner_image = 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg';
        }
        echo esc_url($banner_image);
    ?>');">
        <div class="col-xs-12 ">
            <img src="<?php echo esc_url($banner_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
        </div>
    </div>
    <div class="col-xs-12 ry-pg-title">
        <div class="col-xs-12 ry-container">
            <div>
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-12 module-grid-basic">
                        <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 40px;">
                            <h2>Insurance We Accept:</h2>
                        </div>
                        <div class="col-xs-12 ry-flex ry-payment-options-logos" data-aos-duration="1500" data-aos="fade-up">
                            <div class="col-xs-12 ry-each">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/cigna.png" loading="lazy" alt="Cigna" class="img-responsive">
                            </div>
                            <div class="col-xs-12 ry-each">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/aetna_logo.png" loading="lazy" alt="Aetna" class="img-responsive">
                            </div>
                            <div class="col-xs-12 ry-each">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/bcbs_logo.png" loading="lazy" alt="Blue Cross Blue Shield" class="img-responsive">
                            </div>
                            <div class="col-xs-12 ry-each">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/united.png" loading="lazy" alt="United Healthcare" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix "></div>
                    <div class="ry-text" data-aos-duration="1500" data-aos="fade-up">
                        <section>
                            <h3 style="text-align: center;">Private Pay</h3>
                            <p data-start="139" data-end="308" style="text-align: center;">We understand that not all services are covered by insurance. That&rsquo;s why we proudly offer <strong data-start="229" data-end="261">flexible private pay options</strong> to make your care accessible and affordable.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
