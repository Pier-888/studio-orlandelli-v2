<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4 text-primary">Blog</h1>
            <p class="text-xl max-w-3xl mx-auto">Articoli e approfondimenti sulla salute psicologica e il benessere mentale</p>
        </div>
        
        <?php if (have_posts()) : ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="bg-secondary rounded-xl shadow-lg overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-56 object-cover')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-6">
                            <div class="text-sm text-gray-600 mb-3">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                <?php if (has_category()) : ?>
                                    <span class="mx-2">•</span>
                                    <?php the_category(', '); ?>
                                <?php endif; ?>
                            </div>
                            <h2 class="text-xl font-bold mb-3 text-primary">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-accent font-medium">
                                Leggi l'articolo
                                <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </article>
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
                <div class="bg-secondary rounded-xl p-12 shadow-lg">
                    <i class="fa-solid fa-newspaper text-6xl text-accent mb-6"></i>
                    <h2 class="text-3xl font-bold text-primary mb-4">Nessun articolo disponibile</h2>
                    <p class="text-xl text-gray-600 mb-8">Al momento non ci sono articoli da mostrare. Torna presto per leggere i nostri contenuti!</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                        Torna alla homepage
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>