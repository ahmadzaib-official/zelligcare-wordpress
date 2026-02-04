<?php
/**
 * Template Name: Meet Our Team
 *
 * Custom page template for the Meet Our Team page
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
    <div class="col-xs-12 inner-team-page">
        <div class="col-xs-12 module-team custom">
            <div class="col-xs-12 ry-container">
                <div class="col-xs-12 ry-content">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 ry-flex">
                            <?php
                            // Get team members from Custom Post Type
                            $team_members = zelligcare_get_team_members(false); // Get all team members
                            
                            if (empty($team_members)) {
                                // Fallback message if no team members
                                echo '<div class="col-xs-12"><p>No team members found. Please add team members from the WordPress admin (Team menu).</p></div>';
                            } else {
                                foreach ($team_members as $index => $member) {
                                    $aos_animation = ($index % 2 == 0) ? 'fade-right' : 'fade-left';
                                    $position = get_post_meta($member->ID, 'team_position', true);
                                    $photo_url = get_the_post_thumbnail_url($member->ID, 'full');
                                    if (empty($photo_url)) {
                                        $photo_url = 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/kaye_headshot.png';
                                    }
                                    $member_url = get_permalink($member->ID);
                                    if (empty($member_url)) {
                                        $member_url = home_url('/' . $member->post_name . '/');
                                    }
                                    ?>
                                    <div class="col-xs-12 col-lg-6 each" data-aos-duration="1500" data-aos="<?php echo esc_attr($aos_animation); ?>">
                                        <div class="col-xs-12 wrapper">
                                            <div class="col-xs-12 photo">
                                                <img src="<?php echo esc_url($photo_url); ?>" loading="lazy" alt="<?php echo esc_attr($member->post_title); ?>" class="img-responsive">
                                            </div>
                                            <div class="title">
                                                <p><?php echo esc_html($member->post_title); ?><?php if ($position) : ?><br><span class="span-1"><?php echo esc_html($position); ?></span><?php endif; ?></p>
                                                <?php if (!empty($member->post_content) || !empty($member->post_excerpt)) : ?>
                                                <p><?php echo esc_html(wp_trim_words($member->post_excerpt ? $member->post_excerpt : $member->post_content, 20)); ?></p>
                                                <?php endif; ?>
                                                <a href="<?php echo esc_url($member_url); ?>" class="ry-btn ry-btn-primary">Read Full Bio</a>
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

<?php get_footer(); ?>
