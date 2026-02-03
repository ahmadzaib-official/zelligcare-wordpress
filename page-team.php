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
                            // Define team members
                            $team_members = array(
                                array(
                                    'name' => 'Kaye Capin',
                                    'title' => 'Operations Manager',
                                    'slug' => 'kaye',
                                    'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/kaye_headshot.png',
                                ),
                                array(
                                    'name' => 'Sade Savage',
                                    'title' => 'Physician Assistant',
                                    'slug' => 'sade-savage',
                                    'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sade_headshot.png',
                                ),
                            );

                            foreach ($team_members as $index => $member) {
                                $aos_animation = ($index % 2 == 0) ? 'fade-right' : 'fade-left';
                                // Get the page URL
                                $page = get_page_by_path($member['slug']);
                                $page_url = $page ? get_permalink($page->ID) : home_url('/' . $member['slug'] . '/');
                                ?>
                                <div class="col-xs-12 col-lg-6 each" data-aos-duration="1500" data-aos="<?php echo esc_attr($aos_animation); ?>">
                                    <div class="col-xs-12 wrapper">
                                        <div class="col-xs-12 photo">
                                            <img src="<?php echo esc_url($member['image']); ?>" loading="lazy" alt="<?php echo esc_attr($member['name']); ?>" class="img-responsive">
                                        </div>
                                        <div class="title">
                                            <p><?php echo esc_html($member['name']); ?><br><span class="span-1"><?php echo esc_html($member['title']); ?></span></p>
                                            <a href="<?php echo esc_url($page_url); ?>" class="ry-btn ry-btn-primary">Read Full Bio</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
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
