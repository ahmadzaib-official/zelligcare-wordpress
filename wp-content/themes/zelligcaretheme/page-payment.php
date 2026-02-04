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
                        <?php
                        // Get page content
                        $page_content = '';
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                $page_content = get_the_content();
                            endwhile;
                        endif;
                        
                        // Check if page has custom content sections
                        $sections = get_post_meta(get_the_ID(), 'zelligcare_page_sections', true);
                        ?>
                        
                        <?php if (!empty($page_content) && !empty(trim(strip_tags($page_content)))) : ?>
                            <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 40px;">
                                <?php echo apply_filters('the_content', $page_content); ?>
                            </div>
                        <?php else : ?>
                            <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 40px;">
                                <h2>Insurance We Accept:</h2>
                            </div>
                        <?php endif; ?>
                        
                        <div class="col-xs-12 ry-flex ry-payment-options-logos" data-aos-duration="1500" data-aos="fade-up">
                            <?php
                            // Use insurance logos from theme options
                            $insurance_logos = zelligcare_get_insurance_logos();
                            if (!empty($insurance_logos)) {
                                foreach ($insurance_logos as $logo_url) {
                                    if (empty($logo_url)) continue;
                                    ?>
                                    <div class="col-xs-12 ry-each">
                                        <img src="<?php echo esc_url($logo_url); ?>" loading="lazy" alt="Insurance" class="img-responsive">
                                    </div>
                                    <?php
                                }
                            } else {
                                // Fallback to default logos
                                $default_logos = array(
                                    'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/cigna.png',
                                    'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/aetna_logo.png',
                                    'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/bcbs_logo.png',
                                    'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/united.png',
                                );
                                foreach ($default_logos as $logo_url) {
                                    ?>
                                    <div class="col-xs-12 ry-each">
                                        <img src="<?php echo esc_url($logo_url); ?>" loading="lazy" alt="Insurance" class="img-responsive">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix "></div>
                    <?php
                    // Display custom sections if set, otherwise show default Private Pay section
                    if (!empty($sections) && is_array($sections)) {
                        foreach ($sections as $section) {
                            if (empty($section['title']) && empty($section['content'])) continue;
                            ?>
                            <div class="ry-text" data-aos-duration="1500" data-aos="fade-up">
                                <section>
                                    <?php if (!empty($section['title'])) : ?>
                                    <h3 style="text-align: center;"><?php echo esc_html($section['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($section['content'])) : ?>
                                    <div style="text-align: center;"><?php echo wp_kses_post($section['content']); ?></div>
                                    <?php endif; ?>
                                </section>
                            </div>
                            <?php
                        }
                    } else {
                        // Default Private Pay section
                        ?>
                        <div class="ry-text" data-aos-duration="1500" data-aos="fade-up">
                            <section>
                                <h3 style="text-align: center;">Private Pay</h3>
                                <p style="text-align: center;">We understand that not all services are covered by insurance. That&rsquo;s why we proudly offer <strong>flexible private pay options</strong> to make your care accessible and affordable.</p>
                            </section>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
