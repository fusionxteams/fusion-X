// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const elegantElements = document.querySelectorAll('.elegant-reveal');
const xGlow = document.getElementById('x-glow');

let isAnimating = false;

// --- ELEGANT REVEAL LOGIC ---
function triggerElegantReveal() {
    if (isAnimating) return;
    isAnimating = true;
    
    // Trigger CSS transitions
    elegantElements.forEach(el => {
        el.classList.add('is-visible');
    });

    if (xGlow) {
        xGlow.style.opacity = '1';
    }
}

if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            triggerElegantReveal();
        } else if (!entries[0].isIntersecting && isAnimating) {
            isAnimating = false;
            elegantElements.forEach(el => {
                el.classList.remove('is-visible');
            });
            if (xGlow) xGlow.style.opacity = '0';
        }
    }, { threshold: 0.3 });
    observer.observe(shatterSect);
}
