<?php
/**
 * Template Name: Accessibility Statement
 *
 * Custom page template for the Accessibility Statement page.
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
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <?php
                    // Output WordPress content if available, otherwise show default
                    $has_content = false;
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            $wp_content = get_the_content();
                            if (!empty(trim(strip_tags($wp_content)))) {
                                echo apply_filters('the_content', $wp_content);
                                $has_content = true;
                            }
                        endwhile;
                    endif;

                    // Show default content if no WordPress content
                    if (!$has_content) {
                        ?>
                        <p>We are continuously working to improve the accessibility of content on our website. Below, you'll find a few recommendations to help make your browsing experience more accessible.<br><br>If you have trouble seeing web pages, the US Social Security Administration offers these tips for optimizing your computer and browser to improve your online experience:<br><br></p>
                        <ul>
                            <li><p>Use your computer to read web pages out loud</p></li>
                            <li><p>Use the keyboard to navigate screens</p></li>
                            <li><p>Increase text size</p></li>
                            <li><p>Magnify your screen</p></li>
                            <li><p>Change background and text colors</p></li>
                            <li><p>Make your mouse pointer more visible (Windows only)</p></li>
                        </ul>
                        <p><br>If you are looking for alternatives to your mouse and keyboard, speech recognition software such as Dragon Naturally Speaking may help you navigate web pages and online services. This software allows the user to move focus around a web page or application screen through voice controls.<br><br>If you are deaf or hard of hearing, there are several accessibility features available to you.<br><br></p>
                        <h4>Closed Captioning</h4>
                        <p>Closed captioning provides a transcript for the audio track of a video presentation that is synchronized with the video and audio tracks. Captions are generally visually displayed over the video, which benefits people who are deaf or hard of hearing as well as anyone who cannot hear the audio due to noisy environments. Most of our video content includes captions, which you can learn how to turn on and off by visiting YouTube.<br><br></p>
                        <h4>Volume Controls</h4>
                        <p>Your computer, tablet, or mobile device has built-in volume control features. Each video and audio service has its own additional volume controls. Try adjusting both your device's and your media player's volume controls to optimize your listening experience.<br><br>If the recommendations above do not meet your needs, we invite you to contact us for assistance.</p>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 ry-right">
                    <div id="ry-sidebar" class="col-xs-12 ">
                        <div class="col-xs-12 ry-sb-main">
                            <div class="input-group search-bar-widget " id="searchfield" data-url="<?php echo esc_url(home_url('/search-result/')); ?>" data-variables="search">
                                <input type="text" class="form-control" placeholder="Enter search keyword" value>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary search-btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-12 ry-sb-cta">
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb1.jpg" loading="lazy" alt="Services" class="img-responsive">
                                        <div>
                                            <p>Services</p>
                                            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="ry-btn ry-btn-primary">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb2.jpg" loading="lazy" alt="Contact Us" class="img-responsive">
                                        <div>
                                            <p>Keep In Touch</p>
                                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="ry-btn ry-btn-primary">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
