<?php
/**
 * HTML Content Importer
 * Extracts content from original HTML files and populates WordPress pages
 */

// Extract specialty page sections from HTML
function zelligcare_extract_specialty_sections_from_html($html_file) {
    $possible_paths = array(
        get_template_directory() . '/../zelligcare.com/' . $html_file,
        get_template_directory() . '/../../zelligcare.com/' . $html_file,
        ABSPATH . '../zelligcare.com/' . $html_file,
        dirname(get_template_directory()) . '/zelligcare.com/' . $html_file,
    );
    
    $html_path = '';
    foreach ($possible_paths as $path) {
        if (file_exists($path)) {
            $html_path = $path;
            break;
        }
    }
    
    if (empty($html_path) || !file_exists($html_path)) {
        return array();
    }
    
    $html_content = file_get_contents($html_path);
    
    // Find the module-offer section - try multiple patterns
    $start_pos = false;
    $patterns = array(
        'module-offer inner-condition-template',
        'group-block',
        'ry-pg-content'
    );
    
    foreach ($patterns as $pattern) {
        $pos = strpos($html_content, $pattern);
        if ($pos !== false) {
            $start_pos = $pos;
            break;
        }
    }
    
    if ($start_pos === false) {
        return array();
    }
    
    // Extract all blocks - look for each block pattern
    $sections = array();
    $search_pos = $start_pos;
    
    // Find all block divs with pattern: <div class="col-xs-12 block"
    $block_count = 0;
    while (($block_start = strpos($html_content, '<div class="col-xs-12 block"', $search_pos)) !== false && $block_count < 10) {
        $block_count++;
        
        // Find the matching closing divs for this block
        $depth = 1;
        $pos = $block_start + strlen('<div class="col-xs-12 block"');
        $block_end = false;
        $max_search = min($pos + 50000, strlen($html_content)); // Limit search to prevent infinite loops
        
        // Find the closing tag by counting divs
        while ($pos < $max_search && $depth > 0) {
            $next_open = strpos($html_content, '<div', $pos);
            $next_close = strpos($html_content, '</div>', $pos);
            
            if ($next_close === false) break;
            
            if ($next_open !== false && $next_open < $next_close) {
                $depth++;
                $pos = $next_open + 4;
            } else {
                $depth--;
                if ($depth === 0) {
                    $block_end = $next_close + 6;
                    break;
                }
                $pos = $next_close + 6;
            }
        }
        
        if ($block_end) {
            $block_html = substr($html_content, $block_start, $block_end - $block_start);
            
            // Extract image from each-photo div - try multiple patterns
            $image = '';
            $image_patterns = array(
                '/<div class="col-xs-12 col-lg-6 each each-photo">.*?<img[^>]+src=["\']([^"\']+)["\'][^>]*>/is',
                '/<img[^>]+src=["\']([^"\']+anxiety[^"\']+)["\'][^>]*>/is',
                '/<img[^>]+src=["\']([^"\']+Condition[^"\']+)["\'][^>]*>/is',
                '/<img[^>]+src=["\']([^"\']+\.jpg[^"\']*)["\'][^>]*>/is',
                '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/is'
            );
            
            foreach ($image_patterns as $pattern) {
                if (preg_match($pattern, $block_html, $img_match)) {
                    $image = $img_match[1];
                    break;
                }
            }
            
            // Extract text content from each-text div
            $text_content = '';
            $title = '';
            
            // Try to find ry-text div
            if (preg_match('/<div class="ry-text">(.*?)<\/div>/is', $block_html, $text_match)) {
                $text_html = $text_match[1];
                
                // Extract all h3 titles (there might be multiple)
                $titles = array();
                if (preg_match_all('/<h3>(.*?)<\/h3>/is', $text_html, $title_matches)) {
                    $titles = $title_matches[1];
                }
                
                // Use first h3 as main title
                if (!empty($titles)) {
                    $title = trim(strip_tags($titles[0]));
                    // Remove all h3 tags from content
                    $text_html = preg_replace('/<h3>.*?<\/h3>/is', '', $text_html);
                }
                
                // Clean up the content
                $text_content = $text_html;
                // Remove script and style tags
                $text_content = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi', '', $text_content);
                $text_content = preg_replace('/<style\b[^<]*(?:(?!<\/style>)<[^<]*)*<\/style>/mi', '', $text_content);
                // Fix HTML entities
                $text_content = html_entity_decode($text_content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                // Clean up whitespace but preserve structure
                $text_content = preg_replace('/\s+/', ' ', $text_content);
                $text_content = str_replace('> ', '>', $text_content);
                $text_content = str_replace(' <', '<', $text_content);
                $text_content = trim($text_content);
            }
            
            // Only add section if we have meaningful content
            if (!empty($title) || (!empty($text_content) && strlen(strip_tags($text_content)) > 20)) {
                $sections[] = array(
                    'title' => $title,
                    'content' => $text_content,
                    'image' => $image,
                    'image_url' => $image // Also store as image_url for compatibility
                );
            }
            
            $search_pos = $block_end;
        } else {
            // If we can't find the end, try to find the next block start
            $next_block = strpos($html_content, '<div class="col-xs-12 block"', $block_start + 100);
            if ($next_block !== false) {
                $search_pos = $next_block;
            } else {
                break;
            }
        }
    }
    
    return $sections;
}

// Extract careers page content from HTML
function zelligcare_extract_careers_content_from_html($html_file = 'practice-with-purpose.html') {
    $possible_paths = array(
        get_template_directory() . '/../zelligcare.com/' . $html_file,
        get_template_directory() . '/../../zelligcare.com/' . $html_file,
        ABSPATH . '../zelligcare.com/' . $html_file,
        dirname(get_template_directory()) . '/zelligcare.com/' . $html_file,
    );
    
    $html_path = '';
    foreach ($possible_paths as $path) {
        if (file_exists($path)) {
            $html_path = $path;
            break;
        }
    }
    
    if (empty($html_path) || !file_exists($html_path)) {
        return array();
    }
    
    $html_content = file_get_contents($html_path);
    $data = array();
    
    // Extract "Why Zellig?" section - look for each-1 div
    if (preg_match('/<div class="col-xs-12 col-lg-3 each each-1"[^>]*>.*?<h3>(.*?)<\/h3>.*?<p>(.*?)<\/p>/is', $html_content, $why_match)) {
        $data['why_zellig_title'] = trim(strip_tags($why_match[1]));
        $content = $why_match[2];
        // Clean up HTML entities
        $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $data['why_zellig_content'] = trim(strip_tags($content));
    }
    
    // Extract benefits - look for each-2 divs with icons
    $benefits = array();
    // Find all benefit blocks (each-2 divs that contain icons)
    $benefit_pattern = '/<div class="col-xs-12 col-lg-3 each each-2"[^>]*>.*?<div class="col-xs-12 icon">.*?<img[^>]+src=["\']([^"\']+)["\'][^>]*>.*?<h4>(.*?)<\/h4>.*?<p>(.*?)<\/p>/is';
    preg_match_all($benefit_pattern, $html_content, $benefit_matches, PREG_SET_ORDER);
    
    foreach ($benefit_matches as $match) {
        $icon = $match[1];
        $title = trim(strip_tags($match[2]));
        $content = $match[3];
        // Clean up HTML entities
        $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $content = trim(strip_tags($content));
        
        if (!empty($title) || !empty($content)) {
            $benefits[] = array(
                'icon' => $icon,
                'title' => $title,
                'content' => $content
            );
        }
    }
    
    $data['benefits'] = $benefits;
    
    // Extract "Join Us" section
    if (preg_match('/<h2>join us<\/h2>.*?<p>(.*?)<\/p>.*?<h5>(.*?)<\/h5>.*?<ul>(.*?)<\/ul>/is', $html_content, $join_match)) {
        $data['join_us_title'] = 'join us';
        $content = $join_match[1];
        $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $data['join_us_content'] = trim(strip_tags($content));
        
        // Extract list items
        $instructions = '<h5>' . trim(strip_tags($join_match[2])) . '</h5><ul>';
        if (preg_match_all('/<li>.*?<p>(.*?)<\/p>.*?<\/li>/is', $join_match[3], $li_matches)) {
            foreach ($li_matches[1] as $li) {
                $li_clean = html_entity_decode($li, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $instructions .= '<li><p>' . trim(strip_tags($li_clean)) . '</p></li>';
            }
        }
        $instructions .= '</ul>';
        $data['join_us_instructions'] = $instructions;
    }
    
    return $data;
}

// Import all specialty pages content
function zelligcare_import_specialty_pages_from_html() {
    $specialties = array(
        'anxiety' => 'anxiety.html',
        'adhd' => 'adhd.html',
        'bipolar' => 'bipolar.html',
        'depression' => 'depression.html',
        'insomnia' => 'insomnia.html',
        'life-transitions' => 'life-transitions.html',
        'ocd' => 'ocd.html',
        'trauma-ptsd' => 'trauma-ptsd.html',
        'autism-neurodivergence' => 'autism-neurodivergence.html',
    );
    
    $imported = 0;
    $errors = array();
    
    foreach ($specialties as $slug => $html_file) {
        $page = get_page_by_path($slug);
        if (!$page) {
            $errors[] = "Page not found: {$slug}";
            continue;
        }
        
        $sections = zelligcare_extract_specialty_sections_from_html($html_file);
        if (!empty($sections) && is_array($sections)) {
            // Sanitize sections before saving
            $sanitized_sections = array();
            foreach ($sections as $section) {
                $sanitized_sections[] = array(
                    'title' => isset($section['title']) ? sanitize_text_field($section['title']) : '',
                    'content' => isset($section['content']) ? wp_kses_post($section['content']) : '',
                    'image' => isset($section['image']) ? esc_url_raw($section['image']) : '',
                    'image_url' => isset($section['image_url']) ? esc_url_raw($section['image_url']) : (isset($section['image']) ? esc_url_raw($section['image']) : ''),
                    'image_id' => '', // Will be empty, can be set manually later
                    'image_position' => 'left' // Default position
                );
            }
            
            if (!empty($sanitized_sections)) {
                $result = update_post_meta($page->ID, 'zelligcare_page_sections', $sanitized_sections);
                if ($result !== false) {
                    $imported++;
                } else {
                    $errors[] = "Failed to save sections for: {$slug}";
                }
            } else {
                $errors[] = "No valid sections extracted for: {$slug}";
            }
        } else {
            $errors[] = "No sections found in HTML file: {$html_file}";
        }
    }
    
    // Store errors in transient for display
    if (!empty($errors)) {
        set_transient('zelligcare_import_errors', $errors, 60);
    }
    
    return $imported;
}

// Import careers page content
function zelligcare_import_careers_page_from_html() {
    $page = get_page_by_path('careers');
    if (!$page) {
        $page = get_page_by_path('practice-with-purpose');
    }
    
    if (!$page) {
        return false;
    }
    
    $data = zelligcare_extract_careers_content_from_html();
    
    if (!empty($data)) {
        if (isset($data['why_zellig_title'])) {
            update_post_meta($page->ID, 'zelligcare_why_zellig_title', sanitize_text_field($data['why_zellig_title']));
        }
        if (isset($data['why_zellig_content'])) {
            update_post_meta($page->ID, 'zelligcare_why_zellig_content', wp_kses_post($data['why_zellig_content']));
        }
        if (isset($data['benefits']) && !empty($data['benefits'])) {
            // Sanitize benefits array
            $sanitized_benefits = array();
            foreach ($data['benefits'] as $benefit) {
                $sanitized_benefits[] = array(
                    'icon' => esc_url_raw($benefit['icon']),
                    'title' => sanitize_text_field($benefit['title']),
                    'content' => wp_kses_post($benefit['content'])
                );
            }
            update_post_meta($page->ID, 'zelligcare_careers_benefits', $sanitized_benefits);
        }
        if (isset($data['join_us_title'])) {
            update_post_meta($page->ID, 'zelligcare_join_us_title', sanitize_text_field($data['join_us_title']));
        }
        if (isset($data['join_us_content'])) {
            update_post_meta($page->ID, 'zelligcare_join_us_content', wp_kses_post($data['join_us_content']));
        }
        if (isset($data['join_us_instructions'])) {
            update_post_meta($page->ID, 'zelligcare_join_us_instructions', wp_kses_post($data['join_us_instructions']));
        }
        return true;
    }
    
    return false;
}

// Add admin action to import content
function zelligcare_add_import_content_action() {
    if (isset($_GET['zelligcare_import_content']) && current_user_can('manage_options')) {
        check_admin_referer('zelligcare_import_content');
        
        $specialty_count = zelligcare_import_specialty_pages_from_html();
        $careers_imported = zelligcare_import_careers_page_from_html();
        
        $message = sprintf(
            'Content imported successfully! %d specialty pages and %s careers page updated.',
            $specialty_count,
            $careers_imported ? '1' : '0'
        );
        
        add_action('admin_notices', function() use ($message) {
            echo '<div class="notice notice-success is-dismissible"><p>' . esc_html($message) . '</p></div>';
        });
    }
}

add_action('admin_init', 'zelligcare_add_import_content_action');

// Add admin menu item for importing
function zelligcare_add_import_menu() {
    add_submenu_page(
        'tools.php',
        'Import HTML Content',
        'Import HTML Content',
        'manage_options',
        'zelligcare-import-html',
        'zelligcare_import_html_page'
    );
}
add_action('admin_menu', 'zelligcare_add_import_menu');

function zelligcare_import_html_page() {
    if (isset($_POST['import_content']) && check_admin_referer('zelligcare_import_content_action')) {
        $specialty_count = zelligcare_import_specialty_pages_from_html();
        $careers_imported = zelligcare_import_careers_page_from_html();
        
        $errors = get_transient('zelligcare_import_errors');
        
        if ($specialty_count > 0 || $careers_imported) {
            echo '<div class="notice notice-success"><p>';
            printf(
                'Content imported successfully! %d specialty pages and %s careers page updated.',
                $specialty_count,
                $careers_imported ? '1' : '0'
            );
            echo '</p></div>';
        } else {
            echo '<div class="notice notice-warning"><p>';
            echo '<strong>No content was imported.</strong> This could mean:';
            echo '<ul style="list-style: disc; margin-left: 20px;">';
            echo '<li>HTML files are not in the expected location</li>';
            echo '<li>HTML structure is different than expected</li>';
            echo '<li>Pages do not exist in WordPress</li>';
            echo '</ul>';
            echo '</p></div>';
        }
        
        if ($errors && is_array($errors)) {
            echo '<div class="notice notice-error"><p><strong>Import Errors:</strong></p><ul>';
            foreach ($errors as $error) {
                echo '<li>' . esc_html($error) . '</li>';
            }
            echo '</ul></div>';
            delete_transient('zelligcare_import_errors');
        }
    }
    
    // Check if content needs importing
    $needs_import = false;
    $specialties = array('anxiety', 'adhd', 'bipolar', 'depression', 'insomnia', 'life-transitions', 'ocd', 'trauma-ptsd', 'autism-neurodivergence');
    foreach ($specialties as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            $sections = get_post_meta($page->ID, 'zelligcare_page_sections', true);
            if (empty($sections)) {
                $needs_import = true;
                break;
            }
        }
    }
    ?>
    <div class="wrap">
        <h1>Import Content from HTML Files</h1>
        <?php if ($needs_import) : ?>
        <div class="notice notice-info">
            <p><strong>📝 Content Import Available:</strong> Your pages appear to be empty. Click the button below to import all content from the original HTML files.</p>
        </div>
        <?php endif; ?>
        <p>This will extract content from the original HTML files and populate the WordPress pages with editable content.</p>
        <form method="post">
            <?php wp_nonce_field('zelligcare_import_content_action'); ?>
            <p>
                <input type="submit" name="import_content" class="button button-primary button-large" value="Import All Content from HTML Files">
            </p>
        </form>
        <p class="description">
            <strong>What this does:</strong><br>
            - Extracts content sections from specialty page HTML files<br>
            - Populates the "Page Content Sections" meta boxes<br>
            - Extracts careers page benefits and sections<br>
            - Makes all content editable from WordPress admin<br><br>
            <strong>Note:</strong> This will only import content if the HTML files are located in the <code>zelligcare.com/</code> folder relative to your theme directory.
        </p>
        
        <?php
        // Show file check status
        $specialties = array(
            'anxiety' => 'anxiety.html',
            'adhd' => 'adhd.html',
            'bipolar' => 'bipolar.html',
            'depression' => 'depression.html',
            'insomnia' => 'insomnia.html',
            'life-transitions' => 'life-transitions.html',
            'ocd' => 'ocd.html',
            'trauma-ptsd' => 'trauma-ptsd.html',
            'autism-neurodivergence' => 'autism-neurodivergence.html',
        );
        
        $possible_paths = array(
            get_template_directory() . '/../zelligcare.com/',
            get_template_directory() . '/../../zelligcare.com/',
            ABSPATH . '../zelligcare.com/',
            dirname(get_template_directory()) . '/zelligcare.com/',
        );
        
        echo '<h2>File Check Status</h2>';
        echo '<table class="widefat" style="margin-top: 20px;">';
        echo '<thead><tr><th>HTML File</th><th>Status</th><th>Path</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($specialties as $slug => $html_file) {
            $found = false;
            $found_path = '';
            
            foreach ($possible_paths as $base_path) {
                $full_path = $base_path . $html_file;
                if (file_exists($full_path)) {
                    $found = true;
                    $found_path = $full_path;
                    break;
                }
            }
            
            echo '<tr>';
            echo '<td><strong>' . esc_html($html_file) . '</strong></td>';
            if ($found) {
                echo '<td><span style="color: green;">✓ Found</span></td>';
                echo '<td><code>' . esc_html($found_path) . '</code></td>';
            } else {
                echo '<td><span style="color: red;">✗ Not Found</span></td>';
                echo '<td><em>Checked: ' . implode(', ', array_map('esc_html', $possible_paths)) . '</em></td>';
            }
            echo '</tr>';
        }
        
        echo '</tbody></table>';
        
        // Test extraction for one file
        if (isset($_GET['test_extraction']) && current_user_can('manage_options')) {
            $test_file = isset($_GET['file']) ? sanitize_text_field($_GET['file']) : 'anxiety.html';
            $sections = zelligcare_extract_specialty_sections_from_html($test_file);
            
            echo '<div class="notice notice-info" style="margin-top: 20px;">';
            echo '<h3>Test Extraction Results for: ' . esc_html($test_file) . '</h3>';
            echo '<p>Found ' . count($sections) . ' sections:</p>';
            echo '<pre style="background: #f5f5f5; padding: 15px; overflow: auto; max-height: 400px;">';
            print_r($sections);
            echo '</pre>';
            echo '</div>';
        }
        
        // Add test button
        echo '<p style="margin-top: 20px;">';
        echo '<a href="' . esc_url(add_query_arg(array('test_extraction' => '1', 'file' => 'anxiety.html'))) . '" class="button">Test Extraction (anxiety.html)</a>';
        echo '</p>';
        ?>
    </div>
    <?php
}

// Add admin notice if pages are empty
function zelligcare_check_empty_pages_notice() {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Check if any specialty pages are empty
    $specialties = array('anxiety', 'adhd', 'bipolar', 'depression', 'insomnia', 'life-transitions', 'ocd', 'trauma-ptsd', 'autism-neurodivergence');
    $empty_pages = 0;
    foreach ($specialties as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            $sections = get_post_meta($page->ID, 'zelligcare_page_sections', true);
            if (empty($sections)) {
                $empty_pages++;
            }
        }
    }
    
    if ($empty_pages > 0) {
        $import_url = admin_url('tools.php?page=zelligcare-import-html');
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p><strong>📥 Import Content Available:</strong> ';
        printf(
            '%d specialty page(s) appear to be empty. <a href="%s">Click here to import content from HTML files</a>.',
            $empty_pages,
            esc_url($import_url)
        );
        echo '</p></div>';
    }
}
add_action('admin_notices', 'zelligcare_check_empty_pages_notice');
