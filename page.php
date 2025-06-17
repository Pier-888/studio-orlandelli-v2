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
                </header>
                
                <div class="prose prose-lg max-w-none text-gray-700">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>