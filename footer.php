<!-- Footer -->
<footer class="bg-primary text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 mx-auto max-w-[95vw]">
            <div>
                <h3 class="text-xl font-bold mb-4"><?php bloginfo('name'); ?></h3>
                <p class="mb-4 opacity-80"><?php bloginfo('description'); ?></p>
                <div class="flex space-x-4">
                    <?php if (get_theme_mod('facebook_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" rel="noopener" class="opacity-80 hover:opacity-100">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('instagram_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank" rel="noopener" class="opacity-80 hover:opacity-100">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('linkedin_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" target="_blank" rel="noopener" class="opacity-80 hover:opacity-100">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">Contatti</h3>
                <ul class="space-y-3 opacity-80 break-words">
                    <li class="flex">
                        <i class="fa-solid fa-location-dot mr-3 mt-1 flex-shrink-0"></i>
                        <span class="break-words"><?php echo esc_html(get_theme_mod('office_address', 'Via Andrea Maria Ampere 81, Milano')); ?></span>
                    </li>
                    <li class="flex">
                        <i class="fa-solid fa-phone mr-3 mt-1 flex-shrink-0"></i>
                        <span><?php echo esc_html(get_theme_mod('phone_number', '+39 3382733032')); ?></span>
                        <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '393382733032')); ?>" target="_blank" rel="noopener" class="ml-2 text-accent">- Scrivimi su Whatsapp</a>
                    </li>
                    <li class="flex">
                        <i class="fa-solid fa-envelope mr-3 mt-1 flex-shrink-0"></i>
                        <span class="break-words"><?php echo esc_html(get_theme_mod('email_address', 'ireneorlandelli.psicologa@gmail.com')); ?></span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">Link utili</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'space-y-2 opacity-80',
                    'container' => false,
                    'fallback_cb' => 'irene_orlandelli_footer_fallback_menu',
                ));
                ?>
            </div>
            
            <div>
                <h3 class="text-xl font-bold mb-4">Credits</h3>
                <p class="opacity-80">Made with &#129505; by Pier</p>
                <button id="cookies-btn" class="mt-4 bg-white bg-opacity-10 hover:bg-opacity-20 text-sm py-2 px-4 rounded-lg transition-colors">Preferenze cookie</button>
            </div>
        </div>
        
        <div class="border-t border-white border-opacity-20 mt-12 pt-8 text-center opacity-70 text-sm px-4 mx-auto max-w-[95vw]">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/<?php echo esc_attr(get_theme_mod('whatsapp_number', '393382733032')); ?>" target="_blank" rel="noopener" class="whatsapp-float">
    <div class="whatsapp-tooltip">Contattami su WhatsApp</div>
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Cookies Banner -->
<div id="cookies-banner" class="cookies-banner fixed bottom-0 left-0 right-0 bg-white shadow-lg z-50 px-6 py-6 hidden">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0 md:mr-8">
                <h3 class="text-lg font-bold text-primary mb-2">Utilizzo dei Cookie</h3>
                <p class="text-sm opacity-80 max-w-2xl">Consideriamo i tuoi dati una tua proprietà e sosteniamo il tuo diritto alla privacy e alla trasparenza. Utilizziamo i cookie per migliorare la tua esperienza sul nostro sito web. Seleziona le tue preferenze di consenso.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <button id="cookies-reject" class="px-6 py-3 border border-gray-300 rounded-lg text-sm">Rifiuta tutti</button>
                <button id="cookies-accept" class="bg-primary text-white px-6 py-3 rounded-lg text-sm">Accetta tutti</button>
                <button id="cookies-prefs" class="border border-primary text-primary px-6 py-3 rounded-lg text-sm">Personalizza</button>
            </div>
        </div>
    </div>
</div>

<!-- Cookies Preferences Modal -->
<div id="cookies-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-xl max-w-4xl w-full mx-4 p-8 relative">
        <button id="close-modal" class="absolute top-4 right-4 text-primary">
            <i class="fa-solid fa-times text-2xl"></i>
        </button>
        
        <h2 class="text-2xl font-bold text-primary mb-6">Preferenze di consenso</h2>
        
        <p class="mb-8">Utilizza gli interruttori qui sotto per specificare i tuoi scopi di condivisione dei dati per questo sito web.</p>
        
        <div class="space-y-8">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold">Operazioni fondamentali</h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked disabled class="sr-only peer">
                        <div class="w-11 h-6 bg-primary rounded-full peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
                <p class="text-sm opacity-80 mb-2">Questo tipo di condivisione è necessario, affinché noi possiamo accedere ai dati di cui abbiamo bisogno per assicurarci che il sito web sia sicuro e funzioni correttamente.</p>
                <p class="text-sm font-medium opacity-80">Dati a cui si accede:</p>
                <ul class="text-sm opacity-80 list-disc pl-5 mt-2">
                    <li>Dati anonimi come il nome o la versione del browser</li>
                    <li>Dati pseudonimi come il token di autenticazione</li>
                </ul>
            </div>
            
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold">Personalizzazione dei contenuti</h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
                <p class="text-sm opacity-80 mb-2">Quando viene abilitato, ci autorizzi a salvare le tue preferenze e a creare un profilo su di te, in modo da poterti offrire contenuti personalizzati.</p>
                <p class="text-sm font-medium opacity-80">Dati a cui si accede:</p>
                <ul class="text-sm opacity-80 list-disc pl-5 mt-2">
                    <li>Dati anonimi come il tipo, il modello e il sistema operativo del dispositivo</li>
                    <li>Dati pseudonimi come le preferenze di navigazione sul sito</li>
                    <li>Dati personali come il tuo indirizzo IP e la tua posizione</li>
                </ul>
            </div>
            
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold">Ottimizzazione del sito</h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
                <p class="text-sm opacity-80 mb-2">Quando viene abilitato, questo ci consente di monitorare il tuo comportamento, così da poter analizzare e migliorare i servizi sul nostro sito web per tutti i visitatori.</p>
                <p class="text-sm font-medium opacity-80">Dati a cui si accede:</p>
                <ul class="text-sm opacity-80 list-disc pl-5 mt-2">
                    <li>Dati anonimi come l'indirizzo di un sito web precedentemente visitato (HTTP di presentazione)</li>
                    <li>Dati pseudonimi come gli identificatori di attività del sito web</li>
                    <li>Dati personali come la cronologia dei contenuti, delle ricerche e degli acquisti</li>
                </ul>
            </div>
            
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold">Personalizzazione degli annunci</h3>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
                <p class="text-sm opacity-80 mb-2">Quando viene abilitato, ci autorizzi a condividere i tuoi dati con i nostri partner pubblicitari, che creano profili su di te su molteplici siti web.</p>
                <p class="text-sm font-medium opacity-80">Dati a cui si accede:</p>
                <ul class="text-sm opacity-80 list-disc pl-5 mt-2">
                    <li>Dati anonimi come i link di presentazione o di affiliazione</li>
                    <li>Dati pseudonimi come gli identificatori utilizzati per monitorare e profilare gli utenti</li>
                    <li>Dati personali come età, sesso e informazioni demografiche</li>
                </ul>
            </div>
        </div>
        
        <div class="flex justify-end space-x-4 mt-10">
            <button id="modal-cancel" class="px-6 py-3 border border-gray-300 rounded-lg">Annulla</button>
            <button id="modal-save" class="bg-primary text-white px-6 py-3 rounded-lg">Salva preferenze</button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<?php
// Footer fallback menu
function irene_orlandelli_footer_fallback_menu() {
    echo '<ul class="space-y-2 opacity-80">';
    echo '<li><a href="' . esc_url(home_url('/#servizi')) . '" class="hover:underline">Servizi</a></li>';
    echo '<li><a href="' . esc_url(home_url('/#chisono')) . '" class="hover:underline">Chi sono</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '" class="hover:underline">Articoli</a></li>';
    echo '<li><a href="' . esc_url(home_url('/privacy-policy/')) . '" class="hover:underline">Privacy Policy</a></li>';
    echo '</ul>';
}
?>

</body>
</html>