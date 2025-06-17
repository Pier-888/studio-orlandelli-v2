<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-4xl text-center">
        <div class="bg-secondary rounded-xl p-12 shadow-lg">
            <div class="mb-8">
                <i class="fa-solid fa-exclamation-triangle text-6xl text-accent mb-6"></i>
                <h1 class="text-6xl font-bold text-primary mb-4">404</h1>
                <h2 class="text-3xl font-bold text-primary mb-6">Pagina non trovata</h2>
                <p class="text-xl text-gray-600 mb-8">La pagina che stai cercando non esiste o è stata spostata.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                    <i class="fa-solid fa-home mr-2"></i>
                    Torna alla homepage
                </a>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="inline-block border-2 border-primary hover:bg-primary hover:text-white text-primary font-bold py-3 px-8 rounded-lg transition-colors duration-300">
                    <i class="fa-solid fa-newspaper mr-2"></i>
                    Leggi gli articoli
                </a>
            </div>
            
            <!-- Search Form -->
            <div class="mt-12">
                <h3 class="text-xl font-bold text-primary mb-4">Oppure cerca quello che ti interessa:</h3>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="max-w-md mx-auto">
                    <div class="flex">
                        <input type="search" name="s" placeholder="Cerca nel sito..." class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:border-accent" value="<?php echo get_search_query(); ?>">
                        <button type="submit" class="bg-accent hover:bg-opacity-90 text-white px-6 py-3 rounded-r-lg transition-colors duration-300">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>