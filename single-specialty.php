<?php
/**
 * Template for displaying single specialty
 * Uses repeatable sections with alternating image/content layout
 */

get_header();

// Get specialty hero image with fallback chain
$hero_image = get_post_meta(get_the_ID(), 'specialty_hero_image', true);
if (empty($hero_image) && has_post_thumbnail()) {
    $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
if (empty($hero_image)) {
    $hero_image = get_theme_mod('zelligcare_default_banner', '');
}
if (empty($hero_image)) {
    $hero_image = get_template_directory_uri() . '/images/homepage/ib.jpg';
}

// Get sections
$sections = get_post_meta(get_the_ID(), 'specialty_sections', true);
if (!is_array($sections)) {
    $sections = array();
}
?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
        <div class="col-xs-12">
            <img src="<?php echo esc_url($hero_image); ?>" loading="lazy" alt="" class="img-responsive">
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
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <?php
            if (!empty($sections)) :
                // Render sections in pairs (0+1, 2+3, 4+5) to match reference site layout.
                // Each pair shares the image from the even-numbered section.
                $total = count($sections);
                for ($i = 0; $i < $total; $i += 2) :
                    $block_index = $i / 2;
                    $aos_direction = ($block_index % 2 === 0) ? 'fade-left' : 'fade-right';

                    // Even section (has image)
                    $section_a = $sections[$i];
                    $title_a = isset($section_a['title']) ? $section_a['title'] : '';
                    $desc_a = isset($section_a['description']) ? $section_a['description'] : '';
                    $image = isset($section_a['image']) ? $section_a['image'] : '';

                    // Odd section (paired content, may not exist)
                    $section_b = isset($sections[$i + 1]) ? $sections[$i + 1] : null;
                    $title_b = $section_b ? (isset($section_b['title']) ? $section_b['title'] : '') : '';
                    $desc_b = $section_b ? (isset($section_b['description']) ? $section_b['description'] : '') : '';
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="<?php echo esc_attr($aos_direction); ?>">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image); ?>" loading="lazy" alt="<?php echo esc_attr($title_a); ?>" class="img-responsive">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <?php if ($title_a) : ?>
                                    <h3><?php echo esc_html($title_a); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($desc_a) : ?>
                                    <?php echo wp_kses_post($desc_a); ?>
                                    <?php endif; ?>
                                    <?php if ($title_b) : ?>
                                    <h3><?php echo esc_html($title_b); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($desc_b) : ?>
                                    <?php echo wp_kses_post($desc_b); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endfor;
            else :
                // Fallback: show editor content if no sections defined
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-12 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
