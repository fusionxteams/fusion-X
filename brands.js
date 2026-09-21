// brands.js
const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof brandTextures !== 'undefined') {
    // 1. Setup the high-end minimalist container
    brandsContainer.innerHTML = '';
    brandsContainer.style.width = '100%';
    brandsContainer.style.minHeight = '600px'; // Give it plenty of room
    brandsContainer.style.background = '#0a0a0a'; // Ultra dark sleek background
    brandsContainer.style.position = 'relative';
    brandsContainer.style.display = 'flex';
    brandsContainer.style.alignItems = 'center';
    brandsContainer.style.justifyContent = 'center';
    brandsContainer.style.padding = '40px 20px';
    brandsContainer.style.overflow = 'hidden';

    // Change title text to match dark theme
    const titleContainer = brandsContainer.parentElement.querySelector('.section-title');
    if (titleContainer) {
        titleContainer.style.position = 'relative';
        titleContainer.style.top = '0';
        titleContainer.style.paddingTop = '60px';
        titleContainer.style.paddingBottom = '20px';
        titleContainer.parentElement.style.background = '#0a0a0a';
        
        const h2 = titleContainer.querySelector('h2');
        if (h2) h2.style.color = '#ffffff';
        
        const p = titleContainer.querySelector('p');
        if (p) p.innerText = 'Hover to reveal';
    }

    // 2. Global Spotlight that follows cursor
    const spotlight = document.createElement('div');
    spotlight.style.position = 'absolute';
    spotlight.style.width = '600px';
    spotlight.style.height = '600px';
    spotlight.style.background = 'radial-gradient(circle, rgba(255,87,34,0.15) 0%, rgba(10,10,10,0) 70%)';
    spotlight.style.borderRadius = '50%';
    spotlight.style.pointerEvents = 'none'; // Don't block hovers
    spotlight.style.transform = 'translate(-50%, -50%)';
    spotlight.style.transition = 'opacity 0.3s ease';
    spotlight.style.opacity = '0';
    spotlight.style.zIndex = '1';
    brandsContainer.appendChild(spotlight);

    // 3. Create the CSS Grid
    const grid = document.createElement('div');
    grid.style.display = 'grid';
    grid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(220px, 1fr))';
    grid.style.gap = '30px';
    grid.style.width = '100%';
    grid.style.maxWidth = '1000px';
    grid.style.zIndex = '2';
    grid.style.perspective = '1000px'; // For the 3D tilt
    brandsContainer.appendChild(grid);

    // 4. Create the Interactive Cards
    const cards = [];
    brandTextures.forEach((b64, index) => {
        const card = document.createElement('div');
        card.style.position = 'relative';
        card.style.width = '100%';
        card.style.aspectRatio = '1 / 1'; // Perfect square
        card.style.background = '#111111'; // Dark card background
        card.style.border = '1px solid #222222';
        card.style.borderRadius = '15px';
        card.style.display = 'flex';
        card.style.alignItems = 'center';
        card.style.justifyContent = 'center';
        card.style.overflow = 'hidden';
        card.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        card.style.transformStyle = 'preserve-3d';
        card.style.cursor = 'crosshair';

        // Add the Image (Hidden initially)
        const imgContainer = document.createElement('div');
        imgContainer.style.position = 'absolute';
        imgContainer.style.inset = '10px';
        imgContainer.style.background = '#ffffff';
        imgContainer.style.borderRadius = '10px';
        imgContainer.style.border = '3px solid transparent'; // Will become orange on hover
        imgContainer.style.display = 'flex';
        imgContainer.style.alignItems = 'center';
        imgContainer.style.justifyContent = 'center';
        imgContainer.style.opacity = '0.05'; // Barely visible silhouette
        imgContainer.style.transition = 'all 0.4s ease';
        imgContainer.style.transform = 'translateZ(30px)'; // Pops out in 3D

        if (b64 === '') {
            imgContainer.innerText = 'Dr. Madhavi';
            imgContainer.style.fontWeight = 'bold';
            imgContainer.style.fontSize = '20px';
            imgContainer.style.color = '#111';
            imgContainer.style.textAlign = 'center';
        } else {
            const img = document.createElement('img');
            img.src = b64;
            img.style.width = '80%';
            img.style.height = '80%';
            img.style.objectFit = 'contain';
            imgContainer.appendChild(img);
        }

        // Add a subtle tech grid overlay pattern inside the dark card
        const techPattern = document.createElement('div');
        techPattern.style.position = 'absolute';
        techPattern.style.inset = '0';
        techPattern.style.backgroundImage = 'radial-gradient(#333 1px, transparent 1px)';
        techPattern.style.backgroundSize = '15px 15px';
        techPattern.style.opacity = '0.3';
        techPattern.style.transition = 'opacity 0.4s ease';
        card.appendChild(techPattern);

        card.appendChild(imgContainer);
        grid.appendChild(card);
        cards.push({ card, imgContainer, techPattern });
    });

    // 5. Advanced Mouse Tracking & 3D Tilt Logic
    let bounds = brandsContainer.getBoundingClientRect();
    window.addEventListener('resize', () => { bounds = brandsContainer.getBoundingClientRect(); });
    window.addEventListener('scroll', () => { bounds = brandsContainer.getBoundingClientRect(); });

    brandsContainer.addEventListener('mouseenter', () => {
        spotlight.style.opacity = '1';
    });

    brandsContainer.addEventListener('mouseleave', () => {
        spotlight.style.opacity = '0';
        // Reset all cards softly
        cards.forEach(({ card, imgContainer, techPattern }) => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)';
            card.style.border = '1px solid #222222';
            card.style.boxShadow = 'none';
            imgContainer.style.opacity = '0.05';
            imgContainer.style.borderColor = 'transparent';
            techPattern.style.opacity = '0.3';
        });
    });

    brandsContainer.addEventListener('mousemove', (e) => {
        // Update Spotlight position
        const mouseX = e.clientX - bounds.left;
        const mouseY = e.clientY - bounds.top;
        spotlight.style.left = `${mouseX}px`;
        spotlight.style.top = `${mouseY}px`;

        // Calculate proximity and tilt for each card
        cards.forEach(({ card, imgContainer, techPattern }) => {
            const cardRect = card.getBoundingClientRect();
            const cardCenterX = cardRect.left - bounds.left + cardRect.width / 2;
            const cardCenterY = cardRect.top - bounds.top + cardRect.height / 2;
            
            const deltaX = mouseX - cardCenterX;
            const deltaY = mouseY - cardCenterY;
            const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
            
            // Interaction Radius (How close mouse needs to be to affect the card)
            const radius = 250; 

            if (distance < radius) {
                // Inside radius: Calculate 3D Tilt based on mouse position relative to card center
                const tiltX = (deltaY / (cardRect.height / 2)) * -15; // Max 15 deg
                const tiltY = (deltaX / (cardRect.width / 2)) * 15;
                
                // Calculate intensity based on closeness (1 = dead center, 0 = edge of radius)
                const intensity = 1 - (distance / radius);

                card.style.transform = `perspective(1000px) rotateX(${tiltX * intensity}deg) rotateY(${tiltY * intensity}deg) scale(${1 + (0.05 * intensity)})`;
                card.style.border = `1px solid rgba(255, 87, 34, ${intensity * 0.5})`;
                card.style.boxShadow = `0 15px 30px rgba(255,87,34, ${intensity * 0.15})`;
                
                // Reveal the brand image
                imgContainer.style.opacity = 0.05 + (0.95 * Math.pow(intensity, 2)); // Exponential curve for dramatic snap
                imgContainer.style.borderColor = `rgba(255, 87, 34, ${intensity})`;
                
                // Fade out tech pattern as image reveals
                techPattern.style.opacity = 0.3 * (1 - intensity);
            } else {
                // Outside radius: Reset smoothly
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)';
                card.style.border = '1px solid #222222';
                card.style.boxShadow = 'none';
                imgContainer.style.opacity = '0.05';
                imgContainer.style.borderColor = 'transparent';
                techPattern.style.opacity = '0.3';
            }
        });
    });
}
