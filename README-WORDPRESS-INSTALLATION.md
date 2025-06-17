# Installazione Tema WordPress - Irene Orlandelli Psicologa

## Come installare correttamente il tema su WordPress

### IMPORTANTE: Non caricare il file index.html!

Il file `index.html` è solo per l'anteprima statica. Per WordPress devi usare i file PHP del tema.

### Passaggi per l'installazione:

1. **Scarica tutti i file del tema** (escludi `index.html` e `package.json`)
2. **Crea una cartella zip** con questi file:
   - `style.css`
   - `functions.php`
   - `header.php`
   - `footer.php`
   - `front-page.php`
   - `index.php`
   - `single.php`
   - `page.php`
   - `search.php`
   - `404.php`
   - `archive-services.php`
   - `single-services.php`
   - `assets/` (cartella completa)

3. **Carica il tema su WordPress**:
   - Vai in **Aspetto > Temi**
   - Clicca **Aggiungi nuovo**
   - Clicca **Carica tema**
   - Seleziona il file zip
   - Clicca **Installa ora**
   - **Attiva** il tema

4. **Configura il tema**:
   - Vai in **Aspetto > Personalizza**
   - Configura le sezioni "Informazioni di Contatto" e "Social Media"
   - Imposta il logo personalizzato se necessario

5. **Crea i menu**:
   - Vai in **Aspetto > Menu**
   - Crea un menu principale e assegnalo a "Primary Menu"
   - Crea un menu footer e assegnalo a "Footer Menu"

6. **Crea la homepage**:
   - Vai in **Pagine > Aggiungi nuova**
   - Titolo: "Homepage"
   - Seleziona template "Homepage" 
   - Pubblica la pagina
   - Vai in **Impostazioni > Lettura**
   - Seleziona "Una pagina statica" e scegli la pagina Homepage

### File da NON caricare su WordPress:
- `index.html` (solo per anteprima)
- `package.json`
- `package-lock.json`
- `README.md`
- `LICENSE`
- `prompts.txt`

### Struttura corretta del tema WordPress:
```
irene-orlandelli-theme/
├── style.css (obbligatorio)
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── index.php
├── single.php
├── page.php
├── search.php
├── 404.php
├── archive-services.php
├── single-services.php
└── assets/
    ├── js/
    │   ├── main.js
    │   └── tailwind-config.js
    └── (altre risorse se necessarie)
```

### Note importanti:
- Il tema usa Tailwind CSS tramite CDN (già configurato)
- Font Awesome è caricato tramite CDN
- Google Fonts sono caricati automaticamente
- Tutti gli stili personalizzati sono in `style.css`
- Le funzionalità JavaScript sono in `assets/js/main.js`

### Dopo l'installazione:
Il tema avrà lo stesso aspetto dell'anteprima HTML ma funzionerà correttamente con WordPress, inclusi:
- Sistema di gestione contenuti
- Custom post types (Servizi)
- Personalizzazione tramite Customizer
- Menu dinamici
- Form di contatto funzionante
- SEO ottimizzato