<?php
/**
 * Template Name: Specialty Condition
 * 
 * Generic template for specialty condition pages (Anxiety, ADHD, Bipolar, etc.)
 * This template can be used for all specialty pages
 */

get_header(); 

// Get the page slug to determine which specialty this is
$page_slug = get_post_field('post_name', get_post());
$specialty_name = get_the_title();
?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php 
        // Check if ACF is available, otherwise use featured image or default
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
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <?php 
            // Output WordPress content
            if (have_posts()) : 
                while (have_posts()) : the_post();
                    $content = get_the_content();
                    if (!empty(trim($content))) {
                        // If content exists, output it (it should be formatted as HTML matching the structure)
                        echo apply_filters('the_content', $content);
                    } else {
                        // Default placeholder content structure
                        ?>
                        <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
                            <div class="col-xs-12 ry-container">
                                <div class="col-xs-12 content">
                                    <div class="col-xs-12 col-lg-6 each each-photo">
                                        <div class="col-xs-12 wrapper">
                                            <div class="col-xs-12 photo">
                                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/anxiety_003.jpg" loading="lazy" alt="<?php echo esc_attr($specialty_name); ?>" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 each each-text">
                                        <div class="col-xs-12 wrapper">
                                            <div class="ry-text">
                                                <h3>Understanding <?php echo esc_html($specialty_name); ?></h3>
                                                <p>Content for <?php echo esc_html($specialty_name); ?> will be displayed here.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
