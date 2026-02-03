<?php
/**
 * Template Name: Our Practice (About)
 * Description: About page matching reference structure - fully editable via WordPress
 */

get_header();

// Get featured image for banner background
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
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div style="display: block !important; visibility: visible !important; opacity: 1 !important;" data-aos-duration="1500" data-aos="fade-up">
                        <div class="ry-text">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    the_content();
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
