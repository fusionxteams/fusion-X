// Impact Section Unique Animation

document.addEventListener('DOMContentLoaded', () => {
    const impactSection = document.getElementById('impact');
    const impactCards = document.querySelectorAll('.impact-card');
    const counters = document.querySelectorAll('.count-up');

    // Count Up Logic
    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const speed = 200; // lower is faster
                
                const inc = target / speed;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 15);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.2 // Trigger when 20% of section is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Staggered fade in and scale up
                impactCards.forEach(card => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                });
                
                // Start Odometer count up
                animateCounters();
                
                // Unobserve after running once
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    if (impactSection) {
        observer.observe(impactSection);
    }

    // Add unique neon hover effect to cards
    impactCards.forEach(card => {
        card.addEventListener('mouseover', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
            card.style.boxShadow = '0 15px 35px rgba(255, 87, 34, 0.1)';
            card.style.borderColor = 'rgba(255, 87, 34, 0.3)';
        });
        card.addEventListener('mouseout', () => {
            card.style.transform = 'translateY(0) scale(1)';
            card.style.boxShadow = '0 10px 30px rgba(0,0,0,0.02)';
            card.style.borderColor = '#eaeaea';
        });
    });
});
