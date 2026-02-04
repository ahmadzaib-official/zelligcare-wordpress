<?php
/**
 * Template Name: Privacy Policy
 *
 * Custom page template for the Privacy Policy page.
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
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <?php
                    // Output WordPress content if available, otherwise show default
                    $has_content = false;
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            $wp_content = get_the_content();
                            if (!empty(trim(strip_tags($wp_content)))) {
                                echo apply_filters('the_content', $wp_content);
                                $has_content = true;
                            }
                        endwhile;
                    endif;

                    // Show default content if no WordPress content
                    if (!$has_content) {
                        ?>
                        <p>This Privacy Policy governs the manner in which our website collects, uses, maintains and discloses information collected from users (each, a "User") of this website ("Site").</p>
                        
                        <h4>Personal identification information</h4>
                        <p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>
                        
                        <h4>Non-personal identification information</h4>
                        <p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>
                        
                        <h4>Web browser cookies</h4>
                        <p>Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>
                        
                        <h4>How we use collected information</h4>
                        <p>We may collect and use Users personal information for the following purposes:</p>
                        <ul>
                            <li><p><i>To run and operate our Site</i><br>We may need your information display content on the Site correctly.<br><br></p></li>
                            <li><p><i>To run different marketing campaigns including retargeting display ads</i><br><br></p></li>
                            <li><p><i>To improve customer service</i><br>Information you provide helps us respond to your customer service requests and support needs more efficiently.<br><br></p></li>
                            <li><p><i>To personalize user experience</i><br>We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.<br><br></p></li>
                            <li><p><i>To improve our Site</i><br>We may use feedback you provide to improve our products and services.<br><br></p></li>
                            <li><p><i>To run a promotion, contest, survey or other Site feature</i><br>To send Users information they agreed to receive about topics we think will be of interest to them.</p></li>
                            <li><p><i>To send periodic emails</i><br>We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.</p></li>
                        </ul>
                        
                        <h4>How we protect your information</h4>
                        <p>We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.<br><br></p>
                        
                        <h4>Sharing your personal information</h4>
                        <p>We may share or sell information with third parties for marketing or other purposes. We may use third-party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission.<br><br></p>
                        
                        <h4>Electronic newsletters</h4>
                        <p>If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. We may use third-party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission.<br><br></p>
                        
                        <h4>Third-party websites</h4>
                        <p>Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website's own terms and policies.<br><br></p>
                        
                        <h4>Changes to this privacy policy</h4>
                        <p>We have the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our Site. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.<br><br></p>
                        
                        <h4>Your acceptance of these terms</h4>
                        <p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.<br><br></p>
                        
                        <h4>Contacting us</h4>
                        <p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us.<br><br>This document was last updated on May 11, 2015</p>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 ry-right">
                    <div id="ry-sidebar" class="col-xs-12 ">
                        <div class="col-xs-12 ry-sb-main">
                            <div class="input-group search-bar-widget " id="searchfield" data-url="<?php echo esc_url(home_url('/search-result/')); ?>" data-variables="search">
                                <input type="text" class="form-control" placeholder="Enter search keyword" value>
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
