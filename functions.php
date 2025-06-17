<?php
/**
 * Irene Orlandelli Psicologa Theme Functions
 */

// Theme setup
function irene_orlandelli_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('menus');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'irene-orlandelli'),
        'footer' => __('Footer Menu', 'irene-orlandelli'),
    ));
}
add_action('after_setup_theme', 'irene_orlandelli_setup');

// REMOVE ALL WORDPRESS DEFAULT STYLES THAT CONFLICT
function remove_all_wp_styles() {
    // Remove WordPress default styles
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-block-library-css');
    wp_dequeue_style('wp-block-library-theme-css');
    
    // Remove WordPress default scripts that might interfere
    wp_dequeue_script('wp-embed');
}
add_action('wp_enqueue_scripts', 'remove_all_wp_styles', 100);
add_action('wp_print_styles', 'remove_all_wp_styles', 100);

// Enqueue styles and scripts with MAXIMUM PRIORITY
function irene_orlandelli_scripts() {
    // Remove any conflicting styles first
    remove_all_wp_styles();
    
    // Enqueue Google Fonts with highest priority
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap', array(), null, 'all');
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0', 'all');
    
    // Enqueue main stylesheet with MAXIMUM PRIORITY
    wp_enqueue_style('irene-orlandelli-style', get_stylesheet_uri(), array('google-fonts', 'font-awesome'), '2.4.0', 'all');
    
    // Enqueue main JavaScript
    wp_enqueue_script('irene-orlandelli-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'irene_orlandelli_scripts', 1);

// Add CRITICAL inline styles in HEAD with MAXIMUM PRIORITY
function irene_orlandelli_critical_inline_styles() {
    ?>
    <style type="text/css">
        /* CRITICAL STYLES - LOAD IMMEDIATELY */
        * { box-sizing: border-box !important; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Poppins', sans-serif !important; 
            background-color: #f8f9fa !important; 
            color: #333 !important; 
            margin: 0 !important; 
            padding: 0 !important; 
            line-height: 1.6 !important;
            overflow-x: hidden !important;
        }
        
        h1, h2, h3, h4, h5, h6 { 
            font-family: 'Playfair Display', serif !important; 
            margin: 0 !important; 
            line-height: 1.2 !important; 
            font-weight: 600 !important; 
        }
        
        /* HEADER CRITICAL STYLES */
        header { 
            position: sticky !important; 
            top: 0 !important; 
            z-index: 1000 !important; 
            background-color: white !important; 
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important; 
            width: 100% !important; 
        }
        
        header .container { 
            max-width: 1200px !important; 
            margin: 0 auto !important; 
            padding: 0.75rem 1.5rem !important; 
            display: flex !important; 
            justify-content: space-between !important; 
            align-items: center !important; 
        }
        
        header .flex { 
            display: flex !important; 
            align-items: center !important; 
        }
        
        header .space-x-3 > * + * { margin-left: 0.75rem !important; }
        header .space-x-8 > * + * { margin-left: 2rem !important; }
        
        header img { height: 3rem !important; width: auto !important; }
        
        header .text-xl, header .text-2xl { 
            font-weight: 700 !important; 
            color: #4f6d7a !important; 
        }
        
        header .text-xl { font-size: 1.25rem !important; }
        header .text-2xl { font-size: 1.5rem !important; }
        
        /* MENU STYLES */
        header nav { display: none !important; }
        @media (min-width: 768px) { 
            header nav { display: flex !important; align-items: center !important; }
            header nav > * + * { margin-left: 2rem !important; }
        }
        
        header nav a { 
            color: #333 !important; 
            text-decoration: none !important; 
            font-weight: 500 !important; 
            transition: color 0.3s ease !important; 
        }
        
        header nav a:hover { color: #9b8c7d !important; }
        
        header .bg-green-500 { 
            background-color: #22c55e !important; 
            color: white !important; 
            padding: 0.5rem 1rem !important; 
            border-radius: 0.5rem !important; 
            text-decoration: none !important; 
            display: inline-flex !important; 
            align-items: center !important; 
            font-weight: 500 !important; 
        }
        
        header .bg-green-500:hover { 
            background-color: #16a34a !important; 
            color: white !important; 
        }
        
        /* MOBILE MENU */
        header #menu-btn { 
            display: block !important; 
            background: none !important; 
            border: none !important; 
            color: #4f6d7a !important; 
            font-size: 1.5rem !important; 
            cursor: pointer !important; 
            padding: 0.5rem !important; 
            min-height: 44px !important; 
            min-width: 44px !important; 
        }
        
        @media (min-width: 768px) { 
            header #menu-btn { display: none !important; } 
        }
        
        header #mobile-menu { 
            position: absolute !important; 
            top: 100% !important; 
            left: 0 !important; 
            right: 0 !important; 
            background-color: white !important; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important; 
            padding: 1rem !important; 
            z-index: 999 !important; 
        }
        
        header #mobile-menu.hidden { display: none !important; }
        
        /* SECTIONS */
        section { position: relative !important; z-index: 10 !important; }
        
        #hero { 
            position: relative !important; 
            height: 100vh !important; 
            padding-top: 4rem !important; 
            overflow: hidden !important; 
        }
        
        @media (min-width: 768px) { 
            #hero { padding-top: 0 !important; } 
        }
        
        #hero img { 
            position: absolute !important; 
            top: 0 !important; 
            left: 0 !important; 
            width: 100% !important; 
            height: 100% !important; 
            object-fit: cover !important; 
            z-index: 1 !important; 
        }
        
        #hero .hero-gradient { 
            position: absolute !important; 
            top: 0 !important; 
            left: 0 !important; 
            width: 100% !important; 
            height: 100% !important; 
            background: linear-gradient(rgba(79, 109, 122, 0.8), rgba(224, 230, 241, 0.7)) !important; 
            z-index: 2 !important; 
            display: flex !important; 
            align-items: center !important; 
        }
        
        #servizi { background-color: #e0e6f1 !important; padding: 5rem 0 !important; }
        #chisono { background-color: white !important; padding: 5rem 0 !important; }
        #articoli { background-color: #e0e6f1 !important; padding: 5rem 0 !important; }
        #contatti { background-color: white !important; padding: 5rem 0 !important; }
        
        footer { background-color: #4f6d7a !important; color: white !important; padding: 3rem 0 !important; }
        
        /* UTILITY CLASSES */
        .container { max-width: 1200px !important; margin: 0 auto !important; padding: 0 1.5rem !important; width: 100% !important; }
        .grid { display: grid !important; }
        .flex { display: flex !important; }
        .hidden { display: none !important; }
        .text-center { text-align: center !important; }
        .text-primary { color: #4f6d7a !important; }
        .text-accent { color: #9b8c7d !important; }
        .text-white { color: white !important; }
        .bg-primary { background-color: #4f6d7a !important; }
        .bg-secondary { background-color: #e0e6f1 !important; }
        .bg-accent { background-color: #9b8c7d !important; }
        .bg-white { background-color: white !important; }
        .font-bold { font-weight: 700 !important; }
        .text-4xl { font-size: 2.25rem !important; line-height: 2.5rem !important; }
        .text-xl { font-size: 1.25rem !important; line-height: 1.75rem !important; }
        .mb-4 { margin-bottom: 1rem !important; }
        .mb-16 { margin-bottom: 4rem !important; }
        .py-20 { padding-top: 5rem !important; padding-bottom: 5rem !important; }
        .px-6 { padding-left: 1.5rem !important; padding-right: 1.5rem !important; }
        .gap-8 { gap: 2rem !important; }
        .items-center { align-items: center !important; }
        .justify-center { justify-content: center !important; }
        .justify-between { justify-content: space-between !important; }
        .max-w-6xl { max-width: 72rem !important; }
        .max-w-3xl { max-width: 48rem !important; }
        .mx-auto { margin-left: auto !important; margin-right: auto !important; }
        .rounded-xl { border-radius: 0.75rem !important; }
        .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important; }
        
        /* RESPONSIVE */
        @media (min-width: 768px) {
            .md\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
            .md\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) !important; }
            .md\\:text-left { text-align: left !important; }
            .md\\:text-2xl { font-size: 1.5rem !important; line-height: 2rem !important; }
            .md\\:text-6xl { font-size: 3.75rem !important; line-height: 1 !important; }
            .md\\:justify-start { justify-content: flex-start !important; }
        }
        
        @media (min-width: 1024px) {
            .lg\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) !important; }
            .lg\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)) !important; }
        }
        
        /* OVERRIDE ANY WORDPRESS STYLES */
        .wp-block-library-css, .wp-block-library-theme-css, .wc-blocks-style, .classic-theme-styles, .global-styles { display: none !important; }
        
        /* FORCE PROPER BODY STYLES */
        body.bg-light { background-color: #f8f9fa !important; }
        body.text-dark { color: #333 !important; }
        
        html { overflow-x: hidden !important; }
        body { overflow-x: hidden !important; width: 100% !important; }
    </style>
    <?php
}
add_action('wp_head', 'irene_orlandelli_critical_inline_styles', 1);

// Force remove WordPress styles even more aggressively
function force_remove_wp_styles() {
    global $wp_styles;
    
    if (isset($wp_styles->registered['wp-block-library'])) {
        unset($wp_styles->registered['wp-block-library']);
    }
    if (isset($wp_styles->registered['wp-block-library-theme'])) {
        unset($wp_styles->registered['wp-block-library-theme']);
    }
    if (isset($wp_styles->registered['classic-theme-styles'])) {
        unset($wp_styles->registered['classic-theme-styles']);
    }
    if (isset($wp_styles->registered['global-styles'])) {
        unset($wp_styles->registered['global-styles']);
    }
}
add_action('wp_print_styles', 'force_remove_wp_styles', 1);

// Register widget areas
function irene_orlandelli_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'irene-orlandelli'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'irene-orlandelli'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'irene-orlandelli'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in the footer.', 'irene-orlandelli'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'irene_orlandelli_widgets_init');

// Custom post types
function irene_orlandelli_custom_post_types() {
    // Services post type
    register_post_type('services', array(
        'labels' => array(
            'name' => __('Servizi', 'irene-orlandelli'),
            'singular_name' => __('Servizio', 'irene-orlandelli'),
            'add_new' => __('Aggiungi Nuovo', 'irene-orlandelli'),
            'add_new_item' => __('Aggiungi Nuovo Servizio', 'irene-orlandelli'),
            'edit_item' => __('Modifica Servizio', 'irene-orlandelli'),
            'new_item' => __('Nuovo Servizio', 'irene-orlandelli'),
            'view_item' => __('Visualizza Servizio', 'irene-orlandelli'),
            'search_items' => __('Cerca Servizi', 'irene-orlandelli'),
            'not_found' => __('Nessun servizio trovato', 'irene-orlandelli'),
            'not_found_in_trash' => __('Nessun servizio nel cestino', 'irene-orlandelli'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-heart',
        'rewrite' => array('slug' => 'servizi'),
    ));
    
    // Testimonials post type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Testimonianze', 'irene-orlandelli'),
            'singular_name' => __('Testimonianza', 'irene-orlandelli'),
            'add_new' => __('Aggiungi Nuova', 'irene-orlandelli'),
            'add_new_item' => __('Aggiungi Nuova Testimonianza', 'irene-orlandelli'),
            'edit_item' => __('Modifica Testimonianza', 'irene-orlandelli'),
            'new_item' => __('Nuova Testimonianza', 'irene-orlandelli'),
            'view_item' => __('Visualizza Testimonianza', 'irene-orlandelli'),
            'search_items' => __('Cerca Testimonianze', 'irene-orlandelli'),
            'not_found' => __('Nessuna testimonianza trovata', 'irene-orlandelli'),
            'not_found_in_trash' => __('Nessuna testimonianza nel cestino', 'irene-orlandelli'),
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'testimonianze'),
    ));
}
add_action('init', 'irene_orlandelli_custom_post_types');

// Theme customizer
function irene_orlandelli_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Sezione Hero', 'irene-orlandelli'),
        'priority' => 25,
    ));
    
    // Hero title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Il sostegno che ti guida a ritrovare l\'equilibrio',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => __('Titolo Hero', 'irene-orlandelli'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    // Hero content
    $wp_customize->add_setting('hero_content', array(
        'default' => 'Affrontare le sfide della vita adulta può essere complesso: relazioni, obiettivi accademici e pressioni lavorative spesso mettono alla prova la nostra serenità.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_content', array(
        'label' => __('Contenuto Hero', 'irene-orlandelli'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));
    
    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title' => __('Informazioni di Contatto', 'irene-orlandelli'),
        'priority' => 30,
    ));
    
    // Phone number
    $wp_customize->add_setting('phone_number', array(
        'default' => '+39 3382733032',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('phone_number', array(
        'label' => __('Numero di Telefono', 'irene-orlandelli'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('email_address', array(
        'default' => 'ireneorlandelli.psicologa@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('email_address', array(
        'label' => __('Indirizzo Email', 'irene-orlandelli'),
        'section' => 'contact_info',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('office_address', array(
        'default' => 'Via Andrea Maria Ampere 81, Milano',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('office_address', array(
        'label' => __('Indirizzo Studio', 'irene-orlandelli'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    // WhatsApp number
    $wp_customize->add_setting('whatsapp_number', array(
        'default' => '393382733032',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('whatsapp_number', array(
        'label' => __('Numero WhatsApp (senza +)', 'irene-orlandelli'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    // Social Media Section
    $wp_customize->add_section('social_media', array(
        'title' => __('Social Media', 'irene-orlandelli'),
        'priority' => 35,
    ));
    
    // Facebook URL
    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => __('URL Facebook', 'irene-orlandelli'),
        'section' => 'social_media',
        'type' => 'url',
    ));
    
    // Instagram URL
    $wp_customize->add_setting('instagram_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => __('URL Instagram', 'irene-orlandelli'),
        'section' => 'social_media',
        'type' => 'url',
    ));
    
    // LinkedIn URL
    $wp_customize->add_setting('linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => __('URL LinkedIn', 'irene-orlandelli'),
        'section' => 'social_media',
        'type' => 'url',
    ));
}
add_action('customize_register', 'irene_orlandelli_customize_register');

// Contact form handler
function handle_contact_form() {
    if (isset($_POST['contact_form_nonce']) && wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form')) {
        $name = sanitize_text_field($_POST['name']);
        $surname = sanitize_text_field($_POST['surname']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_textarea_field($_POST['message']);
        
        // Send email
        $to = get_theme_mod('email_address', 'ireneorlandelli.psicologa@gmail.com');
        $subject = 'Nuovo messaggio dal sito web';
        $body = "Nome: $name $surname\n";
        $body .= "Email: $email\n";
        $body .= "Telefono: $phone\n\n";
        $body .= "Messaggio:\n$message";
        
        $headers = array('Content-Type: text/html; charset=UTF-8');
        
        if (wp_mail($to, $subject, nl2br($body), $headers)) {
            wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        }
        exit;
    }
}
add_action('wp', 'handle_contact_form');

// Add meta boxes for services
function add_service_meta_boxes() {
    add_meta_box(
        'service_icon',
        __('Icona Servizio', 'irene-orlandelli'),
        'service_icon_callback',
        'services',
        'side'
    );
}
add_action('add_meta_boxes', 'add_service_meta_boxes');

function service_icon_callback($post) {
    wp_nonce_field('save_service_icon', 'service_icon_nonce');
    $value = get_post_meta($post->ID, '_service_icon', true);
    echo '<label for="service_icon_field">' . __('Classe icona Font Awesome:', 'irene-orlandelli') . '</label>';
    echo '<input type="text" id="service_icon_field" name="service_icon_field" value="' . esc_attr($value) . '" placeholder="fa-solid fa-heart" />';
    echo '<p><small>' . __('Es: fa-solid fa-heart, fa-solid fa-graduation-cap', 'irene-orlandelli') . '</small></p>';
}

function save_service_icon($post_id) {
    if (!isset($_POST['service_icon_nonce']) || !wp_verify_nonce($_POST['service_icon_nonce'], 'save_service_icon')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['service_icon_field'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon_field']));
    }
}
add_action('save_post', 'save_service_icon');

// Excerpt length
function irene_orlandelli_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'irene_orlandelli_excerpt_length');

// Custom excerpt more
function irene_orlandelli_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'irene_orlandelli_excerpt_more');

// Clean up WordPress head
function irene_orlandelli_cleanup_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
}
add_action('init', 'irene_orlandelli_cleanup_head');

// Disable WordPress emoji scripts
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis');

// Ensure proper body classes
function irene_orlandelli_body_classes($classes) {
    $classes[] = 'bg-light';
    $classes[] = 'text-dark';
    return $classes;
}
add_filter('body_class', 'irene_orlandelli_body_classes');

// Fix blog URL function
function get_blog_url() {
    // Check if there's a page set for posts
    $blog_page_id = get_option('page_for_posts');
    if ($blog_page_id) {
        return get_permalink($blog_page_id);
    }
    
    // Check if there's a page with slug 'blog'
    $blog_page = get_page_by_path('blog');
    if ($blog_page) {
        return get_permalink($blog_page);
    }
    
    // Default to home URL with /blog/
    return home_url('/blog/');
}

// Create blog page automatically if it doesn't exist
function create_blog_page_if_not_exists() {
    // Check if blog page exists
    $blog_page = get_page_by_path('blog');
    
    if (!$blog_page) {
        // Create blog page
        $blog_page_id = wp_insert_post(array(
            'post_title' => 'Blog',
            'post_content' => 'Questa è la pagina del blog dove vengono mostrati tutti gli articoli.',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'blog'
        ));
        
        if ($blog_page_id && !is_wp_error($blog_page_id)) {
            // Set this page as the posts page
            update_option('page_for_posts', $blog_page_id);
        }
    }
}
add_action('after_switch_theme', 'create_blog_page_if_not_exists');