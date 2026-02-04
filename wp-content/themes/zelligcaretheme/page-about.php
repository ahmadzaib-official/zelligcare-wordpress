<?php
/**
 * Template Name: Our Practice (About)
 * 
 * Custom page template for the About/Our Practice page
 */

get_header(); ?>

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
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div style="display: block !important; visibility: visible !important; opacity: 1 !important;" data-aos-duration="1500" data-aos="fade-up">
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
                            <p>Too often, mental health care is reduced to rushed visits, checklist symptoms, and profit-driven decisions. Many practices are run with little regard for patients or the clinicians providing care. Appointments are cut short, staff are treated as expendable, and the result is predictable: patients get less than they deserve.</p>
                            <p dir="ltr"><br>​​​​​​​Zellig was created as a response. We bring together the best providers, give them the time and support they need, and create an environment where their work is respected. When clinicians are valued, patients feel the difference.</p>
                            <p dir="ltr"><br>We also aim to offer the full spectrum of mental-health care—psychiatry, counseling, and beyond—delivered in a setting that looks at patients as whole people, not just medication lists or symptom checkboxes. Our integrative approach means we go further to understand each individual and craft treatment plans in true collaboration.</p>
                            <p dir="ltr"><br>Zellig is built on the idea that when care is thoughtful, unrushed, and grounded in respect for both patients and clinicians, the results are better for everyone.</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
