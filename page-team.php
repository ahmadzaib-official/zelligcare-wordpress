<?php
/**
 * Template Name: Meet Our Team
 *
 * Custom page template for the Meet Our Team page.
 * Dynamically queries team_member CPT instead of hardcoded array.
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
                            $team_query = new WP_Query(array(
                                'post_type'      => 'team_member',
                                'posts_per_page'  => -1,
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                            ));

                            if ($team_query->have_posts()) :
                                $index = 0;
                                while ($team_query->have_posts()) : $team_query->the_post();
                                    $aos_animation = ($index % 2 == 0) ? 'fade-right' : 'fade-left';
                                    $position = get_post_meta(get_the_ID(), 'team_position', true);
                                    $member_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                    if (empty($member_image)) {
                                        $member_image = get_theme_mod('zelligcare_default_banner', 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg');
                                    }
                                    ?>
                                    <div class="col-xs-12 col-lg-6 each" data-aos-duration="1500" data-aos="<?php echo esc_attr($aos_animation); ?>">
                                        <div class="col-xs-12 wrapper">
                                            <div class="col-xs-12 photo">
                                                <img src="<?php echo esc_url($member_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
                                            </div>
                                            <div class="title">
                                                <p><?php the_title(); ?><?php if ($position) : ?><br><span class="span-1"><?php echo esc_html($position); ?></span><?php endif; ?></p>
                                                <a href="<?php the_permalink(); ?>" class="ry-btn ry-btn-primary">Read Full Bio</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $index++;
                                endwhile;
                                wp_reset_postdata();
                            else :
                                ?>
                                <div class="col-xs-12" style="text-align: center; padding: 40px 0;">
                                    <p>Team members coming soon.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
