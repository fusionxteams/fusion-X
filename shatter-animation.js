// shatter-animation.js
const shatterSect = document.getElementById('fusion-shatter');
const ctaReveal = document.getElementById('cta-reveal-container');
const letters = document.querySelectorAll('.slam-letter');
const xGlow = document.getElementById('x-glow');

let isAnimating = false;

function triggerKineticSlam() {
    if (isAnimating) return;
    isAnimating = true;
    
    // Reset DOM
    letters.forEach(letter => {
        letter.classList.remove('is-slamming');
        letter.style.opacity = '0';
    });
    if (xGlow) xGlow.style.opacity = '0';
    if (ctaReveal) {
        ctaReveal.style.opacity = '0';
        ctaReveal.style.transform = 'translateY(30px)';
    }
    
    // Stagger the slam of each letter
    let delay = 0;
    
    letters.forEach((letter, index) => {
        setTimeout(() => {
            letter.classList.add('is-slamming');
            
            // If this is the last letter (the "X")
            if (index === letters.length - 1) {
                // Wait for the X to hit the ground (0.4s animation duration)
                setTimeout(() => {
                    // Shake the screen
                    document.body.classList.add('screen-shake');
                    setTimeout(() => {
                        document.body.classList.remove('screen-shake');
                    }, 300);
                    
                    // Ignite the blue X glow
                    if (xGlow) {
                        xGlow.style.opacity = '1';
                    }
                    
                    // Fade in the CTA banner
                    if (ctaReveal) {
                        ctaReveal.style.opacity = '1';
                        ctaReveal.style.transform = 'translateY(0)';
                    }
                    
                    // Cooldown before it can be triggered again (if they scroll up)
                    setTimeout(() => {
                        isAnimating = false;
                    }, 2000);
                    
                }, 400); // Wait for the 0.4s slam animation to finish
            }
            
        }, delay);
        
        // Increase delay for the next letter
        // The X gets a longer pause for dramatic effect
        if (index === letters.length - 2) {
            delay += 400; // Dramatic pause before the X drops
        } else {
            delay += 100; // Fast staccato for F-U-S-I-O-N
        }
    });
}

if (shatterSect) {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isAnimating) {
            setTimeout(triggerKineticSlam, 200);
        }
    }, { threshold: 0.4 });
    observer.observe(shatterSect);
}
