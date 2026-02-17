<?php
/**
 * Template Part: Page Banner
 *
 * Reusable banner with background image and page title.
 * Image fallback: Featured Image > page_banner_image meta > Customizer default > CDN fallback.
 */

$banner_image = '';

// 1. Featured Image (skip for team members — their featured image is a headshot, not a banner)
if (has_post_thumbnail() && get_post_type() !== 'team_member') {
    $banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
}

// 2. Page meta field
if (empty($banner_image)) {
    $banner_image = get_post_meta(get_the_ID(), 'page_banner_image', true);
}

// 3. ACF field (if ACF is active)
if (empty($banner_image) && function_exists('get_field')) {
    $banner_image = get_field('banner_image');
}

// 4. Customizer default
if (empty($banner_image)) {
    $banner_image = get_theme_mod('zelligcare_default_banner', '');
}

// 5. CDN fallback
if (empty($banner_image)) {
    $banner_image = get_template_directory_uri() . '/images/homepage/ib.jpg';
}
?>
<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php echo esc_url($banner_image); ?>');">
        <div class="col-xs-12">
            <img src="<?php echo esc_url($banner_image); ?>" loading="lazy" alt="" class="img-responsive">
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
