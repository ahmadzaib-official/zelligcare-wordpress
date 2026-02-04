<?php
/**
 * Template Name: Search Results
 *
 * Custom page template for the Search Results page.
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
                <h1>search result</h1>
            </div>
        </div>
    </div>
</div>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 result-box">
                        <div>
                            <div class="clearfix"></div>
                            <nav>
                                <ul class="pagination"></ul>
                            </nav>
                        </div>
                        <?php
                        // Get search query
                        $search_query = get_search_query();
                        
                        if (!empty($search_query)) {
                            // Perform WordPress search
                            $search_args = array(
                                's' => $search_query,
                                'post_type' => array('post', 'page'),
                                'posts_per_page' => 10,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            );
                            
                            $search_results = new WP_Query($search_args);
                            
                            if ($search_results->have_posts()) :
                                while ($search_results->have_posts()) : $search_results->the_post();
                                    ?>
                                    <div class="col-xs-12 search-result">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="ry-btn ry-btn-primary">Read More</a>
                                    </div>
                                    <?php
                                endwhile;
                                
                                // Pagination
                                echo '<nav><ul class="pagination">';
                                echo paginate_links(array(
                                    'total' => $search_results->max_num_pages,
                                    'current' => max(1, get_query_var('paged')),
                                    'prev_text' => __('&laquo; Previous'),
                                    'next_text' => __('Next &raquo;'),
                                ));
                                echo '</ul></nav>';
                                
                                wp_reset_postdata();
                            else :
                                ?>
                                <div class="col-xs-12 no-result">
                                    <div class="matches-title">
                                        <p><strong>Sorry, we couldn't find what you are looking for.</strong></p>
                                        <p>Need assistance? Give us a call at <a href="tel:0123456789">(012) 345-6789</a></p>
                                    </div>
                                </div>
                                <?php
                            endif;
                        } else {
                            ?>
                            <div class="col-xs-12 no-result">
                                <div class="matches-title">
                                    <p><strong>Please enter a search term.</strong></p>
                                    <p>Use the search box in the sidebar to search our site.</p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 ry-right">
                    <div id="ry-sidebar" class="col-xs-12 ">
                        <div class="col-xs-12 ry-sb-main">
                            <div class="input-group search-bar-widget " id="searchfield" data-url="<?php echo esc_url(home_url('/search-result/')); ?>" data-variables="search">
                                <input type="text" class="form-control" placeholder="Enter search keyword" value="<?php echo esc_attr($search_query); ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary search-btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-12 ry-sb-cta">
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb1.jpg" loading="lazy" alt="Services" class="img-responsive">
                                        <div>
                                            <p>Services</p>
                                            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="ry-btn ry-btn-primary">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb2.jpg" loading="lazy" alt="Contact Us" class="img-responsive">
                                        <div>
                                            <p>Keep In Touch</p>
                                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="ry-btn ry-btn-primary">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
