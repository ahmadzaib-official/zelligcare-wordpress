<?php
/**
 * Template Part: Specialty Sections
 *
 * Renders specialty_sections from a matching specialty CPT post.
 * Looks up the specialty by matching the current page slug.
 * Falls back to the_content() if no matching specialty or sections found.
 *
 * Used by: page-anxiety.php, page-adhd.php, page-bipolar.php, etc.
 */

// Find the matching specialty CPT post by slug
$page_slug = get_post_field('post_name', get_the_ID());
$specialty_posts = get_posts(array(
    'post_type' => 'specialty',
    'name' => $page_slug,
    'posts_per_page' => 1,
    'post_status' => 'publish',
));

$sections = array();
if (!empty($specialty_posts)) {
    $specialty_id = $specialty_posts[0]->ID;
    $sections = get_post_meta($specialty_id, 'specialty_sections', true);
    if (!is_array($sections)) {
        $sections = array();
    }
}

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
    // Fallback: show page editor content
?>
<div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
    <div class="col-xs-12 ry-container">
        <div class="col-xs-12 content">
            <div class="col-xs-12 col-lg-12 each each-text">
                <div class="col-xs-12 wrapper">
                    <div class="ry-text">
                        <?php
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
