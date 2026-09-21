// brands.js
const brandsContainer = document.getElementById('brands-3d-container');

if (brandsContainer && typeof brandTextures !== 'undefined') {
    // 1. Reset container to be a normal overflow-hidden marquee wrapper
    brandsContainer.innerHTML = '';
    brandsContainer.style.height = '200px'; // Shorter height for standard marquee
    brandsContainer.style.width = '100%';
    brandsContainer.style.overflow = 'hidden';
    brandsContainer.style.position = 'relative';
    brandsContainer.style.display = 'flex';
    brandsContainer.style.alignItems = 'center';
    brandsContainer.style.background = '#ffffff';
    brandsContainer.style.cursor = 'default';

    // Remove the "Drag/Scroll to explore" subtitle
    const subtitle = brandsContainer.parentElement.querySelector('p');
    if (subtitle) {
        subtitle.style.display = 'none';
    }

    // 2. Create the scrolling track
    const track = document.createElement('div');
    track.style.display = 'flex';
    track.style.gap = '50px';
    track.style.alignItems = 'center';
    track.style.width = 'max-content';
    // Add CSS Animation
    track.style.animation = 'scrollMarquee 25s linear infinite';

    // 3. Helper function to create clean logo images
    function createLogoImg(b64) {
        const img = document.createElement('img');
        if (b64 === '') {
            // Placeholder text if no image
            const placeholder = document.createElement('div');
            placeholder.innerText = 'Dr. Madhavi Anjimati';
            placeholder.style.width = '200px';
            placeholder.style.height = '200px';
            placeholder.style.display = 'flex';
            placeholder.style.alignItems = 'center';
            placeholder.style.justifyContent = 'center';
            placeholder.style.textAlign = 'center';
            placeholder.style.border = '8px solid #ff5722';
            placeholder.style.fontWeight = 'bold';
            placeholder.style.fontSize = '24px';
            placeholder.style.color = '#111';
            placeholder.style.boxSizing = 'border-box';
            return placeholder;
        } else {
            img.src = b64;
            img.style.width = '200px';
            img.style.height = '200px';
            img.style.objectFit = 'contain'; // Keep ratio
            img.style.border = '8px solid #ff5722'; // 1:1 Orange border
            img.style.boxSizing = 'border-box';
            img.style.padding = '10px';
            img.style.background = '#fff';
            return img;
        }
    }

    // 4. Append logos twice (to create seamless endless loop)
    // First set
    brandTextures.forEach(b64 => {
        track.appendChild(createLogoImg(b64));
    });
    // Second set (duplicate for looping)
    brandTextures.forEach(b64 => {
        track.appendChild(createLogoImg(b64));
    });
    // Third set (just in case they have a huge monitor)
    brandTextures.forEach(b64 => {
        track.appendChild(createLogoImg(b64));
    });

    brandsContainer.appendChild(track);

    // 5. Inject Keyframes for the marquee animation
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes scrollMarquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-33.333% - 16px)); }
        }
        
        /* Pause on hover */
        #brands-3d-container:hover div {
            animation-play-state: paused !important;
        }
    `;
    document.head.appendChild(style);
}
