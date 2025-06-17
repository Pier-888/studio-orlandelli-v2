<?php get_header(); ?>

<main class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
        <?php while (have_posts()) : the_post(); 
            $icon = get_post_meta(get_the_ID(), '_service_icon', true);
            if (empty($icon)) $icon = 'fa-solid fa-heart';
        ?>
            <article class="bg-secondary rounded-xl p-8 shadow-lg">
                <div class="text-center mb-8">
                    <div class="w-24 h-24 rounded-full bg-accent bg-opacity-10 flex items-center justify-center mx-auto mb-6">
                        <i class="<?php echo esc_attr($icon); ?> text-accent text-4xl"></i>
                    </div>
                    <h1 class="text-4xl font-bold text-primary mb-4"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="text-xl text-gray-600"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-8">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover rounded-lg')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="prose prose-lg max-w-none text-gray-700">
                    <?php the_content(); ?>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-300 text-center">
                    <h3 class="text-2xl font-bold text-primary mb-4">Interessato a questo servizio?</h3>
                    <p class="text-gray-600 mb-6">Contattami per maggiori informazioni o per prenotare una consulenza.</p>
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '393382733032')); ?>" target="_blank" rel="noopener" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-300">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Scrivimi su WhatsApp
                        </a>
                        <a href="<?php echo esc_url(home_url('/#contatti')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
                            Modulo di contatto
                        </a>
                    </div>
                </div>
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
                                <div class="text-sm text-gray-600">Servizio precedente</div>
                                <div class="font-medium"><?php echo wp_trim_words($prev_post->post_title, 4); ?></div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                
                <div class="flex-1 text-center">
                    <a href="<?php echo esc_url(home_url('/servizi/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300">
                        Tutti i servizi
                    </a>
                </div>
                
                <div class="flex-1 text-right">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <a href="<?php echo get_permalink($next_post); ?>" class="inline-flex items-center text-accent hover:text-primary transition-colors">
                            <div class="text-right">
                                <div class="text-sm text-gray-600">Servizio successivo</div>
                                <div class="font-medium"><?php echo wp_trim_words($next_post->post_title, 4); ?></div>
                            </div>
                            <i class="fa-solid fa-chevron-right ml-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
            
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>