<?php
/**
 * Template for displaying single specialty
 * Uses repeatable sections with alternating image/content layout
 */

get_header();

// Get custom fields
$hero_image = get_post_meta(get_the_ID(), 'specialty_hero_image', true);
if (!$hero_image) {
    $hero_image = 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg';
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
            <img src="<?php echo esc_url($hero_image); ?>" loading="lazy" alt class="img-responsive">
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
                foreach ($sections as $index => $section) :
                    // Alternate animation direction: even = fade-left (image left), odd = fade-right (image right)
                    $aos_direction = ($index % 2 === 0) ? 'fade-left' : 'fade-right';
                    $title = isset($section['title']) ? $section['title'] : '';
                    $description = isset($section['description']) ? $section['description'] : '';
                    $image = isset($section['image']) ? $section['image'] : '';
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="<?php echo esc_attr($aos_direction); ?>">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image); ?>" loading="lazy" alt="<?php echo esc_attr($title); ?>" class="img-responsive">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <?php if ($title) : ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                    <?php echo wp_kses_post($description); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            else :
                // Fallback: show message if no sections defined
            ?>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-12 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <p>Content coming soon. Please edit this specialty to add sections.</p>
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
