<?php
/**
 * Template Part: Sidebar CTA
 *
 * Reusable sidebar with search bar and CTA cards.
 * Used by: privacy, accessibility, search-result, appointment, feedback, leave-review pages.
 */

$sidebar_cta1_image = get_theme_mod('zelligcare_sidebar_cta1_image', get_template_directory_uri() . '/images/homepage/sb1.jpg');
$sidebar_cta1_title = get_theme_mod('zelligcare_sidebar_cta1_title', 'Services');
$sidebar_cta1_button = get_theme_mod('zelligcare_sidebar_cta1_button', 'Learn More');
$sidebar_cta1_url = get_theme_mod('zelligcare_sidebar_cta1_url', home_url('/services/'));

$sidebar_cta2_image = get_theme_mod('zelligcare_sidebar_cta2_image', get_template_directory_uri() . '/images/homepage/sb2.jpg');
$sidebar_cta2_title = get_theme_mod('zelligcare_sidebar_cta2_title', 'Keep In Touch');
$sidebar_cta2_button = get_theme_mod('zelligcare_sidebar_cta2_button', 'Contact Us');
$sidebar_cta2_url = get_theme_mod('zelligcare_sidebar_cta2_url', home_url('/contact-us/'));
?>
<div class="col-xs-12 col-md-4 col-lg-4 ry-right">
    <div id="ry-sidebar" class="col-xs-12">
        <div class="col-xs-12 ry-sb-main">
            <div class="input-group search-bar-widget" id="searchfield" data-url="<?php echo esc_url(home_url('/search-result/')); ?>" data-variables="search">
                <input type="text" class="form-control" placeholder="Enter search keyword" value="">
                <span class="input-group-btn">
                    <button class="btn btn-primary search-btn" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
        <div class="col-xs-12 ry-sb-cta">
            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                <div class="col-xs-12 ry-cta">
                    <div class="col-xs-12 ry-cta-contain">
                        <img src="<?php echo esc_url($sidebar_cta1_image); ?>" loading="lazy" alt="<?php echo esc_attr($sidebar_cta1_title); ?>" class="img-responsive">
                        <div>
                            <p><?php echo esc_html($sidebar_cta1_title); ?></p>
                            <a href="<?php echo esc_url($sidebar_cta1_url); ?>" class="ry-btn ry-btn-primary"><?php echo esc_html($sidebar_cta1_button); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                <div class="col-xs-12 ry-cta">
                    <div class="col-xs-12 ry-cta-contain">
                        <img src="<?php echo esc_url($sidebar_cta2_image); ?>" loading="lazy" alt="<?php echo esc_attr($sidebar_cta2_title); ?>" class="img-responsive">
                        <div>
                            <p><?php echo esc_html($sidebar_cta2_title); ?></p>
                            <a href="<?php echo esc_url($sidebar_cta2_url); ?>" class="ry-btn ry-btn-primary"><?php echo esc_html($sidebar_cta2_button); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
