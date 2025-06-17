<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
        <?php while (have_posts()) : the_post(); ?>
            <article class="bg-secondary rounded-xl p-8 shadow-lg">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-8">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover rounded-lg')); ?>
                    </div>
                <?php endif; ?>
                
                <header class="mb-8">
                    <h1 class="text-4xl font-bold text-primary mb-4"><?php the_title(); ?></h1>
                    <div class="text-sm text-gray-600 mb-4">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        <?php if (has_category()) : ?>
                            <span class="mx-2">•</span>
                            <?php the_category(', '); ?>
                        <?php endif; ?>
                        <?php if (has_tag()) : ?>
                            <span class="mx-2">•</span>
                            <?php the_tags('', ', '); ?>
                        <?php endif; ?>
                    </div>
                </header>
                
                <div class="prose prose-lg max-w-none text-gray-700">
                    <?php the_content(); ?>
                </div>
                
                <?php if (has_tag()) : ?>
                    <footer class="mt-8 pt-8 border-t border-gray-300">
                        <div class="flex flex-wrap gap-2">
                            <span class="text-sm font-medium text-gray-600">Tag:</span>
                            <?php the_tags('<span class="inline-block bg-accent bg-opacity-10 text-accent px-3 py-1 rounded-full text-sm">', '</span><span class="inline-block bg-accent bg-opacity-10 text-accent px-3 py-1 rounded-full text-sm">', '</span>'); ?>
                        </div>
                    </footer>
                <?php endif; ?>
            </article>
            
            <!-- Navigation -->
            <nav class="mt-12 flex justify-between items-center">
                <div class="flex-1">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                    ?>
                        <a href="<?php echo get_permalink($prev_post); ?>" class="inline-flex items-center text-accent hover:text-primary transition-colors">
                            <i class="fa-solid fa-chevron-left mr-2"></i>
                            <div>
                                <div class="text-sm text-gray-600">Articolo precedente</div>
                                <div class="font-medium"><?php echo wp_trim_words($prev_post->post_title, 6); ?></div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                
                <div class="flex-1 text-center">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300">
                        Tutti gli articoli
                    </a>
                </div>
                
                <div class="flex-1 text-right">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <a href="<?php echo get_permalink($next_post); ?>" class="inline-flex items-center text-accent hover:text-primary transition-colors">
                            <div class="text-right">
                                <div class="text-sm text-gray-600">Articolo successivo</div>
                                <div class="font-medium"><?php echo wp_trim_words($next_post->post_title, 6); ?></div>
                            </div>
                            <i class="fa-solid fa-chevron-right ml-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
            
            <!-- Related Posts -->
            <?php
            $related_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'category__in' => wp_get_post_categories(get_the_ID()),
                'orderby' => 'rand'
            ));
            
            if ($related_posts->have_posts()) :
            ?>
                <section class="mt-16">
                    <h2 class="text-3xl font-bold text-primary mb-8">Articoli correlati</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="p-6">
                                    <h3 class="text-lg font-bold mb-2 text-primary">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-accent font-medium text-sm">
                                        Leggi tutto
                                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php 
                wp_reset_postdata();
            endif; 
            ?>
            
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>