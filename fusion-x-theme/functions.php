<?php
/**
 * Fusion X Theme Functions and Definitions
 *
 * @package Fusion_X
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require_once get_template_directory() . '/seo_map.php';

if ( ! function_exists( 'fusion_x_setup' ) ) :
    function fusion_x_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'custom-logo', array(
            'height'      => 60,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Navigation Menu', 'fusion-x' ),
            'footer'  => esc_html__( 'Footer Quick Links Menu', 'fusion-x' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'fusion_x_setup' );

/**
 * ============================================================================
 * 1. DYNAMIC SEO ENGINE: TITLES, DESCRIPTIONS, CANONICALS & SOCIAL META
 * ============================================================================
 */
function fusion_x_get_current_seo_meta() {
    $map = fusion_x_get_seo_map();
    $title = '';
    $desc = '';
    $canonical = '';

    if ( is_front_page() || is_home() && is_front_page() ) {
        $data = isset( $map['index'] ) ? $map['index'] : null;
        $title = $data ? $data['title'] : 'Best Digital Marketing Company in Chennai | Fusion X';
        $desc = $data ? $data['desc'] : "Fusion X is India's leading digital marketing company in Chennai. We engineer AI-visible websites, EEAT SEO, and high-ROAS paid media to scale brands.";
        $canonical = home_url( '/' );
    } elseif ( is_page() ) {
        global $post;
        $slug = $post ? $post->post_name : '';
        if ( isset( $map[ $slug ] ) ) {
            $title = $map[ $slug ]['title'];
            $desc  = $map[ $slug ]['desc'];
        } else {
            $title = get_the_title() . ' | Fusion X Chennai';
            $desc  = 'Scale your digital presence, search visibility, and paid media ROAS with Fusion X Digital Marketing Agency.';
        }
        $canonical = get_permalink();
    } elseif ( is_singular( 'post' ) ) {
        global $post;
        $title = get_the_title() . ' | Fusion X Insights';
        $desc  = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 25, '...' );
        $canonical = get_permalink();
    } elseif ( is_category() || is_archive() ) {
        $title = single_term_title( '', false ) . ' | Fusion X Digital Marketing';
        $desc  = 'Explore industry insights, case studies, and digital marketing strategies from Fusion X.';
        $canonical = get_term_link( get_queried_object() );
    } else {
        $title = 'Fusion X | Digital Marketing & AI Search Agency';
        $desc  = "Fusion X is India's premier digital performance agency engineering high-ROAS funnels and AI search rankings.";
        $canonical = home_url( '/' );
    }

    return array(
        'title'     => $title,
        'desc'      => $desc,
        'canonical' => $canonical,
    );
}

// Filter document title for complete SERP control
function fusion_x_custom_document_title( $title ) {
    $seo = fusion_x_get_current_seo_meta();
    return ! empty( $seo['title'] ) ? $seo['title'] : $title;
}
add_filter( 'pre_get_document_title', 'fusion_x_custom_document_title', 999 );


/**
 * ============================================================================
 * 2. ENQUEUE STYLES & JAVASCRIPT ASSETS
 * ============================================================================
 */
function fusion_x_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    $uri = get_template_directory_uri();

    // Google Fonts
    wp_enqueue_style( 'fusion-x-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@400;500;600&display=swap', array(), null );

    // Font Awesome 6
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

    // Theme Main Stylesheet
    wp_enqueue_style( 'fusion-x-style', get_stylesheet_uri(), array(), $theme_version );

    // Three.js and libraries
    wp_enqueue_script( 'three-js', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js', array(), 'r128', true );
    wp_enqueue_script( 'three-orbit-controls', 'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js', array( 'three-js' ), '0.128.0', true );
    wp_enqueue_script( 'three-gltf-loader', 'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js', array( 'three-js' ), '0.128.0', true );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
    wp_enqueue_script( 'gsap-scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array( 'gsap' ), '3.12.2', true );

    // Custom Interactive Core Scripts
    wp_enqueue_script( 'fusion-x-logo-b64', $uri . '/logo_b64.js', array(), $theme_version, true );
    wp_enqueue_script( 'fusion-x-brands-b64', $uri . '/brands_b64.js', array(), $theme_version, true );
    wp_enqueue_script( 'fusion-x-orange-dots', $uri . '/orange-dots.js', array(), '3.0', true );
    wp_enqueue_script( 'fusion-x-easter-egg', $uri . '/easter-egg.js', array(), '18.0', true );
    wp_enqueue_script( 'fusion-x-scroll-flying', $uri . '/scroll-flying-words.js', array( 'gsap' ), '7.0', true );
    wp_enqueue_script( 'fusion-x-brands', $uri . '/brands.js', array(), '103.0', true );
    wp_enqueue_script( 'fusion-x-spider', $uri . '/spider.js', array(), '2.0', true );
    wp_enqueue_script( 'fusion-x-seo-cards', $uri . '/seo-cards.js', array(), $theme_version, true );
    wp_enqueue_script( 'fusion-x-impact-anim', $uri . '/impact-animation.js', array( 'gsap' ), '2.0', true );
    wp_enqueue_script( 'fusion-x-3d-logo', $uri . '/fusion-3d-logo.js', array( 'three-js', 'three-gltf-loader' ), $theme_version, true );
    wp_enqueue_script( 'fusion-x-shatter', $uri . '/shatter-animation.js', array( 'gsap' ), $theme_version, true );
    wp_enqueue_script( 'fusion-x-main', $uri . '/main.js', array( 'three-js' ), $theme_version, true );

    // Pass data and AJAX URL to frontend JS
    wp_localize_script( 'fusion-x-orange-dots', 'fusionXData', array(
        'themeUri' => $uri,
        'homeUrl'  => home_url( '/' ),
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'fusion_x_form_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'fusion_x_scripts' );


/**
 * ============================================================================
 * 3. BULLETPROOF ROUTING & TEMPLATE FALLBACK (ELIMINATES 404s)
 * ============================================================================
 */
function fusion_x_template_fallback( $template ) {
    if ( is_404() || is_page() ) {
        $uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
        $slug = basename( $uri );
        $slug = preg_replace( '/\.html$/i', '', $slug );

        if ( ! empty( $slug ) ) {
            $candidate = get_template_directory() . "/page-{$slug}.php";
            if ( file_exists( $candidate ) ) {
                global $wp_query;
                $wp_query->is_404 = false;
                $wp_query->is_page = true;
                status_header( 200 );
                return $candidate;
            }
        }
    }
    return $template;
}
add_filter( 'template_include', 'fusion_x_template_fallback', 99 );


/**
 * ============================================================================
 * 4. AUTOMATIC WORDPRESS PAGE PROVISIONER & PERMALINK SETUP
 * ============================================================================
 */
function fusion_x_provision_pages() {
    // Only run if not already provisioned
    if ( get_option( 'fusion_x_pages_provisioned_v2' ) ) {
        return;
    }

    // Set permalink structure to Post Name safely
    if ( isset( $GLOBALS['wp_rewrite'] ) && is_object( $GLOBALS['wp_rewrite'] ) ) {
        $GLOBALS['wp_rewrite']->set_permalink_structure( '/%postname%/' );
        $GLOBALS['wp_rewrite']->flush_rules( false );
    }

    $map = fusion_x_get_seo_map();
    foreach ( $map as $slug => $data ) {
        if ( $slug === 'index' ) {
            continue;
        }

        // Check if page already exists
        $existing = get_page_by_path( $slug );
        if ( ! $existing ) {
            $clean_title = preg_replace( '/\s*\|.*$/', '', $data['title'] );
            $page_id = wp_insert_post( array(
                'post_title'     => wp_strip_all_tags( $clean_title ),
                'post_name'      => $slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ) );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', "page-{$slug}.php" );
            }
        }
    }

    // Set static front page if not already configured
    $home_page = get_page_by_path( 'home' );
    if ( ! $home_page ) {
        $home_id = wp_insert_post( array(
            'post_title'     => 'Home',
            'post_name'      => 'home',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'comment_status' => 'closed',
        ) );
        if ( $home_id && ! is_wp_error( $home_id ) ) {
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $home_id );
        }
    }

    // Provision Starter Blog Posts if blog is empty
    $existing_posts = get_posts( array( 'numberposts' => 1 ) );
    if ( empty( $existing_posts ) ) {
        $starter_posts = array(
            array(
                'title'   => 'How We Ranked Nilaro Coffee #1 in Google AI Overviews & Gemini',
                'content' => '<p>In this technical breakdown, the Fusion X search team reveals the semantic content structuring and entity-graph authority building that placed Nilaro Specialty Coffee at the top of Google AI Overviews and Gemini search results across South India.</p><h2>The Shift to Generative Engine Optimization (GEO)</h2><p>Traditional SEO focused on ten blue links. GEO focuses on direct LLM recommendation synthesis. By structuring semantic FAQs, high-relevance schema markup, and authoritative citation nodes, we generated thousands of organic brand impressions directly in AI answer boxes.</p>',
                'excerpt' => 'A deep-dive case study into how Fusion X engineered generative search visibility for Nilaro Coffee, capturing #1 AI Overviews.',
                'cat'     => 'AI Search (AEO / GEO)',
            ),
            array(
                'title'   => 'Bhawani Corner: Scaling 900+ Customer Calls in 30 Days via AI Maps Search',
                'content' => '<p>Local discovery is evolving fast. For Bhawani Corner, Fusion X built a multi-channel local SEO and AI search matrix that drove 900+ verified customer calls in a single record month.</p><h2>The AI-Assisted Local Funnel</h2><p>By connecting Google Business Profile signals with LLM citations across ChatGPT search and Gemini recommendations, customer footfall and inquiries scaled by 400% within 90 days.</p>',
                'excerpt' => 'Learn how Bhawani Corner dominated Chennai local tableware search, generating 900+ phone calls in a single month.',
                'cat'     => 'Local SEO & Case Studies',
            ),
            array(
                'title'   => 'The 4.8x Meta Ads Playbook: Scaling D2C Streetwear with CAPI and Creative Hooks',
                'content' => '<p>For luxury heavyweight streetwear brand Off Human, standard ad setups were stalling. Fusion X deployed custom Server-Side Meta Conversions API (CAPI) and high-retention vertical video creatives to hit a sustained 4.8x Return on Ad Spend (ROAS).</p>',
                'excerpt' => 'Tactical paid social scaling strategy: How we drove a sustained 4.8x ROAS for luxury streetwear brand Off Human.',
                'cat'     => 'Meta & Paid Media',
            ),
        );

        foreach ( $starter_posts as $sp ) {
            $cat_id = 0;
            if ( ! function_exists( 'wp_create_category' ) ) {
                $term = term_exists( $sp['cat'], 'category' );
                if ( ! $term ) {
                    $term = wp_insert_term( $sp['cat'], 'category' );
                }
                $cat_id = ( is_array( $term ) && isset( $term['term_id'] ) ) ? (int) $term['term_id'] : (int) $term;
            } else {
                $cat_id = wp_create_category( $sp['cat'] );
            }
            wp_insert_post( array(
                'post_title'    => $sp['title'],
                'post_content'  => $sp['content'],
                'post_excerpt'  => $sp['excerpt'],
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => $cat_id ? array( $cat_id ) : array(),
            ) );
        }
    }

    update_option( 'fusion_x_pages_provisioned_v2', 1 );
}
add_action( 'after_switch_theme', 'fusion_x_provision_pages' );
add_action( 'admin_init', 'fusion_x_provision_pages' );


/**
 * ============================================================================
 * 5. DATABASE TABLE & LEAD MANAGEMENT ENGINE ("Fusion X Leads")
 * ============================================================================
 */
function fusion_x_install_leads_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fusion_x_leads';
    
    // Check if table already exists
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name ) {
        return;
    }

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        form_type varchar(100) NOT NULL DEFAULT 'Contact Page Form',
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(100) NOT NULL,
        service varchar(255) DEFAULT '',
        message text DEFAULT '',
        resume_url text DEFAULT '',
        source_page varchar(255) DEFAULT '',
        status varchar(50) DEFAULT 'unread',
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    if ( defined( 'ABSPATH' ) && file_exists( ABSPATH . 'wp-admin/includes/upgrade.php' ) ) {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    }
    if ( function_exists( 'dbDelta' ) ) {
        dbDelta( $sql );
    } else {
        $wpdb->query( $sql );
    }
}
add_action( 'after_switch_theme', 'fusion_x_install_leads_table' );
add_action( 'admin_init', 'fusion_x_install_leads_table' );

/**
 * Handle Frontend Form AJAX Submissions
 */
function fusion_x_ajax_submit_form() {
    check_ajax_referer( 'fusion_x_form_nonce', 'nonce' );

    global $wpdb;
    $table_name = $wpdb->prefix . 'fusion_x_leads';

    $form_type   = isset( $_POST['form_type'] ) ? sanitize_text_field( $_POST['form_type'] ) : 'Contact Page Form';
    $name        = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
    $email       = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $phone       = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
    $service     = isset( $_POST['service'] ) ? sanitize_text_field( $_POST['service'] ) : '';
    $message     = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
    $resume_url  = isset( $_POST['resume_url'] ) ? esc_url_raw( $_POST['resume_url'] ) : '';
    $source_page = isset( $_POST['source_page'] ) ? esc_url_raw( $_POST['source_page'] ) : wp_get_referer();

    if ( empty( $name ) || empty( $email ) || empty( $phone ) ) {
        wp_send_json_error( array( 'message' => 'Please fill in all required fields (Name, Email, Phone).' ) );
    }

    $inserted = $wpdb->insert(
        $table_name,
        array(
            'form_type'   => $form_type,
            'name'        => $name,
            'email'       => $email,
            'phone'       => $phone,
            'service'     => $service,
            'message'     => $message,
            'resume_url'  => $resume_url,
            'source_page' => $source_page,
            'status'      => 'unread',
            'created_at'  => current_time( 'mysql' ),
        ),
        array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
    );

    if ( false === $inserted ) {
        wp_send_json_error( array( 'message' => 'Failed to record submission in database.' ) );
    }

    // Send email notification to agency inboxes
    $to = array( get_option( 'admin_email' ), 'fusionxteams@gmail.com' );
    $subject = "[Fusion X Lead: {$form_type}] New submission from {$name}";
    $body = "New Lead Received via {$form_type}\n\n";
    $body .= "Name: {$name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Phone: {$phone}\n";
    $body .= "Service / Role: {$service}\n";
    if ( ! empty( $resume_url ) ) {
        $body .= "Resume: {$resume_url}\n";
    }
    $body .= "Message: {$message}\n";
    $body .= "Submitted Page: {$source_page}\n";
    $body .= "Timestamp: " . current_time( 'mysql' ) . "\n\n";
    $body .= "View all leads in your WordPress Dashboard under 'Fusion X Leads'.";

    $headers = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" );
    wp_mail( $to, $subject, $body, $headers );

    wp_send_json_success( array(
        'message' => 'Inquiry transmitted successfully. Our senior growth strategist will contact you within 2 business hours.',
    ) );
}
add_action( 'wp_ajax_fusion_x_submit_form', 'fusion_x_ajax_submit_form' );
add_action( 'wp_ajax_nopriv_fusion_x_submit_form', 'fusion_x_ajax_submit_form' );


/**
 * ============================================================================
 * 6. WORDPRESS ADMIN LEAD DASHBOARD: "Fusion X Leads"
 * ============================================================================
 */
function fusion_x_admin_menu() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fusion_x_leads';
    
    // Check unread count
    $unread_count = 0;
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name ) {
        $unread_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE status = 'unread'" );
    }

    $badge = $unread_count > 0 ? " <span class='update-plugins count-{$unread_count}' style='background:#ff5722; color:#fff;'><span class='plugin-count'>{$unread_count}</span></span>" : '';

    add_menu_page(
        'Fusion X Leads',
        'Fusion X Leads' . $badge,
        'manage_options',
        'fusion-x-leads',
        'fusion_x_render_leads_page',
        'dashicons-feedback',
        3
    );
}
add_action( 'admin_menu', 'fusion_x_admin_menu' );

function fusion_x_render_leads_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'fusion_x_leads';

    // Handle CSV Export
    if ( isset( $_GET['action'] ) && $_GET['action'] === 'export_csv' ) {
        if ( ob_get_level() ) {
            ob_end_clean();
        }
        header( 'Content-Type: text/csv; charset=utf-8' );
        header( 'Content-Disposition: attachment; filename=fusion-x-leads-' . date( 'Y-m-d' ) . '.csv' );
        $output = fopen( 'php://output', 'w' );
        fputcsv( $output, array( 'ID', 'Form Type', 'Name', 'Email', 'Phone', 'Service / Role', 'Message', 'Resume URL', 'Source Page', 'Date' ) );
        $rows = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY id DESC", ARRAY_A );
        foreach ( $rows as $r ) {
            fputcsv( $output, array( $r['id'], $r['form_type'], $r['name'], $r['email'], $r['phone'], $r['service'], $r['message'], $r['resume_url'], $r['source_page'], $r['created_at'] ) );
        }
        fclose( $output );
        exit;
    }

    // Handle Delete
    if ( isset( $_GET['delete_id'] ) && check_admin_referer( 'fx_delete_lead_' . $_GET['delete_id'] ) ) {
        $del_id = absint( $_GET['delete_id'] );
        $wpdb->delete( $table_name, array( 'id' => $del_id ), array( '%d' ) );
        echo '<div class="notice notice-success is-dismissible"><p>Lead deleted successfully.</p></div>';
    }

    // Mark as read when viewing
    $wpdb->query( "UPDATE $table_name SET status = 'read' WHERE status = 'unread'" );

    // Current category tab
    $active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'all';

    $where_sql = '1=1';
    if ( $active_tab === 'popup' ) {
        $where_sql = "form_type LIKE '%Popup%'";
    } elseif ( $active_tab === 'contact' ) {
        $where_sql = "form_type LIKE '%Contact%'";
    } elseif ( $active_tab === 'career' ) {
        $where_sql = "form_type LIKE '%Career%' OR form_type LIKE '%Internship%'";
    } elseif ( $active_tab === 'consultation' ) {
        $where_sql = "form_type LIKE '%Consultation%'";
    }

    $leads = $wpdb->get_results( "SELECT * FROM $table_name WHERE $where_sql ORDER BY id DESC" );

    $total_count  = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );
    $popup_count  = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE form_type LIKE '%Popup%'" );
    $contact_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE form_type LIKE '%Contact%'" );
    $career_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE form_type LIKE '%Career%' OR form_type LIKE '%Internship%'" );
    $consult_count = (int) $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE form_type LIKE '%Consultation%'" );
    ?>
    <div class="wrap" style="max-width: 1400px; margin-top: 25px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
            <div>
                <h1 style="font-size: 28px; font-weight: 800; color: #0f172a; margin-bottom: 6px;">
                    ⚡ Fusion X Leads &amp; Form Submissions
                </h1>
                <p style="color: #64748b; margin: 0; font-size: 14px;">
                    Centralized lead intake for Entrance Popup, Contact Page, Career Applications, and Marketing Consultations.
                </p>
            </div>
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=fusion-x-leads&action=export_csv' ) ); ?>" class="button button-primary" style="background:#ff5722; border-color:#e64a19; padding: 6px 16px; font-weight: 700;">
                <span class="dashicons dashicons-download" style="vertical-align: middle; margin-right: 4px;"></span> Export All to CSV
            </a>
        </div>

        <!-- Metric Stat Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 25px;">
            <div style="background:#fff; border-radius:12px; padding:18px 22px; border-left: 4px solid #ff5722; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                <span style="font-size:12px; font-weight:700; color:#64748b; text-transform:uppercase;">Total Inquiries</span>
                <div style="font-size:28px; font-weight:900; color:#0f172a;"><?php echo $total_count; ?></div>
            </div>
            <div style="background:#fff; border-radius:12px; padding:18px 22px; border-left: 4px solid #3b82f6; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                <span style="font-size:12px; font-weight:700; color:#64748b; text-transform:uppercase;">Entrance Popup Leads</span>
                <div style="font-size:28px; font-weight:900; color:#3b82f6;"><?php echo $popup_count; ?></div>
            </div>
            <div style="background:#fff; border-radius:12px; padding:18px 22px; border-left: 4px solid #10b981; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                <span style="font-size:12px; font-weight:700; color:#64748b; text-transform:uppercase;">Contact Page Inquiries</span>
                <div style="font-size:28px; font-weight:900; color:#10b981;"><?php echo $contact_count; ?></div>
            </div>
            <div style="background:#fff; border-radius:12px; padding:18px 22px; border-left: 4px solid #8b5cf6; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                <span style="font-size:12px; font-weight:700; color:#64748b; text-transform:uppercase;">Careers &amp; Internships</span>
                <div style="font-size:28px; font-weight:900; color:#8b5cf6;"><?php echo $career_count; ?></div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <h2 class="nav-tab-wrapper" style="margin-bottom: 20px;">
            <a href="?page=fusion-x-leads&tab=all" class="nav-tab <?php echo $active_tab === 'all' ? 'nav-tab-active' : ''; ?>">
                All Submissions (<?php echo $total_count; ?>)
            </a>
            <a href="?page=fusion-x-leads&tab=popup" class="nav-tab <?php echo $active_tab === 'popup' ? 'nav-tab-active' : ''; ?>">
                Entrance Popup Leads (<?php echo $popup_count; ?>)
            </a>
            <a href="?page=fusion-x-leads&tab=contact" class="nav-tab <?php echo $active_tab === 'contact' ? 'nav-tab-active' : ''; ?>">
                Contact Page (<?php echo $contact_count; ?>)
            </a>
            <a href="?page=fusion-x-leads&tab=career" class="nav-tab <?php echo $active_tab === 'career' ? 'nav-tab-active' : ''; ?>">
                Career Applications (<?php echo $career_count; ?>)
            </a>
            <a href="?page=fusion-x-leads&tab=consultation" class="nav-tab <?php echo $active_tab === 'consultation' ? 'nav-tab-active' : ''; ?>">
                Consultations (<?php echo $consult_count; ?>)
            </a>
        </h2>

        <!-- Leads Table -->
        <div style="background:#fff; border-radius:12px; box-shadow:0 4px 16px rgba(0,0,0,0.05); overflow:hidden;">
            <table class="wp-list-table widefat fixed striped table-view-list" style="border:none;">
                <thead>
                    <tr style="background:#0f172a; color:#fff;">
                        <th style="width: 60px; color:#94a3b8;">ID</th>
                        <th style="width: 170px; color:#fff;">Form Source</th>
                        <th style="width: 180px; color:#fff;">Lead Name</th>
                        <th style="width: 220px; color:#fff;">Contact Info</th>
                        <th style="width: 200px; color:#fff;">Service / Role</th>
                        <th style="color:#fff;">Message / Details</th>
                        <th style="width: 150px; color:#fff;">Date &amp; Time</th>
                        <th style="width: 90px; text-align:center; color:#fff;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( empty( $leads ) ) : ?>
                        <tr>
                            <td colspan="8" style="text-align:center; padding: 40px; color: #94a3b8;">
                                <div style="font-size: 36px; margin-bottom: 10px;">📭</div>
                                <div style="font-size: 16px; font-weight: 600;">No submissions found in this category yet.</div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ( $leads as $lead ) : ?>
                            <?php
                            $badge_color = '#64748b';
                            $badge_bg = '#f1f5f9';
                            if ( stripos( $lead->form_type, 'Popup' ) !== false ) {
                                $badge_color = '#1d4ed8';
                                $badge_bg = '#dbeafe';
                            } elseif ( stripos( $lead->form_type, 'Contact' ) !== false ) {
                                $badge_color = '#047857';
                                $badge_bg = '#d1fae5';
                            } elseif ( stripos( $lead->form_type, 'Career' ) !== false || stripos( $lead->form_type, 'Intern' ) !== false ) {
                                $badge_color = '#6d28d9';
                                $badge_bg = '#ede9fe';
                            } elseif ( stripos( $lead->form_type, 'Consultation' ) !== false ) {
                                $badge_color = '#c2410c';
                                $badge_bg = '#ffedd5';
                            }
                            $clean_phone = preg_replace( '/[^0-9]/', '', $lead->phone );
                            ?>
                            <tr>
                                <td style="font-weight:700; color:#94a3b8;">#<?php echo esc_html( $lead->id ); ?></td>
                                <td>
                                    <span style="display:inline-block; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; background: <?php echo $badge_bg; ?>; color: <?php echo $badge_color; ?>;">
                                        <?php echo esc_html( $lead->form_type ); ?>
                                    </span>
                                </td>
                                <td>
                                    <strong style="color: #0f172a; font-size: 14px;"><?php echo esc_html( $lead->name ); ?></strong>
                                </td>
                                <td>
                                    <div style="margin-bottom: 4px;">
                                        <a href="mailto:<?php echo esc_attr( $lead->email ); ?>" style="color: #ff5722; font-weight: 600; text-decoration: none;">
                                            <span class="dashicons dashicons-email" style="font-size: 16px; vertical-align: middle;"></span> <?php echo esc_html( $lead->email ); ?>
                                        </a>
                                    </div>
                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <a href="tel:<?php echo esc_attr( $lead->phone ); ?>" style="color: #334155; font-size: 13px; text-decoration: none;">
                                            <span class="dashicons dashicons-phone" style="font-size: 16px; vertical-align: middle;"></span> <?php echo esc_html( $lead->phone ); ?>
                                        </a>
                                        <?php if ( ! empty( $clean_phone ) ) : ?>
                                            <a href="https://wa.me/<?php echo esc_attr( $clean_phone ); ?>" target="_blank" style="color: #25d366; font-size: 12px; font-weight: 700; text-decoration: none;" title="Chat on WhatsApp">
                                                [WhatsApp]
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <span style="font-weight: 600; color: #1e293b;"><?php echo esc_html( $lead->service ); ?></span>
                                    <?php if ( ! empty( $lead->resume_url ) ) : ?>
                                        <div style="margin-top: 4px;">
                                            <a href="<?php echo esc_url( $lead->resume_url ); ?>" target="_blank" class="button button-small" style="color: #6d28d9;">
                                                <span class="dashicons dashicons-media-document" style="font-size: 14px; vertical-align: middle;"></span> View Resume
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td style="color: #475569; font-size: 13px; line-height: 1.5;">
                                    <?php echo esc_html( $lead->message ); ?>
                                </td>
                                <td style="color: #64748b; font-size: 12px;">
                                    <?php echo esc_html( date( 'M j, Y g:i A', strtotime( $lead->created_at ) ) ); ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php
                                    $del_url = wp_nonce_url(
                                        admin_url( 'admin.php?page=fusion-x-leads&tab=' . $active_tab . '&delete_id=' . $lead->id ),
                                        'fx_delete_lead_' . $lead->id
                                    );
                                    ?>
                                    <a href="<?php echo esc_url( $del_url ); ?>" onclick="return confirm('Are you sure you want to delete this lead?');" style="color: #ef4444; text-decoration: none;" title="Delete Lead">
                                        <span class="dashicons dashicons-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
