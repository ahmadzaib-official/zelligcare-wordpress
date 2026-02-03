<?php
/**
 * Template Name: Library
 *
 * Custom page template for the Zellig Library page (blog/resource center).
 * Blog posts are dynamically queried. No hardcoded fallback content.
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section library-template" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div><br></div>
            <div class="col-xs-12 ry-content">
                <div class="col-xs-12 col-md-12 col-lg-12 library-wrapper">
                    <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 60px;">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="col-xs-12 ry-flex">
                        <?php
                        // Query for blog posts
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $blog_query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 10,
                            'paged' => $paged,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ));

                        if ($blog_query->have_posts()) :
                            $post_index = 0;
                            while ($blog_query->have_posts()) : $blog_query->the_post();
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                if (empty($thumbnail_url)) {
                                    $thumbnail_url = get_theme_mod('zelligcare_default_banner', 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg');
                                }
                                ?>
                                <div class="col-xs-12 col-lg-6 each" data-aos-duration="1500" data-aos="fade-up" data-aos-delay="<?php echo ($post_index * 200); ?>">
                                    <div class="col-xs-12 col-lg-12 each-container">
                                        <div class="col-xs-12 ry-photo">
                                            <img src="<?php echo esc_url($thumbnail_url); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
                                        </div>
                                        <div class="col-xs-12 text">
                                            <div class="title">
                                                <h4><?php the_title(); ?></h4>
                                                <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                                            </div>
                                            <div class="post-art">
                                                <div class="date"><?php echo esc_html(get_bloginfo('name')); ?> - <?php echo get_the_date('F j, Y'); ?></div>
                                            </div>
                                            <div class="button-wrapper">
                                                <a href="<?php the_permalink(); ?>" class="ry-btn ry-btn-primary">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $post_index++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                            <div class="col-xs-12">
                                <?php
                                echo paginate_links(array(
                                    'total' => $blog_query->max_num_pages,
                                    'prev_text' => '&laquo; Previous',
                                    'next_text' => 'Next &raquo;',
                                ));
                                ?>
                            </div>
                        <?php
                        else :
                            ?>
                            <div class="col-xs-12" style="text-align: center; padding: 40px 0;">
                                <p>No articles published yet. Check back soon.</p>
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
