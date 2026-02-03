<?php
/**
 * Template Name: Services
 *
 * Custom page template for the Services page.
 * Dynamically queries specialty CPT instead of hardcoded array.
 * Section heading editable via meta box.
 */

get_header();

get_template_part('template-parts/page-banner');

$services_subtitle = get_post_meta(get_the_ID(), 'services_subtitle', true);
if (empty($services_subtitle)) {
    $services_subtitle = 'EXPERTISE THAT MATTERS';
}
$services_heading = get_post_meta(get_the_ID(), 'services_heading', true);
if (empty($services_heading)) {
    $services_heading = 'OUR SPECIALTIES';
}
$bg_image = get_post_meta(get_the_ID(), 'services_bg_image', true);
if (empty($bg_image)) {
    $bg_image = 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_bg.png';
}
?>

<div id="ry-pg-content">
    <div id="section-services" class="col-xs-12">
        <div class="col-xs-12 sections">
            <div class="col-xs-12 module-services custom" data-style="Featured Photo">
                <div class="col-xs-12 section-background">
                    <img src="<?php echo esc_url($bg_image); ?>" loading="lazy" alt="" class="img-responsive">
                </div>
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 ry-content">
                        <div class="col-xs-12 content">
                            <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline">
                                <h2 style="text-align: center; color: white">
                                    <span class="span-1"><?php echo esc_html($services_subtitle); ?></span> <?php echo esc_html($services_heading); ?>
                                </h2>
                            </div>
                            <div class="col-xs-12 ry-flex" data-aos-duration="1500" data-aos="fade-up" style="justify-content: center">
                            <?php
                            $specialty_query = new WP_Query(array(
                                'post_type'      => 'specialty',
                                'posts_per_page'  => -1,
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                            ));

                            if ($specialty_query->have_posts()) :
                                while ($specialty_query->have_posts()) : $specialty_query->the_post();
                                    $card_image = get_post_meta(get_the_ID(), 'specialty_icon', true);
                                    if (empty($card_image)) {
                                        $card_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                    }
                                    if (empty($card_image)) {
                                        $card_image = get_theme_mod('zelligcare_default_banner', 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg');
                                    }
                                    ?>
                                    <div class="col-xs-12 col-lg-3 each">
                                        <div class="col-xs-12 wrapper">
                                            <div class="col-xs-12 photo">
                                                <img src="<?php echo esc_url($card_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
                                            </div>
                                            <div class="service-title">
                                                <div style="text-align: center">
                                                    <?php echo esc_html(strtoupper(get_the_title())); ?>
                                                </div>
                                            </div>
                                            <div class="link">
                                                <a href="<?php the_permalink(); ?>" target="_self"><?php echo esc_html(strtoupper(get_the_title())); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                ?>
                                <div class="col-xs-12" style="text-align: center; padding: 40px 0; color: white;">
                                    <p>Specialties coming soon.</p>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
