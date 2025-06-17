document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Cookies modal functionality
    const cookiesBanner = document.getElementById('cookies-banner');
    const cookiesBtn = document.getElementById('cookies-btn');
    const cookiesModal = document.getElementById('cookies-modal');
    const closeModal = document.getElementById('close-modal');
    const modalCancel = document.getElementById('modal-cancel');
    const modalSave = document.getElementById('modal-save');
    const cookiesAccept = document.getElementById('cookies-accept');
    const cookiesReject = document.getElementById('cookies-reject');
    const cookiesPrefs = document.getElementById('cookies-prefs');
    
    // Show cookies banner on page load
    if (cookiesBanner && !localStorage.getItem('cookies-accepted')) {
        setTimeout(() => {
            cookiesBanner.classList.remove('hidden');
        }, 2000);
    }
    
    // Show cookies modal
    if (cookiesBtn && cookiesModal) {
        cookiesBtn.addEventListener('click', () => {
            cookiesModal.classList.remove('hidden');
        });
    }
    
    if (cookiesPrefs && cookiesBanner && cookiesModal) {
        cookiesPrefs.addEventListener('click', () => {
            cookiesBanner.classList.add('hidden');
            cookiesModal.classList.remove('hidden');
        });
    }
    
    // Close cookies modal
    if (closeModal && cookiesModal) {
        closeModal.addEventListener('click', () => {
            cookiesModal.classList.add('hidden');
        });
    }
    
    if (modalCancel && cookiesModal) {
        modalCancel.addEventListener('click', () => {
            cookiesModal.classList.add('hidden');
        });
    }
    
    // Save cookies preferences
    if (modalSave && cookiesModal && cookiesBanner) {
        modalSave.addEventListener('click', () => {
            cookiesModal.classList.add('hidden');
            cookiesBanner.classList.add('hidden');
            localStorage.setItem('cookies-accepted', 'true');
        });
    }
    
    // Accept all cookies
    if (cookiesAccept && cookiesBanner) {
        cookiesAccept.addEventListener('click', () => {
            cookiesBanner.classList.add('hidden');
            localStorage.setItem('cookies-accepted', 'true');
        });
    }
    
    // Reject cookies
    if (cookiesReject && cookiesBanner) {
        cookiesReject.addEventListener('click', () => {
            cookiesBanner.classList.add('hidden');
            localStorage.setItem('cookies-accepted', 'false');
        });
    }
    
    // Optimized smooth scrolling with passive listeners
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                requestAnimationFrame(() => {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (mobileMenu) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
        }, {passive: false});
    });

    // Prevent zoom on double-tap (except for content inputs)
    document.addEventListener('dblclick', function(e) {
        if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(e.target.tagName)) {
            e.preventDefault();
        }
    }, {passive: false});

    // Fast click handling
    document.addEventListener('touchstart', function() {}, {passive: true});
});