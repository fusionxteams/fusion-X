// Impact Section Animation - Individual card observer & smooth counters

(function() {
    function initImpactSection() {
        const impactCards = document.querySelectorAll('.impact-card');
        if (!impactCards.length) return;

        const isMobile = window.innerWidth <= 768;

        // Smooth Counter Animation using requestAnimationFrame
        function animateCounter(counter) {
            if (counter.dataset.animated === 'true') return;
            counter.dataset.animated = 'true';

            const target = parseFloat(counter.getAttribute('data-target'));
            if (isNaN(target)) return;

            const duration = 1200; // ms
            const startTime = performance.now();

            function step(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                // Ease out cubic
                const ease = 1 - Math.pow(1 - progress, 3);
                const currentVal = Math.floor(ease * target);
                
                counter.innerText = currentVal;

                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    counter.innerText = target;
                }
            }

            requestAnimationFrame(step);
        }

        // Reveal a card and trigger its counters
        function revealCard(card) {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0) scale(1)';

            const counters = card.querySelectorAll('.count-up');
            counters.forEach(animateCounter);
        }

        // Check if IntersectionObserver is supported
        if ('IntersectionObserver' in window) {
            const cardObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        revealCard(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px 50px 0px' // Start animation 50px before entering viewport
            });

            impactCards.forEach(card => {
                if (isMobile) {
                    // On mobile, zero delay so cards feel instantly responsive on scroll
                    card.style.transitionDelay = '0s';
                }

                // If card is already inside viewport on load, reveal immediately
                const rect = card.getBoundingClientRect();
                const inView = rect.top < (window.innerHeight || document.documentElement.clientHeight) + 50 && rect.bottom > 0;
                
                if (inView) {
                    revealCard(card);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(35px) scale(0.96)';
                    cardObserver.observe(card);
                }
            });
        } else {
            // Fallback for older browsers
            impactCards.forEach(revealCard);
        }

        // Hover effect for desktop
        impactCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
                card.style.boxShadow = '0 15px 35px rgba(255, 87, 34, 0.12)';
                card.style.borderColor = 'rgba(255, 87, 34, 0.3)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
                card.style.boxShadow = '0 10px 30px rgba(0,0,0,0.02)';
                card.style.borderColor = '#eaeaea';
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initImpactSection);
    } else {
        initImpactSection();
    }
})();
