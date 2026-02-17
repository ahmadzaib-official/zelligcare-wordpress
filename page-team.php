<?php
/**
 * Template Name: Meet Our Team
 *
 * Custom page template for the Meet Our Team page
 */

get_header();

get_template_part('template-parts/page-banner');
?>

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
                                        $photo_url = get_template_directory_uri() . '/images/team/kaye_headshot.png';
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
