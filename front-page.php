<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<!-- Hero Section -->
<section id="hero" class="relative h-screen pt-16 md:pt-0">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('full', array('class' => 'absolute inset-0 w-full h-full object-cover', 'loading' => 'lazy', 'decoding' => 'async')); ?>
    <?php else : ?>
        <img src="https://ireneorlandellipsicologa.it/wp-content/uploads/2024/12/IMG_8914.jpg" alt="Psicologa Irene Orlandelli" class="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async">
    <?php endif; ?>
    
    <div class="absolute inset-0 hero-gradient flex items-center">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center md:text-left text-white">
                <?php 
                // Get custom content or use default
                $hero_title = get_theme_mod('hero_title', 'Il sostegno che ti guida a ritrovare l\'equilibrio');
                $hero_content = get_theme_mod('hero_content', 'Affrontare le sfide della vita adulta può essere complesso: relazioni, obiettivi accademici e pressioni lavorative spesso mettono alla prova la nostra serenità.');
                
                // Check if we have post content
                if (have_posts()) : 
                    while (have_posts()) : the_post();
                        $post_content = get_the_content();
                        if (!empty($post_content) && trim($post_content) !== '') :
                            // Use post content if available
                            ?>
                            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6"><?php echo esc_html($hero_title); ?></h1>
                            <div class="text-xl md:text-2xl mb-8"><?php the_content(); ?></div>
                            <?php
                        else :
                            // Use default content
                            ?>
                            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6"><?php echo esc_html($hero_title); ?></h1>
                            <p class="text-xl md:text-2xl mb-8"><?php echo esc_html($hero_content); ?></p>
                            <?php
                        endif;
                    endwhile;
                else : 
                    // Fallback content
                    ?>
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6"><?php echo esc_html($hero_title); ?></h1>
                    <p class="text-xl md:text-2xl mb-8"><?php echo esc_html($hero_content); ?></p>
                    <?php
                endif; 
                ?>
                
                <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#servizi" class="inline-block bg-accent hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">Scopri i miei servizi</a>
                    <a href="#contatti" class="inline-block border-2 border-white hover:bg-white hover:text-primary text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">Prenota un appuntamento</a>
                </div>
            </div>
        </div>
    </div>
    
    <a href="#servizi" class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </a>
</section>

<!-- Servizi Section -->
<section id="servizi" class="py-20 bg-secondary">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 text-primary">Su cosa possiamo lavorare assieme</h2>
            <p class="text-xl max-w-3xl mx-auto">Ti supporto in un percorso di crescita e miglioramento, a superare ostacoli e ad affrontare le sfide quotidiane.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $services = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => 4,
                'post_status' => 'publish'
            ));
            
            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    if (empty($icon)) $icon = 'fa-solid fa-heart';
            ?>
                <div class="bg-white rounded-xl shadow-lg p-6 service-card">
                    <div class="w-16 h-16 rounded-full bg-accent bg-opacity-10 flex items-center justify-center mb-6">
                        <i class="<?php echo esc_attr($icon); ?> text-accent text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-primary"><?php the_title(); ?></h3>
                    <div class="mb-4"><?php the_excerpt(); ?></div>
                    <div class="text-gray-600"><?php echo wp_trim_words(get_the_content(), 20); ?></div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback services if none are created
                $default_services = array(
                    array(
                        'icon' => 'fa-solid fa-handshake',
                        'title' => 'Difficoltà relazionali nei Giovani Adulti',
                        'excerpt' => 'Un supporto per navigare il complesso mondo delle relazioni.',
                        'content' => 'Le relazioni sono il cuore della nostra vita: familiari, amicali, sentimentali o professionali. Per i giovani adulti, questo periodo di transizione può essere ricco di sfide...'
                    ),
                    array(
                        'icon' => 'fa-solid fa-graduation-cap',
                        'title' => 'Difficoltà Universitarie',
                        'excerpt' => 'Affronta gli studi con serenità e determinazione.',
                        'content' => 'Affrontare l\'università può essere una sfida complessa e stressante, soprattutto quando ci si trova a fronteggiare situazioni come il blocco negli studi...'
                    ),
                    array(
                        'icon' => 'fa-solid fa-briefcase',
                        'title' => 'Ansia da Performance sul Lavoro',
                        'excerpt' => 'Affronta le sfide professionali con sicurezza e serenità.',
                        'content' => 'Il mondo del lavoro può essere un contesto stimolante, ma anche fonte di pressione e stress, soprattutto per i giovani adulti...'
                    ),
                    array(
                        'icon' => 'fa-solid fa-cloud-sun',
                        'title' => 'Depressione nei Giovani Adulti',
                        'excerpt' => 'Ritrova la serenità e valorizza il tuo potenziale.',
                        'content' => 'La depressione è una sfida che molti giovani adulti tra i 25 e i 35 anni si trovano ad affrontare. Questo periodo della vita...'
                    )
                );
                
                foreach ($default_services as $service) :
            ?>
                <div class="bg-white rounded-xl shadow-lg p-6 service-card">
                    <div class="w-16 h-16 rounded-full bg-accent bg-opacity-10 flex items-center justify-center mb-6">
                        <i class="<?php echo esc_attr($service['icon']); ?> text-accent text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-primary"><?php echo esc_html($service['title']); ?></h3>
                    <p class="mb-4"><?php echo esc_html($service['excerpt']); ?></p>
                    <p class="text-gray-600"><?php echo esc_html($service['content']); ?></p>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="chisono" class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <div class="mb-10 pl-6 quote-border">
                    <p class="text-xl italic">"Mi vai bene così come sei, non ti chiedo niente. Non intendo curarti, modificarti, non ti critico né ti disapprovo. Sei tu a rivolgerti a me, a denunciare che qualcosa non va, a portarmi i tuoi bisogni inappagati."</p>
                    <p class="mt-4 font-semibold">Sergio Erba</p>
                </div>
                
                <div>
                    <h2 class="text-3xl font-bold mb-6 text-primary">Le mie qualifiche da Psicoterapeuta</h2>
                    <p class="text-lg mb-4">Sono una psicologa ad orientamento psicoanalitico relazionale.</p>
                    <p class="mb-4">Ho sempre creduto che ogni persona abbia una storia unica da raccontare, fatta di emozioni, esperienze e sfide che meritano ascolto e comprensione. Il mio lavoro nasce dalla passione per aiutare le persone a riscoprire il loro equilibrio e a valorizzare le risorse interiori che spesso restano nascoste nei momenti di difficoltà.</p>
                    <p class="mb-6">Mi sono laureata in Psicologia Clinica a Milano e sto proseguendo la mia formazione in psicoterapia psicoanalitica relazionale. Sono iscritta all'Albo degli Psicologi della Lombardia.</p>
                    
                    <div class="bg-secondary p-6 rounded-lg">
                        <h3 class="text-xl font-bold mb-4 text-primary">Esperienze professionali</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fa-solid fa-circle-check text-accent mr-3 mt-1"></i>
                                <span>Collaboro attivamente con l'ambulatorio dell'ASST Fatebenefratelli</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-solid fa-circle-check text-accent mr-3 mt-1"></i>
                                <span>Supporto a persone con disturbi dell'umore, depressione o ansia</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fa-solid fa-circle-check text-accent mr-3 mt-1"></i>
                                <span>Formazione continua e aggiornamento professionale</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-xl">
                    <img src="https://ireneorlandellipsicologa.it/wp-content/uploads/2024/12/Irene-Orlandelli-Psicologa-scaled-e1734951656541-866x1024.jpg" alt="Irene Orlandelli Psicologa" class="w-full h-auto">
                </div>
                <div class="absolute -bottom-6 -right-6 bg-accent w-24 h-24 rounded-xl rotate-12 opacity-20"></div>
                <div class="absolute top-6 -left-6 bg-primary w-20 h-20 rounded-xl rotate-12 opacity-20"></div>
            </div>
        </div>
    </div>
</section>

<!-- Articoli Section -->
<section id="articoli" class="py-20 bg-secondary">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 text-primary">Ultimi articoli</h2>
            <p class="text-xl">Esplora gli ultimi approfondimenti sulla salute psicologica</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-56 object-cover')); ?>
                        </a>
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-primary">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-accent font-medium">
                            Leggi l'articolo
                            <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback articles if none exist
                $default_articles = array(
                    array(
                        'image' => 'https://ireneorlandellipsicologa.it/wp-content/uploads/2025/04/chatgpt.png',
                        'title' => 'Può ChatGPT essere il tuo psicologo?',
                        'excerpt' => 'Negli ultimi anni l\'intelligenza artificiale ha fatto passi da gigante, entrando a far parte della nostra quotidianità in modi sempre più sorprendenti...'
                    ),
                    array(
                        'image' => 'https://ireneorlandellipsicologa.it/wp-content/uploads/2025/01/cuore-spezzato.webp',
                        'title' => 'Come gestire la sofferenza emotiva alla chiusura di una relazione?',
                        'excerpt' => 'La fine di una relazione può somigliare a una tempesta improvvisa: un turbinio di emozioni che ci travolge, lasciandoci disorientati e spesso sopraffatti...'
                    ),
                    array(
                        'image' => 'https://ireneorlandellipsicologa.it/wp-content/uploads/2024/12/immagine-per-lavoro.png',
                        'title' => 'Come può aiutare la Psicoterapia',
                        'excerpt' => 'Esploriamo insieme gli aspetti più rilevanti e i benefici principali che la psicoterapia può offrirti nella tua vita...'
                    )
                );
                
                foreach ($default_articles as $article) :
            ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="<?php echo esc_url($article['image']); ?>" alt="<?php echo esc_attr($article['title']); ?>" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-primary"><?php echo esc_html($article['title']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo esc_html($article['excerpt']); ?></p>
                        <a href="#" class="inline-flex items-center text-accent font-medium">
                            Leggi l'articolo
                            <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="inline-block bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300">Visita il blog</a>
        </div>
    </div>
</section>

<!-- Contatti Section -->
<section id="contatti" class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 max-w-6xl">
        <div class="grid md:grid-cols-2 gap-8 lg:gap-12 contact-grid">
            <div class="w-full">
                <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-primary text-center md:text-left">Dove mi puoi trovare</h2>
                
                <div class="mb-8 sm:mb-10 space-y-6">
                    <div class="flex items-start contact-info-item">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-secondary flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                            <i class="fa-solid fa-location-dot text-primary text-sm sm:text-base"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg sm:text-xl font-bold mb-1">Studio Professionale</h3>
                            <p class="text-base sm:text-lg break-words"><?php echo esc_html(get_theme_mod('office_address', 'Via Andrea Maria Ampere 81, Milano')); ?></p>
                            <p class="text-sm sm:text-base text-gray-600">Ricevo <strong>solo su appuntamento</strong>, in presenza o online</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start contact-info-item">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-secondary flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                            <i class="fa-solid fa-phone text-primary text-sm sm:text-base"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg sm:text-xl font-bold mb-1">Telefono</h3>
                            <p class="text-base sm:text-lg break-all"><?php echo esc_html(get_theme_mod('phone_number', '+39 3382733032')); ?></p>
                            <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '393382733032')); ?>" target="_blank" rel="noopener" class="mt-2 inline-flex items-center text-accent hover:text-accent-dark transition-colors text-sm sm:text-base">
                                <i class="fab fa-whatsapp mr-2 text-base sm:text-lg"></i> Scrivimi su Whatsapp
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start contact-info-item">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-secondary flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                            <i class="fa-solid fa-envelope text-primary text-sm sm:text-base"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg sm:text-xl font-bold mb-1">Email</h3>
                            <p class="text-base sm:text-lg break-all"><?php echo esc_html(get_theme_mod('email_address', 'ireneorlandelli.psicologa@gmail.com')); ?></p>
                        </div>
                    </div>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-primary text-center md:text-left">Contattami per una consulenza</h3>
                <p class="mb-6 sm:mb-8 text-center md:text-left">Compila il modulo per richiedere informazioni, prenotare una seduta o fissare un incontro conoscitivo.</p>
                
                <?php if (isset($_GET['contact']) && $_GET['contact'] == 'success') : ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        Grazie per il tuo messaggio! Ti risponderò al più presto.
                    </div>
                <?php elseif (isset($_GET['contact']) && $_GET['contact'] == 'error') : ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        Si è verificato un errore nell'invio del messaggio. Riprova più tardi.
                    </div>
                <?php endif; ?>
                
                <form method="post" class="space-y-3 contact-form">
                    <?php wp_nonce_field('contact_form', 'contact_form_nonce'); ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="name" class="block font-medium mb-1 text-sm sm:text-base">Nome *</label>
                            <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-accent text-sm sm:text-base">
                        </div>
                        <div>
                            <label for="surname" class="block font-medium mb-1 text-sm sm:text-base">Cognome</label>
                            <input type="text" id="surname" name="surname" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-accent text-sm sm:text-base">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block font-medium mb-1 text-sm sm:text-base">Email *</label>
                        <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-accent text-sm sm:text-base">
                    </div>
                    
                    <div>
                        <label for="phone" class="block font-medium mb-1 text-sm sm:text-base">Telefono *</label>
                        <input type="tel" id="phone" name="phone" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-accent text-sm sm:text-base">
                    </div>
                    
                    <div>
                        <label for="message" class="block font-medium mb-1 text-sm sm:text-base">Commento o messaggio *</label>
                        <textarea id="message" name="message" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-accent text-sm sm:text-base"></textarea>
                    </div>
                    
                    <div class="pt-2">
                        <button type="submit" class="w-full sm:w-auto bg-primary hover:bg-opacity-90 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300 flex items-center justify-center text-sm sm:text-base">
                            Invia richiesta
                            <i class="fa-solid fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="bg-secondary rounded-2xl p-4 sm:p-6 lg:p-8 contact-sidebar">
                <div class="rounded-xl overflow-hidden shadow-lg mb-6 sm:mb-8">
                    <div class="map-container" style="height: 250px; background-color: #eee; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center p-4">
                            <i class="fa-solid fa-map-location-dot text-3xl sm:text-4xl text-gray-500 mb-4"></i>
                            <p class="font-medium text-gray-600 text-sm sm:text-base">Mappa dello studio professionale</p>
                            <p class="text-gray-500 text-xs sm:text-sm break-words"><?php echo esc_html(get_theme_mod('office_address', 'Via Andrea Maria Ampere 81, Milano')); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 sm:p-6 rounded-lg mb-6 sm:mb-8">
                    <h3 class="text-lg sm:text-xl font-bold mb-4 text-primary">Orari di ricevimento</h3>
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex justify-between pb-2 sm:pb-3 border-b text-sm sm:text-base">
                            <span>Lunedì - Venerdì</span>
                            <span class="font-medium">09:00 - 20:00</span>
                        </div>
                        <div class="flex justify-between pb-2 sm:pb-3 border-b text-sm sm:text-base">
                            <span>Sabato</span>
                            <span class="font-medium">10:00 - 15:00</span>
                        </div>
                        <div class="flex justify-between pb-2 sm:pb-3 border-b text-sm sm:text-base">
                            <span>Domenica</span>
                            <span class="font-medium">Chiuso</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-accent bg-opacity-10 p-4 sm:p-6 rounded-lg">
                    <h3 class="text-lg sm:text-xl font-bold mb-4 text-primary">Modalità di incontro</h3>
                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fa-solid fa-user text-primary text-xs sm:text-sm"></i>
                            </div>
                            <span class="text-xs sm:text-sm">In studio</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fa-solid fa-video text-primary text-xs sm:text-sm"></i>
                            </div>
                            <span class="text-xs sm:text-sm">Videochiamata</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fa-solid fa-phone text-primary text-xs sm:text-sm"></i>
                            </div>
                            <span class="text-xs sm:text-sm">Telefono</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-white flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fa-solid fa-comment text-primary text-xs sm:text-sm"></i>
                            </div>
                            <span class="text-xs sm:text-sm">Chat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>