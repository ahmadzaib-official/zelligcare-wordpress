<?php
/**
 * Template Name: Library
 *
 * Custom page template for the Zellig Library page (blog/resource center).
 */

get_header(); ?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php
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
                                    $thumbnail_url = 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg';
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

                            // Pagination
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
                            // No posts found - show default content from original HTML
                            $default_posts = array(
                                array(
                                    'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/_Psychiatry_in_Fifteen_Minutes_Isn_t_Psychiatry_.png',
                                    'title' => 'Psychiatry in Fifteen Minutes Isn\'t Psychiatry',
                                    'excerpt' => 'The nurse cuffs the arm. "Any side effects?" A nod, a shrug, the clock. Thirteen minutes later the portal pings: refill sent. If this feels like psychiatry, it\'s only because we\'ve lowered the bar.',
                                    'date' => 'Zellig - October 3, 2025',
                                    'link' => '#',
                                ),
                                array(
                                    'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/Why_Anxiety_Feels_Worse_at_Night.png',
                                    'title' => 'Why Anxiety Feels Worse at Night',
                                    'excerpt' => 'Many people with anxiety notice a striking pattern: the very time that should bring peace and restoration often brings the opposite.',
                                    'date' => 'Zellig - October 3, 2025',
                                    'link' => '#',
                                ),
                                array(
                                    'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/The_Hidden_Struggle_of_Using_Insurance_for_Mental_Health_Care.png',
                                    'title' => 'The Hidden Struggle of Using Insurance for Mental Health Care',
                                    'excerpt' => 'If you\'ve tried to use insurance for psychiatry, you already know what "coverage" can look like in real life: a directory full of ghosts, numbers that ring to nowhere, clinics that quietly left a panel years ago, and staff who kindly explain they\'re full through next season. You start with the number on your card and finish hours later with a page of crossed-out names and nothing booked,',
                                    'date' => 'Zellig - October 3, 2025',
                                    'link' => '#',
                                ),
                                array(
                                    'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/What_to_Expect_at_Your_First_Psychiatry_Appointment.png',
                                    'title' => 'What to Expect at Your First Psychiatry Appointment',
                                    'excerpt' => 'Your first psychiatry appointment isn\'t a test, and it isn\'t a prescription mill. It\'s a structured conversation that translates your story into a practical plan.',
                                    'date' => 'Zellig - October 3, 2025',
                                    'link' => '#',
                                ),
                            );
                            
                            foreach ($default_posts as $index => $post) :
                                ?>
                                <div class="col-xs-12 col-lg-6 each" data-aos-duration="1500" data-aos="fade-up" data-aos-delay="<?php echo ($index * 200); ?>">
                                    <div class="col-xs-12 col-lg-12 each-container">
                                        <div class="col-xs-12 ry-photo">
                                            <img src="<?php echo esc_url($post['image']); ?>" loading="lazy" alt="<?php echo esc_attr($post['title']); ?>" class="img-responsive">
                                        </div>
                                        <div class="col-xs-12 text">
                                            <div class="title">
                                                <h4><?php echo esc_html($post['title']); ?></h4>
                                                <p><?php echo esc_html($post['excerpt']); ?></p>
                                            </div>
                                            <div class="post-art">
                                                <div class="date"><?php echo esc_html($post['date']); ?></div>
                                            </div>
                                            <div class="button-wrapper">
                                                <a href="<?php echo esc_url($post['link']); ?>" class="ry-btn ry-btn-primary">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
