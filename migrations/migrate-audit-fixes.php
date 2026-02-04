<?php
/**
 * Audit Fixes Migration Script
 * Fixes issues found during page audit against zelligcare.com
 *
 * Run via: docker exec zelligcare-wordpress-wordpress-1 php /var/www/html/wp-content/themes/theme/migrations/migrate-audit-fixes.php
 */

require '/var/www/html/wp-load.php';

// ============================================
// 1. THEME CUSTOMIZER - Phone & Email
// ============================================
echo "=== THEME CUSTOMIZER ===\n";

set_theme_mod('zelligcare_phone', '(215) 318-1821');
echo "OK: Phone set to (215) 318-1821\n";

set_theme_mod('zelligcare_email', 'practice@zelligcare.com');
echo "OK: Email set to practice@zelligcare.com\n";

// ============================================
// 2. PRIVACY POLICY - Replace default WP content
// ============================================
echo "\n=== PRIVACY POLICY ===\n";

$privacy = get_page_by_path('privacy-policy');
if ($privacy) {
    wp_update_post(array(
        'ID' => $privacy->ID,
        'post_content' => '<p>This Privacy Policy governs the manner in which our website collects, uses, maintains and discloses information collected from users (each, a "User") of this website ("Site").</p>

<h3>Personal identification information</h3>
<p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>

<h3>Non-personal identification information</h3>
<p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>

<h3>Web browser cookies</h3>
<p>Our Site may use "cookies" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>

<h3>How we use collected information</h3>
<p>We may collect and use Users personal information for the following purposes:</p>
<ul>
<li><strong>To run and operate our Site</strong> &ndash; We may need your information to display content on the Site correctly.</li>
<li><strong>To run different marketing campaigns including retargeting display ads</strong></li>
<li><strong>To improve customer service</strong> &ndash; Information you provide helps us respond to your customer service requests and support needs more efficiently.</li>
<li><strong>To personalize user experience</strong> &ndash; We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.</li>
<li><strong>To improve our Site</strong> &ndash; We may use feedback you provide to improve our products and services.</li>
<li><strong>To run a promotion, contest, survey or other Site feature</strong> &ndash; To send Users information they agreed to receive about topics we think will be of interest to them.</li>
<li><strong>To send periodic emails</strong> &ndash; We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.</li>
</ul>

<h3>How we protect your information</h3>
<p>We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>

<h3>Sharing your personal information</h3>
<p>We may share or sell information with third parties for marketing or other purposes. We may use third-party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission.</p>

<h3>Electronic newsletters</h3>
<p>If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. We may use third-party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission.</p>

<h3>Third-party websites</h3>
<p>Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website\'s own terms and policies.</p>

<h3>Changes to this privacy policy</h3>
<p>We have the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our Site. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>

<h3>Your acceptance of these terms</h3>
<p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>

<h3>Contacting us</h3>
<p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us.</p>

<p><em>This document was last updated on May 11, 2015</em></p>',
    ));
    echo "OK: Privacy policy content updated (ID: {$privacy->ID})\n";
} else {
    echo "WARNING: Privacy policy page not found\n";
}

// ============================================
// 3. ACCESSIBILITY STATEMENT - Update content
// ============================================
echo "\n=== ACCESSIBILITY STATEMENT ===\n";

$access = get_page_by_path('accessibility-statement');
if ($access) {
    wp_update_post(array(
        'ID' => $access->ID,
        'post_content' => '<p>We are continuously working to improve the accessibility of content on our website. Below, you\'ll find a few recommendations to help make your browsing experience more accessible.</p>

<p>If you have trouble seeing web pages, the US Social Security Administration offers these tips for optimizing your computer and browser to improve your online experience:</p>

<ul>
<li>Use your computer to read web pages out loud</li>
<li>Use the keyboard to navigate screens</li>
<li>Increase text size</li>
<li>Magnify your screen</li>
<li>Change background and text colors</li>
<li>Make your mouse pointer more visible (Windows only)</li>
</ul>

<p>If you are looking for alternatives to your mouse and keyboard, speech recognition software such as Dragon Naturally Speaking may help you navigate web pages and online services. This software allows the user to move focus around a web page or application screen through voice controls.</p>

<p>If you are deaf or hard of hearing, there are several accessibility features available to you.</p>

<h3>Closed Captioning</h3>
<p>Closed captioning provides a transcript for the audio track of a video presentation that is synchronized with the video and audio tracks. Captions are generally visually displayed over the video, which benefits people who are deaf or hard of hearing as well as anyone who cannot hear the audio due to noisy environments. Most of our video content includes captions, which you can learn how to turn on and off by visiting YouTube.</p>

<h3>Volume Controls</h3>
<p>Your computer, tablet, or mobile device has built-in volume control features. Each video and audio service has its own additional volume controls. Try adjusting both your device\'s and your media player\'s volume controls to optimize your listening experience.</p>

<p>If the recommendations above do not meet your needs, we invite you to contact us at (215) 318-1821 for assistance.</p>',
    ));
    echo "OK: Accessibility statement content updated (ID: {$access->ID})\n";
} else {
    echo "WARNING: Accessibility statement page not found\n";
}

// ============================================
// 4. SPECIALTY ICONS - Set CDN URLs
// ============================================
echo "\n=== SPECIALTY ICONS ===\n";

$icon_map = array(
    'anxiety'                => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon1.png',
    'adhd'                   => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon2.png',
    'ocd'                    => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon3.png',
    'insomnia'               => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon4.png',
    'life-transitions'       => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon5.png',
    'bipolar'                => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon6.png',
    'trauma-ptsd'            => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon7.png',
    'depression'             => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon8.png',
    'autism-neurodivergence'  => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/os_icon8.png',
);

// Also set service page card images (different from homepage icons)
$card_image_map = array(
    'anxiety'                => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Anxiety.jpg',
    'adhd'                   => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/ADHD_.jpg',
    'bipolar'                => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Bipolar_Depression.jpg',
    'insomnia'               => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Insomnia.jpg',
    'life-transitions'       => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Life_Transitions.jpg',
    'ocd'                    => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/OCD.jpg',
    'autism-neurodivergence'  => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Autism_Neurodivergence.jpg',
    'depression'             => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Depression_001.png',
    'trauma-ptsd'            => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Services_Assets/Trauma_PTSD.jpg',
);

$specialties = get_posts(array(
    'post_type' => 'specialty',
    'posts_per_page' => -1,
    'post_status' => 'publish',
));

foreach ($specialties as $spec) {
    $slug = $spec->post_name;
    if (isset($icon_map[$slug])) {
        update_post_meta($spec->ID, 'specialty_icon', $icon_map[$slug]);
        echo "OK: Set icon for '{$spec->post_title}' (ID: {$spec->ID})\n";
    } else {
        echo "WARNING: No icon mapping for '{$spec->post_title}' (slug: {$slug})\n";
    }
    if (isset($card_image_map[$slug])) {
        update_post_meta($spec->ID, 'specialty_card_image', $card_image_map[$slug]);
        echo "OK: Set card image for '{$spec->post_title}'\n";
    }
}

// ============================================
// 5. BLOG POST THUMBNAILS - Store as meta
// ============================================
echo "\n=== BLOG POST IMAGES ===\n";

$blog_images = array(
    'psychiatry-15-minute-visits' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/_Psychiatry_in_Fifteen_Minutes_Isn_t_Psychiatry_.png',
    'why-anxiety-is-worse-at-night' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/Why_Anxiety_Feels_Worse_at_Night.png',
    'insurance-psychiatry-access' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/The_Hidden_Struggle_of_Using_Insurance_for_Mental_Health_Care.png',
    'what-to-expect-at-your-first-psychiatry-appointment' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Library_Assets/What_to_Expect_at_Your_First_Psychiatry_Appointment.png',
);

foreach ($blog_images as $slug => $image_url) {
    $post = get_page_by_path($slug, OBJECT, 'post');
    if ($post) {
        update_post_meta($post->ID, 'blog_thumbnail_url', $image_url);
        echo "OK: Set thumbnail for '{$post->post_title}' (ID: {$post->ID})\n";
    } else {
        echo "WARNING: Blog post '{$slug}' not found\n";
    }
}

// ============================================
// 6. FAQ PAGE - Create with content
// ============================================
echo "\n=== FAQ PAGE ===\n";

$faq_content = '<div class="faq-item">
<h4 class="faq-question">What is a psychiatry PA, and why should I choose one?</h4>
<div class="faq-answer">
<p>The physician assistant profession was created to meet the growing need for high-quality medical care. PAs are educated and trained using a similar medical approach to physicians, with rigorous academic and clinical programs that prepare them to provide excellent care. At Zellig, our psychiatric PAs have dedicated their careers to psychiatry, combining strong clinical training with a deep commitment to their patients.</p>
</div>
</div>

<div class="faq-item">
<h4 class="faq-question">Are your PAs practicing independently?</h4>
<div class="faq-answer">
<p>Our PAs deliver direct patient care and are highly trained to do so. They work in close collaboration with our Johns Hopkins-trained medical director, who provides expert guidance and helps ensure our care meets the highest standards.</p>
</div>
</div>

<div class="faq-item">
<h4 class="faq-question">Do you accept insurance?</h4>
<div class="faq-answer">
<p>Yes. We\'re in-network with many major insurance plans, including Aetna, Cigna, and UnitedHealthcare. Contact us to check your specific coverage.</p>
</div>
</div>

<div class="faq-item">
<h4 class="faq-question">Can I pay out of pocket?</h4>
<div class="faq-answer">
<p>Absolutely. We offer transparent, affordable private-pay options for those without insurance or who prefer not to use it.</p>
</div>
</div>

<div class="faq-item">
<h4 class="faq-question">Are your appointments in-person or virtual?</h4>
<div class="faq-answer">
<p>All our services are provided via telepsychiatry. We chose a telehealth model because it increases access to care and allows patients to connect with their provider in a safe, familiar setting.</p>
</div>
</div>

<div class="faq-item">
<h4 class="faq-question">How soon can I get an appointment?</h4>
<div class="faq-answer">
<p>We strive to offer timely appointments and often have availability within a few days.</p>
</div>
</div>';

$faq_page = get_page_by_path('frequently-asked-questions');
if ($faq_page) {
    wp_update_post(array(
        'ID' => $faq_page->ID,
        'post_content' => $faq_content,
        'post_status' => 'publish',
    ));
    update_post_meta($faq_page->ID, '_wp_page_template', 'page-faq.php');
    echo "UPDATED: FAQ page (ID: {$faq_page->ID})\n";
} else {
    $faq_id = wp_insert_post(array(
        'post_type' => 'page',
        'post_title' => 'Frequently Asked Questions',
        'post_name' => 'frequently-asked-questions',
        'post_content' => $faq_content,
        'post_status' => 'publish',
    ));
    if ($faq_id && !is_wp_error($faq_id)) {
        update_post_meta($faq_id, '_wp_page_template', 'page-faq.php');
        echo "CREATED: FAQ page (ID: {$faq_id})\n";
    } else {
        echo "ERROR: Failed to create FAQ page\n";
    }
}

// ============================================
// 7. FIX REVIEW PAGE SLUG
// ============================================
echo "\n=== REVIEW PAGE SLUG ===\n";

$review_page = get_page_by_path('reviews');
if ($review_page) {
    // Live site uses /review/ not /reviews/
    // Keep as-is since template matching works by template name, not slug
    echo "INFO: Review page slug is 'reviews' (ID: {$review_page->ID}). Template page-review.php assigned.\n";
}

echo "\n=== AUDIT FIXES COMPLETE ===\n";
