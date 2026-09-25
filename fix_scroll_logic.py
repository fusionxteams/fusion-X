import os
import re

html = open('our-team.html', 'r', encoding='utf-8').read()

# Let's revert back to an overflow:hidden design and handle events explicitly
html = html.replace('overflow-x: hidden;', 'overflow: hidden; touch-action: none;')

# Remove ScrollTrigger initialization
html = html.replace('gsap.registerPlugin(ScrollTrigger);', '')

# Replace the ScrollTrigger logic with robust Wheel/Touch logic
new_script = """
        // --- CUSTOM SCROLL/SWIPE LOGIC ---
        let currentIdx = 0;
        let isAnimating = false;
        let footerRevealed = false;
        const totalSlides = members.length;
        const sliderWrapper = document.querySelector('.slider-wrapper');
        
        function changeSlide(dir) {
            if (isAnimating) return;
            
            // If footer is revealed and user wants to go UP (dir = -1)
            if (footerRevealed && dir === -1) {
                isAnimating = true;
                gsap.to(sliderWrapper, {
                    y: 0,
                    duration: 1,
                    ease: 'power3.inOut',
                    onComplete: () => { footerRevealed = false; isAnimating = false; }
                });
                return;
            }
            
            // If footer is revealed and user wants to go DOWN (dir = 1), do nothing
            if (footerRevealed && dir === 1) return;
            
            // If on last slide and user wants to go DOWN (dir = 1) -> REVEAL FOOTER
            if (currentIdx === totalSlides - 1 && dir === 1) {
                isAnimating = true;
                const footerHeight = document.querySelector('.footer-wrapper footer').offsetHeight;
                // Move slider up by footer height
                gsap.to(sliderWrapper, {
                    y: -footerHeight,
                    duration: 1,
                    ease: 'power3.inOut',
                    onComplete: () => { footerRevealed = true; isAnimating = false; }
                });
                return;
            }
            
            // Normal slide change
            const nextIdx = currentIdx + dir;
            if (nextIdx < 0 || nextIdx >= totalSlides) return; // Bounds
            
            if (!textures[nextIdx]) return;
            
            isAnimating = true;

            const currInfo = document.getElementById(`info-${currentIdx}`);
            const nextInfo = document.getElementById(`info-${nextIdx}`);
            
            // Hide current text
            if(currInfo) {
                gsap.to(currInfo.querySelectorAll('span, .member-desc, .highlights'), {
                    y: -50, opacity: 0, duration: 0.6, stagger: 0.05, ease: 'power3.in',
                    onComplete: () => currInfo.classList.remove('active')
                });
            }

            // Animate Shaders
            material.uniforms.texture2.value = textures[nextIdx];
            material.uniforms.dispFactor.value = 0.0;
            
            gsap.to(material.uniforms.dispFactor, {
                value: 1.0,
                duration: 1.6,
                ease: 'expo.inOut',
                onComplete: () => {
                    material.uniforms.texture1.value = textures[nextIdx];
                    material.uniforms.dispFactor.value = 0.0;
                    currentIdx = nextIdx;
                    document.getElementById('curr-idx').innerText = currentIdx + 1;
                    isAnimating = false;
                }
            });

            // Show next text
            if(nextInfo) {
                nextInfo.classList.add('active');
                gsap.fromTo(nextInfo.querySelectorAll('.member-role span, .member-name span'), 
                    { y: 100, opacity: 1 }, 
                    { y: 0, duration: 1, stagger: 0.1, ease: 'expo.out', delay: 0.8 }
                );
                gsap.fromTo(nextInfo.querySelectorAll('.member-desc, .highlights'), 
                    { y: 40, opacity: 0 }, 
                    { y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: 'power3.out', delay: 1.0 }
                );
            }
        }

        // Wheel Event
        window.addEventListener('wheel', (e) => {
            if(Math.abs(e.deltaY) > 20) {
                changeSlide(e.deltaY > 0 ? 1 : -1);
            }
        });

        // Touch Swipe Event for Mobile
        let touchStartY = 0;
        window.addEventListener('touchstart', e => {
            touchStartY = e.touches[0].clientY;
        }, {passive: false});
        
        window.addEventListener('touchmove', e => {
            // Prevent native scrolling completely
            if(e.cancelable) e.preventDefault();
        }, {passive: false});

        window.addEventListener('touchend', e => {
            if(!touchStartY) return;
            const touchEndY = e.changedTouches[0].clientY;
            const diff = touchStartY - touchEndY;
            
            // Swipe threshold 50px
            if(diff > 50) {
                changeSlide(1); // Swiped up -> next
            } else if (diff < -50) {
                changeSlide(-1); // Swiped down -> prev
            }
            touchStartY = 0;
        });
        
        // Remove old ScrollTrigger block by replacing it here
"""

# Now we need to rip out the old ScrollTrigger logic from the file
start_marker = "// --- SCROLL LOGIC ---"
end_marker = "// Initial Text Animation"

if start_marker in html and end_marker in html:
    before = html.split(start_marker)[0]
    after = html.split(end_marker)[1]
    
    # We also need to remove <div id="scroll-proxy"></div>
    before = before.replace('<div id="scroll-proxy"></div>', '')
    
    # And fix the slider wrapper pointer events back to auto so touch works
    before = before.replace('z-index: 1; pointer-events: none;', 'z-index: 1;')
    
    final_html = before + new_script + "// Initial Text Animation" + after
    open('our-team.html', 'w', encoding='utf-8').write(final_html)
    print("Successfully replaced scrolling logic.")
else:
    print("Could not find markers.")
