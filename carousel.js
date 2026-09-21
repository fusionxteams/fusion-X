// --- HTML 3D Brand Carousel ---
const carousel = document.getElementById('html-3d-carousel');
const scene3D = document.querySelector('.brands-scene');

if (carousel && scene3D) {
    const cards = carousel.querySelectorAll('.brand-card');
    const numCards = cards.length;
    // Calculate radius to perfectly fit all cards in a ring without overlapping
    const cardWidth = 220; 
    const radius = Math.round((cardWidth / 2) / Math.tan(Math.PI / numCards)) + 40; // Tighter ring
    
    // Initial State: Scattered, scaled down, and invisible for stunning entrance
    cards.forEach((card, index) => {
        const randomX = (Math.random() - 0.5) * 1000;
        const randomY = (Math.random() - 0.5) * 1000;
        const randomZ = (Math.random() - 0.5) * 1000;
        card.style.transform = `translate3d(${randomX}px, ${randomY}px, ${randomZ}px) scale(0.1) rotateX(180deg) rotateY(180deg)`;
        card.style.opacity = '0';
        card.style.transition = `transform 1.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) ${index * 0.15}s, opacity 1s ease ${index * 0.15}s`;
    });
    
    let currentRotation = 0;
    let isDraggingCarousel = false;
    let startX = 0;
    let animationStarted = false;
    
    // STUNNING ENTRANCE ANIMATION via IntersectionObserver
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !animationStarted) {
            animationStarted = true;
            
            // Fast spin entrance effect on the entire carousel container
            carousel.style.transition = 'transform 3s cubic-bezier(0.2, 0.8, 0.2, 1)';
            carousel.style.transform = `rotateY(720deg)`;
            currentRotation = 720;
            
            // Cards assemble into the ring
            cards.forEach((card, index) => {
                const angle = (360 / numCards) * index;
                // Wait a tiny bit for browser to register the initial transition state
                requestAnimationFrame(() => {
                    card.style.transform = `rotateY(${angle}deg) translateZ(${radius}px) scale(1)`;
                    card.style.opacity = '1';
                });
                
                // Clear the long entrance transition after it finishes so normal hover/drag works smoothly
                setTimeout(() => {
                    card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease'; // Normal hover transition
                }, 1500 + (index * 150));
            });
            
            // Start the slow auto-spin loop after the entrance completes
            setTimeout(autoSpin, 3000);
        }
    }, { threshold: 0.3 });
    
    observer.observe(scene3D);
    
    // Auto-spin animation loop
    function autoSpin() {
        if (!isDraggingCarousel) {
            currentRotation -= 0.15; // Slow, majestic rotation
            carousel.style.transition = 'none'; // Disable transition for smooth JS frame-by-frame updates
            carousel.style.transform = `rotateY(${currentRotation}deg)`;
        }
        requestAnimationFrame(autoSpin);
    }

    // Interactive Dragging / Swiping
    scene3D.addEventListener('mousedown', (e) => {
        isDraggingCarousel = true;
        startX = e.pageX;
        carousel.style.transition = 'none'; // Disable transition for instant drag response
        scene3D.style.cursor = 'grabbing';
    });
    
    window.addEventListener('mouseup', () => {
        if (isDraggingCarousel) {
            isDraggingCarousel = false;
            scene3D.style.cursor = 'grab';
        }
    });
    
    window.addEventListener('mousemove', (e) => {
        if (!isDraggingCarousel) return;
        const x = e.pageX;
        const dragDist = x - startX;
        currentRotation += dragDist * 0.4; // Responsive drag sensitivity
        carousel.style.transform = `rotateY(${currentRotation}deg)`;
        startX = x;
    });

    // Touch support for Mobile
    scene3D.addEventListener('touchstart', (e) => {
        isDraggingCarousel = true;
        startX = e.touches[0].clientX;
        carousel.style.transition = 'none';
    }, {passive: true});
    
    window.addEventListener('touchend', () => {
        isDraggingCarousel = false;
    });
    
    window.addEventListener('touchmove', (e) => {
        if (!isDraggingCarousel) return;
        const x = e.touches[0].clientX;
        const dragDist = x - startX;
        currentRotation += dragDist * 0.4;
        carousel.style.transform = `rotateY(${currentRotation}deg)`;
        startX = x;
    }, {passive: true});
}
