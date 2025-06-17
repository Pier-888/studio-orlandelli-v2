<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4 text-primary">I miei servizi</h1>
            <p class="text-xl max-w-3xl mx-auto">Scopri tutti i servizi che offro per supportarti nel tuo percorso di crescita personale.</p>
        </div>
        
        <?php if (have_posts()) : ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); 
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    if (empty($icon)) $icon = 'fa-solid fa-heart';
                ?>
                    <div class="bg-secondary rounded-xl shadow-lg p-6 service-card">
                        <div class="w-16 h-16 rounded-full bg-accent bg-opacity-10 flex items-center justify-center mb-6">
                            <i class="<?php echo esc_attr($icon); ?> text-accent text-2xl"></i>
                        </div>
                        <h2 class="text-xl font-bold mb-4 text-primary">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="mb-4"><?php the_excerpt(); ?></div>
                        <div class="text-gray-600 mb-6"><?php echo wp_trim_words(get_the_content(), 20); ?></div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-accent font-medium">
                            Scopri di più
                            <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="fa-solid fa-chevron-left mr-2"></i>Precedente',
                    'next_text' => 'Successivo<i class="fa-solid fa-chevron-right ml-2"></i>',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <div class="text-center py-20">
                <h2 class="text-3xl font-bold text-primary mb-4">Nessun servizio disponibile</h2>
                <p class="text-xl text-gray-600 mb-8">Al momento non ci sono servizi da mostrare.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                    Torna alla homepage
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>