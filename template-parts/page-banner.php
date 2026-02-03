<?php
/**
 * Template Part: Page Banner
 *
 * Reusable banner for all page templates.
 * Uses: featured image > page meta > CDN fallback
 */

$banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
if (empty($banner_image)) {
    $banner_image = get_post_meta(get_the_ID(), 'page_banner_image', true);
}
if (empty($banner_image)) {
    $banner_image = get_theme_mod('zelligcare_default_banner', 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg');
}
?>
<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php echo esc_url($banner_image); ?>');">
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
