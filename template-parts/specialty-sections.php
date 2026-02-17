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
    foreach ($sections as $index => $section) :
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
