<?php
/**
 * Template Name: Services
 *
 * Custom page template for the Services page
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="section-services" class="col-xs-12">
        <div class="col-xs-12 sections">
            <div class="col-xs-12 module-services custom" data-style="Featured Photo">
                <div class="col-xs-12 section-background">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/homepage/os_bg.png" loading="lazy" alt="" class="img-responsive">
                </div>
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 ry-content">
                        <div class="col-xs-12 content">
                            <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline">
                                <h2 style="text-align: center; color: white">
                                    <span class="span-1">EXPERTISE THAT MATTERS</span> OUR SPECIALTIES
                                </h2>
                            </div>
                            <div class="col-xs-12 ry-flex" data-aos-duration="1500" data-aos="fade-up" style="justify-content: center">
                            <?php
                            // Get specialties from Custom Post Type
                            $specialties = zelligcare_get_specialties();
                            
                            if (empty($specialties)) {
                                // Fallback message if no specialties
                                echo '<div class="col-xs-12"><p>No specialties found. Please add specialties from the WordPress admin (Specialties menu).</p></div>';
                            } else {
                                foreach ($specialties as $specialty) {
                                    $icon_url = get_post_meta($specialty->ID, 'specialty_icon_url', true);
                                    if (empty($icon_url)) {
                                        $icon_url = get_the_post_thumbnail_url($specialty->ID, 'full');
                                    }
                                    if (empty($icon_url)) {
                                        $icon_url = get_template_directory_uri() . '/images/services/Anxiety.jpg';
                                    }
                                    $specialty_url = get_permalink($specialty->ID);
                                    if (empty($specialty_url)) {
                                        $specialty_url = home_url('/' . $specialty->post_name . '/');
                                    }
                                    ?>
                                    <div class="col-xs-12 col-lg-3 each">
                                        <div class="col-xs-12 wrapper">
                                            <div class="col-xs-12 photo">
                                                <img src="<?php echo esc_url($icon_url); ?>" loading="lazy" alt="<?php echo esc_attr($specialty->post_title); ?>" class="img-responsive">
                                            </div>
                                            <div class="service-title">
                                                <div style="text-align: center">
                                                    <?php echo esc_html(strtoupper(html_entity_decode($specialty->post_title, ENT_QUOTES, 'UTF-8'))); ?>
                                                </div>
                                            </div>
                                            <div class="link">
                                                <a href="<?php echo esc_url($specialty_url); ?>" target="_self"><?php echo esc_html(strtoupper(html_entity_decode($specialty->post_title, ENT_QUOTES, 'UTF-8'))); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
