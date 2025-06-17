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

// Enqueue styles and scripts
function irene_orlandelli_scripts() {
    // Enqueue Google Fonts FIRST
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Enqueue Tailwind CSS BEFORE main stylesheet
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), '3.0.0', false);
    
    // Enqueue Tailwind config AFTER Tailwind but BEFORE main styles
    wp_enqueue_script('tailwind-config', get_template_directory_uri() . '/assets/js/tailwind-config.js', array('tailwind-cdn'), '1.0.0', false);
    
    // Enqueue main stylesheet LAST
    wp_enqueue_style('irene-orlandelli-style', get_stylesheet_uri(), array('google-fonts', 'font-awesome'), '2.0.0');
    
    // Enqueue main JavaScript
    wp_enqueue_script('irene-orlandelli-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'irene_orlandelli_scripts');

// Add inline styles to ensure Tailwind works
function irene_orlandelli_inline_styles() {
    ?>
    <style>
        /* Ensure Tailwind classes work immediately */
        .bg-primary { background-color: #4f6d7a !important; }
        .bg-secondary { background-color: #e0e6f1 !important; }
        .bg-accent { background-color: #9b8c7d !important; }
        .text-primary { color: #4f6d7a !important; }
        .text-accent { color: #9b8c7d !important; }
        .text-white { color: white !important; }
        
        /* Ensure fonts load */
        body { font-family: 'Poppins', sans-serif !important; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif !important; }
        
        /* Critical layout styles */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
        .grid { display: grid; }
        .flex { display: flex; }
        .hidden { display: none !important; }
        .sticky { position: sticky; }
        .fixed { position: fixed; }
        .relative { position: relative; }
        .absolute { position: absolute; }
        .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
        .z-50 { z-index: 50; }
        .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .rounded-xl { border-radius: 0.75rem; }
        .py-20 { padding-top: 5rem; padding-bottom: 5rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
        .font-bold { font-weight: 700; }
        .text-center { text-align: center; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .space-y-4 > * + * { margin-top: 1rem; }
        .gap-8 { gap: 2rem; }
        
        /* Hero section */
        .hero-gradient {
            background: linear-gradient(rgba(79, 109, 122, 0.8), rgba(224, 230, 241, 0.7)) !important;
        }
        
        /* Service cards */
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }
        
        /* Responsive grid */
        @media (min-width: 768px) {
            .md\\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .md\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .md\\:flex-row { flex-direction: row; }
            .md\\:text-left { text-align: left; }
        }
        
        @media (min-width: 1024px) {
            .lg\\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .lg\\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }
    </style>
    <?php
}
add_action('wp_head', 'irene_orlandelli_inline_styles', 1);

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

// Remove WordPress default styles that might conflict
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

// Ensure Tailwind config loads properly
function irene_orlandelli_tailwind_config() {
    ?>
    <script>
        if (typeof tailwind !== 'undefined') {
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#4f6d7a',
                            secondary: '#e0e6f1',
                            accent: '#9b8c7d',
                            light: '#f8f9fa',
                            dark: '#4a5568'
                        }
                    }
                }
            }
        }
    </script>
    <?php
}
add_action('wp_head', 'irene_orlandelli_tailwind_config', 5);