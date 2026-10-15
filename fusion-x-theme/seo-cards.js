// --- SEO Cards 3D Richness Hover Effect ---
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.seo-card');
    
    // Add perspective to the parent grid for 3D effect
    const grid = document.querySelector('.services-grid');
    if (grid) {
        grid.style.perspective = '1000px';
    }

    cards.forEach(card => {
        // Setup base 3D styling
        card.style.transformStyle = 'preserve-3d';
        card.style.transition = 'transform 0.1s ease, box-shadow 0.1s ease';
        
        // Add a subtle glare element inside the card
        const glare = document.createElement('div');
        glare.style.position = 'absolute';
        glare.style.top = '0';
        glare.style.left = '0';
        glare.style.width = '100%';
        glare.style.height = '100%';
        glare.style.background = 'linear-gradient(105deg, transparent 20%, rgba(255, 87, 34, 0.1) 25%, transparent 30%)';
        glare.style.borderRadius = '12px';
        glare.style.pointerEvents = 'none';
        glare.style.opacity = '0';
        glare.style.transition = 'opacity 0.3s ease';
        glare.style.transform = 'translateZ(1px)'; // slightly above content
        card.appendChild(glare);
        
        // Make the content inside the card pop out in 3D
        const h3 = card.querySelector('h3');
        const p = card.querySelector('p');
        if (h3) h3.style.transform = 'translateZ(30px)';
        if (p) p.style.transform = 'translateZ(20px)';

        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left; // x position within the element
            const y = e.clientY - rect.top;  // y position within the element
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            // Calculate rotation (max 10 degrees)
            const rotateX = ((y - centerY) / centerY) * -10;
            const rotateY = ((x - centerX) / centerX) * 10;
            
            // Apply rich 3D transform using proper template literals
            card.style.transform = `translateY(-5px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
            card.style.boxShadow = '0 15px 35px rgba(255, 87, 34, 0.15), 0 5px 15px rgba(0,0,0,0.05)';
            
            // Move glare
            const glareX = (x / rect.width) * 100;
            const glareY = (y / rect.height) * 100;
            glare.style.background = `radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255,255,255,0.4) 0%, transparent 60%)`;
            glare.style.opacity = '1';
        });
        
        card.addEventListener('mouseleave', () => {
            // Smoothly reset
            card.style.transition = 'transform 0.5s ease, box-shadow 0.5s ease';
            card.style.transform = 'translateY(0) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
            card.style.boxShadow = '0 4px 15px rgba(0,0,0,0.03)';
            glare.style.opacity = '0';
            
            // Remove transition after reset so it doesn't lag on next hover
            setTimeout(() => {
                card.style.transition = 'transform 0.1s ease, box-shadow 0.1s ease';
            }, 500);
        });
        
        // Disable the CSS hover since JS takes over
        card.classList.remove('seo-card');
        card.classList.add('seo-card-js');
    });
});
