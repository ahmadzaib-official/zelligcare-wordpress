<?php
/**
 * Template for displaying single team member
 * Matches reference structure from zelligcare.com
 */

get_header();

$position = get_post_meta(get_the_ID(), 'team_position', true);
$credentials = get_post_meta(get_the_ID(), 'team_credentials', true);

// Fallback images based on team member slug
$team_images = array(
    'kaye' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/kaye_headshot.png',
    'sade-savage' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sade_headshot.png',
    'sade' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sade_headshot.png',
);
$slug = get_post_field('post_name', get_the_ID());
$default_image = isset($team_images[$slug]) ? $team_images[$slug] : $team_images['kaye'];
?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg');">
        <div class="col-xs-12">
            <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg" loading="lazy" alt class="img-responsive">
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
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 team-custom-v2">
            <div class="col-xs-12 ry-container">
                <div class="col-xs-12 col-md-12 col-lg-12 wrapper">
                    <div class="each-container">
                        <div class="col-xs-12 photo">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'img-responsive', 'loading' => 'lazy')); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url($default_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
                            <?php endif; ?>
                        </div>
                        <div class="details">
                            <div class="title">
                                <h3><?php the_title(); ?></h3>
                                <?php if ($position || $credentials) : ?>
                                <p>
                                    <?php echo esc_html($position); ?>
                                    <?php if ($position && $credentials) echo ' | '; ?>
                                    <?php echo esc_html($credentials); ?>
                                </p>
                                <?php endif; ?>
                            </div>
                            <div class="ry-text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Team Members -->
    <?php
    $team_query = new WP_Query(array(
        'post_type' => 'team_member',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));

    if ($team_query->have_posts()) :
    ?>
    <div class="col-xs-12 module-team custom">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-headline" style="text-align: center;">
                <h2>Meet Our Team</h2>
            </div>
            <div class="col-xs-12 ry-flex">
                <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
                <div class="each">
                    <a href="<?php the_permalink(); ?>" class="each-container">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="photo">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="title">
                            <h5><?php the_title(); ?></h5>
                            <?php $pos = get_post_meta(get_the_ID(), 'team_position', true); ?>
                            <?php if ($pos) : ?>
                            <p><?php echo esc_html($pos); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    endif;
    ?>
</div>

<?php get_footer(); ?>
