<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-primary mb-4">
                Risultati di ricerca per: "<?php echo get_search_query(); ?>"
            </h1>
            <?php if (have_posts()) : ?>
                <p class="text-xl text-gray-600">
                    <?php
                    global $wp_query;
                    echo $wp_query->found_posts . ' risultat' . ($wp_query->found_posts == 1 ? 'o' : 'i') . ' trovat' . ($wp_query->found_posts == 1 ? 'o' : 'i');
                    ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if (have_posts()) : ?>
            <div class="grid gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="bg-secondary rounded-xl p-8 shadow-lg">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="mb-6">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover rounded-lg')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <header class="mb-4">
                            <h2 class="text-2xl font-bold text-primary mb-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-accent transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="text-sm text-gray-600 mb-4">
                                <span class="bg-accent bg-opacity-10 text-accent px-2 py-1 rounded text-xs">
                                    <?php echo get_post_type_object(get_post_type())->labels->singular_name; ?>
                                </span>
                                <span class="mx-2">•</span>
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                            </div>
                        </header>
                        
                        <div class="text-gray-700 mb-6">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <footer>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-accent font-medium hover:text-primary transition-colors">
                                Leggi tutto
                                <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </footer>
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
                    <i class="fa-solid fa-search text-6xl text-accent mb-6"></i>
                    <h2 class="text-3xl font-bold text-primary mb-4">Nessun risultato trovato</h2>
                    <p class="text-xl text-gray-600 mb-8">Non sono stati trovati risultati per la tua ricerca. Prova con parole chiave diverse.</p>
                    
                    <!-- New Search Form -->
                    <div class="mb-8">
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="max-w-md mx-auto">
                            <div class="flex">
                                <input type="search" name="s" placeholder="Prova una nuova ricerca..." class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:border-accent">
                                <button type="submit" class="bg-accent hover:bg-opacity-90 text-white px-6 py-3 rounded-r-lg transition-colors duration-300">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                            Torna alla homepage
                        </a>
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="inline-block border-2 border-primary hover:bg-primary hover:text-white text-primary font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                            Leggi gli articoli
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>