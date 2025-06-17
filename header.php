<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#4f6d7a">
    
    <!-- Preload critical fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="sticky top-0 z-50 bg-white shadow-sm">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <img src="https://ireneorlandellipsicologa.it/wp-content/uploads/2024/12/ordinepsicologilogo.webp" alt="Ordine degli Psicologi" class="h-12 w-auto">
            <?php endif; ?>
            
            <?php if (is_front_page()) : ?>
                <h1 class="text-xl md:text-2xl font-bold text-primary">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php else : ?>
                <div class="text-xl md:text-2xl font-bold text-primary">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </div>
            <?php endif; ?>
        </div>
        
        <nav class="hidden md:flex items-center space-x-8">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'flex items-center space-x-8',
                'container' => false,
                'fallback_cb' => 'irene_orlandelli_fallback_menu',
            ));
            ?>
            <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '393382733032')); ?>" target="_blank" rel="noopener" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-300">
                <i class="fab fa-whatsapp mr-2"></i>
                Scrivimi su WhatsApp
            </a>
        </nav>
        
        <div class="md:hidden">
            <button id="menu-btn" class="text-primary focus:outline-none" style="min-height: 44px; min-width: 44px;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 bg-white shadow-lg py-4 px-4">
        <div class="flex flex-col space-y-4">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'flex flex-col space-y-4',
                'container' => false,
                'fallback_cb' => 'irene_orlandelli_mobile_fallback_menu',
            ));
            ?>
            <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '393382733032')); ?>" target="_blank" rel="noopener" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-300 justify-center">
                <i class="fab fa-whatsapp mr-2"></i>
                Scrivimi su WhatsApp
            </a>
        </div>
    </div>
</header>

<?php
// Fallback menu for desktop
function irene_orlandelli_fallback_menu() {
    echo '<a href="' . esc_url(home_url('/')) . '" class="font-medium hover:text-accent transition-colors">Home</a>';
    echo '<a href="' . esc_url(home_url('/#servizi')) . '" class="font-medium hover:text-accent transition-colors">Servizi</a>';
    echo '<a href="' . esc_url(home_url('/#chisono')) . '" class="font-medium hover:text-accent transition-colors">Chi Sono</a>';
    echo '<a href="' . esc_url(home_url('/blog/')) . '" class="font-medium hover:text-accent transition-colors">Articoli</a>';
}

// Fallback menu for mobile
function irene_orlandelli_mobile_fallback_menu() {
    echo '<a href="' . esc_url(home_url('/')) . '" class="font-medium hover:text-accent transition-colors">Home</a>';
    echo '<a href="' . esc_url(home_url('/#servizi')) . '" class="font-medium hover:text-accent transition-colors">Servizi</a>';
    echo '<a href="' . esc_url(home_url('/#chisono')) . '" class="font-medium hover:text-accent transition-colors">Chi Sono</a>';
    echo '<a href="' . esc_url(home_url('/blog/')) . '" class="font-medium hover:text-accent transition-colors">Articoli</a>';
}
?>