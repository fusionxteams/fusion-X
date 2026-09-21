// brands.js
const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof brandTextures !== 'undefined') {
    // 1. Setup the clean white container
    brandsContainer.innerHTML = '';
    brandsContainer.style.width = '100%';
    brandsContainer.style.background = '#ffffff'; // Pure white background
    brandsContainer.style.position = 'relative';
    brandsContainer.style.display = 'flex';
    brandsContainer.style.flexDirection = 'column';
    brandsContainer.style.gap = '40px';
    brandsContainer.style.padding = '40px 0 80px 0';
    brandsContainer.style.overflow = 'hidden';

    // Fix the title text styling
    const titleContainer = brandsContainer.parentElement.querySelector('.section-title');
    if (titleContainer) {
        titleContainer.style.position = 'relative';
        titleContainer.style.top = '0';
        titleContainer.style.paddingTop = '60px';
        titleContainer.style.paddingBottom = '20px';
        titleContainer.parentElement.style.background = '#ffffff';
        
        const h2 = titleContainer.querySelector('h2');
        if (h2) h2.style.color = '#111111';
        
        const p = titleContainer.querySelector('p');
        if (p) p.innerText = 'Trusted by industry leaders';
    }

    // 2. Helper function to create clean logo images
    function createLogoImg(b64) {
        const wrapper = document.createElement('div');
        wrapper.className = 'brand-logo-wrapper';
        wrapper.style.width = '180px';
        wrapper.style.height = '180px';
        wrapper.style.flexShrink = '0';
        wrapper.style.display = 'flex';
        wrapper.style.alignItems = 'center';
        wrapper.style.justifyContent = 'center';
        wrapper.style.background = '#ffffff';
        wrapper.style.borderRadius = '12px';
        wrapper.style.border = '2px solid #eeeeee';
        wrapper.style.boxShadow = '0 4px 15px rgba(0,0,0,0.03)';
        wrapper.style.transition = 'all 0.3s ease';
        wrapper.style.cursor = 'pointer';
        wrapper.style.filter = 'grayscale(100%) opacity(70%)'; // Grayscale by default
        wrapper.style.padding = '15px';
        wrapper.style.boxSizing = 'border-box';

        if (b64 === '') {
            const placeholder = document.createElement('div');
            placeholder.innerText = 'Dr. Madhavi';
            placeholder.style.fontWeight = 'bold';
            placeholder.style.fontSize = '20px';
            placeholder.style.color = '#111';
            placeholder.style.textAlign = 'center';
            wrapper.appendChild(placeholder);
        } else {
            const img = document.createElement('img');
            img.src = b64;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'contain';
            wrapper.appendChild(img);
        }

        // Hover effect for individual logo
        wrapper.addEventListener('mouseenter', () => {
            wrapper.style.filter = 'grayscale(0%) opacity(100%)';
            wrapper.style.border = '2px solid #ff5722';
            wrapper.style.transform = 'scale(1.05)';
            wrapper.style.boxShadow = '0 10px 25px rgba(255,87,34,0.15)';
        });
        wrapper.addEventListener('mouseleave', () => {
            wrapper.style.filter = 'grayscale(100%) opacity(70%)';
            wrapper.style.border = '2px solid #eeeeee';
            wrapper.style.transform = 'scale(1)';
            wrapper.style.boxShadow = '0 4px 15px rgba(0,0,0,0.03)';
        });

        return wrapper;
    }

    // Split brands into two halves for two rows
    const half = Math.ceil(brandTextures.length / 2);
    const firstHalf = brandTextures.slice(0, half);
    const secondHalf = brandTextures.slice(half);

    // 3. Create Row 1 (Scrolls Left)
    const track1 = document.createElement('div');
    track1.style.display = 'flex';
    track1.style.gap = '40px';
    track1.style.width = 'max-content';
    track1.style.animation = 'scrollMarqueeLeft 30s linear infinite';
    
    // Append 3 times for seamless endless loop
    for(let i=0; i<3; i++) {
        firstHalf.forEach(b64 => track1.appendChild(createLogoImg(b64)));
    }

    // 4. Create Row 2 (Scrolls Right)
    const track2 = document.createElement('div');
    track2.style.display = 'flex';
    track2.style.gap = '40px';
    track2.style.width = 'max-content';
    track2.style.animation = 'scrollMarqueeRight 30s linear infinite';
    // Offset start position so it doesn't look identical to row 1
    track2.style.transform = 'translateX(-33.33%)'; 
    
    // Append 3 times for seamless endless loop
    for(let i=0; i<3; i++) {
        secondHalf.forEach(b64 => track2.appendChild(createLogoImg(b64)));
    }

    // Add pause on hover logic to both tracks
    brandsContainer.addEventListener('mouseenter', () => {
        track1.style.animationPlayState = 'paused';
        track2.style.animationPlayState = 'paused';
    });
    brandsContainer.addEventListener('mouseleave', () => {
        track1.style.animationPlayState = 'running';
        track2.style.animationPlayState = 'running';
    });

    brandsContainer.appendChild(track1);
    brandsContainer.appendChild(track2);

    // 5. Inject Keyframes
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes scrollMarqueeLeft {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-33.333% - 13px)); }
        }
        @keyframes scrollMarqueeRight {
            0% { transform: translateX(calc(-33.333% - 13px)); }
            100% { transform: translateX(0); }
        }
    `;
    document.head.appendChild(style);
}
